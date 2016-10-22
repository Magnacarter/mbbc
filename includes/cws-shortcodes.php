<?php
/**
 * CWS Custom Shortcodes
 */

/**
 * Video shortcode
 *
 * @add_action cws_video
 *
 * @return void
 */
function cws_video_shortcode() {

	ob_start();

		get_template_part( 'partials/video' );

		do_action( 'cws_video_sidebar' );

		if( is_singular( 'attorney' ) ) : ?>

			<style>

				.video-sidebar {
					margin: 0;
					margin-bottom: 10px;
					margin-left: -48px;
				}

			</style>

		<?php endif;

	return ob_get_clean();

}
add_shortcode( 'cws_video', 'cws_video_shortcode' );

/**
 * Call to action shortcode output
 *
 * @add_action cws_call_to_action
 *
 * @return
 */
function cws_call_to_action_output() {

	ob_start();

		get_template_part( 'partials/call-to-action' );

	return ob_get_clean();

}
add_shortcode( 'cws_call_to_action', 'cws_call_to_action_output' );

/**
 * Location meta shortcode for content
 *
 * @add_action cws_page_location
 *
 * @return
 */
function cws_location_page_output() {

	ob_start();

		get_template_part( 'partials/location-page-shortcode' );

	return ob_get_clean();

}
add_shortcode( 'cws_location_page', 'cws_location_page_output' );

/**
 * Loaction information
 * output Yoast location data
 *
 * @add_action cws_location
 *
 * @return 
 */
function cws_location_output() {

	ob_start();

		get_template_part( 'partials/yoast-location-shortcode' );

	return ob_get_clean();

}
add_shortcode( 'cws_location', 'cws_location_output' );

/**
 * Form
 *
 * @add_shortcode
 *
 * @return ob_get_clean
 */
function cws_form_output() {

	ob_start();

	?>

	<div class="form-block">

		<?php get_template_part( 'partials/form-shortcode' ) ?>

	</div>

	<?php

	return ob_get_clean();

}
add_shortcode( 'cws_form', 'cws_form_output' );

/**
 * Form for contact page
 *
 * @add_shortcode
 *
 * @return ob_get_clean
 */
function cws_form_contact_us_output() {

	ob_start();

	?>

	<div class="form-block">

		<?php get_template_part( 'partials/form-contact-us' ) ?>

	</div>

	<?php

	return ob_get_clean();

}
add_shortcode( 'cws_form_contact_us', 'cws_form_contact_us_output' );

/**
 * Testimony
 *
 * @add_shortcode cws_testimony
 *
 * @return get_template_part( 'cws_testimony' ) partial
 */
function cws_testimony_output() {

	ob_start();

		get_template_part( 'partials/testimony-shortcode' );

	return ob_get_clean();

}
add_shortcode( 'cws_testimony', 'cws_testimony_output' );