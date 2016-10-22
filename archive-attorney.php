<?php
/*
 * Template name: Attoney archive
 */

global $post;

$args = array(
	'post_type'      => 'attorney',
	'posts_per_page' => 5,
	'order'          => 'ASC',
	'post__in'       => array(
		3798,
		6291,
		3084,
		3810,
		3775,
	),
);

$args2 = array(
	'post_type'      => 'attorney',
	'posts_per_page' => 4,
	'order'          => 'ASC',
	'post__in'       => array(
		3767,
		3790,
		4241,
		4248
	),
);

$attorney   = new WP_Query( $args );
$attorney_b = new WP_Query( $args2 );
$i = 0;

get_header() ?>

	<section id="index" class="container">

		<div class="inner-wrapper row">

			<div class="content col-md-8">

				<?php if ( have_posts() ) : ?> 

					<?php while ( have_posts() ) : the_post() ?>

						<p><?php the_content() ?></p>

					<?php endwhile ?>

				<?php endif ?>

			</div><!--.content-->

			<aside id="sidebar" class="col-md-4">

				<?php get_template_part( 'sidebars/attorney-archive-sidebar' ) ?>

			</aside><!--#sidebar-->

		</div><!--.row-->

	</section><!--.container-->

	<div class="grey-background container-fluid">

		<div class="custom-arrows"></div>

		<div class="arrow-down"></div>

		<div class="c3-content-wrap container">

			<div class="row">

				<div class="team-slider-title">

					<h3>Meet Our Attorneys</h3>

				</div>

				<div class="full-team">

					<?php if( $attorney->have_posts() ) : ?>

						<?php while( $attorney->have_posts() ) : $attorney->the_post(); $i++ ?>

							<div class="attorney-slide col-lg-2 col-md-3 top-attorneys <?php echo $post->ID ?>	">

								<?php the_post_thumbnail() ?>

								<h5><?php the_title() ?></h5>

								<h6><a href="<?php the_permalink() ?>">See Full Bio</a></h6>

							</div><!--.attorney-slide-->

						<?php endwhile ?>

					<?php endif; wp_reset_postdata() ?>

					<?php if( $attorney_b->have_posts() ) : ?>

						<?php while( $attorney_b->have_posts() ) : $attorney_b->the_post(); $i++ ?>

							<div class="attorney-slide col-md-3 bottom-attorneys">

								<?php the_post_thumbnail() ?>

								<h5><?php the_title() ?></h5>

								<h6><a href="<?php the_permalink() ?>">See Full Bio</a></h6>

							</div><!--.attorney-slide-->

						<?php endwhile ?>

					<?php endif; wp_reset_postdata() ?>

				</div><!--.team-slider-->

			</div><!--.row-->

		</div><!--.container-->

	</div><!--.container-fluid-->

	<section id="big-quote" class="container">

		<div class="row">

			<?php get_template_part( 'partials/big-quote' ) ?>

		</div><!--.row-->

	</section><!--.container-->

<?php get_footer() ?>