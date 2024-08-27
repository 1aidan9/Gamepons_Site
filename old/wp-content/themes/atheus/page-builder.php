<?php
/**
 * Template Name: Builder
 *
 */

get_header();
?>
<?php atheus_render_page_header( 'page' ); ?>
<main class="atheus-page">
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) :
            the_post();
            the_content();
        endwhile;
    endif;
    ?>
    <!-- end wrap-page -->
</main>
<?php
get_footer();