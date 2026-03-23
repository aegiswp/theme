<?php
/**
 * Post Conditions Renderer
 *
 * Evaluates page/post-level conditional logic stored in `_aegis_conditions`
 * meta and hides post content when conditions are not met.
 *
 * Hook-pattern CPT rendering has been moved to the aegis-pro plugin.
 * This class now only handles the post-content visibility filter.
 *
 * @package    Aegis
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 */

declare( strict_types=1 );

namespace Aegis;

use function add_filter;
use function get_post_type;
use function get_the_ID;

/**
 * Hook Patterns Renderer Class
 *
 * Registers the post-content conditions filter on the frontend.
 */
class HookPatternsRenderer {

	/**
	 * Conditions evaluator.
	 *
	 * @var ConditionsEvaluator
	 */
	private ConditionsEvaluator $evaluator;

	/**
	 * Initialize the renderer.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function init(): void {
		$this->evaluator = new ConditionsEvaluator();
		$this->register_post_conditions();
	}

	/**
	 * Register a render_block filter that evaluates page/post-level
	 * conditional logic stored in `_aegis_conditions` meta.
	 *
	 * When conditions fail, the post content block is replaced with an
	 * empty string, effectively hiding the page/post from the visitor.
	 *
	 * Hook patterns are excluded — they have their own evaluation path
	 * in the aegis-pro plugin.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	private function register_post_conditions(): void {
		$evaluator = $this->evaluator;

		add_filter( 'render_block', static function ( string $block_content, array $block ) use ( $evaluator ): string {
			if ( ( $block['blockName'] ?? '' ) !== 'core/post-content' ) {
				return $block_content;
			}

			$post_id = get_the_ID();
			if ( ! $post_id || get_post_type( $post_id ) === 'aegis_hook_pattern' ) {
				return $block_content;
			}

			if ( ! $evaluator->should_render_pattern( $post_id ) ) {
				return '';
			}

			return $block_content;
		}, 9, 2 );
	}
}
