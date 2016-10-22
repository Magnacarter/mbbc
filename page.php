<?php
/**
 * Page Template
 *
 * Page action methods found in inc/set-vars-hooks.php
 */
get_header() ?>

	<?php if( is_page( 'site-map' ) ) : ?>

		<?php get_template_part( 'partials/sitemap' ) ?>

	<?php elseif( is_page( 'personal-injury-law-firm' ) ) : ?>

		<?php get_template_part( 'partials/about' ) ?>

	<?php elseif( is_page( 'legal-services' ) ) : ?>

		<?php get_template_part( 'partials/legal-services' ) ?>

	<?php else : ?>

		<?php get_template_part( 'partials/standard-page' ) ?>

	<?php endif ?>

<?php get_footer() ?>