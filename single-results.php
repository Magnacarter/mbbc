<?php
/**
 * Results single
 */
get_header() ?>

	<section class="container">

		<div class="inner-wrapper row">

		<?php get_template_part( 'partials/video' ) ?>

			<div class="content col-md-8">

				<?php if ( have_posts() ) : ?> 

					<?php while ( have_posts() ) : the_post() ?>

						<p><?php the_content() ?></p>

					<?php endwhile ?>

				<?php endif ?>

			</div><!--.content-->

			<aside id="sidebar" class="col-md-4">

				<?php get_template_part( 'sidebars/generic-sidebar' ) ?>

			</aside><!--#sidebar-->

		</div><!--.row-->

	</section><!--.container-->

<?php get_footer() ?>