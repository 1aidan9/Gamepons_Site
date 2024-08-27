<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class WPBakeryShortCode_ts_process extends WPBakeryShortCode {

	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'symbol'		        => '',
			'logo'			        => '',
			'value' 			    => '',
			'description' 			=> '',
			'animate_block'			=> 'false',
			'animation_type'		=> 'fadeIn',
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
			$wrapper_class[] = $animation_type;
		}
		$wrapper_class = implode( ' ', $wrapper_class );
		?>

<div class="counter" <?php echo esc_attr( $wrapper_class ); ?>" <?php if( $animate_block == 'yes' && $animation_delay != '' ) { echo 'data-wow-delay="' . esc_attr( $animation_delay ) . '"'; } ?>>
	 
	 
	  <?php if( $value != '' ) { ?>
               
<span class="odometer" data-count="<?php echo esc_html( $value ); ?>" data-status="yes">0</span> 

            <?php } ?>


 <?php if( $symbol != '' ) { ?>
<strong><?php echo esc_html( $symbol ); ?></strong>
  <?php } ?>
	 
	 

<?php if( $description != '' ) { ?>
<small class="wow" data-splitting><?php echo esc_html( $description ); ?></small> 
 <?php } ?>
</div>
            <!-- end counter --> 


      
		<?php

		return ob_get_clean();
	}
}


vc_map( array(
	"base" 			    => "ts_process",
	"name" 			    => __( 'Milestones', 'themezinho' ),
	"icon"              => DRECTION_CORE_URI . "assets/img/icon.png",
	"content_element"   => true,
	"category" 		    => PAGE_BUILDER_GROUP,
	'params' => array(
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Value', 'themezinho' ),
			"param_name" 	=> 	"value",
			"group" 		=> 'General',
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Description', 'themezinho' ),
			"param_name" 	=> 	"description",
			"group" 		=> 'General',
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Symbol', 'themezinho' ),
			"param_name" 	=> 	"symbol",
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
