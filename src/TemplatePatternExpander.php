<?php
/**
 * Pattern-only templates for Site Editor REST and front-end expansion.
 *
 * WordPress 7.0 resolves wp:pattern blocks server-side in template REST responses.
 * Large patterns (page-home) expand to hundreds of blocks and prevent the Site
 * Editor from loading. This class preserves lean on-disk markup for editor REST
 * routes and expands patterns for view context (front-end / previews).
 *
 * @package Aegis
 */

declare(strict_types=1);

namespace Aegis;

use WP_Block_Patterns_Registry;
use WP_Block_Template;
use WP_REST_Request;
use WP_REST_Response;
use function did_action;
use function preg_match;
use function preg_replace_callback;

/**
 * Resolves wp:pattern placeholders in template content to registered pattern markup.
 */
final class TemplatePatternExpander {

	private const MAX_DEPTH = 6;

	/**
	 * Whether the current REST request uses the edit context.
	 *
	 * @var bool
	 */
	private static bool $is_rest_edit_context = false;

	/**
	 * Hook the template pattern expansion filters.
	 *
	 * @return void
	 */
	public static function boot(): void {
		add_filter( 'rest_pre_dispatch', array( self::class, 'capture_rest_edit_context' ), 10, 3 );
		add_filter( 'rest_post_dispatch', array( self::class, 'reset_rest_edit_context' ), 10, 3 );
		add_filter( 'get_block_file_template', array( self::class, 'expand_file_template' ), 20, 3 );
		add_filter( 'rest_request_after_callbacks', array( self::class, 'handle_rest_after_callbacks' ), 99, 3 );
	}

	/**
	 * Remember whether the dispatched REST request uses the edit context.
	 *
	 * @param mixed           $result  Response to serve.
	 * @param WP_REST_Server  $server  Server instance.
	 * @param WP_REST_Request $request Request used.
	 *
	 * @return mixed
	 */
	public static function capture_rest_edit_context( $result, $server, WP_REST_Request $request ) {
		self::$is_rest_edit_context = $request->get_param( 'context' ) === 'edit';

		return $result;
	}

	/**
	 * Reset the edit-context flag after a REST request is dispatched.
	 *
	 * @param WP_REST_Response|\WP_HTTP_Response|\WP_Error|mixed $response Response.
	 */
	public static function reset_rest_edit_context( $response ) {
		self::$is_rest_edit_context = false;

		return $response;
	}

	/**
	 * Expand wp:pattern placeholders in file templates for view context.
	 *
	 * @param WP_Block_Template|null $template      Template object.
	 * @param string                 $id            Template ID.
	 * @param string                 $template_type Template type.
	 *
	 * @return WP_Block_Template|null
	 */
	public static function expand_file_template( $template, string $id, string $template_type ) {
		if ( ! $template instanceof WP_Block_Template || empty( $template->content ) ) {
			return $template;
		}

		if ( ! in_array( $template_type, array( 'wp_template', 'wp_template_part' ), true ) ) {
			return $template;
		}

		if ( ! did_action( 'init' ) || self::$is_rest_edit_context ) {
			return $template;
		}

		$original = (string) $template->content;
		$expanded = self::expand_pattern_content( $original );

		if ( $expanded !== $original ) {
			$template->content = $expanded;
		}

		return $template;
	}

	/**
	 * Route template REST responses to the preserve or expand handlers.
	 *
	 * @param WP_REST_Response|\WP_Error $response Response.
	 * @param array                      $handler  Route handler.
	 * @param WP_REST_Request            $request  Current request.
	 */
	public static function handle_rest_after_callbacks( $response, array $handler, WP_REST_Request $request ) {
		if ( ! $response instanceof WP_REST_Response || $request->get_method() !== 'GET' ) {
			return $response;
		}

		if ( ! did_action( 'init' ) ) {
			return $response;
		}

		$context = $request->get_param( 'context' );
		$route   = $request->get_route();

		// Editor + lookup: keep wp:pattern placeholders (core hydrates on canvas).
		if ( $context === 'edit' || $route === '/wp/v2/templates/lookup' ) {
			return self::preserve_pattern_templates_for_edit( $response, $request, $route );
		}

		if ( $context === 'view' ) {
			return self::expand_pattern_templates_in_response( $response, $request, $route );
		}

		return $response;
	}

	/**
	 * Keep on-disk wp:pattern placeholders in editor-bound template responses.
	 *
	 * @param WP_REST_Response $response Response.
	 * @param WP_REST_Request  $request  Current request.
	 * @param string           $route    Request route.
	 */
	private static function preserve_pattern_templates_for_edit( WP_REST_Response $response, WP_REST_Request $request, string $route ): WP_REST_Response {
		$data = $response->get_data();

		if ( ! is_array( $data ) ) {
			return $response;
		}

		if ( self::is_indexed_template_list( $data ) ) {
			foreach ( $data as $index => $item ) {
				if ( ! is_array( $item ) ) {
					continue;
				}
				$type           = str_contains( $route, 'template-parts' ) ? 'wp_template_part' : 'wp_template';
				$data[ $index ] = self::maybe_preserve_template_item( $item, $type, $route );
			}
			$response->set_data( $data );

			return $response;
		}

		$slug = self::resolve_template_slug_from_route( $route, $request, $data );
		if ( $slug === '' ) {
			return $response;
		}

		$type = str_contains( $route, 'template-parts' ) ? 'wp_template_part' : 'wp_template';
		$response->set_data( self::maybe_preserve_template_item( $data, $type, $route, $slug ) );

		return $response;
	}

