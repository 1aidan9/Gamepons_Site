<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Atheus
 */
get_header(); ?>


<?php
atheus_render_page_header( 'search' );

$show_sidebar = ( atheus_get_option( 'archive_show_sidebar' ) ) ? atheus_get_option( 'archive_show_sidebar' ) : 'yes';
$wrapper_cols = '11';

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	$show_sidebar = 'no';
}

if( $show_sidebar == 'yes' ) {
	$wrapper_cols = '8';
}
?>
    <main>
        <section class="content-section section-spacing">
            <div class="container">
                <div class="row justify-content-center">

					<?php if ( have_posts() ) :
						?>
                        <div class="col-md-<?php echo esc_attr( $wrapper_cols ); ?>">
							<?php
							while ( have_posts() ) :
								the_post();

								get_template_part( 'template-parts/listing' );

							endwhile;
							// show pagination
							atheus_pagination();
							?>
                        </div>
                        <!-- end col-8 -->
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
					<?php
					else :
						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </section>
    </main>
    <!-- end blog -->
<?php
get_footer();