<?php
/**
 * materialwp Theme Customizer
 *
 * @package materialwp
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function materialwp_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->add_setting( 'navigation_background_color',
         array(
            'default' => '#3f51b5',
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport' => 'postMessage',
        ) 
    );

    $wp_customize->add_setting( 'complimentary_color',
         array(
            'default' => '#ff5722',
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport' => 'postMessage',
        ) 
    );

    $wp_customize->add_setting( 'link_color',
         array(
            'default' => '#3f51b5',
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport' => 'postMessage',
        ) 
    );

    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'navigation_background_color', array(
		'label' => __( 'Navigation Background Color', 'materialwp' ),
		'section' => 'colors',
		'settings' => 'navigation_background_color',
	)));

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'complimentary_color', array(
		'label' => __( 'Complimentary Color', 'materialwp' ),
		'section' => 'colors',
		'settings' => 'complimentary_color',
	)));

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'link_color', array(
		'label' => __( 'Link Color', 'materialwp' ),
		'section' => 'colors',
		'settings' => 'link_color',
	)));
}
add_action( 'customize_register', 'materialwp_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function materialwp_customize_preview_js() {
	wp_enqueue_script( 'materialwp_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'materialwp_customize_preview_js' );
