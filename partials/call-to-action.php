<?php
/**
 * Call to action shortcode
 */

if( ! is_page( 'personal-injury-law-firm' ) ) {
	?>

		<style>

			.call-to-action-shortcode {
				margin: 73px auto;
				padding-left: 0;
				padding-right: 0px;
				float: none;
				text-align: center;
			}

		</style>

	<?php
}

?>

<div class="call-to-action-shortcode <?php echo ( is_singular( array( 'personal_injury', 'civil', 'accident_injury', 'car_accident' ) ) || is_page( array( 'car-accident-lawyer', 'personal-injury', 'civil', 'accident-injury' ) ) ) ? 'col-md-12' : 'col-md-5' ?>">

	<div class="cta-wrap">

		<?php if( is_front_page() || is_page( 'personal-injury-law-firm' ) ) : ?>

			<div class="cta-content">

				<h3>Get Jim Leach On</h3>

				<h3>Your Side Today</h3>

				<h2>1-304-865-8530</h2>

			</div>

		<?php else : ?>

			<div class="cta-content">

				<h3>Get Jim Leach On Your Side Today</h3>

				<h2>1-304-865-8530</h2>

			</div>

		<?php endif ?>

		<div class="shortcode-consultation-button">

			<a class="shortcode-consultation-btn" href="<?php echo home_url() ?>/contact-us/">Free Consultation</a>

		</div>

	</div>

</div>