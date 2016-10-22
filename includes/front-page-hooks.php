<?php
/**
 * Front page hooks
 */

/**
 * Frontpage section one
 *
 * @add_action section_one
 *
 * @return void
 */
function cws_frontpage_section_one() {

	$i = 0;

	?>

	<div class="c1-content-wrapper skew">

		<div class="c1-content container unskew">

			<div class="row">

				<?php if( have_rows('front_page_call_to_action') ) : ?>

					<ul>

						<?php while( have_rows( 'front_page_call_to_action' ) ) : the_row(); $i++;

							$title       = get_sub_field( 'title' );
							$icon        = get_sub_field( 'cta_icon' );
							$image       = get_sub_field( 'cta_image' );
							$description = get_sub_field( 'cta_description' );
							$button      = get_sub_field( 'button_text' );
							$link        = get_sub_field( 'button_link' );

						?>

							<li class="c1-call-to-action<?php echo '-' . $i ?> col-md-4">

								<div class="cta-icon col-md-3 col-md-push-9">

									<img src="<?php echo esc_url( $icon ) ?>"/>

								</div>

								<div class="cta-title col-md-9 col-md-pull-3 no-pad-left">

									<h2><?php echo esc_html( $title ) ?></h2>

								</div>

								<div class="cta-image">

									<img src="<?php echo esc_url( $image ) ?>"

								</div>

								<div class="cta-description">

									<p><?php echo esc_html( $description ) ?></p>

								</div>

								<div class="cta-button">

									<a class="cta-btn-<?php echo $i ?>" href="<?php echo esc_url( $link ) ?>"><?php echo esc_html( $button ) ?></a>

								</div>

							</li>

						<?php endwhile ?>

					</ul>

				<?php endif ?>

			</div><!--.row-->

		</div><!--.container-->

	</div><!--.c1-content-wrapper-->

	<?php

}
add_action( 'section_one', 'cws_frontpage_section_one' );

/**
 * Frontpage section two
 *
 * @add_action section_two
 *
 * @return void
 */
function cws_frontpage_section_two() {

	?>

		<div class="c2-content-wrap container">

			<div class="row">

				<div class="c2-headline">

					<h2>Austin Litigation Specialists</h2>

					<ul>

						<li>Criminal Defense</li>

						<li>Family Law</li>

						<li>Personal Injury</li>

						<li>Civil Litigation</li>

					</ul>

				</div><!--.c2-headline-->

				<div class="c2-content-left col-md-6">

					<?php if( have_posts() ) : ?>

						<?php while( have_posts() ) : the_post() ?>

							<?php the_content() ?>

						<?php endwhile ?>

					<?php endif ?>

				</div><!--.c2-content-left-->

				<div class="c2-content-right col-md-6">

					<div class="c2-content-headline-wrap">

						<div class="c2-content-headline">

							<h5>Over the years, our law firm has greatly expanded</h5>

							<h5>the services we provide to clients. Today, our</h5>

							<h5>practice areas go well beyond criminal defense</h5>

						</div><!--.c2-content-headline-->

					</div><!--.c2-content-headline-wrap-->

					<?php the_field( 'c2_content_right' ) ?>

				</div><!--.c2-content-right-->

				<div class="meet-team-button col-sm-12">

					<a class="meet-team-btn" href="./our-attorneys/">Read More &amp; Meet The Team</a>

				</div><!--.meet-team-button-->

			</div><!--.row-->

		</div><!--.container-->

	<?php

}
add_action( 'section_two', 'cws_frontpage_section_two' );

/**
 * Frontpage section three
 *
 * @add_action section_three
 *
 * @return void
 */
