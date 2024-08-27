<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class WPBakeryShortCode_ts_image extends WPBakeryShortCode {

	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'image'		            => '',
			'title'   			    => '',
			'fancybox'              => 'no',
			'animate_block'			=> 'false',
			'animation_type'		=> 'fadeIn',
			'animation_delay'		=> '',
		), $atts ) );

		$wrapper_class = array();

		$image_url = '';
		if ( $image != '') {
			$image_url = wp_get_attachment_url( $image );
		}

		if( !$image_url ) return;

		if( $animate_block == 'yes' ) {
			$wrapper_class[] = 'wow';
			$wrapper_class[] = $animation_type;
		}

		$wrapper_class = implode( ' ', $wrapper_class );

		ob_start();
		?>
        <div class="atheus-image-wrapper">
            <figure class="image-reveal <?php echo esc_attr( $wrapper_class ); ?>" <?php if( $animate_block == 'yes' && $animation_delay != '' ) { echo 'data-wow-delay="' . esc_attr( $animation_delay ) . '"'; } ?>>

                <div class="image-inner">
                    <?php if( $fancybox === 'yes' ) { ?>
                        <a href="<?php echo esc_url( $image_url ); ?>" data-fancybox title="<?php echo esc_attr( $title ); ?>">
                    <?php } ?>
                        <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $title ); ?>">
                    <?php if( $fancybox === 'yes' ) { ?>
                        </a>
                    <?php } ?>
                </div>
            </figure>
        </div>

		<?php

		return ob_get_clean();
	}
}


vc_map( array(
	"base" 			    => "ts_image",
	"name" 			    => __( 'Atheus Image', 'themezinho' ),
	"icon"              => DRECTION_CORE_URI . "assets/img/icon.png",
	"content_element"   => true,
	"category" 		    => PAGE_BUILDER_GROUP,
	'params' => array(
		array(
			"type" 			=> 	"attach_image",
			"heading" 		=> 	__( 'Image', 'themezinho' ),
			"param_name" 	=> 	"image",
			"group" 		=> "General",
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Title', 'themezinho' ),
			"param_name" 	=> 	"title",
			"group" 		=> 'General',
		),

		array(
			"type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Fancybox', 'themezinho' ),
			"param_name" 	=> 	"fancybox",
			"group" 		=> 'General',
			"value"			=>	array(
				"Disable"			=>		'no',
				"Enable"			=>		'yes',
			)
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
