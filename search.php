<?php
/**
 * Template name: Search Page
 */
get_header() ?>

	<section id="search-page" class="container">

		<div class="inner-wrapper row">

			<div class="content col-md-8">

				<div class="inner-content">

					<?php if( have_posts() ) : ?>

						<?php get_template_part( 'partials/excerpt-loop' ) ?>

					<?php else : ?>

						<?php get_template_part( 'partials/404-partial' ) ?>

					<?php endif ?>

				</div>

			</div><!--.content-->

			<aside id="sidebar" class="col-md-4">

				<?php get_template_part( 'sidebars/generic-sidebar' ) ?>

			</aside><!--#sidebar-->

		</div><!--.row-->

	</section><!--.container-->

<?php get_footer() ?>