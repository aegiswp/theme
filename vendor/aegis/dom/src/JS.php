<?php
/**
 * JS Utilities
 *
 * Provides utility functions for JavaScript string formatting and manipulation.
 *
 * Responsibilities:
 * - Formats and minifies inline JavaScript strings
 * - Provides helper methods for JavaScript code handling
 *
 * @package    Aegis\Dom
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this doc update.
 */

declare( strict_types=1 );

namespace Aegis\Dom;

use function apply_filters;
use function preg_replace;
use function rtrim;
use function str_replace;
use function trim;

/**
 * JS Utility.
 *
 * @since 1.0.0
 */
class JS {

    /**
     * Formats inline JS.
     *
     * @since 1.0.0
     *
     * @param string $js JS.
     *
     * @return string
     */
    public static function format_inline_js( string $js ): string {

        // Correct double quotes to single quotes.
        $js = str_replace( '"', "'", $js );

        // Trim trailing semicolon.
        $js = trim( rtrim( $js, ';' ) );

        // Remove whitespace.
        $js = preg_replace( '/\s+/', ' ', $js );

        // Remove zero width spaces and other invisible characters.
        $js = preg_replace( '/^[\pZ\pC]+|[\pZ\pC]+$/u', '', $js );

        // Replace line breaks.
        $js = str_replace( [ "\r", "\n", PHP_EOL, ], '', $js
        );

        /**
         * Allows additional minification of inline JS. (Eg JShrink).
         *
         * @var string $js Formatted JS.
         */
        $js = apply_filters( 'aegis_format_inline_js', $js );

        return $js;
    }
}
