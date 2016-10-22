<?php
/**
 * Template name: Single Legal Service
 */
get_header() ?>

	<section id="legal-service-section-one" class="container">

		<div class="inner-wrapper row">

			<div class="content col-md-8">

				<?php if ( have_posts() ) : ?> 

					<?php while ( have_posts() ) : the_post() ?>

						<?php if ( has_post_thumbnail() ) : ?>

							<div class="col-sm-5 featured-image no-pad-left">

								<?php the_post_thumbnail() ?>

							</div>

						<?php endif ?>

						<?php the_content() ?>

					<?php endwhile ?>

				<?php endif ?>

			</div><!--.content-->

			<aside id="sidebar" class="col-md-4">

				<?php get_template_part( 'sidebars/pa-landing-page-sidebar' ) ?>

			</aside><!--#sidebar-->

		</div><!--.row-->

	</section><!--.container-->

	<section id="legal-service-section-two" class="grey-background container-fluid">

		<div class="container">

			<div class="row">

				<div class="lss2-title">

					<h2>We want to help you through your case</h2>

				</div><!--.lss2-title-->

				<div class="lss2-content-left col-md-6">

					<?php the_field( 'content_left' ) ?>

				</div><!--.lss2-content-left-->

				<div class="lss2-content-right col-md-6">

					<?php the_field( 'content_right' ) ?>

				</div><!--.lss2-content-right-->

			</div><!--.row-->

		</div><!--.container-->

	</section><!--.container-fluid-->

	<section id="legal-service-section-three" class="container">

		<div class="row">

			<div class="lss3-content col-md-12">

				<p>If you are under investigation for a crime or have had charges filed against you, you are facing a legal battle that could forever change the course of your life. Contact us immediately by <a href="tel:5124764873">calling (512) 476-4873</a>, emailing <a href="mailto:pminton@mbfc.com">pminton@mbfc.com</a>, or <a href="<?php echo esc_url( home_url() ) ?>/contact-us/">filling out this form</a>. Protect your rights by letting our experience and expertise work for you.</p>

			</div>

			<div class="clearfix"></div>

			<div class="tell-us-button">

				<a class="tell-us-btn" href="<?php echo esc_url( home_url() ) ?>/contact-us/">Tell Us About Your Case Now</a>

			</div><!--.tell-us-button-->

		</div><!--.row-->

	</section><!--.container-->

<?php get_footer() ?>