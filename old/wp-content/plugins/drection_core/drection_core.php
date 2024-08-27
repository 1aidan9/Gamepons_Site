<?php
/*
Plugin Name: Drection Core
Plugin URI: https://themeforest.net/user/drection/portfolio
Description: Drection Core
Author: Drection
Version: 1.1.0
Author URI: https://drection.net
*/

define( "DRECTION_CORE_PATH", plugin_dir_path( __FILE__ ) );
define( "DRECTION_CORE_URI", plugins_url( 'drection_core/'  ) );
define( "PAGE_BUILDER_GROUP", __( 'Atheus', 'drection' ) );

add_action( 'vc_before_init', 'drection_vc_addons' );
/**
* JS Composer Elements
*/

function drection_vc_addons() {
	require_once DRECTION_CORE_PATH . '/inc/js_composer/elements/address.php';
	require_once DRECTION_CORE_PATH . '/inc/js_composer/elements/client.php';
	require_once DRECTION_CORE_PATH . '/inc/js_composer/elements/contact_block.php';
	require_once DRECTION_CORE_PATH . '/inc/js_composer/elements/google_map.php';
	require_once DRECTION_CORE_PATH . '/inc/js_composer/elements/hero_slider.php';
	require_once DRECTION_CORE_PATH . '/inc/js_composer/elements/image.php';
	require_once DRECTION_CORE_PATH . '/inc/js_composer/elements/portfolio.php';
	require_once DRECTION_CORE_PATH . '/inc/js_composer/elements/process.php';
	require_once DRECTION_CORE_PATH . '/inc/js_composer/elements/section_title.php';
	require_once DRECTION_CORE_PATH . '/inc/js_composer/elements/service.php';
	require_once DRECTION_CORE_PATH . '/inc/js_composer/elements/team_member.php';
	require_once DRECTION_CORE_PATH . '/inc/js_composer/elements/text_block.php';
	require_once DRECTION_CORE_PATH . '/inc/js_composer/elements/awards.php';
}

require_once DRECTION_CORE_PATH . '/inc/js_composer/vc_extra_params.php';

/**
 * Include advanced custom field
 */
// 1. customize ACF path
add_filter('acf/settings/path', 'drection_acf_settings_path');

function drection_acf_settings_path( $path ) {
	$path = DRECTION_CORE_PATH . '/inc/acf/';

	return $path;
}


// 2. customize ACF dir
add_filter('acf/settings/dir', 'drection_acf_settings_dir');

function drection_acf_settings_dir( $dir ) {
	$dir = DRECTION_CORE_URI . '/inc/acf/';

	return $dir;
}

//Hide ACF field group menu item
add_filter('acf/settings/show_admin', '__return_false');
require DRECTION_CORE_PATH .  '/inc/acf/acf.php';

require_once DRECTION_CORE_PATH . '/inc/theme-options.php';

require_once DRECTION_CORE_PATH . '/inc/cpt-taxonomy.php';


