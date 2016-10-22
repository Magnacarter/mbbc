<?php
/**
 * Template Name: FAQs archive
 */
get_header() ?>

<?php

$i = 0;

$args = array(
	'post_type'      => 'qa_faqs',
	'order'          => 'ASC',
	'posts_per_page' => 30
);

$query = new WP_Query( $args );

?>

	<section id="archive-faqs" class="container">

		<div class="inner-wrapper row">

			<div class="content col-md-8">

				<?php if( $query->have_posts() ) : ?>

					<?php while( $query->have_posts() ) : $query->the_post(); $i++ ?>

						<div class="faq">

							<div class="faq-title">

								<h3><a id="faq-<?php echo esc_attr( $i ) ?>" class="collapsed" data-toggle="collapse" data-target="#faq-content-<?php echo esc_attr( $i ) ?>" aria-expanded="false"><span><?php the_title() ?></span></a></h3>

							</div>

							<div id="faq-content-<?php echo esc_attr( $i ) ?>" class="faq-content collapse">

								<?php the_content() ?>

							</div>

						</div>

					<?php endwhile ?>

				<?php endif; wp_reset_postdata() ?>

			</div><!--.content-->

			<aside id="sidebar" class="col-md-4">

				<?php get_template_part( 'sidebars/generic-sidebar' ) ?>

			</aside><!--#sidebar-->

		</div><!--.inner-wrapper-->

	</section><!--.container-->

<?php get_footer() ?>