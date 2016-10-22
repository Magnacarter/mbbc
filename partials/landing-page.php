<?php
/**
 * Landing page template
 */
?>

<section id="landing-page" class="container">

	<div class="inner-wrapper row">

		<div class="content col-md-8">

			<div class="landing-page-intro">

				<div class="intro-content col-sm-8">

					<?php the_field( 'landing_page_intro_content' ) ?>

				</div>

				<?php if( get_field( 'jump_to_nav' ) ) : ?>

					<div class="jump-to col-sm-4">

						<nav class="jump-to-nav">

							<h4>Jump to...</h4>

							<ul>

								<?php if( have_rows( 'jump_to_nav' ) ) : ?>

									<?php while( have_rows( 'jump_to_nav' ) ) : the_row() ?>

										<?php
											$nav_item = get_sub_field( 'nav_title' );
											$nav_link = get_sub_field( 'nav_link' );
										?>

										<a href="<?php echo get_page_link( $post->ID ) ?>#<?php echo esc_attr( $nav_link ) ?>"><li><?php echo esc_html( $nav_item ) ?></li></a>

									<?php endwhile ?>

								<?php endif ?>

							</ul>

						</nav>

					</div>

				<?php endif ?>

			</div>

			<div class="clearfix"></div>

			<?php if( have_posts() ) : ?>

				<?php while( have_posts() ) : the_post() ?>

					<?php if( is_page( 'social-security-disability-attorney' ) ) : ?>

						<h2 id="1">Learning More About Social Security Disability</h2>

						<div class="apply-ad col-sm-6">

							<?php get_template_part( 'partials/ssd-apply-ad-small' ) ?>

						</div>

					<?php else : ?>

						<div class="featured-image col-sm-4">

							<?php the_post_thumbnail() ?>

						</div>

					<?php endif ?>

					<div class="content">

						<?php the_content() ?>

					</div>

				<?php endwhile ?>

			<?php endif; wp_reset_postdata() ?>

		</div><!--.content-->

		<aside id="sidebar" class="col-md-4">

			<?php get_template_part( 'sidebars/pa-landing-page-sidebar' ) ?>

		<aside><!--#sidebar-->

	</div><!--.row-->

</section><!--.container-->