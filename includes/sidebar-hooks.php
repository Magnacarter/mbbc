<?php
/**
 * Sidebar hooks
 */

/**
 * Attorney portrait
 *
 * @add_action cws_attorney_portrait
 *
 * @return void
 */
function cws_attorney_portrait_output() {
global $post;
?>

	<div class="attorney-portrait">

		<?php

			if( has_post_thumbnail( $post->ID ) ) : 

				the_post_thumbnail();

			endif;

		?>

	</div>

<?php
}
add_action( 'cws_attorney_portrait', 'cws_attorney_portrait_output' );

/**
 * Telephone number
 *
 * @add_action cws_telephone
 *
 * @return void
 */
function cws_telephone_output() {
	?>

		<div class="phone-number-wrap">

			<h4>Need help? Call us today</h4>

			<a class="phone-number" href="tel:5124764873">(512) 476-4873</a>

		</div>

	<?php
}
add_action( 'cws_telephone', 'cws_telephone_output' );

/**
 * Professional associations
 *
 * @add_action cws_professional
 *
 * @return void
 */
function cws_professional_output() {
	?>

	<section class="professional-holder">

		<div class="sidebar-title">

			<h3>Professional Associations</h3>

		</div>

		<div class="sidebar-list">

			<?php CWS_Theme::cws_image( 'national-trial-lawyers.png' ) ?>

			<div class="border-bottom"></div>

			<div class="double-badge">

				<ul>

					<li><?php CWS_Theme::cws_image( 'multimillion-red.png' ) ?></li>

					<li><?php CWS_Theme::cws_image( 'multimillion-blue.png' ) ?></li>

				</ul>

			</div>

		</div>

	</section>

	<?php
}
add_action( 'cws_professional', 'cws_professional_output' );

/**
 * Locations we serve
 *
 * @add_action cws_locations_served
 *
 * @return void
 */
function cws_locations_served_sidebar() {
?>

	<section class="locations-served-holder">

		<div class="sidebar-title">

			<h2>Communities We Serve</h2>

		</div>

		<div class="sidebar-list">

			<?php

				$ls = new CWS_Practice_Area( 'wpseo_locations' );

				$ls->cws_list_titles();

			?>

		</div>

	</section>

<?php
}
add_action( 'cws_locations_served', 'cws_locations_served_sidebar' );

/**
 * Categories sidebar
 *
 * @add_action cws_category_sidebar
 *
 * @return void
 */
function cws_category_sidebar_output() {
?>

<section class="sb-wrap">

	<div class="sb-header">

		<h3>Categories</h3>

	</div>

	<div class="sb-list">

		<?php
			$args = array(
				'show_option_all'    => '',
				'orderby'            => 'name',
				'order'              => 'ASC',
				'style'              => 'list',
				'show_count'         => 0,
				'hide_empty'         => 1,
				'use_desc_for_title' => 1,
				'child_of'           => 0,
				'feed'               => '',
				'feed_type'          => '',
				'feed_image'         => '',
				'exclude'            => '',
				'exclude_tree'       => '',
				'include'            => '',
				'hierarchical'       => 1,
				'title_li'           => __( '' ),
				'show_option_none'   => __( '' ),
				'number'             => 25,
				'echo'               => 1,
				'depth'              => 0,
				'current_category'   => 0,
				'pad_counts'         => 0,
				'taxonomy'           => 'category',
				'walker'             => null
			);
			wp_list_categories( $args );
		?>

	</div>

</section>

<?php
}
add_action( 'cws_category_sidebar', 'cws_category_sidebar_output' );

/**
 * Archives sidebar
 *
 * @add_action cws_archive_sidebar
 *
 * @return void
 */
function cws_archive_sidebar_output() {
?>

<section class="sb-wrap">

	<div class="sb-header">

		<h3>Archives</h3>

	</div>

	<div class="sb-list archive-list">

		<?php
			$args = array(
				'type'            => 'monthly',
				'limit'           => 5,
				'format'          => 'html', 
				'before'          => '',
				'after'           => '',
				'show_post_count' => false,
				'echo'            => 1,
				'order'           => 'DESC',
				'post_type'       => 'post'
			);
			wp_get_archives( $args );
		?>

	</div>

</section>

<?php
}
add_action( 'cws_archive_sidebar', 'cws_archive_sidebar_output' );

/**
 * Meet Team sidebar
 *
 * @add_action cws_team_sidebar
 *
 * @return void
 */
function cws_team_sidebar_output() {
global $post;

$args = array(
	'post_type'      => 'attorney',
	'post__not_in'   => array( $post->ID ),
	'posts_per_page' => 20
);

$team = new WP_Query( $args );
?>

<?php if( $team->have_posts() ) : ?>
 
<div class="sb-wrap col-sm-12">

	<div class="sb-header">

		<h3>Meet Our Attorneys</h3>

	</div>

	<div class="custom-arrows"></div>

	<div class="sidebar-team">

		<?php while( $team->have_posts() ) : $team->the_post() ?>

			<div class="sidebar-attorney text-center">

				<div class="sba-image">

					<?php if( has_post_thumbnail() ) : the_post_thumbnail(); endif ?>

				</div>

				<div class="sba-attorney-title">

					<h5><?php the_title() ?></h5>

				</div>

				<a href="<?php the_permalink() ?>">See Full Bio</a>

			</div>

		<?php endwhile ?>

	</div>

</div>

<?php endif; wp_reset_postdata();
}
add_action( 'cws_team_sidebar', 'cws_team_sidebar_output' );

