		</main>

		<footer id="footer">

		<?php 

			// Adam's location ID
			//$location_id = 3125;
			//Server location ID
			$location_id = 4086;
			$i = 0;

		?>

			<div class="footer-community-wrap skew">

				<div class="container unskew">

					<div class="row">

						<div class="fc-headline col-sm-12 text-center">

							<h2>Communities We Serve</h2>

						</div><!--.fc-headline-->

						<div class="fc-mission col-sm-12 text-center">

							<p>Serving our Texas communities is one of the most important aspects of practicing law here at MBBC. Though we are based in Austin, we have proudly served the needs of people in Bastrop, Burnet, Georgetown, Giddings, New Braunfels, San Marcos and the surrounding areas for nearly 50 years.</p>

						</div><!--fc-mission-->

						<div class="fc-image col-md-6">

							<?php CWS_Theme::cws_image( 'city.png', 'MBFC Image of Austin TX' ) ?>

						</div><!--.fc-image-->

						<div class="fc-list col-md-6 no-pad-left">

							<ul>

								<?php

									$communities = array(
										'AUSTIN, TEXAS',
										'BASTROP, TEXAS',
										'BURNET, TEXAS',
										'GEORGETOWN, TEXAS',
										'GIDDINGS, TEXAS',
										'NEW BRAUNFELS, TEXAS',
										'SAN MARCOS, TEXAS',
									);

									foreach ($communities as $comm) {

										echo sprintf( '<li>%s</li>', esc_html( $comm ) );

									}

								?>

							</ul>

							<div class="comm-button">

								<a href="<?php echo esc_url( home_url() ) ?>/communities-we-serve-in-texas/" class="comm-btn">More About MBBC in the Community</a>

							</div><!--.comm-button-->

						</div><!--.fc-list-->

					</div><!--.row-->

				</div><!--.container-->

			</div><!--.footer-community-wrap-->

			<div class="footer-map container-fluid">

				<div class="row">

					<div id="map-footer" style="width:100%; height:332px; overflow: none !important;"></div>

					<div class="map-shadow"></div>

				</div><!--row-->

			</div><!--footer-map-->

			<div class="footer-meta-wrap container-fluid no-pad">

				<div class="fm-image col-md-4 no-pad"></div><!--.fm-image-->

				<div class="fm-content col-md-8 no-pad-right">

					<div class="fm-content-left col-sm-6 no-pad-right">

						<?php CWS_Theme::cws_image( 'mbfc-white-logo.png', 'MBBC Footer Logo' ) ?>

						<div class="fm-address-desktop hidden-xs">

							<h5>Minton, Burton, Bassett &amp; Collins, P.C.</h5>

							<?php
								//address
								if( function_exists( 'wpseo_local_show_address' ) ) {

								$params = array(
									'echo'         => true,
									'id'           => $location_id,
									'show_state'   => true,
									'show_country' => false,
									'show_phone'   => false,
									'oneline'      => false,
								);

								wpseo_local_show_address( $params );

								}
							?>

						</div>

					</div>

					<div class="footer-cta col-sm-6">

						<h2>Get help today <span>(512) 476-4873</span></h2>

						<ul class="footer-cta-desktop-buttons hidden-xs">

							<li class="directions-button">

								<a target="_blank" href="https://goo.gl/maps/HrL9yieWYMR2" class="directions-btn">Get Directions</a>

							</li><!--.directions-button-->

							<li class="chat-button">

								<a href="#" class="chat-btn">Live Chat</a>

							</li><!--.chat-button-->

						</ul>

						<ul class="footer-cta-mobile-buttons visible-xs">

							<li class="chat-button">

								<a href="tel:5124764873" class="chat-btn">Tap To Call</a>

							</li><!--.chat-button-->

							<li class="directions-button">

								<a target="_blank" href=" https://goo.gl/maps/HrL9yieWYMR2" class="directions-btn">Directions</a>

							</li><!--.directions-button-->

						</ul>

						<div class="fm-address-mobile visible-xs">

							<h5>Minton, Burton, Bassett &amp; Collins, P.C.</h5>

							<?php
								//address
								if( function_exists( 'wpseo_local_show_address' ) ) {

								$params = array(
									'echo'         => true,
									'id'           => $location_id,
									'show_state'   => true,
									'show_country' => false,
									'show_phone'   => false,
									'oneline'      => false,
								);

								wpseo_local_show_address( $params );

								}
							?>

						</div>

						<div class="social-icons">

							<ul>

								<li><a target="_blank" href="<?php the_field( 'google_link', 'option' ) ?>"><?php CWS_Theme::cws_image( 'google.jpg', 'Google Plus Page' ) ?></a></li>

								<li><a target="_blank" href="<?php the_field( 'facebook_link', 'option' ) ?>"><?php CWS_Theme::cws_image( 'facebook.jpg', 'Facebook Page' ) ?></a></li>

								<li><a target="_blank" href="<?php the_field( 'twitter_link', 'option' ) ?>"><?php CWS_Theme::cws_image( 'twitter.jpg', 'Twitter Page' ) ?></a></li>

								<li><a target="_blank" href="<?php the_field( 'rss_feed_link', 'option' ) ?>"><?php CWS_Theme::cws_image( 'rss.jpg', 'RSS Feed' ) ?></a></li>

							</ul>

						</div>

					</div><!--footer-cta-->

				</div><!--.fm-content-->

			</div><!--.footer-meta-wrap-->

			<div class="footer-holder">

				<div class="container-fluid">

					<div class="row">

						<div class="sub-footer-nav col-lg-7">

							<nav class="sub-footer-nav">

								<?php wp_nav_menu( array( 'theme_location' => 'sub-footer-menu', 'class_container' => 'bpt-footer-menu') ) ?>

							</nav>

						</div><!--sub-footer-nav-->

						<div class="site-name-copyright-wrap col-lg-5">

							<div class="site-name-copyright">

								<p><?php echo "&copy" ?><?php echo date( 'Y' ) ?> Minton, Burton, Bassett, &amp; Collins, P.C.. <?php echo "All Rights Reserved" ?></p>

							</div>

							<div class="site-name-copyright-mobile">

								<p><?php echo "&copy" ?><?php echo date( 'Y' ) ?> Minton, Burton, Bassett, &amp; Collins, P.C..</p>

								<p><?php echo "All Rights Reserved" ?></p>

							</div>

							<div class="info-site">

								<p>

									<span class="icon-network"></span>

									<a href="https://www.consultwebs.com/" target="_blank" rel="nofollow">

									<?php CWS_Theme::cws_image( 'cw-logo-black.png', 'Consultwebs.com Law Firm Website Designers / Personal Injury Lawyer Marketing' ) ?>

									Site by Consultwebs.com

									</a>: Law Firm Website Designers / Personal Injury Lawyer Marketing

								</p>

							</div><!--info-site-->

							<div class="info-site-mobile">

								<p>

									<a href="https://www.consultwebs.com/" target="_blank" rel="nofollow"><?php CWS_Theme::cws_image( 'cw-logo-black.png', 'Consultwebs.com Law Firm Website Designers / Personal Injury Lawyer Marketing' ) ?></a>

								</p>

								<p>

									<a href="https://www.consultwebs.com/" target="_blank" rel="nofollow">Site by Consultwebs.com</a>

								</p>

								<p>

									: Law Firm Website Designers / Personal Injury Lawyer Marketing

								</p>

							</div><!--.info-site-mobile-->

						</div><!--site-name-copyright-wrap-->

					</div><!--row-->

				</div><!--.container-->

			</div><!--footer-holder-->

		</footer>

	</div>

	<?php wp_footer() ?>

	</body>

</html>