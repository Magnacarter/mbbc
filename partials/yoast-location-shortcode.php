<?php
/**
 * Yoast Location
 */
// Adam's location ID
//$location_id = 3125;
//Server location ID
$location_id = 4086;
//Firm Name
$firm_name = "Minton, Burton, Basset &amp; Collins, P.C.";
?>

<div class="yoast-location-meta">

	<div class="ylm-map col-sm-5 no-pad">

		<?php
		//map
		if( function_exists( 'wpseo_local_show_map' ) ) {

			$params = array(
				'echo'       => true,
				'id'         => $location_id,
				'height'     => 278,
				'zoom'       => 15,
				'show_route' => false
			);

			wpseo_local_show_map( $params );

			}

		?>

	</div>

	<div class="ylm-address col-sm-7 no-pad-right">

		<h4><?php echo esc_html( $firm_name ) ?></h4>

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

</div><!--.yoast-location-meta-->

<div class="yoast-location-meta_1">

	<div class="ylm-map col-sm-12 no-pad">

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

	<div class="ylm-address col-sm-12">

		<h4><?php echo esc_html( $firm_name ) ?></h4>

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

</div><!--.yoast-location-meta-->
