<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="https://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php
$nav_menu_type = ( atheus_get_option( 'nav_menu_type' ) ) ? atheus_get_option( 'nav_menu_type' ) : 'horizontal';
$nav_menu_class = $nav_menu_type;
if ( $nav_menu_type == 'hamburger' ) {
  $nav_menu_class = 'hamburger-center';
}
$social_media = atheus_get_option( 'social_media' );
$logo = ( atheus_get_option( 'logo' ) ) ? atheus_get_option( 'logo' ) : get_template_directory_uri() . '/images/logo@2x.png';
$retina_logo = ( atheus_get_option( 'retina_logo' ) ) ? atheus_get_option( 'retina_logo' ) : '';
$tilt_effect = ( atheus_get_option( 'tilt_effect' ) ) ? atheus_get_option( 'tilt_effect' ) : false;
$nav_menu_label = ( atheus_get_option( 'nav_menu_label' ) ) ? atheus_get_option( 'nav_menu_label' ) : esc_html__( 'MENU', 'atheus' );
?>
<?php
if ( atheus_get_option( 'enable_cursor_effect' ) ):
  ?>
<div class="cursor js-cursor"></div>
<?php
endif;
?>
<?php
if ( atheus_get_option( 'enable_preloader' ) ):
  $pre_loader_icon = ( atheus_get_option( 'pre_loader_icon' ) ) ? atheus_get_option( 'pre_loader_icon' ) : get_template_directory_uri() . '/images/preloader.png';
$pre_loader_bg = ( atheus_get_option( 'pre_loader_wrapper_bg_color' ) !== '' ) ? atheus_get_option( 'pre_loader_wrapper_bg_color' ) : '#01f7b6';
$style = 'background: ' . esc_attr( $pre_loader_bg ) . ' !important;';
$preloader_text = ( atheus_get_option( 'pre-loader_text' ) !== '' ) ? atheus_get_option( 'pre-loader_text' ) : '';
?>
<div class="preloader" style="<?php echo esc_attr( $style ); ?>">
  <div class="layers"> <span></span> <span></span> <span></span> </div>
  <!-- end layers -->
  <div class="container-fluid">
    <figure><img src="<?php echo esc_url( $pre_loader_icon ); ?>" alt="<?php bloginfo( 'name' ); ?>"></figure>
    <small data-splitting><?php echo esc_html( $preloader_text ); ?></small>
    <div class="percentage" >
      <div id="percentage"></div>
    </div>
    <!-- end percentage -->
    <div class="loadbar"></div>
    <!-- end loadbar --> 
  </div>
  <!-- end container-fluid --> 
</div>
<div class="page-transition">
  <div class="layers"> <span></span> <span></span> <span></span> </div>
  <!-- end layers --> 
</div>
<!-- end page-transition -->
<?php endif; ?>
<div class="menu-navigation">
  <div class="layers"> <span></span> <span></span> <span></span> </div>
  <!-- end layers --> 
</div>
<?php if( 'hamburger' === $nav_menu_type ) : ?>
<div class="menu-container">
  <?php
  wp_nav_menu( array(
    'theme_location' => 'header',
    'menu_class' => 'main-menu',
    'walker' => new Hamburger_Menu_Walker(),
    'container' => ''
  ) );
  ?>
</div>
<?php endif; ?>
<nav class="topbar">
  <div class="logo"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"> <img src="<?php echo esc_url( $logo ); ?>"
                 <?php if( $retina_logo != '' ) : ?>
                    srcset="<?php echo esc_url( $retina_logo ); ?>"
                 <?php endif; ?>
                 alt="<?php bloginfo( 'name' ); ?>"
                /> </a> </div>
  <?php atheus_get_wpml_langs(); ?>
  <?php if( 'hamburger' === $nav_menu_type ) : ?>
  <div class="hamburger-menu">
    <div class="texts"> <b data-splitting><?php echo esc_html( $nav_menu_label ); ?></b> <b data-splitting><?php echo esc_html__('Close', 'atheus' ); ?></b> </div>
    <!-- end texts -->
    <div class="svg circle" id="hamburger-btn">
      <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" viewBox="0 0 200 200" >
        <g stroke-width="6.5" stroke-linecap="round">
          <path
                            d="M72 82.286h28.75"
                            fill="#009100"
                            fill-rule="evenodd"
                            stroke="#fff"
                        />
          <path
                            d="M100.75 103.714l72.482-.143c.043 39.398-32.284 71.434-72.16 71.434-39.878 0-72.204-32.036-72.204-71.554"
                            fill="none"
                            stroke="#fff"
                        />
          <path
                            d="M72 125.143h28.75"
                            fill="#009100"
                            fill-rule="evenodd"
                            stroke="#fff"
                        />
          <path
                            d="M100.75 103.714l-71.908-.143c.026-39.638 32.352-71.674 72.23-71.674 39.876 0 72.203 32.036 72.203 71.554"
                            fill="none"
                            stroke="#fff"
                        />
          <path
                            d="M100.75 82.286h28.75"
                            fill="#009100"
                            fill-rule="evenodd"
                            stroke="#fff"
                        />
          <path
                            d="M100.75 125.143h28.75"
                            fill="#009100"
                            fill-rule="evenodd"
                            stroke="#fff"
                        />
        </g>
      </svg>
    </div>
    <!-- end svg --> 
  </div>
  <?php else: ?>
  <div class="hamburger-menu">
    <div class="texts"> <b data-splitting><?php echo esc_html( $nav_menu_label ); ?></b> <b data-splitting><?php echo esc_html__('Close', 'atheus' ); ?></b> </div>
    <!-- end texts -->
    <div class="svg circle" id="hamburger-btn">
      <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" viewBox="0 0 200 200" >
        <g stroke-width="6.5" stroke-linecap="round">
          <path
                            d="M72 82.286h28.75"
                            fill="#009100"
                            fill-rule="evenodd"
                            stroke="#fff"
                        />
          <path
                            d="M100.75 103.714l72.482-.143c.043 39.398-32.284 71.434-72.16 71.434-39.878 0-72.204-32.036-72.204-71.554"
                            fill="none"
                            stroke="#fff"
                        />
          <path
                            d="M72 125.143h28.75"
                            fill="#009100"
                            fill-rule="evenodd"
                            stroke="#fff"
                        />
          <path
                            d="M100.75 103.714l-71.908-.143c.026-39.638 32.352-71.674 72.23-71.674 39.876 0 72.203 32.036 72.203 71.554"
                            fill="none"
                            stroke="#fff"
                        />
          <path
                            d="M100.75 82.286h28.75"
                            fill="#009100"
                            fill-rule="evenodd"
                            stroke="#fff"
                        />
          <path
                            d="M100.75 125.143h28.75"
                            fill="#009100"
                            fill-rule="evenodd"
                            stroke="#fff"
                        />
        </g>
      </svg>
    </div>
    <!-- end svg --> 
  </div>
  <div class="horizontal-menu">
    <?php
    wp_nav_menu( array(
      'theme_location' => 'header',
      'menu_class' => 'horizontal-main-menu',
      'walker' => new WP_Bootstrap_Navwalker(),

    ) );
    ?>
  </div>
  <?php endif; ?>
</nav>
