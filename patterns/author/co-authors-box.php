<?php
/**
 * Title: Co-Authors Box
 * Slug: co-authors-box
 * Categories: author
 * Keywords: co-authors, author box, biography, avatar, multiple authors
 * Description: Author box displaying each co-author with avatar, name, and biography.
 * Viewport Width: 1280
 */
?>

<!-- wp:co-authors/block {"layout":{"type":"default"}} -->
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|md","padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md"}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md)">
	<!-- wp:co-authors/avatar {"size":72,"style":{"border":{"radius":"100%"}}} /-->

	<!-- wp:group {"style":{"spacing":{"blockGap":"0.25em"}},"layout":{"type":"flex","orientation":"vertical"}} -->
	<div class="wp-block-group">
		<!-- wp:co-authors/name {"isLink":true,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"20"} /-->

		<!-- wp:co-authors/biography {"textColor":"neutral-400","fontSize":"16"} /-->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
<!-- /wp:co-authors/block -->
