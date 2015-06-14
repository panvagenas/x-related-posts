<?php
/**
 * Project: x-related-posts
 * File: crop_thumb.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 15/5/2015
 * Time: 11:24 μμ
 * Since: 150429
 * Copyright: 2015 Panagiotis Vagenas
 */
if (!defined('WPINC')) {
    exit('Do NOT access this file directly: '.basename(__FILE__));
}

/* @var \x_related_posts\themes\theme $callee */
/* @var \xd_v141226_dev\views $this */
/* @var array $options */

if (isset($options['crop_thumb'])) {
    ?>
    <div class="form-group row">
        <?php
        $inputOptions = array(
          'type'    => 'select',
          'name'    => '[crop_thumb]',
          'title'   => $this->__('Crop thumbnail'),
          'id'      => 'crop-thumb',
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
            echo $callee->fieldMarkup($options['crop_thumb'], $inputOptions);
            ?>
        </div>
    </div>
<?php
}
