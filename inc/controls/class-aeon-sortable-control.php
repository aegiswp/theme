<?php
/**
 * The Sortable Customizer control.
 *
 * @package Aeon
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Aeon_Sortable_Control' ) ) {
	/**
	 * Control class.
	 */
	class Aeon_Sortable_Control extends WP_Customize_Control {
		/**
		 * The control type.
		 *
		 * @access public
		 * @var string
		 */
		public $type = 'aeon-sortable';

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
		public $choices = array();

		/**
		 * Additional arguments passed to JavaScript.
		 *
		 * @var array
		 */
		public $input_attrs = array();

		/**
		 * Custom control class.
		 *
		 * @access public
		 * @var string
		 */
		public $custom_class = '';
	
		/**
		 * Refresh the parameters passed to the JavaScript via JSON.
		 *
		 * @since 3.4.0
		 * @uses WP_Customize_Control::to_json()
		 */
		public function to_json() {
			parent::to_json();
			$this->json['content'] = $this->content;
			$this->json['choices'] = $this->choices;
			$this->json['value'] = $this->value();
			$this->json['input_attrs'] = $this->input_attrs;
			$this->json['custom_class'] = $this->custom_class;
		}
	}
}
