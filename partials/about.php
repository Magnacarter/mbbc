<?php
/**
 * Template name: About Page
 */
get_header();
?>

<section id="about" class="container">

	<div class="inner-wrapper row">

		<div class="content col-md-8">

			<?php if( have_posts() ) : ?>

				<?php while( have_posts() ) : the_post() ?>

					<?php the_content() ?>

				<?php endwhile ?>

			<?php endif; wp_reset_postdata() ?>

		</div> <!-- </content> -->

		<aside id="sidebar" class="col-md-4">

			<?php get_template_part( 'sidebars/about-sidebar' ) ?>

		</aside><!--#sidebar-->

	</div> <!--.row-->

</section> <!--.container-->

<?php do_action( 'section_three' ) ?>

<section id="big-quote" class="container">

	<div class="row">

		<?php get_template_part( 'partials/big-quote' ) ?>

	</div><!--.row-->

</section><!--.container-->

<?php get_footer() ?>

