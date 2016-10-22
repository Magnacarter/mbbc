<?php
/**
 * Sidebar template containing the primary widget area.
 *
 * Sidebar action methods are found in inc/sidebar-hooks.php
 *
 * @package WordPress
 * @subpackage CWS_Custom_Theme
 * @since CWS Custom Theme 1.0.0
 */
?>
<div id="primary" class="widget-area" role="complementary">

	<ul class="sidebar-widgets">

		<li><?php do_action( 'cws_attorney_portrait' ) ?></li>

		<li><?php do_action( 'cws_credential_sidebar' ) ?></li>

	</ul>

</div>