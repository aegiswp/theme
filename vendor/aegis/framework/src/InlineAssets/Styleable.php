<?php
/**
 * Styleable.php
 *
 * Interface for classes that handle style registration in the Aegis WordPress theme.
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
 * Styleable interface.
 *
 * @since 1.0.0
 */
interface Styleable {

	/**
	 * Register styles.
	 *
	 * @since 1.0.0
	 *
	 * @param Styles $styles Inlinable service.
	 *
	 * @return void
	 */
	public function styles( Styles $styles ): void;

}
