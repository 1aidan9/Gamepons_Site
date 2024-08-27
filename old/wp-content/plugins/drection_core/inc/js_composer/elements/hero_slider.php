<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class WPBakeryShortCode_ts_hero_slider extends WPBakeryShortCode {

	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'hero_slider'		=> 0,
		), $atts ) );

//		 if( !is_int( $hero_slider ) ) {
//		 	return;
//		 }
		ob_start();
		$args = array (
			'post_type'		=> 'hero',
			'post__in'		=> array( $hero_slider )
	    );

		$the_query = new WP_Query( $args );
		if ( $the_query->have_posts() ) :
			while ( $the_query->have_posts() ) :
				$the_query->the_post();

				$hero_type = get_field( 'type' );
				$enable_social_icons = true;
		$enable_soundbar = true;
		$enable_soundbar = false;
				$enable_soundbar = ( atheus_get_field( 'disable_soundbar' ) ) ? false : true;
				$enable_soundbar_option = atheus_get_option( 'enable_soundbar' );
		
		
				if( $hero_type === 'swiper' ) :

					if( have_rows('slider') ):

				


						$slides = count( get_field( 'slider' ) );

						if( $slides < 2 ) {
						    $loop = 'disable';
                        }
						
						
						?>
                        <header class="header hero-header">
                            <div class="showcase-slider"
                                
                                >
                                <div class="swiper-wrapper">
                                    <?php
                                    while ( have_rows('slider') ) : the_row();
                                        $background_image = get_sub_field( 'background_image' );
										$background_image_mobile = get_sub_field( 'background_image_mobile' );
                                        ?>

                                        <div class="swiper-slide">
                                            <div class="slide-image bg-image" data-background="<?php echo esc_url( $background_image ); ?>"></div>
											<div class="slide-image-mobile bg-image" data-background="<?php echo esc_url( $background_image_mobile ); ?>"></div>
                                            <div class="slide-inner">
                                                <div class="container">
                                                    <?php if( get_sub_field( 'tagline' ) ) { ?>
                                                        <small data-splitting><?php the_sub_field( 'tagline' ); ?></small>
                                                    <?php } ?>
                                                    <h1 data-splitting><?php the_sub_field( 'title' ); ?></h1>

                                                    <?php if( $button_link = get_sub_field( 'button_link' ) ){
                                                        $button_label = get_sub_field( 'button_label' );
                                                        $button_label_hover = get_sub_field( 'button_label_hover' ) ? get_sub_field( 'button_label_hover' ) : $button_label;
                                                        ?>
                                                        <div class="link">
                                                            <a href="<?php echo esc_url( $button_link ); ?>" title="<?php echo esc_attr( $button_label ); ?>">
                                                                <b>+</b>
                                                                <div class="words">
                                                                    <div class="first" data-splitting><?php echo esc_html( $button_label ); ?></div>
                                                                    <div class="second" data-splitting><?php echo esc_html( $button_label_hover ); ?></div>
                                                                </div>
                                                                <!-- end words -->
                                                            </a>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                                <!-- end container -->
                                            </div>
                                            <!-- end slide-inner -->
                                        </div>

                                        <?php
                                    endwhile;
                                    ?>
                                </div>

                            <div class="swiper-pagination"></div>
    <!-- end swiper-pagination -->
                                
                                    <?php $prev_label = get_field( 'navigation_previous_label' ) ? get_field( 'navigation_previous_label' ) : __('PREV', 'atheus');
                                    $next_label = get_field( 'navigation_next_label' ) ? get_field( 'navigation_next_label' ) : __('PREV', 'atheus');
                                    ?>
                                    <div class="swiper-controls">
                                        <div class="swiper-button-prev"> <span><?php echo esc_html( $prev_label ); ?></span> </div>
                                        <div class="swiper-button-next"> <span><?php echo esc_html( $next_label ); ?></span> </div>
                                    </div>
                               
                            </div>

                           
                   
						
						

                       <?php if( $enable_social_icons || ( $enable_soundbar_option && $enable_soundbar ) ) : ?>
                    <div class="bottombar">
                        <?php if( $enable_social_icons ) :
                            $social_media = atheus_get_option( 'social_media' );
                            if ( $social_media ) :
                                ?>
                                <div class="social-media">
                                    <ul data-splitting>
                                        <?php foreach ( $social_media as $social ) { ?>
                                            <li>
                                                <a
                                                    href="<?php echo esc_url( $social['url'] ); ?>"
                                                    title="<?php echo esc_attr( $social['title'] ); ?>"
                                                    target="_blank"
                                                    rel="noreferrer"><?php echo esc_html( $social['title'] ); ?></a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                                <?php
                            endif; ?>
                        <?php endif; ?>

                        <?php if( $enable_soundbar_option && $enable_soundbar ) :
                            ?>
                            <!-- end social-media -->
                            <div class="audio"> <span>Sound</span>
                                <svg id="wave" viewBox="0 0 400 200" data-status="1">
                                    <polyline stroke="white" points=""></polyline>
                                </svg>
                                <div class="texts"> <b class="off" data-splitting><?php echo esc_html__( 'Off', 'atheus' ); ?></b> <b class="on" data-splitting><?php echo esc_html__( 'On', 'atheus' ); ?></b> </div>
                                <!-- end texts -->
                            </div>
                            <!-- end audio -->
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
               

                        </header>

						<?php
					endif;

                    elseif( $hero_type === 'video' ) :
                        ?>
                        <header class="header hero-header">
                            

                            <div class="video-bg">
                                <video src="<?php echo esc_url( get_field( 'background_video' ) ); ?>" muted loop autoplay></video>
                                <div class="container">
                                    <?php if( get_field( 'video_bg_tagline' ) ) { ?>
                                        <div class="tagline"><span></span>
                                            <h6><?php the_field( 'video_bg_tagline' ); ?></h6>
                                        </div>
                                    <?php } ?>

                                    <h1>
                                        <?php the_field( 'video_bg_title' ); ?>
                                        <?php if( get_field( 'video_bg_title_with_effect' ) ) { ?>
                                            <br>
                                            <span><?php the_field( 'video_bg_title_with_effect' ); ?></span>
                                        <?php } ?>
                                    </h1>

                                    <?php if( get_field( 'video_bg_button_link' ) ){ ?>
                                        <div class="slide-btn">
                                            <a href="<?php echo esc_url( get_field( 'video_bg_button_link' ) ); ?>" title="<?php echo esc_attr( get_field( 'video_bg_button_label' ) ); ?>">
                                                <div class="lines"> <span></span> <span></span> </div>
                                                <!-- end lines -->
                                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                     viewBox="0 0 104 104" enable-background="new 0 0 104 104" xml:space="preserve">
                    <circle class="video-play-circle" fill="none" stroke="#fff" stroke-width="2" stroke-miterlimit="1" cx="52" cy="52" r="50"/>
                  </svg>
                                                <b><?php echo esc_html( get_field( 'video_bg_button_label' ) ); ?></b>
                                            </a>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>

							
							
							<?php if( $enable_social_icons || ( $enable_soundbar_option && $enable_soundbar ) ) : ?>
                    <div class="bottombar">
                        <?php if( $enable_social_icons ) :
                            $social_media = atheus_get_option( 'social_media' );
                            if ( $social_media ) :
                                ?>
                                <div class="social-media">
                                    <ul data-splitting>
                                        <?php foreach ( $social_media as $social ) { ?>
                                            <li>
                                                <a
                                                    href="<?php echo esc_url( $social['url'] ); ?>"
                                                    title="<?php echo esc_attr( $social['title'] ); ?>"
                                                    target="_blank"
                                                    rel="noreferrer"><?php echo esc_html( $social['title'] ); ?></a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                                <?php
                            endif; ?>
                        <?php endif; ?>

                        <?php if( $enable_soundbar_option && $enable_soundbar ) :
                            ?>
                            <!-- end social-media -->
                            <div class="audio"> <span>Sound</span>
                                <svg id="wave" viewBox="0 0 400 200" data-status="1">
                                    <polyline stroke="white" points=""></polyline>
                                </svg>
                                <div class="texts"> <b class="off" data-splitting><?php echo esc_html__( 'Off', 'atheus' ); ?></b> <b class="on" data-splitting><?php echo esc_html__( 'On', 'atheus' ); ?></b> </div>
                                <!-- end texts -->
                            </div>
                            <!-- end audio -->
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
							
							
                        </header>
                        <?php

                endif;

			endwhile;
		endif;

		return ob_get_clean();
	}
}

vc_map( array(
	"base" 			    => "ts_hero_slider",
	"name" 			    => __( 'Hero Slider', 'ts' ),
	"icon"              => DRECTION_CORE_URI . "assets/img/icon.png",
	"content_element"   => true,
	"category" 		    => PAGE_BUILDER_GROUP,
	'params' => array(
		array(
			"type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Hero Slider', 'ts' ),
			"param_name" 	=> 	"hero_slider",
			"group" 		=> "General",
			"description"	=> __( 'Select the slider that you created in Hero Slider section. Check documentation for further detail.', 'ts' ),
			"value"			=>	ts_get_hero_slider()
		)
	),
) );
