# Quick Start Guide

This guide walks you through your first steps with Aegis after installation, helping you configure and customize your site quickly.

## Step 1: Activate the Theme

If you have not already activated Aegis, navigate to **Appearance → Themes** in your WordPress admin dashboard and click **Activate** on the Aegis theme card.

## Step 2: Open the Site Editor

Aegis is a Full Site Editing (FSE) theme. All customization happens through the WordPress Site Editor:

1. Navigate to **Appearance → Editor** in the admin dashboard.
2. The Site Editor opens with a preview of your site.
3. Use the left sidebar navigation to access templates, template parts, patterns, and styles.

For a detailed overview of the Site Editor interface, see [[site-editor]].

## Step 3: Choose a Style Variation

Aegis ships with 60 style variations that change your entire site appearance with one click:

1. In the Site Editor, click the **Styles** icon (half-filled circle) in the top-right toolbar.
2. Click **Browse styles** to see all available variations.
3. Select a variation to preview it.
4. Click **Save** to apply the variation to your site.

See [[style-variations]] for a full list of available variations.

## Step 4: Set Up Your Homepage

To create a homepage using Aegis block patterns:

1. Navigate to **Pages → Add New Page** in the admin dashboard.
2. Give your page a title (for example, "Home").
3. Open the block inserter by clicking the **+** icon in the top-left toolbar.
4. Navigate to the **Patterns** tab.
5. Browse categories such as **Hero**, **Feature**, **CTA**, or **Testimonial**.
6. Click a pattern to insert it into your page.
7. Repeat until you have assembled your desired layout.
8. Publish the page.

Then set it as your homepage:

1. Navigate to **Settings → Reading**.
2. Select **A static page** under "Your homepage displays."
3. Choose your new page from the **Homepage** dropdown.
4. Click **Save Changes**.

## Step 5: Configure Navigation

To set up your site navigation:

1. Open the Site Editor (**Appearance → Editor**).
2. Click on the header area to select it.
3. Click on the Navigation block within the header.
4. Use the block toolbar to add, remove, or reorder menu items.
5. Click **Save** to publish your changes.

You can also manage navigation menus under **Appearance → Editor → Navigation**.

## Step 6: Customize Global Styles

Fine-tune your site design beyond style variations:

1. In the Site Editor, click the **Styles** icon.
2. Adjust **Typography** settings for headings, body text, and links.
3. Adjust **Colors** for background, text, and accent elements.
4. Adjust **Layout** for content width and padding.
5. Click **Save** to apply your changes.

See [[global-styles]] for detailed customization instructions.

## Step 7: Configure Dark Mode (Optional)

Aegis includes built-in dark mode support:

1. Dark mode is toggled by applying the `is-style-dark` class to the `<body>` element.
2. You can enable dark mode globally through the Site Editor or conditionally per template.

See [[dark-mode]] for configuration details.

## Step 8: Install Companion Plugins (Optional)

Enhance Aegis with companion plugins:

- **Aegis Plugin** (free) — Map and Modal blocks, admin dashboard, integrations, snippets, conditionals, analytics. See [Plugin docs](../../plugins/aegis/docs/getting-started/installation.md).
- **Aegis Pro** — Hook patterns, video stack, query conditions, Pro blocks. Requires Aegis theme. See [Pro docs](../../plugins/aegis-pro/docs/getting-started/installation.md).

After installing the plugin, open **Aegis → Dashboard** to configure blocks and integrations.

## Building a Page with Patterns

Aegis includes **~200 theme block patterns** across **30 categories** (plus companion plugin and Pro patterns). Here is a typical workflow for assembling a page:

1. **Start with a Hero pattern** — Choose from the Hero category for your page header.
2. **Add Feature sections** — Showcase your services or capabilities.
3. **Include Social Proof** — Add a Testimonial or Logos pattern.
4. **Add a Call to Action** — Use a CTA pattern to drive conversions.
5. **Finish with a Contact pattern** — Make it easy for visitors to reach you.

Each pattern is fully customizable after insertion. Change colors, text, images, and layout to match your brand.

## Common First Tasks

| Task | Where to Go |
|------|-------------|
| Change site title and tagline | **Settings → General** |
| Upload a site icon (favicon) | **Appearance → Editor → Styles → Site Identity** |
| Set up a blog page | **Settings → Reading → Posts page** |
| Configure permalinks | **Settings → Permalinks** |
| Add a contact form | Install Fluent Forms, then use a Contact pattern |
| Set up WooCommerce | See [[woocommerce-integration]] |

## Recommended Reading

- [[templates]] — Learn about the 23 available page templates.
- [[block-patterns]] — Explore the full pattern library.
- [[color-palette]] — Understand the design system color tokens.
- [[typography]] — Configure fonts and type scale.
- [[performance]] — Learn about the zero-base loading strategy.

## Next Steps

- [[site-editor]] — Deep dive into the Full Site Editing experience.
- [[style-variations]] — Browse all 60 style variations.
- [[updating]] — Keep Aegis up to date.
