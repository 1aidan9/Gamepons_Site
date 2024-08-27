<?php
$footer_bg_color = atheus_get_option( 'footer_bg_color' ) ? atheus_get_option( 'footer_bg_color' ) : '#0e0e0e';
$footer_bg_image = atheus_get_option( 'footer_bg_image' ) ? atheus_get_option( 'footer_bg_image' ) : '';
$footer_style = 'background-color: ' . $footer_bg_color;

$show_social_icons = atheus_get_option( 'footer_show_social_links' );
$show_social_title = ( atheus_get_option( 'footer_social_link_title' ) ) ? atheus_get_option( 'footer_social_link_title' ) : 'Connect with us';

$copyright = atheus_get_option( 'footer_copyright_text' );
$site_credit = atheus_get_option( 'footer_site_credit' );

if ( !$copyright ) {
  $copyright = esc_html__( 'All rights reserved 2020 © Atheus', 'atheus' );
}

if ( !$site_credit ) {
  $site_credit = esc_html__( 'Site created by Drection', 'atheus' );
}

$footer_bg = ( $footer_bg_image != '' ) ? 'data-background="' . esc_url( $footer_bg_image ) . '"': '';
?>
<footer
    class="footer bg-image"
    <?php echo esc_attr( $footer_bg ); ?>
    style="<?php echo esc_attr( $footer_style ); ?>">
  <div class="container">
    <?php if( atheus_get_option( 'footer_show_call_to_action' ) ) { ?>
    <div class="section-titles wow" data-splitting> <?php echo wp_specialchars_decode(esc_html( atheus_get_option( 'footer_cta_content' ) ) ); ?>
      <?php if( atheus_get_option( 'footer_cta_button_label' ) ) { ?>
      <a href="<?php echo esc_attr( atheus_get_option( 'footer_cta_button_link' ) ); ?>"
                       class="custom-link"> <?php echo esc_html( atheus_get_option( 'footer_cta_button_label' ) ); ?> </a>
      <?php } ?>
    </div>
    <?php } ?>
    <?php if( is_active_sidebar( 'footer-widget-1' ) || is_active_sidebar( 'footer-widget-2' ) || is_active_sidebar( 'footer-widget-3' ) || is_active_sidebar( 'footer-widget-4' ) ) { ?>
    <div class="footer-inner">
      <div class="row">
        <?php if( is_active_sidebar( 'footer-widget-1' ) ) : ?>
        <div class="col-lg-2 col-md-6 wow fadeIn">
          <?php dynamic_sidebar( 'footer-widget-1' ); ?>
        </div>
        <?php endif; ?>
        <?php if( is_active_sidebar( 'footer-widget-2' ) ) : ?>
        <div class="col-lg-3 col-md-6 wow fadeIn">
          <?php dynamic_sidebar( 'footer-widget-2' ); ?>
        </div>
        <?php endif; ?>
        <?php if( is_active_sidebar( 'footer-widget-3' ) ) : ?>
        <div class="col-lg-3 wow fadeIn">
          <?php dynamic_sidebar( 'footer-widget-3' ); ?>
        </div>
        <?php endif; ?>
        <?php if( is_active_sidebar( 'footer-widget-4' ) ) : ?>
        <div class="col-lg-4 wow fadeIn">
          <?php dynamic_sidebar( 'footer-widget-4' ); ?>
        </div>
        <?php endif; ?>
      </div>
      <!-- end row --> 
    </div>
    <?php } ?>
    <?php if( $copyright ) { ?>
    <div class="footer-bottom wow" data-splitting> <span class="copyright"><?php echo esc_html( $copyright ); ?></span>
      <?php if( $site_credit ) { ?>
      <span class="creation"><?php echo esc_html( $site_credit ); ?></span>
      <?php } ?>
    </div>
    <?php } ?>
  </div>
  <!-- end container --> 
</footer>
<?php wp_footer(); ?>
</body></html>