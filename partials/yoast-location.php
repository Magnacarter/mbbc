<?php
/**
 * Yoast Location
 */
// Adam's location ID
//$location_id = 3125;
//Server location ID
$location_id = 4086;
?>

<div class="yoast-location-meta">

	<div class="sb-wrap">

		<div class="sb-header">

			<h3>Visit Our Austin Office</h3>

		</div><!--.sb-header-->

		<div class="ylm-map">

			<?php
			//map
			if( function_exists( 'wpseo_local_show_map' ) ) {

				$params = array(
					'echo'       => true,
					'id'         => $location_id,
					'height'     => 210,
					'zoom'       => 15,
					'show_route' => false
				);

				wpseo_local_show_map( $params );

				}

			?>

		</div>

		<div class="ylm-address">

			<h4>Minton, Burton, Basset &amp; Collins, P.C.</h4>

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

			<div class="directions-button">

				<a target="_blank" href="https://goo.gl/maps/HrL9yieWYMR2" class="directions-btn">Get Directions</a>

			</div><!--.directions-button-->

		</div><!--.ylm-address-->

	</div><!--.sb-wrap-->

</div><!--.yoast-location-meta-->
