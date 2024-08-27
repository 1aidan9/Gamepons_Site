<?php

if( ! function_exists( 'atheus_register_nav_menus' ) ) {
	/**
	 * Register required nav menus
	 */
	function atheus_register_nav_menus() {

		register_nav_menus( array(
			'header' => esc_html__( 'Main menu',  'atheus' ),
		) );

	}
	add_action( 'after_setup_theme', 'atheus_register_nav_menus' );
}