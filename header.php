<!DOCTYPE html>

<html <?php language_attributes() ?>>

	<head>

		<meta charset="<?php echo esc_attr( get_bloginfo( 'charset' ) ) ?>">

		<title><?php wp_title( '-', true, 'right' ); echo esc_html( get_bloginfo( 'name' ) ) ?></title>

		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"/>

		<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ) ?>">

		<link rel="shortcut icon" href="<?php echo esc_url( get_stylesheet_directory_uri() ) ?>/favicon.ico" />

		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

		<link href="#" rel="publisher"/>

		<!--Remove phone number styles-->
		<meta name="format-detection" content="telephone=no">

		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<?php wp_head() ?>

		<?php 
			global $post;
			global $cws_img_path;
			$post_slug = $post->post_name;
			$page_slug = 'page-'.$post_slug;
			$post_id   = 'post-id-'.$post->ID;
			$classes   = array( $page_slug, $post_id );
		?>

	</head>

	<body <?php body_class( $classes ) ?>>

	<div id="wrapper">

		<header id="header">

			<div class="container header-holder visible-xs">

				<div class="row">

					<div class="top-bar clearfix visible-xs"><!--Mobile Nav-->

						<ul>

							<li class="col-xs-6">

								<a href="<?php echo esc_url( home_url() ) ?>/about-us/">About Us</a>

							</li>

							<li class="col-xs-5">

								<a class="light-blue" href="<?php echo esc_url( home_url() ) ?>/contact-us/">Contact</a>

							</li>

							<li class="col-xs-offset-1"></li>

						</ul>

					</div><!--top-bar-->

				</div><!--row-->

			</div><!--header-holder-->

			<nav id="nav">

				<div class="nav-wrap container">

					<div class="navbar col-sm-12">

						<div class="navbar-header">

							<button class="navbar-toggle opener collapsed" data-toggle="collapse" data-target="#navbar" href="#"><span></span></button>

						</div><!--navbar-header-->

						<div class="navbar-collapse collapse" id="navbar">

							<?php wp_nav_menu( array( 
								'container'         => 'div',
								'theme_location'    => 'header-menu',
								'menu_class'        => 'nav navbar-nav',
								'walker'            => new Walker_Nav_Primary()
							) ) ?>

							<div id="arrow"></div>

						</div><!--navbar-collapse-->

						<div class="nav-phone col-sm-2 hidden-sm hidden-xs">

							<h4>(512) 476-4873</h4>

						</div><!--.nav-phone-->

						<div class="consultation-button col-sm-1 hidden-sm hidden-xs">

							<button class="consultation-btn"><span>Request A<br/>Consultation<span></button>

						</div><!--.consultation-button-->

					</div><!--.navbar-->

				</div><!--.container-->

			</nav><!--nav-main-->

		</header><!--#header-->

	</div><!--.wrapper-->

	<main id="main" role="main">

		<?php get_template_part( 'partials/cws-header' ) ?>

		<?php do_action( 'cws_breadcrumb' ) ?>

		<?php do_action( 'cws_h1_title' ) ?>
