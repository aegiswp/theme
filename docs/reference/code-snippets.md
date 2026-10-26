# Code Snippets

Copy-paste examples for every public hook in the Aegis theme. Each snippet is a working example you can adapt.

For the hooks themselves (file, arguments, and when they run), see [Hooks and Filters](hooks-and-filters.md).

## Where to Put Snippets

Add snippets through a plugin, not a theme's `functions.php`. Code in a plugin survives theme updates and keeps working if you switch themes.

### Aegis Code Snippets (recommended)

The free Aegis plugin has a built-in [Code Snippets](../../../../plugins/aegis/docs/features/code-snippets.md) screen:

1. Go to **Aegis → Code Snippets → Settings** and turn on **PHP Enabled**.
2. Add a snippet and choose the **Functions (PHP)** type.
3. Paste the code, leave **Where to run** on **Everywhere** (or pick **Frontend only** or **Admin only**), turn the snippet on, and save.

Functions snippets run early on `init`. A snippet that hooks something WordPress or the theme runs before `init` (for example `after_setup_theme`) belongs in a site-specific plugin instead. If a snippet causes a fatal error, Safe Mode pauses snippets so you can fix it.

### A Site-Specific Plugin

Create `wp-content/plugins/my-site-snippets/my-site-snippets.php`:

```php
<?php
/**
 * Plugin Name: My Site Snippets
 * Description: Custom code for this site.
 */

defined( 'ABSPATH' ) || exit;

// Paste snippets below.
```

Activate **My Site Snippets** under **Plugins**, then paste each snippet at the end of the file. Any other code snippets plugin works too.

> Snippets that call `add_filter()` must **return** a value. Test on a staging site first.

---

## Updates

### Update From a Fork or Mirror

`aegis_theme_update_repository` — the GitHub repository (`owner/name`) checked for theme updates. Default: `aegiswp/theme`.

```php
add_filter( 'aegis_theme_update_repository', function ( string $repository ): string {
	return 'my-agency/aegis-theme';
} );
```

The repository's latest release must include an `aegis.zip` asset with an `aegis/` folder inside.

### Install the Companion Plugin From a Pinned Release

`aegis_companion_package_url` — the zip the companion plugin notice installs. Default: the `aegis.zip` package of the latest plugin release.

```php
add_filter( 'aegis_companion_package_url', function ( string $package ): string {
	return 'https://example.com/downloads/aegis-1.0.0.zip'; // Your own copy of the release zip.
} );
```

---

## Dark Mode

### Turn Off Dark Mode

`aegis_dark_mode` — return `false` to remove dark mode from the front end and hide the editor's light/dark preview toggle.

```php
add_filter( 'aegis_dark_mode', '__return_false' );
```

### Start in Dark Mode

`aegis_default_mode` — the starting color mode: `light` or `dark`. Visitors who chose a mode keep their choice.

```php
add_filter( 'aegis_default_mode', function ( string $mode, array $global_settings ): string {
	return 'dark';
}, 10, 2 );
```

---

## Patterns

### Hide a Theme Pattern

`aegis_patterns` — the pattern list before registration, as `category => [ slug => file ]`.

```php
add_filter( 'aegis_patterns', function ( array $categories ): array {
	unset( $categories['hero']['video'] );   // patterns/hero/video.php
	unset( $categories['event'] );           // the whole Event category
	return $categories;
} );
```

### Add Your Own Pattern Folder

`aegis_pattern_dirs` — folders scanned for patterns. Each subfolder becomes a category, and each `.php` file a pattern.

```php
add_filter( 'aegis_pattern_dirs', function ( array $dirs ): array {
	$dirs[] = get_stylesheet_directory() . '/patterns';
	return $dirs;
} );
```

---

## Template Parts and Layout Hooks

### Swap a Template Part on Some Pages

`aegis_dynamic_template_part_slug` — change which template part renders. Receives the slug and the parsed block.

```php
add_filter( 'aegis_dynamic_template_part_slug', function ( string $slug, array $parsed_block ): string {
	if ( 'header' === $slug && is_page( 'landing' ) ) {
		return 'header-minimal'; // parts/header-minimal.html must exist in the theme.
	}
	return $slug;
}, 10, 2 );
```

