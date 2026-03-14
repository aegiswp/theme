<?php
/**
 * Admin Renderer
 *
 * All admin page render methods and reusable UI component helpers
 * for the Aegis settings dashboard.
 *
 * @package Aegis
 * @since   1.0.0
 */

declare(strict_types=1);

namespace Aegis\Admin;

/**
 * Admin Renderer class.
 */
class AdminRenderer
{
	/**
	 * Render main settings page.
	 *
	 * @return void
	 */
	public function render_settings_page(): void
	{
		?>
		<div class="wrap aegis-admin-wrap">
			<h1><?php esc_html_e('Aegis Settings', 'aegis'); ?></h1>
			<p><?php esc_html_e('Welcome to Aegis. Use the submenu to access specific settings.', 'aegis'); ?></p>
		</div>
		<?php
	}

	/**
	 * Render the top header bar with logo and links.
	 *
	 * @return void
	 */
	public function render_top_bar(): void
	{
		?>
		<div class="aegis-top-bar">
			<div class="aegis-top-bar-left">
				<div class="aegis-top-bar-title">
					<svg viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" d="M10.06 7.75 L12.02 3.87 L13.95 7.72 L16.65 9.29 L12.03 0 L7.34 9.3 L10.06 7.75 Z M18.37 12.72 L18.2 12.36 L15.5 10.79 L17.02 13.68 L20.05 18.61 L12.02 15.17 L3.98 18.62 L6.96 13.68 L8.39 10.81 L5.67 12.39 L5.5 12.71 L0 22.87 L12.01 16.87 L24 22.94 L18.37 12.72 Z"/>
					</svg>
					<span><?php esc_html_e('Native Block Framework', 'aegis'); ?></span>
				</div>
			</div>
			<div class="aegis-top-bar-right">
				<a href="https://github.com/aegiswp/theme" target="_blank" rel="noopener noreferrer" class="aegis-top-bar-link">
					<span class="dashicons dashicons-editor-code"></span>
					<span><?php esc_html_e('GitHub', 'aegis'); ?></span>
				</a>
				<?php if (!$this->is_aegis_pro_active()): ?>
				<a href="https://paypal.me/aedonation" target="_blank" rel="noopener noreferrer" class="aegis-top-bar-link">
					<span class="dashicons dashicons-heart"></span>
					<span><?php esc_html_e('Donate', 'aegis'); ?></span>
				</a>
				<?php endif; ?>
				<a href="https://www.facebook.com/groups/aegiswp" target="_blank" rel="noopener noreferrer" class="aegis-top-bar-link">
					<span class="dashicons dashicons-groups"></span>
					<span><?php esc_html_e('Support', 'aegis'); ?></span>
				</a>
			</div>
		</div>
		<?php
	}

	/**
	 * Render the page tabs navigation.
	 *
	 * @param string $active_tab The currently active tab.
	 * @return void
	 */
	public function render_page_tabs(string $active_tab = 'dashboard'): void
	{
		$tabs = [
			'dashboard' => [
				'label' => __('Dashboard', 'aegis'),
				'url'   => admin_url('admin.php?page=aegis-dashboard'),
			],
			'blocks' => [
				'label' => __('Blocks', 'aegis'),
				'url'   => admin_url('admin.php?page=aegis-blocks'),
			],
			'modals' => [
				'label' => __('Modals', 'aegis'),
				'url'   => admin_url('admin.php?page=aegis-modals'),
			],
			'hook-patterns' => [
				'label' => __('Hooks', 'aegis'),
				'url'   => admin_url('admin.php?page=aegis-hook-patterns'),
			],
			'conditional-logic' => [
				'label' => __('Conditionals', 'aegis'),
				'url'   => admin_url('admin.php?page=aegis-settings'),
			],
			'integrations' => [
				'label' => __('Integrations', 'aegis'),
				'url'   => admin_url('admin.php?page=aegis-integrations'),
			],
			'analytics' => [
				'label' => __('Analytics', 'aegis'),
				'url'   => admin_url('admin.php?page=aegis-analytics'),
			],
			'general-settings' => [
				'label' => __('Settings', 'aegis'),
				'url'   => admin_url('admin.php?page=aegis-general-settings'),
			],
			'license' => [
				'label' => __('License', 'aegis'),
				'url'   => admin_url('admin.php?page=aegis-license'),
			],
		];

		$tabs = apply_filters('aegis_admin_tabs', $tabs);

		?>
		<div class="aegis-page-tabs" role="tablist">
			<?php foreach ($tabs as $tab_key => $tab) : ?>
				<a href="<?php echo esc_url($tab['url']); ?>"
				   class="aegis-page-tab <?php echo $active_tab === $tab_key ? 'active' : ''; ?>"
				   role="tab"
				   aria-selected="<?php echo $active_tab === $tab_key ? 'true' : 'false'; ?>">
					<?php echo esc_html($tab['label']); ?>
				</a>
			<?php endforeach; ?>
		</div>
		<?php
	}

	/**
	 * Render a toggle control.
	 *
	 * @param string $group   Settings group.
	 * @param string $key     Setting key.
	 * @param string $label   Toggle label.
	 * @param string $desc    Toggle description.
	 * @param array  $options Current options.
	 * @param string $icon    Optional dashicon name.
	 * @return void
	 */
	private function render_toggle(string $group, string $key, string $label, string $desc, array $options, string $icon = 'admin-generic'): void
	{
		$name = SettingsRepository::OPTION_NAME . "[{$group}][{$key}]";
		$checked = $options[$group][$key] ?? SettingsRepository::DEFAULTS[$group][$key];
		?>
		<div class="aegis-toggle-card aegis-toggle-subcard">
			<div class="aegis-toggle-info">
				<div class="aegis-toggle-icon">
					<span class="dashicons dashicons-<?php echo esc_attr($icon); ?>"></span>
				</div>
				<div class="aegis-toggle-text">
					<h3><?php echo esc_html($label); ?></h3>
					<p><?php echo esc_html($desc); ?></p>
				</div>
			</div>
			<label class="aegis-toggle">
				<input type="checkbox" name="<?php echo esc_attr($name); ?>" value="1" <?php checked($checked); ?>>
				<span class="aegis-toggle-slider"></span>
			</label>
		</div>
		<?php
	}

	/**
	 * Render a block toggle control.
	 *
	 * @param string $key     Setting key.
	 * @param string $label   Toggle label.
	 * @param string $desc    Toggle description.
	 * @param array  $options Current options.
	 * @return void
	 */
	private function render_block_toggle(string $key, string $label, string $desc, array $options, string $icon = 'block-default'): void
	{
		$name = SettingsRepository::BLOCKS_OPTION . "[{$key}]";
		$checked = $options[$key] ?? SettingsRepository::BLOCKS_DEFAULTS[$key];
		?>
		<div class="aegis-toggle-card">
			<div class="aegis-toggle-info">
				<div class="aegis-toggle-icon">
					<span class="dashicons dashicons-<?php echo esc_attr($icon); ?>"></span>
				</div>
				<div class="aegis-toggle-text">
					<h3><?php echo esc_html($label); ?></h3>
					<p><?php echo esc_html($desc); ?></p>
				</div>
			</div>
			<label class="aegis-toggle">
				<input type="checkbox" name="<?php echo esc_attr($name); ?>" value="1" <?php checked($checked); ?>>
				<span class="aegis-toggle-slider"></span>
			</label>
		</div>
		<?php
	}

	/**
	 * Render a block toggle control with features support.
	 *
	 * @param string $key     Setting key.
	 * @param string $label   Toggle label.
	 * @param string $desc    Toggle description.
	 * @param array  $options Current options.
	 * @param string $icon    Dashicon name.
	 * @return void
	 */
	private function render_block_toggle_with_features(string $key, string $label, string $desc, array $options, string $icon = 'block-default'): void
	{
		$name = SettingsRepository::BLOCKS_OPTION . "[{$key}]";
		$checked = $options[$key] ?? SettingsRepository::BLOCKS_DEFAULTS[$key];
		?>
		<div class="aegis-toggle-card aegis-toggle-main">
			<div class="aegis-toggle-info">
				<div class="aegis-toggle-icon">
					<span class="dashicons dashicons-<?php echo esc_attr($icon); ?>"></span>
				</div>
				<div class="aegis-toggle-text">
					<h3><?php echo esc_html($label); ?></h3>
					<p><?php echo esc_html($desc); ?></p>
				</div>
			</div>
			<label class="aegis-toggle">
				<input type="checkbox" name="<?php echo esc_attr($name); ?>" value="1" <?php checked($checked); ?> class="aegis-block-main-toggle">
				<span class="aegis-toggle-slider"></span>
			</label>
		</div>
		<?php
	}

	/**
	 * Render a block feature toggle control (sub-option).
	 *
	 * @param string $key            Setting key.
	 * @param string $label          Toggle label.
	 * @param string $desc           Toggle description.
	 * @param array  $options        Current options.
	 * @param string $icon           Dashicon name.
	 * @param bool   $is_pro         Whether this is a Pro feature.
	 * @param bool   $force_disabled Force the toggle to be disabled (e.g., when handled by another plugin).
	 * @return void
	 */
	private function render_block_feature_toggle(string $key, string $label, string $desc, array $options, string $icon = 'admin-generic', bool $is_pro = false, bool $force_disabled = false): void
	{
		$name = SettingsRepository::BLOCKS_OPTION . "[{$key}]";
		$checked = $options[$key] ?? SettingsRepository::BLOCKS_DEFAULTS[$key] ?? false;
		$has_pro = $this->is_aegis_pro_active();
		$is_disabled = ($is_pro && !$has_pro) || $force_disabled;
		
		$classes = 'aegis-toggle-card aegis-toggle-subcard';
		if ($is_pro && !$has_pro) {
			$classes .= ' aegis-pro-feature';
		}
		if ($is_disabled) {
			$classes .= ' aegis-toggle-disabled';
		}
		?>
		<div class="<?php echo esc_attr($classes); ?>">
			<div class="aegis-toggle-info">
				<div class="aegis-toggle-icon">
					<span class="dashicons dashicons-<?php echo esc_attr($icon); ?>"></span>
				</div>
				<div class="aegis-toggle-text">
					<h3>
						<?php echo esc_html($label); ?>
						<?php if ($is_pro && !$has_pro): ?>
							<span class="aegis-pro-badge">
								<span class="dashicons dashicons-star-filled"></span>
								<?php echo $has_pro ? esc_html__('Pro', 'aegis') : esc_html__('Pro Feature', 'aegis'); ?>
							</span>
						<?php endif; ?>
					</h3>
					<p><?php echo esc_html($desc); ?></p>
				</div>
			</div>
			<label class="aegis-toggle">
				<input type="checkbox" name="<?php echo esc_attr($name); ?>" value="1" <?php checked($checked); ?> <?php disabled($is_disabled); ?>>
				<span class="aegis-toggle-slider"></span>
			</label>
		</div>
		<?php
	}

	/**
	 * Check if Aegis Pro plugin is active.
	 *
	 * @return bool
	 */
	private function is_aegis_pro_active(): bool
	{
		return defined('AEGIS_PRO_VERSION') || class_exists('Aegis_Pro') || class_exists('AegisPro\\Plugin');
	}

	/**
	 * Render an integration toggle control.
	 *
	 * @param string $key     Setting key.
	 * @param string $label   Toggle label.
	 * @param string $desc    Toggle description.
	 * @param array  $options Current options.
	 * @param string $plugin_check Plugin check identifier.
	 * @return void
	 */
	private function render_integration_toggle(string $key, string $label, string $desc, array $options, string $plugin_check = '', string $icon = 'admin-plugins'): void
	{
		$name = SettingsRepository::INTEGRATIONS_OPTION . "[{$key}]";
		$checked = $options[$key] ?? SettingsRepository::INTEGRATION_DEFAULTS[$key];
		$plugin_status = $this->get_plugin_status($plugin_check);
		$is_installed = $plugin_status['class'] === 'active';
		$is_enabled = $is_installed && $checked;
		?>
		<div class="aegis-toggle-card <?php echo !$is_installed ? 'aegis-toggle-disabled' : ''; ?>">
			<div class="aegis-toggle-info">
				<div class="aegis-toggle-icon">
					<span class="dashicons dashicons-<?php echo esc_attr($icon); ?>"></span>
				</div>
				<div class="aegis-toggle-text">
					<h3>
						<?php echo esc_html($label); ?>
						<?php if ($plugin_check): ?>
							<span class="aegis-plugin-status <?php echo esc_attr($plugin_status['class']); ?>">
								<?php echo esc_html($plugin_status['label']); ?>
							</span>
						<?php endif; ?>
					</h3>
					<p><?php echo esc_html($desc); ?></p>
				</div>
			</div>
			<label class="aegis-toggle">
				<input type="checkbox" name="<?php echo esc_attr($name); ?>" value="1" <?php checked($checked); ?> <?php disabled(!$is_installed); ?>>
				<span class="aegis-toggle-slider"></span>
			</label>
		</div>
		<?php 
		// Video Sitemap option for Rank Math - Pro feature
		if ($key === 'rank_math' && $is_installed): 
			$video_sitemap_key = 'rank_math_video_sitemap';
			$video_sitemap_checked = $options[$video_sitemap_key] ?? false;
			$pro_active = $this->is_aegis_pro_active();
		?>
		<div class="aegis-toggle-suboptions">
			<div class="aegis-toggle-card aegis-toggle-subcard <?php echo !$pro_active ? 'aegis-pro-feature aegis-toggle-disabled' : ''; ?>">
				<div class="aegis-toggle-info">
					<div class="aegis-toggle-icon">
						<span class="dashicons dashicons-video-alt3"></span>
					</div>
					<div class="aegis-toggle-text">
						<h3>
							<?php esc_html_e('Video Sitemap', 'aegis'); ?>
							<?php if (!$pro_active): ?>
							<span class="aegis-pro-badge">
								<span class="dashicons dashicons-star-filled"></span>
								<?php esc_html_e('Pro', 'aegis'); ?>
							</span>
							<?php endif; ?>
						</h3>
						<p><?php esc_html_e('Let Rank Math handle Video Sitemap instead of the Core Video Block. When enabled, the Video Block\'s built-in sitemap is disabled.', 'aegis'); ?></p>
					</div>
				</div>
				<label class="aegis-toggle">
					<input type="checkbox" name="<?php echo esc_attr(SettingsRepository::INTEGRATIONS_OPTION . "[{$video_sitemap_key}]"); ?>" value="1" <?php checked($video_sitemap_checked); ?> <?php disabled(!$pro_active); ?>>
					<span class="aegis-toggle-slider"></span>
				</label>
			</div>

			<div class="aegis-toggle-card aegis-toggle-subcard">
				<div class="aegis-toggle-info">
					<div class="aegis-toggle-icon">
						<span class="dashicons dashicons-editor-help"></span>
					</div>
					<div class="aegis-toggle-text">
						<h3><?php esc_html_e('FAQ Schema', 'aegis'); ?></h3>
						<p><?php esc_html_e('Let Rank Math handle FAQ Schema for Accordion and Toggle blocks. When enabled, built-in FAQPage markup is suppressed.', 'aegis'); ?></p>
					</div>
				</div>
				<label class="aegis-toggle">
					<input type="checkbox" name="<?php echo esc_attr(SettingsRepository::INTEGRATIONS_OPTION . '[rank_math_faq_schema]'); ?>" value="1" <?php checked($options['rank_math_faq_schema'] ?? false); ?>>
					<span class="aegis-toggle-slider"></span>
				</label>
			</div>

			<div class="aegis-toggle-card aegis-toggle-subcard">
				<div class="aegis-toggle-info">
					<div class="aegis-toggle-icon">
						<span class="dashicons dashicons-calendar-alt"></span>
					</div>
					<div class="aegis-toggle-text">
						<h3><?php esc_html_e('Event Schema', 'aegis'); ?></h3>
						<p><?php esc_html_e('Let Rank Math handle Event Schema for the Countdown block. When enabled, built-in Event markup is suppressed.', 'aegis'); ?></p>
					</div>
				</div>
				<label class="aegis-toggle">
					<input type="checkbox" name="<?php echo esc_attr(SettingsRepository::INTEGRATIONS_OPTION . '[rank_math_event_schema]'); ?>" value="1" <?php checked($options['rank_math_event_schema'] ?? false); ?>>
					<span class="aegis-toggle-slider"></span>
				</label>
			</div>

			<div class="aegis-toggle-card aegis-toggle-subcard">
				<div class="aegis-toggle-info">
					<div class="aegis-toggle-icon">
						<span class="dashicons dashicons-location"></span>
					</div>
					<div class="aegis-toggle-text">
						<h3><?php esc_html_e('Local Business Schema', 'aegis'); ?></h3>
						<p><?php esc_html_e('Let Rank Math handle Local Business Schema for the Map block. When enabled, built-in LocalBusiness markup is suppressed.', 'aegis'); ?></p>
					</div>
				</div>
				<label class="aegis-toggle">
					<input type="checkbox" name="<?php echo esc_attr(SettingsRepository::INTEGRATIONS_OPTION . '[rank_math_local_schema]'); ?>" value="1" <?php checked($options['rank_math_local_schema'] ?? false); ?>>
					<span class="aegis-toggle-slider"></span>
				</label>
			</div>

			<div class="aegis-toggle-card aegis-toggle-subcard">
				<div class="aegis-toggle-info">
					<div class="aegis-toggle-icon">
						<span class="dashicons dashicons-format-video"></span>
					</div>
					<div class="aegis-toggle-text">
						<h3><?php esc_html_e('Video Schema', 'aegis'); ?></h3>
						<p><?php esc_html_e('Let Rank Math handle Video Schema for the Video block. When enabled, built-in VideoObject markup is suppressed.', 'aegis'); ?></p>
					</div>
				</div>
				<label class="aegis-toggle">
					<input type="checkbox" name="<?php echo esc_attr(SettingsRepository::INTEGRATIONS_OPTION . '[rank_math_video_schema]'); ?>" value="1" <?php checked($options['rank_math_video_schema'] ?? false); ?>>
					<span class="aegis-toggle-slider"></span>
				</label>
			</div>
		</div>
		<?php endif; ?>
		<?php 
		// Co-Authors Plus sub-options
		if ($key === 'co_authors_plus'): 
			$pro_active = $this->is_aegis_pro_active();
			$cap_social_checked = $options['cap_social_links'] ?? false;
			$cap_roles_checked = $options['cap_role_badges'] ?? false;
			$cap_pattern_options = get_option('aegis_pattern_control', []);
			$cap_keep_patterns = $cap_pattern_options['coauthors_keep_patterns'] ?? false;
		?>
		<div class="aegis-toggle-suboptions">
			<div class="aegis-toggle-card aegis-toggle-subcard">
				<div class="aegis-toggle-info">
					<div class="aegis-toggle-icon">
						<span class="dashicons dashicons-admin-site-alt3"></span>
					</div>
					<div class="aegis-toggle-text">
						<h3><?php esc_html_e('Author Schema', 'aegis'); ?></h3>
						<p><?php esc_html_e('Outputs JSON-LD Person schema for each co-author on singular posts.', 'aegis'); ?></p>
					</div>
				</div>
			</div>

			<?php
			$cap_social_key = 'cap_social_links';
			?>
			<div class="aegis-toggle-card aegis-toggle-subcard <?php echo !$pro_active ? 'aegis-pro-feature aegis-toggle-disabled' : ''; ?>">
				<div class="aegis-toggle-info">
					<div class="aegis-toggle-icon">
						<span class="dashicons dashicons-share"></span>
					</div>
					<div class="aegis-toggle-text">
						<h3>
							<?php esc_html_e('Social Links', 'aegis'); ?>
							<?php if (!$pro_active): ?>
							<span class="aegis-pro-badge">
								<span class="dashicons dashicons-star-filled"></span>
								<?php esc_html_e('Pro', 'aegis'); ?>
							</span>
							<?php endif; ?>
						</h3>
						<p><?php esc_html_e('Display social media links for each guest author (Facebook, LinkedIn, GitHub, Instagram, Bluesky, Website).', 'aegis'); ?></p>
					</div>
				</div>
				<label class="aegis-toggle">
					<input type="checkbox" name="<?php echo esc_attr(SettingsRepository::INTEGRATIONS_OPTION . "[{$cap_social_key}]"); ?>" value="1" <?php checked($cap_social_checked); ?> <?php disabled(!$pro_active); ?>>
					<span class="aegis-toggle-slider"></span>
				</label>
			</div>

			<?php
			$cap_roles_key = 'cap_role_badges';
			?>
			<div class="aegis-toggle-card aegis-toggle-subcard <?php echo !$pro_active ? 'aegis-pro-feature aegis-toggle-disabled' : ''; ?>">
				<div class="aegis-toggle-info">
					<div class="aegis-toggle-icon">
						<span class="dashicons dashicons-nametag"></span>
					</div>
					<div class="aegis-toggle-text">
						<h3>
							<?php esc_html_e('Role Badges', 'aegis'); ?>
							<?php if (!$pro_active): ?>
							<span class="aegis-pro-badge">
								<span class="dashicons dashicons-star-filled"></span>
								<?php esc_html_e('Pro', 'aegis'); ?>
							</span>
							<?php endif; ?>
						</h3>
						<p><?php esc_html_e('Show contribution role badges below author names (e.g., Researcher, Editor, Photographer).', 'aegis'); ?></p>
					</div>
				</div>
				<label class="aegis-toggle">
					<input type="checkbox" name="<?php echo esc_attr(SettingsRepository::INTEGRATIONS_OPTION . "[{$cap_roles_key}]"); ?>" value="1" <?php checked($cap_roles_checked); ?> <?php disabled(!$pro_active); ?>>
					<span class="aegis-toggle-slider"></span>
				</label>
			</div>

			<div class="aegis-toggle-card aegis-toggle-subcard <?php echo !$pro_active ? 'aegis-pro-feature aegis-toggle-disabled' : ''; ?>">
				<div class="aegis-toggle-info">
					<div class="aegis-toggle-icon">
						<span class="dashicons dashicons-layout"></span>
					</div>
					<div class="aegis-toggle-text">
						<h3>
							<?php esc_html_e('Co-Authors Plus Patterns', 'aegis'); ?>
							<?php if (!$pro_active): ?>
							<span class="aegis-pro-badge">
								<span class="dashicons dashicons-star-filled"></span>
								<?php esc_html_e('Pro', 'aegis'); ?>
							</span>
							<?php endif; ?>
						</h3>
						<p><?php esc_html_e('Remove default Co-Authors Plus block patterns from the editor.', 'aegis'); ?></p>
					</div>
				</div>
				<label class="aegis-toggle">
					<input type="checkbox" name="aegis_pattern_control[coauthors_keep_patterns]" value="1" <?php checked($cap_keep_patterns); ?> <?php disabled(!$pro_active); ?>>
					<span class="aegis-toggle-slider"></span>
				</label>
			</div>
		</div>
		<?php endif; ?>
		<?php
	}

	/**
	 * Get plugin status.
	 *
	 * @param string $plugin_check Plugin check identifier.
	 * @return array Status with class and label.
	 */
	private function get_plugin_status(string $plugin_check): array
	{
		if (empty($plugin_check)) {
			return ['class' => '', 'label' => ''];
		}

		// Check if plugin is active
		$is_active = false;
		switch ($plugin_check) {
			case 'woocommerce':
				$is_active = class_exists('WooCommerce');
				break;
			case 'acf':
				$is_active = class_exists('ACF');
				break;
			case 'rank_math':
				$is_active = class_exists('RankMath');
				break;
			case 'learndash':
				$is_active = defined('LEARNDASH_VERSION');
				break;
			case 'lifter_lms':
				$is_active = class_exists('LifterLMS');
				break;
			case 'sensei_lms':
				$is_active = class_exists('Sensei_Main');
				break;
			case 'fluent_forms':
				$is_active = defined('FLUENTFORM');
				break;
			case 'fluent_booking':
				$is_active = class_exists('FluentBooking\\App\\App');
				break;
			case 'code_block_pro':
				$is_active = defined('CODE_BLOCK_PRO_VERSION');
				break;
			case 'syntax_highlighting':
				$is_active = class_exists('Developer_Starter_Starter') || function_exists('Developer_Starter_Starter');
				break;
			case 'co_authors_plus':
				$is_active = function_exists('get_coauthors');
				break;
			case 'meta_box':
				$is_active = class_exists('RWMB_Loader');
				break;
			case 'fluent_crm':
				$is_active = defined('FLUENTCRM');
				break;
		}

		if ($is_active) {
			return [
				'class' => 'active',
				'label' => __('Active', 'aegis'),
			];
		}

		return [
			'class' => 'not-installed',
			'label' => __('Not Installed', 'aegis'),
		];
	}

	/**
	 * Render the toolbar with search and export/import.
	 *
	 * @return void
	 */
	private function render_toolbar(string $group = ''): void
	{
		?>
		<div class="aegis-toolbar">
			<div class="aegis-toolbar-left">
				<input type="text" class="aegis-search-input" placeholder="<?php esc_attr_e('Search settings...', 'aegis'); ?>">
			</div>
			<div class="aegis-toolbar-right">
				<?php if ($group) : ?>
				<button type="button" class="aegis-btn aegis-btn-secondary aegis-reset-settings" data-group="<?php echo esc_attr($group); ?>">
					<?php esc_html_e('Reset Defaults', 'aegis'); ?>
				</button>
				<?php endif; ?>
				<button type="button" class="aegis-btn aegis-btn-secondary aegis-export-btn">
					<?php esc_html_e('Export', 'aegis'); ?>
				</button>
				<button type="button" class="aegis-btn aegis-btn-secondary aegis-import-btn">
					<?php esc_html_e('Import', 'aegis'); ?>
				</button>
				<input type="file" id="aegis-import-file" accept=".json" style="display:none;">
			</div>
		</div>
		<?php
	}

