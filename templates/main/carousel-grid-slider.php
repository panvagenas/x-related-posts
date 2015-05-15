<?php
/**
 * Project: x-related-posts
 * File: carousel-grid-slider.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 13/5/2015
 * Time: 4:20 μμ
 * Since: TODO ${VERSION}
 * Copyright: 2015 Panagiotis Vagenas
 */

/* @var \x_related_posts\themes\main\carousel_grid_slider $this */
/* @var array $related */
$numOfPostsPerRow = (int) $this->options['numOfPostsPerRow'];
$contentPositions = str_split( $this->options[ 'content' ] );
$sliderContainers = array();
?>

<!-- Jssor Slider Begin -->
<!-- To move inline styles to css file/block, please specify a class name for each element. -->
<div class="xrp">
	<h2><?php echo $this->©option->get( 'main_title' ); ?></h2>

	<div id="xrp-slider-container"
	     style="position: relative; top: 0; left: 0; width: 809px; height: 456px; overflow: hidden; ">
		<!-- Slides Container -->
		<div u="slides"
		     style="cursor: move; position: absolute; left: 0; top: 0; width: 809px; height: 456px; overflow: hidden;">
			<?php
			$i            = 0;
			$numOfRelLeft = count( $related );
			while ( $numOfRelLeft > 0 ) {
				$relRow = array_slice( $related, $i++ * $numOfPostsPerRow, $numOfPostsPerRow );
				$numOfRelLeft -= count( $relRow );
				$rowId              = uniqid( 'slider>_' );
				$sliderContainers[] = $rowId;
				?>
				<div>
					<div id="<?php echo $rowId; ?>" class=""
					     style="position: relative; top: 0; left: 0; width: 809px; height: 150px;">
						<div u="slides"
						     style="cursor: move; position: absolute; left: 0; top: 0; width: 809px; height: 150px; overflow: hidden;">
							<?php
							foreach ( $relRow as $key => $rel ) {
								/* @var \x_related_posts\posts $post */
								$rel  = (object) $rel;
								$post = $this->©post( $rel->pid2 );
								?>
								<div class="">
									<a u="image" href="<?php echo $post->getThePermalink(); ?>">
										<img src="<?php echo $post->getThumbnail(); ?>">
									</a>
									<div u="caption"
									     style="position: absolute; font-size: 10px; background-color: rgba(255, 255, 255, 0.8); bottom: 0px; width:100%;">
										<a href="<?php echo $post->getThePermalink(); ?>">
											<?php echo $this->getPostTitleFormatted( $post ); ?>
										</a>
									</div>
								</div>
							<?php
							}
							?>
						</div>
						<div u="navigator" class="jssorb03" style="top: 10px; right: 10px;">
							<!-- bullet navigator item prototype -->
							<div u="prototype">
								<div u="numbertemplate"></div>
							</div>
						</div>
					</div>
				</div>
			<?php
			}
			?>
		</div>

		<!-- bullet navigator container -->
		<div u="navigator" class="jssorb02" style="bottom: 16px; left: 6px;">
			<!-- bullet navigator item prototype -->
			<div u="prototype">
				<div u="numbertemplate"></div>
			</div>
		</div>
	</div>
</div>

<!-- Jssor Slider End -->

<script>

	jQuery(document).ready(function ($) {

		var nestedSliders = [];

		$.each(<?php echo $this->©var->to_js($sliderContainers); ?>, function (index, value) {

			var sliderhOptions = {
				$PauseOnHover: 1,            //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1
				$AutoPlaySteps: 4,               //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
				$SlideDuration: 300,             //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
				$MinDragOffsetToSlide: 20,       //[Optional] Minimum drag offset to trigger slide , default value is 20
				$SlideWidth: 200,                //[Optional] Width of every slide in pixels, default value is width of 'slides' container
				//$SlideHeight: 150,             //[Optional] Height of every slide in pixels, default value is height of 'slides' container
				$SlideSpacing: 3, 					                //[Optional] Space between each slide in pixels, default value is 0
				$DisplayPieces: 4,               //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
				$ParkingPosition: 0,           //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
				$UISearchMode: 0,                //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).

				$BulletNavigatorOptions: {             //[Optional] Options to specify and enable navigator or not
					$Class: $JssorBulletNavigator$,    //[Required] Class to create navigator instance
					$ChanceToShow: 2,            //[Required] 0 Never, 1 Mouse Over, 2 Always
					$AutoCenter: 0,              //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
					$Steps: 1,                   //[Optional] Steps to go for each navigation request, default value is 1
					$Lanes: 1,                   //[Optional] Specify lanes to arrange items, default value is 1
					$SpacingX: 0,                //[Optional] Horizontal space between each item in pixel, default value is 0
					$SpacingY: 0,                //[Optional] Vertical space between each item in pixel, default value is 0
					$Orientation: 1              //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
				}
			};
			var jssor_sliderh = new $JssorSlider$(value, sliderhOptions);

			nestedSliders.push(jssor_sliderh);
		});

		var options = {
			$AutoPlay: false,                 //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
			$AutoPlaySteps: 1,               //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
			$AutoPlayInterval: 4000,         //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
			$PauseOnHover: 1,            //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

			$ArrowKeyNavigation: true,   			            //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
			$SlideDuration: 300,             //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
			$MinDragOffsetToSlide: 80,       //[Optional] Minimum drag offset to trigger slide , default value is 20
			//$SlideWidth: 600,              //[Optional] Width of every slide in pixels, default value is width of 'slides' container
			$SlideHeight: 150,             //[Optional] Height of every slide in pixels, default value is height of 'slides' container
			$SlideSpacing: 3, 					                //[Optional] Space between each slide in pixels, default value is 0
			$DisplayPieces: 3,               //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
			$ParkingPosition: 0,             //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
			$UISearchMode: 0,                //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
			$PlayOrientation: 2,             //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
			$DragOrientation: 2,             //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0),

			$BulletNavigatorOptions: {             //[Optional] Options to specify and enable navigator or not
				$Class: $JssorBulletNavigator$,    //[Required] Class to create navigator instance
				$ChanceToShow: 2,            //[Required] 0 Never, 1 Mouse Over, 2 Always
				$AutoCenter: 2,              //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
				$SpacingY: 5,                //[Optional] Vertical space between each item in pixel, default value is 0
				$Orientation: 2              //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
			}
		};
		var jssor_slider1 = new $JssorSlider$("xrp-slider-container", options);

		//responsive code begin
		//you can remove responsive code if you don't want the slider scales while window resizes
		function ScaleSlider() {
			var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
			if (parentWidth) {
				var sliderWidth = parentWidth;

				//keep the slider width no more than 809
				sliderWidth = Math.min(sliderWidth, 809);

				jssor_slider1.$ScaleWidth(sliderWidth);
			}
			else
				window.setTimeout(ScaleSlider, 30);
		}

		ScaleSlider();

		$(window).bind("load", ScaleSlider);
		$(window).bind("resize", ScaleSlider);
		$(window).bind("orientationchange", ScaleSlider);
		//responsive code end
	});
</script>