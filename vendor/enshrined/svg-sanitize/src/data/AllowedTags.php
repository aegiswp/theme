<?php
/**
 * Allowed SVG Tags List
 *
 * This file is used by the SVG-Sanitize library (enshrined/svg-sanitize) as the definitive list of allowed SVG tags for sanitization.
 *
 * Purpose:
 * - Defines which SVG and HTML tags are permitted to ensure safe and standards-compliant SVG usage.
 * - Used by the Aegis theme as part of its SVG sanitization process.
 *
 * @package    enshrined/svg-sanitize
 * @since      1.0.0
 * @author     enshrined
 * @link       https://github.com/darylldoyle/svg-sanitizer
 *
 * IMPORTANT:
 * - This file is part of a third-party library and may be overwritten on library updates.
 * - For custom tag changes, fork the library or use hooks/filters provided by the Aegis theme or WordPress.
 *
 * For developer documentation and onboarding. No logic or data changes in this doc update.
 */
namespace enshrined\svgSanitize\data;

/**
 * Class AllowedTags
 *
 * @package enshrined\svgSanitize\data
 */
class AllowedTags implements TagInterface
{

    /**
     * Returns an array of tags
     *
     * @return array
     */
    public static function getTags()
    {
        return array (
            // HTML
            'a',
            'font',
            'image',
            'style',

            // SVG
            'svg',
            'altglyph',
            'altglyphdef',
            'altglyphitem',
            'animatecolor',
            'animatemotion',
            'animatetransform',
            'circle',
            'clippath',
            'defs',
            'desc',
            'ellipse',
            'filter',
            'font',
            'g',
            'glyph',
            'glyphref',
            'hkern',
            'image',
            'line',
            'lineargradient',
            'marker',
            'mask',
            'metadata',
            'mpath',
            'path',
            'pattern',
            'polygon',
            'polyline',
            'radialgradient',
            'rect',
            'stop',
            'switch',
            'symbol',
            'text',
            'textpath',
            'title',
            'tref',
            'tspan',
            'use',
            'view',
            'vkern',

            // SVG Filters
            'feBlend',
            'feColorMatrix',
            'feComponentTransfer',
            'feComposite',
            'feConvolveMatrix',
            'feDiffuseLighting',
            'feDisplacementMap',
            'feDistantLight',
            'feFlood',
            'feFuncA',
            'feFuncB',
            'feFuncG',
            'feFuncR',
            'feGaussianBlur',
            'feMerge',
            'feMergeNode',
            'feMorphology',
            'feOffset',
            'fePointLight',
            'feSpecularLighting',
            'feSpotLight',
            'feTile',
            'feTurbulence',

            //text
            '#text'
        );
    }
}
