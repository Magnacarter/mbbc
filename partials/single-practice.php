<?php
/**
 * Single practice page partial
 */

global $post;
$a = 0;
$i = 0;

?>

<section id="about-boxes" class="container">

	<div class="row">

		<div class="jump-to-nav-wrap col-md-4">

			<div class="jump-to-nav">

				<div class="box-title">

					<h4>What you will find</h4>

					<h4><i>on this page</i></h4>

				</div>

				<?php if( get_field( 'jump_to_nav' ) ) : ?>

					<nav class="jump-to-nav">

						<ul>

							<?php if( have_rows( 'jump_to_nav' ) ) : ?>

								<?php while( have_rows( 'jump_to_nav' ) ) : the_row() ?>

									<?php
										$nav_item = get_sub_field( 'nav_title' );
										$nav_link = get_sub_field( 'nav_link' );
									?>

									<li><a href="<?php echo get_page_link( $post->ID ) ?>#<?php echo esc_attr( $nav_link ) ?>"><?php echo esc_html( $nav_item ) ?></a></li>

								<?php endwhile ?>

							<?php endif ?>

						</ul>

					</nav>

				<?php endif ?>

			</div><!--.jump-to-nav-->

		</div><!--.jump-to-nav-wrap-->

		<?php get_template_part( 'partials/video-two' ) ?>

		<?php get_template_part( 'partials/video' ) ?>

		<div class="about-faqs-wrap col-md-4">

			<div class="about-faqs">

				<div class="box-title">

					<h4>You have Questions.</h4>

					<h4><i>We have Answers.</i></h4>

				</div>

				<div class="box-faqs">

					<?php

					$pages = array(
						'car-accident-lawyer'      => 'auto-accidents',
						'accident-injury-attorney' => 'personal-injury-law',
						'personal-injury-lawyers'  => 'personal-injury',
					);

					foreach ( $pages as $page => $term ) {

						if( is_page( $page ) ) {

							$args = array(
								'post_type' => 'qa_faqs',
								'tax_query' => array(
									array(
										'taxonomy' => 'faq_category',
										'field'    => 'slug',
										'terms'    => $term,
									),
								),
							);

						}

					}

					$query = new WP_Query( $args );

					if( $query->have_posts() ) : ?>

						<ul>

							<?php while( $query->have_posts() ) : $query->the_post() ?>

								<li><a href="<?php the_permalink() ?>"><?php the_title() ?></a></li>

							<?php endwhile ?>

						</ul>

					<?php endif; wp_reset_postdata() ?>

				</div>

			</div><!--.about-faqs-->

		</div><!--.about-faqs-wrap-->

		<div class="about-video-wrap col-md-4">

			<div class="about-video">

				<div class="box-title">

					<?php 

					global $post;

					$title = $post->post_title;

					if( is_page( 'personal-injury-law-firm' ) ) : ?>

						<h4>Who We Are</h4>

						<h4><i>Watch Our Video</i></h4>

					<?php else : ?>

						<h4>Video Resource</h4>

						<h4><i>on <?php echo esc_html( $title ) ?></i></h4>

					<?php endif ?>

				</div>

				<div class="box-video">

					<a class="video-trigger" href="#"><?php CWS_Theme::cws_image( 'video-banner-image.png' ) ?></a>

				</div>

			</div><!--.about-video-->

		</div><!--.about-video-wrap-->

	</div><!--.row-->

</section><!--#about-boxes-->

<section class="container">

	<div class="inner-wrapper row">

		<div class="content single-pract-content col-md-8 clearfix">

			<div class="<?php echo ( get_field( 'jump_to_nav' ) ) ? 'jump-content' : '' ?>">

				<?php if ( have_posts() ) : ?> 

					<?php while ( have_posts() ) : the_post() ?>

						<?php if( ! empty( $post->post_content ) ) : ?>

							<?php if( has_post_thumbnail() ) : ?>

								<div class="featured-image col-sm-4">

									<?php the_post_thumbnail() ?>

								</div>

							<?php endif ?>

						<?php endif ?>

						<p><?php the_content() ?></p>

					<?php endwhile ?>

				<?php endif ?>

			</div>

			<article id="<?php the_sub_field( 'section_slug' ) ?>" class="col-xs-12">

				<h2><?php the_sub_field( 'block_title' ) ?></h2>

				<?php if( have_rows( 'slide' ) ) : ?>

					<div class="content-slider">

						<?php while( have_rows( 'slide' ) ) : the_row(); $i++; ?>

							<div class="content-slide-item">

								<div class="slide-title-wrap">

									<h3 class="slide-title"><span><?php echo $i ?></span><?php the_sub_field( 'slide_title' ) ?></h3>

								</div>

								<div class="slide-content-wrap">

									<div class="slide-image pull-left">

										<img src="<?php the_sub_field( 'slide_image' ) ?>" alt="<?php the_sub_field( 'slide_title' ) ?>">

									</div>

									<div class="slide-content">

										<?php the_sub_field( 'slide_text' ) ?>

									</div>

								</div><!--.slide-content-wrap-->

							</div><!--.content-slide-item-->

						<?php endwhile ?>

					</div>

					<div class="text-center">

						<div class="custom-navigation">

								<div class="custom-arrows"></div>

								<div class="custom-dots"></div>

						</div> 

					</div>

				<?php endif ?>

				<?php get_template_part( 'partials/call-to-action' ) ?>

			</article>

		</div><!--.single-pract-content-->

		<div id="sidebar" class="col-md-4">

			<?php get_template_part( 'sidebars/pa-landing-page-sidebar' ) ?>

		</div><!--#sidebar-->

	</div><!--.row-->

</section><!--.container-->
