<?php
/**
 * Hook Patterns Manager
 *
 * Manages the Conditional Logic meta box for all post types and the
 * `_aegis_conditions` meta field registration.
 *
 * Custom post type registration, hook-specific meta boxes, admin columns,
 * and hook-pattern rendering have been moved to the aegis-pro plugin
 * (Aegis\Pro\HookPatterns and Aegis\Pro\HookPatternsRenderer).
 *
 * @package    Aegis\Admin
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 */

declare( strict_types=1 );

namespace Aegis\Admin;

use WP_Post;
use function add_action;
use function register_post_meta;
use function wp_enqueue_script;
use function wp_enqueue_style;
use function get_template_directory_uri;
use function __;
use function get_post;
use function get_post_meta;
use function update_post_meta;
use function current_user_can;
use function is_array;
use function add_meta_box;
use function defined;
use function wp_is_post_revision;
use function wp_is_post_autosave;
use function wp_verify_nonce;
use function wp_unslash;
use function wp_roles;
use function translate_user_role;
use function wp_json_encode;
use function json_decode;
use function esc_textarea;
use function wp_style_is;
use function wp_nonce_field;

/**
 * Hook Patterns Manager Class
 *
 * Handles conditional logic meta box registration for all post types.
 */
class HookPatternsManager {

	/**
	 * Post type for hook patterns.
	 *
	 * Kept for backward compatibility with AdminRenderer references.
	 * The CPT is now registered by aegis-pro plugin.
	 */
	public const POST_TYPE = 'aegis_hook_pattern';

	/**
	 * Initialize the hook patterns manager.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function init(): void {
		$this->register_conditions_meta();
		$this->register_admin_hooks();
	}

	/**
	 * Register the `_aegis_conditions` meta field for all post types.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	private function register_conditions_meta(): void {
		register_post_meta(
			'',
			'_aegis_conditions',
			[
				'type'          => 'string',
				'description'   => __( 'JSON-encoded conditional logic rules.', 'aegis' ),
				'single'        => true,
				'show_in_rest'  => true,
				'default'       => '',
				'auth_callback' => function ( $allowed, $meta_key, $post_id ) {
					return current_user_can( 'edit_post', $post_id );
				},
			]
		);
	}

	/**
	 * Register admin hooks for conditions UI.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	private function register_admin_hooks(): void {
		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_admin_scripts' ] );
		add_action( 'save_post', [ $this, 'save_conditions_meta' ] );
		add_action( 'add_meta_boxes', [ $this, 'add_conditions_meta_box' ] );
	}

	/**
	 * Enqueue conditions admin scripts and styles.
	 *
	 * @since 1.0.0
	 *
	 * @param string $hook Current admin page.
	 *
	 * @return void
	 */
	public function enqueue_admin_scripts( string $hook ): void {
		if ( ! in_array( $hook, [ 'post.php', 'post-new.php' ], true ) ) {
			return;
		}

		// Conditions UI — on all post types that have the block editor.
		$settings        = ConditionalLogicSettings::get_settings();
		$has_any_enabled = false;
		foreach ( $settings as $features ) {
			if ( is_array( $features ) ) {
				foreach ( $features as $enabled ) {
					if ( $enabled ) {
						$has_any_enabled = true;
						break 2;
					}
				}
			}
		}

		if ( ! $has_any_enabled ) {
			return;
		}

		// Enqueue conditions CSS — skip if already loaded by hook-patterns plugin.
		if ( ! wp_style_is( 'aegis-hook-patterns-admin', 'enqueued' ) ) {
			wp_enqueue_style(
				'aegis-conditions-admin',
				get_template_directory_uri() . '/src/Admin/css/hook-patterns.css',
				[],
				'1.0.0'
			);
		}

		wp_enqueue_script(
			'aegis-hook-conditions',
			get_template_directory_uri() . '/src/Admin/js/hook-patterns-conditions.js',
			[],
			'1.0.0',
			true
		);
	}

