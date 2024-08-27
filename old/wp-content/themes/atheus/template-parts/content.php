<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Atheus
 */

?>
<div class="post-content">
    <div class="post-header">
        <?php
        if ( 'post' === get_post_type() ) :
            ?>
            <small class="post-date"><?php the_date('F d, Y'); ?></small>
            <?php atheus_posted_by(); ?>
		<?php the_tags( '<ul class="post-tags"><li>', '</li><li>', '</li></ul>' ); ?>
        <?php endif;
        ?>
    </div>

    <h3 class="post-title wow" data-splitting><?php the_title(); ?></h3>

    <?php
    the_content( sprintf(
'%s %s',
        esc_html__('Continue reading', 'atheus'),
        '<span class="screen-reader-text"> ' . get_the_title() . '</span>'
    ) );

    wp_link_pages( array(
        'before'      => '<div class="page-links"><h6>' . esc_html__( 'Pages:',  'atheus' ) . '</h6>',
        'after'       => '</div>',
        'link_before' => '<span>',
        'link_after'  => '</span>',
    ) );
    ?>
    <div class="post-entry-footer">
        <?php atheus_entry_footer(); ?>
    </div>

</div>