### Add Content Before or After a Template Part

`aegis_before_{slug}` and `aegis_after_{slug}` run around every template part, for example `aegis_before_header` and `aegis_after_footer`.

```php
add_action( 'aegis_before_header', function (): void {
	echo '<div class="site-announcement">Free shipping on orders over $50.</div>';
} );
```

### Add Content Before or After Post Content

`aegis_before_content` and `aegis_after_content` run around the Post Content block.

```php
add_action( 'aegis_after_content', function (): void {
	if ( is_singular( 'post' ) ) {
		echo do_blocks( '<!-- wp:pattern {"slug":"cta-newsletter"} /-->' );
	}
} );
```

### Add a LearnDash Focus Mode Header

`aegis_learndash_focus_header` and `aegis_learndash_focus_footer` run in LearnDash Focus Mode. They receive the course ID.

```php
add_action( 'aegis_learndash_focus_header', function ( int $course_id ): void {
	printf( '<p class="course-banner">%s</p>', esc_html( get_the_title( $course_id ) ) );
} );
```

---

## Template Tags and Reading Time

### Add a Template Tag

`aegis_template_tags` — values for `{tag}` placeholders in text blocks, for example `{year}` or `{site_title}`. Receives the tags and the current post ID.

```php
add_filter( 'aegis_template_tags', function ( array $tags, $post_id ): array {
	$tags['support_email'] = 'help@example.com'; // Use {support_email} in any paragraph.
	return $tags;
}, 10, 2 );
```

### Let Template Tags Print Another Post Field

`aegis_template_tag_post_fields` — the post fields that `{field}` tags can print, for example `{post_title}`. The default list is `post_author`, `post_date`, `post_date_gmt`, `post_title`, `post_excerpt`, `post_status`, `post_name`, `post_modified`, `post_modified_gmt`, `post_parent`, `post_type`, and `comment_count`.

```php
add_filter( 'aegis_template_tag_post_fields', function ( array $fields ): array {
	$fields[] = 'menu_order'; // Use {menu_order} in any paragraph.
	return $fields;
} );
```

Custom fields work as tags too, except names that start with `_`. Tags print nothing for password-protected posts or posts the visitor cannot read. Do not add `post_password` or `post_content`.

### Change Reading Speed

`aegis_words_per_minute` — words per minute used for reading time. Default: 200.

```php
add_filter( 'aegis_words_per_minute', function (): int {
	return 250;
} );
```

### Use an H3 for the Comment Form Title

`aegis_comments_form_title_tag` — the "Leave a Reply" heading tag. Default: `h4`.

```php
add_filter( 'aegis_comments_form_title_tag', function (): string {
	return 'h3';
} );
```

---

## Related Posts

`aegis_related_posts_query` — `WP_Query` arguments for the Related Posts block. The context is `block`, `block-fallback` (second query when too few results), or `block-preview` (editor).

```php
add_filter( 'aegis_related_posts_query', function ( array $args, int $post_id, string $context ): array {
	$args['date_query'] = array( array( 'after' => '1 year ago' ) ); // Only recent posts.
	return $args;
}, 10, 3 );
```

---

## Assets and Styles

### Add Inline CSS

`aegis_inline_css` — the theme's inline CSS, printed once per page. Arguments: CSS, template HTML, whether all assets load, and the asset class.

```php
add_filter( 'aegis_inline_css', function ( string $css ): string {
	return $css . '.site-announcement{padding:.5rem;text-align:center;background:var(--wp--preset--color--primary-500);color:#fff}';
} );
```

### Add Inline JavaScript

`aegis_inline_js` — same as above, for the theme's inline script.

```php
add_filter( 'aegis_inline_js', function ( string $js ): string {
	return $js . 'document.documentElement.classList.add("js-ready");';
} );
```

### Load Every Script or Style on Every Page

`aegis_load_all_scripts` and `aegis_load_all_styles` — Aegis normally loads only the CSS and JS a page needs. Return `true` to load everything (useful when content is added by JavaScript after the page loads).

