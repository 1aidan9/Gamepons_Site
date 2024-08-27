<?php
ob_start();
if( has_excerpt() ) {
    $post_content = the_excerpt();
} else {
    $post_content = the_content();
}
$post_content = ob_get_clean();

$strip_content = ( atheus_get_option( 'archive_strip_content' ) ) ? atheus_get_option( 'archive_strip_content' ) : 'yes';
if( $strip_content == 'yes' ){
    $post_content = preg_replace( '~\[[^\]]+\]~', '', $post_content );
    $post_content = strip_tags( $post_content );
    $post_content = atheus_get_the_post_excerpt( $post_content, 300 );
}
?>
<div id="post-<?php the_ID(); ?>" <?php post_class( array( 'blog-post' ) ); ?>>
    <?php if( atheus_get_post_thumbnail_url() ) { ?>
        <figure class="post-image image-reveal wow">
            <div class="image-inner">
                <img src="<?php echo esc_url( atheus_get_post_thumbnail_url() ); ?>" alt="<?php the_title_attribute(); ?>">
            </div>
        </figure>
    <?php } ?>
    <div class="post-content">
        <small class="post-date"><?php the_date('d F, Y'); ?></small>
        <h3 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
        <?php atheus_posted_by(); ?>

        <?php if( $strip_content == 'yes' ) {
            echo wp_kses_post( $post_content );
            ?>
            <div class="post-link-wrapper">
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="post-link"><?php echo esc_html__( 'READ MORE',  'atheus' ); ?></a>
            </div>
        <?php }
        else {
            the_content();
        }
        ?>
    </div>
</div>
