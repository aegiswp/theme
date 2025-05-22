<?php
/**
 * Title: 02. Audio Pattern
 * Slug: aegis/audio-02
 * Categories: audio
 * Description: Block pattern featuring an episode number over a cover image on the left, and a tagline, heading, audio player, concise description, and social links on the right.
 * Keywords: audio, cover, episode, heading, social, tagline
 * Viewport Width: 1400
 * Block Types: core/audio, core/button, core/buttons, core/column, core/columns, core/cover, core/group, core/heading, core/image, core/paragraph, core/social-link, core/social-links
 * Inserter: true
 *
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"02. Audio Pattern","categories":["audio"],"patternName":"aegis/audio-02"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}}},"textColor":"background","gradient":"diagonal-primary-to-transparent-left-bottom","layout":{"type":"default"}} -->
<div class="wp-block-group has-background-color has-diagonal-primary-to-transparent-left-bottom-gradient-background has-text-color has-background" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">
	<!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"}}},"gradient":"diagonal-tertiary-to-transparent-left-top"} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center has-diagonal-tertiary-to-transparent-left-top-gradient-background has-background" style="padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
		<!-- wp:column {"verticalAlignment":"center","width":"30%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:30%">
			<!-- wp:cover {"url":"<?php echo esc_url(get_theme_file_uri('assets/images/thumb_800x800_light.webp')); ?>","alt":"<?php echo esc_attr__( 'Placeholder image. Replace with your own image and descriptive alt text.', 'aegis' ); ?>","dimRatio":70,"overlayColor":"foreground","isUserOverlayColor":true,"minHeight":370,"minHeightUnit":"px","contentPosition":"center center","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}},"border":{"width":"2px"},"dimensions":{"aspectRatio":"1"},"shadow":"var:preset|shadow|primary-solid-shadow-left-bottom"},"borderColor":"background"} -->
			<div class="wp-block-cover has-border-color has-background-border-color" style="border-width:2px;padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70);box-shadow:var(--wp--preset--shadow--primary-solid-shadow-left-bottom);min-height:370px"><span aria-hidden="true" class="wp-block-cover__background has-foreground-background-color has-background-dim-70 has-background-dim"></span><img class="wp-block-cover__image-background" alt="<?php echo esc_attr__( 'Placeholder image. Replace with your own image and descriptive alt text.', 'aegis' ); ?>" src="<?php echo esc_url(get_theme_file_uri('assets/images/thumb_800x800_light.webp')); ?>" data-object-fit="cover" />
				<div class="wp-block-cover__inner-container">
					<!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1","fontStyle":"normal","fontWeight":"100","fontSize":"10rem"}}} -->
					<p class="has-text-align-center" style="font-size:10rem;font-style:normal;font-weight:100;line-height:1"><?php echo esc_attr__('01', 'aegis'); ?></p>
					<!-- /wp:paragraph -->
				</div>
			</div>
			<!-- /wp:cover -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"70%","style":{"spacing":{"padding":{"left":"0","right":"0","top":"0","bottom":"0"},"blockGap":"0"}}} -->
		<div class="wp-block-column is-vertically-aligned-center" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;flex-basis:70%">
			<!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"500"},"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"textColor":"foreground","fontSize":"small"} -->
			<p class="has-text-align-left has-foreground-color has-text-color has-link-color has-small-font-size" style="font-style:normal;font-weight:500;letter-spacing:3px;text-transform:uppercase"><?php echo esc_attr__('Podcast Series', 'aegis'); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":3,"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"textColor":"foreground","fontSize":"xx-large"} -->
			<h3 class="wp-block-heading has-foreground-color has-text-color has-link-color has-xx-large-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;text-transform:uppercase"><?php echo esc_attr__('Episode Title', 'aegis'); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|small"}}},"textColor":"foreground"} -->
			<p class="has-foreground-color has-text-color" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--small)"><?php echo esc_attr__('Provide a concise description, up to 60 characters, summarizing this episode.', 'aegis'); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20)"><!-- wp:image {"width":"70px","aspectRatio":"1","scale":"cover","sizeSlug":"large","linkDestination":"none","align":"center","className":"is-resized is-style-rounded","style":{"color":{"duotone":"unset"},"border":{"width":"2px"}},"borderColor":"quaternary"} -->
				<figure class="wp-block-image aligncenter size-large is-resized has-custom-border is-style-rounded"><img src="<?php echo esc_url(get_theme_file_uri('assets/images/thumb_800x800_dark.webp')); ?>" alt="<?php echo esc_attr__( 'Placeholder image. Replace with your own image and descriptive alt text.', 'aegis' ); ?>" class="has-border-color has-quaternary-border-color" style="border-width:2px;aspect-ratio:1;object-fit:cover;width:70px" /></figure>
				<!-- /wp:image -->

				<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
				<div class="wp-block-group">
					<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"textColor":"foreground","fontSize":"medium"} -->
					<p class="has-foreground-color has-text-color has-medium-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><?php echo esc_attr__('Host', 'aegis'); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"textColor":"foreground","fontSize":"small"} -->
					<p class="has-foreground-color has-text-color has-small-font-size"><?php echo esc_attr__('Host Name', 'aegis'); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->

			<!-- wp:audio {"style":{"spacing":{"margin":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}}} -->
			<figure style="margin-top:var(--wp--preset--spacing--20);margin-bottom:var(--wp--preset--spacing--20)" class="wp-block-audio"><audio controls src="<?php echo esc_url(get_theme_file_uri('assets/audios/sample.mp3')); ?>" preload="metadata"></audio></figure>
			<!-- /wp:audio -->

			<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","orientation":"horizontal"}} -->
			<div class="wp-block-group">
				<!-- wp:social-links {"iconColor":"foreground","iconColorValue":"#1c1c1e","className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"left","orientation":"horizontal"}} -->
				<ul class="wp-block-social-links has-icon-color is-style-logos-only">
					<!-- wp:social-link {"url":"#","service":"spotify","label":"Listen on Spotify"} /-->

					<!-- wp:social-link {"url":"#","service":"youtube","label":"Watch on YouTube"} /-->

					<!-- wp:social-link {"url":"#","service":"soundcloud","label":"Listen on SoundCloud"} /-->

					<!-- wp:social-link {"url":"#","service":"twitch","label":"Twitch"} /-->

					<!-- wp:social-link {"url":"#","service":"feed","label":"Subscribe via RSS"} /-->
				</ul>
				<!-- /wp:social-links -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
