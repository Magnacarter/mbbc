<?php
/**
 * Front-page
 *
 * Front page action hooks in inc/front-page-hooks.php
 */
get_header() ?>

	<section id="content-one">

		<?php do_action( 'section_one' ) ?>

	</section>

	<section id="content-two">

		<?php do_action( 'section_two' ) ?>

	</section>

	<section id="content-three">

		<?php do_action( 'section_three' ) ?>

	</section>

	<section id="content-four">

		<?php do_action( 'section_four' ) ?>

	</section>

<?php get_footer() ?>