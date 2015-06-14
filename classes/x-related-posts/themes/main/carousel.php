<?php
/**
 * Project: x-related-posts
 * File: carousel.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 3/5/2015
 * Time: 8:07 πμ
 * Since: 150429
 * Copyright: 2015 Panagiotis Vagenas
 */

namespace x_related_posts\themes\main;

use x_related_posts\themes\theme;

class carousel extends theme
{
    /**
     * @var string Theme's name
     */
    public $name   = 'Carousel';
    public $domain = 'main';
    /**
     * @var string Theme's description
     */
    public $description = 'Carousel theme description'; // todo
    /**
     * @var string A url to an img
     */
    public $preview = '';
    /**
     * @var array Theme default options
     */
    public $defaults
                             = array(
        'thumbCaption'       => false,
        'carouselAutoTime'   => 3,
        'carouselMaxVisible' => 6,
        'carouselMinVisible' => 2,
        'carouselPauseHover' => true,
      );
    public $useCommonOptions = true;
    public $commonOptions
                             = array(
        'post_ttl_size'  => 0,
        'post_exc_size'  => 0,
        'post_ttl_color' => '#ffffff',
        'post_exc_color' => '#ffffff',
        'post_exc_len'   => 10,
        'content'        => 'pt',
        'crop_thumb'     => 1,
        'thumb_height'   => 200,
        'thumb_width'    => 300,
      );

    public function display(Array $related, $echo = true)
    {
        $this->enqueueScripts();
        $content = $this->view('carousel.php', compact('related'));
        if ($echo) {
            echo $content;
        }

        return $content;
    }

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

        switch ($this->options['carouselMinVisible']) {
            default:
            case '1':
            case '2':
            case '3':
            case '4':
            case '6':
                $cssFile = 'grid-12.min.css';
                break;
            case '5':
            case '10':
                $cssFile = 'grid-10.min.css';
                break;
            case '7':
                $cssFile = 'grid-14.min.css';
                break;
            case '8':
                $cssFile = 'grid-16.min.css';
                break;
            case '9':
                $cssFile = 'grid-18.min.css';
                break;
        }
        $styles = array(
          $this->instance->ns_with_dashes.'--'.$cssFile    => array(
            'url' => $this->©url->to_plugin_dir_file('/templates/assets/css/'.$cssFile),
            'ver' => $this->instance->plugin_version_with_dashes,
          ),
          $this->instance->ns_with_dashes.'--'.$this->slug => array(
            'url' => $this->©url->to_plugin_dir_file('/templates/assets/css/main/carousel.css'),
            'ver' => $this->instance->plugin_version_with_dashes,
          ),
        );
        $this->©styles->register($styles);
        $this->©styles->enqueue(array_keys($styles));
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
        $content .= $this->©view->view($this, 'themes/carousel-settings.php', array('options' => $this->options));
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
          'carouselAutoTime'   => isset($newOptions ['carouselAutoTime']) && (int)$newOptions['carouselAutoTime'] >= 0
            ? (int)$newOptions ['carouselAutoTime']
            : $this->defaults['carouselAutoTime'],
          'carouselMinVisible' => isset($newOptions ['carouselMinVisible']) && (int)$newOptions['carouselMinVisible'] > 0
            ? (int)$newOptions ['carouselMinVisible']
            : $this->defaults['carouselMinVisible'],
        );

        $validated['carouselMaxVisible'] = isset($newOptions ['carouselMaxVisible']) && (int)$newOptions['carouselMaxVisible'] > $validated['carouselMinVisible']
          ? (int)$newOptions ['carouselMaxVisible']
          : $validated['carouselMinVisible'];

        return array_merge($this->validateCommonOptions($newOptions), $validated);
    }
}
