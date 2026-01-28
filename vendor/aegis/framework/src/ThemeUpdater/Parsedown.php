<?php
/**
 * Parsedown - Markdown Parser
 *
 * A lightweight Markdown parser for changelog rendering.
 *
 * @package    Aegis\Framework\ThemeUpdater
 * @since      1.0.0
 * @license    MIT
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file.
declare(strict_types=1);

// Declares the namespace for the Markdown parser within the Aegis Framework.
namespace Aegis\Framework\ThemeUpdater;

/**
 * Lightweight Markdown Parser.
 *
 * A minimal Markdown-to-HTML converter designed specifically for
 * rendering GitHub release changelogs. Supports common Markdown
 * elements used in changelogs while maintaining a small footprint.
 *
 * Supported elements:
 * - Headers (h1-h6)
 * - Unordered and ordered lists
 * - Fenced code blocks with language hints
 * - Blockquotes
 * - Horizontal rules
 * - Inline formatting (bold, italic, strikethrough, code)
 * - Links and auto-linked URLs
 *
 * @since 1.0.0
 */
class Parsedown
{
    /**
     * Parser version.
     *
     * @since 1.0.0
     *
     * @var string
     */
    const VERSION = '1.0.0';

    /**
     * Whether line breaks should be converted to <br> tags.
     *
     * @since 1.0.0
     *
     * @var bool
     */
    protected $breaksEnabled = false;

    /**
     * Whether HTML markup should be escaped.
     *
     * @since 1.0.0
     *
     * @var bool
     */
    protected $markupEscaped = false;

    /**
     * Whether URLs should be automatically converted to links.
     *
     * @since 1.0.0
     *
     * @var bool
     */
    protected $urlsLinked = true;

    /**
     * Whether safe mode is enabled (escapes HTML in input).
     *
     * @since 1.0.0
     *
     * @var bool
     */
    protected $safeMode = false;

    /**
     * Storage for link/image reference definitions.
     *
     * @since 1.0.0
     *
     * @var array
     */
    protected $DefinitionData = [];

    /**
     * Convert Markdown text to HTML.
     *
     * Main entry point for parsing. Normalizes line endings,
     * splits into lines, and processes each line according
     * to Markdown rules.
     *
     * @since 1.0.0
     *
     * @param string $text Raw Markdown text.
     *
     * @return string Rendered HTML.
     */
    public function text($text)
    {
        $this->DefinitionData = [];
        $text = str_replace(["\r\n", "\r"], "\n", $text);
        $text = trim($text, "\n");
        $lines = explode("\n", $text);
        $markup = $this->parseLines($lines);
        return trim($markup, "\n");
    }

    /**
     * Enable or disable safe mode.
     *
     * When enabled, HTML entities in the input are escaped
     * to prevent XSS attacks from untrusted content.
     *
     * @since 1.0.0
     *
     * @param bool $safeMode Whether to enable safe mode.
     *
     * @return $this Fluent interface.
     */
    public function setSafeMode($safeMode)
    {
        $this->safeMode = (bool) $safeMode;
        return $this;
    }

    /**
     * Enable or disable automatic line breaks.
     *
     * When enabled, single line breaks in the source are
     * converted to <br> tags in the output.
     *
     * @since 1.0.0
     *
     * @param bool $breaksEnabled Whether to enable line breaks.
     *
     * @return $this Fluent interface.
     */
    public function setBreaksEnabled($breaksEnabled)
    {
        $this->breaksEnabled = $breaksEnabled;
        return $this;
    }

