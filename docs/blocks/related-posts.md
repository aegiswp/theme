# Related Posts Block

The **Related Posts** block (`aegis/related-posts`) displays posts related to the current content by shared categories or tags.

## Overview

| Property | Value |
|----------|-------|
| Block name | `aegis/related-posts` |
| Registered by | Aegis theme |
| Render | Dynamic (`render.php` + `RelatedPostsQuery.php`) |
| Requires plugin | No |

This is the **canonical** related-posts path. The former `core/query` Related Posts variation was removed — see [[../getting-started/updating#related-posts]].

## Key attributes

| Attribute | Type | Default | Description |
|-----------|------|---------|-------------|
| `postsPerPage` | number | `3` | Number of posts |
| `columns` | number | `3` | Grid columns |
| `styleVariant` | string | `grid` | `grid`, `list`, `cards`, `minimal` |
| `taxonomySource` | string | `auto` | `auto`, `category`, or `post_tag` |
| `fallbackBehavior` | string | `latest` | `latest` or `hide` when no matches |
| `showFeaturedImage` / `showDate` / `showExcerpt` / `showCategory` | boolean | varies | Metadata visibility |
| `heading` / `headingTag` | string | Related Posts / `h2` | Section title |
| `excerptLength` | number | `20` | Word count |
| `imageAspectRatio` | string | `16/9` | Featured image ratio |

## Usage

1. Insert **Related Posts** (typically on single post templates).
2. Set post count and layout variant.
3. Choose taxonomy source (auto uses categories then tags).
4. Configure fallback when no related posts exist.

## Advanced querying (Pro)

For advanced related-post logic on **`core/query`**, use **Aegis Pro** `aegisProRelatedPosts` — see [Query Loop Pro](../../plugins/aegis-pro/docs/features/query-loop-pro.md). That extends Query Loop; it does not replace `aegis/related-posts`.

## Developer notes

- Query logic: `src/Blocks/related-posts/RelatedPostsQuery.php`
- Filter: `aegis_related_posts_query` — see [[../reference/hooks-and-filters#block-filters-examples]]

```php
add_filter( 'aegis_related_posts_query', function ( $args, $post_id, $context ) {
    $args['posts_per_page'] = 6;
    return $args;
}, 10, 3 );
```

## Next Steps

- [[custom-blocks]] — Block index
- [[../getting-started/updating]] — Migration from old query variation
