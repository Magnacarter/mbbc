<?php 
/**
 * Author template
 */
get_header() ?>

	<section id="author" class="container">

		<div class="inner-wrapper row">

			<div class="content col-md-8">

				<?php the_author_meta( 'description' ) ?>

				<?php get_template_part( 'partials/excerpt-loop' ) ?>

			</div><!--.content-->

			<aside id="sidebar" class="col-md-4">

				<?php get_template_part( 'sidebars/generic-sidebar' ) ?>

			</aside><!--#sidebar-->

		</div><!--row-->

	</section><!--.container-->

<?php get_footer() ?>