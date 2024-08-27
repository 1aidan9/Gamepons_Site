<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class WPBakeryShortCode_ts_awards extends WPBakeryShortCode {

	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'brand'		        	=> '',
			'logo'			        => '',
			'value' 			    => '',
			'list' 					=> '',
			'animate_block'			=> 'false',
		), $atts ) );
		$logo_url = '';
		if ( $logo != '') {
			$logo_url = wp_get_attachment_url( $logo );
		}
		ob_start();

		$wrapper_class = array();
		if( $animate_block == 'yes' ) {
			$wrapper_class[] = 'wow';
			$wrapper_class[] = 'fadeIn';
		}
		$wrapper_class = implode( ' ', $wrapper_class );
		?>

	  	<div class="awards-box">
		   
 			<?php if ($logo_url != '') { ?>
		   		<img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr($title); ?>">
		   	<?php } ?>
          
			<?php if( $value != '' ) { ?>
          		<span class="odometer" data-count="<?php echo esc_attr( $value ); ?>" data-status="yes">0</span>
 	 		<?php } ?>
		</div>

		<?php if( $list != '' ) { ?>
			<div class="awards-box-content <?php echo esc_attr( $wrapper_class ); ?> "><?php echo wp_kses_post( $list ); ?></div> 
		 <?php } ?>
		<?php

		return ob_get_clean();
	}
}


vc_map( array(
	"base" 			    => "ts_awards",
	"name" 			    => __( 'Awards', 'themezinho' ),
	"icon"              => DRECTION_CORE_URI . "assets/img/icon.png",
	"content_element"   => true,
	"category" 		    => PAGE_BUILDER_GROUP,
	'params' => array(
		array(
			"type" 			=> 	"attach_image",
			"heading" 		=> 	__( 'Icon', 'themezinho' ),
			"param_name" 	=> 	"logo",
			"group" 		=> 'General',
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Value', 'themezinho' ),
			"param_name" 	=> 	"value",
			"group" 		=> 'General',
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Brand', 'themezinho' ),
			"param_name" 	=> 	"brand",
			"group" 		=> 'General',
		),
		array(
			"type" 			=> 	"textarea_html",
			"heading" 		=> 	__( 'List', 'themezinho' ),
			"param_name" 	=> 	"list",
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
