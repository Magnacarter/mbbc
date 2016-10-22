<?php
/**
 * Testimony shortcode
 */
?>

<div class="ls-testimony-wrap">

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

							<a class="learn-more-btn" href="<?php echo esc_url( home_url() ) ?>/testimonials/">Learn More</a>

						</div>

					</div>

				</div>

			<?php endwhile ?>

		<?php endif; wp_reset_postdata() ?>

	</div><!--ls-testimony-->

</div><!--ls-testimony-wrap-->