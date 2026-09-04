# Related Posts Block

The **Related Posts** block (`aegis/related-posts`) displays posts related to the current content by shared categories, tags, or author.

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
| `taxonomySource` | string | `auto` | `auto`, `category`, `post_tag`, or `author` |
| `orderBy` | string | `date` | `date`, `rand`, or `title` |
| `order` | string | `desc` | `asc` or `desc` (hidden when order is random) |
| `fallbackBehavior` | string | `latest` | `latest` or `hide` when no matches |
| `showFeaturedImage` / `showDate` / `showExcerpt` / `showCategory` | boolean | varies | Metadata visibility |
| `heading` / `headingTag` | string | Related Posts / `h2` | Section title |
| `excerptLength` | number | `20` | Word count |
| `imageAspectRatio` | string | `16/9` | Featured image ratio |

## Usage

1. Insert **Related Posts** (typically on single post templates).
2. Set post count and layout variant.
3. Choose **Related by** (auto taxonomies, category, tag, or author).
4. Optionally set **Order by** (date, title, or random).
5. Configure fallback when no related posts exist.

The editor canvas shows a live preview of the chosen layout. On a public post it queries related posts for that content; in the pattern library, Site Editor, or other contexts without a public post it previews the latest posts. On the public site the block still renders only on singular views (not archives or the front page).

Content options (heading, post count, columns, excerpt length, image ratio) apply in both the editor preview and on the frontend. Excerpt length appears only when **Show Excerpt** is on; image aspect ratio appears only when **Show Featured Image** is on. Columns apply to every style variant. Query options (related by, order by, order, fallback) apply to the editor preview and the public site.

## Advanced querying (Pro)

For advanced related-post logic on **`core/query`**, use **Aegis Pro** `aegisProRelatedPosts` — see [Query Loop Pro](../../plugins/aegis-pro/docs/features/query-loop-pro.md). That extends Query Loop; it does not replace `aegis/related-posts`.

## Developer notes

- Query logic: `src/Blocks/RelatedPostsQuery.php`
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
