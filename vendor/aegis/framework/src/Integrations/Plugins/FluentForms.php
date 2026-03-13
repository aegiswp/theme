<?php
/**
 * FluentForms Integration Component
 *
 * Provides support for integrating Fluent Forms plugin compatibility in the Aegis Framework.
 *
 * Responsibilities:
 * - Checks for Fluent Forms plugin presence and conditionally registers styles
 * - Integrates with the Aegis container and inline assets system
 *
 * @package    Aegis\Framework\Integrations
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 */

// Enforces strict type checking for all code in this file, ensuring type safety for integration components.
declare(strict_types=1);

// Declares the namespace for integration components within the Aegis Framework.
namespace Aegis\Framework\Integrations;

// Imports interfaces and helpers for conditional logic and style registration.
use Aegis\Container\Interfaces\Conditional;
use Aegis\Framework\InlineAssets\Styleable;
use Aegis\Framework\InlineAssets\Styles;
use function add_filter;
use function class_exists;
use function str_contains;

// Implements the FluentForms integration class for the design system.

class FluentForms implements Conditional, Styleable
{

	/**
	 * Condition.
	 *
	 * @since 1.0.0
	 *
	 * @return bool
	 */
	public static function condition(): bool
	{
		return defined('FLUENTFORM') || class_exists('FluentForm\App\Modules\Form\Form');
	}

	/**
	 * Register styles.
	 *
	 * @since 1.0.0
	 *
	 * @param Styles $styles Styles instance.
	 *
	 * @return void
	 */
	public function styles(Styles $styles): void
	{
		$styles->add_file(
			'plugins/fluent-forms.css',
			[
				'fluentform',
				'ff_form',
				'fluent_form',
			]
		);
	}

	/**
	 * Remove the default Fluent Forms styles.
	 *
	 * @since 1.0.0
	 *
	 * @hook  init
	 *
	 * @return void
	 */
	public function remove_default_styles(): void
	{
		// Disables Fluent Forms default styles.
		add_filter('fluentform/load_default_public', '__return_false');
	}

	/**
	 * Set Inherit Theme Style as default template for forms without explicit style settings.
	 *
	 * This allows forms to use theme styling by default while still allowing users
	 * to choose a different style template if desired.
	 *
	 * @since 1.0.0
	 *
	 * @hook  fluentform/rendering_form
	 *
	 * @param object $form The form object.
	 *
	 * @return object
	 */
	public function set_default_theme_style(object $form): object
	{
		if (!class_exists('FluentForm\App\Helpers\Helper')) {
			return $form;
		}

		$form_id = $form->id ?? 0;
		$styler_settings = \FluentForm\App\Helpers\Helper::getFormMeta($form_id, '_form_styler_settings', '');

		// Only set default if no styler settings exist (user has not configured styling).
		if (empty($styler_settings)) {
			$extra_class = $form->settings['layout']['extraClass'] ?? '';

			// Add inherit theme style class if not already present.
			if (!str_contains($extra_class, 'ffs_inherit_theme')) {
				$form->settings['layout']['extraClass'] = trim($extra_class . ' ffs_inherit_theme');
			}
		}

		return $form;
	}
}
