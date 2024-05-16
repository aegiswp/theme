<?php
/**
 * Block Patterns
 *
 * @link https://developer.wordpress.org/reference/functions/register_block_pattern/
 *
 * @package WordPress
 * @subpackage Aegis
 * @since 1.0.0
 */

/**
 * Register Block Pattern Categories.
 *
 * @since 1.0.0
 * @return void
 */
if ( ! function_exists( 'aegis_pattern_categories' ) ) :

    function aegis_pattern_categories() {

        // Registers About Pattern Category.
        register_block_pattern_category(
            'about',
            array(
                'label'       => _x( 'About', 'Block pattern category' ),
                'description' => __( 'A collection of About Patterns.' ),
            ),
        );

        // Registers Audio Pattern Category.
        register_block_pattern_category(
            'audio',
            array(
                'label'       => _x( 'Audio', 'Block pattern category' ),
                'description' => __( 'A collection of Audio Patterns.' ),
            ),
        );

        // Registers Blog Pattern Category.
        register_block_pattern_category(
            'blog',
            array(
                'label'       => _x( 'Blog', 'Block pattern category' ),
                'description' => __( 'A collection of Blog Patterns.' ),
            ),
        );

        // Registers eCommerce Pattern Category.
        register_block_pattern_category(
            'ecommerce',
            array(
                'label'       => _x( 'eCommerce', 'Block pattern category' ),
                'description' => __( 'A collection of eCommerce Patterns.' ),
            ),
        );

        // Registers Events Pattern Category.
        register_block_pattern_category(
            'events',
            array(
                'label'       => _x( 'Events', 'Block pattern category' ),
                'description' => __( 'A collection of Events Patterns.' ),
            ),
        );

        // Registers FAQ Pattern Category.
        register_block_pattern_category(
            'faq',
            array(
                'label'       => _x( 'FAQ', 'Block pattern category' ),
                'description' => __( 'A collection of FAQ Patterns.' ),
            ),
        );

        // Registers Hero Pattern Category.
        register_block_pattern_category(
            'hero',
            array(
                'label'       => _x( 'Hero', 'Block pattern category' ),
                'description' => __( 'A collection of Hero Patterns.' ),
            ),
        );

        // Registers Pricing Category.
        register_block_pattern_category(
            'pricing',
            array(
                'label'       => _x( 'Pricing', 'Block pattern category' ),
                'description' => __( 'A collection of Pricing Patterns.' ),
            ),
        );

        // Registers Video Category.
        register_block_pattern_category(
            'video',
            array(
                'label'       => _x( 'Video', 'Block pattern category' ),
                'description' => __( 'A collection of Video Patterns.' ),
            ),
        );
    }
endif;

add_action( 'init', 'aegis_pattern_categories' );