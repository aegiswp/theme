<?php
/**
 * I18n.php
 *
 * Utility class for internationalization in the Aegis WordPress theme.
 *
 * Handles loading of the plugin/theme textdomain for translations.
 *
 * @package   Aegis\Utilities
 * @author    Atmostfear Entertainment
 * @copyright Copyright (c) 2025
 * @license   GPL-2.0-or-later
 * @link      https://github.com/aegiswp/theme
 * @since     1.0.0
 */

declare( strict_types=1 );

namespace Aegis\Utilities;

use Aegis\Utilities\Data;
use function load_plugin_textdomain;

/**
 * Class I18n.
 *
 * @since 1.0.0
 */
class I18n {

	private Data $plugin;

	/**
	 * I18n constructor.
	 *
	 * @since 1.0.0
	 *
	 * @param Data $plugin Plugin instance.
	 *
	 * @return void
	 */
	public function __construct( Data $plugin ) {
		$this->plugin = $plugin;
	}

	/**
	 * Loads plugin textdomain.
	 *
	 * @since 1.0.0
	 *
	 * @hook  plugins_loaded
	 *
	 * @return void
	 */
	public function load_textdomain(): void {
		load_plugin_textdomain(
			$this->plugin->slug,
			false,
			$this->plugin->dir . $this->plugin->domain_path
		);
	}

}
