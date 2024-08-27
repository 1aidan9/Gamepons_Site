<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Atheus
 */

?>

<?php atheus_post_thumbnail(); ?>
   <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="container">
        <div class="row">
            <div class="col-md-12">

	            <?php
	            the_content();

	            wp_link_pages( array(
		            'before'      => '<div class="page-links"><h6>' . esc_html__( 'Pages:',  'atheus' ) . '</h6>',
		            'after'       => '</div>',
		            'link_before' => '<span>',
		            'link_after'  => '</span>',
	            ) );
	            ?>

	            <?php if ( get_edit_post_link() ) : ?>
                    <div class="post-entry-footer">
			            <?php
			            edit_post_link(
				            sprintf(
					            wp_kses(
					            /* translators: %s: Name of current post. Only visible to screen readers */
						            __( 'Edit <span class="screen-reader-text">%s</span>',  'atheus' ),
						            array(
							            'span' => array(
								            'class' => array(),
							            ),
						            )
					            ),
					            get_the_title()
				            ),
				            '<span class="edit-link">',
				            '</span>'
			            );
			            ?>
                    </div><!-- .entry-footer -->
	            <?php endif; ?>

            </div>
        </div>
    </div>
</div>