	/**
	 * Render section header with bulk actions.
	 *
	 * @param string $title       Section title.
	 * @param string $description Section description.
	 * @param bool   $show_bulk_actions Whether to show bulk action buttons.
	 * @param string $icon        Optional dashicon name for the title.
	 * @return void
	 */
	private function render_section_header(string $title, string $description, bool $show_bulk_actions = true, string $icon = ''): void
	{
		$pro_installed = $this->is_aegis_pro_active() ? 'true' : 'false';
		?>
		<div class="aegis-section-header">
			<div class="aegis-section-title">
				<h2>
					<?php if ($icon) : ?>
					<span class="dashicons dashicons-<?php echo esc_attr($icon); ?>"></span>
					<?php endif; ?>
					<?php echo esc_html($title); ?>
				</h2>
				<p class="description"><?php echo esc_html($description); ?></p>
			</div>
			<?php if ($show_bulk_actions) : ?>
			<div class="aegis-bulk-actions">
				<button type="button" class="button button-small aegis-bulk-enable" data-pro-installed="<?php echo esc_attr($pro_installed); ?>"><?php esc_html_e('Enable All', 'aegis'); ?></button>
				<button type="button" class="button button-small aegis-bulk-disable" data-pro-installed="<?php echo esc_attr($pro_installed); ?>"><?php esc_html_e('Disable All', 'aegis'); ?></button>
			</div>
			<?php endif; ?>
		</div>
		<?php
	}

	public function render_dashboard_page(): void
	{
		$theme = wp_get_theme();

		// Gather live stats.
		$block_settings       = get_option(SettingsRepository::BLOCKS_OPTION, []);
		$active_blocks        = count(array_filter($block_settings));
		$conditionals         = get_option(SettingsRepository::OPTION_NAME, []);
		$active_conditionals  = count(array_filter($conditionals));
		$integrations         = get_option(SettingsRepository::INTEGRATIONS_OPTION, []);
		$active_integrations  = count(array_filter($integrations));
		$hook_patterns_count  = (int) wp_count_posts(\Aegis\Admin\HookPatternsManager::POST_TYPE)->publish;
		$pro_active           = defined('AEGIS_PRO_VERSION');
		?>
		<div class="aegis-admin-page">
			<?php $this->render_top_bar(); ?>
			<?php $this->render_page_tabs('dashboard'); ?>

			<div class="aegis-settings-wrap">

				<!-- Hero Welcome Banner -->
				<div class="aegis-dashboard-hero-card">
					<div class="aegis-dashboard-hero-card-header">
						<svg viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" width="20" height="20">
							<path fill-rule="evenodd" d="M10.06 7.75 L12.02 3.87 L13.95 7.72 L16.65 9.29 L12.03 0 L7.34 9.3 L10.06 7.75 Z M18.37 12.72 L18.2 12.36 L15.5 10.79 L17.02 13.68 L20.05 18.61 L12.02 15.17 L3.98 18.62 L6.96 13.68 L8.39 10.81 L5.67 12.39 L5.5 12.71 L0 22.87 L12.01 16.87 L24 22.94 L18.37 12.72 Z"/>
						</svg>
						<span><?php esc_html_e('Dashboard', 'aegis'); ?></span>
					</div>
					<div class="aegis-dashboard-hero-card-body">
						<h1><?php esc_html_e('Welcome to Aegis', 'aegis'); ?></h1>
						<p><?php esc_html_e('The Native Block Framework for WordPress. Manage your blocks, conditionals, integrations, and more from one place.', 'aegis'); ?></p>
						<div class="aegis-dashboard-hero-card-actions">
							<a href="<?php echo esc_url(admin_url('site-editor.php')); ?>" class="aegis-btn aegis-btn-primary">
								<span class="dashicons dashicons-admin-appearance"></span>
								<?php esc_html_e('Open Site Editor', 'aegis'); ?>
							</a>
							<a href="https://developer.wordpress.org/themes/" target="_blank" rel="noopener noreferrer" class="aegis-btn aegis-btn-secondary">
								<span class="dashicons dashicons-book"></span>
								<?php esc_html_e('Documentation', 'aegis'); ?>
							</a>
						</div>
					</div>
				</div>

				<!-- At-a-Glance Stats -->
				<div class="aegis-dashboard-stats">
					<a href="<?php echo esc_url(admin_url('admin.php?page=aegis-blocks')); ?>" class="aegis-stat-card">
						<div class="aegis-stat-icon aegis-stat-icon--blue">
							<span class="dashicons dashicons-block-default"></span>
						</div>
						<div class="aegis-stat-content">
							<span class="aegis-stat-value"><?php echo esc_html((string) $active_blocks); ?></span>
							<span class="aegis-stat-label"><?php esc_html_e('Active Blocks', 'aegis'); ?></span>
						</div>
					</a>
					<a href="<?php echo esc_url(admin_url('admin.php?page=aegis-settings')); ?>" class="aegis-stat-card">
						<div class="aegis-stat-icon aegis-stat-icon--purple">
							<span class="dashicons dashicons-lock"></span>
						</div>
						<div class="aegis-stat-content">
							<span class="aegis-stat-value"><?php echo esc_html((string) $active_conditionals); ?></span>
							<span class="aegis-stat-label"><?php esc_html_e('Conditionals', 'aegis'); ?></span>
						</div>
					</a>
					<a href="<?php echo esc_url(admin_url('admin.php?page=aegis-integrations')); ?>" class="aegis-stat-card">
						<div class="aegis-stat-icon aegis-stat-icon--green">
							<span class="dashicons dashicons-admin-plugins"></span>
						</div>
						<div class="aegis-stat-content">
							<span class="aegis-stat-value"><?php echo esc_html((string) $active_integrations); ?></span>
							<span class="aegis-stat-label"><?php esc_html_e('Integrations', 'aegis'); ?></span>
						</div>
					</a>
					<a href="<?php echo esc_url(admin_url('admin.php?page=aegis-hook-patterns')); ?>" class="aegis-stat-card">
						<div class="aegis-stat-icon aegis-stat-icon--amber">
							<span class="dashicons dashicons-editor-code"></span>
						</div>
						<div class="aegis-stat-content">
							<span class="aegis-stat-value"><?php echo esc_html((string) $hook_patterns_count); ?></span>
							<span class="aegis-stat-label"><?php esc_html_e('Hook Patterns', 'aegis'); ?></span>
						</div>
					</a>
				</div>

				<!-- Quick Actions -->
				<div class="aegis-dashboard-section">
					<h2><?php esc_html_e('Quick Actions', 'aegis'); ?></h2>
					<div class="aegis-dashboard-actions">
						<a href="<?php echo esc_url(admin_url('site-editor.php')); ?>" class="aegis-action-card">
							<div class="aegis-action-card-icon">
								<span class="dashicons dashicons-admin-appearance"></span>
							</div>
							<span class="aegis-action-card-title"><?php esc_html_e('Site Editor', 'aegis'); ?></span>
							<span class="aegis-action-card-desc"><?php esc_html_e('Edit your site visually', 'aegis'); ?></span>
						</a>
						<a href="<?php echo esc_url(admin_url('site-editor.php?path=%2Fwp_template')); ?>" class="aegis-action-card">
							<div class="aegis-action-card-icon">
								<span class="dashicons dashicons-screenoptions"></span>
							</div>
							<span class="aegis-action-card-title"><?php esc_html_e('Templates', 'aegis'); ?></span>
							<span class="aegis-action-card-desc"><?php esc_html_e('Manage page templates', 'aegis'); ?></span>
						</a>
						<a href="<?php echo esc_url(admin_url('site-editor.php?path=%2Fpatterns')); ?>" class="aegis-action-card">
							<div class="aegis-action-card-icon">
								<span class="dashicons dashicons-layout"></span>
							</div>
							<span class="aegis-action-card-title"><?php esc_html_e('Patterns', 'aegis'); ?></span>
							<span class="aegis-action-card-desc"><?php esc_html_e('Browse block patterns', 'aegis'); ?></span>
						</a>
						<a href="<?php echo esc_url(admin_url('site-editor.php?path=%2Fwp_global_styles')); ?>" class="aegis-action-card">
							<div class="aegis-action-card-icon">
								<span class="dashicons dashicons-art"></span>
							</div>
							<span class="aegis-action-card-title"><?php esc_html_e('Global Styles', 'aegis'); ?></span>
							<span class="aegis-action-card-desc"><?php esc_html_e('Customize colors & fonts', 'aegis'); ?></span>
						</a>
						<a href="<?php echo esc_url(admin_url('admin.php?page=aegis-blocks')); ?>" class="aegis-action-card">
							<div class="aegis-action-card-icon">
								<span class="dashicons dashicons-block-default"></span>
							</div>
							<span class="aegis-action-card-title"><?php esc_html_e('Manage Blocks', 'aegis'); ?></span>
							<span class="aegis-action-card-desc"><?php esc_html_e('Enable or disable blocks', 'aegis'); ?></span>
						</a>
						<a href="<?php echo esc_url(admin_url('post-new.php?post_type=page')); ?>" class="aegis-action-card">
							<div class="aegis-action-card-icon">
								<span class="dashicons dashicons-plus-alt2"></span>
							</div>
							<span class="aegis-action-card-title"><?php esc_html_e('New Page', 'aegis'); ?></span>
							<span class="aegis-action-card-desc"><?php esc_html_e('Create a new page', 'aegis'); ?></span>
						</a>
					</div>
				</div>

				<!-- Getting Started -->
				<div class="aegis-dashboard-section">
					<h2><?php esc_html_e('Getting Started', 'aegis'); ?></h2>
					<div class="aegis-dashboard-getting-started">
						<a href="<?php echo esc_url(admin_url('site-editor.php')); ?>" class="aegis-license-feature-card">
							<div class="aegis-license-feature-icon">
								<span class="dashicons dashicons-admin-customizer"></span>
							</div>
							<h3><?php esc_html_e('Customize Your Theme', 'aegis'); ?></h3>
							<p><?php esc_html_e('Use the Site Editor to customize templates, headers, footers, and global styles with full block control.', 'aegis'); ?></p>
						</a>
						<a href="<?php echo esc_url(admin_url('admin.php?page=aegis-settings')); ?>" class="aegis-license-feature-card">
							<div class="aegis-license-feature-icon">
								<span class="dashicons dashicons-visibility"></span>
							</div>
							<h3><?php esc_html_e('Manage Block Visibility', 'aegis'); ?></h3>
							<p><?php esc_html_e('Show or hide any block based on user roles, devices, schedules, and custom conditions.', 'aegis'); ?></p>
						</a>
						<a href="<?php echo esc_url(admin_url('admin.php?page=aegis-integrations')); ?>" class="aegis-license-feature-card">
							<div class="aegis-license-feature-icon">
								<span class="dashicons dashicons-admin-plugins"></span>
							</div>
							<h3><?php esc_html_e('Extend with Integrations', 'aegis'); ?></h3>
							<p><?php esc_html_e('Connect WooCommerce, LMS plugins, and other tools to enhance your block-powered site.', 'aegis'); ?></p>
						</a>
					</div>
				</div>

				<div class="aegis-dashboard-columns">
					<!-- System Info -->
					<div class="aegis-dashboard-section">
						<div class="aegis-dashboard-system-card">
							<div class="aegis-dashboard-system-card-header">
								<span class="dashicons dashicons-info-outline"></span>
								<span><?php esc_html_e('System Info', 'aegis'); ?></span>
							</div>
							<div class="aegis-system-table">
								<div class="aegis-system-row">
									<span class="aegis-system-label"><?php esc_html_e('Theme Version', 'aegis'); ?></span>
									<span class="aegis-system-value"><?php echo esc_html($theme->get('Version')); ?></span>
								</div>
								<div class="aegis-system-row">
									<span class="aegis-system-label"><?php esc_html_e('WordPress', 'aegis'); ?></span>
									<span class="aegis-system-value"><?php echo esc_html(get_bloginfo('version')); ?></span>
								</div>
								<div class="aegis-system-row">
									<span class="aegis-system-label"><?php esc_html_e('PHP', 'aegis'); ?></span>
									<span class="aegis-system-value"><?php echo esc_html(PHP_VERSION); ?></span>
								</div>
								<?php if ($pro_active) : ?>
									<div class="aegis-system-row">
										<span class="aegis-system-label"><?php esc_html_e('Aegis Pro', 'aegis'); ?></span>
										<span class="aegis-system-value"><?php echo esc_html(AEGIS_PRO_VERSION); ?></span>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>

					<!-- Pro Status -->
					<div class="aegis-dashboard-section">
						<div class="aegis-dashboard-system-card">
							<div class="aegis-dashboard-system-card-header">
								<span class="dashicons dashicons-star-filled"></span>
								<span><?php esc_html_e('Aegis Pro', 'aegis'); ?></span>
							</div>
							<div class="aegis-dashboard-system-card-body">
								<?php if ($pro_active) : ?>
									<?php
									$license_key    = get_option('aegis_pro_license_key', '');
									$license_status = get_option('aegis_pro_license_status', '');
									$is_valid       = $license_status === 'valid';
									?>
									<div class="aegis-pro-status aegis-pro-status--<?php echo $is_valid ? 'active' : 'inactive'; ?>">
										<span class="dashicons dashicons-<?php echo $is_valid ? 'yes-alt' : 'warning'; ?>"></span>
										<div>
											<strong><?php echo $is_valid ? esc_html__('License Active', 'aegis') : esc_html__('License Inactive', 'aegis'); ?></strong>
											<?php if (!empty($license_key)) : ?>
												<p class="aegis-license-key"><?php echo esc_html(substr($license_key, 0, 8) . '••••••••'); ?></p>
											<?php else : ?>
												<p><?php esc_html_e('Enter your license key to activate Pro features.', 'aegis'); ?></p>
											<?php endif; ?>
										</div>
									</div>
								<?php else : ?>
									<p class="aegis-dashboard-pro-desc"><?php esc_html_e('Unlock advanced features, integrations, and professional tools.', 'aegis'); ?></p>
									<a href="<?php echo esc_url(admin_url('admin.php?page=aegis-license')); ?>" class="aegis-btn aegis-btn-primary">
										<span class="dashicons dashicons-cart"></span>
										<?php esc_html_e('Get Aegis Pro', 'aegis'); ?>
									</a>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>

				<?php if (!$pro_active) : ?>
				<!-- Pro Features Grid -->
				<div class="aegis-dashboard-section">
					<h2><?php esc_html_e('Unlock the Full Power of Aegis', 'aegis'); ?></h2>
					<p class="aegis-license-section-desc"><?php esc_html_e('Aegis Pro extends every block with advanced features, integrations, and professional tools.', 'aegis'); ?></p>

					<div class="aegis-license-features">
						<div class="aegis-license-feature-card">
							<div class="aegis-license-feature-icon">
								<span class="dashicons dashicons-video-alt3"></span>
							</div>
							<h3><?php esc_html_e('Video Player Pro', 'aegis'); ?></h3>
							<p><?php esc_html_e('Chapters, analytics, BunnyCDN streaming, email capture, and LMS integrations.', 'aegis'); ?></p>
						</div>
						<div class="aegis-license-feature-card">
							<div class="aegis-license-feature-icon">
								<span class="dashicons dashicons-lock"></span>
							</div>
							<h3><?php esc_html_e('Advanced Conditionals', 'aegis'); ?></h3>
							<p><?php esc_html_e('Cookie, referral, ACF, MetaBox, post meta, and location-based block visibility.', 'aegis'); ?></p>
						</div>
						<div class="aegis-license-feature-card">
							<div class="aegis-license-feature-icon">
								<span class="dashicons dashicons-chart-area"></span>
							</div>
							<h3><?php esc_html_e('Analytics & Tracking', 'aegis'); ?></h3>
							<p><?php esc_html_e('Per-user tracking, audience retention, buffering stats, and Google Analytics events.', 'aegis'); ?></p>
						</div>
						<div class="aegis-license-feature-card">
							<div class="aegis-license-feature-icon">
								<span class="dashicons dashicons-welcome-learn-more"></span>
							</div>
							<h3><?php esc_html_e('LMS Integrations', 'aegis'); ?></h3>
							<p><?php esc_html_e('LearnDash, LifterLMS, and Sensei — auto-complete lessons based on video progress.', 'aegis'); ?></p>
						</div>
						<div class="aegis-license-feature-card">
							<div class="aegis-license-feature-icon">
								<span class="dashicons dashicons-location-alt"></span>
							</div>
							<h3><?php esc_html_e('Map Block Pro', 'aegis'); ?></h3>
							<p><?php esc_html_e('Clustering, directions, store locator, heatmaps, KML/GeoJSON import, and Schema.org.', 'aegis'); ?></p>
						</div>
						<div class="aegis-license-feature-card">
							<div class="aegis-license-feature-icon">
								<span class="dashicons dashicons-images-alt2"></span>
							</div>
							<h3><?php esc_html_e('Slider Pro', 'aegis'); ?></h3>
							<p><?php esc_html_e('Autoplay, effects, thumbnails, lightbox, lazy loading, and custom arrow/dot styles.', 'aegis'); ?></p>
						</div>
						<div class="aegis-license-feature-card">
							<div class="aegis-license-feature-icon">
								<span class="dashicons dashicons-arrow-down-alt2"></span>
							</div>
							<h3><?php esc_html_e('Toggle Pro', 'aegis'); ?></h3>
							<p><?php esc_html_e('URL sync, state persistence, animations, FAQ schema, nested toggles, and conditional visibility.', 'aegis'); ?></p>
						</div>
						<div class="aegis-license-feature-card">
							<div class="aegis-license-feature-icon">
								<span class="dashicons dashicons-clock"></span>
							</div>
							<h3><?php esc_html_e('Countdown Pro', 'aegis'); ?></h3>
							<p><?php esc_html_e('Evergreen countdowns, animations, auto-restart, expiry actions, and urgency styling.', 'aegis'); ?></p>
						</div>
						<div class="aegis-license-feature-card">
							<div class="aegis-license-feature-icon">
								<span class="dashicons dashicons-slides"></span>
							</div>
							<h3><?php esc_html_e('Modal Pro', 'aegis'); ?></h3>
							<p><?php esc_html_e('Exit intent, scroll depth, time delay triggers, auto close, show once, and device visibility.', 'aegis'); ?></p>
						</div>
						<div class="aegis-license-feature-card">
							<div class="aegis-license-feature-icon">
								<span class="dashicons dashicons-database"></span>
							</div>
							<h3><?php esc_html_e('Query Loop Pro', 'aegis'); ?></h3>
							<p><?php esc_html_e('Advanced filtering, custom field queries, date ranges, related posts, and AJAX pagination.', 'aegis'); ?></p>
						</div>
						<div class="aegis-license-feature-card">
							<div class="aegis-license-feature-icon">
								<span class="dashicons dashicons-cloud-upload"></span>
							</div>
							<h3><?php esc_html_e('BunnyCDN Streaming', 'aegis'); ?></h3>
							<p><?php esc_html_e('HLS adaptive streaming, direct upload, AI transcription, thumbnails, and watermarking.', 'aegis'); ?></p>
						</div>
						<div class="aegis-license-feature-card">
							<div class="aegis-license-feature-icon">
								<span class="dashicons dashicons-layout"></span>
							</div>
							<h3><?php esc_html_e('Pattern Control', 'aegis'); ?></h3>
							<p><?php esc_html_e('Manage default block patterns from plugins. Remove unwanted patterns from the editor.', 'aegis'); ?></p>
						</div>
						<div class="aegis-license-feature-card">
							<div class="aegis-license-feature-icon">
								<span class="dashicons dashicons-editor-code"></span>
							</div>
							<h3><?php esc_html_e('Custom Code & Fonts', 'aegis'); ?></h3>
							<p><?php esc_html_e('Add custom CSS, JavaScript, and register custom fonts without child themes or extra plugins.', 'aegis'); ?></p>
						</div>
						<div class="aegis-license-feature-card">
							<div class="aegis-license-feature-icon">
								<span class="dashicons dashicons-groups"></span>
							</div>
							<h3><?php esc_html_e('Co-Authors Plus', 'aegis'); ?></h3>
							<p><?php esc_html_e('Social links, role badges, and enhanced author displays for multi-author publishing.', 'aegis'); ?></p>
						</div>
					</div>

					<div class="aegis-license-purchase-cta">
						<a href="https://www.atmostfear-entertainment.com/aegis/pro" target="_blank" rel="noopener noreferrer" class="aegis-btn aegis-btn-primary aegis-btn-lg">
							<span class="dashicons dashicons-cart"></span>
							<?php esc_html_e('Get Aegis Pro', 'aegis'); ?>
						</a>
						<span class="aegis-license-purchase-note"><?php esc_html_e('One-time purchase. Lifetime updates. 14-day money-back guarantee.', 'aegis'); ?></span>
					</div>
				</div>
				<?php endif; ?>

				<!-- Resources -->
				<div class="aegis-dashboard-section">
					<h2><?php esc_html_e('Resources', 'aegis'); ?></h2>
					<div class="aegis-dashboard-actions aegis-license-links">
						<a href="https://developer.wordpress.org/themes/" target="_blank" rel="noopener noreferrer" class="aegis-action-card">
							<div class="aegis-action-card-icon">
								<span class="dashicons dashicons-book"></span>
							</div>
							<span class="aegis-action-card-title"><?php esc_html_e('Documentation', 'aegis'); ?></span>
						</a>
						<a href="https://www.facebook.com/groups/aegiswp" target="_blank" rel="noopener noreferrer" class="aegis-action-card">
							<div class="aegis-action-card-icon">
								<span class="dashicons dashicons-groups"></span>
							</div>
							<span class="aegis-action-card-title"><?php esc_html_e('Support Group', 'aegis'); ?></span>
						</a>
						<a href="https://github.com/aegiswp/theme/releases" target="_blank" rel="noopener noreferrer" class="aegis-action-card">
							<div class="aegis-action-card-icon">
								<span class="dashicons dashicons-backup"></span>
							</div>
							<span class="aegis-action-card-title"><?php esc_html_e('Changelog', 'aegis'); ?></span>
						</a>
						<a href="https://github.com/aegiswp/theme" target="_blank" rel="noopener noreferrer" class="aegis-action-card">
							<div class="aegis-action-card-icon">
								<span class="dashicons dashicons-editor-code"></span>
							</div>
							<span class="aegis-action-card-title"><?php esc_html_e('GitHub', 'aegis'); ?></span>
						</a>
					</div>
				</div>

			</div>
		</div>
		<?php
	}

