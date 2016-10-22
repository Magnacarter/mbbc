<?php
/**
 * Excerpt loop
 */

$i    = 0; 
$home = esc_attr( home_url() );

?>

<?php if ( have_posts() ) : ?> 

	<?php while ( have_posts() ) : the_post(); $i++ ?>

		<article class="<?php echo( is_single() ) ? 'blog-holder' : 'post-excerpt' ?> <?php echo "excerpt-" . $i ?>">

			<div class="blog-post clearfix">

				<?php if( has_post_thumbnail() ) : ?>

					<div class="image-holder featured-image col-sm-5 no-pad">

						<div class="nopadding" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">

							<meta itemprop="url" content="<?php the_post_thumbnail_url() ?>">

							<meta itemprop="width" content="120">

							<meta itemprop="height" content="120">

							<?php the_post_thumbnail() ?>

						</div>

					</div>

				<?php endif ?>

				<?php if( ! is_single() ) : ?>

					<div class="<?php echo ( is_single() ) ? 'blog-title' : 'excerpt-title' ?> <?php echo ( has_post_thumbnail() ) ? 'col-sm-7' : 'col-sm-12' ?> no-pad-left">

						<h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>

						<div class="post-meta">

							<div class="author-cat">

								<?php

									global $post;
									$author_id     = get_the_author_meta( 'ID' );
									$author        = get_author_posts_url( $author_id );
									$author_name   = get_the_author_meta( 'display_name' );
									$category      = get_the_category_list( ', ', $post->ID );
									$category_name = $category[0]->name;
									$category_id   = $category[0]->term_id;
									$link          = get_category_link( $category_id );
									$time          = get_the_time("F j, Y");
									$auth_cat      = sprintf( '<h5><time datetime="%s">%1$s</time> // <a href="%s"> %s</a></h5>', 
														$time, $home, $link, $category
													);

									echo $auth_cat;

								?>

							</div><!--.author-cat-->

						</div><!--.post-meta-->

					</div><!--.blog-title-->

				<?php endif ?>

				<div class="post-wrap">

					<div class="<?php echo ( is_single() ) ? 'blog-content' : 'blog-excerpt' ?>" itemprop="articleBody">

						<?php if( ! is_single() ) : ?>

							<?php the_excerpt() ?>

							<div class="blog-read-more-button">

								<a href="<?php the_permalink() ?>" class="blog-read-more-btn">Read More</a>

							</div>

						<?php else : ?>

							<?php the_content() ?>

						<?php endif ?>

					</div>

				</div>

			</div>

		</article>

	<?php endwhile ?>

<?php endif ?>
