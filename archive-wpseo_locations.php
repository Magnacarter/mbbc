<?php
/**
 * Locations archive
 */
$args = array( 
	'post_type' => 'wpseo_locations'
);

$location = new WP_Query( $args );
$page_loc = get_post(3986);

get_header() ?>

	<section id="archive-locations" class="container">

		<div class="inner-wrapper row">

			<div class="content col-md-8">

				<div class="locations">

					<?php if( $location->have_posts() ) : ?>

						<?php while( $location->have_posts() ) : $location->the_post() ?>

							<?php the_content() ?>

						<?php endwhile() ?>

					<?php endif; wp_reset_postdata() ?>

				</div><!--.locations-->

			</div><!--.content-->

			<aside id="sidebar" class="col-md-4">

				<?php get_template_part( 'sidebars/generic-sidebar' ) ?>

			</aside><!--#sidebar-->

		</div><!--.row-->

	</section><!--.container-->

<?php get_footer() ?>