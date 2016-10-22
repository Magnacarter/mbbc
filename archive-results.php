<?php
/**
 * Template Name: Results archive
 */
get_header() ?>

<?php

$args = array(
	'post_type'      => 'result',
	'posts_per_page' => 20,
);

$query = new WP_Query( $args );

?>

	<section id="archive-results" class="container">

		<div class="inner-wrapper row">

			<div class="content col-md-8">

				<?php if( $query->have_posts() ) : ?>

					<?php while( $query->have_posts() ) : $query->the_post() ?>

						<div class="result">

							<h3 class="text-center"><?php the_title() ?></h3>

							<?php the_content() ?>

						</div>

					<?php endwhile ?>

				<?php endif; wp_reset_postdata() ?>

			</div><!--.content-->

			<aside id="sidebar" class="col-md-4">

				<?php get_template_part( 'sidebars/generic-sidebar' ) ?>

			</aside><!--#sidebar-->

		</div><!--.row-->

	</section><!--.container-->

<?php get_footer() ?>