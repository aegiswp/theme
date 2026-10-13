<?php

// Enforces strict type checking for all code in this file, ensuring type safety for javascript utility helpers.
declare( strict_types=1 );

// Declares the namespace for the javascript utility helpers.
namespace Aegis\Dom;

// Imports classes, interfaces, and functions used by the javascript utility helpers.
use function apply_filters;
use function preg_replace;
use function rtrim;
use function str_replace;
use function trim;

/**
 * JS utility class for handling inline JavaScript.
 *
 * @since 1.0.0
 */
class JS {

    /**
     * Formats an inline JavaScript string.
     *
     * This function performs several operations to clean up and minify the JS string:
     * - Converts double quotes to single quotes.
     * - Trims trailing semicolons.
     * - Collapses whitespace.
     * - Removes invisible characters.
     * - Removes line breaks.
     *
     * @since 1.0.0
     *
     * @param string $js The JavaScript string to format.
     *
     * @return string The formatted JavaScript string.
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
