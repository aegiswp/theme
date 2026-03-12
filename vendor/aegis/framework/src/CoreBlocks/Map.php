<?php
/**
 * Map Block Registration
 *
 * Registers the Map block with WordPress.
 *
 * Responsibilities:
 * - Registers the aegis/map block using block.json metadata, gated
 *   behind the admin conditional-logic settings
 * - Provides Google Maps and OpenStreetMap integration with markers,
 *   style presets, and interactive controls
 * - Registers a REST API geocoding proxy endpoint (`aegis/v1/map/geocode`)
 *   so the API key is never exposed to the browser
 * - Enqueues editor data (API key, REST URL, nonce, pro flag) via
 *   `wp_localize_script` for the live map preview
 *
 * @package    Aegis\Framework\CoreBlocks
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file.
declare(strict_types=1);

// Declares the namespace for core block registrations within the Aegis Framework.
namespace Aegis\Framework\CoreBlocks;

// Imports classes and functions used throughout this file.
use Aegis\Framework\ServiceProvider;
use WP_REST_Request;
use function add_filter;
use function add_query_arg;
use function class_exists;
use function current_user_can;
use function file_exists;
use function get_option;
use function get_template_directory;
use function get_template_directory_uri;
use function is_wp_error;
use function register_block_type;
use function register_rest_route;
use function rest_url;
use function sanitize_text_field;
use function wp_create_nonce;
use function wp_enqueue_script;
use function wp_json_encode;
use function wp_localize_script;
use function wp_remote_get;
use function wp_remote_retrieve_body;

/**
 * Map block.
 *
 * Handles registration for the aegis/map block. The block provides
 * Google Maps and OpenStreetMap integration with markers, style
 * presets, and interactive controls. A server-side geocoding proxy
 * keeps the Google Maps API key private, and editor data is
 * localised so the block can render a live preview in the editor.
 *
 * Registration is gated behind the admin conditional-logic settings
 * so site owners can disable the block without code changes. Pro
 * features are extended via the aegis-pro plugin.
 *
 * @since 1.0.0
 */
class Map
{
	/**
	 * Register the map block with WordPress.
	 *
	 * Checks whether the block is enabled in the admin
	 * conditional-logic settings, then verifies that the
	 * `block.json` file exists in the theme's `src/Blocks/map`
	 * directory before calling `register_block_type()`. Silently
	 * returns when the block is disabled or the metadata file is
	 * missing.
	 *
	 * @since 1.0.0
	 *
	 * @hook  init
	 *
	 * @return void
	 */
	public function register_block(): void
	{
		// Check if block is enabled in admin settings.
		if ( ! ServiceProvider::is_block_enabled( 'map' ) ) {
			return;
		}

		$block_path = get_template_directory() . '/src/Blocks/map';

		if (!file_exists($block_path . '/block.json')) {
			return;
		}

		register_block_type($block_path);

		add_filter('render_block_aegis/map', [$this, 'append_schema'], 10, 2);
	}

	/**
	 * Append Schema.org LocalBusiness JSON-LD to map block output.
	 *
	 * @since 1.0.0
	 *
	 * @param string $content The block HTML.
	 * @param array  $block   The parsed block array.
	 *
	 * @return string Modified block HTML with optional schema markup.
	 */
	public function append_schema(string $content, array $block): string
	{
		$attrs = $block['attrs'] ?? [];

		if (empty($attrs['schemaEnabled'])) {
			return $content;
		}

		if ( ! ServiceProvider::is_block_enabled( 'map_schema' ) ) {
			return $content;
		}

		if ( ServiceProvider::is_schema_handled_by_rank_math( 'rank_math_local_schema' ) ) {
			return $content;
		}

		return $content . $this->render_schema($attrs);
	}

	/**
	 * Generate Schema.org LocalBusiness JSON-LD markup.
	 *
	 * @since 1.0.0
	 *
	 * @param array $attrs Block attributes.
	 *
	 * @return string JSON-LD script tag or empty string.
	 */
	private function render_schema(array $attrs): string
	{
		$schema = [
			'@context' => 'https://schema.org',
			'@type'    => 'LocalBusiness',
		];

		if (!empty($attrs['schemaBusinessName'])) {
			$schema['name'] = sanitize_text_field($attrs['schemaBusinessName']);
		}

		if (!empty($attrs['schemaPhone'])) {
			$schema['telephone'] = sanitize_text_field($attrs['schemaPhone']);
		}

		if (!empty($attrs['schemaAddress'])) {
			$schema['address'] = [
				'@type'         => 'PostalAddress',
				'streetAddress' => sanitize_text_field($attrs['schemaAddress']),
			];
		}

		$lat = (float) ($attrs['lat'] ?? 0);
		$lng = (float) ($attrs['lng'] ?? 0);

		if ($lat && $lng) {
			$schema['geo'] = [
				'@type'     => 'GeoCoordinates',
				'latitude'  => $lat,
				'longitude' => $lng,
			];
		}

		return '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES) . '</script>';
	}

