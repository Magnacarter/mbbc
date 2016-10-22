<?php
/**
 * Practice single
 */
$args = array(
	'post_type'      => 'attorney',
	'posts_per_page' => 9,
	'order'          => 'ASC'
);

$attorney = new WP_Query( $args );
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

				<?php get_template_part( 'sidebars/single-attorney-sidebar' ) ?>

			</aside><!--#sidebar-->

		</div><!--.row-->

	</section><!--.container-->

	<?php do_action( 'section_three' ) ?>

	<section id="big-quote" class="container">

		<div class="row">

			<?php get_template_part( 'partials/big-quote' ) ?>

		</div><!--.row-->

	</section><!--.container-->

<?php get_footer() ?>