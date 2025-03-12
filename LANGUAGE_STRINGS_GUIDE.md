# WordPress Theme Language Strings Guide

This guide outlines the best practices for implementing language strings in WordPress theme patterns according to the WordPress Theme Handbook standards.

## Basic Principles

1. **All user-facing text should be translatable**
2. **Provide context for translators when necessary**
3. **Use appropriate escaping functions**
4. **Maintain consistent text domain usage**

## WordPress Internationalization Functions

### For Regular Text

```php
// Basic translation
esc_html__( 'Text to translate', 'aegis' )

// Translation with context (recommended for short or ambiguous strings)
esc_html_x( 'Text to translate', 'Context for translators', 'aegis' )
```

### For HTML Content

```php
// For text containing HTML that needs to be preserved
wp_kses_post( __( '<strong>Bold</strong> text', 'aegis' ) )

// For HTML content with context
wp_kses_post( _x( '<strong>Bold</strong> text', 'Context for translators', 'aegis' ) )
```

### For Attributes

```php
// For HTML attributes
esc_attr__( 'Attribute value', 'aegis' )

// For HTML attributes with context
esc_attr_x( 'Attribute value', 'Context for translators', 'aegis' )
```

## Pattern Implementation Examples

### Pattern Metadata

```php
<!-- wp:group {"metadata":{"name":"<?php echo esc_html_x( 'Pattern Name', 'Name of the pattern', 'aegis' ); ?>","categories":["<?php echo esc_html_x( 'category-name', 'Name of the category', 'aegis' ); ?>"]}} -->
```

### Headings and Paragraphs

```php
<!-- wp:heading -->
<h2><?php echo esc_html_x( 'Heading Text', 'Heading with character limit guidance', 'aegis' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php echo esc_html_x( 'Paragraph text goes here.', 'Paragraph with character limit guidance', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
```

### HTML Content

```php
<!-- wp:paragraph -->
<p><?php echo wp_kses_post( _x( 'Text with <strong>HTML</strong> formatting.', 'Context for translators', 'aegis' ) ); ?></p>
<!-- /wp:paragraph -->
```

### Buttons and Links

```php
<!-- wp:button -->
<div class="wp-block-button">
    <a class="wp-block-button__link" href="#">
        <?php echo esc_html_x( 'Button Text', 'Button text (10-20 characters recommended)', 'aegis' ); ?>
    </a>
</div>
<!-- /wp:button -->
```

### Images and Alt Text

```php
<!-- wp:image -->
<figure class="wp-block-image">
    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/image.jpg" 
         alt="<?php echo esc_attr__( 'Descriptive alt text for the image', 'aegis' ); ?>" />
</figure>
<!-- /wp:image -->
```

### Form Elements

```php
<!-- wp:search {"label":"<?php echo esc_attr__('Search', 'aegis'); ?>","placeholder":"<?php echo esc_attr__('Search...', 'aegis'); ?>","buttonText":"<?php echo esc_attr__('Search', 'aegis'); ?>"} /-->
```

## Best Practices for Context

1. **Be specific**: Provide clear context about where and how the string is used
2. **Include character limits**: For design-sensitive areas, include recommended character limits
3. **Describe purpose**: Explain the purpose of the text (e.g., "Call-to-action button text")
4. **Maintain consistency**: Use similar context descriptions for similar types of content

## Example Context Descriptions

- `'Main heading (20-40 characters recommended)'`
- `'Call-to-action button text (10-15 characters recommended)'`
- `'Product description (50-80 characters recommended)'`
- `'Image alt text describing the product'`
- `'Pagination previous page button text'`

By following these guidelines, you ensure that your theme is fully translatable and provides clear context for translators, making it more accessible to a global audience. 