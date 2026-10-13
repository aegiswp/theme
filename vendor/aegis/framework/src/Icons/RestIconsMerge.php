<?php
/**
 * Merges Aegis icon library into wp/v2/icons REST responses for the editor.
 *
 * @package Aegis\Framework\Icons
 * @since   1.0.0
 */

// Enforces strict type checking for all code in this file, ensuring type safety for merges aegis icon library into wp/v2/icons rest responses for the editor.
declare( strict_types=1 );

// Declares the namespace for the merges aegis icon library into wp/v2/icons rest responses for the editor.
namespace Aegis\Framework\Icons;

// Imports classes, interfaces, and functions used by the merges aegis icon library into wp/v2/icons rest responses for the editor.
use Aegis\Framework\ServiceProvider;
use Aegis\Icons\Icon;
use WP_REST_Request;
use WP_REST_Response;
use function function_exists;
use function is_array;
use function str_contains;

/**
 * Appends Aegis picker items to core icons collection endpoint.
 */
class RestIconsMerge {

	/**
	 * Registers the Aegis icon REST route used by the editor picker store.
	 *
	 * @hook after_setup_theme
	 */
	public function register_rest_route(): void {
		if ( ! ServiceProvider::is_block_enabled( 'icon' ) || ! ServiceProvider::is_block_enabled( 'icon_rest_api' ) ) {
			return;
		}

		Icon::register_rest_route();
	}

	/**
	 * @param WP_REST_Response $response Response object.
	 * @param WP_REST_Server   $server   Server instance.
	 * @param WP_REST_Request  $request  Request object.
	 *
	 * @return WP_REST_Response
	 * @hook rest_post_dispatch 10 3
	 */
	public function merge_aegis_icons( $response, $server, $request ) {
		unset( $server );

		// Bail when icons endpoint preconditions are not met.
		if ( version_compare( get_bloginfo( 'version' ), '7.1', '>=' ) && function_exists( 'wp_register_icon' ) ) {
			return $response;
		}

		if ( version_compare( get_bloginfo( 'version' ), '7.0', '<' ) ) {
			return $response;
		}

		if ( ! ServiceProvider::is_block_enabled( 'icon' ) ) {
			return $response;
		}

		if ( ! ServiceProvider::is_block_enabled( 'icon_rest_api' ) ) {
			return $response;
		}

		if ( ! $request instanceof WP_REST_Request ) {
			return $response;
		}

		$route = $request->get_route();

		if ( $route !== '/wp/v2/icons' || $request->get_method() !== 'GET' ) {
			return $response;
		}

		$data = $response->get_data();

		if ( ! is_array( $data ) ) {
			return $response;
		}

		$search = strtolower( (string) $request->get_param( 'search' ) );

		$icon_map = Icon::get_icon_data( null );

		if ( ! is_array( $icon_map ) ) {
			return $response;
		}

		// Append matching Aegis icons to the core icons response.
		foreach ( $icon_map as $set => $icons ) {
			if ( ! is_array( $icons ) ) {
				continue;
			}

			foreach ( $icons as $name => $svg ) {
				if ( ! is_string( $svg ) || $svg === '' ) {
					continue;
				}

				$registry_id = Icon::to_registry_id( (string) $set, (string) $name );
				$label       = (string) $name;
				$haystack    = strtolower( $registry_id . ' ' . $label );

				if ( $search !== '' && ! str_contains( $haystack, $search ) ) {
					continue;
				}

				$data[] = [
					'name'    => $registry_id,
					'label'   => $label,
					'content' => $svg,
				];
			}
		}

		// Write merged icon data back to the response.
		$response->set_data( $data );

		return $response;
	}
}
