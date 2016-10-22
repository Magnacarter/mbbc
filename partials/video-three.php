<?php
/**
 * Video partial
 */
?>

<div id="video-container-two">

	<div class="x-front-page">

		<?php CWS_Theme::cws_image( 'x.png', 'Close Video' ) ?>

	</div>

	<?php the_field( 'video_embed_front_page', 'options' ) ?>

</div>