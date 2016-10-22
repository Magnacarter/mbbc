<?php
/*
 * Categories template
 */
get_header() ?>

	<section id="category" class="container">

		<div class="inner-wrapper row">

			<div class="content col-md-8">

				<?php get_template_part( 'partials/blog-search-tools' ) ?>

				<div class="inner-content">

					<?php get_template_part( 'partials/excerpt-loop' ) ?>

				</div>

			</div><!--.content-->

			<aside id="sidebar" class="col-md-4">

				<?php get_template_part( 'sidebars/generic-sidebar' ) ?>

			</aside><!--#sidebar-->

		</div><!--.row-->

	</section><!--.container-->

<?php get_footer() ?>
