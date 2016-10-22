<?php

/**
 * Build CPTs and custom Categories for theme
 * with the CWS_Theme class
 */
$testimonial     = new CWS_Theme( 'testimonial' );
$result          = new CWS_Theme( 'result' );
$attorney        = new CWS_Theme( 'attorney' );
$awards          = new CWS_Theme( 'awards' );
$page_supports   = array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields', 'revisions', 'page-attributes' );
$post_supports   = array( 'title', 'editor', 'thumbnail' );

/**
 * Custom Post Type: Testimonial
 */
$testimonial->cws_build_cpt( 'testimonials', 'Testimonial', 'Testimonials', $post_supports );

/**
 * Custom Post Type: Attorney
 */
$attorney->cws_build_cpt( 'our-attorneys', 'Attorney', 'Attorneys', $post_supports );

/**
 * Custom Post Type: Result
 */
$result->cws_build_cpt( 'results', 'Result', 'Results', $post_supports );

/**
 * Custom Post Type: Awards
 */
$awards->cws_build_cpt( 'awards', 'Award', 'Awards', $post_supports );
