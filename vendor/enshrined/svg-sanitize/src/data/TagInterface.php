<?php
/**
 * SVG Tag Interface
 *
 * This file is used by the SVG-Sanitize library (enshrined/svg-sanitize) as the interface for allowed SVG tags.
 *
 * Purpose:
 * - Defines the contract for tag lists used in SVG sanitization.
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
 * Interface TagInterface
 *
 * @package enshrined\svgSanitize\tags
 */
interface TagInterface
{

    /**
     * Returns an array of tags
     *
     * @return array
     */
    public static function getTags();

}