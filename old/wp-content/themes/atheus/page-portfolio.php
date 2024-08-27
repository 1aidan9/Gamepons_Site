<?php
/**
 * Template Name: Portfolio
 *
 */

get_header();

atheus_render_page_header( 'page' );

$animate = get_field( 'animate' );
$wrapper_class = array();
if( $animate == 'yes' ) {
	$animation_type = get_field( 'animation_type' );

	$wrapper_class[] = 'wow';
	$wrapper_class[] = $animation_type;
}
$filter_term = false;
if( get_field( 'tags' ) && get_field( 'tags' ) > 0 ) {
	$filter_term = true;
}

$wrapper_class = implode( ' ', $wrapper_class );
?>
<?php
while ( have_posts() ) :
    the_post();
    ?>
    <?php the_content(); ?>
<?php
endwhile;
?>
<?php
get_footer();