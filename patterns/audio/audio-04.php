<?php
/**
 * Title: 04. Audio Pattern
 * Slug: aegis/audio-04
 * Categories: audio
 * Description: Block pattern featuring an episode number over a cover image on the left, and a tagline, heading, audio player, concise description, and social links on the right.
 * Keywords: audio, cover, episode, heading, social, tagline
 * Viewport Width: 1400
 * Block Types: core/audio, core/column, core/columns, core/cover, core/group, core/heading, core/paragraph, core/social-link, core/social-links
 * Inserter: true
 *
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"04. Audio Pattern","categories":["audio"],"patternName":"aegis/audio-04"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}}},"textColor":"background","gradient":"diagonal-primary-to-transparent-left-bottom","layout":{"type":"default"}} -->
<div class="wp-block-group has-background-color has-diagonal-primary-to-transparent-left-bottom-gradient-background has-text-color has-background" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)"><!-- wp:columns {"verticalAlignment":"center","align":"wide","className":"is-style-section-dark","style":{"spacing":{"padding":{"right":"var:preset|spacing|20","left":"var:preset|spacing|20","top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}},"gradient":"vertical-small-primary-to-contrast"} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center is-style-section-dark has-vertical-small-primary-to-contrast-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)"><!-- wp:column {"verticalAlignment":"center","width":"30%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:30%"><!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_800x800_light.webp","alt":"<?php echo esc_attr__( 'Placeholder image. Replace with your own image and descriptive alt text.', 'aegis' ); ?>","dimRatio":70,"overlayColor":"contrast","isUserOverlayColor":true,"minHeight":370,"minHeightUnit":"px","contentPosition":"center center","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}},"border":{"width":"2px"},"dimensions":{"aspectRatio":"1"}},"borderColor":"base"} -->
<div class="wp-block-cover has-border-color has-base-border-color" style="border-width:2px;padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70);min-height:370px"><img class="wp-block-cover__image-background" alt="<?php echo esc_attr__( 'Placeholder image. Replace with your own image and descriptive alt text.', 'aegis' ); ?>" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_800x800_light.webp" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim-70 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1","fontStyle":"normal","fontWeight":"100","fontSize":"10rem"}}} -->
<p class="has-text-align-center" style="font-size:10rem;font-style:normal;font-weight:100;line-height:1"><?php echo esc_html_x( '01', 'Episode number (1-3 characters recommended)', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"70%","style":{"spacing":{"padding":{"left":"0","right":"0","top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"},"blockGap":"0"}}} -->
<div class="wp-block-column is-vertically-aligned-center" style="padding-top:var(--wp--preset--spacing--20);padding-right:0;padding-bottom:var(--wp--preset--spacing--20);padding-left:0;flex-basis:70%"><!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"500"},"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"textColor":"foreground","fontSize":"small"} -->
<p class="has-text-align-left has-foreground-color has-text-color has-link-color has-small-font-size" style="font-style:normal;font-weight:500;letter-spacing:3px;text-transform:uppercase"><?php echo esc_html_x( 'Podcast Series', 'Podcast series name (15-25 characters recommended)', 'aegis' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"textColor":"foreground","fontSize":"xx-large"} -->
<h3 class="wp-block-heading has-foreground-color has-text-color has-link-color has-xx-large-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;text-transform:uppercase"><?php echo esc_html_x( 'Episode Title', 'Episode title (20-40 characters recommended)', 'aegis' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:audio {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}}} -->
<figure style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--30)" class="wp-block-audio"><audio controls src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/audios/sample.mp3" preload="metadata"></audio></figure>
<!-- /wp:audio -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|small"}}},"textColor":"foreground"} -->
<p class="has-foreground-color has-text-color" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--small)"><?php echo esc_html_x( 'Provide a concise description, up to 60 characters, summarizing this episode.', 'Episode description (60 characters recommended)', 'aegis' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"top":"0","bottom":"var:preset|spacing|20"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"right","orientation":"horizontal"}} -->
<div class="wp-block-group" style="padding-top:0;padding-bottom:var(--wp--preset--spacing--20)"><!-- wp:social-links {"iconColor":"background","iconColorValue":"#f6f5f2","iconBackgroundColor":"contrast","iconBackgroundColorValue":"#1c1c1e","size":"has-normal-icon-size","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|10","left":"var:preset|spacing|10"}}},"layout":{"type":"flex","justifyContent":"right","orientation":"horizontal"}} -->
<ul class="wp-block-social-links has-normal-icon-size has-icon-color has-icon-background-color"><!-- wp:social-link {"url":"#","service":"spotify","label":"<?php echo esc_html_x( 'Listen on Spotify', 'Social media platform accessibility label', 'aegis' ); ?>"} /-->

<!-- wp:social-link {"url":"#","service":"youtube","label":"<?php echo esc_html_x( 'Watch on YouTube', 'Social media platform accessibility label', 'aegis' ); ?>"} /-->

<!-- wp:social-link {"url":"#","service":"soundcloud","label":"<?php echo esc_html_x( 'Listen on SoundCloud', 'Social media platform accessibility label', 'aegis' ); ?>"} /-->

<!-- wp:social-link {"url":"#","service":"twitch"} /-->

<!-- wp:social-link {"url":"#","service":"feed","label":"<?php echo esc_html_x( 'Subscribe via RSS', 'Social media platform accessibility label', 'aegis' ); ?>"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
