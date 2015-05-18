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

if (!defined('WPINC')) {
    exit('Do NOT access this file directly: ' . basename(__FILE__));
}

/* @var \x_related_posts\themes\theme $this */
/* @var array $related */

$contentPositions = str_split($this->options['content']);
$containerUID = uniqid('xrp-container-');
$sliderContainerUID = uniqid('xrp-slider-container-');

?>
<div id="<?php echo $containerUID; ?>" class="xrp">
    <h2><?php echo $this->©option->get('main_title'); ?></h2>

    <div id="<?php echo $sliderContainerUID; ?>" class="car-slider-set-max-dims" style="position:relative; top: 0; left: 0;">
        <div u="slides" class="row car-slider-set-max-dims">
            <?php
            foreach ($related as $key => $rel) {
                /* @var \x_related_posts\posts $post */
                $rel = (object)$rel;
                $post = $this->©post($rel->pid2);
                ?>
                <div class="col car-slider-set-max-dims slider-item">
                    <a href="<?php echo $post->getThePermalink(); ?>">
                        <?php
                        foreach ($contentPositions as $c) {
                            if ($c === 't') {
                                // title
                                echo $this->getPostTitleFormatted($post);
                            } elseif ($c === 'p') {
                                // thumbnail
                                echo '<img src="' . $this->getThumbnail($post) . '">';
                            } else {
                                // exc
                                echo $this->getPostExcFormatted($post);
                            }
                        }
                        ?>
                    </a>
                    <?php
                    if ($this->©user->is_super_admin()) {
                        echo '<p>';
                        echo 'host ID: ' . $rel->pid1;
                        echo '<br>ID: ' . $rel->pid2;
                        echo '<br>Rating: ' . round($rel->rating, 4);
                        echo '<br>Date: ' . $rel->post_date;
                        echo '</p>';
                    }
                    ?>
                </div>
            <?php
            }
            ?>
        </div>
        <div u="navigator" class="jssorb01" style="top: 16px; right: 10px;">
            <!-- bullet navigator item prototype -->
            <div u="prototype"></div>
        </div>

        <!-- Arrow Left -->
        <span u="arrowleft" class="jssora02l" style="top: 50%; left: 8px;">
        </span>
        <!-- Arrow Right -->
        <span u="arrowright" class="jssora02r" style="top: 50%; right: 8px;">
        <!--#endregion Arrow Navigator Skin End -->
    </div>
</div>

<script>
    jQuery(document).ready(function ($) {

        var conUID = '#<?php echo $containerUID; ?>';
        var sliderContainerID = '<?php echo $sliderContainerUID; ?>';
        var $container = $(conUID);
        var relCount = parseInt(<?php echo count($related); ?>);

        var maxWidth = $container.parent().width();

        var showPiecesMin = parseInt(<?php echo $this->options['carouselMinVisible']; ?>);
        var SlideSpacing = showPiecesMin;
        var slideWidth = Math.floor(maxWidth/showPiecesMin)-SlideSpacing;

        var sHeight = $container.find('.slider-item').first().height();
        $('.car-slider-set-max-dims').height(sHeight);
        $('#'+sliderContainerID).children().first().width('100%');

        var options = {
            $SlideWidth: slideWidth,                //[Optional] Width of every slide in pixels, default value is width of 'slides' container
            $SlideHeight: sHeight,             //[Optional] Height of every slide in pixels, default value is height of 'slides' container
            $SlideSpacing: SlideSpacing, 					                //[Optional] Space between each slide in pixels, default value is 0
            $DisplayPieces: showPiecesMin,               //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1

            $BulletNavigatorOptions: {                                //[Optional] Options to specify and enable navigator or not
                $Class: $JssorBulletNavigator$,                       //[Required] Class to create navigator instance
                $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                $AutoCenter: 0,                                 //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                $Steps: 1,                                      //[Optional] Steps to go for each navigation request, default value is 1
                $Lanes: 1,                                      //[Optional] Specify lanes to arrange items, default value is 1
                $SpacingX: 10,                                   //[Optional] Horizontal space between each item in pixel, default value is 0
                $SpacingY: 10,                                   //[Optional] Vertical space between each item in pixel, default value is 0
                $Orientation: 1                                 //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
            },

            $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
                $ChanceToShow: 1,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                $AutoCenter: 2,                                 //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                $Steps: showPiecesMin                                       //[Optional] Steps to go for each navigation request, default value is 1
            }
        };
        var jssor_slider1 = new $JssorSlider$(sliderContainerID, options);

        //responsive code begin
        //you can remove responsive code if you don't want the slider scales
        //while window resizes
        function ScaleSlider() {
            var parentWidth = $('#' + sliderContainerID).parent().width();
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