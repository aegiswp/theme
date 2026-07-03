# Embed Template

Aegis provides a custom embed content template that replaces the WordPress default (`wp-includes/theme-compat/embed-content.php`). This template gives full structural control over how Aegis posts appear when embedded on external sites via the oEmbed protocol.

## Enhancements Over the Default

The custom embed template (`embed-content.php` at the theme root) provides the following improvements over the WordPress default:

- **Featured image** — Always renders the featured image in a rectangular (above-title) layout.
- **Article schema.org** — Adds structured data in JSON-LD format for improved SEO and rich previews.
- **Reordered content** — Uses a logical content order: image, title, date, excerpt, terms, footer.
- **Cleaner footer** — Displays the site icon and name without the WordPress logo fallback.

## Content Order

When an Aegis post is embedded on an external site, the content is rendered in this order:

1. Featured image (linked to the post).
2. Post title (linked to the post).
3. Publication date (on single posts only).
4. Excerpt.
5. Primary taxonomy term (first category or tag).
6. Footer with site icon and site name.
7. Schema.org Article structured data (JSON-LD script).

## Schema.org Structured Data

The embed template automatically generates Article schema.org structured data with the following properties:

| Property | Value Source |
|----------|-------------|
| `@type` | `Article` |
| `headline` | Post title |
| `url` | Post permalink |
| `datePublished` | Post publish date (W3C format) |
| `dateModified` | Post modified date (W3C format) |
| `author` | Post author name |
| `publisher` | Site name |
| `publisher.logo` | Site icon (512px) |
| `image` | Featured image URL |
| `description` | Post excerpt (stripped of HTML) |

## Customization

### Filters

The embed template respects the following WordPress core filters:

- `embed_thumbnail_id` — Allows modification of the featured image ID.
- `embed_thumbnail_image_size` — Controls the image size used (defaults to `aegis-embed`).

### Actions

- `embed_content` — Fires after the excerpt for additional content.
- `embed_content_meta` — Fires inside the footer for additional meta content.

## File Location

The embed template file is located at the theme root:

```
aegis/embed-content.php
```

WordPress automatically uses this file when it detects an embed content template in the active theme.

## Next Steps

- [[performance]] — Learn about other performance features.
- [[hooks-and-filters]] — Available hooks and filters.
- [[accessibility]] — Accessibility considerations for embeds.
