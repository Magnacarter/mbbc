<?php
/**
 * Single blog template
 */
get_header() ?>

<?php $home = esc_attr( home_url() ) ?>

	<section id="blog" class="container" itemscope itemtype="https://schema.org/BlogPosting">

		<div class="inner-wrapper row">

			<div class="content col-md-8" itemprop="mainEntityOfPage">

				<div class="post-meta row">

					<div class="author-cat col-sm-12">

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

							$auth_cat      = sprintf( 
								'<h5><time datetime="%s" itemprop="datePublished">%1$s</time> by <span itemprop="author" itemscope="" itemtype="http://schema.org/Person"><span itemprop="name"><a href="%s" itemprop="url">%s</a></span> - in <a href="%s"> %s</a></span></h5>', 
								$time, $author, $author_name, $link, $category
							);

							echo $auth_cat;

						?>

					</div>

				</div>

				<?php get_template_part( 'partials/excerpt-loop' ) ?>

				<div class="about-author" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">

					<div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">

						<meta itemprop="url" content="<?php echo esc_url( home_url() ) ?>/images/logo-red.png">

						<meta itemprop="width" content="120">

						<meta itemprop="height" content="120">

					</div>

					<h3>About <span itemprop="name"><?php the_author() ?></span></h3>

					<p><?php the_author_meta( 'description' ) ?></p>

				</div><!--.about-author-->

			</div>

			<aside id="sidebar" class="col-md-4">

				<?php get_template_part( 'sidebars/blog-sidebar' ) ?>

			</aside><!--#sidebar-->

		</div><!--.row-->

	</section><!--.container-->

</div><!--.schema-wrap-->

<?php get_footer() ?>