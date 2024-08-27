<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

class WPBakeryShortCode_ts_portfolio extends WPBakeryShortCode {

    protected function content( $atts, $content = null ) {

        extract( shortcode_atts( array(
            'total_count'		    => 4,
            'show_tags'			    => 'yes',
            'animate_block'			=> 'false',
            'animation_type'		=> 'fadeIn',
            'animation_delay'       => ''
        ), $atts ) );

        $total_count = (int) $total_count;
        if( $total_count < 1 ) {
            $total_count = 8;
        }
        ob_start();

        $args = array (
            'post_type'              => 'portfolio',
            'posts_per_page'            => $total_count,
            'meta_query' => array(
                array(
                    'key'       => '_thumbnail_id',
                    'compare'   => 'EXISTS'
                )
            )
        );
        $portfolio = new WP_Query( $args );

        $wrapper_class = array();
        if( $animate_block == 'yes' ) {
            $wrapper_class[] = 'wow';
            $wrapper_class[] = $animation_type;
        }

        $wrapper_class = implode( ' ', $wrapper_class );

        if ( $portfolio->have_posts() ) :
            ?>
            <div class="clearfix"></div>
            <ul class="works">
                <?php
                while ( $portfolio->have_posts() ) :
                    $portfolio->the_post();

                    $thumbnail_image = get_the_post_thumbnail_url( get_the_ID() );

                    $title = get_the_title();

                    if( get_field( 'listing_title_type' ) == 'custom' && get_field( 'listing_title') ) {
                        $title = get_field( 'listing_title' );
                    }
                    $terms = '';
                    if( $show_tags == 'yes' ) {
                        $_terms = wp_get_post_terms($portfolio->post->ID, 'portfolio_tag');
                        if( $_terms ) {
                            $terms = implode(', ', array_column($_terms, 'name'));
                        }
                    }
                    ?>
                    <li>
                        <figure class="image-reveal <?php echo esc_attr( $wrapper_class ); ?>" <?php if( $animate_block == 'yes' && $animation_delay != '' ) { echo 'data-wow-delay="' . esc_attr( $animation_delay ) . '"'; } ?>>
                            <div class="image-inner">
                                <img src="<?php echo esc_url( $thumbnail_image ); ?>" alt="<?php the_title_attribute(); ?>">
                            </div>
                            <figcaption>
                                <div>
                                    <h5>
                                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                            <?php echo wp_kses_post( $title ); ?>
                                        </a>
                                    </h5>
                                    <?php if( $terms != '' ) { ?>
                                        <small><?php echo wp_kses_post( $terms ); ?></small>
                                    <?php } ?>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                <?php
                endwhile;
                ?>
            </ul>
        <?php
        endif;

        wp_reset_query();
        return ob_get_clean();
    }
}


vc_map( array(
    "base" 			    => "ts_portfolio",
    "name" 			    => __( "Portfolio", "themezinho" ),
    "icon"              => DRECTION_CORE_URI . "assets/img/icon.png",
    "content_element"   => true,
    "category" 		    => PAGE_BUILDER_GROUP,
    'params' => array(
        array(
            "type" 			=> "textfield",
            "heading" 		=> __( 'Total Count', 'themezinho' ),
            "param_name" 	=> "total_count",
            "value"         => 6,
            "description"	=> "Total number of portfolio items that will be shown.",
            "group" 		=> 'General',
        ),
        array(
            "type" 			=> 	"dropdown",
            "heading" 		=> 	__( 'Show Tags', 'themezinho' ),
            "param_name" 	=> 	"show_tags",
            "group" 		=> 'General',
            "value"			=>	array(
                "Yes"			=>		'yes',
                "No"			=>		'no',
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
