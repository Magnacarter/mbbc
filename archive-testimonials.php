<?php
/**
 * Template name: Testimonial archive
 */

$args = array(
	'post_type'      => 'testimonial',
	'posts_per_page' => 20,
);

$query = new WP_Query( $args );

get_header() ?>

	<section id="archive-testimonials" class="container">

		<div class="inner wrapper row">

			<div class="content col-md-8">

				<?php if( $query->have_posts() ) : ?>

					<?php while( $query->have_posts() ) : $query->the_post() ?>

						<div class="big-quote-wrap">

							<div class="quote-icon col-md-1 text-right">

								<?php CWS_Theme::cws_image( 'giant-quote.png' ) ?>

							</div>

							<div class="pa-quote col-md-11 col-sm-12 col-xs-12">

								<blockquote class="no-pad text-right">

									<q><?php the_content() ?></q>

								</blockquote>

							</div>

							<div class="quote-footer col-md-12 text-right">

								<h6>-<?php the_title() ?></h6>

							</div><!--.row-->

						</div><!--.big-quote-wrap-->

					<?php endwhile ?>

				<?php endif; wp_reset_postdata() ?>

			</div><!--.content-->

			<aside id="sidebar" class="col-md-4">

				<?php get_template_part( 'sidebars/generic-sidebar' ) ?>

			</aside><!--#sidebar-->

		</div><!--.row-->

	</section><!--.container-->

<?php get_footer() ?>