	/**
	 * Restore lean on-disk markup for a template row when patterns are involved.
	 *
	 * @param array<string, mixed> $item  Template row.
	 * @param string               $type  Template type.
	 * @param string               $route Request route.
	 * @param string               $slug  Template slug override.
	 *
	 * @return array<string, mixed>
	 */
	private static function maybe_preserve_template_item( array $item, string $type, string $route, string $slug = '' ): array {
		$slug = $slug !== '' ? $slug : (string) ( $item['slug'] ?? '' );
		if ( $slug === '' ) {
			return $item;
		}

		$file = self::read_theme_template_file( $slug, $type );
		if ( $file === '' || ! str_contains( $file, 'wp:pattern' ) ) {
			return $item;
		}

		$before = (string) ( $item['content']['raw'] ?? '' );
		if ( $before === $file ) {
			return $item;
		}

		if ( ! isset( $item['content'] ) || ! is_array( $item['content'] ) ) {
			$item['content'] = array();
		}

		$item['content']['raw']      = $file;
		$item['content']['block']    = $file;
		$item['content']['rendered'] = '';

		return $item;
	}

	/**
	 * Expand wp:pattern placeholders in a view-context template response.
	 *
	 * @param WP_REST_Response $response Response.
	 * @param WP_REST_Request  $request  Current request.
	 * @param string           $route    Request route.
	 */
	private static function expand_pattern_templates_in_response( WP_REST_Response $response, WP_REST_Request $request, string $route ): WP_REST_Response {
		$data = $response->get_data();
		if ( ! is_array( $data ) || empty( $data['content']['raw'] ) ) {
			return $response;
		}

		$original = (string) $data['content']['raw'];
		$expanded = self::expand_pattern_content( $original );

		if ( $expanded === $original ) {
			return $response;
		}

		$data['content']['raw']      = $expanded;
		$data['content']['block']    = $expanded;
		$data['content']['rendered'] = '';
		$response->set_data( $data );

		return $response;
	}

	/**
	 * Whether the response data is an indexed list of template rows.
	 *
	 * @param array<int|string, mixed> $data Response data.
	 */
	private static function is_indexed_template_list( array $data ): bool {
		return isset( $data[0] ) && is_array( $data[0] ) && isset( $data[0]['slug'] );
	}

	/**
	 * Resolve the template slug from response data, request or route.
	 *
	 * @param string               $route   Request route.
	 * @param WP_REST_Request      $request Current request.
	 * @param array<string, mixed> $data    Response data.
	 */
	private static function resolve_template_slug_from_route( string $route, WP_REST_Request $request, array $data ): string {
		if ( ! empty( $data['slug'] ) ) {
			return (string) $data['slug'];
		}

		if ( $route === '/wp/v2/templates/lookup' ) {
			return (string) $request->get_param( 'slug' );
		}

		if ( preg_match( '#^/wp/v2/(?:template-parts|templates)/[^/]+//([^/]+)$#', $route, $matches ) ) {
			return $matches[1];
		}

		return '';
	}

	/**
	 * Read the on-disk template or template-part file for a slug.
	 *
	 * @param string $slug Template slug.
	 * @param string $type Template type.
	 */
	private static function read_theme_template_file( string $slug, string $type ): string {
		$base       = $type === 'wp_template_part'
			? get_template_directory() . '/parts/'
			: get_template_directory() . '/templates/';
		$candidates = array( $slug );

		// WordPress may request the `home` template id while the on-disk file is `front-page.html`.
		// Preserve from whichever file actually exists on disk.
		if ( $slug === 'home' ) {
			$candidates[] = 'front-page';
		}

		foreach ( $candidates as $candidate_slug ) {
			$path = $base . $candidate_slug . '.html';
			if ( is_readable( $path ) ) {
				return (string) file_get_contents( $path );
			}
		}

		return '';
	}

	/**
	 * Recursively replace wp:pattern placeholders with registered pattern markup.
	 *
	 * @param string   $content   Block markup.
	 * @param int      $depth     Current recursion depth.
	 * @param int|null $max_depth Maximum recursion depth.
	 */
	public static function expand_pattern_content( string $content, int $depth = 0, ?int $max_depth = null ): string {
		$limit = $max_depth ?? self::MAX_DEPTH;

		if ( $depth >= $limit || ! preg_match( '/<!-- wp:pattern /', $content ) ) {
			return $content;
		}

		$registry = WP_Block_Patterns_Registry::get_instance();

		$expanded = preg_replace_callback(
			'/<!-- wp:pattern \{"slug":"([^"]+)"\}[^\/]*\/-->/',
			static function ( array $matches ) use ( $registry, $depth, $limit ): string {
				$pattern = $registry->get_registered( $matches[1] );
				if ( ! $pattern || empty( $pattern['content'] ) ) {
					return $matches[0];
				}

				return self::expand_pattern_content( (string) $pattern['content'], $depth + 1, $limit );
			},
			$content
		);

		return is_string( $expanded ) ? $expanded : $content;
	}
}
