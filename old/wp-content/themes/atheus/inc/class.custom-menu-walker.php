<?php

class Hamburger_Menu_Walker extends Walker_Nav_Menu {

	function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {

		$permalink = $item->url;
		$classes[] = 'menu-item';
		if ( $args->walker->has_children ) {
			$classes[] = 'has-dropdown';
		}


		$output .= "<li class='". esc_attr( implode( ' ', $classes ) ) ."'>";
		if( $item->target ) {
			$output .= '<a target="' . $item->target . '" href="' . $permalink . '">';
		}
		else {
			$output .= '<a href="' . $permalink . '">';
		}
		$output .= $item->title;
		$output .= '</a>';

	}

	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$output .= "<ul class='dropdown'>";
	}

}
