<?php

/**
 * The Disable Google Fonts Plugin
 *
 * Disable enqueuing of Open Sans and other fonts used by WordPress from Google.
 *
 * @package Disable_Google_Fonts
 * @subpackage Main
 */

/**
 * Plugin Name: Disable Google Fonts
 * Plugin URI:  http://blog.milandinic.com/wordpress/plugins/disable-google-fonts/
 * Description: Disable enqueuing of Open Sans and other fonts used by WordPress from Google.
 * Author:      Milan Dinić
 * Author URI:  http://blog.milandinic.com/
 * Version:     1.0
 * License:     GPL
 */

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) exit;

function google_fonts_load_disable( $styles ) {
    $styles->add( 'open-sans', '' ); // Backend
    $styles->add( 'twentyfourteen-lato', '' ); // Themes ...
    $styles->add( 'twentythirteen-fonts', '' );
    $styles->add( 'twentytwelve-fonts', '' );
}
add_action( 'wp_default_styles', 'google_fonts_load_disable', 5 );
