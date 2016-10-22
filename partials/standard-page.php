<?php
/**
 * Standard Page partial
 */
?>

<section id="standard-page" class="container">

	<div class="inner-wrapper row">

		<div class="content col-md-8">

			<?php if ( have_posts() ) : ?> 

				<?php while ( have_posts() ) : the_post() ?>

					<?php if ( has_post_thumbnail() ) : ?>

						<div class="col-sm-5 featured-image no-pad-left">

							<?php the_post_thumbnail() ?>

						</div>

					<?php endif ?>

					<?php the_content() ?>

				<?php endwhile ?>

			<?php endif ?>

		</div><!--.content-->

		<aside id="sidebar" class="col-md-4">

			<?php 

				if ( is_page( 'about-us' ) ) {

					get_template_part( 'sidebars/about-sidebar' );

				} elseif( is_page( 'contact-us' ) ) {

					get_template_part( 'sidebars/contact-sidebar' );

				} elseif( is_singular( 'attorney' ) ) {

					get_template_part( 'sidebars/attorney-bio-sidebar' );

				} elseif( is_singular( 'wpseo_locations' ) ) {

					get_template_part( 'sidebars/location-sidebar' );

				} elseif( is_singular( 'practice_area' ) ) {

					get_template_part( 'sidebars/legal-services-sidebar' );

				} else {

					get_template_part( 'sidebars/generic-sidebar' );

				}

			?>

		</aside><!--#sidebar-->

		<div class="clearfix"></div>

		<?php get_template_part( 'partials/big-quote' ) ?>

	</div><!--.row-->

</section><!--.container-->