function motts_animations(){

    return array(
	    'bounce' => 'bounce',
	    'flash' => 'flash',
	    'pulse' => 'pulse',
	    'rubberBand' => 'rubberBand',
	    'shake' => 'shake',
	    'headShake' => 'headShake',
	    'swing' => 'swing',
	    'tada' => 'tada',
	    'wobble' => 'wobble',
	    'jello' => 'jello',
	    'bounceIn' => 'bounceIn',
	    'bounceInDown' => 'bounceInDown',
	    'bounceInLeft' => 'bounceInLeft',
	    'bounceInRight' => 'bounceInRight',
	    'bounceInUp' => 'bounceInUp',
	    'bounceOut' => 'bounceOut',
	    'bounceOutDown' => 'bounceOutDown',
	    'bounceOutLeft' => 'bounceOutLeft',
	    'bounceOutRight' => 'bounceOutRight',
	    'bounceOutUp' => 'bounceOutUp',
	    'fadeIn' => 'fadeIn',
	    'fadeInDown' => 'fadeInDown',
	    'fadeInDownBig' => 'fadeInDownBig',
	    'fadeInLeft' => 'fadeInLeft',
	    'fadeInLeftBig' => 'fadeInLeftBig',
	    'fadeInRight' => 'fadeInRight',
	    'fadeInRightBig' => 'fadeInRightBig',
	    'fadeInUp' => 'fadeInUp',
	    'fadeInUpBig' => 'fadeInUpBig',
	    'fadeOut' => 'fadeOut',
	    'fadeOutDown' => 'fadeOutDown',
	    'fadeOutDownBig' => 'fadeOutDownBig',
	    'fadeOutLeft' => 'fadeOutLeft',
	    'fadeOutLeftBig' => 'fadeOutLeftBig',
	    'fadeOutRight' => 'fadeOutRight',
	    'fadeOutRightBig' => 'fadeOutRightBig',
	    'fadeOutUp' => 'fadeOutUp',
	    'fadeOutUpBig' => 'fadeOutUpBig',
	    'flipInX' => 'flipInX',
	    'flipInY' => 'flipInY',
	    'flipOutX' => 'flipOutX',
	    'flipOutY' => 'flipOutY',
	    'lightSpeedIn' => 'lightSpeedIn',
	    'lightSpeedOut' => 'lightSpeedOut',
	    'rotateIn' => 'rotateIn',
	    'rotateInDownLeft' => 'rotateInDownLeft',
	    'rotateInDownRight' => 'rotateInDownRight',
	    'rotateInUpLeft' => 'rotateInUpLeft',
	    'rotateInUpRight' => 'rotateInUpRight',
	    'rotateOut' => 'rotateOut',
	    'rotateOutDownLeft' => 'rotateOutDownLeft',
	    'rotateOutDownRight' => 'rotateOutDownRight',
	    'rotateOutUpLeft' => 'rotateOutUpLeft',
	    'rotateOutUpRight' => 'rotateOutUpRight',
	    'hinge' => 'hinge',
	    'jackInTheBox' => 'jackInTheBox',
	    'rollIn' => 'rollIn',
	    'rollOut' => 'rollOut',
	    'zoomIn' => 'zoomIn',
	    'zoomInDown' => 'zoomInDown',
        'zoomInLeft' => 'zoomInLeft',
        'zoomInRight' => 'zoomInRight',
        'zoomInUp' => 'zoomInUp',
        'zoomOut' => 'zoomOut',
        'zoomOutDown' => 'zoomOutDown',
        'zoomOutLeft' => 'zoomOutLeft',
        'zoomOutRight' => 'zoomOutRight',
        'zoomOutUp' => 'zoomOutUp',
        'slideInDown' => 'slideInDown',
        'slideInLeft' => 'slideInLeft',
        'slideInRight' => 'slideInRight',
        'slideInUp' => 'slideInUp',
        'slideOutDown' => 'slideOutDown',
        'slideOutLeft' => 'slideOutLeft',
        'slideOutRight' => 'slideOutRight',
        'slideOutUp' => 'slideOutUp',
        'heartBeat' => 'heartBeat'
    );
}


function ts_get_hero_slider() {
	$args = array (
		'post_type'			=> 'hero',
		'posts_per_page'	=> -1,
	);
	$sliders = get_posts( $args );

	$_slider = array();

	if( count( $sliders ) ) {
		foreach( $sliders as $slider ) {
			$_slider[ $slider->ID . ' ' . $slider->post_title ] = $slider->ID;
		}
	}

	return $_slider;
}


// default options
function atheus_after_import(){

	update_field('enable_cursor_effect', 1, 'option');
	update_field('enable_text_split_effect', 1, 'option');
	update_field('enable_preloader', 1, 'option');
	update_field('pre-loader_text', esc_html__( 'Still loading', 'drection' ), 'option');

	// preloader text
	$preloader_text = array(
		array( 'title'		=> esc_html__( 'Please wait', 'drection' ) ),
		array( 'title'		=> esc_html__( 'Still loading', 'drection' ) ),
	);
	update_field( 'pre_loader_text_rotater', $preloader_text, 'option' );

	// social media
	$social_media = array(
		array(
			'title'		=> esc_html__( 'FACEBOOK', 'drection' ),
			'url'		=> '#',
		),
		array(
			'title'		=> esc_html__( 'BEHANCE', 'drection' ),
			'url'		=> '#',
		),
		array(
			'title'		=> esc_html__( 'DRIBBBLE', 'drection' ),
			'url'		=> '#',
		),
	);
	update_field( 'social_media', $social_media, 'option' );

	update_field( 'archive_blog_title',  esc_html__( 'NEWS', 'drection' ), 'option' );
	update_field( 'archive_blog_description',  esc_html__( 'TO CREATE A POWERFUL PROJECT ONCE, A BIT OF LUCK IS ENOUGH', 'drection' ), 'option' );
	update_field( 'archive_show_sidebar', 'no', 'option' );
	update_field( 'archive_strip_content', 'yes', 'option' );

	update_field( 'footer_show_call_to_action', 1, 'option' );
	update_field( 'footer_cta_content', wp_kses_post( "<h5>HIRE US TO CHANGE YOUR BRAND</h5><h2>Do you have a project, maybe you are looking for creative solutions</h2>" ), 'option' );
    update_field( 'footer_cta_button_label', esc_html__( "Let's Work Together", 'drection' ), 'option' );
    update_field( 'footer_cta_button_link', '#', 'option' );

    update_field( 'footer_copyright_text', esc_html__( "© 2020 - Atheus Digital Agency", 'drection' ), 'option' );

}