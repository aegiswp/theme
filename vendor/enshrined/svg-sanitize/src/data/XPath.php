<?php
/**
 * SVG XPath Utility
 *
 * This file is used by the SVG-Sanitize library (enshrined/svg-sanitize) to provide XPath expressions and utilities for SVG sanitization.
 *
 * Purpose:
 * - Defines and manages XPath queries used for filtering and validating SVG content.
 * - Used by the Aegis theme as part of its SVG sanitization process.
 *
 * @package    enshrined/svg-sanitize
 * @since      1.0.0
 * @author     enshrined
 * @link       https://github.com/darylldoyle/svg-sanitizer
 *
 * IMPORTANT:
 * - This file is part of a third-party library and may be overwritten on library updates.
 * - For custom XPath changes, fork the library or use hooks/filters provided by the Aegis theme or WordPress.
 *
 * For developer documentation and onboarding. No logic or XPath changes in this doc update.
 */
namespace enshrined\svgSanitize\data;

class XPath extends \DOMXPath
{
    const DEFAULT_NAMESPACE_PREFIX = 'svg';

    /**
     * @var string
     */
    protected $defaultNamespaceURI;

    public function __construct(\DOMDocument $doc)
    {
        parent::__construct($doc);
        $this->handleDefaultNamespace();
    }

    /**
     * @param string $nodeName
     * @return string
     */
    public function createNodeName($nodeName)
    {
        if (empty($this->defaultNamespaceURI)) {
            return $nodeName;
        }
        return self::DEFAULT_NAMESPACE_PREFIX . ':' . $nodeName;
    }

    protected function handleDefaultNamespace()
    {
        $rootElements = $this->getRootElements();

        if (count($rootElements) !== 1) {
            throw new \LogicException(
                sprintf('Got %d svg elements, expected exactly one', count($rootElements)),
                1570870568
            );
        }
        $this->defaultNamespaceURI = (string)$rootElements[0]->namespaceURI;

        if ($this->defaultNamespaceURI !== '') {
            $this->registerNamespace(self::DEFAULT_NAMESPACE_PREFIX, $this->defaultNamespaceURI);
        }
    }

    /**
     * @return \DOMElement[]
     */
    protected function getRootElements()
    {
        $rootElements = [];
        $elements = $this->document->getElementsByTagName('svg');
        /** @var \DOMElement $element */
        foreach ($elements as $element) {
            if ($element->parentNode !== $this->document) {
                continue;
            }
            $rootElements[] = $element;
        }
        return $rootElements;
    }
}
