<?php
/**
 * Title: Legal Disclaimer
 * Slug: disclaimer-legal
 * Categories: notice
 * Keywords: disclaimer, legal, liability, terms, law, general
 * Description: A formal general-purpose legal and liability disclaimer with a separator line.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["notice"],"patternName":"disclaimer-legal","name":"Legal Disclaimer"},"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md"}}},"layout":{"type":"constrained","contentSize":"720px"}} -->
<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md)"><!-- wp:separator {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|sm"}}},"backgroundColor":"neutral-200"} -->
	<hr class="wp-block-separator has-text-color has-neutral-200-color has-alpha-channel-opacity has-neutral-200-background-color has-background" style="margin-bottom:var(--wp--preset--spacing--sm)" />
	<!-- /wp:separator -->

	<!-- wp:heading {"level":4,"style":{"typography":{"fontStyle":"normal","fontWeight":"600","textTransform":"uppercase","letterSpacing":"0.05em"}},"fontSize":"14","textColor":"neutral-500"} -->
	<h4 class="wp-block-heading has-neutral-500-color has-text-color has-14-font-size" style="font-style:normal;font-weight:600;letter-spacing:0.05em;text-transform:uppercase"><?php echo esc_html__( 'Legal Disclaimer', 'aegis' ); ?></h4>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"style":{"typography":{"fontSize":"13px","lineHeight":"1.7"}},"textColor":"neutral-500"} -->
	<p class="has-neutral-500-color has-text-color" style="font-size:13px;line-height:1.7"><?php echo esc_html__( 'The information contained on this website is provided for informational purposes only and should not be construed as legal advice on any subject matter. No recipients of content from this site should act or refrain from acting on the basis of any content included in the site without seeking the appropriate legal or other professional advice on the particular facts and circumstances at issue from an attorney licensed in your jurisdiction.', 'aegis' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:paragraph {"style":{"typography":{"fontSize":"13px","lineHeight":"1.7"}},"textColor":"neutral-500"} -->
	<p class="has-neutral-500-color has-text-color" style="font-size:13px;line-height:1.7"><?php echo esc_html__( 'The content of this website contains general information and may not reflect current legal developments or address your particular situation. We disclaim all liability for actions you take or fail to take based on any content on this website.', 'aegis' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}},"backgroundColor":"neutral-200"} -->
	<hr class="wp-block-separator has-text-color has-neutral-200-color has-alpha-channel-opacity has-neutral-200-background-color has-background" style="margin-top:var(--wp--preset--spacing--sm)" />
	<!-- /wp:separator -->
</div>
<!-- /wp:group -->
