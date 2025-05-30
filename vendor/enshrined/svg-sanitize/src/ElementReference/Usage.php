<?php
/**
 * SVG Element Reference Usage
 *
 * This file is used by the SVG-Sanitize library (enshrined/svg-sanitize) to represent element reference usage for SVG sanitization.
 *
 * Purpose:
 * - Encapsulates logic for tracking and managing usage counts of SVG element references.
 * - Used by the Aegis theme as part of its SVG sanitization process.
 *
 * @package    enshrined/svg-sanitize
 * @since      1.0.0
 * @author     enshrined
 * @link       https://github.com/darylldoyle/svg-sanitizer
 *
 * IMPORTANT:
 * - This file is part of a third-party library and may be overwritten on library updates.
 * - For custom usage changes, fork the library or use hooks/filters provided by the Aegis theme or WordPress.
 *
 * For developer documentation and onboarding. No logic or usage changes in this doc update.
 */
namespace enshrined\svgSanitize\ElementReference;

class Usage
{
    /**
     * @var Subject
     */
    protected $subject;

    /**
     * @var int
     */
    protected $count;

    /**
     * @param Subject $subject
     * @param int $count
     */
    public function __construct(Subject $subject, $count = 1)
    {
        $this->subject = $subject;
        $this->count = (int)$count;
    }

    /**
     * @param int $by
     */
    public function increment($by = 1)
    {
        $this->count += (int)$by;
    }

    /**
     * @return Subject
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }
}
