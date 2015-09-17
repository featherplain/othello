<?php
/**
 * othello Theme Customizer.
 *
 * @package othello
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function othello_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'othello_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function othello_customize_preview_js() {
	wp_enqueue_script( 'othello_customizer', get_template_directory_uri() . '/assets/js/script.min.js', array( 'customize-preview' ), '20150916', true );
}
add_action( 'customize_preview_init', 'othello_customize_preview_js' );
