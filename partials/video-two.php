<?php
/**
 * Video partial
 */
?>

<div id="video-container">

	<div class="x-banner">

		<?php CWS_Theme::cws_image( 'x.png', 'Close Video' ) ?>

	</div>

	<?php the_field( 'video_embed_banner', 'options' ) ?>

</div>