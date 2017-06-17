<?php
/**
 * @package    GardenHarvest
 * @version    1.0.0
 * @author     Jenny Ragan <jenny@jennyragan.com>
 * @copyright  Copyright (c) 2017, Jenny Ragan
 * @link
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/* Add the child theme setup function to the 'after_setup_theme' hook. */
add_action( 'after_setup_theme', 'garden_harvest_theme_setup' );

/**
 * Setup function. 
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function garden_harvest_theme_setup() {

	/*
	 * Add a custom background to overwrite the defaults.
	 *
	 * @link http://codex.wordpress.org/Custom_Backgrounds
	 */
	add_theme_support(
		'custom-background',
		array(
			'default-color' => '222702',
			'default-image' => '',
		)
	);

	/*
	 * Add a custom header to overwrite the defaults.  
	 *
	 * @link http://codex.wordpress.org/Custom_Headers
	 */
	add_theme_support( 
		'custom-header', 
		array(
			'default-text-color' => '3E0205',
			'default-image'      => '%2$s/images/headers/tomatoes.jpg',
			'random-default'     => false,
		)
	);

	/* Registers default headers for the theme. */
	register_default_headers(
		array(
			'tomatoes' => array(
				'url'           => '%2$s/images/headers/tomatoes.jpg',
				'thumbnail_url' => '%2$s/images/headers/tomatoes-thumb.jpg',
				/* Translators: Header image description. */
				'description'   => __( 'Cherry Tomatoes', 'garden-harvest' )
			)
		)
	);


	/* Add a custom default color for the "primary" color option. */
	add_filter( 'theme_mod_color_primary', 'garden_harvest_color_primary' );

	/* register custom fonts */
	add_action( 'wp_enqueue_scripts', 'garden_harvest_styles' );

	add_editor_style( array( 'https://fonts.googleapis.com/css?family=Courgette:400' ) );
}

/**
 * Add a default custom color for the theme's "primary" color option.
 *
 * @since  0.1.0
 * @access public
 * @param  string  $hex
 * @return string
 */
function garden_harvest_color_primary( $hex ) {
	return $hex ? $hex : '750300';
}

/**
 * Registers google fonts for the front end.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function garden_harvest_styles() {
	wp_enqueue_style( 
		'garden-harvest-fonts',
		'https://fonts.googleapis.com/css?family=Courgette:400'
	);
}