<?php



if ( ! function_exists( 'atheus_enqueue_styles_and_scripts' ) ) {
	/**
	 * This function enqueues the required css and js files.
	 *
	 * @return void
	 */
	function atheus_enqueue_styles_and_scripts() {
		/**
		 * Enqueue css files.
		 */
		wp_enqueue_style( 'swiper', get_template_directory_uri() . '/css/swiper.min.css' );
		wp_enqueue_style( 'odometer', get_template_directory_uri() . '/css/odometer.min.css' );
		wp_enqueue_style( 'fancybox', get_template_directory_uri() . '/css/fancybox.min.css' );
		wp_enqueue_style( 'bootsrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
		wp_enqueue_style( 'atheus-main-style', get_template_directory_uri() . '/css/style.css' );
		wp_enqueue_style( 'atheus-stylesheet', get_stylesheet_uri() );
		wp_add_inline_style( 'atheus-stylesheet', atheus_dynamic_css() );

		/**
		 * Enqueue javascript files.
		 */

		wp_enqueue_script( 'comments', get_template_directory_uri() . '/js/comments.js', array(), false, false );
		wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/js/fancybox.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/isotope.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'odometer', get_template_directory_uri() . '/js/odometer.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'splitting', get_template_directory_uri() . '/js/splitting.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'swiper', get_template_directory_uri() . '/js/swiper.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'wow', get_template_directory_uri() . '/js/wow.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'gsap', get_template_directory_uri() . '/js/gsap.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'atheus-scripts', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ), false, true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		$data = array(
			'audio_source' => '',
			'enable_sound_bar' => false,
            'enable_text_split_effect'  => false
		);

		if( atheus_get_option( 'enable_soundbar' ) ) {
			$data['audio_source'] = atheus_get_option( 'sound_bar_audio' ) ? esc_url( atheus_get_option( 'sound_bar_audio' ) ) : get_template_directory_uri() . '/audio/audio.mp3';
			$data['enable_sound_bar'] = true;
		}

		if( atheus_get_option( 'enable_text_split_effect' ) ) {
            $data['enable_text_split_effect'] = true;
        }

		$comment_data = array(
			'name'      => esc_html__( 'Name is required',  'atheus' ),
			'email'     => esc_html__( 'Email is required',  'atheus' ),
			'comment'   => esc_html__( 'Comment is required',  'atheus' ),

		);

		wp_localize_script( 'atheus-scripts', 'data', $data );
		wp_localize_script( 'comments', 'comment_data', $comment_data );
	}

	add_action( 'wp_enqueue_scripts', 'atheus_enqueue_styles_and_scripts', 10 );
}

