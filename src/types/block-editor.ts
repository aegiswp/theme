/**
 * Types for the parts of the block editor data store that theme blocks read.
 *
 * `@wordpress/block-editor` ships no complete type declarations, so these
 * describe only the selectors the blocks call. Import with `import type`.
 *
 * @package
 */

import type { Block } from '@wordpress/blocks';

export type EditorBlock = Block;

export type BlockEditorSelectors = {
	getBlock: ( clientId: string ) => EditorBlock | null;
	getBlockCount: ( rootClientId?: string ) => number;
	getBlockRootClientId: ( clientId: string ) => string | null;
	getBlocks: ( rootClientId?: string ) => EditorBlock[];
	getBlocksByName?: ( blockName: string ) => string[];
	getSelectedBlockClientId: () => string | null;
};