	/**
	 * Register the Conditionals meta box on all post types with the block editor.
	 *
	 * @since 1.0.0
	 *
	 * @param string $post_type Current post type.
	 *
	 * @return void
	 */
	public function add_conditions_meta_box( string $post_type ): void {
		// Only show if at least one conditional logic setting is enabled.
		$settings = ConditionalLogicSettings::get_settings();
		$has_any  = false;
		foreach ( $settings as $features ) {
			if ( is_array( $features ) ) {
				foreach ( $features as $enabled ) {
					if ( $enabled ) {
						$has_any = true;
						break 2;
					}
				}
			}
		}

		if ( ! $has_any ) {
			return;
		}

		// Only register on post types that support the editor.
		$post_type_object = \get_post_type_object( $post_type );
		if ( ! $post_type_object || ! $post_type_object->show_in_rest ) {
			return;
		}

		add_meta_box(
			'aegis_conditions',
			__( 'Conditionals', 'aegis' ),
			[ $this, 'render_conditions_meta_box' ],
			$post_type,
			'side',
			'default'
		);
	}

	/**
	 * Render the Conditional Logic meta box.
	 *
	 * Outputs a hidden textarea with JSON data and a mount point for the
	 * JS-driven conditions UI. All condition types (free + pro) are managed
	 * client-side and serialized into the hidden field on save.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Post $post Post object.
	 *
	 * @return void
	 */
	public function render_conditions_meta_box( WP_Post $post ): void {
		$raw        = get_post_meta( $post->ID, '_aegis_conditions', true );
		$conditions = ! empty( $raw ) ? json_decode( $raw, true ) : [];
		if ( ! is_array( $conditions ) ) {
			$conditions = [];
		}

		// Gather role options for the JS UI.
		$roles    = [];
		$wp_roles = wp_roles();
		foreach ( $wp_roles->role_names as $slug => $name ) {
			$roles[] = [ 'value' => $slug, 'label' => translate_user_role( $name ) ];
		}

		// Detect pro plugin.
		$has_pro = defined( 'AEGIS_PRO_VERSION' );

		// Admin panel settings for gating sections.
		$cl_settings = ConditionalLogicSettings::get_settings();

		wp_nonce_field( 'aegis_save_conditions', 'aegis_conditions_nonce' );
		?>
		<textarea id="aegis_conditions" name="aegis_conditions" class="hidden"><?php
			echo esc_textarea( wp_json_encode( $conditions ) );
		?></textarea>
		<div id="aegis-conditions-ui" class="aegis-conditions-ui"></div>
		<script>
			window.aegisConditionsConfig = {
				conditions: <?php echo wp_json_encode( $conditions ); ?>,
				roles: <?php echo wp_json_encode( $roles ); ?>,
				hasPro: <?php echo $has_pro ? 'true' : 'false'; ?>,
				settings: <?php echo wp_json_encode( $cl_settings ); ?>,
				postType: <?php echo wp_json_encode( $post->post_type ); ?>,
			};
		</script>
		<?php
	}

	/**
	 * Save conditional logic meta for any post type.
	 *
	 * Hook-pattern-specific meta (hook name, priority, enabled) is saved
	 * by the aegis-pro plugin's HookPatterns::save_pattern_meta().
	 *
	 * @since 1.0.0
	 *
	 * @param int $post_id Post ID.
	 *
	 * @return void
	 */
	public function save_conditions_meta( int $post_id ): void {
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		if ( wp_is_post_revision( $post_id ) || wp_is_post_autosave( $post_id ) ) {
			return;
		}

		// Skip hook patterns — handled by plugin's save_pattern_meta().
		$post = get_post( $post_id );
		if ( $post && $post->post_type === self::POST_TYPE ) {
			return;
		}

		if ( ! isset( $_POST['aegis_conditions_nonce'] )
			|| ! wp_verify_nonce( wp_unslash( $_POST['aegis_conditions_nonce'] ), 'aegis_save_conditions' )
		) {
			return;
		}

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		if ( isset( $_POST['aegis_conditions'] ) ) {
			$raw     = wp_unslash( $_POST['aegis_conditions'] );
			$decoded = json_decode( $raw, true );
			if ( is_array( $decoded ) ) {
				update_post_meta( $post_id, '_aegis_conditions', wp_json_encode( $decoded ) );
			} else {
				update_post_meta( $post_id, '_aegis_conditions', '' );
			}
		}
	}
}
