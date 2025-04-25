<?php
/**
 * Title: 01. Event Pattern
 * Slug: aegis/event-01
 * Categories: events
 * Description: Block pattern featuring an event layout with a centered tagline, heading, event description, video content, dynamic event query, and social links.
 * Keywords: event, video, query, social, layout, call-to-action
 * Viewport Width: 1400
 * Block Types: core/group, core/columns, core/column, core/paragraph, core/heading, core/video, core/query, core/buttons, core/social-links
 * Inserter: true
 *
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"01. Event Pattern","categories":["events"],"patternName":"aegis/event-01"},"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}}},"gradient":"diagonal-transparent-to-large-tertiary-left-top","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull has-diagonal-transparent-to-large-tertiary-left-top-gradient-background has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--20)"><!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"},"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--20);margin-bottom:var(--wp--preset--spacing--20)"><!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"500"}},"fontSize":"small"} -->
<p class="has-text-align-left has-small-font-size" style="font-style:normal;font-weight:500;letter-spacing:3px;text-transform:uppercase"><?php echo esc_html_x('Upcoming Events', 'Section tagline for events', 'aegis'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"xx-large"} -->
<h3 class="wp-block-heading has-xx-large-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;text-transform:uppercase"><?php echo esc_html_x('Join Our Next Event', 'Section heading for events', 'aegis'); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}}} -->
<p class="has-text-align-center" style="margin-top:var(--wp--preset--spacing--20);margin-bottom:var(--wp--preset--spacing--20)"><?php echo esc_html__('Discover our upcoming events designed to connect, inspire, and engage our community. Stay tuned for exciting experiences and opportunities to participate.', 'aegis'); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:columns {"align":"wide","style":{"spacing":{"padding":{"bottom":"0","top":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"},"blockGap":{"top":"var:preset|spacing|20","left":"var:preset|spacing|20"}}}} -->
<div class="wp-block-columns alignwide" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:column {"verticalAlignment":"top","width":"","className":"is-style-default","style":{"spacing":{"padding":{"top":"0","bottom":"0"}}}} -->
<div class="wp-block-column is-vertically-aligned-top is-style-default" style="padding-top:0;padding-bottom:0"><!-- wp:video -->
<figure class="wp-block-video"><video controls poster="<?php echo esc_url( get_theme_file_uri( 'assets/images/thumb_1200x1920_dark.webp' ) ); ?>" src="<?php echo esc_url( get_theme_file_uri( 'assets/videos/sample.mp4' ) ); ?>" playsinline></video></figure>
<!-- /wp:video --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}}} -->
<div class="wp-block-column is-vertically-aligned-center" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:query {"queryId":2,"query":{"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"perPage":3},"enhancedPagination":true,"align":"wide"} -->
<div class="wp-block-query alignwide"><!-- wp:post-template {"layout":{"type":"default"}} -->
<!-- wp:columns {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
<div class="wp-block-columns" style="margin-top:0;margin-bottom:0"><!-- wp:column {"verticalAlignment":"center","width":"10em","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"spacing":{"padding":{"right":"var:preset|spacing|10","left":"var:preset|spacing|10","top":"var:preset|spacing|10","bottom":"var:preset|spacing|10"}}},"backgroundColor":"contrast","textColor":"base"} -->
<div class="wp-block-column is-vertically-aligned-center has-base-color has-contrast-background-color has-text-color has-background has-link-color" style="padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10);flex-basis:10em"><!-- wp:post-date {"textAlign":"left","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"backgroundColor":"foreground","textColor":"background","fontSize":"small"} /--></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|10","right":"var:preset|spacing|10"}}}} -->
<div class="wp-block-column is-vertically-aligned-center" style="padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)"><!-- wp:post-title {"level":4,"isLink":true,"className":"is-style-aegis-post-title-hide-underline is-style-hide-underline","style":{"spacing":{"padding":{"top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"}}}} /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:separator {"className":"is-style-default","backgroundColor":"foreground"} -->
<hr class="wp-block-separator has-text-color has-foreground-color has-alpha-channel-opacity has-foreground-background-color has-background is-style-default"/>
<!-- /wp:separator -->
<!-- /wp:post-template -->

<!-- wp:buttons {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"layout":{"type":"flex","justifyContent":"left"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"foreground","width":100,"className":"is-style-dark-shadow is-style-dense-shadow"} -->
<div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-dark-shadow is-style-dense-shadow"><a class="wp-block-button__link has-foreground-background-color has-background wp-element-button" href="#"><?php echo esc_html_x('View Event Details', 'Event call-to-action button text', 'aegis'); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:query --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--20);padding-right:0;padding-bottom:var(--wp--preset--spacing--20);padding-left:0"><!-- wp:social-links {"iconColor":"foreground","iconColorValue":"#1c1c1e","size":"has-normal-icon-size","className":"is-style-logos-only","style":{"spacing":{"blockGap":"20px","margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
<ul class="wp-block-social-links has-normal-icon-size has-icon-color is-style-logos-only" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--30)"><!-- wp:social-link {"url":"#","service":"facebook","label":"<?php echo esc_html_x('Facebook', 'Social link label', 'aegis'); ?>"} /-->

<!-- wp:social-link {"url":"#","service":"meetup","label":"<?php echo esc_html_x('Meetup', 'Social link label', 'aegis'); ?>"} /-->

<!-- wp:social-link {"url":"#","service":"bandcamp"} /-->

<!-- wp:social-link {"url":"#","service":"discord"} /-->

<!-- wp:social-link {"url":"#","service":"twitch"} /-->

<!-- wp:social-link {"url":"#","service":"patreon","label":"<?php echo esc_html_x('Patreon', 'Social link label', 'aegis'); ?>"} /-->

<!-- wp:social-link {"url":"#","service":"google","label":"<?php echo esc_html_x('Google', 'Social link label', 'aegis'); ?>"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
