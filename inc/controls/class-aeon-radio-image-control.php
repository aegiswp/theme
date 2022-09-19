<?php
/**
 * The Radio_Image Customizer control.
 *
 * @package Aeon
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Aeon_Radio_Image_Control' ) ) {
	/**
	 * Control class.
	 */
	class Aeon_Radio_Image_Control extends WP_Customize_Control {
		/**
		 * The control type.
		 *
		 * @access public
		 * @var string
		 */
		public $type = 'aeon-radio-image';

		/**
		 * Additional arguments passed to JavaScript.
		 *
		 * @var array
		 */
		public $content;

		/**
		 * Additional arguments passed to JavaScript.
		 *
		 * @var array
		 */
		public $default = '';

		/**
		 * Additional arguments passed to JavaScript.
		 *
		 * @var array
		 */
		public $id = '';

		/**
		 * Additional arguments passed to JavaScript.
		 *
		 * @var array
		 */
		public $choices = array();
	
		/**
		 * Refresh the parameters passed to the JavaScript via JSON.
		 *
		 * @since 3.4.0
		 * @uses WP_Customize_Control::to_json()
		 */
		public function to_json() {
			parent::to_json();
			$this->json['content'] = $this->content;
			$this->json['default'] = $this->default;
			$this->json['id'] = $this->id;
			$this->json['choices'] = $this->choices;

			if ( isset( $this->json['choices'] ) && is_array( $this->json['choices'] ) ) {
				foreach ( $this->json['choices'] as $key => $value ) {
					$this->json['choices'][ $key ] = $value['icon'];
					$this->json['choices_titles'][ $key ] = $value['label'];
				}
			}
		}
	}
}
