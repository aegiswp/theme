<?php
/**
 * JS Utility Class
 *
 * Provides helper methods for formatting and manipulating JavaScript code
 * within the Aegis Framework.
 *
 * Responsibilities:
 * - Formats inline JavaScript for safer and cleaner output
 * - Assists with JavaScript string and code manipulations for theme and plugin development
 *
 * @package    Aegis\Dom
 * @since      1.0.0
 * @author     @atmostfear-entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for JS utilities.
declare( strict_types=1 );

// Declares the namespace for JS utilities within the Aegis Framework.
namespace Aegis\Dom;

// Imports PHP built-in functions and WordPress helpers used by the JS utility class.
use function apply_filters;
use function preg_replace;
use function rtrim;
use function str_replace;
use function trim;

// Implements a utility class for JavaScript manipulation and formatting.

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
