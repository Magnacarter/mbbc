<?php
/**
 * Header partial
 */

if( get_field( 'banner_image' ) ) {

	$desk_banner = get_field( 'banner_image' );

} elseif ( is_singular( 'attorney' ) ) {

	$desk_banner = CWS_Theme::cws_get_img( 'single-attorney-banner.png' );

} elseif( is_singular( 'wpseo_locations' ) ) {

	$desk_banner = CWS_Theme::cws_get_img( 'single-location-banner.png' );

} elseif( is_single() ) {

	$desk_banner = CWS_Theme::cws_get_img( 'blog-banner.png' );

} else {

	$desk_banner = CWS_Theme::cws_get_img( 'about-background.png' );

}

if( get_field( 'mobile_banner' ) ) {

	$mobile_banner = get_field( 'mobile_banner' );

} else {

	$mobile_banner = CWS_Theme::cws_get_img( 'mobile-black-white-banner.jpg' );

}

if( is_home() ) {

	$desk_banner = get_field( 'banner_image', get_option( 'page_for_posts' ) );

	$mobile_banner = get_field( 'mobile_banner', get_option( 'page_for_posts' ) );

}

?>

<div class="<?php echo ( is_front_page() ) ? 'front-page-banner hidden-xs' : 'banner hidden-xs' ?>" style="background-image: url( '<?php echo $desk_banner ?>' );">

	<?php get_template_part( 'partials/banner-text' ) ?>

</div><!--.banner-->

<div class="<?php echo ( is_front_page() ) ? 'front-page-banner hidden-lg hidden-md hidden-sm visable-xs' : 'banner hidden-lg hidden-md hidden-sm visable-xs' ?>" style="background-image: url( '<?php echo $mobile_banner ?>' );">

	<?php get_template_part( 'partials/banner-text' ) ?>

</div><!--.banner-->

<?php if( ! is_front_page() ) : ?>

	<div class="skew-div hidden-lg skew hidden-md hidden-sm visable-xs"></div>

<?php endif ?>


