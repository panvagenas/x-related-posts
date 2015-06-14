<?php
/**
 * Project: x-related-posts
 * File: post_ttl_color.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 15/5/2015
 * Time: 10:41 μμ
 * Since: 150429
 * Copyright: 2015 Panagiotis Vagenas
 */
if (!defined('WPINC')) {
    exit('Do NOT access this file directly: '.basename(__FILE__));
}

/* @var \x_related_posts\themes\theme $callee */
/* @var \xd_v141226_dev\views $this */
/* @var array $options */

if (isset($options['post_ttl_color'])) {
    ?>
    <div class="form-group row">
        <?php
        $inputOptions = array(
          'type'          => 'color',
          'name'          => '[post_ttl_color]',
          'title'         => $this->__('Post title color'),
          'placeholder'   => $this->__('Post title color'),
          'id'            => 'post-ttl-color',
          'attrs'         => '',
          'default_value' => '#ffffff',
          'classes'       => 'form-control col-md-10'
        );
        ?>
        <label for="<?php echo $inputOptions['id']; ?>" class="col-md-3 control-label">
            <?php echo $inputOptions['title']; ?>
        </label>

        <div class="col-sm-2">
            <?php
            echo $callee->fieldMarkup($options['post_ttl_color'], $inputOptions);
            ?>
        </div>
    </div>
<?php
}
