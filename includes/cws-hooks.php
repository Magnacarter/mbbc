<?php
/**
 * CWS Custom Action Hooks
 */

/**
 * Add pagination to blog archive templates
 *
 * @add_action cws_pagination
 *
 * @return void
 */
function cws_numeric_posts_nav() {
	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="blog-navigation"><ul>';

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		print( posts_nav_link( ' ', '<span>></span>', ' ' ) );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>', $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>…</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>', $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		print( next_posts_link( '<span>></span>' ) );

	echo '</ul></div>';
}
add_action( 'cws_pagination', 'cws_numeric_posts_nav' );

/**
 * Show random testimonies from clients
 *
 * @add_action cws_testimony
 *
 * @return void
 */
function cws_show_testimony() {
global $wpdb;

/* get a random testimonial */
$testimonials = "
	SELECT *
	FROM $wpdb->posts wposts, $wpdb->postmeta metadate, $wpdb->postmeta metatime
	WHERE (wposts.ID = metadate.post_id AND wposts.ID = metatime.post_id)
	AND wposts.post_type = 'testimonial'
	AND wposts.post_status = 'publish'
	ORDER BY RAND() 
	LIMIT 1
";

$testimony = $wpdb->get_results( $testimonials, OBJECT );

?>
	<div class="testimonial-wrapper-content">
		<?php if( $testimony ) :
			global $post;
				 foreach ( $testimony as $post ) :
					setup_postdata( $post ) ?>
					<div class="testimonal-content">
						<blockquote class="testimonial">
							<q><?php the_content() ?></q>
							<footer><i><?php the_title() ?></i></footer>
						</blockquote>
					</div>
			<?php endforeach;
		endif; wp_reset_postdata() ?>
	</div>
<?php
}
add_action( 'cws_testimony', 'cws_show_testimony' );

/**
 * Set Breadcrumbs for a submenu
 *
 * @add_action set_header
 *
 * @return void
 */
function cws_yoast_breadcrumb_menu() {
	if( is_front_page() ) : ?>

		<?php return ?>

	<?php elseif( is_singular( 'attorney' ) ) : ?>

		<?php

		global $post;

		if( is_singular( 'attorney' ) ) {
			$cpt_slug  = "/our-attorneys/";
			$cpt_title = "Our Attorneys";
		}

		?>

		<div class="breadcrumb-bar hidden-sm hidden-xs">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<p id="breadcrumbs">
							<span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
								<span itemprop="title">
									<a href="/">Home</a>
									<span class="bc-divider"></span>
									<a class="cpt-class" href="<?php echo esc_url( $cpt_slug ) ?>" rel="v:url"><?php echo esc_html( $cpt_title ) ?></a>
									<span class="bc-divider"></span>
									<span class="breadcrumb_last"><?php echo esc_html( get_the_title( $post->ID ) ) ?></span>
								</span>
							</span>
						</p>
					</div>
				</div>
			</div>
		</div>

	<?php else : ?>

		<div class="breadcrumb-bar hidden-sm hidden-xs">
			<div class="container">
			<?php 
				if ( function_exists( 'yoast_breadcrumb' ) ) {
					yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
				} 
			?>
			</div>
		</div>

	<?php endif;
}
add_action( 'cws_breadcrumb', 'cws_yoast_breadcrumb_menu' );

/**
 * H1 Title
 *
 * @add_action cws_h1_title
 *
 * @return void
 */
function cws_h1_title_output() {

	global $post;

	if( ! is_front_page() ) : ?>

		<div class="h1-title">

			<div class="container">

				<?php if( is_search() ) : ?>

					<?php $search_term = get_search_query() ?>

					<h1>You Searched For "<?php echo esc_html( $search_term ) ?>"</h1>

				<?php elseif( get_field( 'h1_title' ) ) : ?>

					<h1><?php the_field( 'h1_title' ) ?></h1>

				<?php elseif( is_home() ) : ?>

					<h1>Legal Blog</h1>

				<?php elseif( is_single() ) : ?>

					<div class="schema-wrap" itemscope itemtype="https://schema.org/BlogPosting">

						<h1 itemprop="name headline"><?php the_title() ?></h1>

				<?php elseif( is_category() ) : ?>

					<h1>Categories</h1>

				<?php elseif( is_author() ) : ?>

					<?php $author_name = get_the_author() ?>

					<h1>Posts By <?php echo esc_html( $author_name ) ?></h1>

				<?php elseif( is_archive() ) : ?>

					<h1>Archives</h1>

				<?php elseif( is_404() ) : ?>

					<style>
						.h1-title h2 {
							display: none;
						}
						.h1-title {
							margin-top: 60px;
						}
					</style>

					<h1 style="text-align: center; padding: 0 45px;">Oops! We can’t seem to find the page you’re looking for. <span>(Error code: 404)</span></h1>

				<?php else : ?>

					<h1><?php echo get_the_title( $post->ID ) ?></h1>

				<?php endif ?>

				<?php if ( get_field( 'sub_headline' ) ) : ?>

					<h2><?php the_field( 'sub_headline' ) ?></h2>

				<?php elseif( is_home() ) : ?>

					<h2><?php the_field( 'sub_headline', get_option('page_for_posts') ) ?></h2>

				<?php else : ?>

					<h2>Minton, Burton, Basset &amp; Collins, P.C.</h2>

				<?php endif ?>

				<?php

					$pages = array(
						168,
						158,
						175,
						185,
						193,
						290,
						300,
						349,
						358,
						366,
						375,
						383,
						392,
						399
					);

					foreach ( $pages as $page ) {

						if( is_page( $page ) ) : 

						?>

							<style type="text/css">
								.h1-title h2 {
									display: none;
								}
							</style>

						<?php endif;

					}

				?>

			</div>

		</div>

	<?php endif;

}
add_action( 'cws_h1_title', 'cws_h1_title_output' );
