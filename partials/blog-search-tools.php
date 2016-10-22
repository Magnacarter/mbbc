<?php
/**
 * Blog search tools
 */
?>

<div class="search-blog-wrap">

	<div class="blog-search-bar col-md-10 no-pad-left">

		<form method="get" id="searchform" action="<?php bloginfo('url') ?>">

			<div>

				<input class="search-input" type="text" value="<?php the_search_query() ?>" name="s" id="s" placeholder="Search the blog">

				<input class="search-button" type="submit" id="searchsubmit" value="">

			</div>

		</form>

	</div><!--.blog-search-bar-->

	<div class="blog-pagination col-md-2">

		<?php do_action( 'cws_pagination' ) ?>

	</div><!--.blog-pagination-->

</div><!--.search-blog-wrap-->

<div class="clearfix"></div>