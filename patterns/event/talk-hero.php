<?php
/**
 * Title: Talk Hero
 * Slug: talk-hero
 * Categories: event
 * Keywords: talk, lecture, speaker, presentation, event, hero
 * Description: A dark hero section for a talk or lecture with speaker details and CTA buttons.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["event"],"patternName":"talk-hero","name":"Talk Hero"},"className":"is-style-dark","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xxl","bottom":"var:preset|spacing|xxl","left":"var:preset|spacing|lg","right":"var:preset|spacing|lg"}}},"backgroundColor":"neutral-0","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-neutral-0-background-color has-background is-style-dark" style="padding-top:var(--wp--preset--spacing--xxl);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--xxl);padding-left:var(--wp--preset--spacing--lg)">
	<!-- wp:group {"layout":{"type":"constrained","contentSize":"720px"}} -->
	<div class="wp-block-group">
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","justifyContent":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:paragraph {"className":"is-style-sub-heading","textColor":"primary-600","fontSize":"14"} -->
			<p class="is-style-sub-heading has-primary-600-color has-text-color has-14-font-size"><?php echo esc_html__( 'Public Lecture', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"textColor":"neutral-400","fontSize":"14"} -->
			<p class="has-neutral-400-color has-text-color has-14-font-size"><?php echo esc_html__( '· November 20, 2026 · 7:00 PM', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:heading {"textAlign":"center","level":1,"textColor":"neutral-950","fontSize":"48"} -->
		<h1 class="wp-block-heading has-text-align-center has-neutral-950-color has-text-color has-48-font-size"><?php echo esc_html__( 'The Architecture of Decisions', 'aegis' ); ?></h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"18"} -->
		<p class="aligncenter has-text-align-center has-neutral-500-color has-text-color has-18-font-size aligncenter"><?php echo esc_html__( 'How cognitive biases shape the systems we build — and how to design better frameworks for human judgment in an age of information overload.', 'aegis' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}}} -->
		<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--md)">
			<!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Reserve Your Seat', 'aegis' ); ?></a></div>
<!-- /wp:button -->

			<!-- wp:button {"className":"is-style-ghost"} -->
<div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Watch Previous Talks', 'aegis' ); ?></a></div>
<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->

		<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|md"},"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center","verticalAlignment":"center"}} -->
		<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--md)">
			<!-- wp:image {"width":"64px","height":"64px","aspectRatio":"1","scale":"cover","style":{"border":{"radius":"100%"},"width":{"all":"64px"}}} -->
			<figure class="wp-block-image is-resized has-custom-border" style="border-radius:100%"><img style="border-radius:100%;aspect-ratio:1;object-fit:cover;width:64px;height:64px" alt="" /></figure>
			<!-- /wp:image -->

			<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
			<div class="wp-block-group">
				<!-- wp:paragraph {"className":"is-style-heading","textColor":"neutral-950","fontSize":"16"} -->
				<p class="is-style-heading has-neutral-950-color has-text-color has-16-font-size"><?php echo esc_html__( 'Dr. Lena Voss', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"textColor":"neutral-400","fontSize":"14"} -->
				<p class="has-neutral-400-color has-text-color has-14-font-size"><?php echo esc_html__( 'Cognitive Scientist & Author', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->

		<!-- wp:separator {"className":"is-style-wide"} -->
		<hr class="wp-block-separator has-alpha-channel-opacity is-style-wide" />
		<!-- /wp:separator -->

		<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|md"}}}} -->
		<div class="wp-block-columns">
			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:paragraph {"className":"is-style-sub-heading","textColor":"neutral-400","fontSize":"12"} -->
				<p class="is-style-sub-heading has-neutral-400-color has-text-color has-12-font-size"><?php echo esc_html__( 'Venue', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"textColor":"neutral-950","fontSize":"15"} -->
				<p class="has-neutral-950-color has-text-color has-15-font-size"><?php echo esc_html__( 'Athenaeum Hall, Cambridge', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:paragraph {"className":"is-style-sub-heading","textColor":"neutral-400","fontSize":"12"} -->
				<p class="is-style-sub-heading has-neutral-400-color has-text-color has-12-font-size"><?php echo esc_html__( 'Duration', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"textColor":"neutral-950","fontSize":"15"} -->
				<p class="has-neutral-950-color has-text-color has-15-font-size"><?php echo esc_html__( '90 minutes + Q&A', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:paragraph {"className":"is-style-sub-heading","textColor":"neutral-400","fontSize":"12"} -->
				<p class="is-style-sub-heading has-neutral-400-color has-text-color has-12-font-size"><?php echo esc_html__( 'Admission', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"textColor":"neutral-950","fontSize":"15"} -->
				<p class="has-neutral-950-color has-text-color has-15-font-size"><?php echo esc_html__( 'Free · RSVP Required', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