```php
add_filter( 'aegis_load_all_styles', '__return_true' );
add_filter( 'aegis_load_all_scripts', '__return_true' );
```

### Tell Aegis About Extra Markup

`aegis_template_html` — the page HTML Aegis scans to decide which assets to load. Add markup that is printed outside the blocks so its CSS loads.

```php
add_filter( 'aegis_template_html', function ( string $html ): string {
	return $html . '<div class="is-style-surface"></div>';
} );
```

### Change Inline JavaScript Formatting

`aegis_format_inline_js` — runs on inline JavaScript before output (Aegis Pro uses it to minify).

```php
add_filter( 'aegis_format_inline_js', function ( string $js ): string {
	return trim( $js );
} );
```

### Add or Change CSS Custom Properties

`aegis_dynamic_custom_properties` — the `--wp--…` custom properties Aegis generates from global styles. Receives the properties and the global styles.

```php
add_filter( 'aegis_dynamic_custom_properties', function ( array $styles, array $global_styles ): array {
	$styles['--wp--custom--header--height'] = '72px';
	return $styles;
}, 10, 2 );
```

### Change the System Font Stacks

`aegis_system_fonts` — the Sans Serif, Serif, and Monospace system stacks offered in typography settings.

```php
add_filter( 'aegis_system_fonts', function ( array $fonts ): array {
	$fonts[] = array(
		'name'       => 'Rounded',
		'slug'       => 'rounded',
		'fontFamily' => 'ui-rounded, "SF Pro Rounded", system-ui, sans-serif',
	);
	return $fonts;
} );
```

---

## Editor

### Pass Data to Editor Scripts

`aegis_editor_data` — data available to editor scripts. Includes `siteUrl` and `adminUrl`.

```php
add_filter( 'aegis_editor_data', function ( array $data ): array {
	$data['brandName'] = get_bloginfo( 'name' );
	return $data;
} );
```

### Filter or Sort Query Loops by a Protected Meta Key

`aegis_query_protected_meta_keys` — the `_`-prefixed meta keys that Query Loop meta filters and meta sorting accept. Other `_` keys are ignored. Default: WooCommerce's `_price`, `_regular_price`, `_sale_price`, `_stock`, `_wc_average_rating`, and `_wc_review_count`.

```php
add_filter( 'aegis_query_protected_meta_keys', function ( array $keys ): array {
	$keys[] = '_event_start_date';
	return $keys;
} );
```

Only add keys whose values are safe for anyone who can edit posts to see.

### Change Query Loop Editor Options

`aegis_query_enhancements_data` — options in the theme's Query Loop controls: `postTypes`, `taxonomies`, `metaCompareOperators`, `metaTypes`, `orderByOptions`.

```php
add_filter( 'aegis_query_enhancements_data', function ( array $data ): array {
	$data['orderByOptions'][] = array( 'value' => 'menu_order', 'label' => 'Menu Order' );
	return $data;
} );
```

---

## SVG and Icons

### Add an Icon Set

`aegis_icon_sets` — icon sets as `name => folder path`. Every `.svg` file in the folder becomes an icon in the icon pickers.

```php
add_filter( 'aegis_icon_sets', function ( array $icon_sets ): array {
	$icon_sets['brand-icons'] = get_stylesheet_directory() . '/assets/icons';
	return $icon_sets;
} );
```

### Change the Image Placeholder

`aegis_placeholder_svg` — the SVG shown where an image is missing. Receives the SVG markup and its title.

```php
add_filter( 'aegis_placeholder_svg', function ( string $svg, string $title ): string {
	return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" role="img" aria-label="' . esc_attr( $title ) . '"><rect width="24" height="24" fill="currentColor" opacity=".1"/></svg>';
}, 10, 2 );
```

---

## Related

- [Hooks and Filters](hooks-and-filters.md)
- [Free plugin Code Snippets](../../../../plugins/aegis/docs/reference/code-snippets.md)
- [Pro Code Snippets](../../../../plugins/aegis-pro/docs/reference/code-snippets.md)
