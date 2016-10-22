<?php
/**
 * Site map partial
 */
?>

<section id="sitemap" class="container">

	<div class="inner-wrapper row">

		<div class="content col-md-8">

			<div class="site-map-content">

				<ul>

				<?php

					// Add pages you'd like to exclude in the exclude here
					wp_list_pages(
						array(
							'exclude' => '',
							'title_li' => '',
						)
					);
				?>

				</ul>

			</div>

		</div><!--.content-->

		<aside id="sidebar" class="col-md-4">

			<?php get_template_part( 'sidebars/generic-sidebar' ) ?>

		</aside><!--#sidebar-->

	</div><!--.row-->

</section><!--.container-->