/**
 * Form Sidebar 
 *
 * @add_action cws_form_sidebar
 *
 * @return void
 */
function cws_form_sidebar_output() {
?>

<div class="form-block">

	<?php get_template_part( 'partials/form' ) ?>

</div>

<?php
}
add_action( 'cws_form_sidebar', 'cws_form_sidebar_output' );

/**
 * Practice Areas list
 *
 * @add_action cws_practice_areas
 *
 * @return void
 */
function cws_practice_areas_output() {
?>

	<div class="sb-wrap">

		<div class="sb-header">

			<h3>Our Practice Areas</h3>

		</div>

		<div class="sb-content">

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
					'order' => 'ASC',
				); 

				CWS_Theme::cws_list_titles( $post_type, $query_args, 14 ); 

			?>

		</div>

		<div class="learn-more-button text-center">

			<a class="learn-more-btn" href="<?php echo esc_url( home_url() ) ?>/legal-services/">Learn More</a>

		</div>

	</div>


<?php
}
add_action( 'cws_practice_areas', 'cws_practice_areas_output' );

/**
 * Testimonial sidebar
 *
 * @add_action cws_testimonial
 *
 * @void
 */
function cws_testimonial_sidebar_output() {
?>
	<div class="testimonial-holder">

		<h2>Testimonials</h2>

		<?php

			$args = array(
				'post_type'      => 'testimonial',
				'posts_per_page' => 1
				);

			$testimony = new WP_Query( $args );

		?>

		<?php if( $testimony->have_posts() ) : ?>

			<?php while( $testimony->have_posts() ) : $testimony->the_post() ?>

				<blockquote>

					<?php the_content() ?>

					<footer><cite title="Source Title">– <?php the_title() ?></cite></footer>

				</blockquote>

			<?php endwhile ?>

		<?php endif; wp_reset_postdata() ?>

	</div>

<?php
}
add_action( 'cws_testimonial_sidebar', 'cws_testimonial_sidebar_output' );

/**
 * Feature blog output
 *
 * @add_action featured_post
 *
 * @return void
 */
function cws_featured_post_output() {

$args = array(
	'category_name'  => 'featured',
	'posts_per_page' => 1
	);

$feature = new WP_Query( $args );

?>

	<div class="feature-blog">

		<div class="sidebar-title">

			<h2>From the Blog</h2>

		</div>

		<?php if( $feature->have_posts() ) : ?>

			<?php while( $feature->have_posts() ) : $feature->the_post() ?>

				<?php if( has_post_thumbnail() ) : ?>

					<div class="image-holder col-sm-12">

						<?php the_post_thumbnail() ?>

					</div>

				<?php endif ?>

				<div class="feature-wrap blog-post">

					<div class="excerpt-title col-sm-12 no-pad-left">

						<div class="col-sm-12 blog-headline">

							<h2 itemprop="headline"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>

						</div>

						<div class="post-time col-sm-12">

							<div class="post-time-1"><time datetime="<?php the_time('F j Y')?>"><?php the_time('F j, Y')?></time></div>

						</div>

					</div>

					<div class="clearfix"></div>

					<div class="post-wrap">

						<div class="description-holder">

							<?php the_excerpt() ?>

							<div class="read-more-button">

								<a class="read-more-btn" href="<?php the_permalink() ?>" class="click-continue">Continue Reading</a>

							</div>

						</div>

					</div>

				</div>

			<?php endwhile ?>

		<?php endif; wp_reset_postdata() ?>

	</div>

<?php
}
add_action( 'cws_featured_post', 'cws_featured_post_output' );

/**
 * Results sidebar
 *
 * @add_action cws_results
 *
 * @return void
 */
function cws_results_sidebar() {

global $cws_img_path;

$i = 0;

if( is_page( 'our-firm' ) ) {

	$ppp    = 3;
	$string = 'Our record includes helping families and individuals obtain the following settlements:';
	$title  = sprintf( '<h4>%s</h4>', esc_html( $string ) );

} elseif( is_page( 'car-accident' ) ) {

	$ppp    = 2;
	$string = 'Car Accident Results';
	$title  = sprintf( '<h2>%s</h2>', esc_html( $string ) );

} else {

	$ppp    = 2;
	$string = 'Our Results';
	$title  = sprintf( '<h2>%s</h2>', esc_html( $string ) );

}

$args = array(
	'post_type'      => 'result',
	'posts_per_page' => $ppp,
	'order'          => 'DESC'
	);

$result   = new WP_Query( $args );

?>

	<div class="results">

		<?php echo $title ?>

		<?php if( $result->have_posts() ) : while( $result->have_posts() ) : $result->the_post() ?>

			<?php global $post ?>

			<?php $i++ ?>

			<div class="border-top"></div>

			<div class="results-content <?php echo esc_attr( 'result-' . $i ) ?>">

				<h5><?php the_title() ?></h5>

				<?php $category = get_the_category() ?>

				<h6><?php the_field( 'results_sidebar_content' ) ?></h6>

			</div>

		<?php endwhile; endif; wp_reset_postdata() ?>


		<div class="results-button">

			<a href="<?php echo home_url() ?>/case-results/" class="results-btn">See More Results</a>

		</div>

	</div>

<?php 
}
add_action( 'cws_results', 'cws_results_sidebar' );