	/**
	 * Render conditional logic settings page.
	 *
	 * @return void
	 */
	public function render_conditional_logic_page(): void
	{
		$options = get_option(SettingsRepository::OPTION_NAME, SettingsRepository::DEFAULTS);
		$options = wp_parse_args($options, SettingsRepository::DEFAULTS);
		?>
		<div class="aegis-admin-page">
			<?php $this->render_top_bar(); ?>
			<?php $this->render_page_tabs('conditional-logic'); ?>

			<div class="aegis-settings-wrap">
				<div class="aegis-settings-header">
					<h1><?php esc_html_e('Conditionals', 'aegis'); ?></h1>
					<p><?php esc_html_e('Enable or disable conditional logic features for the block editor.', 'aegis'); ?></p>
				</div>

				<?php $this->render_toolbar('conditionals'); ?>

				<form method="post" action="options.php" class="aegis-settings-form">
					<?php settings_fields('aegis_conditional_logic_group'); ?>

					<div class="aegis-settings-layout">
						<nav class="aegis-settings-nav">
							<a href="#visibility" class="aegis-nav-item active">
								<span class="dashicons dashicons-visibility"></span>
								<?php esc_html_e('Visibility', 'aegis'); ?>
							</a>
							<a href="#accessibility" class="aegis-nav-item">
								<span class="dashicons dashicons-universal-access"></span>
								<?php esc_html_e('Accessibility', 'aegis'); ?>
							</a>
							<a href="#user" class="aegis-nav-item">
								<span class="dashicons dashicons-admin-users"></span>
								<?php esc_html_e('User', 'aegis'); ?>
							</a>
							<a href="#schedule" class="aegis-nav-item">
								<span class="dashicons dashicons-calendar-alt"></span>
								<?php esc_html_e('Schedule', 'aegis'); ?>
							</a>
							<a href="#pro-conditions" class="aegis-nav-item">
								<span class="dashicons dashicons-lock"></span>
								<?php esc_html_e('Pro Conditions', 'aegis'); ?>
							</a>
							<a href="#woocommerce" class="aegis-nav-item">
								<span class="dashicons dashicons-cart"></span>
								<?php esc_html_e('WooCommerce', 'aegis'); ?>
							</a>
							<a href="#learndash" class="aegis-nav-item">
								<span class="dashicons dashicons-welcome-learn-more"></span>
								<?php esc_html_e('LearnDash', 'aegis'); ?>
							</a>
							<a href="#lifterlms" class="aegis-nav-item">
								<span class="dashicons dashicons-book"></span>
								<?php esc_html_e('LifterLMS', 'aegis'); ?>
							</a>
							<a href="#sensei" class="aegis-nav-item">
								<span class="dashicons dashicons-welcome-learn-more"></span>
								<?php esc_html_e('Sensei LMS', 'aegis'); ?>
							</a>
							<a href="#fluentforms" class="aegis-nav-item">
								<span class="dashicons dashicons-feedback"></span>
								<?php esc_html_e('Fluent Forms', 'aegis'); ?>
							</a>
							<a href="#fluentbooking" class="aegis-nav-item">
								<span class="dashicons dashicons-calendar-alt"></span>
								<?php esc_html_e('Fluent Booking', 'aegis'); ?>
							</a>
							<a href="#image-source" class="aegis-nav-item">
								<span class="dashicons dashicons-format-image"></span>
								<?php esc_html_e('Image Source', 'aegis'); ?>
							</a>
						</nav>

					<div class="aegis-settings-content">
						<!-- Visibility Section -->
						<section id="visibility" class="aegis-settings-section active">
							<?php $this->render_section_header(__('Visibility Controls', 'aegis'), __('Control block visibility based on screen size and device.', 'aegis')); ?>

							<div class="aegis-settings-grid">
								<?php $this->render_toggle('visibility', 'screen_size', __('Screen Size', 'aegis'), __('Hide blocks on mobile, tablet, or desktop.', 'aegis'), $options, 'smartphone'); ?>
								<?php $this->render_toggle('visibility', 'custom_breakpoints', __('Custom Breakpoints', 'aegis'), __('Define custom min/max width breakpoints.', 'aegis'), $options, 'editor-expand'); ?>
								<?php $this->render_toggle('visibility', 'browser_device', __('Browser & Device', 'aegis'), __('Target specific browsers and devices.', 'aegis'), $options, 'desktop'); ?>
								<?php $this->render_toggle('visibility', 'lockdown', __('Lockdown', 'aegis'), __('Hide blocks from all users on the frontend (draft mode).', 'aegis'), $options, 'lock'); ?>
								<?php $this->render_toggle('visibility', 'query_string', __('URL Query String', 'aegis'), __('Show or hide blocks based on URL query parameters.', 'aegis'), $options, 'admin-links'); ?>
								<?php $this->render_toggle('visibility', 'specific_users', __('Specific Users', 'aegis'), __('Show or hide blocks for specific user IDs.', 'aegis'), $options, 'admin-users'); ?>
							</div>
						</section>

						<!-- Accessibility Section -->
						<section id="accessibility" class="aegis-settings-section">
							<?php $this->render_section_header(__('Accessibility Controls', 'aegis'), __('Respect user accessibility preferences.', 'aegis')); ?>

							<div class="aegis-settings-grid">
								<?php $this->render_toggle('accessibility', 'reduced_motion', __('Reduced Motion', 'aegis'), __('Hide content for users who prefer reduced motion.', 'aegis'), $options, 'controls-pause'); ?>
								<?php $this->render_toggle('accessibility', 'screen_reader_only', __('Screen Reader Only', 'aegis'), __('Make content visible only to screen readers.', 'aegis'), $options, 'megaphone'); ?>
								<?php $this->render_toggle('accessibility', 'color_scheme', __('Color Scheme', 'aegis'), __('Show content only in light or dark mode.', 'aegis'), $options, 'art'); ?>
								<?php $this->render_toggle('accessibility', 'high_contrast', __('High Contrast', 'aegis'), __('Hide content in high contrast mode.', 'aegis'), $options, 'admin-appearance'); ?>
								<?php $this->render_toggle('accessibility', 'forced_colors', __('Forced Colors', 'aegis'), __('Hide content in Windows High Contrast mode.', 'aegis'), $options, 'color-picker'); ?>
							</div>
						</section>

						<!-- User Section -->
						<section id="user" class="aegis-settings-section">
							<?php $this->render_section_header(__('User Controls', 'aegis'), __('Control visibility based on user status and role.', 'aegis')); ?>

							<div class="aegis-settings-grid">
								<?php $this->render_toggle('user', 'user_status', __('User Status', 'aegis'), __('Show content to logged-in or logged-out users.', 'aegis'), $options, 'admin-users'); ?>
								<?php $this->render_toggle('user', 'user_role', __('User Role', 'aegis'), __('Show content to specific user roles.', 'aegis'), $options, 'groups'); ?>
							</div>
						</section>

						<!-- Schedule Section -->
						<section id="schedule" class="aegis-settings-section">
							<?php $this->render_section_header(__('Schedule Controls', 'aegis'), __('Control visibility based on date and time.', 'aegis')); ?>

							<div class="aegis-settings-grid">
								<?php $this->render_toggle('schedule', 'date_time', __('Date & Time', 'aegis'), __('Show content during specific dates and times.', 'aegis'), $options, 'clock'); ?>
							</div>
						</section>

						<!-- Pro Conditions Section -->
						<section id="pro-conditions" class="aegis-settings-section">
							<?php $this->render_section_header(__('Pro Conditions', 'aegis'), __('Advanced block-level conditions available with Aegis Pro.', 'aegis')); ?>

							<div class="aegis-settings-grid">
								<?php $this->render_toggle('pro_conditions', 'cookie', __('Cookie', 'aegis'), __('Show or hide blocks based on browser cookie values.', 'aegis'), $options, 'info-outline'); ?>
								<?php $this->render_toggle('pro_conditions', 'referral', __('Referral Source', 'aegis'), __('Show or hide blocks based on the referring domain.', 'aegis'), $options, 'share'); ?>
								<?php $this->render_toggle('pro_conditions', 'acf_field', __('ACF Field', 'aegis'), __('Show or hide blocks based on Advanced Custom Fields values.', 'aegis'), $options, 'database'); ?>
								<?php $this->render_toggle('pro_conditions', 'metabox_field', __('MetaBox Field', 'aegis'), __('Show or hide blocks based on MetaBox field values.', 'aegis'), $options, 'archive'); ?>
								<?php $this->render_toggle('pro_conditions', 'post_meta', __('Post Meta', 'aegis'), __('Show or hide blocks based on raw post meta key/value.', 'aegis'), $options, 'admin-post'); ?>
								<?php $this->render_toggle('pro_conditions', 'user_meta', __('User Meta', 'aegis'), __('Show or hide blocks based on current user meta key/value.', 'aegis'), $options, 'id-alt'); ?>
								<?php $this->render_toggle('pro_conditions', 'advanced_location', __('Advanced Location', 'aegis'), __('Show or hide blocks by post type, post IDs, taxonomy terms, URL path, or archive type.', 'aegis'), $options, 'location-alt'); ?>
							</div>
						</section>

						<!-- WooCommerce Section -->
						<section id="woocommerce" class="aegis-settings-section">
							<?php $this->render_section_header(__('WooCommerce Conditions', 'aegis'), __('Block-level conditions based on WooCommerce cart, customer history, and product context.', 'aegis')); ?>

							<div class="aegis-settings-grid">
								<?php $this->render_toggle('woocommerce', 'woo_cart', __('Cart Conditions', 'aegis'), __('Show or hide blocks based on cart contents, total value, item count, and product quantities.', 'aegis'), $options, 'cart'); ?>
								<?php $this->render_toggle('woocommerce', 'woo_customer', __('Customer History', 'aegis'), __('Show or hide blocks based on lifetime spend, order count, purchase history, and recency.', 'aegis'), $options, 'businessperson'); ?>
								<?php $this->render_toggle('woocommerce', 'woo_product', __('Product Context', 'aegis'), __('Show or hide blocks based on current product stock status, quantity, sale, or featured state.', 'aegis'), $options, 'products'); ?>
							</div>
						</section>

						<!-- LearnDash Section -->
						<section id="learndash" class="aegis-settings-section">
							<?php $this->render_section_header(__('LearnDash Conditions', 'aegis'), __('Block-level conditions based on LearnDash enrollment, completion, progress, quiz results, and group membership.', 'aegis')); ?>

							<div class="aegis-settings-grid">
								<?php $this->render_toggle('learndash', 'ld_enrollment', __('Enrollment', 'aegis'), __('Show or hide blocks based on course or lesson enrollment status.', 'aegis'), $options, 'welcome-learn-more'); ?>
								<?php $this->render_toggle('learndash', 'ld_completion', __('Completion', 'aegis'), __('Show or hide blocks based on course or lesson completion status.', 'aegis'), $options, 'yes-alt'); ?>
								<?php $this->render_toggle('learndash', 'ld_progress', __('Course Progress', 'aegis'), __('Show or hide blocks based on course progress percentage.', 'aegis'), $options, 'chart-bar'); ?>
								<?php $this->render_toggle('learndash', 'ld_quiz', __('Quiz Results', 'aegis'), __('Show or hide blocks based on quiz pass/fail status or score.', 'aegis'), $options, 'forms'); ?>
								<?php $this->render_toggle('learndash', 'ld_group', __('Group Membership', 'aegis'), __('Show or hide blocks based on LearnDash group membership.', 'aegis'), $options, 'groups'); ?>
							</div>
						</section>

						<!-- LifterLMS Section -->
						<section id="lifterlms" class="aegis-settings-section">
							<?php $this->render_section_header(__('LifterLMS Conditions', 'aegis'), __('Block-level conditions based on LifterLMS enrollment, completion, progress, and membership.', 'aegis')); ?>

							<div class="aegis-settings-grid">
								<?php $this->render_toggle('lifterlms', 'llms_enrollment', __('Enrollment', 'aegis'), __('Show or hide blocks based on course enrollment status.', 'aegis'), $options, 'welcome-learn-more'); ?>
								<?php $this->render_toggle('lifterlms', 'llms_completion', __('Completion', 'aegis'), __('Show or hide blocks based on course or lesson completion.', 'aegis'), $options, 'yes-alt'); ?>
								<?php $this->render_toggle('lifterlms', 'llms_progress', __('Course Progress', 'aegis'), __('Show or hide blocks based on course progress percentage.', 'aegis'), $options, 'chart-bar'); ?>
								<?php $this->render_toggle('lifterlms', 'llms_membership', __('Membership', 'aegis'), __('Show or hide blocks based on membership plan enrollment.', 'aegis'), $options, 'id'); ?>
							</div>
						</section>

						<!-- Sensei LMS Section -->
						<section id="sensei" class="aegis-settings-section">
							<?php $this->render_section_header(__('Sensei LMS Conditions', 'aegis'), __('Block-level conditions based on Sensei LMS enrollment, completion, progress, and quiz grades.', 'aegis')); ?>

							<div class="aegis-settings-grid">
								<?php $this->render_toggle('sensei', 'sensei_enrollment', __('Enrollment', 'aegis'), __('Show or hide blocks based on course enrollment status.', 'aegis'), $options, 'welcome-learn-more'); ?>
								<?php $this->render_toggle('sensei', 'sensei_completion', __('Completion', 'aegis'), __('Show or hide blocks based on course or lesson completion.', 'aegis'), $options, 'yes-alt'); ?>
								<?php $this->render_toggle('sensei', 'sensei_progress', __('Course Progress', 'aegis'), __('Show or hide blocks based on course progress percentage.', 'aegis'), $options, 'chart-bar'); ?>
								<?php $this->render_toggle('sensei', 'sensei_quiz', __('Quiz Grade', 'aegis'), __('Show or hide blocks based on quiz grade for a specific lesson.', 'aegis'), $options, 'forms'); ?>
							</div>
						</section>

						<!-- Fluent Forms Section -->
						<section id="fluentforms" class="aegis-settings-section">
							<?php $this->render_section_header(__('Fluent Forms Conditions', 'aegis'), __('Block-level conditions based on Fluent Forms submission status, count, and field values.', 'aegis')); ?>

							<div class="aegis-settings-grid">
								<?php $this->render_toggle('fluentforms', 'ff_submitted', __('Has Submitted', 'aegis'), __('Show or hide blocks based on whether the user has submitted a specific form.', 'aegis'), $options, 'yes-alt'); ?>
								<?php $this->render_toggle('fluentforms', 'ff_count', __('Submission Count', 'aegis'), __('Show or hide blocks based on the number of submissions for a form.', 'aegis'), $options, 'chart-bar'); ?>
								<?php $this->render_toggle('fluentforms', 'ff_field', __('Field Value', 'aegis'), __('Show or hide blocks based on a specific field value in a submission.', 'aegis'), $options, 'editor-table'); ?>
							</div>
						</section>

						<!-- Fluent Booking Section -->
						<section id="fluentbooking" class="aegis-settings-section">
							<?php $this->render_section_header(__('Fluent Booking Conditions', 'aegis'), __('Block-level conditions based on Fluent Booking status and booking counts.', 'aegis')); ?>

							<div class="aegis-settings-grid">
								<?php $this->render_toggle('fluentbooking', 'fb_has_booking', __('Has Booking', 'aegis'), __('Show or hide blocks based on whether the user has any booking.', 'aegis'), $options, 'calendar-alt'); ?>
								<?php $this->render_toggle('fluentbooking', 'fb_upcoming', __('Upcoming Count', 'aegis'), __('Show or hide blocks based on the number of upcoming bookings.', 'aegis'), $options, 'clock'); ?>
								<?php $this->render_toggle('fluentbooking', 'fb_past', __('Past Count', 'aegis'), __('Show or hide blocks based on the number of past bookings.', 'aegis'), $options, 'backup'); ?>
								<?php $this->render_toggle('fluentbooking', 'fb_status', __('Booking Status', 'aegis'), __('Show or hide blocks based on a specific booking status.', 'aegis'), $options, 'flag'); ?>
							</div>
						</section>

						<!-- Image Source Section -->
						<section id="image-source" class="aegis-settings-section">
							<?php $this->render_section_header(__('Image Source Order', 'aegis'), __('Choose which image to display in Post Featured Image blocks instead of the default featured image.', 'aegis')); ?>

							<div class="aegis-settings-grid">
								<?php $this->render_toggle('image_source', 'image_source_order', __('Image Source Order', 'aegis'), __('Select content images by position, ACF fields, or MetaBox fields with fallback chain support.', 'aegis'), $options, 'format-image'); ?>
							</div>
						</section>

						<div class="aegis-settings-footer">
							<?php submit_button(__('Save Settings', 'aegis'), 'primary', 'submit', false); ?>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
		<?php
	}

