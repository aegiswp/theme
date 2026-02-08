/**
 * Modal Block - Save Component
 *
 * Returns InnerBlocks.Content for server-side rendering.
 *
 * @package Aegis
 * @since   1.0.0
 */

import { InnerBlocks } from '@wordpress/block-editor';

export default function save() {
	return <InnerBlocks.Content />;
}
