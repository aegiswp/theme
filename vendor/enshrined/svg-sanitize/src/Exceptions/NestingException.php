<?php
/**
 * SVG Nesting Exception
 *
 * This file is used by the SVG-Sanitize library (enshrined/svg-sanitize) to represent exceptions related to excessive nesting during SVG sanitization.
 *
 * Purpose:
 * - Provides a custom exception for handling nesting limit violations in SVG documents.
 * - Used by the Aegis theme as part of its SVG sanitization process.
 *
 * @package    enshrined/svg-sanitize
 * @since      1.0.0
 * @author     enshrined
 * @link       https://github.com/darylldoyle/svg-sanitizer
 *
 * IMPORTANT:
 * - This file is part of a third-party library and may be overwritten on library updates.
 * - For custom exception changes, fork the library or use hooks/filters provided by the Aegis theme or WordPress.
 *
 * For developer documentation and onboarding. No logic or exception changes in this doc update.
 */
namespace enshrined\svgSanitize\Exceptions;

use Exception;

class NestingException extends \Exception
{
    /**
     * @var \DOMElement
     */
    protected $element;

    /**
     * NestingException constructor.
     *
     * @param string           $message
     * @param int              $code
     * @param Exception|null   $previous
     * @param \DOMElement|null $element
     */
    public function __construct($message = "", $code = 0, Exception $previous = null, \DOMElement $element = null)
    {
        $this->element = $element;
        parent::__construct($message, $code, $previous);
    }

    /**
     * Get the element that caused the exception.
     *
     * @return \DOMElement
     */
    public function getElement()
    {
        return $this->element;
    }
}
