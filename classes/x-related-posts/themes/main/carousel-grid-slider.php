<?php
/**
 * Project: x-related-posts
 * File: carousel-grid-slider.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 13/5/2015
 * Time: 4:31 μμ
 * Since: 150429
 * Copyright: 2015 Panagiotis Vagenas
 */

namespace x_related_posts\themes\main;

use x_related_posts\themes\theme;

class carousel_grid_slider extends theme
{
    /**
     * @var string Theme's name
     */
    public $name   = 'Carousel Grid Slider';
    public $domain = 'main';
    /**
     * @var string Theme's description
     */
    public $description = 'Carousel grid slider theme description'; // todo
    /**
     * @var string A url to an img
     */
    public $preview = '';
    /**
     * @var array Theme default options
     */
    public $defaults
      = array(
        'thumbCaption'       => true,
        'numOfPostsPerRow'   => 5,
        'carouselPauseHover' => true,
        'visiblePostsPerRow' => 4,
      );
    /**
     * @var bool
     */
    public $useCommonOptions = true;
    /**
     * @var array
     */
    public $commonOptions
      = array(
        'content'        => 'pt',
        'post_ttl_size'  => 0,
        'post_ttl_color' => '#ffffff',
        'crop_thumb'     => 1,
        'thumb_height'   => 200,
        'thumb_width'    => 300,
      );

    /**
     * @param array $related
     * @param bool  $echo
     *
     * @return bool|string
     * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
     * @since  150429+
     */
    public function display(Array $related, $echo = true)
    {
        $this->enqueueScripts();
        $this->enqueueStyles();
        $content = $this->view('carousel-grid-slider.php', compact('related'));
        if ($echo) {
            echo $content;
        }

        return $content;
    }

    /**
     * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
     * @since  150429
     */
    protected function enqueueScripts()
    {
        $scripts = array(
          $this->instance->ns_with_dashes.'--jssor.slider.mini' => array(
            'url' => $this->©url->to_plugin_dir_file('/templates/assets/js/jssor.slider.mini.js'),
            'ver' => $this->instance->plugin_version_with_dashes,
          )
        );
        $this->©script->register($scripts);
        $this->©script->enqueue(array_keys($scripts));
    }

    /**
     * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
     * @since  150429
     */
    protected function enqueueStyles()
    {
        $styles = array(
          $this->instance->ns_with_dashes.'--jssor.carousel.grid.style' => array(
            'url' => $this->©url->to_plugin_dir_file('/templates/assets/css/main/carousel-grid-slider.css'),
            'ver' => $this->instance->plugin_version_with_dashes,
          )
        );
        $this->©style->register($styles);
        $this->©style->enqueue(array_keys($styles));
    }

    /**
     * @param bool $echo
     *
     * @return string
     * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
     * @since  150429
     */
    public function settings($echo = true)
    {
        $content = parent::settings(false);
        $content .= $this->©view->view($this, 'themes/carousel-grid-slider-settings.php', array('options' => $this->options));
        if ($echo) {
            echo $content;
        }

        return $content;
    }

    /**
     * @param array $newOptions
     *
     * @return array
     * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
     * @since  150429
     */
    public function validateOptions(Array $newOptions)
    {
        $validated = array(
          'thumbCaption'       => isset($newOptions ['thumbCaption']),
          'carouselPauseHover' => isset($newOptions ['carouselPauseHover']),
          'numOfPostsPerRow'   => isset($newOptions ['numOfPostsPerRow']) && (int)$newOptions['numOfPostsPerRow'] >= 0
            ? (int)$newOptions ['numOfPostsPerRow']
            : $this->defaults['numOfPostsPerRow'],
        );

        $validated['visiblePostsPerRow'] = isset($newOptions ['visiblePostsPerRow']) && (int)$newOptions['visiblePostsPerRow'] <= $validated['numOfPostsPerRow']
          ? (int)$newOptions ['visiblePostsPerRow']
          : $validated['numOfPostsPerRow'];

        return array_merge($this->validateCommonOptions($newOptions), $validated);
    }
}