    /**
     * Parse an array of lines into HTML.
     *
     * Processes block-level elements including headers, lists,
     * code blocks, blockquotes, horizontal rules, and paragraphs.
     *
     * @since 1.0.0
     *
     * @param array $lines Array of text lines to parse.
     *
     * @return string Rendered HTML markup.
     */
    protected function parseLines(array $lines)
    {
        $markup = '';
        $inList = false;
        $listType = '';
        $inCodeBlock = false;
        $codeContent = '';
        $codeLanguage = '';

        foreach ($lines as $line) {
            // Fenced code blocks
            if (preg_match('/^```(\w*)/', $line, $matches)) {
                if (!$inCodeBlock) {
                    $inCodeBlock = true;
                    $codeLanguage = $matches[1] ?? '';
                    $codeContent = '';
                    continue;
                } else {
                    $inCodeBlock = false;
                    $class = $codeLanguage ? ' class="language-' . $this->escape($codeLanguage) . '"' : '';
                    $markup .= '<pre><code' . $class . '>' . $this->escape($codeContent) . '</code></pre>' . "\n";
                    continue;
                }
            }

            if ($inCodeBlock) {
                $codeContent .= $line . "\n";
                continue;
            }

            // Empty line - close list
            if (trim($line) === '') {
                if ($inList) {
                    $markup .= '</' . $listType . '>' . "\n";
                    $inList = false;
                }
                continue;
            }

            // Headers
            if (preg_match('/^(#{1,6})\s+(.+)$/', $line, $matches)) {
                if ($inList) {
                    $markup .= '</' . $listType . '>' . "\n";
                    $inList = false;
                }
                $level = strlen($matches[1]);
                $text = $this->parseInline($matches[2]);
                $markup .= '<h' . $level . '>' . $text . '</h' . $level . '>' . "\n";
                continue;
            }

            // Unordered list
            if (preg_match('/^[\*\-\+]\s+(.+)$/', $line, $matches)) {
                if (!$inList || $listType !== 'ul') {
                    if ($inList) {
                        $markup .= '</' . $listType . '>' . "\n";
                    }
                    $markup .= '<ul>' . "\n";
                    $inList = true;
                    $listType = 'ul';
                }
                $markup .= '<li>' . $this->parseInline($matches[1]) . '</li>' . "\n";
                continue;
            }

            // Ordered list
            if (preg_match('/^\d+\.\s+(.+)$/', $line, $matches)) {
                if (!$inList || $listType !== 'ol') {
                    if ($inList) {
                        $markup .= '</' . $listType . '>' . "\n";
                    }
                    $markup .= '<ol>' . "\n";
                    $inList = true;
                    $listType = 'ol';
                }
                $markup .= '<li>' . $this->parseInline($matches[1]) . '</li>' . "\n";
                continue;
            }

            // Blockquote
            if (preg_match('/^>\s*(.*)$/', $line, $matches)) {
                if ($inList) {
                    $markup .= '</' . $listType . '>' . "\n";
                    $inList = false;
                }
                $markup .= '<blockquote>' . $this->parseInline($matches[1]) . '</blockquote>' . "\n";
                continue;
            }

            // Horizontal rule
            if (preg_match('/^[-*_]{3,}$/', trim($line))) {
                if ($inList) {
                    $markup .= '</' . $listType . '>' . "\n";
                    $inList = false;
                }
                $markup .= '<hr>' . "\n";
                continue;
            }

            // Paragraph
            if ($inList) {
                $markup .= '</' . $listType . '>' . "\n";
                $inList = false;
            }
            $markup .= '<p>' . $this->parseInline($line) . '</p>' . "\n";
        }

        // Close any open list
        if ($inList) {
            $markup .= '</' . $listType . '>' . "\n";
        }

        return $markup;
    }

    /**
     * Parse inline Markdown elements.
     *
     * Processes inline formatting including bold, italic,
     * strikethrough, inline code, links, and auto-linked URLs.
     *
     * @since 1.0.0
     *
     * @param string $text Text containing inline Markdown.
     *
     * @return string Text with inline elements converted to HTML.
     */
    protected function parseInline($text)
    {
        // Escape HTML if safe mode.
        if ($this->safeMode) {
            $text = $this->escape($text);
        }

        // Bold **text** or __text__
        $text = preg_replace('/\*\*(.+?)\*\*/', '<strong>$1</strong>', $text);
        $text = preg_replace('/__(.+?)__/', '<strong>$1</strong>', $text);

        // Italic *text* or _text_
        $text = preg_replace('/\*(.+?)\*/', '<em>$1</em>', $text);
        $text = preg_replace('/_(.+?)_/', '<em>$1</em>', $text);

        // Strikethrough ~~text~~
        $text = preg_replace('/~~(.+?)~~/', '<del>$1</del>', $text);

        // Inline code `code`
        $text = preg_replace('/`(.+?)`/', '<code>$1</code>', $text);

        // Links [text](url)
        $text = preg_replace('/\[(.+?)\]\((.+?)\)/', '<a href="$2">$1</a>', $text);

        // Auto-link URLs
        if ($this->urlsLinked) {
            $text = preg_replace(
                '/(?<!["\'>])(https?:\/\/[^\s<]+)/',
                '<a href="$1">$1</a>',
                $text
            );
        }

        return $text;
    }

    /**
     * Escape HTML special characters.
     *
     * Converts special characters to HTML entities to prevent
     * XSS attacks and ensure proper rendering.
     *
     * @since 1.0.0
     *
     * @param string $text Text to escape.
     *
     * @return string Escaped text safe for HTML output.
     */
    protected function escape($text)
    {
        return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
    }
}
