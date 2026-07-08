<?php
// This file is generated. Do not modify it manually.
return array (
  'countdown' => 
  array (
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'aegis/countdown',
    'version' => '1.0.0',
    'title' => 'Countdown',
    'category' => 'design',
    'description' => 'A countdown timer block that counts down to a specific date and time with customizable segments, labels, and expiry behavior.',
    'icon' => 'clock',
    'textdomain' => 'aegis',
    'keywords' => 
    array (
      0 => 'countdown',
      1 => 'timer',
      2 => 'clock',
      3 => 'deadline',
      4 => 'event',
    ),
    'supports' => 
    array (
      'html' => false,
      'align' => 
      array (
        0 => 'wide',
        1 => 'full',
      ),
      'className' => true,
      'anchor' => true,
      'color' => 
      array (
        'background' => true,
        'text' => true,
      ),
      'spacing' => 
      array (
        'padding' => true,
        'margin' => true,
      ),
      'typography' => 
      array (
        'fontSize' => true,
        'lineHeight' => true,
      ),
    ),
    'attributes' => 
    array (
      'datetime' => 
      array (
        'type' => 'string',
        'default' => '',
      ),
      'showDays' => 
      array (
        'type' => 'boolean',
        'default' => true,
      ),
      'showHours' => 
      array (
        'type' => 'boolean',
        'default' => true,
      ),
      'showMinutes' => 
      array (
        'type' => 'boolean',
        'default' => true,
      ),
      'showSeconds' => 
      array (
        'type' => 'boolean',
        'default' => true,
      ),
      'labels' => 
      array (
        'type' => 'object',
        'default' => 
        array (
          'days' => 'Days',
          'hours' => 'Hours',
          'minutes' => 'Minutes',
          'seconds' => 'Seconds',
        ),
      ),
      'separator' => 
      array (
        'type' => 'string',
        'default' => 'colon',
        'enum' => 
        array (
          0 => 'colon',
          1 => 'dot',
          2 => 'dash',
          3 => 'none',
        ),
      ),
      'layout' => 
      array (
        'type' => 'string',
        'default' => 'inline',
        'enum' => 
        array (
          0 => 'inline',
          1 => 'stacked',
        ),
      ),
      'expiryMessage' => 
      array (
        'type' => 'string',
        'default' => '',
      ),
      'timezone' => 
      array (
        'type' => 'string',
        'default' => 'utc',
        'enum' => 
        array (
          0 => 'utc',
          1 => 'local',
        ),
      ),
      'schemaEnabled' => 
      array (
        'type' => 'boolean',
        'default' => false,
      ),
      'schemaEventName' => 
      array (
        'type' => 'string',
        'default' => '',
      ),
      'schemaEventDescription' => 
      array (
        'type' => 'string',
        'default' => '',
      ),
      'schemaEventLocation' => 
      array (
        'type' => 'string',
        'default' => '',
      ),
      'schemaEventUrl' => 
      array (
        'type' => 'string',
        'default' => '',
      ),
    ),
    'example' => 
    array (
      'attributes' => 
      array (
        'datetime' => '2026-12-31T23:59:59',
        'showDays' => true,
        'showHours' => true,
        'showMinutes' => true,
        'showSeconds' => true,
        'separator' => 'colon',
        'layout' => 'inline',
      ),
    ),
    'editorScript' => 'file:index.js',
    'style' => 'file:style.css',
    'viewScript' => 'file:view.js',
    'render' => 'file:render.php',
  ),
  'related-posts' => 
  array (
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'aegis/related-posts',
    'version' => '1.0.0',
    'title' => 'Related Posts',
    'category' => 'widgets',
    'description' => 'Display posts related to the current content by shared taxonomy terms, with multiple layout variants and fallback options.',
    'icon' => 'admin-links',
    'textdomain' => 'aegis',
    'keywords' => 
    array (
      0 => 'related',
      1 => 'posts',
      2 => 'similar',
      3 => 'recommended',
    ),
    'supports' => 
    array (
      'html' => false,
      'align' => 
      array (
        0 => 'wide',
        1 => 'full',
      ),
      'className' => true,
      'anchor' => true,
      'color' => 
      array (
        'background' => true,
        'text' => true,
      ),
      'spacing' => 
      array (
        'padding' => true,
        'margin' => true,
      ),
    ),
    'attributes' => 
    array (
      'postsPerPage' => 
      array (
        'type' => 'number',
        'default' => 3,
      ),
      'columns' => 
      array (
        'type' => 'number',
        'default' => 3,
      ),
      'showFeaturedImage' => 
      array (
        'type' => 'boolean',
        'default' => true,
      ),
      'showDate' => 
      array (
        'type' => 'boolean',
        'default' => true,
      ),
      'showExcerpt' => 
      array (
        'type' => 'boolean',
        'default' => true,
      ),
      'showCategory' => 
      array (
        'type' => 'boolean',
        'default' => true,
      ),
      'heading' => 
      array (
        'type' => 'string',
        'default' => 'Related Posts',
      ),
      'headingTag' => 
      array (
        'type' => 'string',
        'default' => 'h2',
        'enum' => 
        array (
          0 => 'h2',
          1 => 'h3',
          2 => 'h4',
          3 => 'h5',
          4 => 'h6',
        ),
      ),
      'styleVariant' => 
      array (
        'type' => 'string',
        'default' => 'grid',
        'enum' => 
        array (
          0 => 'grid',
          1 => 'list',
          2 => 'cards',
          3 => 'minimal',
        ),
      ),
      'taxonomySource' => 
      array (
        'type' => 'string',
        'default' => 'auto',
        'enum' => 
        array (
          0 => 'auto',
          1 => 'category',
          2 => 'post_tag',
        ),
      ),
      'fallbackBehavior' => 
      array (
        'type' => 'string',
        'default' => 'latest',
        'enum' => 
        array (
          0 => 'latest',
          1 => 'hide',
        ),
      ),
      'excerptLength' => 
      array (
        'type' => 'number',
        'default' => 20,
      ),
      'imageAspectRatio' => 
      array (
        'type' => 'string',
        'default' => '16/9',
        'enum' => 
        array (
          0 => '16/9',
          1 => '4/3',
          2 => '1/1',
          3 => '3/2',
        ),
      ),
    ),
    'editorScript' => 'file:index.js',
<<<<<<< Updated upstream
    'style' => 'file:style-style.css',
=======
    'style' => 'file:style.css',
>>>>>>> Stashed changes
    'render' => 'file:render.php',
  ),
  'slide' => 
  array (
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'aegis/slide',
    'version' => '1.0.0',
    'title' => 'Slide',
    'category' => 'design',
    'description' => 'A single slide in a slider block.',
    'icon' => 'slides',
    'textdomain' => 'aegis',
    'parent' => 
    array (
      0 => 'aegis/slider',
    ),
    'keywords' => 
    array (
      0 => 'slide',
      1 => 'carousel',
      2 => 'swipe',
    ),
    'supports' => 
    array (
      'html' => false,
      'className' => true,
      'color' => 
      array (
        'background' => true,
        'text' => true,
      ),
      'spacing' => 
      array (
        'padding' => true,
      ),
    ),
    'attributes' => 
    array (
    ),
    'editorScript' => 'file:index.js',
    'style' => 'file:style.css',
    'render' => 'file:render.php',
  ),
  'slider' => 
  array (
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'aegis/slider',
    'version' => '1.0.0',
    'title' => 'Slider',
    'category' => 'design',
    'description' => 'A responsive slider/carousel block powered by Splide.js with multiple layout and navigation options.',
    'icon' => 'slides',
    'textdomain' => 'aegis',
    'keywords' => 
    array (
      0 => 'slider',
      1 => 'carousel',
      2 => 'slideshow',
      3 => 'gallery',
      4 => 'swipe',
    ),
    'supports' => 
    array (
      'html' => false,
      'align' => 
      array (
        0 => 'wide',
        1 => 'full',
      ),
      'className' => true,
      'anchor' => true,
      'spacing' => 
      array (
        'blockGap' => true,
      ),
    ),
    'attributes' => 
    array (
      'type' => 
      array (
        'type' => 'string',
        'default' => 'slider',
        'enum' => 
        array (
          0 => 'slider',
          1 => 'marquee',
        ),
      ),
      'perPage' => 
      array (
        'type' => 'number',
        'default' => 3,
      ),
      'perMove' => 
      array (
        'type' => 'number',
        'default' => 1,
      ),
      'autoplay' => 
      array (
        'type' => 'boolean',
        'default' => false,
      ),
      'pauseOnHover' => 
      array (
        'type' => 'boolean',
        'default' => true,
      ),
      'loop' => 
      array (
        'type' => 'boolean',
        'default' => false,
      ),
      'drag' => 
      array (
        'type' => 'boolean',
        'default' => true,
      ),
      'showArrows' => 
      array (
        'type' => 'boolean',
        'default' => true,
      ),
      'showDots' => 
      array (
        'type' => 'boolean',
        'default' => true,
      ),
      'speed' => 
      array (
        'type' => 'number',
        'default' => 400,
      ),
      'interval' => 
      array (
        'type' => 'number',
        'default' => 5000,
      ),
      'direction' => 
      array (
        'type' => 'string',
        'default' => 'ltr',
        'enum' => 
        array (
          0 => 'ltr',
          1 => 'rtl',
          2 => 'ttb',
        ),
      ),
      'height' => 
      array (
        'type' => 'string',
        'default' => '',
      ),
      'breakpoints' => 
      array (
        'type' => 'boolean',
        'default' => true,
      ),
    ),
    'editorScript' => 'file:index.js',
    'style' => 'file:style.css',
    'viewScript' => 
    array (
      0 => 'file:view.js',
      1 => 'splide',
      2 => 'splide-autoscroll',
    ),
    'render' => 'file:render.php',
  ),
  'toggle' => 
  array (
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'aegis/toggle',
    'version' => '1.0.0',
    'title' => 'Toggle',
    'category' => 'design',
    'description' => 'An accessible accordion/toggle block with expandable content sections.',
    'icon' => 'arrow-down-alt2',
    'textdomain' => 'aegis',
    'keywords' => 
    array (
      0 => 'toggle',
      1 => 'accordion',
      2 => 'collapse',
      3 => 'expand',
      4 => 'faq',
    ),
    'supports' => 
    array (
      'html' => false,
      'align' => 
      array (
        0 => 'wide',
        1 => 'full',
      ),
      'className' => true,
      'anchor' => true,
      'color' => 
      array (
        'background' => true,
        'text' => true,
      ),
      'spacing' => 
      array (
        'padding' => true,
        'margin' => true,
      ),
    ),
    'attributes' => 
    array (
      'heading' => 
      array (
        'type' => 'string',
        'default' => '',
      ),
      'headingTag' => 
      array (
        'type' => 'string',
        'default' => 'h3',
        'enum' => 
        array (
          0 => 'h2',
          1 => 'h3',
          2 => 'h4',
          3 => 'h5',
          4 => 'h6',
          5 => 'p',
        ),
      ),
      'isOpen' => 
      array (
        'type' => 'boolean',
        'default' => false,
      ),
      'iconPosition' => 
      array (
        'type' => 'string',
        'default' => 'right',
        'enum' => 
        array (
          0 => 'left',
          1 => 'right',
        ),
      ),
      'iconType' => 
      array (
        'type' => 'string',
        'default' => 'chevron',
        'enum' => 
        array (
          0 => 'chevron',
          1 => 'plus',
          2 => 'arrow',
        ),
      ),
      'allowMultiple' => 
      array (
        'type' => 'boolean',
        'default' => true,
      ),
      'animationDuration' => 
      array (
        'type' => 'number',
        'default' => 300,
      ),
      'faqSchema' => 
      array (
        'type' => 'boolean',
        'default' => false,
      ),
    ),
    'example' => 
    array (
      'attributes' => 
      array (
        'heading' => 'Toggle heading',
      ),
      'innerBlocks' => 
      array (
        0 => 
        array (
          'name' => 'aegis/toggle-content',
          'innerBlocks' => 
          array (
            0 => 
            array (
              'name' => 'core/paragraph',
              'attributes' => 
              array (
                'content' => 'Toggle content goes here.',
              ),
            ),
          ),
        ),
      ),
    ),
    'editorScript' => 'file:index.js',
    'style' => 'file:style.css',
    'viewScript' => 'file:view.js',
    'render' => 'file:render.php',
  ),
  'toggle-content' => 
  array (
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'aegis/toggle-content',
    'version' => '1.0.0',
    'title' => 'Toggle Content',
    'category' => 'design',
    'description' => 'Content area for the toggle block.',
    'icon' => 'arrow-down-alt2',
    'textdomain' => 'aegis',
    'parent' => 
    array (
      0 => 'aegis/toggle',
    ),
    'keywords' => 
    array (
      0 => 'toggle',
      1 => 'content',
      2 => 'accordion',
    ),
    'supports' => 
    array (
      'html' => false,
      'className' => true,
      'color' => 
      array (
        'background' => true,
        'text' => true,
      ),
      'spacing' => 
      array (
        'padding' => true,
      ),
    ),
    'attributes' => 
    array (
    ),
    'editorScript' => 'file:index.js',
    'style' => 'file:style.css',
    'render' => 'file:render.php',
  ),
<<<<<<< Updated upstream
  'video' => 
  array (
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'aegis/video',
    'version' => '1.0.0',
    'title' => 'Video',
    'category' => 'media',
    'description' => 'An enhanced video block with custom player controls and accessibility features.',
    'icon' => 'video-alt3',
    'textdomain' => 'aegis',
    'keywords' => 
    array (
      0 => 'video',
      1 => 'media',
      2 => 'player',
      3 => 'embed',
    ),
    'supports' => 
    array (
      'html' => false,
      'align' => 
      array (
        0 => 'wide',
        1 => 'full',
      ),
      'className' => true,
      'anchor' => true,
    ),
    'attributes' => 
    array (
      'src' => 
      array (
        'type' => 'string',
        'default' => '',
      ),
      'poster' => 
      array (
        'type' => 'string',
        'default' => '',
      ),
      'caption' => 
      array (
        'type' => 'string',
        'default' => '',
      ),
      'autoplay' => 
      array (
        'type' => 'boolean',
        'default' => false,
      ),
      'loop' => 
      array (
        'type' => 'boolean',
        'default' => false,
      ),
      'muted' => 
      array (
        'type' => 'boolean',
        'default' => false,
      ),
      'controls' => 
      array (
        'type' => 'boolean',
        'default' => true,
      ),
      'preload' => 
      array (
        'type' => 'string',
        'default' => 'metadata',
        'enum' => 
        array (
          0 => 'auto',
          1 => 'metadata',
          2 => 'none',
        ),
      ),
      'playsInline' => 
      array (
        'type' => 'boolean',
        'default' => true,
      ),
    ),
    'editorScript' => 'file:index.js',
    'style' => 'file:style.css',
  ),
=======
>>>>>>> Stashed changes
);
