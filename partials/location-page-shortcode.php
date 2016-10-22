<?php
/**
 * Location page shortcode
 */

// Server location ID
global $post;
$location_id = $post->ID;
$local       = new CWS_Practice_Area( 'wpseo_locations' );

?>

<section class="location-shortcode col-md-12">

	<div class="shortcode-title">

		<h2>Visit us at our <?php $local->cws_get_titles( array(), '1', $location_id )  ?> location</h2>

	</div>

	<div class="col-md-6 nopadding">

		<div class="ylm-address shortcode-address col-md-12">

			<h4>Gemma Law Associates Inc.</h4>

			<?php
			//address
			if( function_exists( 'wpseo_local_show_address' ) ) {

				$params = array(
					'echo'         => true,
					'id'           => $location_id,
					'show_state'   => true,
					'show_country' => true,
					'show_phone'   => true,
					'oneline'      => false,
				);

				wpseo_local_show_address( $params );

			}

			?>

			<div class="sidebar-fax">

				<span>Fax: 401-467-8678</span>

			</div>

			<div class="directions-button">

				<a href="#" class="directions-btn">Directions</a>

			</div>

		</div>

		<div class="ylm-hours shortcode-hours col-md-12">

			<h2>Hours of Operation</h2>

			<?php
			//hours
			if ( function_exists( 'wpseo_local_show_opening_hours' ) ) {

				$params = array(
					'id'          => $location_id,
					'hide_closed' => false,
					'echo'        => true,
					'comment'     => ''
				);

				wpseo_local_show_opening_hours( $params );

			}

			?>

			<div class="sc-hours-claim">

				<p><i>We are ready to take your calls 24 hours 7 days a week.</i></p>

			</div>

		</div>

	</div>

	<div class="ls-map col-md-6 nopadding hidden-sm hidden-xs">

		<?php
		//map
		if( function_exists( 'wpseo_local_show_map' ) ) {

			$params = array(
				'echo'       => true,
				'id'         => $location_id,
				'height'     => 737,
				'zoom'       => 15,
				'show_route' => false
			);

			wpseo_local_show_map( $params );

			}

		?>

	</div>

	<div class="ls-map map-shortcode col-sm-12 nopadding hidden-md hidden-lg">

		<?php
		//map
		if( function_exists( 'wpseo_local_show_map' ) ) {

			$params = array(
				'echo'       => true,
				'id'         => $location_id,
				'zoom'       => 15,
				'show_route' => false
			);

			wpseo_local_show_map( $params );

			}

		?>

	</div>

	<div class="leave-review col-xs-12">

		<div class="review-title col-md-6 col-sm-12">

			<h4>Leave a Review!</h4>

		</div>

		<div class="review-icons col-md-6 col-sm-12">

			<ul>

				<li><a href="http://www.yelp.com/biz/gemma-law-providence"><?php $local->cws_image( '/images/yelp-review-icon.png', 'Yelp Review Icon' ) ?></a></li>

				<li><a href="#"><?php $local->cws_image( '/images/city-review-icon.png', 'City Review Icon' ) ?></a></li>

				<li><a href="https://plus.google.com/113577207611156427671/posts"><?php $local->cws_image( '/images/google-review-icon.png', 'Google Review Icon' ) ?></a></li>

			</ul>

		</div>

	</div>

</section>
