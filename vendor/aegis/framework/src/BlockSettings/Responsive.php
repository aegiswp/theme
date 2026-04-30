<?php
/**
 * Responsive Block Setting
 *
 * Provides support for responsive settings and controls for blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for rendering responsive styles and scripts for block content
 * - Integrates with the Renderable, Scriptable, and Styleable interfaces for block output
 *
 * @package    Aegis\Framework\BlockSettings
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for block settings.
declare(strict_types=1);

// Declares the namespace for block settings within the Aegis Framework.
namespace Aegis\Framework\BlockSettings;

// Imports utility classes and interfaces for DOM manipulation, asset management, and responsive controls.
use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use Aegis\Framework\InlineAssets\Scriptable;
use Aegis\Framework\InlineAssets\Scripts;
use Aegis\Framework\InlineAssets\Styleable;
use Aegis\Framework\InlineAssets\Styles;
use Aegis\Framework\Interfaces\Renderable;
use Aegis\Utilities\UserAgent;
use WP_Block;
use function _wp_to_kebab_case;
use function array_merge;
use function class_exists;
use function current_time;
use function in_array;
use function intval;
use function is_admin;
use function is_numeric;
use function is_user_logged_in;
use function sanitize_text_field;
use function sprintf;
use function wp_unslash;
use function str_contains;
use function str_replace;
use function strtotime;
use function wp_get_current_user;
use function wp_unique_id;

// Implements the Responsive class to support responsive settings and controls for blocks.

class Responsive implements Renderable, Scriptable, Styleable
{

	/**
	 * Visibility toggle settings for hiding blocks on specific breakpoints.
	 *
	 * @since 1.0.0
	 *
	 * @var array
	 */
	public const VISIBILITY = [
		'hideOnMobile' => [
			'property' => 'hide-on-mobile',
			'label' => 'Hide on Mobile',
			'breakpoint' => 'mobile',
		],
		'hideOnTablet' => [
			'property' => 'hide-on-tablet',
			'label' => 'Hide on Tablet',
			'breakpoint' => 'tablet',
		],
		'hideOnDesktop' => [
			'property' => 'hide-on-desktop',
			'label' => 'Hide on Desktop',
			'breakpoint' => 'desktop',
		],
	];

	/**
	 * Accessibility settings for visibility controls.
	 *
	 * @since 1.0.0
	 *
	 * @var array
	 */
	public const ACCESSIBILITY = [
		'hideReducedMotion' => [
			'property' => 'hide-reduced-motion',
			'label' => 'Hide with Reduced Motion',
		],
		'screenReaderOnly' => [
			'property' => 'screen-reader-only',
			'label' => 'Screen Reader Only',
		],
		'colorScheme' => [
			'property' => 'color-scheme',
			'label' => 'Color Scheme',
			'options' => ['light', 'dark'],
		],
	];

	public const SETTINGS = [
		'position' => [
			'property' => 'position',
			'label' => 'Position',
			'options' => [
				[
					'label' => '',
					'value' => '',
				],
				[
					'label' => 'Relative',
					'value' => 'relative',
				],
				[
					'label' => 'Absolute',
					'value' => 'absolute',
				],
				[
					'label' => 'Sticky',
					'value' => 'sticky',
				],
				[
					'label' => 'Fixed',
					'value' => 'fixed',
				],
				[
					'label' => 'Static',
					'value' => 'static',
				],
			],
		],
		'top' => [
			'property' => 'top',
			'label' => 'Top',
		],
		'right' => [
			'property' => 'right',
			'label' => 'Right',
		],
		'bottom' => [
			'property' => 'bottom',
			'label' => 'Bottom',
		],
		'left' => [
			'property' => 'left',
			'label' => 'Left',
		],
		'zIndex' => [
			'property' => 'z-index',
			'label' => 'Z-Index',
		],
		'display' => [
			'property' => 'display',
			'label' => 'Display',
			'options' => [
				[
					'label' => '',
					'value' => '',
				],
				[
					'label' => 'Flex',
					'value' => 'flex',
				],
				[
					'label' => 'Inline Flex',
					'value' => 'inline-flex',
				],
				[
					'label' => 'Block',
					'value' => 'block',
				],
				[
					'label' => 'Inline Block',
					'value' => 'inline-block',
				],
				[
					'label' => 'Inline',
					'value' => 'inline',
				],
				[
					'label' => 'Grid',
					'value' => 'grid',
				],
				[
					'label' => 'Inline Grid',
					'value' => 'inline-grid',
				],
				[
					'label' => 'Contents',
					'value' => 'contents',
				],
				[
					'label' => 'None',
					'value' => 'none',
				],
			],
		],
		'order' => [
			'property' => 'order',
			'label' => 'Order',
		],
		'gridTemplateColumns' => [
			'property' => 'grid-template-columns',
			'label' => 'Columns',
		],
		'gridTemplateRows' => [
			'property' => 'grid-template-rows',
			'label' => 'Rows',
		],
		'gridColumnStart' => [
			'property' => 'grid-column-start',
			'label' => 'Column Start',
		],
		'gridColumnEnd' => [
			'property' => 'grid-column-end',
			'label' => 'Column End',
		],
		'gridRowStart' => [
			'property' => 'grid-row-start',
			'label' => 'Row Start',
		],
		'gridRowEnd' => [
			'property' => 'grid-row-end',
			'label' => 'Row End',
		],
		'overflow' => [
			'property' => 'overflow',
			'label' => 'Overflow',
			'options' => [
				[
					'label' => '',
					'value' => '',
				],
				[
					'label' => 'Hidden',
					'value' => 'hidden',
				],
				[
					'label' => 'Visible',
					'value' => 'visible',
				],
			],
		],
		'pointerEvents' => [
			'property' => 'pointer-events',
			'label' => 'Pointer Events',
			'options' => [
				[
					'label' => '',
					'value' => '',
				],
				[
					'label' => 'None',
					'value' => 'none',
				],
				[
					'label' => 'All',
					'value' => 'all',
				],
			],
		],
		'width' => [
			'property' => 'width',
			'label' => 'Width',
		],
		'minWidth' => [
			'property' => 'min-width',
			'label' => 'Min Width',
		],
		'maxWidth' => [
			'property' => 'max-width',
			'label' => 'Max Width',
		],
	];

	/**
	 * Gets responsive classes for a given property.
	 *
	 * @since 1.0.0
	 *
	 * @param string $block_content HTML content.
	 * @param array  $block         Block data.
	 * @param array  $options       Block options.
	 * @param bool   $image         Is an image block.
	 *
	 * @return string
	 */
	public static function add_responsive_classes(string $block_content, array $block, array $options, bool $image = false): string
	{
		$dom = DOM::create($block_content);
		$first = DOM::get_element('*', $dom);

		if (!$first) {
			return $block_content;
		}

		$element = $first;

		if ($image) {
			$link = DOM::get_element('a', $first);
			$element = $link ? DOM::get_element('img', $link) : DOM::get_element('img', $first);
		}

		if (!$element) {
			return $block_content;
		}

		$style = $block['attrs']['style'] ?? [];
		$classes = explode(' ', $element->getAttribute('class'));

		foreach ($options as $key => $args) {
			if (!isset($style[$key]) || $style[$key] === '') {
				continue;
			}

			$property = _wp_to_kebab_case($key);

			if (isset($args['options'])) {
				$both = $style[$key]['all'] ?? '';
				$mobile = $style[$key]['mobile'] ?? '';
				$landscape = $style[$key]['landscape'] ?? '';
				$tablet = $style[$key]['tablet'] ?? '';
				$desktop = $style[$key]['desktop'] ?? '';

				if ($both) {
					$classes[] = "has-{$property}-{$both}";
				}

				if ($mobile) {
					$classes[] = "has-{$property}-{$mobile}-mobile";
				}

				if ($landscape) {
					$classes[] = "has-{$property}-{$landscape}-landscape";
				}

				if ($tablet) {
					$classes[] = "has-{$property}-{$tablet}-tablet";
				}

				if ($desktop) {
					$classes[] = "has-{$property}-{$desktop}-desktop";
				}
			} else {
				$classes[] = "has-{$property}";
			}

			$element->setAttribute('class', implode(' ', $classes));

			$block_content = $dom->saveHTML();
		}

		return $block_content;
	}

	/**
	 * Adds responsive styles to DOM.
	 *
	 * @since 1.0.0
	 *
	 * @param string $block_content HTML content.
	 * @param array  $block         Block data.
	 * @param array  $options       Block options.
	 *
	 * @return string
	 */
	public static function add_responsive_styles(string $block_content, array $block, array $options): string
	{
		$style = $block['attrs']['style'] ?? [];

		if (!$style) {
			return $block_content;
		}

		$new_styles = [];

		foreach ($options as $key => $args) {

			if (!isset($style[$key])) {
				continue;
			}

			// Has utility class.
			if (isset($args['options'])) {
				continue;
			}

			$property = _wp_to_kebab_case($key);
			$both = $style[$key]['all'] ?? '';
			$mobile = $style[$key]['mobile'] ?? '';
			$landscape = $style[$key]['landscape'] ?? '';
			$tablet = $style[$key]['tablet'] ?? '';
			$desktop = $style[$key]['desktop'] ?? '';

			if ($both) {
				$new_styles['--' . $property] = $both;
			}

			if ($mobile) {
				$new_styles['--' . $property . '-mobile'] = $mobile;
			}

			if ($landscape) {
				$new_styles['--' . $property . '-landscape'] = $landscape;
			}

			if ($tablet) {
				$new_styles['--' . $property . '-tablet'] = $tablet;
			}

			if ($desktop) {
				$new_styles['--' . $property . '-desktop'] = $desktop;
			}
		}

		if (!$new_styles) {
			return $block_content;
		}

		$dom = DOM::create($block_content);
		$first = DOM::get_element('*', $dom);

		if (!$first) {
			return $block_content;
		}

		$styles = array_merge(CSS::string_to_array($first->getAttribute('style')), $new_styles);
		$first->setAttribute('style', CSS::array_to_string($styles));

		return $dom->saveHTML();
	}

	/**
	 * Modifies front end HTML output of block.
	 *
	 * @since 1.0.0
	 *
	 * @param string   $block_content Block content.
	 * @param array    $block         Block data.
	 * @param WP_Block $instance      Block instance.
	 *
	 * @hook  render_block 11
	 *
	 * @return string
	 */
	public function render(string $block_content, array $block, WP_Block $instance): string
	{
		$style = $block['attrs']['style'] ?? [];
		$visibility = $block['attrs']['visibility'] ?? [];

		// Check device/browser rules - hide block if rules match
		if ($this->should_hide_for_device($visibility)) {
			return '';
		}

		// Check user status - hide block if user status does not match
		if ($this->should_hide_for_user_status($visibility)) {
			return '';
		}

		// Check user role rules - hide block if role rules match
		if ($this->should_hide_for_user_role($visibility)) {
			return '';
		}

		// Check schedule - hide block if outside scheduled time
		if ($this->should_hide_for_schedule($visibility)) {
			return '';
		}

		// Add visibility classes for hide toggles
		$block_content = $this->add_visibility_classes($block_content, $visibility);

		if (!$style) {
			return $block_content;
		}

		$block_content = $this->add_responsive_classes(
			$block_content,
			$block,
			self::SETTINGS
		);

		$block_content = $this->add_responsive_styles(
			$block_content,
			$block,
			self::SETTINGS
		);

		return $block_content;
	}

	/**
	 * Check if block should be hidden based on user login status.
	 *
	 * @since 1.0.0
	 *
	 * @param array $visibility Visibility settings.
	 *
	 * @return bool True if block should be hidden.
	 */
	private function should_hide_for_user_status(array $visibility): bool
	{
		// Check canonical key first, then fall back to pro legacy key
		$user_status = $visibility['userStatus'] ?? $visibility['status'] ?? '';

		if (empty($user_status) || $user_status === 'all') {
			return false;
		}

		// Normalize legacy hyphenated format (logged-in → logged_in)
		$user_status = str_replace('-', '_', $user_status);

		$is_logged_in = is_user_logged_in();

		// Hide if set to logged_in only but user is not logged in
		if ($user_status === 'logged_in' && !$is_logged_in) {
			return true;
		}

		// Hide if set to logged_out only but user is logged in
		if ($user_status === 'logged_out' && $is_logged_in) {
			return true;
		}

		return false;
	}

	/**
	 * Check if block should be hidden based on user role rules.
	 *
	 * @since 1.0.0
	 *
	 * @param array $visibility Visibility settings.
	 *
	 * @return bool True if block should be hidden.
	 */
	private function should_hide_for_user_role(array $visibility): bool
	{
		$role_rules = $visibility['userRoleRules'] ?? [];

		// Backward compat: pro legacy format uses 'roles' as
		// [{value: 'editor', label: 'Editor'}, ...] with implicit 'is'
		if (empty($role_rules)) {
			$legacy_roles = $visibility['roles'] ?? [];
			if (!empty($legacy_roles)) {
				foreach ($legacy_roles as $lr) {
					$role_rules[] = [
						'role'     => $lr['value'] ?? '',
						'operator' => 'is',
					];
				}
			}
		}

		if (empty($role_rules)) {
			return false;
		}

		$current_user = wp_get_current_user();
		$user_roles = $current_user->roles ?? [];

		foreach ($role_rules as $rule) {
			$role = $rule['role'] ?? '';
			$operator = $rule['operator'] ?? 'is';

			if (empty($role)) {
				continue;
			}

			$has_role = in_array($role, $user_roles, true);

			// "is" operator: hide if user HAS this role
			if ($operator === 'is' && $has_role) {
				return true;
			}

			// "isNot" operator: hide if user does NOT have this role
			if ($operator === 'isNot' && !$has_role) {
				return true;
			}
		}

		return false;
	}

	/**
	 * Check if block should be hidden based on schedule.
	 *
	 * @since 1.0.0
	 *
	 * @param array $visibility Visibility settings.
	 *
	 * @return bool True if block should be hidden.
	 */
	private function should_hide_for_schedule(array $visibility): bool
	{
		$schedule_start = $visibility['scheduleStart'] ?? '';
		$schedule_end = $visibility['scheduleEnd'] ?? '';

		if (empty($schedule_start) && empty($schedule_end)) {
			return false;
		}

		$current_time = current_time('timestamp');

		// Check start time - hide if current time is before start
		if (!empty($schedule_start)) {
			$start_timestamp = strtotime($schedule_start);
			if ($start_timestamp && $current_time < $start_timestamp) {
				return true;
			}
		}

		// Check end time - hide if current time is after end
		if (!empty($schedule_end)) {
			$end_timestamp = strtotime($schedule_end);
			if ($end_timestamp && $current_time > $end_timestamp) {
				return true;
			}
		}

		return false;
	}

	/**
	 * Check if block should be hidden based on device/browser rules.
	 *
	 * @since 1.0.0
	 *
	 * @param array $visibility Visibility settings.
	 *
	 * @return bool True if block should be hidden.
	 */
	private function should_hide_for_device(array $visibility): bool
	{
		$device_rules = $visibility['deviceRules'] ?? [];

		if (empty($device_rules)) {
			return false;
		}

		// phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotValidated
		$user_agent = isset( $_SERVER['HTTP_USER_AGENT'] ) ? sanitize_text_field( wp_unslash( $_SERVER['HTTP_USER_AGENT'] ) ) : '';

		if (empty($user_agent)) {
			return false;
		}

		$user_agent_lower = strtolower($user_agent);

		foreach ($device_rules as $rule) {
			$device = $rule['device'] ?? '';
			$operator = $rule['operator'] ?? 'is';

			if (empty($device)) {
				continue;
			}

			$is_match = UserAgent::matches_device($user_agent_lower, $device);

			// "is" operator: hide if device matches
			// "isNot" operator: hide if device does NOT match
			if ($operator === 'is' && $is_match) {
				return true;
			}

			if ($operator === 'isNot' && !$is_match) {
				return true;
			}
		}

		return false;
	}

	/**
	 * Detect if user agent matches a specific device/browser.
	 *
	 * @since      1.0.0
	 * @deprecated 1.1.0 Use {@see UserAgent::matches_device()} instead.
	 *
	 * @param string $device     Device/browser identifier.
	 * @param string $user_agent Lowercase user agent string.
	 *
	 * @return bool True if device/browser is detected.
	 */
	private function detect_device(string $device, string $user_agent): bool
	{
		return UserAgent::matches_device($user_agent, $device);
	}

	/**
	 * Adds visibility classes for responsive hide toggles.
	 *
	 * @since 1.0.0
	 *
	 * @param string $block_content Block content.
	 * @param array  $visibility    Visibility settings.
	 *
	 * @return string
	 */
	private function add_visibility_classes(string $block_content, array $visibility): string
	{
		if (empty($visibility) || empty($block_content)) {
			return $block_content;
		}

		// Check if any visibility toggles are actually set
		$has_visibility = false;
		$classes_to_add = [];

		foreach (self::VISIBILITY as $key => $args) {
			if (!empty($visibility[$key])) {
				$has_visibility = true;
				$classes_to_add[] = $args['property'];
			}
		}

		// Check for accessibility settings
		if (!empty($visibility['hideReducedMotion'])) {
			$has_visibility = true;
			$classes_to_add[] = 'hide-reduced-motion';
		}

		if (!empty($visibility['screenReaderOnly'])) {
			$has_visibility = true;
			$classes_to_add[] = 'screen-reader-only';
		}

		$color_scheme = $visibility['colorScheme'] ?? '';
		if (!empty($color_scheme)) {
			$has_visibility = true;
			$classes_to_add[] = 'show-' . $color_scheme . '-mode-only';
		}

		if (!empty($visibility['hideHighContrast'])) {
			$has_visibility = true;
			$classes_to_add[] = 'hide-high-contrast';
		}

		if (!empty($visibility['hideForcedColors'])) {
			$has_visibility = true;
			$classes_to_add[] = 'hide-forced-colors';
		}

		// Check for custom breakpoints
		$custom_breakpoints = $visibility['customBreakpoints'] ?? [];
		$custom_css = '';

		if (!empty($custom_breakpoints)) {
			$unique_id = 'aegis-bp-' . wp_unique_id();
			$classes_to_add[] = $unique_id;
			$has_visibility = true;

			foreach ($custom_breakpoints as $breakpoint) {
				$min_width = $breakpoint['minWidth'] ?? '';
				$max_width = $breakpoint['maxWidth'] ?? '';

				if (empty($min_width) && empty($max_width)) {
					continue;
				}

				$media_query = $this->build_media_query($min_width, $max_width);
				if ($media_query) {
					$custom_css .= sprintf('%s{.%s{display:none !important}}', $media_query, $unique_id);
				}
			}
		}

		if (!$has_visibility) {
			return $block_content;
		}

		// Use regex to add classes to avoid DOM manipulation issues
		$classes_string = implode(' ', $classes_to_add);

		// Match the first HTML tag with a class attribute
		$pattern = '/^(<[^>]+\sclass=["\'])([^"\']*)(["\']\s*[^>]*>)/';
		if (preg_match($pattern, $block_content, $matches)) {
			$existing_classes = $matches[2];
			$new_classes = trim($existing_classes . ' ' . $classes_string);
			$block_content = preg_replace($pattern, '$1' . $new_classes . '$3', $block_content, 1);
		} else {
			// No class attribute, try to add one to the first tag
			$pattern = '/^(<\w+)(\s|>)/';
			if (preg_match($pattern, $block_content)) {
				$block_content = preg_replace($pattern, '$1 class="' . $classes_string . '"$2', $block_content, 1);
			}
		}

		// Add inline style tag for custom breakpoints
		if ($custom_css) {
			$block_content .= '<style>' . $custom_css . '</style>';
		}

		return $block_content;
	}

	/**
	 * Build media query string from min/max width values.
	 *
	 * @since 1.0.0
	 *
	 * @param string $min_width Minimum width in pixels.
	 * @param string $max_width Maximum width in pixels.
	 *
	 * @return string Media query string or empty if invalid.
	 */
	private function build_media_query(string $min_width, string $max_width): string
	{
		$conditions = [];

		if (!empty($min_width) && is_numeric($min_width)) {
			$conditions[] = '(min-width:' . intval($min_width) . 'px)';
		}

		if (!empty($max_width) && is_numeric($max_width)) {
			$conditions[] = '(max-width:' . intval($max_width) . 'px)';
		}

		if (empty($conditions)) {
			return '';
		}

		return '@media ' . implode(' and ', $conditions);
	}

	/**
	 * Add default block supports.
	 *
	 * @since 1.0.0
	 *
	 * @param Scripts $scripts Scripts service.
	 *
	 * @return void
	 */
	public function scripts(Scripts $scripts): void
	{
		$scripts->add_data(
			'responsiveOptions',
			self::SETTINGS,
			[],
			is_admin()
		);

		$scripts->add_data(
			'visibilityOptions',
			self::VISIBILITY,
			[],
			is_admin()
		);

		// Pass conditional logic settings to editor
		$scripts->add_data(
			'conditionalLogicSettings',
			$this->get_conditional_logic_settings(),
			[],
			is_admin()
		);
	}

	/**
	 * Get conditional logic settings for the editor.
	 *
	 * Single source of truth used by both Responsive and EditorAssets.
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	public static function get_conditional_logic_settings(): array
	{
		static $cached = null;

		if ($cached !== null) {
			return $cached;
		}

		// Use the theme-level settings class if available
		if (class_exists('\Aegis\Admin\ConditionalLogicSettings')) {
			$cached = \Aegis\Admin\ConditionalLogicSettings::get_settings();
			return $cached;
		}

		// Fallback defaults - all disabled
		$cached = [
			'visibility' => [
				'screen_size' => false,
				'custom_breakpoints' => false,
				'browser_device' => false,
			],
			'accessibility' => [
				'reduced_motion' => false,
				'screen_reader_only' => false,
				'color_scheme' => false,
				'high_contrast' => false,
				'forced_colors' => false,
			],
			'user' => [
				'user_status' => false,
				'user_role' => false,
			],
			'schedule' => [
				'date_time' => false,
			],
		];

		return $cached;
	}

	/**
	 * Conditionally adds CSS for utility classes
	 *
	 * @since 1.0.0
	 *
	 * @param Styles $styles Styles service.
	 *
	 * @return void
	 */
	public function styles(Styles $styles): void
	{
		$styles->add_callback([$this, 'get_styles']);
	}

	/**
	 * Returns inline styles for responsive classes.
	 *
	 * @since 1.0.0
	 *
	 * @param string $template_html Template HTML.
	 * @param bool   $load_all      Load all assets.
	 *
	 * @return string
	 */
	public function get_styles(string $template_html, bool $load_all): string
	{
		$options = array_merge(
			self::SETTINGS,
			Image::SETTINGS,
		);
		$both = '';
		$mobile = '';
		$landscape = '';
		$tablet = '';
		$desktop = '';

		foreach ($options as $key => $args) {
			$property = _wp_to_kebab_case($key);
			$select_options = $args['options'] ?? [];

			foreach ($select_options as $option) {
				$value = $option['value'] ?? '';

				if (!$value) {
					continue;
				}

				$formatted_value = $value;

				if ('aspect-ratio' === $property) {
					$formatted_value = str_replace('/', '\/', $formatted_value);
				}

				if ($load_all || str_contains($template_html, " has-{$property}-{$value}")) {
					$both .= sprintf(
						'.has-%1$s-%3$s{%1$s:%2$s !important}',
						$property,
						$value,
						$formatted_value,
					);
				}

				if ($load_all || str_contains($template_html, " has-{$property}-{$value}-mobile")) {
					$mobile .= sprintf(
						'.has-%1$s-%3$s-mobile{%1$s:%2$s !important}',
						$property,
						$value,
						$formatted_value,
					);
				}

				if ($load_all || str_contains($template_html, " has-{$property}-{$value}-landscape")) {
					$landscape .= sprintf(
						'.has-%1$s-%3$s-landscape{%1$s:%2$s !important}',
						$property,
						$value,
						$formatted_value,
					);
				}

				if ($load_all || str_contains($template_html, " has-{$property}-{$value}-tablet")) {
					$tablet .= sprintf(
						'.has-%1$s-%3$s-tablet{%1$s:%2$s !important}',
						$property,
						$value,
						$formatted_value,
					);
				}

				if ($load_all || str_contains($template_html, " has-{$property}-{$value}-desktop")) {
					$desktop .= sprintf(
						'.has-%1$s-%3$s-desktop{%1$s:%2$s !important}',
						$property,
						$value,
						$formatted_value,
					);
				}
			}

			// Has custom value.
			if (!$select_options) {

				if ($load_all || str_contains($template_html, " has-$property")) {
					$both .= sprintf(
						'.has-%1$s{%1$s:var(--%1$s)}',
						$property
					);
				}

				if ($load_all || str_contains($template_html, "--$property-mobile")) {
					$mobile .= sprintf(
						'.has-%1$s{%1$s:var(--%1$s-mobile,var(--%1$s))}',
						$property
					);
				}

				if ($load_all || str_contains($template_html, "--$property-landscape")) {
					$landscape .= sprintf(
						'.has-%1$s{%1$s:var(--%1$s-landscape,var(--%1$s))}',
						$property
					);
				}

				if ($load_all || str_contains($template_html, "--$property-tablet")) {
					$tablet .= sprintf(
						'.has-%1$s{%1$s:var(--%1$s-tablet,var(--%1$s))}',
						$property
					);
				}

				if ($load_all || str_contains($template_html, "--$property-desktop")) {
					$desktop .= sprintf(
						'.has-%1$s{%1$s:var(--%1$s-desktop,var(--%1$s))}',
						$property
					);
				}
			}
		}

		$css = '';

		if ($both) {
			$css .= $both;
		}

		if ($mobile) {
			$css .= sprintf('@media(max-width:479px){%s}', $mobile);
		}

		if ($landscape) {
			$css .= sprintf('@media(min-width:480px) and (max-width:767px){%s}', $landscape);
		}

		if ($tablet) {
			$css .= sprintf('@media(min-width:768px) and (max-width:1023px){%s}', $tablet);
		}

		if ($desktop) {
			$css .= sprintf('@media(min-width:1024px){%s}', $desktop);
		}

		// Add visibility toggle CSS
		$css .= $this->get_visibility_styles($template_html, $load_all);

		return $css;
	}

	/**
	 * Returns inline styles for visibility toggle classes.
	 *
	 * @since 1.0.0
	 *
	 * @param string $template_html Template HTML.
	 * @param bool   $load_all      Load all assets.
	 *
	 * @return string
	 */
	private function get_visibility_styles(string $template_html, bool $load_all): string
	{
		$css = '';

		// Hide on mobile (max-width: 479px)
		if ($load_all || str_contains($template_html, 'hide-on-mobile')) {
			$css .= '@media(max-width:479px){.hide-on-mobile{display:none !important}}';
		}

		// Hide on tablet (768px - 1023px)
		if ($load_all || str_contains($template_html, 'hide-on-tablet')) {
			$css .= '@media(min-width:768px) and (max-width:1023px){.hide-on-tablet{display:none !important}}';
		}

		// Hide on desktop (min-width: 1024px)
		if ($load_all || str_contains($template_html, 'hide-on-desktop')) {
			$css .= '@media(min-width:1024px){.hide-on-desktop{display:none !important}}';
		}

		// Accessibility: Hide with reduced motion preference
		if ($load_all || str_contains($template_html, 'hide-reduced-motion')) {
			$css .= '@media(prefers-reduced-motion:reduce){.hide-reduced-motion{display:none !important}}';
		}

		// Accessibility: Screen reader only (visually hidden but accessible)
		if ($load_all || str_contains($template_html, 'screen-reader-only')) {
			$css .= '.screen-reader-only{position:absolute !important;width:1px !important;height:1px !important;padding:0 !important;margin:-1px !important;overflow:hidden !important;clip:rect(0,0,0,0) !important;white-space:nowrap !important;border:0 !important}';
		}

		// Accessibility: Show only in light mode
		if ($load_all || str_contains($template_html, 'show-light-mode-only')) {
			$css .= '@media(prefers-color-scheme:dark){.show-light-mode-only{display:none !important}}';
		}

		// Accessibility: Show only in dark mode
		if ($load_all || str_contains($template_html, 'show-dark-mode-only')) {
			$css .= '@media(prefers-color-scheme:light){.show-dark-mode-only{display:none !important}}';
		}

		// Accessibility: Hide in high contrast mode
		if ($load_all || str_contains($template_html, 'hide-high-contrast')) {
			$css .= '@media(prefers-contrast:more){.hide-high-contrast{display:none !important}}';
		}

		// Accessibility: Hide in forced colors mode (Windows High Contrast)
		if ($load_all || str_contains($template_html, 'hide-forced-colors')) {
			$css .= '@media(forced-colors:active){.hide-forced-colors{display:none !important}}';
		}

		return $css;
	}
}