if( !function_exists( 'atheus_dynamic_css' ) ) {
	function atheus_dynamic_css() {

		$styles = '';
		if( atheus_get_option( 'logo_height' ) ) {
			$logo_height = str_replace(' ', '', atheus_get_option( 'logo_height' ) );
			$logo_height = str_replace('px', '', $logo_height);
			$styles .= "
				.topbar .logo a img{
					height: {$logo_height}px;
				}
			";
		}
		if( atheus_get_option( 'enable_dynamic_color' ) ) {

            $color_dark = ( atheus_get_option( 'theme_color' ) ) ? atheus_get_option( 'theme_color' ) : '#090c16';
            $color_main = ( atheus_get_option( 'body_background_color' ) ) ? atheus_get_option( 'body_background_color' ) : '#73efcc';
            $color_option_two = ( atheus_get_option( 'theme_color_two' ) ) ? atheus_get_option( 'theme_color_two' ) : '#4c139c';
            $color_option_three = ( atheus_get_option( 'theme_color_three' ) ) ? atheus_get_option( 'theme_color_three' ) : '#727479';

			$styles .= "
			    /*
			    $ color-main: # 73efcc;
                $ color-second: # 4c139c;
                $ color-dark: # 090c16;
                $ color-third: # 727479;
                */
                body {
                    color: {$color_dark} ;
                }
                
                /* LINKS */
                a {
                    color: {$color_dark} ;
                }
                
                a:hover {
                    color: {$color_dark} ;
                }
                
                button[type='button'], button[type='submit'], input[type='submit'] {
                    background: {$color_dark} ;
                }
                
                /* CUSTOM LINK */
                .custom-link {
                    color: {$color_dark} ;
                }
                
                .custom-link:hover {
                    color: {$color_dark} ;
                }
                
                .custom-link:after {
                    background: {$color_main} ;
                }
                
                .custom-link:hover:before {
                    background: {$color_main} ;
                }
                
                .accordion .card {
                    width: 100%;
                    background: none;
                    border-radius: 0;
                    margin: 0;
                    border: none;
                }
                
                .accordion .card .card-header small {
                    color: {$color_main} ;
                }
                
                .accordion .card .card-header a {
                    color: {$color_dark} ;
                }
                
                .accordion .card .card-header a:hover {
                    color: {$color_main} ;
                }
                
                .pagination .page-numbers li .page-numbers.current {
                    background: {$color_dark} ;
                    border-color: {$color_dark} ;
                }
                
                .pagination .page-item .page-link {
                    color: {$color_dark} ;
                }
                
                .menu-navigation .layers {
                    background: {$color_main} ;
                }
                
                .menu-navigation .layers span {
                    background: {$color_dark} ;
                }
                
                .menu-container .main-menu li a:after {
                    background: {$color_main} ;
                }
                
                .menu-container .main-menu li a:hover:before {
                    background: {$color_main} ;
                }
                
                /* PRELOADER */
                .preloader .layers {
                    background: {$color_main} ;
                }
                
                .preloader .layers span {
                    background: {$color_dark} ;
                }
                
                /* PAGE TRANSITION */
                .page-transition .layers {
                    background: {$color_main} ;
                }
                
                .page-transition .layers span {
                    background: {$color_dark} ;
                }
                
                .section-titles h5:after {
                    background: {$color_main} ;
                }
                
                .topbar .languages {
                    margin-left: 60px;
                    margin-right: auto;
                }
                
                .topbar .languages ul li a:after {
                    background: {$color_main} ;
                }
                
                .topbar .languages ul li a:hover:before {
                    background: {$color_main} ;
                }
                
                .topbar .horizontal-menu .horizontal-main-menu li .dropdown-menu {
                    background: {$color_main} ;
                }
                
                .topbar .horizontal-menu .horizontal-main-menu li .dropdown-menu:before {
                    border-color: transparent transparent {$color_main} !important; transparent;
                }
                
                .topbar .horizontal-menu .horizontal-main-menu li .dropdown-menu li a {
                    color: {$color_dark} ;
                }
                
                .topbar .horizontal-menu .horizontal-main-menu li .dropdown-menu li a:hover {
                    color: {$color_dark} ;
                }
                
                .topbar .horizontal-menu .horizontal-main-menu li a:after {
                    background: {$color_main} ;
                }
                
                .topbar .horizontal-menu .horizontal-main-menu li a:hover:before {
                    background: {$color_main} ;
                }
                
                /* BOTTOM BAR */
                .bottombar .social-media ul li a:after {
                    background: {$color_main} ;
                }
                
                .bottombar .social-media ul li a:hover:before {
                    background: {$color_main} ;
                }
                
                /* HEADER */
                .header {
                    background: {$color_dark} ;
                }
                
                /* PAGE HEADER*/
                .page-header {
                    background: {$color_dark} ;
                }
                
                /* SHOWCASE SLIDER */
                .showcase-slider .swiper-slide .slide-inner small:after {
                    background: {$color_main} ;
                }
                
                .showcase-slider .swiper-slide .slide-inner h1 b {
                    color: {$color_main} ;
                }
                
                .showcase-slider .swiper-slide .slide-inner .link a b {
                    border: 2px solid {$color_main} ;
                    border-radius: 50%;
                }
                
                .showcase-slider .swiper-slide .slide-inner .link a .words .second .char {
                    color: {$color_main} ;
                }
                
                .showcase-slider .swiper-slide .slide-inner .link a:hover b {
                    background: {$color_main} ;
                    color: {$color_dark} ;
                    box-shadow: 0 0 8px {$color_main} ;
                }
                
                .icon-content-box .content b:after {
                    background: {$color_main} ;
                }
                
                .icon-content-box .content p strong {
                    color: {$color_main} ;
                }
                
                .counter strong {
                    color: {$color_main} ;
                }
                
                /* BLOG POST */
                .blog-post.sticky:before {
                    background: {$color_dark} ;
                }
                
                .blog-post .post-content .post-title a {
                    color: {$color_dark} ;
                }
                
                .blog-post .post-content .post-title a:hover {
                    color: {$color_main} ;
                }
                
                .blog-post .post-content .post-author b {
                    color: {$color_option_three} ;
                }
                
                .blog-post .post-content .post-author b a {
                    color: {$color_dark} ;
                }
                
                .blog-post .post-content .post-tags li a {
                    background: {$color_main} ;
                    color: {$color_dark} ;
                }
                
                .blog-post .post-content .wp-block-button__link {
                    background: {$color_dark} ;
                }
                
                .blog-post .post-content .wp-block-quote {
                    border-left: 3px solid {$color_option_two} ;
                    color: {$color_dark} ;
                }
                
                .blog-post .post-content .wp-block-quote a {
                    color: {$color_dark} ;
                }
                
                .blog-post .post-content .gallery .gallery-item .gallery-caption {
                    color: {$color_option_three} ;
                }
                
                .blog-post .post-content .wp-block-archives li {
                    color: {$color_option_three} ;
                }
                
                .blog-post .post-content .wp-block-archives li a {
                    color: {$color_dark} ;
                }
                
                .blog-post .post-content .wp-block-archives li a:hover {
                    color: {$color_main} ;
                }
                
                .blog-post .post-content .wp-block-calendar caption {
                    color: {$color_option_three} ;
                }
                
                .blog-post .post-content .wp-block-calendar a {
                    color: {$color_dark} ;
                }
                
                .blog-post .post-content .wp-block-table a {
                    color: {$color_dark} ;
                }
                
                .blog-post .post-content .wp-block-tag-cloud a {
                    background: {$color_dark} ;
                }
                
                .blog-post .post-content .post-entry-footer {
                    border: 5px solid {$color_dark} ;
                    border-left: 1px solid {$color_dark} ;
                    border-top: 1px solid {$color_dark} ;
                }
                
                .blog-post .post-content .post-entry-footer .cat-links {
                    border-bottom: 1px solid {$color_dark} ;
                }
                
                .blog-post .post-content .post-entry-footer .tags-links {
                    border-bottom: 1px solid {$color_dark} ;
                }
                
                .blog-post .post-content .post-navigation .navigation {
                    border: 5px solid {$color_dark} ;
                    border-left: 1px solid {$color_dark} ;
                    border-top: 1px solid {$color_dark} ;
                }
                
                .blog-post .post-content .page-links .post-page-numbers.current {
                    background: {$color_dark} ;
                    border-color: {$color_dark} ;
                }
                
                .blog-post .post-content code {
                    color: {$color_dark} ;
                }
                
                .blog-post .post-content blockquote {
                    background: {$color_option_two} ;
                }
                
                .blog-post .post-content u {
                    border-bottom: 5px solid {$color_main} ;
                }
                
                .blog-post .post-content .post-link {
                    color: {$color_dark} ;
                }
                
                .blog-post .post-content .post-link:after {
                    background: {$color_main} ;
                }
                
                .blog-post .post-content .post-link:hover:before {
                    background: {$color_main} ;
                }
                
                .page-links .post-page-numbers.current {
                    background: {$color_dark} ;
                    border-color: {$color_dark} ;
                }
                
                .post-entry-footer {
                    border: 5px solid {$color_dark} ;
                    border-left: 1px solid {$color_dark} ;
                    border-top: 1px solid {$color_dark} ;
                }
                
                .post-entry-footer .cat-links {
                    border-bottom: 1px solid {$color_dark} ;
                }
                
                .post-entry-footer .tags-links {
                    border-bottom: 1px solid {$color_dark} ;
                }
                
                .post-comment {
                    border: 5px solid {$color_dark} ;
                    margin: 30px 0;
                    border-left: 1px solid {$color_dark} ;
                    border-top: 1px solid {$color_dark} ;
                }
                
                .post-comment .comment-list .comment .comment-content .comment-reply-link {
                    background: {$color_dark} ;
                }
                
                .post-comment .comment-list .comment .comment-content .comment-reply-link:hover {
                    background: {$color_main} ;
                    color: {$color_dark} ;
                }
                
                .post-comment .comment-form .comment-respond form {
                    position: relative;
                }
                
                .post-comment .comment-form .comment-respond form label {
                    color: {$color_option_three} ;
                }
                
                .sidebar .widget {
                    border: 5px solid {$color_dark} ;
                    border-left: 1px solid {$color_dark} ;
                    border-top: 1px solid {$color_dark} ;
                }
                
                .sidebar .widget .categories li a:hover {
                    color: {$color_main} ;
                }
                
                .sidebar .widget .tags li a {
                    background: {$color_main} ;
                }
                
                .sidebar .widget .tags li a:hover {
                    color: {$color_main} ;
                    background: {$color_dark} ;
                }
                
                .sidebar .widget form button[type='submit'] {
                    background: {$color_main} ;
                    color: {$color_dark} ;
                }
                
                .sidebar .widget .widget-title {
                    color: {$color_dark} ;
                }
                
                .sidebar .widget_archive ul li {
                    color: {$color_option_three} ;
                }
                
                .sidebar .widget_archive ul li a {
                    color: {$color_dark} ;
                }
                
                .sidebar .widget_archive ul li a:hover {
                    color: {$color_main} ;
                }
                
                .sidebar .widget_calendar caption {
                    color: {$color_option_three} ;
                }
                
                .sidebar .widget_categories ul li {
                    color: {$color_option_three} ;
                }
                
                .sidebar .widget_categories ul li a {
                    color: {$color_dark} ;
                }
                
                .sidebar .widget_categories ul li a:hover {
                    color: {$color_main} ;
                }
                
                .sidebar .widget_pages ul li {
                    color: {$color_option_three} ;
                }
                
                .sidebar .widget_pages ul li a {
                    color: {$color_dark} ;
                }
                
                .sidebar .widget_pages ul li a:hover {
                    color: {$color_main} ;
                }
                
                .sidebar .widget_meta ul li {
                    color: {$color_option_three} ;
                }
                
                .sidebar .widget_meta ul li a {
                    color: {$color_dark} ;
                }
                
                .sidebar .widget_meta ul li a:hover {
                    color: {$color_main} ;
                }
                
                .sidebar .widget_recent_comments ul li {
                    color: {$color_option_three} ;
                }
                
                .sidebar .widget_recent_comments ul li a {
                    color: {$color_dark} ;
                }
                
                .sidebar .widget_recent_comments ul li a:hover {
                    color: {$color_main} ;
                }
                
                .sidebar .widget_recent_entries ul li {
                    color: {$color_option_three} ;
                }
                
                .sidebar .widget_recent_entries ul li a {
                    color: {$color_dark} ;
                }
                
                .sidebar .widget_recent_entries ul li a:hover {
                    color: {$color_main} ;
                }
                
                .sidebar .widget_rss ul li .rss-date {
                    color: {$color_option_three} ;
                }
                
                .sidebar .widget_rss ul li cite {
                    color: {$color_option_three} ;
                }
                
                .sidebar .widget_rss ul li a {
                    color: {$color_dark} ;
                }
                
                .sidebar .widget_rss ul li a:hover {
                    color: {$color_main} ;
                }
                
                .sidebar .widget_tag_cloud .tagcloud a {
                    color: {$color_dark} ;
                    background: {$color_main} ;
                }
                
                .sidebar .widget_tag_cloud .tagcloud a:hover {
                    background: {$color_dark} ;
                }
                
                .sidebar .widget_nav_menu ul li {
                    color: {$color_option_three} ;
                }
                
                .sidebar .widget_nav_menu ul li a {
                    color: {$color_dark} ;
                }
                
                .sidebar .widget_nav_menu ul li a:hover {
                    color: {$color_main} ;
                }
                
                /* WORKS */
                .works li figure figcaption h5 a:hover {
                    color: {$color_main} ;
                }
                
                /* TEAM SLIDER */
                .team-slider .swiper-pagination-progressbar .swiper-pagination-progressbar-fill {
                    background: {$color_main} ;
                }
                
                /* TEAM MEMBERS */
                .team-member .content small {
                    color: {$color_option_three} ;
                }
                
                .team-member .content ul li a {
                    color: {$color_dark} ;
                }
                
                .team-member .content ul li a:after {
                    background: {$color_main} ;
                }
                
                .team-member .content ul li a:hover:before {
                    background: {$color_main} ;
                }
                
                /* AWARDS BOX */
                .awards-box {
                    background: {$color_dark} ;
                }
                
                /* SIDE ADDRESS */
                .address {
                    background: {$color_option_two} ;
                }
                
                /* FOOTER */
                .footer {
                    background-color: {$color_dark} ;
                }
                
                .footer .footer-inner a:after {
                    background: {$color_main} ;
                }
                
                .footer .footer-inner a:hover:before {
                    background: {$color_main} ;
                }
			";
		}

		return $styles;
	}
}

add_action( 'init', 'atheus_dynamic_css' );