<?php
/**
 * The partial for displaying 404 pages (Not Found)
 */
get_header() ?>

	<section id="four-o-four" class="container">

		<div class="inner-wrapper row">

			<div class="content col-md-8">

				<div class="inner-content">

					<p>The page you were looking for appears to have been moved, deleted or does not exist. You could go back to where you were or head straight to our <a href="<?php echo esc_attr( home_url() ) ?>">home page</a>.</p>

				</div><!--.inner-content-->

			</div><!--.content-->

			<aside class="cta col-md-4">

				<h3>Have Questions?</h3>

				<p><?php bloginfo( 'title' ) ?></p>

				<h2></h2>

			</aside><!--.cta-->

		</div><!--.row-->

	</section><!--.container-->

	<section id="box-404" class="container">

		<div class="inner-wrapper row">

			<div class="box-1-wrap col-md-4">

				<div class="box-1">

					<div class="box-title">

						<h4>Here are some helpful links</h4>

					</div>

					<?php

						$post_type = 'page';
						$query_args = array(
							'post__in' => array(
								158,
								175,
								185,
								193,
								399,
								358,
								290,
								366,
								300,
								375,
								349,
								383,
								168,
								392
							),
						); 

						CWS_Theme::cws_list_titles( $post_type, $query_args, 5 ); 

					?>

				</div>

			</div>

			<div class="box-2-wrap col-md-4">

				<?php do_action( 'cws_meet_jim' ) ?>

			</div>

			<div class="box-3-wrap col-md-4">

				<?php do_action( 'cws_form_sidebar' ) ?>

			</div>

		</div><!--.row-->

	</section><!--.container-->

<?php get_footer() ?>