	/**
	 * Render integrations settings page.
	 *
	 * @return void
	 */
	public function render_integrations_page(): void
	{
		$options = get_option(SettingsRepository::INTEGRATIONS_OPTION, SettingsRepository::INTEGRATION_DEFAULTS);
		$options = wp_parse_args($options, SettingsRepository::INTEGRATION_DEFAULTS);
		?>
		<div class="aegis-admin-page">
			<?php $this->render_top_bar(); ?>
			<?php $this->render_page_tabs('integrations'); ?>

			<div class="aegis-settings-wrap">
				<div class="aegis-settings-header">
					<h1><?php esc_html_e('Integrations', 'aegis'); ?></h1>
					<p><?php esc_html_e('Enable or disable third-party plugin integrations.', 'aegis'); ?></p>
				</div>

				<?php $this->render_toolbar('integrations'); ?>

				<form method="post" action="options.php" class="aegis-settings-form aegis-integrations-form">
					<?php settings_fields('aegis_integrations_group'); ?>

					<div class="aegis-settings-layout">
						<nav class="aegis-settings-nav">
							<a href="#ecommerce" class="aegis-nav-item active">
								<span class="dashicons dashicons-cart"></span>
								<?php esc_html_e('Commerce', 'aegis'); ?>
							</a>
							<a href="#lms" class="aegis-nav-item">
								<span class="dashicons dashicons-welcome-learn-more"></span>
								<?php esc_html_e('LMS', 'aegis'); ?>
							</a>
							<a href="#forms" class="aegis-nav-item">
								<span class="dashicons dashicons-feedback"></span>
								<?php esc_html_e('Forms & Booking', 'aegis'); ?>
							</a>
							<a href="#content" class="aegis-nav-item">
								<span class="dashicons dashicons-groups"></span>
								<?php esc_html_e('Content', 'aegis'); ?>
							</a>
							<a href="#seo" class="aegis-nav-item">
								<span class="dashicons dashicons-chart-line"></span>
								<?php esc_html_e('SEO', 'aegis'); ?>
							</a>
							<a href="#developer" class="aegis-nav-item">
								<span class="dashicons dashicons-editor-code"></span>
								<?php esc_html_e('Developer', 'aegis'); ?>
							</a>
							<a href="#performance" class="aegis-nav-item">
								<span class="dashicons dashicons-performance"></span>
								<?php esc_html_e('Performance', 'aegis'); ?>
							</a>
							<a href="#maps" class="aegis-nav-item">
								<span class="dashicons dashicons-location"></span>
								<?php esc_html_e('Maps', 'aegis'); ?>
							</a>
						</nav>

						<div class="aegis-settings-content">
							<!-- Commerce Section -->
							<section id="ecommerce" class="aegis-settings-section active">
								<?php $this->render_section_header(__('Commerce Integrations', 'aegis'), __('Integrations for commerce plugins.', 'aegis')); ?>

								<div class="aegis-settings-grid">
									<?php $this->render_integration_toggle('woocommerce', __('WooCommerce', 'aegis'), __('E-commerce platform for selling physical products and digital downloads.', 'aegis'), $options, 'woocommerce', 'cart'); ?>
									<?php
									$has_pro = $this->is_aegis_pro_active();
									$pattern_options = get_option('aegis_pattern_control', []);
									$wc_keep_patterns = $pattern_options['woocommerce_keep_patterns'] ?? false;
									$wc_keep_templates = $pattern_options['woocommerce_keep_templates'] ?? false;
									?>
									<div class="aegis-toggle-suboptions">
										<div class="aegis-toggle-card aegis-toggle-subcard <?php echo !$has_pro ? 'aegis-pro-feature aegis-toggle-disabled' : ''; ?>">
											<div class="aegis-toggle-info">
												<div class="aegis-toggle-icon">
													<span class="dashicons dashicons-layout"></span>
												</div>
												<div class="aegis-toggle-text">
													<h3>
														<?php esc_html_e('WooCommerce Patterns', 'aegis'); ?>
														<?php if (!$has_pro): ?>
														<span class="aegis-pro-badge">
															<span class="dashicons dashicons-star-filled"></span>
															<?php esc_html_e('Pro', 'aegis'); ?>
														</span>
														<?php endif; ?>
													</h3>
													<p><?php esc_html_e('Remove default WooCommerce block patterns from the editor.', 'aegis'); ?></p>
												</div>
											</div>
											<label class="aegis-toggle">
												<input type="checkbox" name="aegis_pattern_control[woocommerce_keep_patterns]" value="1" <?php checked($wc_keep_patterns); ?> <?php disabled(!$has_pro); ?>>
												<span class="aegis-toggle-slider"></span>
											</label>
										</div>

										<div class="aegis-toggle-card aegis-toggle-subcard <?php echo !$has_pro ? 'aegis-pro-feature aegis-toggle-disabled' : ''; ?>">
											<div class="aegis-toggle-info">
												<div class="aegis-toggle-icon">
													<span class="dashicons dashicons-media-default"></span>
												</div>
												<div class="aegis-toggle-text">
													<h3>
														<?php esc_html_e('WooCommerce Templates', 'aegis'); ?>
														<?php if (!$has_pro): ?>
														<span class="aegis-pro-badge">
															<span class="dashicons dashicons-star-filled"></span>
															<?php esc_html_e('Pro', 'aegis'); ?>
														</span>
														<?php endif; ?>
													</h3>
													<p><?php esc_html_e('Remove default WooCommerce block templates from the editor.', 'aegis'); ?></p>
												</div>
											</div>
											<label class="aegis-toggle">
												<input type="checkbox" name="aegis_pattern_control[woocommerce_keep_templates]" value="1" <?php checked($wc_keep_templates); ?> <?php disabled(!$has_pro); ?>>
												<span class="aegis-toggle-slider"></span>
											</label>
										</div>
									</div>
								</div>
							</section>

							<!-- LMS Section -->
							<section id="lms" class="aegis-settings-section">
								<?php $this->render_section_header(__('Learning Management Systems', 'aegis'), __('Integrations for online course and learning platforms.', 'aegis')); ?>

								<div class="aegis-settings-grid">
									<?php $this->render_integration_toggle('learndash', __('LearnDash', 'aegis'), __('Powerful LMS plugin for creating and selling courses.', 'aegis'), $options, 'learndash', 'welcome-learn-more'); ?>
									<?php
									$ld_patterns = $pattern_options['learndash_keep_patterns'] ?? false;
									?>
									<div class="aegis-toggle-suboptions">
										<div class="aegis-toggle-card aegis-toggle-subcard <?php echo !$has_pro ? 'aegis-pro-feature aegis-toggle-disabled' : ''; ?>">
											<div class="aegis-toggle-info">
												<div class="aegis-toggle-icon">
													<span class="dashicons dashicons-layout"></span>
												</div>
												<div class="aegis-toggle-text">
													<h3>
														<?php esc_html_e('LearnDash Patterns', 'aegis'); ?>
														<?php if (!$has_pro): ?>
														<span class="aegis-pro-badge">
															<span class="dashicons dashicons-star-filled"></span>
															<?php esc_html_e('Pro', 'aegis'); ?>
														</span>
														<?php endif; ?>
													</h3>
													<p><?php esc_html_e('Remove default LearnDash block patterns from the editor.', 'aegis'); ?></p>
												</div>
											</div>
											<label class="aegis-toggle">
												<input type="checkbox" name="aegis_pattern_control[learndash_keep_patterns]" value="1" <?php checked($ld_patterns); ?> <?php disabled(!$has_pro); ?>>
												<span class="aegis-toggle-slider"></span>
											</label>
										</div>
									</div>

									<?php $this->render_integration_toggle('lifter_lms', __('LifterLMS', 'aegis'), __('Complete LMS solution for course creation and membership.', 'aegis'), $options, 'lifter_lms', 'awards'); ?>
									<?php
									$llms_patterns = $pattern_options['lifterlms_keep_patterns'] ?? false;
									?>
									<div class="aegis-toggle-suboptions">
										<div class="aegis-toggle-card aegis-toggle-subcard <?php echo !$has_pro ? 'aegis-pro-feature aegis-toggle-disabled' : ''; ?>">
											<div class="aegis-toggle-info">
												<div class="aegis-toggle-icon">
													<span class="dashicons dashicons-layout"></span>
												</div>
												<div class="aegis-toggle-text">
													<h3>
														<?php esc_html_e('LifterLMS Patterns', 'aegis'); ?>
														<?php if (!$has_pro): ?>
														<span class="aegis-pro-badge">
															<span class="dashicons dashicons-star-filled"></span>
															<?php esc_html_e('Pro', 'aegis'); ?>
														</span>
														<?php endif; ?>
													</h3>
													<p><?php esc_html_e('Remove default LifterLMS block patterns from the editor.', 'aegis'); ?></p>
												</div>
											</div>
											<label class="aegis-toggle">
												<input type="checkbox" name="aegis_pattern_control[lifterlms_keep_patterns]" value="1" <?php checked($llms_patterns); ?> <?php disabled(!$has_pro); ?>>
												<span class="aegis-toggle-slider"></span>
											</label>
										</div>
									</div>

									<?php $this->render_integration_toggle('sensei_lms', __('Sensei LMS', 'aegis'), __('Learning management by WooCommerce.', 'aegis'), $options, 'sensei_lms', 'book'); ?>
									<?php
									$sensei_patterns = $pattern_options['sensei_keep_patterns'] ?? false;
									?>
									<div class="aegis-toggle-suboptions">
										<div class="aegis-toggle-card aegis-toggle-subcard <?php echo !$has_pro ? 'aegis-pro-feature aegis-toggle-disabled' : ''; ?>">
											<div class="aegis-toggle-info">
												<div class="aegis-toggle-icon">
													<span class="dashicons dashicons-layout"></span>
												</div>
												<div class="aegis-toggle-text">
													<h3>
														<?php esc_html_e('Sensei LMS Patterns', 'aegis'); ?>
														<?php if (!$has_pro): ?>
														<span class="aegis-pro-badge">
															<span class="dashicons dashicons-star-filled"></span>
															<?php esc_html_e('Pro', 'aegis'); ?>
														</span>
														<?php endif; ?>
													</h3>
													<p><?php esc_html_e('Remove default Sensei LMS block patterns from the editor.', 'aegis'); ?></p>
												</div>
											</div>
											<label class="aegis-toggle">
												<input type="checkbox" name="aegis_pattern_control[sensei_keep_patterns]" value="1" <?php checked($sensei_patterns); ?> <?php disabled(!$has_pro); ?>>
												<span class="aegis-toggle-slider"></span>
											</label>
										</div>
									</div>
								</div>
							</section>

							<!-- Forms & Booking Section -->
							<section id="forms" class="aegis-settings-section">
								<?php $this->render_section_header(__('Forms & Booking', 'aegis'), __('Integrations for form builders and booking systems.', 'aegis')); ?>

								<div class="aegis-settings-grid">
									<?php $this->render_integration_toggle('fluent_forms', __('Fluent Forms', 'aegis'), __('Fast and lightweight form builder plugin.', 'aegis'), $options, 'fluent_forms', 'feedback'); ?>
									<?php
									$ff_patterns = $pattern_options['fluentforms_keep_patterns'] ?? false;
									?>
									<div class="aegis-toggle-suboptions">
										<div class="aegis-toggle-card aegis-toggle-subcard <?php echo !$has_pro ? 'aegis-pro-feature aegis-toggle-disabled' : ''; ?>">
											<div class="aegis-toggle-info">
												<div class="aegis-toggle-icon">
													<span class="dashicons dashicons-layout"></span>
												</div>
												<div class="aegis-toggle-text">
													<h3>
														<?php esc_html_e('Fluent Forms Patterns', 'aegis'); ?>
														<?php if (!$has_pro): ?>
														<span class="aegis-pro-badge">
															<span class="dashicons dashicons-star-filled"></span>
															<?php esc_html_e('Pro', 'aegis'); ?>
														</span>
														<?php endif; ?>
													</h3>
													<p><?php esc_html_e('Remove default Fluent Forms block patterns from the editor.', 'aegis'); ?></p>
												</div>
											</div>
											<label class="aegis-toggle">
												<input type="checkbox" name="aegis_pattern_control[fluentforms_keep_patterns]" value="1" <?php checked($ff_patterns); ?> <?php disabled(!$has_pro); ?>>
												<span class="aegis-toggle-slider"></span>
											</label>
										</div>
									</div>

									<?php $this->render_integration_toggle('fluent_booking', __('Fluent Booking', 'aegis'), __('Appointment and booking management system.', 'aegis'), $options, 'fluent_booking', 'calendar-alt'); ?>
									<?php
									$fb_patterns = $pattern_options['fluentbooking_keep_patterns'] ?? false;
									?>
									<div class="aegis-toggle-suboptions">
										<div class="aegis-toggle-card aegis-toggle-subcard <?php echo !$has_pro ? 'aegis-pro-feature aegis-toggle-disabled' : ''; ?>">
											<div class="aegis-toggle-info">
												<div class="aegis-toggle-icon">
													<span class="dashicons dashicons-layout"></span>
												</div>
												<div class="aegis-toggle-text">
													<h3>
														<?php esc_html_e('Fluent Booking Patterns', 'aegis'); ?>
														<?php if (!$has_pro): ?>
														<span class="aegis-pro-badge">
															<span class="dashicons dashicons-star-filled"></span>
															<?php esc_html_e('Pro', 'aegis'); ?>
														</span>
														<?php endif; ?>
													</h3>
													<p><?php esc_html_e('Remove default Fluent Booking block patterns from the editor.', 'aegis'); ?></p>
												</div>
											</div>
											<label class="aegis-toggle">
												<input type="checkbox" name="aegis_pattern_control[fluentbooking_keep_patterns]" value="1" <?php checked($fb_patterns); ?> <?php disabled(!$has_pro); ?>>
												<span class="aegis-toggle-slider"></span>
											</label>
										</div>
									</div>

									<?php $this->render_integration_toggle('fluent_crm', __('FluentCRM', 'aegis'), __('CRM and email marketing automation for video events.', 'aegis'), $options, 'fluent_crm', 'email'); ?>
								</div>
							</section>

							<!-- Content Section -->
							<section id="content" class="aegis-settings-section">
								<?php $this->render_section_header(__('Content', 'aegis'), __('Integrations for content authoring and publishing plugins.', 'aegis')); ?>

								<div class="aegis-settings-grid">
									<?php $this->render_integration_toggle('co_authors_plus', __('Co-Authors Plus', 'aegis'), __('Multiple bylines and guest authors for posts and pages.', 'aegis'), $options, 'co_authors_plus', 'groups'); ?>
								</div>
							</section>

							<!-- SEO Section -->
							<section id="seo" class="aegis-settings-section">
								<?php $this->render_section_header(__('SEO', 'aegis'), __('Integrations for search engine optimization plugins.', 'aegis')); ?>

								<div class="aegis-settings-grid">
									<?php $this->render_integration_toggle('rank_math', __('Rank Math', 'aegis'), __('SEO plugin for optimizing your content.', 'aegis'), $options, 'rank_math', 'chart-line'); ?>
								</div>
							</section>

							<!-- Developer Section -->
							<section id="developer" class="aegis-settings-section">
								<?php $this->render_section_header(__('Developer Tools', 'aegis'), __('Integrations for developer-focused plugins.', 'aegis')); ?>

								<div class="aegis-settings-grid">
									<?php $this->render_integration_toggle('advanced_custom_fields', __('Advanced Custom Fields', 'aegis'), __('Custom fields and meta boxes for WordPress.', 'aegis'), $options, 'acf', 'admin-generic'); ?>
									<?php $this->render_integration_toggle('meta_box', __('Meta Box', 'aegis'), __('Lightweight custom fields framework for WordPress.', 'aegis'), $options, 'meta_box', 'admin-generic'); ?>
									<?php $this->render_integration_toggle('code_block_pro', __('Code Block Pro', 'aegis'), __('Syntax highlighting for code blocks.', 'aegis'), $options, 'code_block_pro', 'editor-code'); ?>
									<?php $this->render_integration_toggle('syntax_highlighting', __('Syntax Highlighting Code Block', 'aegis'), __('Alternative syntax highlighting for code.', 'aegis'), $options, 'syntax_highlighting', 'editor-code'); ?>
								</div>
							</section>

							<!-- Performance Section -->
							<section id="performance" class="aegis-settings-section">
								<?php $this->render_section_header(__('Performance', 'aegis'), __('BunnyCDN integration for the Video block.', 'aegis'), false); ?>

								<?php
								$has_pro = $this->is_aegis_pro_active();
								$bunnycdn_settings = get_option(SettingsRepository::BUNNYCDN_OPTION, SettingsRepository::BUNNYCDN_DEFAULTS);
								$bunnycdn_settings = wp_parse_args($bunnycdn_settings, SettingsRepository::BUNNYCDN_DEFAULTS);
								?>

								<div class="aegis-settings-grid">
									<?php
									// Stream Library
									$stream_key = 'bunny_cdn_stream_library';
									$stream_checked = $options[$stream_key] ?? false;
									?>
									<div class="aegis-toggle-card aegis-toggle-subcard <?php echo !$has_pro ? 'aegis-pro-feature aegis-toggle-disabled' : ''; ?>">
										<div class="aegis-toggle-info">
											<div class="aegis-toggle-icon">
												<span class="dashicons dashicons-video-alt3"></span>
											</div>
											<div class="aegis-toggle-text">
												<h3>
													<?php esc_html_e('Stream Library', 'aegis'); ?>
													<?php if (!$has_pro): ?>
													<span class="aegis-pro-badge">
														<span class="dashicons dashicons-star-filled"></span>
														<?php esc_html_e('Pro', 'aegis'); ?>
													</span>
													<?php endif; ?>
												</h3>
												<p><?php esc_html_e('Access and manage your BunnyCDN Stream video library directly from WordPress.', 'aegis'); ?></p>
											</div>
										</div>
										<label class="aegis-toggle">
											<input type="checkbox" name="<?php echo esc_attr(SettingsRepository::INTEGRATIONS_OPTION . "[{$stream_key}]"); ?>" value="1" <?php checked($stream_checked); ?> <?php disabled(!$has_pro); ?>>
											<span class="aegis-toggle-slider"></span>
										</label>
									</div>

									<?php
									// Direct Upload
									$upload_key = 'bunny_cdn_direct_upload';
									$upload_checked = $options[$upload_key] ?? false;
									?>
									<div class="aegis-toggle-card aegis-toggle-subcard <?php echo !$has_pro ? 'aegis-pro-feature aegis-toggle-disabled' : ''; ?>">
										<div class="aegis-toggle-info">
											<div class="aegis-toggle-icon">
												<span class="dashicons dashicons-upload"></span>
											</div>
											<div class="aegis-toggle-text">
												<h3>
													<?php esc_html_e('Direct Upload', 'aegis'); ?>
													<?php if (!$has_pro): ?>
													<span class="aegis-pro-badge">
														<span class="dashicons dashicons-star-filled"></span>
														<?php esc_html_e('Pro', 'aegis'); ?>
													</span>
													<?php endif; ?>
												</h3>
												<p><?php esc_html_e('Upload videos directly to BunnyCDN Stream from the block editor.', 'aegis'); ?></p>
											</div>
										</div>
										<label class="aegis-toggle">
											<input type="checkbox" name="<?php echo esc_attr(SettingsRepository::INTEGRATIONS_OPTION . "[{$upload_key}]"); ?>" value="1" <?php checked($upload_checked); ?> <?php disabled(!$has_pro); ?>>
											<span class="aegis-toggle-slider"></span>
										</label>
									</div>

									<?php
									// HLS Streaming
									$hls_key = 'bunny_cdn_hls_streaming';
									$hls_checked = $options[$hls_key] ?? false;
									?>
									<div class="aegis-toggle-card aegis-toggle-subcard <?php echo !$has_pro ? 'aegis-pro-feature aegis-toggle-disabled' : ''; ?>">
										<div class="aegis-toggle-info">
											<div class="aegis-toggle-icon">
												<span class="dashicons dashicons-controls-play"></span>
											</div>
											<div class="aegis-toggle-text">
												<h3>
													<?php esc_html_e('HLS Streaming', 'aegis'); ?>
													<?php if (!$has_pro): ?>
													<span class="aegis-pro-badge">
														<span class="dashicons dashicons-star-filled"></span>
														<?php esc_html_e('Pro', 'aegis'); ?>
													</span>
													<?php endif; ?>
												</h3>
												<p><?php esc_html_e('Enable adaptive bitrate HLS streaming for optimal playback quality.', 'aegis'); ?></p>
											</div>
										</div>
										<label class="aegis-toggle">
											<input type="checkbox" name="<?php echo esc_attr(SettingsRepository::INTEGRATIONS_OPTION . "[{$hls_key}]"); ?>" value="1" <?php checked($hls_checked); ?> <?php disabled(!$has_pro); ?>>
											<span class="aegis-toggle-slider"></span>
										</label>
									</div>

									<?php
									// AI Transcription
									$transcription_key = 'bunny_cdn_ai_transcription';
									$transcription_checked = $options[$transcription_key] ?? false;
									?>
									<div class="aegis-toggle-card aegis-toggle-subcard <?php echo !$has_pro ? 'aegis-pro-feature aegis-toggle-disabled' : ''; ?>">
										<div class="aegis-toggle-info">
											<div class="aegis-toggle-icon">
												<span class="dashicons dashicons-text"></span>
											</div>
											<div class="aegis-toggle-text">
												<h3>
													<?php esc_html_e('AI Transcription', 'aegis'); ?>
													<?php if (!$has_pro): ?>
													<span class="aegis-pro-badge">
														<span class="dashicons dashicons-star-filled"></span>
														<?php esc_html_e('Pro', 'aegis'); ?>
													</span>
													<?php endif; ?>
												</h3>
												<p><?php esc_html_e('Automatic video transcription and captions powered by AI.', 'aegis'); ?></p>
											</div>
										</div>
										<label class="aegis-toggle">
											<input type="checkbox" name="<?php echo esc_attr(SettingsRepository::INTEGRATIONS_OPTION . "[{$transcription_key}]"); ?>" value="1" <?php checked($transcription_checked); ?> <?php disabled(!$has_pro); ?>>
											<span class="aegis-toggle-slider"></span>
										</label>
									</div>

									<?php
									// Video Thumbnails
									$thumbnails_key = 'bunny_cdn_video_thumbnails';
									$thumbnails_checked = $options[$thumbnails_key] ?? false;
									?>
									<div class="aegis-toggle-card aegis-toggle-subcard <?php echo !$has_pro ? 'aegis-pro-feature aegis-toggle-disabled' : ''; ?>">
										<div class="aegis-toggle-info">
											<div class="aegis-toggle-icon">
												<span class="dashicons dashicons-format-image"></span>
											</div>
											<div class="aegis-toggle-text">
												<h3>
													<?php esc_html_e('Video Thumbnails', 'aegis'); ?>
													<?php if (!$has_pro): ?>
													<span class="aegis-pro-badge">
														<span class="dashicons dashicons-star-filled"></span>
														<?php esc_html_e('Pro', 'aegis'); ?>
													</span>
													<?php endif; ?>
												</h3>
												<p><?php esc_html_e('Auto-generate video thumbnails and preview sprites from BunnyCDN.', 'aegis'); ?></p>
											</div>
										</div>
										<label class="aegis-toggle">
											<input type="checkbox" name="<?php echo esc_attr(SettingsRepository::INTEGRATIONS_OPTION . "[{$thumbnails_key}]"); ?>" value="1" <?php checked($thumbnails_checked); ?> <?php disabled(!$has_pro); ?>>
											<span class="aegis-toggle-slider"></span>
										</label>
									</div>

									<?php
									// Video Watermark
									$watermark_key = 'bunny_cdn_video_watermark';
									$watermark_checked = $options[$watermark_key] ?? false;
									?>
									<div class="aegis-toggle-card aegis-toggle-subcard <?php echo !$has_pro ? 'aegis-pro-feature aegis-toggle-disabled' : ''; ?>">
										<div class="aegis-toggle-info">
											<div class="aegis-toggle-icon">
												<span class="dashicons dashicons-shield"></span>
											</div>
											<div class="aegis-toggle-text">
												<h3>
													<?php esc_html_e('Video Watermark', 'aegis'); ?>
													<?php if (!$has_pro): ?>
													<span class="aegis-pro-badge">
														<span class="dashicons dashicons-star-filled"></span>
														<?php esc_html_e('Pro', 'aegis'); ?>
													</span>
													<?php endif; ?>
												</h3>
												<p><?php esc_html_e('Add watermarks to videos for branding and copyright protection.', 'aegis'); ?></p>
											</div>
										</div>
										<label class="aegis-toggle">
											<input type="checkbox" name="<?php echo esc_attr(SettingsRepository::INTEGRATIONS_OPTION . "[{$watermark_key}]"); ?>" value="1" <?php checked($watermark_checked); ?> <?php disabled(!$has_pro); ?>>
											<span class="aegis-toggle-slider"></span>
										</label>
									</div>
								</div>

								<!-- BunnyCDN API Configuration -->
								<div class="aegis-api-config <?php echo !$has_pro ? 'aegis-pro-feature aegis-api-config-disabled' : ''; ?>">
									<div class="aegis-api-config-header">
										<div class="aegis-api-config-title">
											<span class="dashicons dashicons-admin-network"></span>
											<span><?php esc_html_e('BunnyCDN API', 'aegis'); ?></span>
										</div>
										<?php if (!$has_pro): ?>
										<span class="aegis-pro-badge">
											<span class="dashicons dashicons-lock"></span>
											<?php esc_html_e('Pro', 'aegis'); ?>
										</span>
										<?php endif; ?>
									</div>

									<!-- Account API Key -->
									<div class="aegis-api-field-row">
										<div class="aegis-api-field-info">
											<div class="aegis-api-field-icon">
												<span class="dashicons dashicons-admin-network"></span>
											</div>
											<div class="aegis-api-field-text">
												<label><?php esc_html_e('Account API Key', 'aegis'); ?></label>
												<p><?php esc_html_e('Found in your BunnyCDN dashboard under Account â†’ API.', 'aegis'); ?></p>
											</div>
										</div>
										<div class="aegis-api-field-input">
											<input type="password" 
												name="<?php echo esc_attr(SettingsRepository::BUNNYCDN_OPTION . '[api_key]'); ?>" 
												value="<?php echo esc_attr($bunnycdn_settings['api_key']); ?>" 
												class="aegis-bunnycdn-field"
												placeholder="<?php esc_attr_e('Enter API Key', 'aegis'); ?>"
												<?php disabled(!$has_pro); ?>>
										</div>
									</div>

									<!-- CDN Section Header -->
									<div class="aegis-api-section-header">
										<span class="dashicons dashicons-performance"></span>
										<?php esc_html_e('CDN Settings', 'aegis'); ?>
									</div>

									<!-- Pull Zone -->
									<div class="aegis-api-field-row">
										<div class="aegis-api-field-info">
											<div class="aegis-api-field-icon">
												<span class="dashicons dashicons-networking"></span>
											</div>
											<div class="aegis-api-field-text">
												<label><?php esc_html_e('Pull Zone Name', 'aegis'); ?></label>
												<p><?php esc_html_e('The name of your CDN pull zone.', 'aegis'); ?></p>
											</div>
										</div>
										<div class="aegis-api-field-input">
											<input type="text" 
												name="<?php echo esc_attr(SettingsRepository::BUNNYCDN_OPTION . '[cdn_pullzone]'); ?>" 
												value="<?php echo esc_attr($bunnycdn_settings['cdn_pullzone']); ?>" 
												class="aegis-bunnycdn-field"
												placeholder="<?php esc_attr_e('my-pullzone', 'aegis'); ?>"
												<?php disabled(!$has_pro); ?>>
										</div>
									</div>

									<!-- CDN Hostname -->
									<div class="aegis-api-field-row">
										<div class="aegis-api-field-info">
											<div class="aegis-api-field-icon">
												<span class="dashicons dashicons-admin-site-alt3"></span>
											</div>
											<div class="aegis-api-field-text">
												<label><?php esc_html_e('CDN Hostname', 'aegis'); ?></label>
												<p><?php esc_html_e('Your CDN hostname or custom domain.', 'aegis'); ?></p>
											</div>
										</div>
										<div class="aegis-api-field-input">
											<input type="text" 
												name="<?php echo esc_attr(SettingsRepository::BUNNYCDN_OPTION . '[cdn_hostname]'); ?>" 
												value="<?php echo esc_attr($bunnycdn_settings['cdn_hostname']); ?>" 
												class="aegis-bunnycdn-field"
												placeholder="<?php esc_attr_e('cdn.example.com', 'aegis'); ?>"
												<?php disabled(!$has_pro); ?>>
										</div>
									</div>

									<!-- Storage Section Header -->
									<div class="aegis-api-section-header">
										<span class="dashicons dashicons-cloud"></span>
										<?php esc_html_e('Storage Settings', 'aegis'); ?>
									</div>

									<!-- Storage Zone -->
									<div class="aegis-api-field-row">
										<div class="aegis-api-field-info">
											<div class="aegis-api-field-icon">
												<span class="dashicons dashicons-portfolio"></span>
											</div>
											<div class="aegis-api-field-text">
												<label><?php esc_html_e('Storage Zone Name', 'aegis'); ?></label>
												<p><?php esc_html_e('The name of your storage zone.', 'aegis'); ?></p>
											</div>
										</div>
										<div class="aegis-api-field-input">
											<input type="text" 
												name="<?php echo esc_attr(SettingsRepository::BUNNYCDN_OPTION . '[storage_zone]'); ?>" 
												value="<?php echo esc_attr($bunnycdn_settings['storage_zone']); ?>" 
												class="aegis-bunnycdn-field"
												placeholder="<?php esc_attr_e('my-storage-zone', 'aegis'); ?>"
												<?php disabled(!$has_pro); ?>>
										</div>
									</div>

									<!-- Storage API Key -->
									<div class="aegis-api-field-row">
										<div class="aegis-api-field-info">
											<div class="aegis-api-field-icon">
												<span class="dashicons dashicons-lock"></span>
											</div>
											<div class="aegis-api-field-text">
												<label><?php esc_html_e('Storage API Key', 'aegis'); ?></label>
												<p><?php esc_html_e('Storage zone password/API key.', 'aegis'); ?></p>
											</div>
										</div>
										<div class="aegis-api-field-input">
											<input type="password" 
												name="<?php echo esc_attr(SettingsRepository::BUNNYCDN_OPTION . '[storage_api_key]'); ?>" 
												value="<?php echo esc_attr($bunnycdn_settings['storage_api_key']); ?>" 
												class="aegis-bunnycdn-field"
												placeholder="<?php esc_attr_e('Enter Storage API Key', 'aegis'); ?>"
												<?php disabled(!$has_pro); ?>>
										</div>
									</div>

									<!-- Storage Region -->
									<div class="aegis-api-field-row">
										<div class="aegis-api-field-info">
											<div class="aegis-api-field-icon">
												<span class="dashicons dashicons-location-alt"></span>
											</div>
											<div class="aegis-api-field-text">
												<label><?php esc_html_e('Storage Region', 'aegis'); ?></label>
												<p><?php esc_html_e('Select your storage zone region.', 'aegis'); ?></p>
											</div>
										</div>
										<div class="aegis-api-field-input">
											<select name="<?php echo esc_attr(SettingsRepository::BUNNYCDN_OPTION . '[storage_region]'); ?>" 
												class="aegis-bunnycdn-field"
												<?php disabled(!$has_pro); ?>>
												<option value="de" <?php selected($bunnycdn_settings['storage_region'], 'de'); ?>><?php esc_html_e('Falkenstein (DE)', 'aegis'); ?></option>
												<option value="ny" <?php selected($bunnycdn_settings['storage_region'], 'ny'); ?>><?php esc_html_e('New York (US)', 'aegis'); ?></option>
												<option value="la" <?php selected($bunnycdn_settings['storage_region'], 'la'); ?>><?php esc_html_e('Los Angeles (US)', 'aegis'); ?></option>
												<option value="sg" <?php selected($bunnycdn_settings['storage_region'], 'sg'); ?>><?php esc_html_e('Singapore (SG)', 'aegis'); ?></option>
												<option value="syd" <?php selected($bunnycdn_settings['storage_region'], 'syd'); ?>><?php esc_html_e('Sydney (AU)', 'aegis'); ?></option>
												<option value="uk" <?php selected($bunnycdn_settings['storage_region'], 'uk'); ?>><?php esc_html_e('London (UK)', 'aegis'); ?></option>
												<option value="se" <?php selected($bunnycdn_settings['storage_region'], 'se'); ?>><?php esc_html_e('Stockholm (SE)', 'aegis'); ?></option>
												<option value="br" <?php selected($bunnycdn_settings['storage_region'], 'br'); ?>><?php esc_html_e('SÃ£o Paulo (BR)', 'aegis'); ?></option>
												<option value="jh" <?php selected($bunnycdn_settings['storage_region'], 'jh'); ?>><?php esc_html_e('Johannesburg (ZA)', 'aegis'); ?></option>
											</select>
										</div>
									</div>

									<!-- Stream Section Header -->
									<div class="aegis-api-section-header">
										<span class="dashicons dashicons-video-alt3"></span>
										<?php esc_html_e('Stream Settings', 'aegis'); ?>
									</div>

									<!-- Stream Library ID -->
									<div class="aegis-api-field-row">
										<div class="aegis-api-field-info">
											<div class="aegis-api-field-icon">
												<span class="dashicons dashicons-id"></span>
											</div>
											<div class="aegis-api-field-text">
												<label><?php esc_html_e('Stream Library ID', 'aegis'); ?></label>
												<p><?php esc_html_e('Found in Stream â†’ Library â†’ API.', 'aegis'); ?></p>
											</div>
										</div>
										<div class="aegis-api-field-input">
											<input type="text" 
												name="<?php echo esc_attr(SettingsRepository::BUNNYCDN_OPTION . '[stream_library_id]'); ?>" 
												value="<?php echo esc_attr($bunnycdn_settings['stream_library_id']); ?>" 
												class="aegis-bunnycdn-field"
												placeholder="<?php esc_attr_e('12345', 'aegis'); ?>"
												<?php disabled(!$has_pro); ?>>
										</div>
									</div>

									<!-- Stream API Key -->
									<div class="aegis-api-field-row">
										<div class="aegis-api-field-info">
											<div class="aegis-api-field-icon">
												<span class="dashicons dashicons-admin-network"></span>
											</div>
											<div class="aegis-api-field-text">
												<label><?php esc_html_e('Stream API Key', 'aegis'); ?></label>
												<p><?php esc_html_e('Stream library API key for authentication.', 'aegis'); ?></p>
											</div>
										</div>
										<div class="aegis-api-field-input">
											<input type="password" 
												name="<?php echo esc_attr(SettingsRepository::BUNNYCDN_OPTION . '[stream_api_key]'); ?>" 
												value="<?php echo esc_attr($bunnycdn_settings['stream_api_key']); ?>" 
												class="aegis-bunnycdn-field"
												placeholder="<?php esc_attr_e('Enter Stream API Key', 'aegis'); ?>"
												<?php disabled(!$has_pro); ?>>
										</div>
									</div>

									<!-- Actions -->
									<div class="aegis-api-config-footer">
										<?php if ($has_pro): ?>
										<button type="button" class="button button-primary aegis-save-bunnycdn">
											<span class="dashicons dashicons-saved"></span>
											<?php esc_html_e('Save API Settings', 'aegis'); ?>
										</button>
										<button type="button" class="button aegis-test-bunnycdn">
											<span class="dashicons dashicons-yes-alt"></span>
											<?php esc_html_e('Test Connection', 'aegis'); ?>
										</button>
										<?php else: ?>
										<div class="aegis-api-pro-notice">
											<span class="dashicons dashicons-lock"></span>
											<?php esc_html_e('BunnyCDN API configuration requires Aegis Pro.', 'aegis'); ?>
										</div>
										<?php endif; ?>
									</div>
								</div>
							</section>

							<!-- Maps Section -->
							<section id="maps" class="aegis-settings-section">
								<?php $this->render_section_header(__('Maps', 'aegis'), __('Google Maps API configuration for the Map block.', 'aegis'), false); ?>

								<?php
								$google_maps_settings = get_option(SettingsRepository::GOOGLE_MAPS_OPTION, SettingsRepository::GOOGLE_MAPS_DEFAULTS);
								$google_maps_settings = wp_parse_args($google_maps_settings, SettingsRepository::GOOGLE_MAPS_DEFAULTS);
								?>
								<div class="aegis-api-config">
									<div class="aegis-api-config-header">
										<div class="aegis-api-config-title">
											<span class="dashicons dashicons-location"></span>
											<span><?php esc_html_e('Google Maps API', 'aegis'); ?></span>
										</div>
									</div>

									<!-- API Key -->
									<div class="aegis-api-field-row">
										<div class="aegis-api-field-info">
											<div class="aegis-api-field-icon">
												<span class="dashicons dashicons-admin-network"></span>
											</div>
											<div class="aegis-api-field-text">
												<label><?php esc_html_e('API Key', 'aegis'); ?></label>
												<p><?php esc_html_e('Enter your Google Maps API key. Get one from the Google Cloud Console.', 'aegis'); ?></p>
											</div>
										</div>
										<div class="aegis-api-field-input">
											<input type="password" 
												name="<?php echo esc_attr(SettingsRepository::GOOGLE_MAPS_OPTION . '[api_key]'); ?>" 
												value="<?php echo esc_attr($google_maps_settings['api_key']); ?>" 
												class="aegis-google-maps-field"
												placeholder="<?php esc_attr_e('Enter API Key', 'aegis'); ?>">
										</div>
									</div>

									<div class="aegis-settings-notice" style="margin-top: 12px; padding: 12px; background: #f0f0f1; border-left: 4px solid #2271b1; border-radius: 4px;">
										<p style="margin: 0;">
											<strong><?php esc_html_e('Security Recommendation', 'aegis'); ?></strong><br>
											<?php esc_html_e('Restrict your API key to your domain in the Google Cloud Console under Application Restrictions â†’ HTTP referrers. This prevents unauthorized usage.', 'aegis'); ?>
										</p>
									</div>

									<!-- Actions -->
									<div class="aegis-api-config-footer">
										<button type="button" class="button button-primary aegis-save-google-maps">
											<span class="dashicons dashicons-saved"></span>
											<?php esc_html_e('Save API Settings', 'aegis'); ?>
										</button>
										<button type="button" class="button aegis-test-google-maps">
											<span class="dashicons dashicons-yes-alt"></span>
											<?php esc_html_e('Test Connection', 'aegis'); ?>
										</button>
									</div>
								</div>
							</section>


							<div class="aegis-settings-footer">
								<?php submit_button(__('Save Settings', 'aegis'), 'primary', 'submit', false); ?>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<?php
	}

