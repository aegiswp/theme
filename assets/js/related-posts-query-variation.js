/**
 * Remove the legacy Query Loop "Related Posts" variation from the inserter.
 * Use the theme block `aegis/related-posts` instead. Advanced Query Loop
 * related querying remains available via Aegis Pro (`aegisProRelatedPosts`).
 *
 * Runs after the framework editor script registers the variation.
 *
 * @package Aegis
 * @since   1.0.3
 */
( function ( wp ) {
	'use strict';

	const { unregisterBlockVariation } = wp.blocks;
	const VARIATION_NAME = 'related-posts';

	try {
		unregisterBlockVariation( 'core/query', VARIATION_NAME );
	} catch ( e ) {
		// Variation may already be absent on some builds.
	}
} )( window.wp );
