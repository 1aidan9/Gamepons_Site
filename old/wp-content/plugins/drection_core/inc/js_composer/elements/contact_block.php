<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class WPBakeryShortCode_tf_address extends WPBakeryShortCode {

	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'type'		      	=> 'title',
			'animate_block'		=> 'false',
			'animation_type'	=> 'fadeIn',
			'animation_delay'	=> '',
		), $atts ) );

		ob_start();

		$wrapper_class = '';
		if( $animate_block == 'yes' ) {
			$wrapper_class = 'wow ' . $animation_type;
		}
		?>
        <div class="contact-block-wrapper <?php echo esc_attr( $wrapper_class ); ?>" <?php if( $animate_block == 'yes' && $animation_delay != '' ) { echo 'data-wow-delay="' . esc_attr( $animation_delay ) . '"'; } ?>>
            <div class="<?php echo esc_attr( $type ); ?>">
	            <?php echo wpb_js_remove_wpautop( $content, true ); ?>
            </div>
        </div>
		<?php

		return ob_get_clean();
	}
}

vc_map( array(
	"base" 			    => "tf_address",
	"name" 			    => __( 'Address', 'themezinho' ),
	"icon"              => DRECTION_CORE_URI . "assets/img/icon.png",
	"content_element"   => true,
	"category" 		    => PAGE_BUILDER_GROUP,
	'params' => array(
		array(
			"type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Type', 'themezinho' ),
			"param_name" 	=> 	"type",
			"group" 		=> 'General',
			"value"			=>	array(
				"Title"			=>		'title',
				"Contact Box"	=>		'contact-box',
			)
		),
		array(
			"type" 			=> 	"textarea_html",
			"heading" 		=> 	__( 'Content', 'themezinho' ),
			"param_name" 	=> 	"content",
			"group" 		=> 'General',
		),
		array(
			"type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Animate', 'themezinho' ),
			"param_name" 	=> 	"animate_block",
			"group" 		=> 'Animation',
			"value"			=>	array(
				"No"			=>		'no',
				"Yes"			=>		'yes',
			)
		),
		array(
			"type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Animation Type', 'themezinho' ),
			"param_name" 	=> 	"animation_type",
			"dependency" => array('element' => "animate_block", 'value' => 'yes'),
			"group" 		=> 'Animation',
			"value"			=>	motts_animations()
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Animation Delay', 'themezinho' ),
			"param_name" 	=> 	"animation_delay",
			"dependency" => array('element' => "animate_block", 'value' => 'yes'),
			"description"	=>	__( 'Animation delay set in second e.g. 0.6s', 'themezinho' ),
			"group" 		=> 'Animation',
		)
	),
) );
