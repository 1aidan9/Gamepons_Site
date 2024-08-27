<?php

if ( ! function_exists('motts_portfolio_cpt') ) {

// Register Custom Post Type
	function motts_portfolio_cpt() {

		$labels = array(
			'name'                  => _x( 'Portfolios', 'Post Type General Name', 'themezinho' ),
			'singular_name'         => _x( 'Portfolio', 'Post Type Singular Name', 'themezinho' ),
			'menu_name'             => __( 'Portfolios', 'themezinho' ),
			'name_admin_bar'        => __( 'Portfolio', 'themezinho' ),
			'archives'              => __( 'Portfolio Archives', 'themezinho' ),
			'attributes'            => __( 'Portfolio Attributes', 'themezinho' ),
			'parent_item_colon'     => __( 'Parent Portfolio:', 'themezinho' ),
			'all_items'             => __( 'All Portfolios', 'themezinho' ),
			'add_new_item'          => __( 'Add New Portfolio', 'themezinho' ),
			'add_new'               => __( 'Add New', 'themezinho' ),
			'new_item'              => __( 'New Portfolio', 'themezinho' ),
			'edit_item'             => __( 'Edit Portfolio', 'themezinho' ),
			'update_item'           => __( 'Update Portfolio', 'themezinho' ),
			'view_item'             => __( 'View Portfolio', 'themezinho' ),
			'view_items'            => __( 'View Portfolios', 'themezinho' ),
			'search_items'          => __( 'Search Portfolio', 'themezinho' ),
			'not_found'             => __( 'Not found', 'themezinho' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'themezinho' ),
			'featured_image'        => __( 'Featured Image', 'themezinho' ),
			'set_featured_image'    => __( 'Set featured image', 'themezinho' ),
			'remove_featured_image' => __( 'Remove featured image', 'themezinho' ),
			'use_featured_image'    => __( 'Use as featured image', 'themezinho' ),
			'insert_into_item'      => __( 'Insert into Portfolio', 'themezinho' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Portfolio', 'themezinho' ),
			'items_list'            => __( 'Portfolios list', 'themezinho' ),
			'items_list_navigation' => __( 'Portfolios list navigation', 'themezinho' ),
			'filter_items_list'     => __( 'Filter Portfolios list', 'themezinho' ),
		);
		$args = array(
			'label'                 => __( 'Portfolio', 'themezinho' ),
			'description'           => __( 'Portfolio Description', 'themezinho' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-welcome-view-site',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'portfolio', $args );

	}
	add_action( 'init', 'motts_portfolio_cpt', 0 );

}

if ( ! function_exists( 'motts_portfolio_tag_taxonomy' ) ) {

// Register Custom Taxonomy
	function motts_portfolio_tag_taxonomy() {

		$labels = array(
			'name'                       => _x( 'Tags', 'Taxonomy General Name', 'themezinho' ),
			'singular_name'              => _x( 'Tag', 'Taxonomy Singular Name', 'themezinho' ),
			'menu_name'                  => __( 'Tags', 'themezinho' ),
			'all_items'                  => __( 'All Tags', 'themezinho' ),
			'parent_item'                => __( 'Parent Tag', 'themezinho' ),
			'parent_item_colon'          => __( 'Parent Tag:', 'themezinho' ),
			'new_item_name'              => __( 'New Tag Name', 'themezinho' ),
			'add_new_item'               => __( 'Add New Tag', 'themezinho' ),
			'edit_item'                  => __( 'Edit Tag', 'themezinho' ),
			'update_item'                => __( 'Update Tag', 'themezinho' ),
			'view_item'                  => __( 'View Tag', 'themezinho' ),
			'separate_items_with_commas' => __( 'Separate tags with commas', 'themezinho' ),
			'add_or_remove_items'        => __( 'Add or remove tags', 'themezinho' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'themezinho' ),
			'popular_items'              => __( 'Popular tags', 'themezinho' ),
			'search_items'               => __( 'Search Tags', 'themezinho' ),
			'not_found'                  => __( 'Not Found', 'themezinho' ),
			'no_terms'                   => __( 'No tags', 'themezinho' ),
			'items_list'                 => __( 'Tags list', 'themezinho' ),
			'items_list_navigation'      => __( 'Tags list navigation', 'themezinho' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => false,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
		);
		register_taxonomy( 'portfolio_tag', array( 'portfolio' ), $args );

	}
	add_action( 'init', 'motts_portfolio_tag_taxonomy', 0 );

}

if ( ! function_exists('motts_hero_cpt') ) {

// Register Custom Post Type
	function motts_hero_cpt() {

		$labels = array(
			'name'                  => _x( 'Hero Banners', 'Post Type General Name', 'themezinho' ),
			'singular_name'         => _x( 'Hero Banner', 'Post Type Singular Name', 'themezinho' ),
			'menu_name'             => __( 'Hero Banners', 'themezinho' ),
			'name_admin_bar'        => __( 'Hero Banner', 'themezinho' ),
			'archives'              => __( 'Hero Banner Archives', 'themezinho' ),
			'attributes'            => __( 'Hero Banner Attributes', 'themezinho' ),
			'parent_item_colon'     => __( 'Parent Hero Banner:', 'themezinho' ),
			'all_items'             => __( 'All Hero Banners', 'themezinho' ),
			'add_new_item'          => __( 'Add New Hero Banner', 'themezinho' ),
			'add_new'               => __( 'Add New', 'themezinho' ),
			'new_item'              => __( 'New Hero Banner', 'themezinho' ),
			'edit_item'             => __( 'Edit Hero Banner', 'themezinho' ),
			'update_item'           => __( 'Update Hero Banner', 'themezinho' ),
			'view_item'             => __( 'View Hero Banner', 'themezinho' ),
			'view_items'            => __( 'View Hero Banners', 'themezinho' ),
			'search_items'          => __( 'Search Hero Banner', 'themezinho' ),
			'not_found'             => __( 'Not found', 'themezinho' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'themezinho' ),
			'featured_image'        => __( 'Featured Image', 'themezinho' ),
			'set_featured_image'    => __( 'Set featured image', 'themezinho' ),
			'remove_featured_image' => __( 'Remove featured image', 'themezinho' ),
			'use_featured_image'    => __( 'Use as featured image', 'themezinho' ),
			'insert_into_item'      => __( 'Insert into Hero Banner', 'themezinho' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Hero Banner', 'themezinho' ),
			'items_list'            => __( 'Hero Banners list', 'themezinho' ),
			'items_list_navigation' => __( 'Hero Banners list navigation', 'themezinho' ),
			'filter_items_list'     => __( 'Filter Hero Banners list', 'themezinho' ),
		);
		$args = array(
			'label'                 => __( 'Hero Banner', 'themezinho' ),
			'description'           => __( 'Hero Banner Description', 'themezinho' ),
			'labels'                => $labels,
			'supports'              => array( 'title' ),
			'hierarchical'          => true,
			'public'                => false,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-welcome-widgets-menus',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => true,
			'publicly_queryable'    => false,
			'capability_type'       => 'page',
		);
		register_post_type( 'hero', $args );

	}
	add_action( 'init', 'motts_hero_cpt', 0 );

}

if ( ! function_exists('motts_team_cpt') ) {

// Register Custom Post Type
function motts_team_cpt() {

	$labels = array(
		'name'                  => _x( 'Team Members', 'Post Type General Name', 'themezinho' ),
		'singular_name'         => _x( 'Team Member', 'Post Type Singular Name', 'themezinho' ),
		'menu_name'             => __( 'Team Members', 'themezinho' ),
		'name_admin_bar'        => __( 'Team Member', 'themezinho' ),
		'archives'              => __( 'Team Archives', 'themezinho' ),
		'attributes'            => __( 'Team Attributes', 'themezinho' ),
		'parent_item_colon'     => __( 'Parent Team:', 'themezinho' ),
		'all_items'             => __( 'All Team Members', 'themezinho' ),
		'add_new_item'          => __( 'Add New Team Member', 'themezinho' ),
		'add_new'               => __( 'Add New', 'themezinho' ),
		'new_item'              => __( 'New Team Member', 'themezinho' ),
		'edit_item'             => __( 'Edit Team Member', 'themezinho' ),
		'update_item'           => __( 'Update Team Member', 'themezinho' ),
		'view_item'             => __( 'View Team Member', 'themezinho' ),
		'view_items'            => __( 'View Team Members', 'themezinho' ),
		'search_items'          => __( 'Search Team Member', 'themezinho' ),
		'not_found'             => __( 'Not found', 'themezinho' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'themezinho' ),
		'featured_image'        => __( 'Featured Image', 'themezinho' ),
		'set_featured_image'    => __( 'Set featured image', 'themezinho' ),
		'remove_featured_image' => __( 'Remove featured image', 'themezinho' ),
		'use_featured_image'    => __( 'Use as featured image', 'themezinho' ),
		'insert_into_item'      => __( 'Insert into Team', 'themezinho' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'themezinho' ),
		'items_list'            => __( 'Team Members list', 'themezinho' ),
		'items_list_navigation' => __( 'Team Members list navigation', 'themezinho' ),
		'filter_items_list'     => __( 'Filter Team Members list', 'themezinho' ),
	);
	$args = array(
		'label'                 => __( 'Team Member', 'themezinho' ),
		'description'           => __( 'Team Member Description', 'themezinho' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => false,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-networking',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'team', $args );

}
add_action( 'init', 'motts_team_cpt', 0 );

}

add_filter( 'gettext','motts_team_member_custom_title' );

function motts_team_member_custom_title( $input ) {

    global $post_type;

    if( is_admin() && 'Enter title here' == $input && 'team' == $post_type )
        return 'Enter Team member full name';

    return $input;
}