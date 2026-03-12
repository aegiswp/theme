<?php
/**
 * Countdown Block Registration
 *
 * Registers the Countdown block with WordPress.
 *
 * Responsibilities:
 * - Registers the aegis/countdown block using block.json metadata
 * - Checks the admin conditional-logic settings before registration
 *   so the block can be disabled per-site
 * - Provides countdown timer functionality with customizable segments,
 *   labels, separator styles, and expiry behavior
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

// Imports functions used throughout this file.
use Aegis\Framework\ServiceProvider;
use function add_filter;
use function class_exists;
use function file_exists;
use function get_template_directory;
use function register_block_type;
use function wp_json_encode;

/**
 * Countdown block.
 *
 * Handles registration for the aegis/countdown block. The block
 * provides a countdown timer targeting a specific date and time with
 * customisable segments (days, hours, minutes, seconds), labels,
 * separator styles, and expiry behaviour. Pro features such as
 * recurring countdowns are extended via the aegis-pro plugin.
 *
 * Registration is gated behind the admin conditional-logic settings
 * so site owners can disable the block without code changes.
 *
 * @since 1.0.0
 */
class Countdown
{
	/**
	 * Register the countdown block with WordPress.
	 *
	 * Checks whether the block is enabled in the admin
	 * conditional-logic settings, then verifies that the
	 * `block.json` file exists in the theme's `src/Blocks/countdown`
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
		if ( ! ServiceProvider::is_block_enabled( 'countdown' ) ) {
			return;
		}

		$block_path = get_template_directory() . '/src/Blocks/countdown';

		if (!file_exists($block_path . '/block.json')) {
			return;
		}

		register_block_type($block_path);

		add_filter('render_block_aegis/countdown', [$this, 'append_schema'], 10, 2);
	}

	/**
	 * Append Schema.org Event JSON-LD to countdown block output.
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

		if ( ! ServiceProvider::is_block_enabled( 'countdown_schema' ) ) {
			return $content;
		}

		if ( ServiceProvider::is_schema_handled_by_rank_math( 'rank_math_event_schema' ) ) {
			return $content;
		}

		$schema_html = $this->render_schema($attrs);

		return $content . $schema_html;
	}

	/**
	 * Generate Schema.org Event JSON-LD markup.
	 *
	 * @since 1.0.0
	 *
	 * @param array $attrs Block attributes.
	 *
	 * @return string JSON-LD script tag or empty string.
	 */
	private function render_schema(array $attrs): string
	{
		$datetime = $attrs['datetime'] ?? '';
		$name     = $attrs['schemaEventName'] ?? '';

		if (empty($datetime) || empty($name)) {
			return '';
		}

		$schema = [
			'@context'  => 'https://schema.org',
			'@type'     => 'Event',
			'name'      => $name,
			'startDate' => $datetime,
		];

		if (!empty($attrs['schemaEventDescription'])) {
			$schema['description'] = $attrs['schemaEventDescription'];
		}

		if (!empty($attrs['schemaEventUrl'])) {
			$schema['url'] = $attrs['schemaEventUrl'];
		}

		if (!empty($attrs['schemaEventLocation'])) {
			$schema['location'] = [
				'@type' => 'Place',
				'name'  => $attrs['schemaEventLocation'],
			];
		}

		return '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES) . '</script>';
	}
}