/**
 * Related info in sidebar
 *
 * @add_action related_info
 *
 * @return void
 */
function cws_related_info_output() {

	if ( CWS_Theme::cws_has_children() === false ) {

		return;

	} else {

		global $post;

		$args = array(
			'post_type'      => 'page',
			'post_parent'    => $post->ID,
			'order'          => 'ASC',
		);

		$query = new WP_Query( $args );

		if( $query->have_posts() ) : ?>

			<div class="sb-wrap">

				<div class="sb-header">

					<h3>Related Information</h3>

				</div>

				<div class="sb-content">

					<ul class="related-info-list">

					<?php while( $query->have_posts() ) : $query->the_post() ?>

						<li><a href="<?php the_permalink() ?>"><?php the_title() ?></a></li>

					<?php endwhile ?>

					</ul>

				</div>

			</div>

		<?php endif;

	}

}
add_action( 'cws_related_info', 'cws_related_info_output' );

/**
 * Attorney Credential sidebar
 *
 * @add_action cws_credential_sidebar
 *
 * @return void
 */
function cws_credential_sidebar_output() {
global $post;
$title_raw   = get_the_title( $post->ID );
$title_array = explode( ' ', $title_raw );
$i           = 0;
$title       = $title_array[0] . "'s Credentials";

?>
	<section class="credential-holder">

		<div class="sb-title">

			<h2><?php echo esc_html( $title ) ?></h2>

		</div>

		<?php if( have_rows( 'attorney_credentials' ) ) : ?>

			<ul class="credential-list">

				<li class="credential-title-wrapper">

					<a class="year-joined">Year Joined Organization: <span><?php the_field( 'year_joined' ) ?></span></a>

				</li>

				<?php while( have_rows( 'attorney_credentials' ) ) : the_row() ?>

					<?php $i++ ?>

					<?php $cred_title = get_sub_field( 'credential_title' ) ?>

					<li class="credential-title-wrapper">

						<a id="cred-<?php echo esc_attr( $i ) ?>" class="collapsed" data-toggle="collapse" data-target="#cred-list-<?php echo esc_attr( $i ) ?>" aria-expanded="false"><span class="credential-title"><?php echo esc_html( $cred_title ) ?></span></a>

						<ul id="cred-list-<?php echo esc_attr( $i ) ?>" class="credentials collapse">

							<?php if( have_rows( 'credential_list' ) ) : ?>

								<?php while( have_rows( 'credential_list' ) ) : the_row() ?>

									<?php $cred = get_sub_field( 'credential' ) ?>

									<li><?php echo esc_html( $cred ) ?></li>

								<?php endwhile ?>

							<?php endif ?>

						</ul>

					</li>

				<?php endwhile ?>

			</ul>

		<?php endif ?>

	</section>

<?php
}
add_action( 'cws_credential_sidebar', 'cws_credential_sidebar_output' );

/**
 * Display featured video
 *
 * @add_action cws_video
 *
 * @return void
 */
function cws_video_output() {
global $cws_img_path;

	?>

		<div class="video-sidebar">

			<a class="video-trigger" href="#"><img src="<?php echo esc_url( $cws_img_path ) ?>/images/gemma-video-img.jpg" alt="Video wrap image"></a>

		</div>

	<?php
}
add_action( 'cws_video', 'cws_video_output' );

/**
 * Blog Archive sidebar
 *
 * @add_action set_blog_archive_sidebar
 *
 * @return void
 */
function cws_search_blog_output() {

	global $post;

	$author_id = $post->post_author;

	?>

	<div class="search-holder">

		<div class="search-title">

			<h2>Search this Blog</h2>

		</div>

		<div class="search-box">

			<form method="get" id="searchform" action="<?php bloginfo('url') ?>">

				<div>

					<input class="search-input" type="text" value="<?php the_search_query() ?>" name="s" id="s" placeholder="Search the blog">

					<input class="search-button" type="submit" id="searchsubmit" value="Go">

				</div>

			</form>

		</div>

		<!-- loading styles here to load background img with PHP -->
		<style type="text/css">

			.select-post-wrapper {
				margin: 8px auto;
				width: 198px;
				height: 32px;
				overflow: hidden;
				background: url( '<?php echo $down_arrow ?>' ) no-repeat 96% #fff;
				border: 2px solid #ccc;
			}

		</style>

	</div>

<?php

}
add_action( 'cws_search_blog', 'cws_search_blog_output' );






















