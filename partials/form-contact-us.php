<?php
/**
 * Form shortcode partial
 */
global $post;
?>
<form class="support-form custom-form shortcode-form contact-us-form" action="//www.cw-apps.com/form-processor-noscript.php" method="POST">

	<fieldset>

		<header class="form-header">

			<h3>Facing Criminal Charges?</h3>

		</header>

		<div class="form-field-wrap">

			<div class="form-group name">

				<input name="name" type="text" placeholder="Name" class="form-control">

			</div>

			<div class="form-group required">

				<input name="phone_or_email" type="text" placeholder="Email or Phone" class="form-control phoneemail required" >

			</div>

				<textarea name="message" placeholder="Tell us about your case..." class="form-control"></textarea>

			<div class="form-button">

				<button name="submit" type="submit" class="form-shortcode-btn">Get Help Today</button>

			</div>

		</div>

	</fieldset>

</form>

<div class="clearfix"></div>
