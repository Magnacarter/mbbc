<?php
/*
 * Template name: Legal Services archive
 */

$args = array(
	'post_type'      => 'page',
	'posts_per_page' => 14,
	'post__in'       => array(
		158,
		349,
		168,
		358,
		175,
		366,
		375,
		383,
		193,
		290,
		392,
		300,
		185,
		399,
	),
	'orderby'          => 'post__in',
);

$ls = new WP_Query( $args );
$i = 0;

get_header() ?>

	<section id="index" class="container">

		<div class="inner-wrapper row">

			<div class="content col-md-8">

				<?php if ( $ls->have_posts() ) : ?> 

					<?php while ( $ls->have_posts() ) : $ls->the_post(); $i++ ?>

						<div class="pa-link col-xs-6 no-pad">

							<div class="pal-img col-xs-3 no-pad">

								<img src="<?php the_field( 'legal_service_icon' ) ?>">

							</div>

							<div class="pal-title col-xs-9 no-pad">

								<a href="<?php the_permalink() ?>"><h5><?php the_title() ?></h5></a>

							</div>

						</div>

						<?php if( $i % 2 == 0 ) : ?>

							<div class="pal-border"></div>

						<?php endif ?>

					<?php endwhile ?>

				<?php endif ?>

			</div><!--.content-->

			<aside id="sidebar" class="col-md-4">

				<?php get_template_part( 'sidebars/legal-services-sidebar' ) ?>

			</aside><!--#sidebar-->

		</div><!--.row-->

	</section><!--.container-->

	<section id="big-quote" class="container">

		<div class="row">

			<?php get_template_part( 'partials/big-quote' ) ?>

		</div><!--.row-->

	</section><!--.container-->

<?php get_footer() ?>