	/**
	 * Register REST API geocoding proxy endpoint.
	 *
	 * Creates the `aegis/v1/map/geocode` GET route that proxies
	 * geocoding requests to the Google Maps Geocoding API. The
	 * endpoint requires the `edit_posts` capability and accepts a
	 * single `address` parameter (sanitised via `sanitize_text_field`).
	 * This keeps the API key server-side and out of the browser.
	 *
	 * @since 1.0.0
	 *
	 * @hook  rest_api_init
	 *
	 * @return void
	 */
	public function register_rest_routes(): void
	{
		register_rest_route('aegis/v1', '/map/geocode', [
			'methods'             => 'GET',
			'callback'            => [$this, 'proxy_geocode'],
			'permission_callback' => function () {
				return current_user_can('edit_posts');
			},
			'args'                => [
				'address' => [
					'required'          => true,
					'sanitize_callback' => 'sanitize_text_field',
				],
			],
		]);
	}

	/**
	 * Proxy geocoding request to Google Maps API.
	 *
	 * Reads the stored Google Maps API key from the
	 * `aegis_google_maps` option, forwards the address to the
	 * Google Geocoding API, and returns the latitude, longitude,
	 * and formatted address on success. Returns a `WP_Error` when
	 * the API key is missing, the remote request fails, or the
	 * geocoding response contains no results.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_REST_Request $request REST request with 'address' param.
	 *
	 * @return \WP_REST_Response|\WP_Error Geocoded coordinates or error.
	 */
	public function proxy_geocode(WP_REST_Request $request)
	{
		$google_maps = get_option('aegis_google_maps', ['api_key' => '']);
		$api_key     = $google_maps['api_key'] ?? '';

		if (empty($api_key)) {
			return new \WP_Error(
				'no_api_key',
				'Google Maps API key is not configured.',
				['status' => 400]
			);
		}

		$address  = $request->get_param('address');
		$response = wp_remote_get(
			add_query_arg(
				[
					'address' => $address,
					'key'     => $api_key,
				],
				'https://maps.googleapis.com/maps/api/geocode/json'
			),
			['timeout' => 10]
		);

		if (is_wp_error($response)) {
			return $response;
		}

		$body = json_decode(wp_remote_retrieve_body($response), true);

		if (!isset($body['status']) || $body['status'] !== 'OK') {
			return new \WP_Error(
				'geocode_failed',
				$body['error_message'] ?? $body['status'] ?? 'Geocoding failed.',
				['status' => 400]
			);
		}

		$location = $body['results'][0]['geometry']['location'] ?? null;

		if (!$location) {
			return new \WP_Error(
				'no_results',
				'No results found for the given address.',
				['status' => 404]
			);
		}

		return new \WP_REST_Response([
			'lat'              => $location['lat'],
			'lng'              => $location['lng'],
			'formatted_address' => $body['results'][0]['formatted_address'] ?? '',
		]);
	}

	/**
	 * Enqueue editor data for the map block.
	 *
	 * Localises the `aegisMapEditor` object onto the block's editor
	 * script handle with the Google Maps API key, REST geocoding
	 * URL, a WP REST nonce, a pro-active flag, and an API-key-present
	 * flag. Requires the `edit_posts` capability; silently returns
	 * for users without it.
	 *
	 * @since 1.0.0
	 *
	 * @hook  enqueue_block_editor_assets
	 *
	 * @return void
	 */
	public function enqueue_editor_data(): void
	{
		if (!current_user_can('edit_posts')) {
			return;
		}

		$google_maps = get_option('aegis_google_maps', ['api_key' => '']);
		$api_key     = $google_maps['api_key'] ?? '';

		// The handle must match the block's editorScript handle.
		// WordPress auto-generates it as "aegis-map-editor-script" from block.json.
		$handle = 'aegis-map-editor-script';

		wp_localize_script($handle, 'aegisMapEditor', [
			'apiKey'      => $api_key,
			'restUrl'     => rest_url('aegis/v1/map/geocode'),
			'restNonce'   => wp_create_nonce('wp_rest'),
			'isPro'       => class_exists('Aegis\\Pro\\Blocks\\Map'),
			'hasApiKey'   => !empty($api_key),
		]);
	}
}
