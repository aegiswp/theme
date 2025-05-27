<?php
/**
 * Scriptable.php
 *
 * Interface for classes that handle script registration in the Aegis WordPress theme.
 *
 * @package   Aegis\Framework\InlineAssets
 * @author    Atmostfear Entertainment
 * @copyright Copyright (c) 2025
 * @license   GPL-2.0-or-later
 * @link      https://github.com/aegiswp/theme
 * @since     1.0.0
 */

declare( strict_types=1 );

namespace Aegis\Framework\InlineAssets;

/**
 * Scriptable interface.
 *
 * @since 1.0.0
 */
interface Scriptable {

	/**
	 * Register scripts.
	 *
	 * @since 1.0.0
	 *
	 * @param Scripts $scripts Inlinable service.
	 *
	 * @return void
	 */
	public function scripts( Scripts $scripts ): void;

}
