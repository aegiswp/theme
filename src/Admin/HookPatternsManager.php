<?php
/**
 * Hook Patterns Manager
 *
 * Manages custom block patterns that can be attached to theme hooks.
 * Provides admin interface for creating and managing hook patterns.
 *
 * @package    Aegis\Admin
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 */

declare( strict_types=1 );

namespace Aegis\Admin;

use WP_Post;
use function add_action;
use function add_filter;
use function register_post_type;
use function register_post_meta;
use function wp_register_script;
use function wp_register_style;
use function wp_enqueue_script;
use function wp_enqueue_style;
use function wp_localize_script;
use function wp_create_nonce;
use function get_template_directory_uri;
use function admin_url;
use function esc_html;
use function esc_html__;
use function esc_attr;
use function esc_attr__;
use function selected;
use function checked;
use function wp_nonce_field;
use function _x;
use function __;
use function get_post;
use function get_post_meta;
use function get_posts;
use function update_post_meta;
use function wp_parse_args;
use function apply_filters;
use function current_user_can;
use function wp_die;
use function check_admin_referer;
use function wp_redirect;
use function sanitize_text_field;
use function absint;
use function get_template_directory;
use function is_dir;
use function glob;
use function basename;
use function is_array;
use function ucfirst;
use function sprintf;
use function add_meta_box;
use function do_action;
use function is_admin;
use function defined;
use function wp_is_post_revision;
use function wp_is_post_autosave;
use function wp_verify_nonce;
use function wp_unslash;
use function wp_roles;
use function translate_user_role;
use function esc_html_e;
use function wp_json_encode;
use function json_decode;
use function esc_textarea;
use function wp_style_is;

/**
 * Hook Patterns Manager Class
 *
 * Handles registration, management, and rendering of hook patterns.
 */
class HookPatternsManager {

	/**
	 * Post type for hook patterns.
	 */
	public const POST_TYPE = 'aegis_hook_pattern';

	/**
	 * Option name for hook patterns settings.
	 */
	public const OPTION_NAME = 'aegis_hook_patterns';

	/**
	 * Default settings.
	 */
	public const DEFAULTS = [
		'enabled' => true,
		'cache_patterns' => true,
		'default_priority' => 10,
	];

	/**
	 * Available hooks.
	 *
	 * @var array|null
	 */
	private static ?array $available_hooks = null;

