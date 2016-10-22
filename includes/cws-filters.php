<?php
/**
 * CWS Filters
 */

/**
 * add async to js
 *
 * @add_filter clean_url
 *
 * @return $url
 */
function cws_async_scripts( $url ) {
	if ( strpos( $url, '#asyncload') === false ) {
		return $url;
	} else if ( is_admin() ) {
		return str_replace( '#asyncload', '', $url );
	} else {
		return str_replace( '#asyncload', '', $url ) . "' async='async";
	}
}
add_filter( 'clean_url', 'cws_async_scripts', 11, 1 );

/**
 * add with_front => false to Local SEO custom post type
 *
 * @add_filter wpseo_local_cpt_args
 * @param $args_cpt array
 * @return $args_cpt array
 */
function cws_add_rewrite_cpt_rule( $args_cpt ) {
	$labels = array(
		'name'               => __( 'Locations', 'yoast-local-seo' ),
		'singular_name'      => __( 'Location', 'yoast-local-seo' ),
		'add_new'            => __( 'New Location', 'yoast-local-seo' ),
		'new_item'           => __( 'New Location', 'yoast-local-seo' ),
		'add_new_item'       => __( 'Add New Location', 'yoast-local-seo' ),
		'edit_item'          => __( 'Edit Location', 'yoast-local-seo' ),
		'view_item'          => __( 'View Location', 'yoast-local-seo' ),
		'search_items'       => __( 'Search Locations', 'yoast-local-seo' ),
		'not_found'          => __( 'No locations found', 'yoast-local-seo' ),
		'not_found_in_trash' => __( 'No locations found in trash', 'yoast-local-seo' ),
	);

	$args_cpt = array(
			'labels'               => $labels,
			'public'               => true,
			'show_ui'              => true,
			'show_in_menu'         => true,
			'show_in_admin_bar'    => true,
			'show_in_nav_menus'    => true,
			'capability_type'      => 'post',
			'hierarchical'         => false,
			'rewrite'              => array( 'slug' => 'locations', 'with_front' => false ),
			'has_archive'          => 'locations',
			'query_var'            => true,
			'supports'             => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes' )
		);

	return $args_cpt;
}
add_filter( 'wpseo_local_cpt_args', 'cws_add_rewrite_cpt_rule' );

/**
 * Filter the body class to show front page template if on front page used
 *
 * @add_filter body_class
 * @param $classes array
 *
 * @return $classes array
 */
function cws_class_names( $classes ) {
	// add 'class-name' to the $classes array
	if( is_front_page() ) $classes[] = 'front-page';
	// return the $classes array
	return $classes;
}
add_filter( 'body_class', 'cws_class_names' );

/**
 * Filter length of excerpt
 *
 * @return 20
 *
 * @add_filter excerpt_length
 */
function cws_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'cws_excerpt_length', 999 );

/**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function cws_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'cws_excerpt_more' );