	/**
	 * Render custom blocks settings page.
	 *
	 * @return void
	 */
	public function render_blocks_page(): void
	{
		$options = get_option(SettingsRepository::BLOCKS_OPTION, SettingsRepository::BLOCKS_DEFAULTS);
		$options = wp_parse_args($options, SettingsRepository::BLOCKS_DEFAULTS);
		?>
		<div class="aegis-admin-page">
			<?php $this->render_top_bar(); ?>
			<?php $this->render_page_tabs('blocks'); ?>

			<div class="aegis-settings-wrap">
				<div class="aegis-settings-header">
					<h1><?php esc_html_e('Blocks', 'aegis'); ?></h1>
					<p><?php esc_html_e('Enable or disable blocks enhancements provided by the framework.', 'aegis'); ?></p>
				</div>

				<?php $this->render_toolbar('blocks'); ?>

				<form method="post" action="options.php" class="aegis-settings-form aegis-blocks-form">
					<?php settings_fields('aegis_blocks_group'); ?>

					<div class="aegis-settings-layout">
						<nav class="aegis-settings-nav">
							<a href="#accordion" class="aegis-nav-item active">
								<span class="dashicons dashicons-list-view"></span>
								<?php esc_html_e('Accordion', 'aegis'); ?>
							</a>
							<a href="#countdown" class="aegis-nav-item">
								<span class="dashicons dashicons-clock"></span>
								<?php esc_html_e('Countdown', 'aegis'); ?>
							</a>
							<a href="#counter" class="aegis-nav-item">
								<span class="dashicons dashicons-editor-ol"></span>
								<?php esc_html_e('Counter', 'aegis'); ?>
							</a>
							<a href="#icon" class="aegis-nav-item">
								<span class="dashicons dashicons-star-filled"></span>
								<?php esc_html_e('Icon', 'aegis'); ?>
							</a>
							<a href="#image-lightbox" class="aegis-nav-item">
								<span class="dashicons dashicons-format-image"></span>
								<?php esc_html_e('Image Lightbox', 'aegis'); ?>
							</a>
							<a href="#map" class="aegis-nav-item">
								<span class="dashicons dashicons-location"></span>
								<?php esc_html_e('Map', 'aegis'); ?>
							</a>
							<a href="#marquee" class="aegis-nav-item">
								<span class="dashicons dashicons-minus"></span>
								<?php esc_html_e('Marquee', 'aegis'); ?>
							</a>
							<a href="#modal" class="aegis-nav-item">
								<span class="dashicons dashicons-editor-expand"></span>
								<?php esc_html_e('Modal', 'aegis'); ?>
							</a>
							<a href="#newsletter" class="aegis-nav-item">
								<span class="dashicons dashicons-email-alt"></span>
								<?php esc_html_e('Newsletter', 'aegis'); ?>
							</a>
							<a href="#query-loop" class="aegis-nav-item">
								<span class="dashicons dashicons-database"></span>
								<?php esc_html_e('Query Loop', 'aegis'); ?>
							</a>
							<a href="#related-posts" class="aegis-nav-item">
								<span class="dashicons dashicons-admin-links"></span>
								<?php esc_html_e('Related Posts', 'aegis'); ?>
							</a>
							<a href="#slider" class="aegis-nav-item">
								<span class="dashicons dashicons-slides"></span>
								<?php esc_html_e('Slider', 'aegis'); ?>
							</a>
							<a href="#svg" class="aegis-nav-item">
								<span class="dashicons dashicons-superhero-alt"></span>
								<?php esc_html_e('SVG', 'aegis'); ?>
							</a>
							<a href="#toggle" class="aegis-nav-item">
								<span class="dashicons dashicons-arrow-down-alt2"></span>
								<?php esc_html_e('Toggle', 'aegis'); ?>
							</a>
							<?php /* @todo Uncomment for v1.0.0 release.
							<a href="#global-styles" class="aegis-nav-item">
								<span class="dashicons dashicons-screenoptions"></span>
								<?php esc_html_e('Utilities', 'aegis'); ?>
							</a>
							*/ ?>
							<a href="#video-block" class="aegis-nav-item">
								<span class="dashicons dashicons-video-alt3"></span>
								<?php esc_html_e('Video', 'aegis'); ?>
							</a>
						</nav>

						<div class="aegis-settings-content">
							<!-- Accordion Section -->
							<section id="accordion" class="aegis-settings-section active">
								<?php $this->render_section_header(__('Accordion Block', 'aegis'), __('List block variation that transforms lists into semantic accordions.', 'aegis'), true, 'list-view'); ?>
								<div class="aegis-settings-section__content">
									<div class="aegis-settings-grid aegis-settings-grid--features">
										<?php $this->render_block_feature_toggle('accordion_open_first', __('Open First Item', 'aegis'), __('Automatically expand the first accordion item on load.', 'aegis'), $options, 'arrow-down-alt2'); ?>
										<?php $this->render_block_feature_toggle('accordion_open_all', __('Open All Items', 'aegis'), __('Expand all accordion items by default.', 'aegis'), $options, 'editor-expand'); ?>
										<?php $this->render_block_feature_toggle('accordion_icon', __('Toggle Icon', 'aegis'), __('Show expand/collapse icon indicator.', 'aegis'), $options, 'plus-alt'); ?>
										<?php $this->render_block_feature_toggle('accordion_border', __('Border Separator', 'aegis'), __('Show border separator between title and content.', 'aegis'), $options, 'minus'); ?>
										<?php
										$rm_faq = SettingsRepository::is_schema_handled_by_rank_math('rank_math_faq_schema');
										$faq_desc = $rm_faq
											? __('FAQ Schema is handled by Rank Math. Disable in Integrations to use built-in schema.', 'aegis')
											: __('Add FAQPage structured data markup for SEO.', 'aegis');
										$this->render_block_feature_toggle('accordion_faq_schema', __('FAQ Schema', 'aegis'), $faq_desc, $options, 'editor-help', false, $rm_faq);
										?>
										<?php $this->render_block_feature_toggle('accordion_single_open', __('Single Open Mode', 'aegis'), __('Close other items when one is opened.', 'aegis'), $options, 'controls-repeat', true); ?>
									</div>
								</div>
							</section>

							<!-- Countdown Section -->
							<section id="countdown" class="aegis-settings-section">
								<?php $this->render_section_header(__('Countdown Block', 'aegis'), __('Countdown timer block that counts down to a specific date and time.', 'aegis'), true, 'clock'); ?>
								<div class="aegis-settings-section__content">
									<div class="aegis-settings-grid aegis-settings-grid--features">
										<?php $this->render_block_feature_toggle('countdown_segments', __('Segment Toggles', 'aegis'), __('Show or hide individual segments (days, hours, minutes, seconds).', 'aegis'), $options, 'visibility'); ?>
										<?php $this->render_block_feature_toggle('countdown_labels', __('Custom Labels', 'aegis'), __('Customize the text labels below each countdown segment.', 'aegis'), $options, 'editor-textcolor'); ?>
										<?php $this->render_block_feature_toggle('countdown_separator', __('Separator Style', 'aegis'), __('Choose separator between segments: colon, dot, dash, or none.', 'aegis'), $options, 'minus'); ?>
										<?php $this->render_block_feature_toggle('countdown_layout', __('Layout Options', 'aegis'), __('Switch between inline and stacked layout modes.', 'aegis'), $options, 'layout'); ?>
										<?php $this->render_block_feature_toggle('countdown_expiry_message', __('Expiry Message', 'aegis'), __('Display a custom message when the countdown reaches zero.', 'aegis'), $options, 'warning'); ?>
										<?php $this->render_block_feature_toggle('countdown_timezone', __('Timezone Control', 'aegis'), __('Choose between UTC and visitor local timezone.', 'aegis'), $options, 'admin-site-alt3'); ?>
										<?php
										$rm_event = SettingsRepository::is_schema_handled_by_rank_math('rank_math_event_schema');
										$event_desc = $rm_event
											? __('Event Schema is handled by Rank Math. Disable in Integrations to use built-in schema.', 'aegis')
											: __('Add Schema.org Event structured data for search engines.', 'aegis');
										$this->render_block_feature_toggle('countdown_schema', __('Schema.org Event', 'aegis'), $event_desc, $options, 'editor-help', false, $rm_event);
										?>
										<?php $this->render_block_feature_toggle('countdown_evergreen', __('Evergreen Countdown', 'aegis'), __('Each visitor gets their own countdown starting from their first visit.', 'aegis'), $options, 'backup', true); ?>
										<?php $this->render_block_feature_toggle('countdown_animation', __('Animation Styles', 'aegis'), __('Animate digit transitions when values change.', 'aegis'), $options, 'image-rotate', true); ?>
										<?php $this->render_block_feature_toggle('countdown_auto_restart', __('Auto-Restart', 'aegis'), __('Automatically restart the countdown after it expires.', 'aegis'), $options, 'controls-repeat', true); ?>
										<?php $this->render_block_feature_toggle('countdown_expiry_actions', __('Expiry Actions', 'aegis'), __('Perform actions when the countdown reaches zero (redirect, hide).', 'aegis'), $options, 'warning', true); ?>
										<?php $this->render_block_feature_toggle('countdown_urgency', __('Urgency Styling', 'aegis'), __('Change appearance when time is running low.', 'aegis'), $options, 'bell', true); ?>
									</div>
								</div>
							</section>

							<!-- Counter Section -->
							<section id="counter" class="aegis-settings-section">
								<?php $this->render_section_header(__('Counter Block', 'aegis'), __('Paragraph block variation that animates numbers with counting effects.', 'aegis'), true, 'editor-ol'); ?>
								<div class="aegis-settings-section__content">
									<div class="aegis-settings-grid aegis-settings-grid--features">
										<?php $this->render_block_feature_toggle('counter_prefix', __('Prefix Text', 'aegis'), __('Display text before the counter number (e.g. currency symbol).', 'aegis'), $options, 'editor-textcolor'); ?>
										<?php $this->render_block_feature_toggle('counter_suffix', __('Suffix Text', 'aegis'), __('Display text after the counter number (e.g. percentage sign).', 'aegis'), $options, 'editor-textcolor'); ?>
										<?php $this->render_block_feature_toggle('counter_delay', __('Start Delay', 'aegis'), __('Delay before the counting animation begins.', 'aegis'), $options, 'clock'); ?>
										<?php $this->render_block_feature_toggle('counter_duration', __('Custom Duration', 'aegis'), __('Control the speed of the counting animation.', 'aegis'), $options, 'dashboard'); ?>
										<?php $this->render_block_feature_toggle('counter_intersection', __('Scroll Trigger', 'aegis'), __('Start animation when the counter scrolls into view.', 'aegis'), $options, 'visibility', true); ?>
									</div>
								</div>
							</section>

							<!-- Icon Section -->
							<section id="icon" class="aegis-settings-section">
								<?php $this->render_section_header(__('Icon Block', 'aegis'), __('Image block variation that transforms images into inline SVG icons.', 'aegis'), true, 'star-filled'); ?>
								<div class="aegis-settings-section__content">
									<div class="aegis-settings-grid aegis-settings-grid--features">
										<?php $this->render_block_feature_toggle('icon_gradient', __('Gradient Colors', 'aegis'), __('Apply gradient colors to icons using CSS mask technique.', 'aegis'), $options, 'art'); ?>
										<?php $this->render_block_feature_toggle('icon_animation', __('Animations', 'aegis'), __('Add animation effects to icon elements.', 'aegis'), $options, 'image-rotate'); ?>
										<?php $this->render_block_feature_toggle('icon_custom_svg', __('Custom SVG', 'aegis'), __('Allow custom SVG string input for icons.', 'aegis'), $options, 'editor-code'); ?>
										<?php $this->render_block_feature_toggle('icon_gallery', __('Icon Gallery', 'aegis'), __('Display all available icons in a grid gallery view.', 'aegis'), $options, 'format-gallery'); ?>
										<?php $this->render_block_feature_toggle('icon_responsive', __('Responsive Sizing', 'aegis'), __('Different icon sizes per breakpoint.', 'aegis'), $options, 'smartphone'); ?>
										<?php $this->render_block_feature_toggle('icon_rest_api', __('REST API Endpoint', 'aegis'), __('Expose icon sets via REST API for editor integration.', 'aegis'), $options, 'rest-api', true); ?>
									</div>
								</div>
							</section>

							<!-- Image Lightbox Section -->
							<section id="image-lightbox" class="aegis-settings-section">
								<?php $this->render_section_header(__('Image Lightbox', 'aegis'), __('Enhances the native WordPress image lightbox with gallery navigation, zoom, captions, and more.', 'aegis'), true, 'format-image'); ?>
								<div class="aegis-settings-section__content">
									<div class="aegis-settings-grid aegis-settings-grid--features">
										<?php $this->render_block_feature_toggle('image_lightbox_gallery_nav', __('Gallery Navigation', 'aegis'), __('Navigate between images in the same group with prev/next arrows and keyboard.', 'aegis'), $options, 'arrow-left-alt2'); ?>
										<?php $this->render_block_feature_toggle('image_lightbox_captions', __('Captions', 'aegis'), __('Display image captions in the lightbox overlay.', 'aegis'), $options, 'editor-textcolor'); ?>
										<?php $this->render_block_feature_toggle('image_lightbox_zoom', __('Zoom', 'aegis'), __('Double-click, scroll wheel, and pinch-to-zoom with pan support.', 'aegis'), $options, 'search'); ?>
										<?php $this->render_block_feature_toggle('image_lightbox_thumbnails', __('Thumbnail Strip', 'aegis'), __('Show a thumbnail navigation strip for galleries with 4+ images.', 'aegis'), $options, 'format-gallery'); ?>
										<?php $this->render_block_feature_toggle('image_lightbox_swipe', __('Swipe Gestures', 'aegis'), __('Navigate between images with touch swipe on mobile devices.', 'aegis'), $options, 'smartphone'); ?>
									</div>
								</div>
							</section>

							<!-- Map Section -->
							<section id="map" class="aegis-settings-section">
								<?php $this->render_section_header(__('Map Block', 'aegis'), __('Google Maps and OpenStreetMap block with markers, styles, and interactive controls.', 'aegis'), true, 'location'); ?>
								<div class="aegis-settings-section__content">
									<div class="aegis-settings-grid aegis-settings-grid--features">
										<?php $this->render_block_feature_toggle('map_markers', __('Multiple Markers', 'aegis'), __('Add multiple markers with title and description info windows.', 'aegis'), $options, 'location-alt'); ?>
										<?php $this->render_block_feature_toggle('map_styles', __('Map Style Presets', 'aegis'), __('Silver, Dark, Retro, Night, Aubergine style presets.', 'aegis'), $options, 'art'); ?>
										<?php $this->render_block_feature_toggle('map_controls', __('Map Controls', 'aegis'), __('Zoom, map type, street view, and fullscreen controls.', 'aegis'), $options, 'admin-settings'); ?>
										<?php $this->render_block_feature_toggle('map_osm_fallback', __('OpenStreetMap Fallback', 'aegis'), __('Use OpenStreetMap when no Google Maps API key is configured.', 'aegis'), $options, 'admin-site-alt3'); ?>
										<?php $this->render_block_feature_toggle('map_directions', __('Directions', 'aegis'), __('Route directions with travel mode selector.', 'aegis'), $options, 'randomize', true); ?>
										<?php $this->render_block_feature_toggle('map_store_locator', __('Store Locator', 'aegis'), __('Search with radius filter and CPT markers.', 'aegis'), $options, 'store', true); ?>
										<?php $this->render_block_feature_toggle('map_geolocation', __('Geolocation', 'aegis'), __('Show user current position on the map.', 'aegis'), $options, 'location', true); ?>
										<?php $this->render_block_feature_toggle('map_heatmap', __('Heatmap Layer', 'aegis'), __('Visualize density data on the map.', 'aegis'), $options, 'chart-area', true); ?>
										<?php $this->render_block_feature_toggle('map_drawing', __('Drawing Tools', 'aegis'), __('Polygon, circle, and rectangle overlays.', 'aegis'), $options, 'edit', true); ?>
										<?php $this->render_block_feature_toggle('map_kml_geojson', __('KML/GeoJSON Import', 'aegis'), __('Load external geographic data layers.', 'aegis'), $options, 'upload', true); ?>
										<?php
										$rm_local = SettingsRepository::is_schema_handled_by_rank_math('rank_math_local_schema');
										$local_desc = $rm_local
											? __('Local Business Schema is handled by Rank Math. Disable in Integrations to use built-in schema.', 'aegis')
											: __('Auto-generate LocalBusiness structured data.', 'aegis');
										$this->render_block_feature_toggle('map_schema', __('Schema.org Markup', 'aegis'), $local_desc, $options, 'admin-site-alt3', false, $rm_local);
										?>
										<?php $this->render_block_feature_toggle('map_dynamic_markers', __('Dynamic CPT Markers', 'aegis'), __('Pull markers from custom post types with lat/lng fields.', 'aegis'), $options, 'database', true); ?>
										<?php $this->render_block_feature_toggle('map_custom_styles', __('Custom Style JSON', 'aegis'), __('Paste raw Google Maps style array for full control.', 'aegis'), $options, 'editor-code', true); ?>
										<?php $this->render_block_feature_toggle('map_custom_icons', __('Custom Marker Icons', 'aegis'), __('Upload custom marker icons from the media library.', 'aegis'), $options, 'format-image', true); ?>
										<?php $this->render_block_feature_toggle('map_clustering', __('Marker Clustering', 'aegis'), __('Group nearby markers at lower zoom levels.', 'aegis'), $options, 'networking', true); ?>
									</div>
									<div class="aegis-settings-notice" style="margin-top: 16px; padding: 12px; background: #f0f0f1; border-left: 4px solid #2271b1; border-radius: 4px;">
										<p style="margin: 0;">
											<strong><?php esc_html_e('Google Maps API', 'aegis'); ?></strong><br>
											<?php 
											printf(
												/* translators: %s: link to Integrations page */
												esc_html__('Configure your Google Maps API key in %s.', 'aegis'),
												'<a href="' . esc_url(admin_url('admin.php?page=aegis-integrations#maps')) . '">' . esc_html__('Integrations â†’ Maps', 'aegis') . '</a>'
											);
											?>
										</p>
									</div>
								</div>
							</section>

							<!-- Marquee Section -->
							<section id="marquee" class="aegis-settings-section">
								<?php $this->render_section_header(__('Marquee Block', 'aegis'), __('Group block variation that creates CSS-powered infinite scrolling banners.', 'aegis'), true, 'minus'); ?>
								<div class="aegis-settings-section__content">
									<div class="aegis-settings-grid aegis-settings-grid--features">
										<?php $this->render_block_feature_toggle('marquee_pause_hover', __('Pause on Hover', 'aegis'), __('Pause the scrolling animation on hover and focus.', 'aegis'), $options, 'controls-pause'); ?>
										<?php $this->render_block_feature_toggle('marquee_direction', __('Direction Control', 'aegis'), __('Set scroll direction (left-to-right or right-to-left).', 'aegis'), $options, 'arrow-right-alt'); ?>
										<?php $this->render_block_feature_toggle('marquee_speed', __('Speed Control', 'aegis'), __('Adjust the animation speed of the scrolling content.', 'aegis'), $options, 'dashboard'); ?>
										<?php $this->render_block_feature_toggle('marquee_repeat', __('Repeat Items', 'aegis'), __('Control how many times items are cloned for seamless looping.', 'aegis'), $options, 'controls-repeat'); ?>
										<?php $this->render_block_feature_toggle('marquee_responsive_speed', __('Responsive Speed', 'aegis'), __('Different animation speeds for mobile and desktop.', 'aegis'), $options, 'smartphone', true); ?>
									</div>
								</div>
							</section>

							<!-- Modal Section -->
							<section id="modal" class="aegis-settings-section">
								<?php $this->render_section_header(__('Modal Block', 'aegis'), __('Popup/modal block with various trigger types.', 'aegis'), true, 'editor-expand'); ?>
								<div class="aegis-settings-section__content">
									<div class="aegis-settings-grid aegis-settings-grid--features">
										<?php $this->render_block_feature_toggle('modal_click', __('Button Trigger', 'aegis'), __('Open modal on button click.', 'aegis'), $options, 'button'); ?>
										<?php $this->render_block_feature_toggle('modal_icon', __('Icon Trigger', 'aegis'), __('Open modal on icon click.', 'aegis'), $options, 'admin-customizer'); ?>
										<?php $this->render_block_feature_toggle('modal_text', __('Text Trigger', 'aegis'), __('Open modal on text link click.', 'aegis'), $options, 'editor-textcolor'); ?>
										<?php $this->render_block_feature_toggle('modal_image', __('Image Trigger', 'aegis'), __('Open modal on image click.', 'aegis'), $options, 'format-image'); ?>
										<?php $this->render_block_feature_toggle('modal_offcanvas', __('Off-Canvas Modes', 'aegis'), __('Left, right off-canvas and bottom sheet styles.', 'aegis'), $options, 'align-pull-left'); ?>
										<?php $this->render_block_feature_toggle('modal_fullscreen', __('Fullscreen Mode', 'aegis'), __('Full viewport modal style.', 'aegis'), $options, 'fullscreen-alt'); ?>
										<?php $this->render_block_feature_toggle('modal_animations', __('Animations', 'aegis'), __('Fade, scale, slide, flip, zoom effects.', 'aegis'), $options, 'image-rotate'); ?>
										<?php $this->render_block_feature_toggle('modal_exit_intent', __('Exit Intent', 'aegis'), __('Open modal when user moves to leave the page.', 'aegis'), $options, 'migrate', true); ?>
										<?php $this->render_block_feature_toggle('modal_scroll_depth', __('Scroll Depth', 'aegis'), __('Open modal after scrolling a percentage of the page.', 'aegis'), $options, 'sort', true); ?>
										<?php $this->render_block_feature_toggle('modal_time_delay', __('Time Delay', 'aegis'), __('Open modal after a specified time delay.', 'aegis'), $options, 'clock', true); ?>
										<?php $this->render_block_feature_toggle('modal_auto_close', __('Auto Close', 'aegis'), __('Automatically close modal after delay.', 'aegis'), $options, 'dismiss', true); ?>
										<?php $this->render_block_feature_toggle('modal_show_once', __('Show Once', 'aegis'), __('Remember if user has seen this modal.', 'aegis'), $options, 'hidden', true); ?>
										<?php $this->render_block_feature_toggle('modal_device_visibility', __('Device Visibility', 'aegis'), __('Show/hide on specific devices.', 'aegis'), $options, 'smartphone', true); ?>
									</div>
								</div>
							</section>

							<!-- Newsletter Section -->
							<section id="newsletter" class="aegis-settings-section">
								<?php $this->render_section_header(__('Newsletter Block', 'aegis'), __('Search block variation that transforms the search form into a newsletter signup.', 'aegis'), true, 'email-alt'); ?>
								<div class="aegis-settings-section__content">
									<div class="aegis-settings-grid aegis-settings-grid--features">
										<?php $this->render_block_feature_toggle('newsletter_email_validation', __('Email Validation', 'aegis'), __('Validate email format on the input field before submission.', 'aegis'), $options, 'shield'); ?>
										<?php $this->render_block_feature_toggle('newsletter_success_message', __('Success Message', 'aegis'), __('Display a confirmation message after successful signup.', 'aegis'), $options, 'yes-alt'); ?>
										<?php $this->render_block_feature_toggle('newsletter_placeholder', __('Custom Placeholder', 'aegis'), __('Set custom placeholder text for the email input field.', 'aegis'), $options, 'editor-textcolor'); ?>
									</div>
								</div>
							</section>

							<!-- Query Loop Section -->
							<section id="query-loop" class="aegis-settings-section">
								<?php $this->render_section_header(__('Query Loop', 'aegis'), __('Advanced query parameters and layout controls for the Query Loop block.', 'aegis'), true, 'database'); ?>
								<div class="aegis-settings-section__content">
									<div class="aegis-settings-grid aegis-settings-grid--features">
										<?php $this->render_block_feature_toggle('query_loop_post_types', __('Multiple Post Types', 'aegis'), __('Query multiple post types in a single loop.', 'aegis'), $options, 'admin-post'); ?>
										<?php $this->render_block_feature_toggle('query_loop_taxonomy', __('Taxonomy Filtering', 'aegis'), __('Filter by categories, tags, and custom taxonomies.', 'aegis'), $options, 'tag'); ?>
										<?php $this->render_block_feature_toggle('query_loop_include_exclude', __('Include/Exclude Posts', 'aegis'), __('Manually select posts to include or exclude.', 'aegis'), $options, 'list-view'); ?>
										<?php $this->render_block_feature_toggle('query_loop_meta_query', __('Custom Field Query', 'aegis'), __('Filter posts by custom field values.', 'aegis'), $options, 'admin-generic'); ?>
										<?php $this->render_block_feature_toggle('query_loop_order_meta', __('Order by Custom Field', 'aegis'), __('Sort posts by custom field values.', 'aegis'), $options, 'sort'); ?>
										<?php $this->render_block_feature_toggle('query_loop_responsive_columns', __('Responsive Columns', 'aegis'), __('Different column counts per breakpoint.', 'aegis'), $options, 'columns'); ?>
										<?php $this->render_block_feature_toggle('query_loop_gap_controls', __('Gap Controls', 'aegis'), __('Custom row and column gap settings.', 'aegis'), $options, 'editor-expand'); ?>
										<?php $this->render_block_feature_toggle('query_loop_featured_first', __('Featured First Post', 'aegis'), __('Make the first post span multiple columns.', 'aegis'), $options, 'star-filled'); ?>
										<?php $this->render_block_feature_toggle('query_loop_equal_height', __('Equal Height Cards', 'aegis'), __('Force all cards to have equal height.', 'aegis'), $options, 'align-full-width'); ?>
										<?php $this->render_block_feature_toggle('query_loop_no_results', __('No Results Template', 'aegis'), __('Custom message when no posts match query.', 'aegis'), $options, 'warning'); ?>
										<?php $this->render_block_feature_toggle('query_loop_extended_order', __('Extended Ordering', 'aegis'), __('Random, comment count, modified date, etc.', 'aegis'), $options, 'sort'); ?>
										<?php $this->render_block_feature_toggle('query_loop_advanced_meta', __('Advanced Meta Query', 'aegis'), __('Multiple meta queries with AND/OR relation.', 'aegis'), $options, 'filter', true); ?>
										<?php $this->render_block_feature_toggle('query_loop_date_query', __('Date Query', 'aegis'), __('Filter by date ranges and relative dates.', 'aegis'), $options, 'calendar-alt', true); ?>
										<?php $this->render_block_feature_toggle('query_loop_parent_child', __('Parent/Child Posts', 'aegis'), __('Query child pages of current or specific post.', 'aegis'), $options, 'networking', true); ?>
										<?php $this->render_block_feature_toggle('query_loop_acf_integration', __('ACF/MetaBox Integration', 'aegis'), __('Field picker for ACF and Meta Box plugins.', 'aegis'), $options, 'admin-plugins', true); ?>
										<?php $this->render_block_feature_toggle('query_loop_ajax_pagination', __('AJAX Pagination', 'aegis'), __('Load more, infinite scroll, AJAX page nav.', 'aegis'), $options, 'update', true); ?>
										<?php $this->render_block_feature_toggle('query_loop_frontend_filters', __('Frontend Filters', 'aegis'), __('Taxonomy, search, and sort filters.', 'aegis'), $options, 'filter', true); ?>
										<?php $this->render_block_feature_toggle('query_loop_masonry_layout', __('Masonry Layout', 'aegis'), __('CSS and JS masonry grid with animations.', 'aegis'), $options, 'grid-view', true); ?>
										<?php $this->render_block_feature_toggle('query_loop_carousel_layout', __('Carousel Layout', 'aegis'), __('Slider with navigation, pagination, autoplay.', 'aegis'), $options, 'slides', true); ?>
										<?php $this->render_block_feature_toggle('query_loop_woocommerce', __('WooCommerce Integration', 'aegis'), __('Product filtering, sorting, and display options.', 'aegis'), $options, 'cart', true); ?>
										<?php $this->render_block_feature_toggle('query_loop_performance', __('Performance Optimization', 'aegis'), __('Caching, lazy loading, skeleton loading.', 'aegis'), $options, 'performance', true); ?>
									</div>
								</div>
							</section>

							<!-- Related Posts Section -->
							<section id="related-posts" class="aegis-settings-section">
								<?php $this->render_section_header(__('Related Posts Block', 'aegis'), __('Display posts related to the current content by shared taxonomy terms.', 'aegis'), true, 'admin-links'); ?>
								<div class="aegis-settings-section__content">
									<div class="aegis-settings-grid aegis-settings-grid--features">
										<?php $this->render_block_feature_toggle('related_posts_taxonomy_source', __('Taxonomy Source', 'aegis'), __('Choose specific taxonomy or auto-detect from current post type.', 'aegis'), $options, 'tag'); ?>
										<?php $this->render_block_feature_toggle('related_posts_fallback', __('Fallback Behavior', 'aegis'), __('Show latest posts or hide block when no related matches found.', 'aegis'), $options, 'backup'); ?>
										<?php $this->render_block_feature_toggle('related_posts_style_variants', __('Style Variants', 'aegis'), __('Grid, list, cards, and minimal layout options.', 'aegis'), $options, 'layout'); ?>
										<?php $this->render_block_feature_toggle('related_posts_excerpt_length', __('Excerpt Length', 'aegis'), __('Custom excerpt word count for related post summaries.', 'aegis'), $options, 'editor-textcolor'); ?>
										<?php $this->render_block_feature_toggle('related_posts_image_ratio', __('Image Aspect Ratio', 'aegis'), __('Custom featured image aspect ratio for related posts.', 'aegis'), $options, 'image-crop'); ?>
									</div>
								</div>
							</section>

							<!-- Slider Section -->
							<section id="slider" class="aegis-settings-section">
								<?php $this->render_section_header(__('Slider Block', 'aegis'), __('Slider/carousel block with multiple navigation options.', 'aegis'), true, 'slides'); ?>
								<div class="aegis-settings-section__content">
									<div class="aegis-settings-grid aegis-settings-grid--features">
										<?php $this->render_block_feature_toggle('slider_slide', __('Slide Effect', 'aegis'), __('Basic slide transition between slides.', 'aegis'), $options, 'slides'); ?>
										<?php $this->render_block_feature_toggle('slider_fade', __('Fade Effect', 'aegis'), __('Fade transition between slides.', 'aegis'), $options, 'visibility'); ?>
										<?php $this->render_block_feature_toggle('slider_navigation', __('Navigation Arrows', 'aegis'), __('Show previous/next navigation arrows.', 'aegis'), $options, 'arrow-left-alt2'); ?>
										<?php $this->render_block_feature_toggle('slider_pagination', __('Pagination Dots', 'aegis'), __('Show pagination dots below the slider.', 'aegis'), $options, 'marker'); ?>
										<?php $this->render_block_feature_toggle('slider_loop', __('Infinite Loop', 'aegis'), __('Loop slides infinitely.', 'aegis'), $options, 'controls-repeat'); ?>
										<?php $this->render_block_feature_toggle('slider_keyboard', __('Keyboard Navigation', 'aegis'), __('Navigate slides with arrow keys.', 'aegis'), $options, 'laptop'); ?>
										<?php $this->render_block_feature_toggle('slider_responsive', __('Responsive Slides', 'aegis'), __('Different slides per view on devices.', 'aegis'), $options, 'smartphone'); ?>
										<?php $this->render_block_feature_toggle('slider_autoplay', __('Autoplay', 'aegis'), __('Auto-advance slides with configurable delay.', 'aegis'), $options, 'controls-play', true); ?>
										<?php $this->render_block_feature_toggle('slider_effects', __('Advanced Effects', 'aegis'), __('Cube, coverflow, flip, cards, creative effects.', 'aegis'), $options, 'image-rotate', true); ?>
										<?php $this->render_block_feature_toggle('slider_thumbnails', __('Thumbnail Navigation', 'aegis'), __('Thumbnail strip for slide navigation.', 'aegis'), $options, 'format-gallery', true); ?>
										<?php $this->render_block_feature_toggle('slider_lightbox', __('Lightbox Mode', 'aegis'), __('Open slides in fullscreen lightbox.', 'aegis'), $options, 'fullscreen-alt', true); ?>
										<?php $this->render_block_feature_toggle('slider_mousewheel', __('Mousewheel Control', 'aegis'), __('Navigate slides with mouse scroll.', 'aegis'), $options, 'arrow-down-alt', true); ?>
										<?php $this->render_block_feature_toggle('slider_aspect_ratio', __('Aspect Ratio Lock', 'aegis'), __('Lock to specific aspect ratios.', 'aegis'), $options, 'image-crop', true); ?>
										<?php $this->render_block_feature_toggle('slider_lazy_load', __('Lazy Loading', 'aegis'), __('Performance optimization for images.', 'aegis'), $options, 'performance', true); ?>
										<?php $this->render_block_feature_toggle('slider_arrow_styles', __('Custom Arrow Styles', 'aegis'), __('Minimal, rounded, square arrow styles.', 'aegis'), $options, 'admin-customizer', true); ?>
										<?php $this->render_block_feature_toggle('slider_dot_styles', __('Custom Dot Styles', 'aegis'), __('Line, dash, fraction pagination styles.', 'aegis'), $options, 'ellipsis', true); ?>
									</div>
								</div>
							</section>

							<!-- SVG Section -->
							<section id="svg" class="aegis-settings-section">
								<?php $this->render_section_header(__('SVG Block', 'aegis'), __('Image block variation and settings for inline SVG rendering and manipulation.', 'aegis'), true, 'superhero-alt'); ?>
								<div class="aegis-settings-section__content">
									<div class="aegis-settings-grid aegis-settings-grid--features">
										<?php $this->render_block_feature_toggle('svg_mask', __('Mask Mode', 'aegis'), __('Render SVG as a CSS mask for colorization via background-color.', 'aegis'), $options, 'art'); ?>
										<?php $this->render_block_feature_toggle('svg_onclick', __('Onclick Action', 'aegis'), __('Attach custom onclick behavior to SVG elements.', 'aegis'), $options, 'admin-links'); ?>
										<?php $this->render_block_feature_toggle('svg_inline', __('Inline SVG', 'aegis'), __('Replace CSS-masked images with raw inline SVG elements.', 'aegis'), $options, 'editor-code'); ?>
										<?php $this->render_block_feature_toggle('svg_inline_file', __('Inline SVG Files', 'aegis'), __('Replace image tags linking to .svg files with inline SVG markup.', 'aegis'), $options, 'media-default'); ?>
									</div>
								</div>
							</section>

							<!-- Toggle Section -->
							<section id="toggle" class="aegis-settings-section">
								<?php $this->render_section_header(__('Toggle Block', 'aegis'), __('Expandable/collapsible toggle block for content.', 'aegis'), true, 'arrow-down-alt2'); ?>
								<div class="aegis-settings-section__content">
									<div class="aegis-settings-grid aegis-settings-grid--features">
										<?php $this->render_block_feature_toggle('toggle_pill', __('Pill Style', 'aegis'), __('Pill-shaped toggle control.', 'aegis'), $options, 'button'); ?>
										<?php $this->render_block_feature_toggle('toggle_switch', __('Switch Style', 'aegis'), __('On/off switch style toggle.', 'aegis'), $options, 'controls-repeat'); ?>
										<?php $this->render_block_feature_toggle('toggle_buttons', __('Button Style', 'aegis'), __('Button group style toggle.', 'aegis'), $options, 'button'); ?>
										<?php $this->render_block_feature_toggle('toggle_position', __('Position Control', 'aegis'), __('Left, center, right alignment options.', 'aegis'), $options, 'align-center'); ?>
										<?php $this->render_block_feature_toggle('toggle_labels', __('Custom Labels', 'aegis'), __('Customizable toggle labels.', 'aegis'), $options, 'editor-textcolor'); ?>
										<?php $this->render_block_feature_toggle('toggle_url_sync', __('URL Sync', 'aegis'), __('Sync toggle state with URL parameter.', 'aegis'), $options, 'admin-links', true); ?>
										<?php $this->render_block_feature_toggle('toggle_persist', __('State Persistence', 'aegis'), __('Remember user choice via localStorage.', 'aegis'), $options, 'database', true); ?>
										<?php $this->render_block_feature_toggle('toggle_animations', __('Animations', 'aegis'), __('Fade, slide, scale transitions.', 'aegis'), $options, 'image-rotate', true); ?>
										<?php $this->render_block_feature_toggle('toggle_faq', __('FAQ Schema', 'aegis'), __('Structured data markup for SEO.', 'aegis'), $options, 'editor-help', true); ?>
										<?php $this->render_block_feature_toggle('toggle_nested', __('Nested Toggles', 'aegis'), __('Toggles within toggles for complex content.', 'aegis'), $options, 'networking', true); ?>
										<?php $this->render_block_feature_toggle('toggle_conditional', __('Conditional Visibility', 'aegis'), __('Show/hide other elements based on state.', 'aegis'), $options, 'hidden', true); ?>
									</div>
								</div>
							</section>

							<?php /* @todo Uncomment for v1.0.0 release.
							<!-- Utilities Section -->
							<section id="global-styles" class="aegis-settings-section">
								<?php $this->render_section_header(__('Utilities', 'aegis'), __('Utility CSS classes for consistent styling across blocks.', 'aegis'), true, 'screenoptions'); ?>
								<div class="aegis-settings-section__content">
									<div class="aegis-settings-grid aegis-settings-grid--features">
										<?php $this->render_block_feature_toggle('global_styles_spacing', __('Spacing Classes', 'aegis'), __('Padding, margin, and gap utilities.', 'aegis'), $options, 'editor-expand'); ?>
										<?php $this->render_block_feature_toggle('global_styles_typography', __('Typography Classes', 'aegis'), __('Font size, weight, and text utilities.', 'aegis'), $options, 'editor-textcolor'); ?>
										<?php $this->render_block_feature_toggle('global_styles_layout', __('Layout Classes', 'aegis'), __('Flexbox, grid, and display utilities.', 'aegis'), $options, 'layout'); ?>
										<?php $this->render_block_feature_toggle('global_styles_effects', __('Effects Classes', 'aegis'), __('Shadows, borders, and opacity utilities.', 'aegis'), $options, 'admin-appearance'); ?>
										<?php $this->render_block_feature_toggle('global_styles_create', __('Create Custom Classes', 'aegis'), __('Create reusable CSS classes with visual editor.', 'aegis'), $options, 'plus-alt', true); ?>
										<?php $this->render_block_feature_toggle('global_styles_library', __('Class Library', 'aegis'), __('Manage and organize custom global classes.', 'aegis'), $options, 'portfolio', true); ?>
										<?php $this->render_block_feature_toggle('global_styles_transfer', __('Transfer Local to Global', 'aegis'), __('Convert block styles to reusable classes.', 'aegis'), $options, 'migrate', true); ?>
										<?php $this->render_block_feature_toggle('global_styles_export', __('Import/Export', 'aegis'), __('Export and import class libraries.', 'aegis'), $options, 'download', true); ?>
									</div>
								</div>
							</section>
							*/ ?>

							<!-- Video Section -->
							<section class="aegis-settings-section" id="video-block">
								<?php $this->render_section_header(__('Video Block', 'aegis'), __('Enhanced video player with modern controls and features.', 'aegis'), true, 'video-alt3'); ?>
								<div class="aegis-settings-section__content">
									<div class="aegis-settings-grid aegis-settings-grid--features">
										<?php $this->render_block_feature_toggle('video_custom_player', __('Custom Player', 'aegis'), __('Modern player with custom controls.', 'aegis'), $options, 'controls-play'); ?>
										<?php $this->render_block_feature_toggle('video_theater_mode', __('Theater Mode', 'aegis'), __('Expand video to viewport width.', 'aegis'), $options, 'fullscreen-alt'); ?>
										<?php $this->render_block_feature_toggle('video_keyboard_shortcuts', __('Keyboard Shortcuts', 'aegis'), __('Space, arrows, M, F keyboard controls.', 'aegis'), $options, 'editor-textcolor'); ?>
										<?php
										$rm_video = SettingsRepository::is_schema_handled_by_rank_math('rank_math_video_schema');
										$video_schema_desc = $rm_video
											? __('Video Schema is handled by Rank Math. Disable in Integrations to use built-in schema.', 'aegis')
											: __('VideoObject SEO schema for search engines.', 'aegis');
										$this->render_block_feature_toggle('video_schema_markup', __('Schema Markup', 'aegis'), $video_schema_desc, $options, 'admin-site-alt3', false, $rm_video);
										?>
										<?php $this->render_block_feature_toggle('video_ambient_light', __('Ambient Light', 'aegis'), __('Glow effect behind video based on colors.', 'aegis'), $options, 'lightbulb'); ?>
										<?php $this->render_block_feature_toggle('video_thumbnail_preview', __('Thumbnail Preview', 'aegis'), __('Show preview when hovering progress bar.', 'aegis'), $options, 'format-image'); ?>
										<?php $this->render_block_feature_toggle('video_touch_gestures', __('Touch Gestures', 'aegis'), __('Double-tap seek, swipe volume controls.', 'aegis'), $options, 'smartphone'); ?>
										<?php $this->render_block_feature_toggle('video_playlists', __('Playlists', 'aegis'), __('Multi-video playlists with autoplay.', 'aegis'), $options, 'playlist-video'); ?>
										<?php 
										// Video Sitemap - check if Rank Math is handling it
										$integrations = get_option(SettingsRepository::INTEGRATIONS_OPTION, SettingsRepository::INTEGRATION_DEFAULTS);
										$rank_math_handles_sitemap = !empty($integrations['rank_math']) && !empty($integrations['rank_math_video_sitemap']);
										$sitemap_desc = $rank_math_handles_sitemap 
											? __('Video sitemap is handled by Rank Math. Disable in Integrations to use built-in sitemap.', 'aegis')
											: __('Generate video sitemap for search engines.', 'aegis');
										$this->render_block_feature_toggle('video_sitemap', __('Video Sitemap', 'aegis'), $sitemap_desc, $options, 'networking', false, $rank_math_handles_sitemap); 
										?>
										<?php $this->render_block_feature_toggle('video_sticky_player', __('Sticky Player', 'aegis'), __('Floating video when scrolling past.', 'aegis'), $options, 'sticky', true); ?>
										<?php $this->render_block_feature_toggle('video_focus_mode', __('Focus Mode', 'aegis'), __('Dim background when video plays.', 'aegis'), $options, 'visibility', true); ?>
										<?php $this->render_block_feature_toggle('video_save_progress', __('Save Progress', 'aegis'), __('Remember playback position.', 'aegis'), $options, 'backup', true); ?>
										<?php $this->render_block_feature_toggle('video_chapters', __('Chapters', 'aegis'), __('Video chapters with navigation.', 'aegis'), $options, 'editor-ol', true); ?>
										<?php $this->render_block_feature_toggle('video_email_capture', __('Email Capture', 'aegis'), __('Collect emails during playback.', 'aegis'), $options, 'email', true); ?>
										<?php $this->render_block_feature_toggle('video_analytics', __('Analytics', 'aegis'), __('Track video engagement metrics.', 'aegis'), $options, 'chart-bar', true); ?>
										<?php $this->render_block_feature_toggle('video_multi_audio', __('Multi-Audio', 'aegis'), __('Multiple audio track support.', 'aegis'), $options, 'format-audio', true); ?>
										<?php $this->render_block_feature_toggle('video_privacy', __('Privacy Controls', 'aegis'), __('Private videos, watermarks, expiring URLs.', 'aegis'), $options, 'lock', true); ?>
									</div>
									<div class="aegis-settings-notice" style="margin-top: 16px; padding: 12px; background: #f0f0f1; border-left: 4px solid #2271b1; border-radius: 4px;">
										<p style="margin: 0;">
											<strong><?php esc_html_e('BunnyCDN Integration', 'aegis'); ?></strong><br>
											<?php 
											printf(
												/* translators: %s: link to Integrations page */
												esc_html__('Configure BunnyCDN features for cloud video hosting in %s.', 'aegis'),
												'<a href="' . esc_url(admin_url('admin.php?page=aegis-integrations#performance')) . '">' . esc_html__('Integrations â†’ Performance', 'aegis') . '</a>'
											);
											?>
										</p>
									</div>
								</div>
							</section>

							<div class="aegis-settings-footer">
								<?php submit_button(__('Save Settings', 'aegis'), 'primary', 'submit', false); ?>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<?php
	}
	public function render_modals_page(): void
	{
		global $wpdb;

		// Count aegis/modal blocks across all published content (cached to avoid full table scan).
		$modal_count = get_transient( 'aegis_modal_block_count' );
		if ( false === $modal_count ) {
			$modal_count = (int) $wpdb->get_var(
				$wpdb->prepare(
					"SELECT COUNT(*) FROM {$wpdb->posts} WHERE post_status = 'publish' AND post_content LIKE %s",
					'%<!-- wp:aegis/modal %'
				)
			);
			set_transient( 'aegis_modal_block_count', $modal_count, HOUR_IN_SECONDS );
		}
		$modal_count = (int) $modal_count;

		// Modal feature definitions for the reference table.
		$block_settings = SettingsRepository::get_block_settings();
		$modal_features = [
			'modal_click'             => __('Button Trigger', 'aegis'),
			'modal_icon'              => __('Icon Trigger', 'aegis'),
			'modal_text'              => __('Text Trigger', 'aegis'),
			'modal_image'             => __('Image Trigger', 'aegis'),
			'modal_offcanvas'         => __('Off-Canvas Modes', 'aegis'),
			'modal_fullscreen'        => __('Fullscreen Mode', 'aegis'),
			'modal_animations'        => __('Animations', 'aegis'),
			'modal_exit_intent'       => __('Exit Intent', 'aegis'),
			'modal_scroll_depth'      => __('Scroll Depth', 'aegis'),
			'modal_time_delay'        => __('Time Delay', 'aegis'),
			'modal_auto_close'        => __('Auto Close', 'aegis'),
			'modal_show_once'         => __('Show Once', 'aegis'),
			'modal_device_visibility' => __('Device Visibility', 'aegis'),
		];
		?>
		<div class="aegis-admin-page">
			<?php $this->render_top_bar(); ?>
			<?php $this->render_page_tabs('modals'); ?>

			<div class="aegis-settings-wrap">
				<div class="aegis-settings-header">
					<h1><?php esc_html_e('Modals', 'aegis'); ?></h1>
					<p><?php esc_html_e('Create and manage modal overlays, drawers, and popups using the Modal block.', 'aegis'); ?></p>
				</div>

				<!-- Quick Stats + Actions -->
				<div class="aegis-hooks-overview">
					<div class="aegis-hooks-stats">
						<div class="aegis-hooks-stat">
							<span class="aegis-hooks-stat-value"><?php echo esc_html((string) $modal_count); ?></span>
							<span class="aegis-hooks-stat-label"><?php esc_html_e('Modal Blocks', 'aegis'); ?></span>
						</div>
						<div class="aegis-hooks-stat">
							<span class="aegis-hooks-stat-value"><?php echo esc_html((string) count(array_filter($modal_features, function ($key) use ($block_settings) {
								return ! empty($block_settings[$key]);
							}, ARRAY_FILTER_USE_KEY))); ?></span>
							<span class="aegis-hooks-stat-label"><?php esc_html_e('Active Features', 'aegis'); ?></span>
						</div>
					</div>
					<div class="aegis-hooks-actions">
						<a href="<?php echo esc_url(admin_url('post-new.php?post_type=page')); ?>"
						   class="aegis-btn aegis-btn-primary">
							<span class="dashicons dashicons-plus-alt2"></span>
							<?php esc_html_e('Add New', 'aegis'); ?>
						</a>
						<a href="<?php echo esc_url(admin_url('admin.php?page=aegis-blocks')); ?>"
						   class="aegis-btn aegis-btn-secondary">
							<span class="dashicons dashicons-admin-generic"></span>
							<?php esc_html_e('Manage All', 'aegis'); ?>
						</a>
					</div>
				</div>

				<!-- Feature Reference -->
				<div class="aegis-hooks-reference">
					<div class="aegis-hooks-reference-header">
						<span class="dashicons dashicons-editor-expand"></span>
						<span><?php esc_html_e('Feature Reference', 'aegis'); ?></span>
					</div>

					<div class="aegis-hooks-group">
						<div class="aegis-hooks-group-header">
							<span class="dashicons dashicons-editor-expand"></span>
							<span class="aegis-hooks-group-title"><?php esc_html_e('Modal Features', 'aegis'); ?></span>
							<span class="aegis-hooks-group-count"><?php echo esc_html((string) count($modal_features)); ?></span>
						</div>
						<?php foreach ($modal_features as $key => $label): ?>
							<div class="aegis-hooks-row">
								<code class="aegis-hooks-row-name"><?php echo esc_html($label); ?></code>
								<span class="aegis-hooks-row-desc">
									<?php if (! empty($block_settings[$key])): ?>
										<span style="color: #16a34a;">&#10003; <?php esc_html_e('Enabled', 'aegis'); ?></span>
									<?php else: ?>
										<span style="color: #9ca3af;">&mdash; <?php esc_html_e('Disabled', 'aegis'); ?></span>
									<?php endif; ?>
								</span>
							</div>
						<?php endforeach; ?>
					</div>
				</div>

				<!-- Info callout -->
				<div class="aegis-hooks-info">
					<span class="dashicons dashicons-info-outline"></span>
					<div>
						<strong><?php esc_html_e('How it works', 'aegis'); ?></strong>
						<p><?php esc_html_e('Add a Modal block to any page or post, configure its trigger and display options, and publish. Visitors will see the modal based on the trigger you set. Enable or disable individual features from the Blocks tab.', 'aegis'); ?></p>
					</div>
				</div>
			</div>
		</div>
		<?php
	}

