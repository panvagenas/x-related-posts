<?php
/**
 * Project: x-related-posts
 * File: content.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 2/5/2015
 * Time: 9:49 πμ
 * Since: 150429
 * Copyright: 2015 Panagiotis Vagenas
 */

if (!defined('WPINC')) {
    exit('Do NOT access this file directly: '.basename(__FILE__));
}

/* @var \x_related_posts\menu_pages\panels\theme $callee */
/* @var \xd_v141226_dev\views $this */

?>
<div class="form-horizontal" role="form">

    <div class="form-group row">
        <?php
        $options = array();

        foreach ($this->©themes->getThemeNames('main') as $k => $v) {
            $options[] = array(
              'label' => $v,
              'value' => $k
            );
        }

        $inputOptions = array(
          'type'        => 'select',
          'name'        => '[main_theme]',
          'title'       => $this->__('Theme'),
          'placeholder' => $this->__('Theme'),
          'required'    => true,
          'id'          => 'main-theme',
          'attrs'       => '',
          'classes'     => '',
          'options'     => $options
        );
        ?>
        <label for="<?php echo $inputOptions['id']; ?>" class="col-md-3 control-label">
            <?php echo $inputOptions['title']; ?>
        </label>

        <div class="col-sm-7">
            <?php
            echo $callee->menu_page->option_form_fields->markup($this->©option->get('main_theme'), $inputOptions);
            ?>
        </div>
    </div>

</div>

<div id="main-theme-options-wrapper" class="form-horizontal" role="form"></div>
