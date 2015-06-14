<?php
/**
 * Project: x-related-posts
 * File: carousel-grid-slider-settings.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 4/5/2015
 * Time: 10:02 μμ
 * Since: 150429
 * Copyright: 2015 Panagiotis Vagenas
 */
if (!defined('WPINC')) {
    exit('Do NOT access this file directly: '.basename(__FILE__));
}

/* @var \x_related_posts\themes\main\carousel_grid_slider $callee */
/* @var \xd_v141226_dev\views $this */
/* @var array $options */

?>

<div class="form-group row">
    <?php
    $inputOptions = array(
      'type'    => 'select',
      'name'    => '[thumbCaption]',
      'title'   => $this->__('thumbCaption'),
      'id'      => 'thumbCaption',
      'attrs'   => '',
      'classes' => '',
      'options' => array(
        array(
          'value' => '1',
          'label' => 'Yes'
        ),
        array(
          'value' => '0',
          'label' => 'No'
        )
      )
    );
    ?>
    <label for="<?php echo $inputOptions['id']; ?>" class="col-md-3 control-label">
        <?php echo $inputOptions['title']; ?>
    </label>

    <div class="col-sm-7">
        <?php
        echo $callee->fieldMarkup($options['thumbCaption'], $inputOptions);
        ?>
    </div>
</div>

<div class="form-group row">
    <?php
    $inputOptions = array(
      'type'    => 'select',
      'name'    => '[carouselPauseHover]',
      'title'   => $this->__('carouselPauseHover'),
      'id'      => 'carouselPauseHover',
      'attrs'   => '',
      'classes' => '',
      'options' => array(
        array(
          'value' => '1',
          'label' => 'Yes'
        ),
        array(
          'value' => '0',
          'label' => 'No'
        )
      )
    );
    ?>
    <label for="<?php echo $inputOptions['id']; ?>" class="col-md-3 control-label">
        <?php echo $inputOptions['title']; ?>
    </label>

    <div class="col-sm-7">
        <?php
        echo $callee->fieldMarkup($options['carouselPauseHover'], $inputOptions);
        ?>
    </div>
</div>

<div class="form-group row">
    <?php
    $inputOptions = array(
      'type'                => 'number',
      'name'                => '[numOfPostsPerRow]',
      'title'               => $this->__('numOfPostsPerRow'),
      'placeholder'         => $this->__('numOfPostsPerRow'),
      'required'            => true,
      'id'                  => 'numOfPostsPerRow',
      'attrs'               => '',
      'classes'             => '',
      'validation_patterns' => array(
        array(
          'name'        => 'numOfPostsPerRowMin',
          'description' => $this->__('Value for this field must be a positive integer'),
          'regex'       => '/^0*[1-9]{1}[0-9]*$/',
          'minimum'     => 1,
        )
      ),
    );
    ?>
    <label for="<?php echo $inputOptions['id']; ?>" class="col-md-3 control-label">
        <?php echo $inputOptions['title']; ?>
    </label>

    <div class="col-sm-7">
        <?php
        echo $callee->fieldMarkup($options['numOfPostsPerRow'], $inputOptions);
        ?>
    </div>
</div>

<div class="form-group row">
    <?php
    $inputOptions = array(
      'type'                => 'number',
      'name'                => '[visiblePostsPerRow]',
      'title'               => $this->__('visiblePostsPerRow'),
      'placeholder'         => $this->__('visiblePostsPerRow'),
      'required'            => true,
      'id'                  => 'visiblePostsPerRow',
      'attrs'               => '',
      'classes'             => '',
      'validation_patterns' => array(
        array(
          'name'        => 'visiblePostsPerRowMin',
          'description' => $this->__('Value for this field must be a positive integer'),
          'regex'       => '/^0*[1-9]{1}[0-9]*$/',
          'minimum'     => 1,
        )
      ),
    );
    ?>
    <label for="<?php echo $inputOptions['id']; ?>" class="col-md-3 control-label">
        <?php echo $inputOptions['title']; ?>
    </label>

    <div class="col-sm-7">
        <?php
        echo $callee->fieldMarkup($options['visiblePostsPerRow'], $inputOptions);
        ?>
    </div>
</div>