	/**
	 * Render general settings page.
	 *
	 * @return void
	 */
	public function render_general_settings_page(): void
	{
		$options = get_option(SettingsRepository::SETTINGS_OPTION, SettingsRepository::SETTINGS_DEFAULTS);
		$options = wp_parse_args($options, SettingsRepository::SETTINGS_DEFAULTS);
		?>
		<div class="aegis-admin-page">
			<?php $this->render_top_bar(); ?>
			<?php $this->render_page_tabs('general-settings'); ?>

			<div class="aegis-settings-wrap">
				<div class="aegis-settings-header">
					<h1><?php esc_html_e('Settings', 'aegis'); ?></h1>
					<p><?php esc_html_e('Configure general theme settings and features.', 'aegis'); ?></p>
				</div>

				<form method="post" action="options.php" class="aegis-settings-form aegis-general-settings-form">
					<?php settings_fields('aegis_general_settings_group'); ?>

					<div class="aegis-settings-layout aegis-settings-layout--no-nav">
						<div class="aegis-settings-content">
							<section id="media" class="aegis-settings-section active">
								<?php $this->render_section_header(__('Media', 'aegis'), __('Configure media upload and handling features.', 'aegis'), false, 'format-image'); ?>

								<div class="aegis-settings-grid">
									<div class="aegis-toggle-card">
										<div class="aegis-toggle-info">
											<div class="aegis-toggle-icon">
												<span class="dashicons dashicons-media-code"></span>
											</div>
											<div class="aegis-toggle-text">
												<h3><?php esc_html_e('SVG Uploads', 'aegis'); ?></h3>
												<p><?php esc_html_e('Allow SVG file uploads in the Media Library. Files are sanitized on upload to remove potentially harmful code.', 'aegis'); ?></p>
											</div>
										</div>
										<label class="aegis-toggle">
											<input type="checkbox" name="<?php echo esc_attr(SettingsRepository::SETTINGS_OPTION . '[svg_upload]'); ?>" value="1" <?php checked($options['svg_upload']); ?>>
											<span class="aegis-toggle-slider"></span>
										</label>
									</div>

									<div class="aegis-toggle-suboptions">
										<div class="aegis-toggle-card aegis-toggle-subcard">
											<div class="aegis-toggle-info">
												<div class="aegis-toggle-icon">
													<span class="dashicons dashicons-art"></span>
												</div>
												<div class="aegis-toggle-text">
													<h3><?php esc_html_e('Strip Colors', 'aegis'); ?></h3>
													<p><?php esc_html_e('Remove fill, stroke, and color attributes on upload and set fill to currentColor, allowing SVGs to inherit color from CSS.', 'aegis'); ?></p>
												</div>
											</div>
											<label class="aegis-toggle">
												<input type="checkbox" name="<?php echo esc_attr(SettingsRepository::SETTINGS_OPTION . '[svg_strip_colors]'); ?>" value="1" <?php checked($options['svg_strip_colors']); ?>>
												<span class="aegis-toggle-slider"></span>
											</label>
										</div>

										<div class="aegis-toggle-card aegis-toggle-subcard">
											<div class="aegis-toggle-info">
												<div class="aegis-toggle-icon">
													<span class="dashicons dashicons-image-crop"></span>
												</div>
												<div class="aegis-toggle-text">
													<h3><?php esc_html_e('Strip Dimensions', 'aegis'); ?></h3>
													<p><?php esc_html_e('Remove width and height attributes from the root SVG element on upload. The viewBox is preserved so the SVG scales responsively.', 'aegis'); ?></p>
												</div>
											</div>
											<label class="aegis-toggle">
												<input type="checkbox" name="<?php echo esc_attr(SettingsRepository::SETTINGS_OPTION . '[svg_strip_dimensions]'); ?>" value="1" <?php checked($options['svg_strip_dimensions']); ?>>
												<span class="aegis-toggle-slider"></span>
											</label>
										</div>

										<div class="aegis-toggle-card aegis-toggle-subcard">
											<div class="aegis-toggle-info">
												<div class="aegis-toggle-icon">
													<span class="dashicons dashicons-editor-removeformatting"></span>
												</div>
												<div class="aegis-toggle-text">
													<h3><?php esc_html_e('Strip Styles', 'aegis'); ?></h3>
													<p><?php esc_html_e('Remove inline style attributes from all SVG elements on upload. This helps ensure consistent styling through CSS classes.', 'aegis'); ?></p>
												</div>
											</div>
											<label class="aegis-toggle">
												<input type="checkbox" name="<?php echo esc_attr(SettingsRepository::SETTINGS_OPTION . '[svg_strip_styles]'); ?>" value="1" <?php checked($options['svg_strip_styles']); ?>>
												<span class="aegis-toggle-slider"></span>
											</label>
										</div>
									</div>
								</div>
							</section>

							<div class="aegis-settings-footer">
								<?php submit_button(__('Save Settings', 'aegis'), 'primary', 'submit', false); ?>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<?php
	}

