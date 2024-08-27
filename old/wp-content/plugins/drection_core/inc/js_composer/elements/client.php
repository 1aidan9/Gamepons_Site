<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class WPBakeryShortCode_ts_client extends WPBakeryShortCode {

	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'title'		            => '',
			'logo'			        => '',
			'animate_block'			=> 'false',
			'animation_delay'		=> '',
		), $atts ) );
		$logo_url = '';
		if ( $logo != '') {
			$logo_url = wp_get_attachment_url( $logo );
		}
		ob_start();

		$wrapper_class = array();
		if( $animate_block == 'yes' ) {
			$wrapper_class[] = 'wow';
		}
		$wrapper_class = implode( ' ', $wrapper_class );
		?>
		<div class="client-item <?php echo esc_attr( $wrapper_class ); ?>">
			<?php if( $logo_url != '' ) { ?>
                <figure>
                    <img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php echo esc_attr( $title ); ?>">
                    <figcaption data-splitting><?php echo esc_html( $title ); ?></figcaption>
                </figure>
			<?php } ?>
		</div>
		<?php

		return ob_get_clean();
	}
}


vc_map( array(
	"base" 			    => "ts_client",
	"name" 			    => __( 'Client', 'themezinho' ),
	"icon"              => DRECTION_CORE_URI . "assets/img/icon.png",
	"content_element"   => true,
	"category" 		    => PAGE_BUILDER_GROUP,
	'params' => array(
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Title', 'themezinho' ),
			"param_name" 	=> 	"title",
			"group" 		=> 'General',
		),
		array(
			"type" 			=> 	"attach_image",
			"heading" 		=> 	__( 'Logo', 'themezinho' ),
			"param_name" 	=> 	"logo",
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
