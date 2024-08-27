<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class WPBakeryShortCode_ts_team_member extends WPBakeryShortCode {

	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'total_count'		=> '6',
			'animate'			=> 'no',
		), $atts ) );

		if( $total_count < 1 ) {
			$total_count = 6;
		}
		ob_start();

		$wrapper_class = '';
		if( $animate == 'yes' ) {
			$wrapper_class = 'wow ';
		}

		$args = array (
			'post_type'              => 'team',
			'posts_per_page'            => $total_count,
			'meta_query' => array(
			        array(
			         'key' => '_thumbnail_id',
			         'compare' => 'EXISTS'
			        ),
		    )
		);

		$teams = new WP_Query( $args );

		if ( $teams->have_posts() ) {
			?>
            <div class="swiper-container team-slider">
                <div class="swiper-wrapper">
                    <?php
                    while ( $teams->have_posts() ) {
                        $teams->the_post();
                        $team_image = wp_get_attachment_url( get_post_thumbnail_id( $teams->post->ID ) );
                        ?>
                        <div class="swiper-slide">
                            <div class="team-member">
                                <figure class="image-reveal <?php echo esc_attr( $wrapper_class ); ?>">
                                    <div class="image-inner">
                                        <img src="<?php echo esc_url( $team_image ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
                                    </div>
                                </figure>
                                <div class="content">
                                    <h6><?php the_title(); ?></h6>
                                    <?php if ( get_field( 'designation' ) !== '' ) { ?>
                                        <small><?php the_field( 'designation' ); ?></small>
                                    <?php } ?>
                                    <?php if( get_field( 'social_links' ) ){ ?>
                                        <ul>
                                            <?php while( has_sub_field('social_links' ) ): ?>
                                                <li>
                                                    <a
                                                        href="<?php echo esc_url( get_sub_field( 'link') );?>"
                                                        target="_blank" title="<?php echo esc_attr( get_sub_field( 'title') );?>">
                                                        <?php the_sub_field('title'); ?>
                                                    </a>
                                                </li>
                                            <?php endwhile; ?>
                                        </ul>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <?php
		}
		return ob_get_clean();
	}
}


vc_map( array(
	"base" 			    => "ts_team_member",
	"name" 			    => __( 'Team Members', 'themezinho' ),
	"icon"              => DRECTION_CORE_URI . "assets/img/icon.png",
	"content_element"   => true,
	"category" 		    => PAGE_BUILDER_GROUP,
	'params' => array(
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Total no of Post', 'themezinho' ),
			"param_name" 	=> 	"total_count",
			"value" 	=> 	"5",
			"group" 		=> 'General',
		),
		array(
			"type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Animate', 'themezinho' ),
			"param_name" 	=> 	"animate",
			"group" 		=> 'General',
			"value"			=>	array(
				"No"			=>		'no',
				"Yes"			=>		'yes',
			)
		),
	),
) );