	/**
	 * Render license settings page.
	 *
	 * @return void
	 */
	public function render_license_page(): void
	{
		$pro_active     = defined('AEGIS_PRO_VERSION');
		$license_key    = get_option('aegis_pro_license_key', '');
		$license_status = get_option('aegis_pro_license_status', '');
		$is_valid       = $license_status === 'valid';
		?>
		<div class="aegis-admin-page">
			<?php $this->render_top_bar(); ?>
			<?php $this->render_page_tabs('license'); ?>

			<div class="aegis-settings-wrap">
				<div class="aegis-settings-header">
					<h1><?php esc_html_e('License', 'aegis'); ?></h1>
					<p><?php esc_html_e('Activate your license key to unlock Pro features and receive automatic updates.', 'aegis'); ?></p>
				</div>

				<!-- License Activation -->
				<div class="aegis-license-section">
					<div class="aegis-license-activation">
						<div class="aegis-license-activation-body">
							<div class="aegis-license-status-row">
								<?php if ($pro_active && $is_valid) : ?>
									<div class="aegis-pro-status aegis-pro-status--active">
										<span class="dashicons dashicons-yes-alt"></span>
										<div>
											<strong><?php esc_html_e('License Active', 'aegis'); ?></strong>
											<?php if (!empty($license_key)) : ?>
												<p class="aegis-license-key"><?php echo esc_html(substr($license_key, 0, 8) . '••••••••'); ?></p>
											<?php endif; ?>
										</div>
									</div>
								<?php elseif ($pro_active) : ?>
									<div class="aegis-pro-status aegis-pro-status--inactive">
										<span class="dashicons dashicons-warning"></span>
										<div>
											<strong><?php esc_html_e('Pro Plugin Active — No License', 'aegis'); ?></strong>
											<p><?php esc_html_e('Enter your license key below to enable automatic updates.', 'aegis'); ?></p>
										</div>
									</div>
								<?php else : ?>
									<div class="aegis-pro-status aegis-pro-status--inactive">
										<span class="dashicons dashicons-info-outline"></span>
										<div>
											<strong><?php esc_html_e('No License Active', 'aegis'); ?></strong>
											<p><?php esc_html_e('Purchase Aegis Pro and enter your license key to unlock all features.', 'aegis'); ?></p>
										</div>
									</div>
								<?php endif; ?>
							</div>

							<div class="aegis-license-form-row">
								<label for="aegis-license-key" class="aegis-license-label">
									<?php esc_html_e('License Key', 'aegis'); ?>
								</label>
								<div class="aegis-license-input-group">
									<input
										type="text"
										id="aegis-license-key"
										class="aegis-license-input"
										placeholder="<?php esc_attr_e('Enter your license key…', 'aegis'); ?>"
										<?php echo ($pro_active && $is_valid) ? 'disabled' : ''; ?>
										value="<?php echo esc_attr($license_key); ?>"
									/>
									<?php if ($pro_active && $is_valid) : ?>
										<button type="button" class="aegis-btn aegis-btn-secondary" id="aegis-deactivate-license">
											<?php esc_html_e('Deactivate', 'aegis'); ?>
										</button>
									<?php else : ?>
										<button type="button" class="aegis-btn aegis-btn-primary" id="aegis-activate-license">
											<?php esc_html_e('Activate License', 'aegis'); ?>
										</button>
									<?php endif; ?>
								</div>
								<p class="aegis-license-help">
									<?php esc_html_e('License key validation coming soon. Pro features are currently enabled by installing the Aegis Pro plugin.', 'aegis'); ?>
								</p>
							</div>
						</div>
					</div>
				</div>

				<?php if (!$pro_active) : ?>
				<!-- Get Aegis Pro -->
				<div class="aegis-license-section">
					<h2><?php esc_html_e('Unlock the Full Power of Aegis', 'aegis'); ?></h2>
					<p class="aegis-license-section-desc"><?php esc_html_e('Aegis Pro extends every block with advanced features, integrations, and professional tools.', 'aegis'); ?></p>

					<div class="aegis-license-features">
						<div class="aegis-license-feature-card">
							<div class="aegis-license-feature-icon">
								<span class="dashicons dashicons-video-alt3"></span>
							</div>
							<h3><?php esc_html_e('Video Player Pro', 'aegis'); ?></h3>
							<p><?php esc_html_e('Chapters, analytics, BunnyCDN streaming, email capture, and LMS integrations.', 'aegis'); ?></p>
						</div>
						<div class="aegis-license-feature-card">
							<div class="aegis-license-feature-icon">
								<span class="dashicons dashicons-lock"></span>
							</div>
							<h3><?php esc_html_e('Advanced Conditionals', 'aegis'); ?></h3>
							<p><?php esc_html_e('Cookie, referral, ACF, MetaBox, post meta, and location-based block visibility.', 'aegis'); ?></p>
						</div>
						<div class="aegis-license-feature-card">
							<div class="aegis-license-feature-icon">
								<span class="dashicons dashicons-chart-area"></span>
							</div>
							<h3><?php esc_html_e('Analytics & Tracking', 'aegis'); ?></h3>
							<p><?php esc_html_e('Per-user tracking, audience retention, buffering stats, and Google Analytics events.', 'aegis'); ?></p>
						</div>
						<div class="aegis-license-feature-card">
							<div class="aegis-license-feature-icon">
								<span class="dashicons dashicons-welcome-learn-more"></span>
							</div>
							<h3><?php esc_html_e('LMS Integrations', 'aegis'); ?></h3>
							<p><?php esc_html_e('LearnDash, LifterLMS, and Sensei — auto-complete lessons based on video progress.', 'aegis'); ?></p>
						</div>
						<div class="aegis-license-feature-card">
							<div class="aegis-license-feature-icon">
								<span class="dashicons dashicons-location-alt"></span>
							</div>
							<h3><?php esc_html_e('Map Block Pro', 'aegis'); ?></h3>
							<p><?php esc_html_e('Clustering, directions, store locator, heatmaps, KML/GeoJSON import, and Schema.org.', 'aegis'); ?></p>
						</div>
						<div class="aegis-license-feature-card">
							<div class="aegis-license-feature-icon">
								<span class="dashicons dashicons-images-alt2"></span>
							</div>
							<h3><?php esc_html_e('Slider Pro', 'aegis'); ?></h3>
							<p><?php esc_html_e('Autoplay, effects, thumbnails, lightbox, lazy loading, and custom arrow/dot styles.', 'aegis'); ?></p>
						</div>
						<div class="aegis-license-feature-card">
							<div class="aegis-license-feature-icon">
								<span class="dashicons dashicons-arrow-down-alt2"></span>
							</div>
							<h3><?php esc_html_e('Toggle Pro', 'aegis'); ?></h3>
							<p><?php esc_html_e('URL sync, state persistence, animations, FAQ schema, nested toggles, and conditional visibility.', 'aegis'); ?></p>
						</div>
						<div class="aegis-license-feature-card">
							<div class="aegis-license-feature-icon">
								<span class="dashicons dashicons-clock"></span>
							</div>
							<h3><?php esc_html_e('Countdown Pro', 'aegis'); ?></h3>
							<p><?php esc_html_e('Evergreen countdowns, animations, auto-restart, expiry actions, and urgency styling.', 'aegis'); ?></p>
						</div>
						<div class="aegis-license-feature-card">
							<div class="aegis-license-feature-icon">
								<span class="dashicons dashicons-slides"></span>
							</div>
							<h3><?php esc_html_e('Modal Pro', 'aegis'); ?></h3>
							<p><?php esc_html_e('Exit intent, scroll depth, time delay triggers, auto close, show once, and device visibility.', 'aegis'); ?></p>
						</div>
						<div class="aegis-license-feature-card">
							<div class="aegis-license-feature-icon">
								<span class="dashicons dashicons-database"></span>
							</div>
							<h3><?php esc_html_e('Query Loop Pro', 'aegis'); ?></h3>
							<p><?php esc_html_e('Advanced filtering, custom field queries, date ranges, related posts, and AJAX pagination.', 'aegis'); ?></p>
						</div>
						<div class="aegis-license-feature-card">
							<div class="aegis-license-feature-icon">
								<span class="dashicons dashicons-cloud-upload"></span>
							</div>
							<h3><?php esc_html_e('BunnyCDN Streaming', 'aegis'); ?></h3>
							<p><?php esc_html_e('HLS adaptive streaming, direct upload, AI transcription, thumbnails, and watermarking.', 'aegis'); ?></p>
						</div>
						<div class="aegis-license-feature-card">
							<div class="aegis-license-feature-icon">
								<span class="dashicons dashicons-layout"></span>
							</div>
							<h3><?php esc_html_e('Pattern Control', 'aegis'); ?></h3>
							<p><?php esc_html_e('Manage default block patterns from plugins. Remove unwanted patterns from the editor.', 'aegis'); ?></p>
						</div>
						<div class="aegis-license-feature-card">
							<div class="aegis-license-feature-icon">
								<span class="dashicons dashicons-editor-code"></span>
							</div>
							<h3><?php esc_html_e('Custom Code & Fonts', 'aegis'); ?></h3>
							<p><?php esc_html_e('Add custom CSS, JavaScript, and register custom fonts without child themes or extra plugins.', 'aegis'); ?></p>
						</div>
						<div class="aegis-license-feature-card">
							<div class="aegis-license-feature-icon">
								<span class="dashicons dashicons-groups"></span>
							</div>
							<h3><?php esc_html_e('Co-Authors Plus', 'aegis'); ?></h3>
							<p><?php esc_html_e('Social links, role badges, and enhanced author displays for multi-author publishing.', 'aegis'); ?></p>
						</div>
					</div>

					<div class="aegis-license-purchase-cta">
						<a href="https://www.atmostfear-entertainment.com/aegis/pro" target="_blank" rel="noopener noreferrer" class="aegis-btn aegis-btn-primary aegis-btn-lg">
							<span class="dashicons dashicons-cart"></span>
							<?php esc_html_e('Get Aegis Pro', 'aegis'); ?>
						</a>
						<span class="aegis-license-purchase-note"><?php esc_html_e('One-time purchase. Lifetime updates. 14-day money-back guarantee.', 'aegis'); ?></span>
					</div>
				</div>

				<!-- Support Development -->
				<div class="aegis-license-section">
					<div class="aegis-license-donate-card">
						<div class="aegis-license-donate-icon">
							<span class="dashicons dashicons-heart"></span>
						</div>
						<div class="aegis-license-donate-content">
							<h3><?php esc_html_e('Support Open-Source Development', 'aegis'); ?></h3>
							<p><?php esc_html_e('Aegis is built and maintained by a small independent team. If a Pro license isn\'t in your budget right now, you can still support our work with a donation — every contribution helps us keep building.', 'aegis'); ?></p>
							<a href="https://paypal.me/aedonation" target="_blank" rel="noopener noreferrer" class="aegis-btn aegis-btn-secondary">
								<span class="dashicons dashicons-heart"></span>
								<?php esc_html_e('Make a Donation', 'aegis'); ?>
							</a>
						</div>
					</div>
				</div>

				<!-- Free vs Pro Comparison -->
				<div class="aegis-license-section">
					<h2><?php esc_html_e('Free vs Pro', 'aegis'); ?></h2>
					<p class="aegis-license-section-desc"><?php esc_html_e('See what\'s included in each version at a glance.', 'aegis'); ?></p>

					<div class="aegis-license-comparison">
						<div class="aegis-license-comparison-header">
							<span class="aegis-license-comparison-feature"><?php esc_html_e('Feature', 'aegis'); ?></span>
							<span class="aegis-license-comparison-free"><?php esc_html_e('Free', 'aegis'); ?></span>
							<span class="aegis-license-comparison-pro"><?php esc_html_e('Pro', 'aegis'); ?></span>
						</div>
						<?php
						$comparisons = [
							[__('Custom Blocks (Modal, Slider, Accordion, etc.)', 'aegis'), true, true],
							[__('Conditional Block Visibility', 'aegis'), true, true],
							[__('Video Custom Player & Theater Mode', 'aegis'), true, true],
							[__('Query Loop Enhancements', 'aegis'), true, true],
							[__('Map Block with Google Maps & OSM', 'aegis'), true, true],
							[__('Hook Patterns Manager', 'aegis'), true, true],
							[__('Advanced Conditionals (Cookie, Referral, ACF, Meta)', 'aegis'), false, true],
							[__('WooCommerce / LMS Conditionals', 'aegis'), false, true],
							[__('Video Analytics & Audience Retention', 'aegis'), false, true],
							[__('BunnyCDN HLS Streaming', 'aegis'), false, true],
							[__('Video Chapters, Captions & Email Capture', 'aegis'), false, true],
							[__('Map Clustering, Directions & Store Locator', 'aegis'), false, true],
							[__('Slider Autoplay, Effects & Lightbox', 'aegis'), false, true],
							[__('FluentCRM & LMS Video Integrations', 'aegis'), false, true],
							[__('Priority Support & Automatic Updates', 'aegis'), false, true],
						];
						foreach ($comparisons as $row) :
						?>
						<div class="aegis-license-comparison-row">
							<span class="aegis-license-comparison-feature"><?php echo esc_html($row[0]); ?></span>
							<span class="aegis-license-comparison-free">
								<?php if ($row[1]) : ?>
									<span class="dashicons dashicons-yes-alt aegis-comparison-yes"></span>
								<?php else : ?>
									<span class="dashicons dashicons-minus aegis-comparison-no"></span>
								<?php endif; ?>
							</span>
							<span class="aegis-license-comparison-pro">
								<?php if ($row[2]) : ?>
									<span class="dashicons dashicons-yes-alt aegis-comparison-yes"></span>
								<?php else : ?>
									<span class="dashicons dashicons-minus aegis-comparison-no"></span>
								<?php endif; ?>
							</span>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
				<?php endif; ?>

				<!-- Resources -->
				<div class="aegis-license-section">
					<h2><?php esc_html_e('Resources', 'aegis'); ?></h2>
					<div class="aegis-dashboard-actions aegis-license-links">
						<a href="https://developer.wordpress.org/themes/" target="_blank" rel="noopener noreferrer" class="aegis-action-card">
							<div class="aegis-action-card-icon">
								<span class="dashicons dashicons-book"></span>
							</div>
							<span class="aegis-action-card-title"><?php esc_html_e('Documentation', 'aegis'); ?></span>
						</a>
						<a href="https://www.facebook.com/groups/aegiswp" target="_blank" rel="noopener noreferrer" class="aegis-action-card">
							<div class="aegis-action-card-icon">
								<span class="dashicons dashicons-groups"></span>
							</div>
							<span class="aegis-action-card-title"><?php esc_html_e('Support Group', 'aegis'); ?></span>
						</a>
						<a href="https://github.com/aegiswp/theme/releases" target="_blank" rel="noopener noreferrer" class="aegis-action-card">
							<div class="aegis-action-card-icon">
								<span class="dashicons dashicons-backup"></span>
							</div>
							<span class="aegis-action-card-title"><?php esc_html_e('Changelog', 'aegis'); ?></span>
						</a>
						<a href="https://github.com/aegiswp/theme" target="_blank" rel="noopener noreferrer" class="aegis-action-card">
							<div class="aegis-action-card-icon">
								<span class="dashicons dashicons-editor-code"></span>
							</div>
							<span class="aegis-action-card-title"><?php esc_html_e('GitHub', 'aegis'); ?></span>
						</a>
					</div>
				</div>

				<!-- FAQ -->
				<div class="aegis-license-section">
					<h2><?php esc_html_e('Frequently Asked Questions', 'aegis'); ?></h2>
					<div class="aegis-license-faq">
						<details class="aegis-license-faq-item">
							<summary><?php esc_html_e('How do I activate my license?', 'aegis'); ?></summary>
							<div class="aegis-license-faq-answer">
								<p><?php esc_html_e('After purchasing Aegis Pro, you\'ll receive a license key via email. Install the Aegis Pro plugin, then paste your key in the License Key field above and click "Activate License". Your Pro features will be unlocked immediately.', 'aegis'); ?></p>
							</div>
						</details>
						<details class="aegis-license-faq-item">
							<summary><?php esc_html_e('Can I transfer my license to another site?', 'aegis'); ?></summary>
							<div class="aegis-license-faq-answer">
								<p><?php esc_html_e('Yes. Deactivate the license on your current site first, then activate it on your new site. Each license key is valid for one active site at a time.', 'aegis'); ?></p>
							</div>
						</details>
						<details class="aegis-license-faq-item">
							<summary><?php esc_html_e('What happens if my license expires?', 'aegis'); ?></summary>
							<div class="aegis-license-faq-answer">
								<p><?php esc_html_e('Pro features will continue to work, but you\'ll no longer receive automatic updates or priority support. You can renew your license at any time to restore these benefits.', 'aegis'); ?></p>
							</div>
						</details>
						<details class="aegis-license-faq-item">
							<summary><?php esc_html_e('Do you offer refunds?', 'aegis'); ?></summary>
							<div class="aegis-license-faq-answer">
								<p><?php esc_html_e('Yes, we offer a 14-day money-back guarantee. If Aegis Pro doesn\'t meet your needs, contact us within 14 days of purchase for a full refund — no questions asked.', 'aegis'); ?></p>
							</div>
						</details>
					</div>
				</div>

			</div>
		</div>
		<?php
	}

	/**
	 * Render hook patterns settings page.
	 *
	 * @return void
	 */
	public function render_hook_patterns_page(): void
	{
		$hook_patterns_manager = new \Aegis\Admin\HookPatternsManager();
		$available_hooks       = $hook_patterns_manager->get_available_hooks();
		$active_patterns       = \get_posts([
			'post_type'      => \Aegis\Admin\HookPatternsManager::POST_TYPE,
			'post_status'    => 'publish',
			'posts_per_page' => -1,
			'meta_query'     => [['key' => '_aegis_enabled', 'value' => '1']],
		]);
		$active_count = count($active_patterns);
		$total_hooks  = 0;
		foreach ($available_hooks as $hooks) {
			$total_hooks += count($hooks);
		}
		?>
		<div class="aegis-admin-page">
			<?php $this->render_top_bar(); ?>
			<?php $this->render_page_tabs('hook-patterns'); ?>

			<div class="aegis-settings-wrap">
				<div class="aegis-settings-header">
					<h1><?php esc_html_e('Hooks', 'aegis'); ?></h1>
					<p><?php esc_html_e('Inject custom block patterns at specific locations throughout your theme.', 'aegis'); ?></p>
				</div>

				<!-- Quick Stats + Actions -->
				<div class="aegis-hooks-overview">
					<div class="aegis-hooks-stats">
						<div class="aegis-hooks-stat">
							<span class="aegis-hooks-stat-value"><?php echo esc_html((string) $total_hooks); ?></span>
							<span class="aegis-hooks-stat-label"><?php esc_html_e('Available Hooks', 'aegis'); ?></span>
						</div>
						<div class="aegis-hooks-stat">
							<span class="aegis-hooks-stat-value"><?php echo esc_html((string) $active_count); ?></span>
							<span class="aegis-hooks-stat-label"><?php esc_html_e('Active Patterns', 'aegis'); ?></span>
						</div>
					</div>
					<div class="aegis-hooks-actions">
						<a href="<?php echo esc_url(admin_url('post-new.php?post_type=' . \Aegis\Admin\HookPatternsManager::POST_TYPE)); ?>"
						   class="aegis-btn aegis-btn-primary">
							<span class="dashicons dashicons-plus-alt2"></span>
							<?php esc_html_e('Add New', 'aegis'); ?>
						</a>
						<a href="<?php echo esc_url(admin_url('edit.php?post_type=' . \Aegis\Admin\HookPatternsManager::POST_TYPE)); ?>"
						   class="aegis-btn aegis-btn-secondary">
							<span class="dashicons dashicons-list-view"></span>
							<?php esc_html_e('Manage All', 'aegis'); ?>
						</a>
					</div>
				</div>

				<!-- Hook Reference -->
				<div class="aegis-hooks-reference">
					<div class="aegis-hooks-reference-header">
						<span class="dashicons dashicons-editor-code"></span>
						<span><?php esc_html_e('Hook Reference', 'aegis'); ?></span>
					</div>

					<?php foreach ($available_hooks as $group => $hooks): ?>
						<?php if (empty($hooks)) continue; ?>
						<div class="aegis-hooks-group">
							<div class="aegis-hooks-group-header">
								<?php
								$icons = [
									'template-parts' => 'dashicons-layout',
									'content'        => 'dashicons-text-page',
									'custom'         => 'dashicons-admin-generic',
								];
								$icon = $icons[$group] ?? 'dashicons-admin-generic';
								?>
								<span class="dashicons <?php echo esc_attr($icon); ?>"></span>
								<span class="aegis-hooks-group-title"><?php echo esc_html(ucfirst(str_replace('-', ' ', $group))); ?></span>
								<span class="aegis-hooks-group-count"><?php echo esc_html((string) count($hooks)); ?></span>
							</div>
							<?php foreach ($hooks as $hook => $description): ?>
								<div class="aegis-hooks-row">
									<code class="aegis-hooks-row-name"><?php echo esc_html($hook); ?></code>
									<span class="aegis-hooks-row-desc"><?php echo esc_html($description); ?></span>
								</div>
							<?php endforeach; ?>
						</div>
					<?php endforeach; ?>
				</div>

				<!-- Info callout -->
				<div class="aegis-hooks-info">
					<span class="dashicons dashicons-info-outline"></span>
					<div>
						<strong><?php esc_html_e('How it works', 'aegis'); ?></strong>
						<p><?php esc_html_e('Create a hook pattern, choose a hook location from the list above, add your block content, and publish. The pattern will render at that hook location on every page load.', 'aegis'); ?></p>
					</div>
				</div>
			</div>
		</div>
		<?php
	}

