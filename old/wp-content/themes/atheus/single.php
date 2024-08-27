<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Atheus
 */

get_header();
?>

<?php
atheus_render_page_header( 'single' );

$show_sidebar = ( atheus_get_option( 'archive_show_sidebar' ) ) ? atheus_get_option( 'archive_show_sidebar' ) : 'yes';
if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	$show_sidebar = 'no';
}
$wrapper_cols = '10';

if( $show_sidebar === 'yes' ) {
	$wrapper_cols = '8';
}

$post_class = array( 'single-post', 'blog-post' );
?>
<main>
    <!-- end int-hero -->
    <section class="content-section section-spacing">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-<?php echo esc_attr( $wrapper_cols ); ?>">

                    <div id="post-<?php the_ID(); ?>" <?php post_class( $post_class ); ?>>
                        <?php atheus_post_thumbnail(); ?>
                        <div class="post-content">
                            <div class="inner">
	                            <?php
	                            while ( have_posts() ) :
		                            the_post();

		                            get_template_part( 'template-parts/content', get_post_type() );

		                            // If comments are open or we have at least one comment, load up the comment template.
		                            if ( comments_open() || get_comments_number() ) :
			                            comments_template();
		                            endif;

		                            ?>
                                    <div class="clearfix"></div>
                                    <div class="post-navigation">
			                            <?php the_post_navigation(); ?>
                                    </div>
	                            <?php
	                            endwhile; // End of the loop.
	                            ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                if( $show_sidebar == 'yes' ){
                    ?>
                    <div class="col-md-4 col-sm-12">
                        <?php get_sidebar(); ?>
                    </div>
                    <!-- end col-4 -->
                    <?php
                }
                ?>
            </div>
        </div>
        <!-- end news -->
    </section>
</main>
<?php
get_footer();