	/**
	 * Initialize the hook patterns manager.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function init(): void {
		$this->register_post_type();
		$this->register_meta_fields();

		if (is_admin()) {
			$this->register_admin_hooks();
		}
	}

	/**
	 * Register the custom post type for hook patterns.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	private function register_post_type(): void {
		register_post_type(
			self::POST_TYPE,
			[
				'labels' => [
					'name' => _x('Hooks', 'post type general name', 'aegis'),
					'singular_name' => _x('Hook', 'post type singular name', 'aegis'),
					'menu_name' => _x('Hooks', 'admin menu', 'aegis'),
					'add_new' => __('Add New', 'aegis'),
					'add_new_item' => __('Add New', 'aegis'),
					'edit_item' => __('Edit Hook Pattern', 'aegis'),
					'new_item' => __('New Hook Pattern', 'aegis'),
					'view_item' => __('View Hook Pattern', 'aegis'),
					'search_items' => __('Search Hook Patterns', 'aegis'),
					'not_found' => __('No hook patterns found.', 'aegis'),
					'not_found_in_trash' => __('No hook patterns found in trash.', 'aegis'),
				],
				'public' => false,
				'has_archive' => false,
				'show_ui' => true,
				'show_in_menu' => false,
				'show_in_admin_bar' => false,
				'show_in_rest' => true,
				'menu_icon' => 'dashicons-layout',
				'capability_type' => 'post',
				'capabilities' => [
					'create_posts' => 'manage_options',
					'edit_post' => 'manage_options',
					'edit_posts' => 'manage_options',
					'edit_others_posts' => 'manage_options',
					'publish_posts' => 'manage_options',
					'read_post' => 'manage_options',
					'read_private_posts' => 'manage_options',
					'delete_post' => 'manage_options',
				],
				'supports' => [
					'title',
					'editor',
					'revisions',
					'custom-fields',
				],
				'rewrite' => false,
			]
		);
	}

	/**
	 * Register meta fields for hook patterns.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	private function register_meta_fields(): void {
		register_post_meta(
			self::POST_TYPE,
			'_aegis_hook_name',
			[
				'type' => 'string',
				'description' => __('The hook to attach this pattern to.', 'aegis'),
				'single' => true,
				'show_in_rest' => true,
				'auth_callback' => function( $allowed, $meta_key, $post_id ) {
					return current_user_can( 'edit_post', $post_id );
				},
			]
		);

		register_post_meta(
			self::POST_TYPE,
			'_aegis_priority',
			[
				'type' => 'integer',
				'description' => __('Hook execution priority.', 'aegis'),
				'single' => true,
				'show_in_rest' => true,
				'auth_callback' => function( $allowed, $meta_key, $post_id ) {
					return current_user_can( 'edit_post', $post_id );
				},
			]
		);

		register_post_meta(
			self::POST_TYPE,
			'_aegis_enabled',
			[
				'type' => 'boolean',
				'description' => __('Whether the pattern is active.', 'aegis'),
				'single' => true,
				'show_in_rest' => true,
				'auth_callback' => function( $allowed, $meta_key, $post_id ) {
					return current_user_can( 'edit_post', $post_id );
				},
			]
		);

		// Single JSON field for all conditional logic (registered for all post types).
		register_post_meta(
			'',
			'_aegis_conditions',
			[
				'type'          => 'string',
				'description'   => __('JSON-encoded conditional logic rules.', 'aegis'),
				'single'        => true,
				'show_in_rest'  => true,
				'default'       => '',
				'auth_callback' => function( $allowed, $meta_key, $post_id ) {
					return current_user_can( 'edit_post', $post_id );
				},
			]
		);
	}

	/**
	 * Register admin hooks.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	private function register_admin_hooks(): void {
		add_action('admin_enqueue_scripts', [$this, 'enqueue_admin_scripts']);
		add_action('save_post_' . self::POST_TYPE, [$this, 'save_pattern_meta']);
		add_action('save_post', [$this, 'save_conditions_meta']);
		add_action('add_meta_boxes_' . self::POST_TYPE, [$this, 'add_meta_boxes']);
		add_action('add_meta_boxes', [$this, 'add_conditions_meta_box']);

		// Custom columns for the list table
		add_filter('manage_' . self::POST_TYPE . '_posts_columns', [$this, 'add_custom_columns']);
		add_action('manage_' . self::POST_TYPE . '_posts_custom_column', [$this, 'render_custom_column'], 10, 2);
		add_filter('manage_edit-' . self::POST_TYPE . '_sortable_columns', [$this, 'sortable_columns']);
	}

	/**
	 * Enqueue admin scripts and styles.
	 *
	 * @since 1.0.0
	 *
	 * @param string $hook Current admin page.
	 *
	 * @return void
	 */
	public function enqueue_admin_scripts(string $hook): void {
		global $post_type;

		if (! in_array($hook, ['post.php', 'post-new.php'], true)) {
			return;
		}

		// Hook-specific assets — only on aegis_hook_pattern.
		if ($post_type === self::POST_TYPE) {
			wp_enqueue_style(
				'aegis-hook-patterns-admin',
				get_template_directory_uri() . '/src/Admin/css/hook-patterns.css',
				[],
				'1.0.0'
			);

			wp_enqueue_script(
				'aegis-hook-patterns-admin',
				get_template_directory_uri() . '/src/Admin/js/hook-patterns.js',
				[],
				'1.0.0',
				true
			);

			wp_localize_script(
				'aegis-hook-patterns-admin',
				'aegisHookPatterns',
				[
					'availableHooks' => $this->get_available_hooks(),
					'nonce' => wp_create_nonce('aegis_hook_patterns_nonce'),
					'defaultPriority' => self::DEFAULTS['default_priority'],
				]
			);
		}

		// Conditions UI — on all post types that have the block editor.
		$settings = ConditionalLogicSettings::get_settings();
		$has_any_enabled = false;
		foreach ($settings as $group => $features) {
			if (is_array($features)) {
				foreach ($features as $enabled) {
					if ($enabled) {
						$has_any_enabled = true;
						break 2;
					}
				}
			}
		}

		if (! $has_any_enabled) {
			return;
		}

		// Enqueue conditions CSS (shared styles) — skip if already loaded by hook-patterns.
		if (! wp_style_is('aegis-hook-patterns-admin', 'enqueued')) {
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
	 * Save pattern meta fields.
	 *
	 * @since 1.0.0
	 *
	 * @param int $post_id Post ID.
	 *
	 * @return void
	 */
	public function save_pattern_meta(int $post_id): void {
		// Bail on autosave, revision, or AJAX auto-draft creation.
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return;
		}

		if (wp_is_post_revision($post_id) || wp_is_post_autosave($post_id)) {
			return;
		}

		// Verify our custom nonce — absent on auto-draft, so just bail.
		if (!isset($_POST['aegis_hook_pattern_nonce'])
			|| !wp_verify_nonce(wp_unslash($_POST['aegis_hook_pattern_nonce']), 'aegis_save_hook_pattern')
		) {
			return;
		}

		if (!current_user_can('edit_post', $post_id)) {
			return;
		}

		// Save hook name
		if (isset($_POST['aegis_hook_name'])) {
			$hook_name = sanitize_text_field(wp_unslash($_POST['aegis_hook_name']));
			update_post_meta($post_id, '_aegis_hook_name', $hook_name);
		}

		// Save priority
		if (isset($_POST['aegis_priority'])) {
			$priority = absint($_POST['aegis_priority']);
			update_post_meta($post_id, '_aegis_priority', $priority);
		}

		// Save enabled status
		$enabled = isset($_POST['aegis_enabled']) ? '1' : '0';
		update_post_meta($post_id, '_aegis_enabled', $enabled);

		// Save conditional logic JSON.
		if (isset($_POST['aegis_conditions'])) {
			$raw = wp_unslash($_POST['aegis_conditions']);
			$decoded = json_decode($raw, true);
			if (is_array($decoded)) {
				update_post_meta($post_id, '_aegis_conditions', wp_json_encode($decoded));
			} else {
				update_post_meta($post_id, '_aegis_conditions', '');
			}
		}
	}

	/**
	 * Add meta boxes to the pattern editor.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Post $post Post object.
	 *
	 * @return void
	 */
	public function add_meta_boxes(WP_Post $post): void {
		add_meta_box(
			'aegis_hook_pattern_settings',
			__('Hooks', 'aegis'),
			[$this, 'render_meta_box'],
			self::POST_TYPE,
			'side',
			'high'
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
	public function add_conditions_meta_box(string $post_type): void {
		// Only show if at least one conditional logic setting is enabled.
		$settings = ConditionalLogicSettings::get_settings();
		$has_any = false;
		foreach ($settings as $features) {
			if (is_array($features)) {
				foreach ($features as $enabled) {
					if ($enabled) {
						$has_any = true;
						break 2;
					}
				}
			}
		}

		if (! $has_any) {
			return;
		}

		// Only register on post types that support the editor.
		$post_type_object = \get_post_type_object($post_type);
		if (! $post_type_object || ! $post_type_object->show_in_rest) {
			return;
		}

		add_meta_box(
			'aegis_conditions',
			__('Conditionals', 'aegis'),
			[$this, 'render_conditions_meta_box'],
			$post_type,
			'side',
			'default'
		);
	}

	/**
	 * Render the meta box content.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Post $post Post object.
	 *
	 * @return void
	 */
	public function render_meta_box(WP_Post $post): void {
		$hook_name = get_post_meta($post->ID, '_aegis_hook_name', true);
		$priority = get_post_meta($post->ID, '_aegis_priority', true) ?: self::DEFAULTS['default_priority'];
		$enabled = get_post_meta($post->ID, '_aegis_enabled', true);

		wp_nonce_field('aegis_save_hook_pattern', 'aegis_hook_pattern_nonce');
		?>
		<div class="aegis-hook-pattern-settings">
			<div class="aegis-field">
				<label for="aegis_hook_name"><?php esc_html_e('Hook Name', 'aegis'); ?></label>
				<select id="aegis_hook_name" name="aegis_hook_name">
					<option value=""><?php esc_html_e('Select a hook...', 'aegis'); ?></option>
					<?php foreach ($this->get_available_hooks() as $group => $hooks): ?>
						<optgroup label="<?php echo esc_attr($group); ?>">
							<?php foreach ($hooks as $hook => $description): ?>
								<option value="<?php echo esc_attr($hook); ?>" <?php selected($hook_name, $hook); ?>>
									<?php echo esc_html($hook); ?> - <?php echo esc_html($description); ?>
								</option>
							<?php endforeach; ?>
						</optgroup>
					<?php endforeach; ?>
				</select>
			</div>

			<div class="aegis-field">
				<label for="aegis_priority"><?php esc_html_e('Priority', 'aegis'); ?></label>
				<input type="number" id="aegis_priority" name="aegis_priority"
					   value="<?php echo esc_attr($priority); ?>" />
				<p class="description">
					<?php esc_html_e('Lower numbers run earlier. Default: 10', 'aegis'); ?>
				</p>
			</div>

			<div class="aegis-field aegis-field--toggle">
				<span class="aegis-toggle-label"><?php esc_html_e('Enable this pattern', 'aegis'); ?></span>
				<label class="aegis-toggle" for="aegis_enabled">
					<input type="checkbox" id="aegis_enabled" name="aegis_enabled"
						   value="1" <?php checked($enabled); ?> />
					<span class="aegis-toggle-track"></span>
				</label>
			</div>
		</div>
		<?php
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
	public function render_conditions_meta_box(WP_Post $post): void {
		$raw = get_post_meta($post->ID, '_aegis_conditions', true);
		$conditions = ! empty($raw) ? json_decode($raw, true) : [];
		if (! is_array($conditions)) {
			$conditions = [];
		}

		// Gather role options for the JS UI.
		$roles = [];
		$wp_roles = wp_roles();
		foreach ($wp_roles->role_names as $slug => $name) {
			$roles[] = ['value' => $slug, 'label' => translate_user_role($name)];
		}

		// Detect pro plugin.
		$has_pro = defined('AEGIS_PRO_VERSION');

		// Admin panel settings for gating sections.
		$cl_settings = ConditionalLogicSettings::get_settings();

		wp_nonce_field('aegis_save_conditions', 'aegis_conditions_nonce');
		?>
		<textarea id="aegis_conditions" name="aegis_conditions" class="hidden"><?php
			echo esc_textarea(wp_json_encode($conditions));
		?></textarea>
		<div id="aegis-conditions-ui" class="aegis-conditions-ui"></div>
		<script>
			window.aegisConditionsConfig = {
				conditions: <?php echo wp_json_encode($conditions); ?>,
				roles: <?php echo wp_json_encode($roles); ?>,
				hasPro: <?php echo $has_pro ? 'true' : 'false'; ?>,
				settings: <?php echo wp_json_encode($cl_settings); ?>,
				postType: <?php echo wp_json_encode($post->post_type); ?>,
			};
		</script>
		<?php
	}

	/**
	 * Save conditional logic meta for any post type.
	 *
	 * Fires on `save_post` for all post types. Hook-pattern-specific
	 * meta (hook name, priority, enabled) is saved by save_pattern_meta().
	 *
	 * @since 1.0.0
	 *
	 * @param int $post_id Post ID.
	 *
	 * @return void
	 */
	public function save_conditions_meta(int $post_id): void {
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return;
		}

		if (wp_is_post_revision($post_id) || wp_is_post_autosave($post_id)) {
			return;
		}

		// Skip hook patterns — handled by save_pattern_meta().
		if (get_post($post_id) && get_post($post_id)->post_type === self::POST_TYPE) {
			return;
		}

		if (! isset($_POST['aegis_conditions_nonce'])
			|| ! wp_verify_nonce(wp_unslash($_POST['aegis_conditions_nonce']), 'aegis_save_conditions')
		) {
			return;
		}

		if (! current_user_can('edit_post', $post_id)) {
			return;
		}

		if (isset($_POST['aegis_conditions'])) {
			$raw = wp_unslash($_POST['aegis_conditions']);
			$decoded = json_decode($raw, true);
			if (is_array($decoded)) {
				update_post_meta($post_id, '_aegis_conditions', wp_json_encode($decoded));
			} else {
				update_post_meta($post_id, '_aegis_conditions', '');
			}
		}
	}

	/**
	 * Get available hooks.
	 *
	 * @since 1.0.0
	 *
	 * @return array Available hooks grouped by category.
	 */
	public function get_available_hooks(): array {
		if (self::$available_hooks !== null) {
			return self::$available_hooks;
		}

		$hooks = [
			'template-parts' => [],
			'content'        => [],
		];

		// Collect unique template-part slugs from filesystem and database.
		$slugs = [];

		// 1. Auto-detect from parts/ directory (theme files).
		$parts_dir = get_template_directory() . '/parts';
		if (is_dir($parts_dir)) {
			$parts = glob($parts_dir . '/*.html');
			foreach ($parts as $part) {
				$slugs[] = basename($part, '.html');
			}
		}

		// 2. Scan database for user-created template parts (Site Editor).
		$db_parts = get_posts([
			'post_type'      => 'wp_template_part',
			'post_status'    => 'publish',
			'posts_per_page' => 100,
			'fields'         => 'ids',
		]);
		foreach ($db_parts as $part_id) {
			$post = get_post($part_id);
			if ($post && $post->post_name) {
				$slugs[] = $post->post_name;
			}
		}

		// De-duplicate and generate before/after hooks for each slug.
		$slugs = array_unique($slugs);
		sort($slugs);

		foreach ($slugs as $slug) {
			$label = ucfirst(str_replace(['-', '_'], ' ', $slug));
			$hooks['template-parts']["aegis_before_{$slug}"] = sprintf(
				__('Before %s template part', 'aegis'),
				$label
			);
			$hooks['template-parts']["aegis_after_{$slug}"] = sprintf(
				__('After %s template part', 'aegis'),
				$label
			);
		}

		// Content hooks (fired around core/post-content block).
		$hooks['content'] = [
			'aegis_before_content' => __('Before post content', 'aegis'),
			'aegis_after_content'  => __('After post content', 'aegis'),
		];

		// Allow themes/plugins to add custom hooks.
		$custom_hooks = apply_filters('aegis_available_hook_patterns', []);
		if (is_array($custom_hooks) && $custom_hooks) {
			$hooks['content'] = array_merge($hooks['content'], $custom_hooks);
		}

		self::$available_hooks = $hooks;
		return $hooks;
	}

	/**
	 * Get active patterns for a specific hook.
	 *
	 * @since 1.0.0
	 *
	 * @param string $hook Hook name.
	 *
	 * @return array Active patterns for the hook.
	 */
	public function get_active_patterns_for_hook(string $hook): array {
		$args = [
			'post_type' => self::POST_TYPE,
			'post_status' => 'publish',
			'posts_per_page' => -1,
			'meta_query' => [
				[
					'key' => '_aegis_hook_name',
					'value' => $hook,
				],
				[
					'key' => '_aegis_enabled',
					'value' => '1',
				],
			],
			'orderby' => [
				'meta_value_num' => 'ASC',
				'date' => 'DESC',
			],
			'meta_key' => '_aegis_priority',
		];

		return get_posts($args);
	}

	/**
	 * Add custom columns to the list table.
	 *
	 * @since 1.0.0
	 *
	 * @param array $columns Existing columns.
	 *
	 * @return array Modified columns.
	 */
	public function add_custom_columns(array $columns): array {
		$new_columns = [];

		foreach ($columns as $key => $label) {
			$new_columns[$key] = $label;

			// Insert custom columns after the title column
			if ($key === 'title') {
				$new_columns['aegis_hook_name'] = __('Hook', 'aegis');
				$new_columns['aegis_priority'] = __('Priority', 'aegis');
				$new_columns['aegis_enabled'] = __('Status', 'aegis');
			}
		}

		return $new_columns;
	}

	/**
	 * Render custom column content.
	 *
	 * @since 1.0.0
	 *
	 * @param string $column  Column name.
	 * @param int    $post_id Post ID.
	 *
	 * @return void
	 */
	public function render_custom_column(string $column, int $post_id): void {
		switch ($column) {
			case 'aegis_hook_name':
				$hook_name = get_post_meta($post_id, '_aegis_hook_name', true);
				if ($hook_name) {
					echo '<code>' . esc_html($hook_name) . '</code>';
				} else {
					echo '<em>' . esc_html__('Not set', 'aegis') . '</em>';
				}
				break;

			case 'aegis_priority':
				$priority = get_post_meta($post_id, '_aegis_priority', true);
				echo esc_html($priority ?: (string) self::DEFAULTS['default_priority']);
				break;

			case 'aegis_enabled':
				$enabled = get_post_meta($post_id, '_aegis_enabled', true);
				if ($enabled) {
					echo '<span class="aegis-hook-status enabled">' . esc_html__('Active', 'aegis') . '</span>';
				} else {
					echo '<span class="aegis-hook-status disabled">' . esc_html__('Inactive', 'aegis') . '</span>';
				}
				break;
		}
	}

	/**
	 * Define sortable columns.
	 *
	 * @since 1.0.0
	 *
	 * @param array $columns Sortable columns.
	 *
	 * @return array Modified sortable columns.
	 */
	public function sortable_columns(array $columns): array {
		$columns['aegis_hook_name'] = '_aegis_hook_name';
		$columns['aegis_priority'] = '_aegis_priority';
		$columns['aegis_enabled'] = '_aegis_enabled';

		return $columns;
	}
}
