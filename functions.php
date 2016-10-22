<?php
define( 'JS_VERS', '1.0.0' );
define( 'CSS_VERS', '1.0.0' );

require_once STYLESHEETPATH . '/includes/cws-theme-class.php';
require_once STYLESHEETPATH . '/includes/cws-hooks.php';
require_once STYLESHEETPATH . '/includes/cws-filters.php';
require_once STYLESHEETPATH . '/includes/cws-custom-functions.php';
require_once STYLESHEETPATH . '/includes/cws-shortcodes.php';
require_once STYLESHEETPATH . '/includes/walker.php';
require_once STYLESHEETPATH . '/includes/post-types.php';
require_once STYLESHEETPATH . '/includes/sidebar-hooks.php';
require_once STYLESHEETPATH . '/includes/front-page-hooks.php';
require_once STYLESHEETPATH . '/includes/acf.php';

/**
 * Deregister jQuery and register in footer.
 */
function cws_remove_jquery() {
	if( ! is_admin() ) {
		wp_deregister_script( 'jquery' );
	}
}
add_action( 'init', 'cws_remove_jquery' );

/**
 * Load scripts and styles for the theme
 *
 * @action wp_enqueue_scripts
 *
 * @return void
 */
function cws_enqueue_scripts() {
	wp_enqueue_style  ( 'cws-bootstrap',       get_template_directory_uri() . '/css/bootstrap.css' );
	wp_enqueue_style  ( 'cws-main',            get_template_directory_uri() . '/css/app.css', false, CSS_VERS );
	wp_enqueue_script ( 'cws-theme-js',        get_template_directory_uri() . '/js/app.min.js', array( 'jquery' ), JS_VERS, true );
	wp_enqueue_script ( 'set-map-js', 'http://maps.google.com/maps/api/js?sensor=false', NULL, false, true );
	wp_enqueue_script ( 'cws-form-cdn', '//www.cw-apps.com/wp-content/js-repository/5c56210f9310f151ff875a89fb83c729.js', array(), JS_VERS, true );
}
add_action( 'wp_enqueue_scripts', 'cws_enqueue_scripts' );

/**
 * Add theme support for sidebar widgets
 */
function cws_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'CWS Primary Sidebar', 'set-slug' ),
		'id'            => 'set-sidebar',
		'description'   => __( 'Widgets in this area will be shown on all posts and pages, except frontpage.', 'theme-slug' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'CWS Secondary Sidebar', 'set-slug' ),
		'id'            => 'set-sidebar-two',
		'description'   => __( 'This is a secondary sidebar to house widgets after a page break.', 'theme-slug' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'cws_widgets_init' );

/**
 * Add header and footer menus
 *
 * @add_action init
 */
function cws_register_menus() {
	register_nav_menus(
		array(
			'header-menu'     => __( 'Header Menu' ),
			'footer-menu'     => __( 'Footer Menu' ),
			'sub-footer-menu' => __( 'Sub Footer Menu' ),
			'mobile-menu'     => __( 'Mobile Menu' )
		)
	);
}
add_action( 'init', 'cws_register_menus' );

/**
 * Add an acf options page
 */
if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page();
}

/**
 * Add featured images
 */
add_theme_support( 'post-thumbnails' );

/**
 * Add excerpt field to pages
 */
function cws_add_excerpts_to_pages() {
	add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'cws_add_excerpts_to_pages' );