function cws_frontpage_section_three() {

	$args = array(
		'post_type'      => 'attorney',
		'posts_per_page' => 30,
	);

	$attorney = new WP_Query( $args );

	?>

	<div class="grey-background container-fluid">

		<div class="custom-arrows"></div>

		<div class="arrow-down"></div>

		<div class="c3-content-wrap container">

			<div class="row">

				<div class="team-slider-title" style="<?php echo( is_front_page() ) ? "visibility: hidden" : " " ?>">

					<?php if( is_singular( 'attorney' ) ) : ?>

						<h3>Meet Our Other Team Members</h3>

					<?php else : ?>

						<h3>Meet Our Trusted Team</h3>

					<?php endif ?>

				</div>

				<div class="team-slider">

					<?php if( $attorney->have_posts() ) : ?>

						<?php while( $attorney->have_posts() ) : $attorney->the_post() ?>

							<div class="attorney-slide">

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

	<?php

}
add_action( 'section_three', 'cws_frontpage_section_three' );

/**
 * Frontpage section four
 *
 * @add_action section_four
 *
 * @return void
 */
function cws_frontpage_section_four() {

	?>

		<div class="c4-content-wrap container">

			<div class="row">

				<div class="c4-content-headline">

					<h2>Our Areas of Practice</h2>

					<p>From local businesses in need of legal advice to individual clients struggling with family law issues, personal injury claims or criminal matters we've represented thousands of clients.</p>

				</div><!--.c4-content-headline-->

				<div class="pa-1 col-md-4">

					<div id="pa-1-active" class="cws-active">

						<div class="pa-icon">

							<a class="active-trigger" href="#"><?php CWS_Theme::cws_image( 'criminaldefense-active.png', 'Criminal Defense Icon' ) ?></a>

						</div><!--.pa-icon-->

						<div class="pa-title">

							<a class="active-trigger" href="#"><h2>Criminal Defense</h2></a>

						</div><!--.pa-title-->

						<div class="down-arrow">

							<?php CWS_Theme::cws_image( 'down-arrow.png', "Arrow" ) ?>

						</div><!--.down-arrow-->

					</div>

					<div id="pa-1-inactive" class="cws-inactive">

						<div class="pa-icon">

							<a class="active-trigger hidden-sm hidden-xs" href="#"><?php CWS_Theme::cws_image( 'criminaldefense-inactive.png', 'Criminal Defense Icon' ) ?></a>

							<a class="active-href hidden-lg hidden-md visable-sm" href="<?php echo esc_url( home_url() ) ?>/criminal-defense-lawyer/"><?php CWS_Theme::cws_image( 'criminaldefense-inactive.png', 'Criminal Defense Icon' ) ?></a>

						</div><!--.pa-icon-->

						<div class="pa-title">

							<a class="active-trigger hidden-sm hidden-xs" href="#"><h2>Criminal Defense</h2></a>

							<a class="active-href hidden-lg hidden-md visable-sm" href="<?php echo esc_url( home_url() ) ?>/criminal-defense-lawyer/"><h2>Criminal Defense</h2></a>

						</div><!--.pa-title-->

					</div>

				</div>

				<div class="pa-2 col-md-4">

					<div id="pa-2-active" class="cws-active">

						<div class="pa-icon">

							<a class="active-trigger" href="#"><?php CWS_Theme::cws_image( 'familylaw-active.png', 'Family Law Icon' ) ?></a>

						</div><!--.pa-icon-->

						<div class="pa-title">

							<a class="active-trigger" href="#"><h2>Family Law</h2></a>

						</div><!--.pa-title-->

						<div class="down-arrow">

							<?php CWS_Theme::cws_image( 'down-arrow.png', "Arrow" ) ?>

						</div><!--.down-arrow-->

					</div>

					<div id="pa-2-inactive" class="cws-inactive">

						<div class="pa-icon">

							<a class="active-trigger hidden-sm hidden-xs" href="#"><?php CWS_Theme::cws_image( 'familylaw-inactive.png', 'Family Law Icon' ) ?></a>

							<a class="active-href hidden-lg hidden-md visable-sm" href="<?php echo esc_url( home_url() ) ?>/family-lawyer/"><?php CWS_Theme::cws_image( 'familylaw-inactive.png', 'Family Law Icon' ) ?></a>

						</div><!--.pa-icon-->

						<div class="pa-title">

							<a class="active-trigger hidden-sm hidden-xs" href="#"><h2>Family Law</h2></a>

							<a class="active-href hidden-lg hidden-md visable-sm" href="<?php echo esc_url( home_url() ) ?>/family-lawyer/"><h2>Family Law</h2></a>

						</div><!--.pa-title-->

					</div>

				</div>

				<div class="pa-3 col-md-4">

					<div id="pa-3-active" class="cws-active">

						<div class="pa-icon">

							<a class="active-trigger" href="#"><?php CWS_Theme::cws_image( 'pi-active.png', 'Personal Injury Icon' ) ?></a>

						</div><!--.pa-icon-->

						<div class="pa-title">

							<a class="active-trigger" href="#"><h2>Personal Injury &amp; Civil Litigation</h2></a>

						</div><!--.pa-title-->

						<div class="down-arrow">

							<?php CWS_Theme::cws_image( 'down-arrow.png', "Arrow" ) ?>

						</div><!--.down-arrow-->

					</div>

					<div id="pa-3-inactive" class="cws-inactive">

						<div class="pa-icon">

							<a class="active-trigger hidden-sm hidden-xs" href="#"><?php CWS_Theme::cws_image( 'pi-inactive.png', 'Personal Injury Icon' ) ?></a>

							<a class="active-href hidden-lg hidden-md visable-sm" href="<?php echo esc_url( home_url() ) ?>/civil-litigation-lawyer/"><?php CWS_Theme::cws_image( 'pi-inactive.png', 'Personal Injury Icon' ) ?></a>

						</div><!--.pa-icon-->

						<div class="pa-title">

							<a class="active-trigger hidden-sm hidden-xs" href="#"><h2>Personal Injury &amp; Civil Litigation</h2></a>

							<a class="active-href hidden-lg hidden-md visable-sm" href="<?php echo esc_url( home_url() ) ?>/civil-litigation-lawyer/"><h2>Personal Injury &amp; Civil Litigation</h2></a>

						</div><!--.pa-title-->

					</div>

				</div>

				<div id="pa-1-active" class="pa-1-active-description col-sm-12 hidden-sm">

					<div class="active-inner-wrap">

						<div class="active-inner">

							<div class="col-sm-3">

								<h2>Criminal Defense</h2>

							</div>

							<div class="col-sm-9">

								<p>We provide skilled, passionate representation of clients who have been charged with the most serious crimes, including DWI, drug offenses, sexual offenses, computer crimes and white-collar crimes.</p>

								<div class="learn-more-link">

									<a href="./criminal-defense-lawyer/">Learn More</a>

								</div><!--.learn-more-link-->

							</div>

						</div><!--.active-inner-->

					</div><!--.active-inner-wrap-->

				</div>

				<div id="pa-2-active" class="pa-2-active-description col-sm-12 hidden-sm">

					<div class="active-inner-wrap">

						<div class="active-inner">

							<div class="col-sm-3">

								<h2>Family Law</h2>

							</div>

							<div class="col-sm-9">

								<p>We provide skilled, passionate representation of clients who have been charged with the most serious crimes, including DWI, drug offenses, sexual offenses, computer crimes and white-collar crimes.</p>

								<div class="learn-more-link">

									<a href="./family-lawyer/">Learn More</a>

								</div><!--.learn-more-link-->

							</div>

						</div><!--.active-inner-->

					</div><!--.active-inner-wrap-->

				</div>

				<div id="pa-3-active" class="pa-3-active-description col-sm-12 hidden-sm">

					<div class="active-inner-wrap">

						<div class="active-inner">

							<div class="col-sm-3">

								<h2>Personal Injury &amp; Civil Litigation</h2>

							</div>

							<div class="col-sm-9">

								<p>We provide skilled, passionate representation of clients who have been charged with the most serious crimes, including DWI, drug offenses, sexual offenses, computer crimes and white-collar crimes.</p>

								<div class="learn-more-link">

									<a href="./civil-litigation-lawyer/">Learn More</a>

								</div><!--.learn-more-link-->

							</div>

						</div><!--.active-inner-->

					</div><!--.active-inner-wrap-->

				</div>

				<div class="clearfix"></div>

				<?php get_template_part( 'partials/big-quote' ) ?>

			</div><!--.row-->

		</div><!--.container-->

	<?php

}
add_action( 'section_four', 'cws_frontpage_section_four' );