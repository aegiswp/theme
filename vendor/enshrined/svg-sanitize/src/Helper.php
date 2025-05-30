<?php
/**
 * SVG Helper Utility
 *
 * This file is used by the SVG-Sanitize library (enshrined/svg-sanitize) to provide helper methods for SVG sanitization.
 *
 * Purpose:
 * - Provides static utility functions for handling SVG elements and references.
 * - Used by the Aegis theme as part of its SVG sanitization process.
 *
 * @package    enshrined/svg-sanitize
 * @since      1.0.0
 * @author     enshrined
 * @link       https://github.com/darylldoyle/svg-sanitizer
 *
 * IMPORTANT:
 * - This file is part of a third-party library and may be overwritten on library updates.
 * - For custom helper changes, fork the library or use hooks/filters provided by the Aegis theme or WordPress.
 *
 * For developer documentation and onboarding. No logic or helper changes in this doc update.
 */
namespace enshrined\svgSanitize;

class Helper
{
    /**
     * @param \DOMElement $element
     * @return string|null
     */
    public static function getElementHref(\DOMElement $element)
    {
        if ($element->hasAttribute('href')) {
            return $element->getAttribute('href');
        }
        if ($element->hasAttributeNS('http://www.w3.org/1999/xlink', 'href')) {
            return $element->getAttributeNS('http://www.w3.org/1999/xlink', 'href');
        }
        return null;
    }

    /**
     * @param string $href
     * @return string|null
     */
    public static function extractIdReferenceFromHref($href)
    {
        if (!is_string($href) || strpos($href, '#') !== 0) {
            return null;
        }
        return substr($href, 1);
    }

    /**
     * @param \DOMElement $needle
     * @param \DOMElement $haystack
     * @return bool
     */
    public static function isElementContainedIn(\DOMElement $needle, \DOMElement $haystack)
    {
        if ($needle === $haystack) {
            return true;
        }
        foreach ($haystack->childNodes as $childNode) {
            if (!$childNode instanceof \DOMElement) {
                continue;
            }
            if (self::isElementContainedIn($needle, $childNode)) {
                return true;
            }
        }
        return false;
    }
}
