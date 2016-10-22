<?php
/**
 * Template name: Legal Services
 */
get_header();

$args = array(
	'post_type' => 'page',
	'post__in'  => array( 1131, 8198, 1122, 7815, 550 ),
	'orderby'   => 'menu_order',
);

$ls = new WP_Query( $args );

$arg = array(
	'post_type' => 'page',
	'post__in'  => array( 171 ),
);

$aa = new WP_Query( $arg );

?>

<section id="legal-services" class="container">

	<?php get_template_part( 'partials/video' ) ?>

	<div class="row">

		<div <!--.content-->class="content col-md-8">

			<?php if( have_posts() ) : ?>

				<?php while( have_posts() ) : the_post() ?>

					<?php the_content() ?>

				<?php endwhile ?>

			<?php endif; wp_reset_postdata() ?>

		</div><!--.content-->

		<aside id="sidebar" class="col-md-4">

			<?php CWS_Theme::cws_image( 'logo-ntl-top100.png', 'National Trial Lawyers' ) ?>

		</aside><!--#sidebar-->

	</div> <!--.row-->

</section><!--.container-->

<section id="legal-service-areas">

	<div class="container">

		<div class="row">

			<?php if( $aa->have_posts() ) : ?>

				<?php while( $aa->have_posts() ) : $aa->the_post() ?>

					<div class="legal-service-area-wrap col-md-4">

						<div class="legal-service-area">

							<div class="ls-icon">

								<img src="<?php the_field( 'service_icon' ) ?>">

							</div>

							<div class="ls-title">

								<h3><?php the_title() ?></h3>

							</div>

							<div class="ls-description">

								<p><?php the_excerpt() ?></p>

							</div>

							<div class="directions-button">

								<a href="<?php the_permalink() ?>" class="directions-btn">Get <?php the_field( 'service_title' ) ?> Help</a>

							</div><!--directions-btn-->

						</div><!--.legal-service-area-->

					</div><!--.legal-service-area-wrap-->

				<?php endwhile ?>

			<?php endif; wp_reset_postdata() ?>

			<?php if( $ls->have_posts() ) : ?>

				<?php while( $ls->have_posts() ) : $ls->the_post() ?>

					<div class="legal-service-area-wrap col-md-4">

						<div class="legal-service-area">

							<div class="ls-icon">

								<img src="<?php the_field( 'service_icon' ) ?>">

							</div>

							<div class="ls-title">

								<h3><?php the_field( 'service_title' ) ?></h3>

							</div>

							<div class="ls-description">

								<p><?php the_field( 'service_description' ) ?></p>

							</div>

							<div class="directions-button">

								<a href="<?php the_permalink() ?>" class="directions-btn">Get <?php the_field( 'service_title' ) ?> Help</a>

							</div><!--directions-btn-->

						</div><!--.legal-service-area-->

					</div><!--.legal-service-area-wrap-->

				<?php endwhile ?>

			<?php endif; wp_reset_postdata() ?>

			<div class="ls-testimony-wrap col-md-8">

				<div class="ls-title">

					<h3>What <strong>Your Neighbors</strong> Say About</h3>

					<h3>Jim Leach, Attorney at Law, LC</h3>

					<?php CWS_Theme::cws_image( 'chevron.png', 'Chevron Icon' ) ?>

				</div>

				<div class="custom-arrows"></div>

				<div class="ls-testimony">

					<?php

					$args = array(
						'post_type' => 'testimonial',
					);

					$testimony = new WP_Query( $args );

					?>

					<?php if( $testimony->have_posts() ) : ?>

						<?php while( $testimony->have_posts() ) : $testimony->the_post() ?>

							<div class="ls-testimony-inner">

								<div class="ls-testimony-image">

									<?php the_post_thumbnail() ?>

								</div>

								<h4>Our Client <?php the_title() ?> said...</h4>

								<blockquote><?php the_content() ?></blockquote>

								<div class="individual-result-wrap">

									<?php the_field( 'individual_result' ) ?>

									<div class="learn-more-button">

										<a class="learn-more-btn" href="<?php the_permalink() ?>">Learn More</a>

									</div>

								</div>

							</div>

						<?php endwhile ?>

					<?php endif; wp_reset_postdata() ?>

				</div><!--s3-testimony-->

			</div><!--s3-testimony-wrap-->

			<div class="ls-sidebar col-md-4">

				<h4>Have Questions?</h4>

				<h4>Need Quick Answers?</h4>

				<h6>Call Our Parkersburg Office</h6>

				<h2>1-304-865-8530</h2>

				<?php do_action( 'cws_form_sidebar' ) ?>

			</div><!--.ls-sidebar-->

		</div><!--.row-->

	</div><!--.container-->

</section><!--#legal-service-areas-->

<?php get_footer() ?>