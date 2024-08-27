<?php get_header(); ?>

<?php atheus_render_page_header( 'portfolio' ); ?>

<main>
  
        <?php
        while ( have_posts() ) :
            the_post();
            ?>
            <?php the_content(); ?>
        <?php endwhile; ?>
   
</main>

<?php get_footer(); ?>
