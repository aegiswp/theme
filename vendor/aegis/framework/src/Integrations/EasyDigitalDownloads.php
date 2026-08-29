<?php
/**
 * Easy Digital Downloads integration component.
 *
 * @package    Aegis\Framework\Integrations
 * @since      1.0.0
 */

declare( strict_types=1 );

namespace Aegis\Framework\Integrations;

use Aegis\Container\Interfaces\Conditional;
use Aegis\Framework\InlineAssets\Styleable;
use Aegis\Framework\InlineAssets\Styles;
use function class_exists;
use function defined;

class EasyDigitalDownloads implements Conditional, Styleable {

	public static function condition(): bool {
		return class_exists( 'Easy_Digital_Downloads' );
	}

	public function styles( Styles $styles ): void {
		$styles->add_file(
			'plugins/edd/edd.css',
			[
				'edd-blocks',
				'wp-block-edd',
				'edd-submit',
				'edd_download',
			]
		);

		if ( defined( 'EDD_FES_FILE' ) || class_exists( 'EDD_Front_End_Submissions' ) ) {
			$styles->add_file(
				'plugins/edd/edd-fes.css',
				[
					'fes-vendor-dashboard-wrap',
					'edd-fes',
				]
			);
		}
	}
}
