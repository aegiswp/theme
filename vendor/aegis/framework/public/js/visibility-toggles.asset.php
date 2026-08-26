<?php
/**
 * Visibility toggles editor script asset file.
 *
 * @package Aegis\Framework
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return array(
	'dependencies' => array(
		'wp-blocks',
		'wp-components',
		'wp-compose',
		'wp-element',
		'wp-hooks',
		'wp-i18n',
		'wp-block-editor',
	),
	'version'      => '20260709070300',
);
