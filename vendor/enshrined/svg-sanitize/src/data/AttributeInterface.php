<?php
/**
 * SVG Attribute Interface
 *
 * This file is used by the SVG-Sanitize library (enshrined/svg-sanitize) as the interface for allowed SVG attributes.
 *
 * Purpose:
 * - Defines the contract for attribute lists used in SVG sanitization.
 * - Used by the Aegis theme as part of its SVG sanitization process.
 *
 * @package    enshrined/svg-sanitize
 * @since      1.0.0
 * @author     enshrined
 * @link       https://github.com/darylldoyle/svg-sanitizer
 *
 * IMPORTANT:
 * - This file is part of a third-party library and may be overwritten on library updates.
 * - For custom interface changes, fork the library or use hooks/filters provided by the Aegis theme or WordPress.
 *
 * For developer documentation and onboarding. No logic or interface changes in this doc update.
 */
namespace enshrined\svgSanitize\data;

/**
 * Class AttributeInterface
 *
 * @package enshrined\svgSanitize\data
 */
interface AttributeInterface
{

    /**
     * Returns an array of attributes
     *
     * @return array
     */
    public static function getAttributes();
}
