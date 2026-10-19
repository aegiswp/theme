<?php
/**
 * Title: Custom Pro — Product Page
 * Slug: plugin-pro
 * Categories: custom
 * Keywords: aegis, pro, video, bunnycdn, hook patterns, conditions, query loop, icons, pricing
 * Description: Full-page product and pricing pattern for Aegis Pro.
 * Viewport Width: 1280
 * Block Types: core/post-content
 * Post Types: page
 */
?>
<!-- wp:group {"metadata":{"name":"Custom Pro"},"align":"full","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull">
<!-- wp:group {"metadata":{"name":"Hero"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|md"}}},"layout":{"type":"constrained","contentSize":"760px"}} -->
<div class="wp-block-group" style="padding-bottom:var(--wp--preset--spacing--md)">
<!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group">
<!-- wp:paragraph {"align":"center","className":"is-style-sub-heading","style":{"border":{"width":"1px","radius":"99px"},"spacing":{"padding":{"top":"6px","bottom":"6px","right":"var:preset|spacing|xs","left":"var:preset|spacing|xs"},"margin":{"top":"0","bottom":"var:preset|spacing|xs"}},"typography":{"lineHeight":"1"}},"backgroundColor":"neutral-950","textColor":"primary-25","borderColor":"neutral-950","fontSize":"12"} -->
<p class="has-text-align-center is-style-sub-heading has-border-color has-neutral-950-border-color has-primary-25-color has-text-color has-neutral-950-background-color has-background has-12-font-size" style="border-width:1px;border-radius:99px;margin-top:0;margin-bottom:var(--wp--preset--spacing--xs);padding-top:6px;padding-right:var(--wp--preset--spacing--xs);padding-bottom:6px;padding-left:var(--wp--preset--spacing--xs);line-height:1"><?php echo esc_html__( 'AEGIS PRO · COMING SOON', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:heading {"textAlign":"center","level":1,"style":{"spacing":{"padding":{"top":"var:preset|spacing|xs"}}},"fontSize":"60"} -->
<h1 class="wp-block-heading has-text-align-center has-60-font-size" style="padding-top:var(--wp--preset--spacing--xs)"><?php echo esc_html__( 'Video, logic, and growth tools for serious sites', 'aegis' ); ?></h1>
<!-- /wp:heading -->
<!-- wp:paragraph {"align":"center","fontSize":"20"} -->
<p class="has-text-align-center has-20-font-size"><?php echo esc_html__( 'Coming soon: Pro adds BunnyCDN video, marketing overlays, LMS and CRM automation, hook patterns, advanced conditions, Query Loop Pro, two new blocks, 39 premium patterns, and 5,400+ icons — unlocked in the dashboard you already use.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--md);margin-bottom:var(--wp--preset--spacing--md)">
<!-- wp:button {"backgroundColor":"neutral-800","size":"large","iconSet":"remixicon","iconName":"price-tag-3-line","iconSize":"16px","iconPosition":"end"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-neutral-800-background-color has-background wp-element-button" href="<?php echo esc_url( home_url( '/pro/#pricing' ) ); ?>"><?php echo esc_html__( 'See planned pricing', 'aegis' ); ?></a></div>
<!-- /wp:button -->
<!-- wp:button {"size":"large","className":"is-style-ghost","iconSet":"remixicon","iconName":"download-2-line","iconSize":"16px","iconPosition":"end"} -->
<div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/plugin/' ) ); ?>"><?php echo esc_html__( 'Start with the free plugin', 'aegis' ); ?></a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
<!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"14"} -->
<p class="has-text-align-center has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'Launching soon · Planned: 30-day money-back guarantee · 1 year of updates and support · Pro keeps working if your license lapses', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
<!-- wp:image {"aspectRatio":"16/9","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"wide"} -->
<figure class="wp-block-image alignwide size-full"><img alt="<?php echo esc_attr__( 'Screenshot placeholder: Aegis Pro video player with chapters and a CTA overlay', 'aegis' ); ?>" style="aspect-ratio:16/9;object-fit:cover"/></figure>
<!-- /wp:image -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Numbers"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|md","left":"var:preset|spacing|lg"}}},"className":"is-style-surface","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-surface" style="padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--lg)">
<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|md"}},"layout":{"type":"grid","columnCount":5,"minimumColumnWidth":"120px"}} -->
<div class="wp-block-group alignwide">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group">
<!-- wp:paragraph {"align":"center","className":"is-style-heading","style":{"typography":{"lineHeight":"1"}},"fontSize":"48"} -->
<p class="has-text-align-center is-style-heading has-48-font-size" style="line-height:1"><?php echo esc_html__( '5,400+', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"14"} -->
<p class="has-text-align-center has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'Pro icons', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group">
<!-- wp:paragraph {"align":"center","className":"is-style-heading","style":{"typography":{"lineHeight":"1"}},"fontSize":"48"} -->
<p class="has-text-align-center is-style-heading has-48-font-size" style="line-height:1"><?php echo esc_html__( '39', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"14"} -->
<p class="has-text-align-center has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'Premium patterns', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group">
<!-- wp:paragraph {"align":"center","className":"is-style-heading","style":{"typography":{"lineHeight":"1"}},"fontSize":"48"} -->
<p class="has-text-align-center is-style-heading has-48-font-size" style="line-height:1"><?php echo esc_html__( '2', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"14"} -->
<p class="has-text-align-center has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'New blocks', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group">
<!-- wp:paragraph {"align":"center","className":"is-style-heading","style":{"typography":{"lineHeight":"1"}},"fontSize":"48"} -->
<p class="has-text-align-center is-style-heading has-48-font-size" style="line-height:1"><?php echo esc_html__( '5', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"14"} -->
<p class="has-text-align-center has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'Icon collections', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group">
<!-- wp:paragraph {"align":"center","className":"is-style-heading","style":{"typography":{"lineHeight":"1"}},"fontSize":"48"} -->
<p class="has-text-align-center is-style-heading has-48-font-size" style="line-height:1"><?php echo esc_html__( '1', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"14"} -->
<p class="has-text-align-center has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'Dashboard to learn', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Video"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
<!-- wp:group {"metadata":{"name":"Heading"},"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","contentSize":"720px"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--lg)">
<!-- wp:paragraph {"align":"center","className":"is-style-sub-heading"} -->
<p class="has-text-align-center is-style-sub-heading"><?php echo esc_html__( 'Video stack', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:heading {"textAlign":"center","fontSize":"48"} -->
<h2 class="wp-block-heading has-text-align-center has-48-font-size"><?php echo esc_html__( 'A Professional Video Platform Inside core/video', 'aegis' ); ?></h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"align":"center","fontSize":"18"} -->
<p class="has-text-align-center has-18-font-size"><?php echo esc_html__( 'No separate video block and no third-party player. Pro upgrades the WordPress Video block with hosting, protection, marketing, and analytics — powered by the Interactivity API.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"grid","columnCount":3,"minimumColumnWidth":"280px"}} -->
<div class="wp-block-group alignwide">
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/vidicon-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Hosting', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'BunnyCDN Streaming', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Browse your Stream library, upload from the editor, and play adaptive HLS with a quality switcher.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/closed-captioning-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Transcribe', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'AI Captions', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Transcribe videos automatically and let viewers search inside captions.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/play-list-2-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Navigation', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Chapters and Playlists', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Timeline markers on the progress bar, thumbnail scrub previews, and playlists.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/picture-in-picture-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Retention', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Engagement', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Muted autoplay, sticky player, focus mode, saved progress, touch gestures, and ambient light.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/mail-send-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Leads', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Marketing Overlays', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Email gates, CTA overlays, an action bar, and YouTube subscribe, with Mailchimp or ConvertKit.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/lock-password-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Protection', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Private Video', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Role-based access, signed expiring URLs, and dynamic watermarks for members-only content.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/volume-up-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Reach', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Multi-audio', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Multiple audio tracks on one stream for languages and audio description.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/line-chart-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Insight', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Video Analytics', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Local tracking, Google Analytics events, per-user progress, and audience-retention curves.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/seo-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Search', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Video Sitemaps', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Hosted videos added to Rank Math, Yoast, All in One SEO, or SEOPress sitemaps.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Automation"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}},"className":"is-style-surface","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-surface" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
<!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}}} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center">
<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center">
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'LMS and CRM automation', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:heading {"fontSize":"48"} -->
<h2 class="wp-block-heading has-48-font-size"><?php echo esc_html__( 'Video That Moves People Through Your Funnel', 'aegis' ); ?></h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"18"} -->
<p class="has-18-font-size"><?php echo esc_html__( 'Connect playback to the tools that run your business. Automations Free cannot run.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:list {"className":"is-style-checklist","style":{"spacing":{"blockGap":"var:preset|spacing|xxs","margin":{"top":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
<ul style="margin-top:var(--wp--preset--spacing--sm)" class="wp-block-list is-style-checklist">
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Mark LearnDash and LifterLMS lessons complete at playback milestones', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Add FluentCRM tags, lists, and funnel events when viewers engage', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Show or hide content by WP Fusion tags, lists, and CRM login', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Pull video sources from ACF or Meta Box fields with block bindings', 'aegis' ); ?></li>
<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
</div>
<!-- /wp:column -->
<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center">
<!-- wp:image {"aspectRatio":"16/9","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img alt="<?php echo esc_attr__( 'Screenshot placeholder: video inspector with LearnDash and FluentCRM panels', 'aegis' ); ?>" style="aspect-ratio:16/9;object-fit:cover"/></figure>
<!-- /wp:image -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Hooks"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
<!-- wp:columns {"verticalAlignment":"center","align":"wide","className":"is-reverse-on-mobile","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}}} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center is-reverse-on-mobile">
<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center">
<!-- wp:image {"aspectRatio":"16/9","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img alt="<?php echo esc_attr__( 'Screenshot placeholder: Aegis → Hooks list with conditional patterns', 'aegis' ); ?>" style="aspect-ratio:16/9;object-fit:cover"/></figure>
<!-- /wp:image -->
</div>
<!-- /wp:column -->
<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center">
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Hook patterns', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:heading {"fontSize":"48"} -->
<h2 class="wp-block-heading has-48-font-size"><?php echo esc_html__( 'Design Once, Inject Anywhere', 'aegis' ); ?></h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"18"} -->
<p class="has-18-font-size"><?php echo esc_html__( 'Build a banner, notice, or upsell with blocks, then place it at any theme or plugin hook — before the header, after the content, inside checkout.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:list {"className":"is-style-checklist","style":{"spacing":{"blockGap":"var:preset|spacing|xxs","margin":{"top":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
<ul style="margin-top:var(--wp--preset--spacing--sm)" class="wp-block-list is-style-checklist">
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Create hook patterns in the block editor, no PHP required', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Run them always or only when conditions match', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Enable, disable, and copy hook names from Aegis → Hooks', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Preview every position on the front end before going live', 'aegis' ); ?></li>
<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Conditions"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}},"className":"is-style-surface","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-surface" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
<!-- wp:group {"metadata":{"name":"Heading"},"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","contentSize":"720px"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--lg)">
<!-- wp:paragraph {"align":"center","className":"is-style-sub-heading"} -->
<p class="has-text-align-center is-style-sub-heading"><?php echo esc_html__( 'Advanced conditions', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:heading {"textAlign":"center","fontSize":"48"} -->
<h2 class="wp-block-heading has-text-align-center has-48-font-size"><?php echo esc_html__( 'Personalization Without a Second Plugin', 'aegis' ); ?></h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"align":"center","fontSize":"18"} -->
<p class="has-text-align-center has-18-font-size"><?php echo esc_html__( 'Pro adds rules for context, commerce, and learning on top of the free visibility engine.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"grid","columnCount":3,"minimumColumnWidth":"280px"}} -->
<div class="wp-block-group alignwide">
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/bookmark-3-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Reuse', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Visibility Presets', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Save a set of rules once and apply it to any block. Change the preset and every block follows.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/user-location-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Context', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Advanced Rules', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Cookie value, referral source, post type, IDs, terms, URL path, archive type, post meta, and user meta.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/shopping-cart-2-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Sales', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Commerce Conditions', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'WooCommerce cart, customer, and product; EDD cart and downloads; AffiliateWP referrals and earnings.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/graduation-cap-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Members', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Learning and Forms', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'LearnDash, LifterLMS, and Sensei enrollment and progress; Fluent Forms submissions and Fluent Booking.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/image-2-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Media', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Image Source', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Featured images from the post content, an ACF image field, or a Meta Box image field — even inside Query Loops.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/price-tag-3-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Results', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Personalized Offers', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Combine rules to show returning customers, affiliates, or students exactly the right message.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Query"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
<!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}}} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center">
<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center">
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Query Loop Pro', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:heading {"fontSize":"48"} -->
<h2 class="wp-block-heading has-48-font-size"><?php echo esc_html__( 'Dynamic Listings That Feel Like an App', 'aegis' ); ?></h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"18"} -->
<p class="has-18-font-size"><?php echo esc_html__( 'Everything you need for directories, portfolios, and shops — on the core Query Loop block.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:list {"className":"is-style-checklist","style":{"spacing":{"blockGap":"var:preset|spacing|xxs","margin":{"top":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
<ul style="margin-top:var(--wp--preset--spacing--sm)" class="wp-block-list is-style-checklist">
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Load more, infinite scroll, and AJAX page numbers', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Front-end taxonomy, search, and sort filters', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Masonry and carousel layouts', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Advanced meta queries with AND/OR, date ranges, and parent/child posts', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'ACF and Meta Box field picker, WooCommerce product queries, and related-posts mode', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Caching, lazy-loading, skeleton screens, and hover prefetch for speed', 'aegis' ); ?></li>
<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
</div>
<!-- /wp:column -->
<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center">
<!-- wp:image {"aspectRatio":"16/9","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img alt="<?php echo esc_attr__( 'Screenshot placeholder: filtered masonry Query Loop with load more', 'aegis' ); ?>" style="aspect-ratio:16/9;object-fit:cover"/></figure>
<!-- /wp:image -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Blocks"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}},"className":"is-style-surface","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-surface" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
<!-- wp:group {"metadata":{"name":"Heading"},"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","contentSize":"720px"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--lg)">
<!-- wp:paragraph {"align":"center","className":"is-style-sub-heading"} -->
<p class="has-text-align-center is-style-sub-heading"><?php echo esc_html__( 'Block upgrades', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:heading {"textAlign":"center","fontSize":"48"} -->
<h2 class="wp-block-heading has-text-align-center has-48-font-size"><?php echo esc_html__( 'Your Favorite Blocks, Fully Loaded', 'aegis' ); ?></h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"align":"center","fontSize":"18"} -->
<p class="has-text-align-center has-18-font-size"><?php echo esc_html__( 'Two new blocks plus Pro extras for Map, Modal, Slider, Countdown, Toggle, and Marquee.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"grid","columnCount":3,"minimumColumnWidth":"280px"}} -->
<div class="wp-block-group alignwide">
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/layout-top-2-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'New block', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Tabs', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Tabbed content built from any blocks you like.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/contrast-2-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'New block', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Compare', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Before-and-after image slider with aspect ratio, height, and focal-point control.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/road-map-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Upgrade', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Map Pro', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Directions, store locator, geolocation, heatmaps, drawing tools, KML and GeoJSON, CPT markers, custom icons, and clustering.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/window-2-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Upgrade', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Modal Pro', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Exit intent, scroll depth, and time-delay triggers, auto-close, show once, and per-device display.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/slideshow-3-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Upgrade', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Slider Pro', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Thumbnails, lightbox, mousewheel, aspect ratio, lazy loading, and arrow and dot styles.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/timer-flash-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Upgrade', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Countdown and Toggle Pro', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Evergreen timers, urgency and expiry actions; toggles with URL sync, memory, animations, and nesting.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Library"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
<!-- wp:columns {"verticalAlignment":"center","align":"wide","className":"is-reverse-on-mobile","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}}} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center is-reverse-on-mobile">
<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center">
<!-- wp:image {"aspectRatio":"16/9","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img alt="<?php echo esc_attr__( 'Screenshot placeholder: icon picker with Remix and Phosphor collections', 'aegis' ); ?>" style="aspect-ratio:16/9;object-fit:cover"/></figure>
<!-- /wp:image -->
</div>
<!-- /wp:column -->
<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center">
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Design library', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:heading {"fontSize":"48"} -->
<h2 class="wp-block-heading has-48-font-size"><?php echo esc_html__( '5,400+ Icons and 39 Premium Patterns', 'aegis' ); ?></h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"18"} -->
<p class="has-18-font-size"><?php echo esc_html__( 'Five icon collections for the WordPress Icon block, all following your text color in light and dark mode.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:list {"className":"is-style-checklist","style":{"spacing":{"blockGap":"var:preset|spacing|xxs","margin":{"top":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
<ul style="margin-top:var(--wp--preset--spacing--sm)" class="wp-block-list is-style-checklist">
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Remix Icon — 3,188 icons', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Phosphor Duotone — 1,247 icons', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Hand Drawn — 436 icons', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Heroicons — 292 icons and Feather — 287 icons', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Premium heroes, features, pricing, testimonials, timelines, and full About, Contact, Features, Pricing, and Blog pages', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Dark-mode toggle switch and dropdown patterns', 'aegis' ); ?></li>
<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Analytics"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}},"className":"is-style-surface","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-surface" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
<!-- wp:group {"metadata":{"name":"Heading"},"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","contentSize":"720px"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--lg)">
<!-- wp:paragraph {"align":"center","className":"is-style-sub-heading"} -->
<p class="has-text-align-center is-style-sub-heading"><?php echo esc_html__( 'Analytics Pro', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:heading {"textAlign":"center","fontSize":"48"} -->
<h2 class="wp-block-heading has-text-align-center has-48-font-size"><?php echo esc_html__( 'Measure What Matters, Respectfully', 'aegis' ); ?></h2>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->
<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"grid","columnCount":4,"minimumColumnWidth":"220px"}} -->
<div class="wp-block-group alignwide">
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/megaphone-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Meta Pixel with WooCommerce Events', 'aegis' ); ?></h3>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Track product views, carts, and purchases for your ad campaigns.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/shield-check-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Consent Mode V2', 'aegis' ); ?></h3>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Send Google consent signals so tags respect each visitor\'s choice.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/stack-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'GTM Data Layer', 'aegis' ); ?></h3>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Rich events pushed to Tag Manager, with a debug mode for testing.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/speed-up-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Extra Performance', 'aegis' ); ?></h3>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Strip emoji scripts site-wide and gate SVG uploads when they are disabled.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Pricing"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}},"anchor":"pricing","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" id="pricing" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
<!-- wp:group {"metadata":{"name":"Heading"},"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","contentSize":"720px"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--lg)">
<!-- wp:paragraph {"align":"center","className":"is-style-sub-heading"} -->
<p class="has-text-align-center is-style-sub-heading"><?php echo esc_html__( 'Planned pricing', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:heading {"textAlign":"center","fontSize":"48"} -->
<h2 class="wp-block-heading has-text-align-center has-48-font-size"><?php echo esc_html__( 'Licenses at Launch', 'aegis' ); ?></h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"align":"center","fontSize":"18"} -->
<p class="has-text-align-center has-18-font-size"><?php echo esc_html__( 'Aegis Pro is coming soon. Every tier includes every Pro feature — pick by the number of sites. Buy during launch and your renewal rate stays locked, even if prices rise. Requires the free Aegis theme and plugin.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:columns {"verticalAlignment":"stretch","align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}}} -->
<div class="wp-block-columns alignwide are-vertically-aligned-stretch">
<!-- wp:column {"verticalAlignment":"stretch","className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","right":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md"}}}} -->
<div class="wp-block-column is-vertically-aligned-stretch is-style-surface" style="padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:paragraph {"className":"is-style-notice","style":{"spacing":{"padding":{"top":"6px","right":"var:preset|spacing|xxs","bottom":"6px","left":"var:preset|spacing|xxs"}},"typography":{"lineHeight":"1","fontWeight":"500"},"border":{"radius":"99px"}},"backgroundColor":"neutral-800","textColor":"primary-25","fontSize":"12"} -->
<p class="is-style-notice has-primary-25-color has-text-color has-neutral-800-background-color has-background has-12-font-size" style="border-radius:99px;padding-top:6px;padding-right:var(--wp--preset--spacing--xxs);padding-bottom:6px;padding-left:var(--wp--preset--spacing--xxs);font-weight:500;line-height:1"><?php echo esc_html__( 'Solo', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"fontSize":"32"} -->
<h3 class="wp-block-heading has-32-font-size"><?php echo esc_html__( 'Personal', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-group">
<!-- wp:paragraph {"className":"wp-block-heading is-style-heading","style":{"typography":{"lineHeight":"1"}},"fontSize":"60"} -->
<p class="wp-block-heading is-style-heading has-60-font-size" style="line-height:1"><?php echo esc_html__( '$69', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"textColor":"neutral-500","fontSize":"16"} -->
<p class="has-neutral-500-color has-text-color has-16-font-size"><?php echo esc_html__( '/ year', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:paragraph {"className":"is-style-heading"} -->
<p class="is-style-heading"><?php echo esc_html__( '1 site', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'For a single blog, course, or store.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:list {"className":"is-style-checklist","style":{"spacing":{"blockGap":"var:preset|spacing|xxs","margin":{"top":"var:preset|spacing|xxs"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
<ul style="margin-top:var(--wp--preset--spacing--xxs)" class="wp-block-list is-style-checklist">
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Every Pro feature', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( '1 year of updates and support', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( '30-day money-back guarantee', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Standard support', 'aegis' ); ?></li>
<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--xs);margin-bottom:var(--wp--preset--spacing--xs)">
<!-- wp:button {"width":100,"className":"is-style-ghost","iconSet":"remixicon","iconName":"time-line","iconSize":"16px","iconPosition":"end"} -->
<div class="wp-block-button is-style-ghost has-custom-width wp-block-button__width-100"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/purchase/#pro-personal' ) ); ?>"><?php echo esc_html__( 'Coming soon', 'aegis' ); ?></a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div>
<!-- /wp:column -->
<!-- wp:column {"verticalAlignment":"stretch","className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","right":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md"}}}} -->
<div class="wp-block-column is-vertically-aligned-stretch is-style-surface" style="padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:paragraph {"className":"is-style-notice","style":{"spacing":{"padding":{"top":"6px","right":"var:preset|spacing|xxs","bottom":"6px","left":"var:preset|spacing|xxs"}},"typography":{"lineHeight":"1","fontWeight":"500"},"border":{"radius":"99px"}},"backgroundColor":"neutral-800","textColor":"primary-25","fontSize":"12"} -->
<p class="is-style-notice has-primary-25-color has-text-color has-neutral-800-background-color has-background has-12-font-size" style="border-radius:99px;padding-top:6px;padding-right:var(--wp--preset--spacing--xxs);padding-bottom:6px;padding-left:var(--wp--preset--spacing--xxs);font-weight:500;line-height:1"><?php echo esc_html__( 'Recommended', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"fontSize":"32"} -->
<h3 class="wp-block-heading has-32-font-size"><?php echo esc_html__( 'Business', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-group">
<!-- wp:paragraph {"className":"wp-block-heading is-style-heading","style":{"typography":{"lineHeight":"1"}},"fontSize":"60"} -->
<p class="wp-block-heading is-style-heading has-60-font-size" style="line-height:1"><?php echo esc_html__( '$149', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"textColor":"neutral-500","fontSize":"16"} -->
<p class="has-neutral-500-color has-text-color has-16-font-size"><?php echo esc_html__( '/ year', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:paragraph {"className":"is-style-heading"} -->
<p class="is-style-heading"><?php echo esc_html__( '5 sites', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'For growing businesses and small studios.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:list {"className":"is-style-checklist","style":{"spacing":{"blockGap":"var:preset|spacing|xxs","margin":{"top":"var:preset|spacing|xxs"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
<ul style="margin-top:var(--wp--preset--spacing--xxs)" class="wp-block-list is-style-checklist">
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Every Pro feature', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( '1 year of updates and support', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( '30-day money-back guarantee', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Priority support', 'aegis' ); ?></li>
<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--xs);margin-bottom:var(--wp--preset--spacing--xs)">
<!-- wp:button {"width":100,"className":"is-style-ghost","iconSet":"remixicon","iconName":"time-line","iconSize":"16px","iconPosition":"end"} -->
<div class="wp-block-button is-style-ghost has-custom-width wp-block-button__width-100"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/purchase/#pro-business' ) ); ?>"><?php echo esc_html__( 'Coming soon', 'aegis' ); ?></a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div>
<!-- /wp:column -->
<!-- wp:column {"verticalAlignment":"stretch","className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","right":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md"}}}} -->
<div class="wp-block-column is-vertically-aligned-stretch is-style-surface" style="padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:paragraph {"className":"is-style-notice","style":{"spacing":{"padding":{"top":"6px","right":"var:preset|spacing|xxs","bottom":"6px","left":"var:preset|spacing|xxs"}},"typography":{"lineHeight":"1","fontWeight":"500"},"border":{"radius":"99px"}},"backgroundColor":"neutral-800","textColor":"primary-25","fontSize":"12"} -->
<p class="is-style-notice has-primary-25-color has-text-color has-neutral-800-background-color has-background has-12-font-size" style="border-radius:99px;padding-top:6px;padding-right:var(--wp--preset--spacing--xxs);padding-bottom:6px;padding-left:var(--wp--preset--spacing--xxs);font-weight:500;line-height:1"><?php echo esc_html__( 'Best value', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"fontSize":"32"} -->
<h3 class="wp-block-heading has-32-font-size"><?php echo esc_html__( 'Agency', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-group">
<!-- wp:paragraph {"className":"wp-block-heading is-style-heading","style":{"typography":{"lineHeight":"1"}},"fontSize":"60"} -->
<p class="wp-block-heading is-style-heading has-60-font-size" style="line-height:1"><?php echo esc_html__( '$299', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"textColor":"neutral-500","fontSize":"16"} -->
<p class="has-neutral-500-color has-text-color has-16-font-size"><?php echo esc_html__( '/ year', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:paragraph {"className":"is-style-heading"} -->
<p class="is-style-heading"><?php echo esc_html__( '25 sites', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'For agencies building client sites on Aegis.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:list {"className":"is-style-checklist","style":{"spacing":{"blockGap":"var:preset|spacing|xxs","margin":{"top":"var:preset|spacing|xxs"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
<ul style="margin-top:var(--wp--preset--spacing--xxs)" class="wp-block-list is-style-checklist">
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Every Pro feature', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( '1 year of updates and support', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( '30-day money-back guarantee', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Priority support', 'aegis' ); ?></li>
<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--xs);margin-bottom:var(--wp--preset--spacing--xs)">
<!-- wp:button {"width":100,"className":"is-style-ghost","iconSet":"remixicon","iconName":"time-line","iconSize":"16px","iconPosition":"end"} -->
<div class="wp-block-button is-style-ghost has-custom-width wp-block-button__width-100"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/purchase/#pro-agency' ) ); ?>"><?php echo esc_html__( 'Coming soon', 'aegis' ); ?></a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->
<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--lg)">
<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|xs","left":"var:preset|spacing|md"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
<div class="wp-block-group alignwide">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/refund-2-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"fontSize":"14"} -->
<p class="has-14-font-size"><?php echo esc_html__( '30-day money-back guarantee', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/loop-right-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"fontSize":"14"} -->
<p class="has-14-font-size"><?php echo esc_html__( 'Renew at about 30% off: $49 / $105 / $209', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/shield-check-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"fontSize":"14"} -->
<p class="has-14-font-size"><?php echo esc_html__( 'Pro keeps working if your license lapses', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/customer-service-2-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"fontSize":"14"} -->
<p class="has-14-font-size"><?php echo esc_html__( 'Priority support on Business and Agency', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Ecosystem"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}},"className":"is-style-surface","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-surface" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
<!-- wp:group {"metadata":{"name":"Heading"},"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","contentSize":"720px"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--lg)">
<!-- wp:paragraph {"align":"center","className":"is-style-sub-heading"} -->
<p class="has-text-align-center is-style-sub-heading"><?php echo esc_html__( 'Better together', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:heading {"textAlign":"center","fontSize":"48"} -->
<h2 class="wp-block-heading has-text-align-center has-48-font-size"><?php echo esc_html__( 'One System, Three Layers', 'aegis' ); ?></h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"align":"center","fontSize":"18"} -->
<p class="has-text-align-center has-18-font-size"><?php echo esc_html__( 'Every layer uses the same tokens and the same Aegis dashboard. Add the next one when you need it.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"grid","columnCount":2,"minimumColumnWidth":"320px"}} -->
<div class="wp-block-group alignwide">
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/palette-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Aegis Theme — Free', 'aegis' ); ?></h3>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'The design system underneath: tokens, 60 style variations, 236 patterns, and 50 templates.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><a href="<?php echo esc_url( home_url( '/theme/' ) ); ?>"><?php echo esc_html__( 'Explore the theme →', 'aegis' ); ?></a></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/dashboard-3-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Aegis Plugin — Free', 'aegis' ); ?></h3>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'The control center: Map and Modal blocks, about 150 feature toggles, conditionals, snippets, and integrations.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><a href="<?php echo esc_url( home_url( '/plugin/' ) ); ?>"><?php echo esc_html__( 'Explore the plugin →', 'aegis' ); ?></a></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"FAQ"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
<!-- wp:group {"metadata":{"name":"Heading"},"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","contentSize":"720px"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--lg)">
<!-- wp:paragraph {"align":"center","className":"is-style-sub-heading"} -->
<p class="has-text-align-center is-style-sub-heading"><?php echo esc_html__( 'FAQ', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:heading {"textAlign":"center","fontSize":"48"} -->
<h2 class="wp-block-heading has-text-align-center has-48-font-size"><?php echo esc_html__( 'Pro Questions, Answered', 'aegis' ); ?></h2>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->
<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide">
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:details {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
<details class="wp-block-details is-style-surface" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)"><summary><?php echo esc_html__( 'Do I still need the free plugin?', 'aegis' ); ?></summary>
<!-- wp:paragraph {"fontSize":"16"} -->
<p class="has-16-font-size"><?php echo esc_html__( 'Yes. The free plugin provides the Aegis dashboard and settings. Pro unlocks features inside it.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</details>
<!-- /wp:details -->
<!-- wp:details {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
<details class="wp-block-details is-style-surface" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)"><summary><?php echo esc_html__( 'Do all tiers include the same features?', 'aegis' ); ?></summary>
<!-- wp:paragraph {"fontSize":"16"} -->
<p class="has-16-font-size"><?php echo esc_html__( 'Yes. Tiers differ only by the number of sites and the level of support.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</details>
<!-- /wp:details -->
<!-- wp:details {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
<details class="wp-block-details is-style-surface" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)"><summary><?php echo esc_html__( 'When is Pro available?', 'aegis' ); ?></summary>
<!-- wp:paragraph {"fontSize":"16"} -->
<p class="has-16-font-size"><?php echo esc_html__( 'Aegis Pro is coming soon. Start with the free theme and plugin today; Pro unlocks features in the same dashboard at launch.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</details>
<!-- /wp:details -->
<!-- wp:details {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
<details class="wp-block-details is-style-surface" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)"><summary><?php echo esc_html__( 'What happens when my license expires?', 'aegis' ); ?></summary>
<!-- wp:paragraph {"fontSize":"16"} -->
<p class="has-16-font-size"><?php echo esc_html__( 'Pro keeps working. You stop receiving updates and support until you renew.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</details>
<!-- /wp:details -->
<!-- wp:details {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
<details class="wp-block-details is-style-surface" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)"><summary><?php echo esc_html__( 'Will there be a refund policy?', 'aegis' ); ?></summary>
<!-- wp:paragraph {"fontSize":"16"} -->
<p class="has-16-font-size"><?php echo esc_html__( 'Yes. Pro will come with a 30-day money-back guarantee.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</details>
<!-- /wp:details -->
</div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:details {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
<details class="wp-block-details is-style-surface" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)"><summary><?php echo esc_html__( 'Do I need a BunnyCDN account?', 'aegis' ); ?></summary>
<!-- wp:paragraph {"fontSize":"16"} -->
<p class="has-16-font-size"><?php echo esc_html__( 'Only for hosted HLS streaming. Every other Pro feature works without it.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</details>
<!-- /wp:details -->
<!-- wp:details {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
<details class="wp-block-details is-style-surface" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)"><summary><?php echo esc_html__( 'Do staging or local sites count toward my license?', 'aegis' ); ?></summary>
<!-- wp:paragraph {"fontSize":"16"} -->
<p class="has-16-font-size"><?php echo esc_html__( 'No. Only live production domains use an activation, so localhost, staging, and development sites are free to use.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</details>
<!-- /wp:details -->
<!-- wp:details {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
<details class="wp-block-details is-style-surface" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)"><summary><?php echo esc_html__( 'Where do I get support?', 'aegis' ); ?></summary>
<!-- wp:paragraph {"fontSize":"16"} -->
<p class="has-16-font-size"><?php echo esc_html__( 'In the official Aegis community forums, shared by Free and Pro users. Business and Agency licenses get priority responses.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</details>
<!-- /wp:details -->
<!-- wp:details {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
<details class="wp-block-details is-style-surface" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)"><summary><?php echo esc_html__( 'Where do I enter my license?', 'aegis' ); ?></summary>
<!-- wp:paragraph {"fontSize":"16"} -->
<p class="has-16-font-size"><?php echo esc_html__( 'Under Aegis → License after you install Pro. That screen replaces the free upgrade page.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</details>
<!-- /wp:details -->
<!-- wp:details {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
<details class="wp-block-details is-style-surface" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)"><summary><?php echo esc_html__( 'Is Pro on WordPress.org?', 'aegis' ); ?></summary>
<!-- wp:paragraph {"fontSize":"16"} -->
<p class="has-16-font-size"><?php echo esc_html__( 'No. The theme and free plugin are GPL and free; Pro is sold and updated separately.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</details>
<!-- /wp:details -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"CTA"},"align":"full","className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|xl","left":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","contentSize":"680px"}} -->
<div class="wp-block-group alignfull is-style-surface" style="padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--xl);padding-left:var(--wp--preset--spacing--lg)">
<!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/vip-crown-2-line","textColor":"primary-500","style":{"dimensions":{"width":"40px"}}} /-->
<!-- wp:heading {"textAlign":"center","fontSize":"40"} -->
<h2 class="wp-block-heading has-text-align-center has-40-font-size"><?php echo esc_html__( 'Aegis Pro Is Coming Soon', 'aegis' ); ?></h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"align":"center","fontSize":"18"} -->
<p class="has-text-align-center has-18-font-size"><?php echo esc_html__( 'Build with the free theme and plugin today. At launch, activate Pro under Aegis → License and switch on the features you need.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons">
<!-- wp:button {"backgroundColor":"neutral-800","iconSet":"remixicon","iconName":"download-2-line","iconSize":"16px","iconPosition":"end"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-neutral-800-background-color has-background wp-element-button" href="<?php echo esc_url( home_url( '/download/#aegis-plugin' ) ); ?>"><?php echo esc_html__( 'Download the free plugin', 'aegis' ); ?></a></div>
<!-- /wp:button -->
<!-- wp:button {"className":"is-style-ghost","iconSet":"remixicon","iconName":"price-tag-3-line","iconSize":"16px","iconPosition":"end"} -->
<div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/pro/#pricing' ) ); ?>"><?php echo esc_html__( 'See planned pricing', 'aegis' ); ?></a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
<!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"14"} -->
<p class="has-text-align-center has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'Planned: 30-day money-back guarantee · 1 year of updates and support · Pro keeps working if your license lapses', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
