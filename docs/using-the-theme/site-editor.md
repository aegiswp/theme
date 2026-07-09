# Site Editor

The WordPress Site Editor is the primary interface for customizing the Aegis theme. As a Full Site Editing (FSE) block theme, Aegis does not use the traditional Customizer. All visual changes are made through the Site Editor.

## Accessing the Site Editor

To open the Site Editor:

1. Log in to your WordPress admin dashboard.
2. Navigate to **Appearance → Editor**.

The Site Editor opens with a full preview of your site. From here, you can edit templates, template parts, styles, patterns, and navigation.

## Site Editor Interface

### Top Toolbar

| Element | Purpose |
|---------|---------|
| WordPress icon | Return to the admin dashboard |
| Block inserter (+) | Add blocks and patterns |
| Tools (cursor/pencil) | Switch between select and edit modes |
| Undo/Redo | Revert or reapply changes |
| List view | See the block hierarchy |
| Styles icon | Open the Global Styles panel |
| Save button | Publish your changes |

### Left Sidebar Navigation

The left sidebar provides access to all editable components:

- **Navigation** — Manage site navigation menus.
- **Styles** — Apply style variations and customize global settings.
- **Pages** — Edit individual page layouts.
- **Templates** — Edit or create page templates.
- **Patterns** — Manage reusable patterns and template parts.

## Editing Templates

Templates control the layout of different page types (homepage, single posts, archives, and more).

To edit a template:

1. Click **Templates** in the left sidebar.
2. Select the template you want to modify (for example, "Single Posts").
3. The template opens in the editor canvas.
4. Add, remove, or rearrange blocks as needed.
5. Click **Save** to publish your changes.

See [[templates]] for a complete list of available templates.

## Editing Template Parts

Template parts are reusable sections that appear across multiple templates (such as the header and footer).

To edit a template part:

1. Click **Patterns** in the left sidebar.
2. Select **Template Parts** from the list.
3. Choose the part you want to edit (Header, Footer, or Sidebar).
4. Make your changes in the editor.
5. Click **Save** to apply changes across all templates that use this part.

See [[template-parts]] for details on the available template parts.

## Working with Styles

The Styles panel controls your site-wide design settings:

1. Click the **Styles** icon (half-filled circle) in the top toolbar.
2. From here you can:
   - **Browse styles** — Switch between the 60 available style variations.
   - **Typography** — Configure fonts, sizes, and weights globally.
   - **Colors** — Set the site-wide color palette and element colors.
   - **Layout** — Adjust content width, padding, and block spacing.
   - **Blocks** — Configure default styles for specific block types.

See [[global-styles]] and [[style-variations]] for detailed instructions.

## Adding Content with Patterns

Aegis provides **~200 theme block patterns** across **30 categories** (plus companion plugin and Pro patterns):

1. Click the **Block Inserter** (+) in the top toolbar.
2. Switch to the **Patterns** tab.
3. Browse categories or use the search field.
4. Click a pattern to insert it at the cursor position.
5. Customize the inserted pattern as needed.

See [[block-patterns]] for the full pattern library.

## Managing Navigation

To create or edit navigation menus:

1. Click **Navigation** in the left sidebar.
2. Select an existing menu or create a new one.
3. Add pages, links, or submenu items.
4. Reorder items by dragging or using the block toolbar.
5. Save your changes.

You can also edit navigation directly within the header template part by clicking on the Navigation block.

## Creating Custom Templates

To create a new template:

1. Click **Templates** in the left sidebar.
2. Click the **Add New Template** button (+).
3. Choose what the template applies to (a specific page, post type, or category).
4. Build the template layout using blocks and patterns.
5. Save the template.

Custom templates appear in the template selector when editing posts and pages.

## Reverting Changes

If you want to undo changes to a template or template part:

1. Navigate to **Templates** or **Patterns → Template Parts**.
2. Select the item you want to revert.
3. Open the **Options** menu (three dots) in the top toolbar.
4. Click **Clear customizations** to restore the original version.

This reverts the template to its default state as shipped with Aegis.

## Keyboard Shortcuts

| Shortcut | Action |
|----------|--------|
| `Ctrl + Z` | Undo |
| `Ctrl + Shift + Z` | Redo |
| `Ctrl + S` | Save |
| `Ctrl + Shift + ,` | Toggle settings sidebar |
| `/` | Insert a block by name |
| `Shift + Alt + L` | Toggle list view |

## Tips for Working with the Site Editor

- **Use List View** to navigate complex template structures. It shows the full block hierarchy.
- **Lock blocks** you do not want accidentally moved or deleted (Block toolbar → Options → Lock).
- **Group blocks** together for easier management of layout sections.
- **Save frequently** to avoid losing work, especially when making extensive changes.
- **Preview changes** before saving by clicking the site title in the top toolbar to toggle the preview.

## Limitations

The Site Editor has some limitations to be aware of:

- **No live content** — Templates show placeholder content, not actual posts or pages.
- **Query Loop** — Dynamic content blocks (like Query Loop) show sample data in the editor.
- **Plugin blocks** — Some third-party plugin blocks may not render fully in the editor preview.

## Next Steps

- [[templates]] — Learn about the 23 available page templates.
- [[template-parts]] — Explore the header, footer, and sidebar parts.
- [[global-styles]] — Deep dive into style customization.
- [[block-patterns]] — Discover the pattern library.
