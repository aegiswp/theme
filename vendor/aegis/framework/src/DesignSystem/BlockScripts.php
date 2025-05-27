<?php
/**
 * BlockScripts.php
 *
 * Handles the block scripts design system logic for the Aegis WordPress theme.
 *
 * @package   Aegis\Framework\DesignSystem
 * @author    Atmostfear Entertainment
 * @copyright Copyright (c) 2025
 * @license   GPL-2.0-or-later
 * @link      https://github.com/aegiswp/theme
 * @since     1.0.0
 */

declare( strict_types=1 );

namespace Aegis\Framework\DesignSystem;

use Aegis\Framework\InlineAssets\Scripts;
use Aegis\Utilities\Debug;
use function str_contains;
use function wp_register_script;

/**
 * Class BlockScripts
 *
 * @since 1.0.0
 */
class BlockScripts {

	/**
	 * The scripts instance
	 *
	 * @var Scripts
	 */
	private Scripts $scripts;

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 *
	 * @param Scripts $scripts
	 *
	 * @return void
	 */
	public function __construct( Scripts $scripts ) {
		$this->scripts = $scripts;
	}

	/**
	 * Register the block scripts
	 *
	 * @since 1.0.0
	 *
	 * @hook  wp_enqueue_scripts
	 *
	 * @return void
	 */
	public function register(): void {
		global $template_html;

		$scripts = [
			'packery'           => 'packery',
			'splide'            => 'splide',
			'splide-autoscroll' => 'data-type="marquee"',
		];

		foreach ( $scripts as $handle => $strings ) {
			if ( ! str_contains( $template_html ?? '', $strings ) ) {
				continue;
			}

			$asset_file = $this->scripts->dir . $handle . '.asset.php';

			if ( ! file_exists( $asset_file ) ) {
				continue;
			}

			$asset = require $asset_file;

			wp_register_script(
				$handle,
				$this->scripts->url . $handle . '.js',
				$asset['dependencies'] ?? [],
				$asset['version'] ?? ( Debug::is_enabled() ? time() : '1.0.0' ),
				true
			);

			wp_enqueue_script( $handle );
		}
	}
}
