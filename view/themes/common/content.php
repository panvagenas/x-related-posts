<?php
/**
 * Project: x-related-posts
 * File: content.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 15/5/2015
 * Time: 11:25 μμ
 * Since: 150429
 * Copyright: 2015 Panagiotis Vagenas
 */
if (!defined('WPINC')) {
    exit('Do NOT access this file directly: '.basename(__FILE__));
}

/* @var \x_related_posts\themes\theme $callee */
/* @var \xd_v141226_dev\views $this */
/* @var array $options */

if (isset($options['content'])) {
    ?>
    <div class="form-group row">
        <?php
        $selectOptions = array();
        foreach (\x_related_posts\options::$contentPositioningOptions as $k => $v) {
            $selectOptions[] = array(
              'label' => $v,
              'value' => $k,
            );
        }

        $inputOptions = array(
          'type'    => 'select',
          'name'    => '[content]',
          'title'   => $this->__('Content'),
          'id'      => 'content',
          'attrs'   => '',
          'classes' => '',
          'options' => $selectOptions
        );
        ?>
        <label for="<?php echo $inputOptions['id']; ?>" class="col-md-3 control-label">
            <?php echo $inputOptions['title']; ?>
        </label>

        <div class="col-sm-7">
            <?php
            echo $callee->fieldMarkup($options['content'], $inputOptions);
            ?>
        </div>
    </div>
<?php
}
