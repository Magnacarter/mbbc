<?php
/**
 * Template name: Thank you page
 */

get_header() ?>

	<section id="thank-you" class="container">

		<div class="inner-wrapper row">

			<div class="content col-md-8">

				<div class="inner-content">

					<?php if ( have_posts() ) : ?> 

						<?php while ( have_posts() ) : the_post() ?>

							<?php if ( has_post_thumbnail() ) : ?>

								<div class="col-sm-5 nopadding featured-image">

									<?php the_post_thumbnail() ?>

								</div>

							<?php endif ?>

							<?php the_content() ?>

						<?php endwhile ?>

					<?php endif ?>

				</div><!--.inner-content-->

			</div><!--content-->

			<aside id="sidebar" class="col-md-4">

				<?php get_template_part( 'sidebars/generic-sidebar' ) ?>

			</aside><!--#sidebar-->

		</div><!--.row-->

	</section><!--.container-->

<?php get_footer() ?>