	/**
	 * Render analytics settings page.
	 *
	 * @return void
	 */
	public function render_analytics_page(): void
	{
		$defaults   = \Aegis\Analytics\Tracker::DEFAULTS;
		$options    = get_option(\Aegis\Analytics\Tracker::OPTION, []);
		$options    = is_array($options) ? wp_parse_args($options, $defaults) : $defaults;
		$pro_active = defined('AEGIS_PRO_VERSION');
		$has_complianz = defined('CMPLZ_VERSION');
		?>
		<div class="aegis-admin-page">
			<?php $this->render_top_bar(); ?>
			<?php $this->render_page_tabs('analytics'); ?>

			<div class="aegis-settings-wrap">
				<div class="aegis-settings-header">
					<h1><?php esc_html_e('Analytics & Tracking', 'aegis'); ?></h1>
					<p><?php esc_html_e('Configure analytics providers and privacy settings. Scripts are loaded with async/defer for optimal performance.', 'aegis'); ?></p>
				</div>

				<form method="post" action="options.php" class="aegis-settings-form aegis-analytics-form">
					<?php settings_fields('aegis_analytics_group'); ?>

					<div class="aegis-settings-layout aegis-settings-layout--no-nav">
						<div class="aegis-settings-content">

							<!-- ===== Google Analytics (GA4) ===== -->
							<section id="analytics-ga4" class="aegis-settings-section active">
								<?php $this->render_section_header(__('Google Analytics (GA4)', 'aegis'), __('Basic page view tracking with Google Analytics 4.', 'aegis'), false, 'chart-bar'); ?>

								<div class="aegis-settings-grid">
									<div class="aegis-toggle-card">
										<div class="aegis-toggle-info">
											<div class="aegis-toggle-icon">
												<span class="dashicons dashicons-chart-bar"></span>
											</div>
											<div class="aegis-toggle-text">
												<h3><?php esc_html_e('Enable GA4', 'aegis'); ?></h3>
												<p><?php esc_html_e('Load the Google Analytics 4 tracking script on your site.', 'aegis'); ?></p>
											</div>
										</div>
										<label class="aegis-toggle">
											<input type="checkbox" name="aegis_analytics[ga4_enabled]" value="1" <?php checked($options['ga4_enabled']); ?>>
											<span class="aegis-toggle-slider"></span>
										</label>
									</div>

									<div class="aegis-toggle-suboptions">
										<div class="aegis-api-field-row">
											<div class="aegis-api-field-info">
												<div class="aegis-api-field-icon">
													<span class="dashicons dashicons-admin-network"></span>
												</div>
												<div class="aegis-api-field-text">
													<label><?php esc_html_e('Measurement ID', 'aegis'); ?></label>
													<p><?php esc_html_e('Your GA4 Measurement ID (e.g., G-XXXXXXXXXX).', 'aegis'); ?></p>
												</div>
											</div>
											<div class="aegis-api-field-input">
												<input type="text"
													name="aegis_analytics[ga4_measurement_id]"
													value="<?php echo esc_attr($options['ga4_measurement_id']); ?>"
													placeholder="G-XXXXXXXXXX"
													class="regular-text" />
											</div>
										</div>

										<div class="aegis-toggle-card aegis-toggle-subcard">
											<div class="aegis-toggle-info">
												<div class="aegis-toggle-icon">
													<span class="dashicons dashicons-hidden"></span>
												</div>
												<div class="aegis-toggle-text">
													<h3><?php esc_html_e('Anonymize IP', 'aegis'); ?></h3>
													<p><?php esc_html_e('Enable IP anonymization for GDPR compliance.', 'aegis'); ?></p>
												</div>
											</div>
											<label class="aegis-toggle">
												<input type="checkbox" name="aegis_analytics[ga4_anonymize_ip]" value="1" <?php checked($options['ga4_anonymize_ip']); ?>>
												<span class="aegis-toggle-slider"></span>
											</label>
										</div>
									</div>
								</div>
							</section>

							<!-- ===== Google Tag Manager ===== -->
							<section id="analytics-gtm" class="aegis-settings-section active">
								<?php $this->render_section_header(__('Google Tag Manager', 'aegis'), __('Manage all your tags from a single container.', 'aegis'), false, 'tag'); ?>

								<div class="aegis-settings-grid">
									<div class="aegis-toggle-card">
										<div class="aegis-toggle-info">
											<div class="aegis-toggle-icon">
												<span class="dashicons dashicons-tag"></span>
											</div>
											<div class="aegis-toggle-text">
												<h3><?php esc_html_e('Enable GTM', 'aegis'); ?></h3>
												<p><?php esc_html_e('Load the Google Tag Manager container on your site.', 'aegis'); ?></p>
											</div>
										</div>
										<label class="aegis-toggle">
											<input type="checkbox" name="aegis_analytics[gtm_enabled]" value="1" <?php checked($options['gtm_enabled']); ?>>
											<span class="aegis-toggle-slider"></span>
										</label>
									</div>

									<div class="aegis-toggle-suboptions">
										<div class="aegis-api-field-row">
											<div class="aegis-api-field-info">
												<div class="aegis-api-field-icon">
													<span class="dashicons dashicons-admin-network"></span>
												</div>
												<div class="aegis-api-field-text">
													<label><?php esc_html_e('Container ID', 'aegis'); ?></label>
													<p><?php esc_html_e('Your GTM Container ID (e.g., GTM-XXXXXXX).', 'aegis'); ?></p>
												</div>
											</div>
											<div class="aegis-api-field-input">
												<input type="text"
													name="aegis_analytics[gtm_container_id]"
													value="<?php echo esc_attr($options['gtm_container_id']); ?>"
													placeholder="GTM-XXXXXXX"
													class="regular-text" />
											</div>
										</div>
									</div>
								</div>
							</section>

							<!-- ===== Microsoft Clarity ===== -->
							<section id="analytics-clarity" class="aegis-settings-section active">
								<?php $this->render_section_header(__('Microsoft Clarity', 'aegis'), __('Free heatmaps and session recordings.', 'aegis'), false, 'visibility'); ?>

								<div class="aegis-settings-grid">
									<div class="aegis-toggle-card">
										<div class="aegis-toggle-info">
											<div class="aegis-toggle-icon">
												<span class="dashicons dashicons-visibility"></span>
											</div>
											<div class="aegis-toggle-text">
												<h3><?php esc_html_e('Enable Clarity', 'aegis'); ?></h3>
												<p><?php esc_html_e('Load the Microsoft Clarity tracking script.', 'aegis'); ?></p>
											</div>
										</div>
										<label class="aegis-toggle">
											<input type="checkbox" name="aegis_analytics[clarity_enabled]" value="1" <?php checked($options['clarity_enabled']); ?>>
											<span class="aegis-toggle-slider"></span>
										</label>
									</div>

									<div class="aegis-toggle-suboptions">
										<div class="aegis-api-field-row">
											<div class="aegis-api-field-info">
												<div class="aegis-api-field-icon">
													<span class="dashicons dashicons-admin-network"></span>
												</div>
												<div class="aegis-api-field-text">
													<label><?php esc_html_e('Project ID', 'aegis'); ?></label>
													<p><?php esc_html_e('Your Clarity Project ID from the dashboard.', 'aegis'); ?></p>
												</div>
											</div>
											<div class="aegis-api-field-input">
												<input type="text"
													name="aegis_analytics[clarity_project_id]"
													value="<?php echo esc_attr($options['clarity_project_id']); ?>"
													placeholder="xxxxxxxxxx"
													class="regular-text" />
											</div>
										</div>
									</div>
								</div>
							</section>

							<!-- ===== Plausible Analytics ===== -->
							<section id="analytics-plausible" class="aegis-settings-section active">
								<?php $this->render_section_header(__('Plausible Analytics', 'aegis'), __('Privacy-friendly, cookie-free analytics.', 'aegis'), false, 'chart-line'); ?>

								<div class="aegis-settings-grid">
									<div class="aegis-toggle-card">
										<div class="aegis-toggle-info">
											<div class="aegis-toggle-icon">
												<span class="dashicons dashicons-chart-line"></span>
											</div>
											<div class="aegis-toggle-text">
												<h3><?php esc_html_e('Enable Plausible', 'aegis'); ?></h3>
												<p><?php esc_html_e('Load the Plausible Analytics script.', 'aegis'); ?></p>
											</div>
										</div>
										<label class="aegis-toggle">
											<input type="checkbox" name="aegis_analytics[plausible_enabled]" value="1" <?php checked($options['plausible_enabled']); ?>>
											<span class="aegis-toggle-slider"></span>
										</label>
									</div>

									<div class="aegis-toggle-suboptions">
										<div class="aegis-api-field-row">
											<div class="aegis-api-field-info">
												<div class="aegis-api-field-icon">
													<span class="dashicons dashicons-admin-site-alt3"></span>
												</div>
												<div class="aegis-api-field-text">
													<label><?php esc_html_e('Domain', 'aegis'); ?></label>
													<p><?php esc_html_e('The domain configured in your Plausible account.', 'aegis'); ?></p>
												</div>
											</div>
											<div class="aegis-api-field-input">
												<input type="text"
													name="aegis_analytics[plausible_domain]"
													value="<?php echo esc_attr($options['plausible_domain']); ?>"
													placeholder="example.com"
													class="regular-text" />
											</div>
										</div>

										<div class="aegis-api-field-row">
											<div class="aegis-api-field-info">
												<div class="aegis-api-field-icon">
													<span class="dashicons dashicons-admin-links"></span>
												</div>
												<div class="aegis-api-field-text">
													<label><?php esc_html_e('Custom Script URL', 'aegis'); ?></label>
													<p><?php esc_html_e('Optional. Use a self-hosted or proxied Plausible script URL.', 'aegis'); ?></p>
												</div>
											</div>
											<div class="aegis-api-field-input">
												<input type="url"
													name="aegis_analytics[plausible_script_url]"
													value="<?php echo esc_attr($options['plausible_script_url']); ?>"
													placeholder="https://plausible.io/js/script.js"
													class="regular-text" />
											</div>
										</div>
									</div>
								</div>
							</section>

							<!-- ===== Fathom Analytics ===== -->
							<section id="analytics-fathom" class="aegis-settings-section active">
								<?php $this->render_section_header(__('Fathom Analytics', 'aegis'), __('Simple, privacy-first website analytics.', 'aegis'), false, 'chart-area'); ?>

								<div class="aegis-settings-grid">
									<div class="aegis-toggle-card">
										<div class="aegis-toggle-info">
											<div class="aegis-toggle-icon">
												<span class="dashicons dashicons-chart-area"></span>
											</div>
											<div class="aegis-toggle-text">
												<h3><?php esc_html_e('Enable Fathom', 'aegis'); ?></h3>
												<p><?php esc_html_e('Load the Fathom Analytics tracking script.', 'aegis'); ?></p>
											</div>
										</div>
										<label class="aegis-toggle">
											<input type="checkbox" name="aegis_analytics[fathom_enabled]" value="1" <?php checked($options['fathom_enabled']); ?>>
											<span class="aegis-toggle-slider"></span>
										</label>
									</div>

									<div class="aegis-toggle-suboptions">
										<div class="aegis-api-field-row">
											<div class="aegis-api-field-info">
												<div class="aegis-api-field-icon">
													<span class="dashicons dashicons-admin-network"></span>
												</div>
												<div class="aegis-api-field-text">
													<label><?php esc_html_e('Site ID', 'aegis'); ?></label>
													<p><?php esc_html_e('Your Fathom Site ID from the dashboard.', 'aegis'); ?></p>
												</div>
											</div>
											<div class="aegis-api-field-input">
												<input type="text"
													name="aegis_analytics[fathom_site_id]"
													value="<?php echo esc_attr($options['fathom_site_id']); ?>"
													placeholder="XXXXXXXX"
													class="regular-text" />
											</div>
										</div>
									</div>
								</div>
							</section>

							<!-- ===== Matomo ===== -->
							<section id="analytics-matomo" class="aegis-settings-section active">
								<?php $this->render_section_header(__('Matomo', 'aegis'), __('Self-hosted web analytics platform.', 'aegis'), false, 'chart-pie'); ?>

								<div class="aegis-settings-grid">
									<div class="aegis-toggle-card">
										<div class="aegis-toggle-info">
											<div class="aegis-toggle-icon">
												<span class="dashicons dashicons-chart-pie"></span>
											</div>
											<div class="aegis-toggle-text">
												<h3><?php esc_html_e('Enable Matomo', 'aegis'); ?></h3>
												<p><?php esc_html_e('Load the Matomo tracking script for self-hosted analytics.', 'aegis'); ?></p>
											</div>
										</div>
										<label class="aegis-toggle">
											<input type="checkbox" name="aegis_analytics[matomo_enabled]" value="1" <?php checked($options['matomo_enabled']); ?>>
											<span class="aegis-toggle-slider"></span>
										</label>
									</div>
									<div class="aegis-toggle-suboptions">
										<div class="aegis-api-field-row">
											<div class="aegis-api-field-info">
												<div class="aegis-api-field-icon">
													<span class="dashicons dashicons-admin-site-alt3"></span>
												</div>
												<div class="aegis-api-field-text">
													<label><?php esc_html_e('Matomo URL', 'aegis'); ?></label>
													<p><?php esc_html_e('Full URL to your Matomo instance.', 'aegis'); ?></p>
												</div>
											</div>
											<div class="aegis-api-field-input">
												<input type="url"
													name="aegis_analytics[matomo_url]"
													value="<?php echo esc_attr($options['matomo_url']); ?>"
													placeholder="https://analytics.example.com"
													class="regular-text" />
											</div>
										</div>

										<div class="aegis-api-field-row">
											<div class="aegis-api-field-info">
												<div class="aegis-api-field-icon">
													<span class="dashicons dashicons-id"></span>
												</div>
												<div class="aegis-api-field-text">
													<label><?php esc_html_e('Site ID', 'aegis'); ?></label>
													<p><?php esc_html_e('Numeric Site ID from your Matomo dashboard.', 'aegis'); ?></p>
												</div>
											</div>
											<div class="aegis-api-field-input">
												<input type="text"
													name="aegis_analytics[matomo_site_id]"
													value="<?php echo esc_attr($options['matomo_site_id']); ?>"
													placeholder="1"
													class="regular-text" />
											</div>
										</div>

										<div class="aegis-toggle-card aegis-toggle-subcard">
											<div class="aegis-toggle-info">
												<div class="aegis-toggle-icon">
													<span class="dashicons dashicons-hidden"></span>
												</div>
												<div class="aegis-toggle-text">
													<h3><?php esc_html_e('Anonymize IP', 'aegis'); ?></h3>
													<p><?php esc_html_e('Enable Do Not Track and IP anonymization.', 'aegis'); ?></p>
												</div>
											</div>
											<label class="aegis-toggle">
												<input type="checkbox" name="aegis_analytics[matomo_anonymize_ip]" value="1" <?php checked($options['matomo_anonymize_ip']); ?>>
												<span class="aegis-toggle-slider"></span>
											</label>
										</div>
									</div>
								</div>
							</section>

							<!-- ===== PRO: Meta Pixel ===== -->
							<section id="analytics-meta-pixel" class="aegis-settings-section active">
								<?php $this->render_section_header(__('Meta Pixel', 'aegis'), __('Facebook/Instagram conversion tracking.', 'aegis'), false, 'megaphone'); ?>

								<div class="aegis-settings-grid">
									<div class="aegis-toggle-card <?php echo !$pro_active ? 'aegis-pro-feature aegis-toggle-disabled' : ''; ?>">
										<div class="aegis-toggle-info">
											<div class="aegis-toggle-icon">
												<span class="dashicons dashicons-megaphone"></span>
											</div>
											<div class="aegis-toggle-text">
												<h3>
													<?php esc_html_e('Enable Meta Pixel', 'aegis'); ?>
													<?php if (!$pro_active) : ?>
														<span class="aegis-pro-badge"><?php esc_html_e('Pro', 'aegis'); ?></span>
													<?php endif; ?>
												</h3>
												<p><?php esc_html_e('Load the Meta Pixel for Facebook and Instagram ad tracking.', 'aegis'); ?></p>
											</div>
										</div>
										<label class="aegis-toggle">
											<input type="checkbox" name="aegis_analytics[meta_pixel_enabled]" value="1" <?php checked($options['meta_pixel_enabled']); ?> <?php disabled(!$pro_active); ?>>
											<span class="aegis-toggle-slider"></span>
										</label>
									</div>

									<?php if ($pro_active) : ?>
									<div class="aegis-toggle-suboptions">
										<div class="aegis-api-field-row">
											<div class="aegis-api-field-info">
												<div class="aegis-api-field-icon">
													<span class="dashicons dashicons-admin-network"></span>
												</div>
												<div class="aegis-api-field-text">
													<label><?php esc_html_e('Pixel ID', 'aegis'); ?></label>
													<p><?php esc_html_e('Your Meta Pixel ID from the Events Manager.', 'aegis'); ?></p>
												</div>
											</div>
											<div class="aegis-api-field-input">
												<input type="text"
													name="aegis_analytics[meta_pixel_id]"
													value="<?php echo esc_attr($options['meta_pixel_id']); ?>"
													placeholder="XXXXXXXXXXXXXXX"
													class="regular-text" />
											</div>
										</div>

										<div class="aegis-toggle-card aegis-toggle-subcard">
											<div class="aegis-toggle-info">
												<div class="aegis-toggle-icon">
													<span class="dashicons dashicons-cart"></span>
												</div>
												<div class="aegis-toggle-text">
													<h3><?php esc_html_e('WooCommerce Events', 'aegis'); ?></h3>
													<p><?php esc_html_e('Automatically track ViewContent, AddToCart, InitiateCheckout, and Purchase events.', 'aegis'); ?></p>
												</div>
											</div>
											<label class="aegis-toggle">
												<input type="checkbox" name="aegis_analytics[meta_pixel_woo_events]" value="1" <?php checked($options['meta_pixel_woo_events']); ?>>
												<span class="aegis-toggle-slider"></span>
											</label>
										</div>
									</div>
									<?php endif; ?>
								</div>
							</section>

							<!-- ===== Privacy & Performance ===== -->
							<section id="analytics-privacy" class="aegis-settings-section active">
								<?php $this->render_section_header(__('Privacy & Performance', 'aegis'), __('GDPR compliance, consent management, and script loading optimization.', 'aegis'), false, 'shield'); ?>

								<div class="aegis-settings-grid">
									<div class="aegis-toggle-card">
										<div class="aegis-toggle-info">
											<div class="aegis-toggle-icon">
												<span class="dashicons dashicons-shield"></span>
											</div>
											<div class="aegis-toggle-text">
												<h3><?php esc_html_e('Require Consent', 'aegis'); ?></h3>
												<p><?php esc_html_e('Require user consent before loading tracking scripts. Works with Complianz or any consent plugin.', 'aegis'); ?></p>
											</div>
										</div>
										<label class="aegis-toggle">
											<input type="checkbox" name="aegis_analytics[gdpr_consent_required]" value="1" <?php checked($options['gdpr_consent_required']); ?>>
											<span class="aegis-toggle-slider"></span>
										</label>
									</div>

									<div class="aegis-toggle-card">
										<div class="aegis-toggle-info">
											<div class="aegis-toggle-icon">
												<span class="dashicons dashicons-dismiss"></span>
											</div>
											<div class="aegis-toggle-text">
												<h3><?php esc_html_e('Respect Do Not Track', 'aegis'); ?></h3>
												<p><?php esc_html_e('Skip all tracking for visitors with the DNT browser header enabled.', 'aegis'); ?></p>
											</div>
										</div>
										<label class="aegis-toggle">
											<input type="checkbox" name="aegis_analytics[gdpr_respect_dnt]" value="1" <?php checked($options['gdpr_respect_dnt']); ?>>
											<span class="aegis-toggle-slider"></span>
										</label>
									</div>

									<div class="aegis-toggle-card">
										<div class="aegis-toggle-info">
											<div class="aegis-toggle-icon">
												<span class="dashicons dashicons-admin-plugins"></span>
											</div>
											<div class="aegis-toggle-text">
												<h3>
													<?php esc_html_e('Complianz Integration', 'aegis'); ?>
													<?php if (!$has_complianz) : ?>
														<span class="aegis-plugin-status not-installed"><?php esc_html_e('Not Installed', 'aegis'); ?></span>
													<?php else : ?>
														<span class="aegis-plugin-status active"><?php esc_html_e('Active', 'aegis'); ?></span>
													<?php endif; ?>
												</h3>
												<p><?php esc_html_e('Integrate with Complianz for automatic cookie consent management.', 'aegis'); ?></p>
											</div>
										</div>
										<label class="aegis-toggle">
											<input type="checkbox" name="aegis_analytics[gdpr_complianz]" value="1" <?php checked($options['gdpr_complianz']); ?> <?php disabled(!$has_complianz); ?>>
											<span class="aegis-toggle-slider"></span>
										</label>
									</div>

									<div class="aegis-toggle-card">
										<div class="aegis-toggle-info">
											<div class="aegis-toggle-icon">
												<span class="dashicons dashicons-download"></span>
											</div>
											<div class="aegis-toggle-text">
												<h3><?php esc_html_e('Local Script Loading', 'aegis'); ?></h3>
												<p><?php esc_html_e('Cache GA4 and GTM scripts locally for faster loading and ad-blocker bypass. Scripts refresh automatically every 24 hours.', 'aegis'); ?></p>
											</div>
										</div>
										<label class="aegis-toggle">
											<input type="checkbox" name="aegis_analytics[local_scripts]" value="1" <?php checked($options['local_scripts']); ?>>
											<span class="aegis-toggle-slider"></span>
										</label>
									</div>

									<!-- PRO: Consent Mode v2 -->
									<div class="aegis-toggle-card <?php echo !$pro_active ? 'aegis-pro-feature aegis-toggle-disabled' : ''; ?>">
										<div class="aegis-toggle-info">
											<div class="aegis-toggle-icon">
												<span class="dashicons dashicons-lock"></span>
											</div>
											<div class="aegis-toggle-text">
												<h3>
													<?php esc_html_e('GA4 Consent Mode v2', 'aegis'); ?>
													<?php if (!$pro_active) : ?>
														<span class="aegis-pro-badge"><?php esc_html_e('Pro', 'aegis'); ?></span>
													<?php endif; ?>
												</h3>
												<p><?php esc_html_e('Set denied defaults for analytics_storage, ad_storage, ad_user_data, and ad_personalization until consent is granted.', 'aegis'); ?></p>
											</div>
										</div>
										<label class="aegis-toggle">
											<input type="checkbox" name="aegis_analytics[ga4_consent_mode]" value="1" <?php checked($options['ga4_consent_mode']); ?> <?php disabled(!$pro_active); ?>>
											<span class="aegis-toggle-slider"></span>
										</label>
									</div>

									<!-- PRO: Data Layer -->
									<div class="aegis-toggle-card <?php echo !$pro_active ? 'aegis-pro-feature aegis-toggle-disabled' : ''; ?>">
										<div class="aegis-toggle-info">
											<div class="aegis-toggle-icon">
												<span class="dashicons dashicons-database"></span>
											</div>
											<div class="aegis-toggle-text">
												<h3>
													<?php esc_html_e('GTM Data Layer', 'aegis'); ?>
													<?php if (!$pro_active) : ?>
														<span class="aegis-pro-badge"><?php esc_html_e('Pro', 'aegis'); ?></span>
													<?php endif; ?>
												</h3>
												<p><?php esc_html_e('Automatically populate the Data Layer with page type, post data, and user login status.', 'aegis'); ?></p>
											</div>
										</div>
										<label class="aegis-toggle">
											<input type="checkbox" name="aegis_analytics[gtm_data_layer]" value="1" <?php checked($options['gtm_data_layer']); ?> <?php disabled(!$pro_active); ?>>
											<span class="aegis-toggle-slider"></span>
										</label>
									</div>

									<!-- PRO: Debug Mode -->
									<div class="aegis-toggle-card <?php echo !$pro_active ? 'aegis-pro-feature aegis-toggle-disabled' : ''; ?>">
										<div class="aegis-toggle-info">
											<div class="aegis-toggle-icon">
												<span class="dashicons dashicons-editor-code"></span>
											</div>
											<div class="aegis-toggle-text">
												<h3>
													<?php esc_html_e('Debug Mode', 'aegis'); ?>
													<?php if (!$pro_active) : ?>
														<span class="aegis-pro-badge"><?php esc_html_e('Pro', 'aegis'); ?></span>
													<?php endif; ?>
												</h3>
												<p><?php esc_html_e('Show active providers, consent state, and script loading info in the browser console. Admin users only.', 'aegis'); ?></p>
											</div>
										</div>
										<label class="aegis-toggle">
											<input type="checkbox" name="aegis_analytics[gdpr_debug_mode]" value="1" <?php checked($options['gdpr_debug_mode']); ?> <?php disabled(!$pro_active); ?>>
											<span class="aegis-toggle-slider"></span>
										</label>
									</div>
								</div>
							</section>

							<div class="aegis-settings-footer">
								<?php submit_button(__('Save Settings', 'aegis'), 'primary', 'submit', false); ?>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<?php
	}
}