<?php
/**
 * Banner text
 */
?>

<div class="header-wrap container">

		<div class="row">

			<div class="<?php echo ( is_front_page() ) ? 'home-banner-logo' : 'banner-logo' ?> no-pad col-sm-7">

				<?php if( is_front_page() || is_singular( 'wpseo_locations' ) ) : ?>

					<a href="<?php echo esc_url( home_url() ) ?>"><?php CWS_Theme::cws_image( 'brown-logo.png' ) ?></a>

				<?php else : ?>

					<a href="<?php echo esc_url( home_url() ) ?>"><?php CWS_Theme::cws_image( 'logo-red.png' ) ?></a>

				<?php endif ?>

			</div><!--banner-logo-->

			<?php if( is_front_page() ) : ?>

				<?php get_template_part( 'partials/front-page-banner-content' ) ?>

			<?php endif ?>

			<div class="mobile-buttons-wrap hidden-lg hidden-md hidden-sm visible-xs">

				<div class="tap-to-call col-xs-6 text-center">

					<a href="tel:5124764873" class="mobile-btn-call">Tap To Call</a>

				</div><!--.tap-to-call-->

				<div class="mobile-direction-button col-xs-6 text-center">

					<a target="_blank" href=" https://goo.gl/maps/HrL9yieWYMR2" class="mobile-btn-directions">Directions</a>

				</div><!--.mobile-direction-button-->

			</div><!--.mobile-buttons-wrap-->

		</div><!--.row-->

	</div><!--.header-wrap-->