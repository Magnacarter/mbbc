<?php
/*
 * Blog page "Home"
 */
get_header() ?>

	<section id="blog" class="container">

		<div class="inner-wrapper row">

			<div class="content col-md-8">

				<?php get_template_part( 'partials/blog-search-tools' ) ?>

				<div class="inner-content">

					<?php get_template_part( 'partials/excerpt-loop' ) ?>

				</div><!--.inner-content-->

				<div class="blog-pagination">

					<?php do_action( 'cws_pagination' ) ?>

				</div><!--.blog-pagination-->

			</div><!--.content-->

			<aside id="sidebar" class="col-md-4">

				<?php get_template_part( 'sidebars/blog-sidebar' ) ?>

			</aside><!--#sidebar-->

		</div><!--.row-->

	</section><!--.container-->

<?php get_footer() ?>