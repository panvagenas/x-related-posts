<?php
/**
 * Project: x-related-posts
 * File: carousel.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 3/5/2015
 * Time: 6:23 μμ
 * Since: TODO ${VERSION}
 * Copyright: 2015 Panagiotis Vagenas
 */

if ( ! defined( 'WPINC' ) ) {
	exit( 'Do NOT access this file directly: ' . basename( __FILE__ ) );
}

/* @var \x_related_posts\themes\theme $this */
/* @var array $related */

$contentPositions = str_split( $this->options[ 'content' ] );
?>
<div class="xrp">
	<h2><?php echo $this->©option->get( 'main_title' ); ?></h2>
	<div id="slider-container" class="slider-container" style="position: relative; top: 0px; left: 0px; width: 600px; height: 300px; overflow: hidden;">
		<div u="slides" style="cursor: move; position: absolute; overflow: hidden; left: 0px; top: 0px; width: 600px; height: 300px;">
			<?php
			foreach ( $related as $key => $rel ) {
				/* @var \x_related_posts\posts $post */
				$rel  = (object) $rel;
				$post = $this->©post( $rel->pid2 );
				?>
				<div class="">
					<a u="image" href="<?php echo $post->getThePermalink(); ?>">
						<?php
						foreach ( $contentPositions as $c ) {
							if ( $c === 't' ) {
								// title
								echo '<span>'.$this->getPostTitleFormatted($post).'</span>';
							} elseif ( $c === 'p' ) {
								// thumbnail
								echo '<img src="' . $post->getThumbnail() . '">';
							} else {
								// exc
								echo $this->getPostExcFormatted($post);
							}
						}
						?>
					</a>
				</div>
			<?php
			}
			?>
		</div>
	</div>
</div>

<script>
	jQuery(document).ready(function ($) {
		var options = {};
		var jssor_slider1 = new $JssorSlider$('slider-container', options);

		//responsive code begin
		//you can remove responsive code if you don't want the slider scales
		//while window resizes
		function ScaleSlider() {
			var parentWidth = $('#slider-container').parent().width();
			if (parentWidth) {
				jssor_slider1.$ScaleWidth(parentWidth);
			}
			else
				window.setTimeout(ScaleSlider, 30);
		}
		//Scale slider after document ready
		ScaleSlider();

		//Scale slider while window load/resize/orientationchange.
		$(window).bind("load", ScaleSlider);
		$(window).bind("resize", ScaleSlider);
		$(window).bind("orientationchange", ScaleSlider);
		//responsive code end
	});
</script>