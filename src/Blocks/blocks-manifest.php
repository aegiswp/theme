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
    'usesContext' => 
    array (
      0 => 'postId',
      1 => 'postType',
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
          3 => 'author',
        ),
      ),
      'orderBy' => 
      array (
        'type' => 'string',
        'default' => 'date',
        'enum' => 
        array (
          0 => 'date',
          1 => 'rand',
          2 => 'title',
        ),
      ),
      'order' => 
      array (
        'type' => 'string',
        'default' => 'desc',
        'enum' => 
        array (
          0 => 'asc',
          1 => 'desc',
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
    'style' => 'file:style-index.css',
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
    'style' => 'file:style-index.css',
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
          2 => 'fade',
        ),
      ),
      'perPage' => 
      array (
        'type' => 'number',
        'default' => 1,
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
      'keyboard' => 
      array (
        'type' => 'boolean',
        'default' => true,
      ),
    ),
    'editorScript' => 'file:index.js',
    'style' => 
    array (
      0 => 'file:style-index.css',
      1 => 'splide',
    ),
    'viewScript' => 
    array (
      0 => 'splide',
      1 => 'splide-autoscroll',
      2 => 'file:view.js',
    ),
    'render' => 'file:render.php',
  ),
  'toggle' => 
  array (
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'aegis/toggle',
    'version' => '1.1.0',
    'title' => 'Toggle',
    'category' => 'design',
    'description' => 'A content switcher with two labeled views. Not an accordion — use Accordion List for FAQ sections.',
    'icon' => 'image-flip-horizontal',
    'textdomain' => 'aegis',
    'keywords' => 
    array (
      0 => 'toggle',
      1 => 'switcher',
      2 => 'switch',
      3 => 'content',
      4 => 'compare',
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
      'switchStyle' => 
      array (
        'type' => 'string',
        'default' => 'switch',
        'enum' => 
        array (
          0 => 'pill',
          1 => 'switch',
          2 => 'buttons',
        ),
      ),
      'alignment' => 
      array (
        'type' => 'string',
        'default' => 'center',
        'enum' => 
        array (
          0 => 'left',
          1 => 'center',
          2 => 'right',
        ),
      ),
      'primaryLabel' => 
      array (
        'type' => 'string',
        'default' => '',
      ),
      'secondaryLabel' => 
      array (
        'type' => 'string',
        'default' => '',
      ),
      'initialContent' => 
      array (
        'type' => 'string',
        'default' => 'a',
        'enum' => 
        array (
          0 => 'a',
          1 => 'b',
        ),
      ),
      'animationDuration' => 
      array (
        'type' => 'number',
        'default' => 300,
      ),
      'allowNested' => 
      array (
        'type' => 'boolean',
        'default' => false,
      ),
      'instanceId' => 
      array (
        'type' => 'string',
        'default' => '',
      ),
    ),
    'providesContext' => 
    array (
      'aegis/toggleAllowNested' => 'allowNested',
      'aegis/toggleActiveSlot' => 'initialContent',
    ),
    'example' => 
    array (
      'attributes' => 
      array (
        'primaryLabel' => 'Monthly',
        'secondaryLabel' => 'Yearly',
        'switchStyle' => 'pill',
      ),
      'innerBlocks' => 
      array (
        0 => 
        array (
          'name' => 'aegis/toggle-content',
          'attributes' => 
          array (
            'slot' => 'a',
          ),
          'innerBlocks' => 
          array (
            0 => 
            array (
              'name' => 'core/paragraph',
              'attributes' => 
              array (
                'content' => 'First view.',
              ),
            ),
          ),
        ),
        1 => 
        array (
          'name' => 'aegis/toggle-content',
          'attributes' => 
          array (
            'slot' => 'b',
          ),
          'innerBlocks' => 
          array (
            0 => 
            array (
              'name' => 'core/paragraph',
              'attributes' => 
              array (
                'content' => 'Second view.',
              ),
            ),
          ),
        ),
      ),
    ),
    'editorScript' => 'file:index.js',
    'style' => 'file:style-index.css',
    'viewScript' => 'file:view.js',
    'render' => 'file:render.php',
  ),
  'toggle-content' => 
  array (
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'aegis/toggle-content',
    'version' => '1.1.0',
    'title' => 'Toggle Content',
    'category' => 'design',
    'description' => 'One view in a Toggle content switcher (primary or secondary).',
    'icon' => 'screenoptions',
    'textdomain' => 'aegis',
    'parent' => 
    array (
      0 => 'aegis/toggle',
    ),
    'keywords' => 
    array (
      0 => 'toggle',
      1 => 'content',
      2 => 'switcher',
    ),
    'supports' => 
    array (
      'html' => false,
      'reusable' => false,
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
      'slot' => 
      array (
        'type' => 'string',
        'default' => 'a',
        'enum' => 
        array (
          0 => 'a',
          1 => 'b',
        ),
      ),
    ),
    'usesContext' => 
    array (
      0 => 'aegis/toggleAllowNested',
      1 => 'aegis/toggleActiveSlot',
      2 => 'aegis/toggleDomId',
    ),
    'editorScript' => 'file:index.js',
    'style' => 'file:style-index.css',
    'render' => 'file:render.php',
  ),
);
