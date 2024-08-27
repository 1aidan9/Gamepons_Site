<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Atheus
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function atheus_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	if( !atheus_get_option( 'enable_preloader' ) ) {
		$classes[] = 'no-preloader';
	}
	
	if( !atheus_get_option( 'enable_text_split_effect' ) ) {
		$classes[] = 'no-split';
	}

	$nav_menu_type = ( atheus_get_option( 'nav_menu_type' ) ) ? 'body-' . atheus_get_option( 'nav_menu_type' ) . '-menu' : 'body-horizontal-menu' ;
	$classes[] = $nav_menu_type;

	return $classes;
}
add_filter( 'body_class', 'atheus_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function atheus_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'atheus_pingback_header' );