<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Atheus
 */

get_header();

$not_found_placeholder = get_template_directory_uri() . '/images/404.svg';

atheus_render_page_header( '404' );
?>
    <main>
    <section class="content-section section-spacing error-404 not-found">
            <div class="container">
                <img src="<?php echo esc_url( $not_found_placeholder ); ?>" alt="<?php the_title_attribute(); ?>" />
                <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?',  'atheus' ); ?></p>
				<?php get_search_form(); ?>
            </div>
            <!-- end container -->
    </section>
    <!-- end content-section -->

<?php
get_footer();
