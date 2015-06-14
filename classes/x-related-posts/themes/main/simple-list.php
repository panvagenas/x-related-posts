<?php
/**
 * Project: x-related-posts
 * File: simple-list.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 3/5/2015
 * Time: 8:07 πμ
 * Since: 150429
 * Copyright: 2015 Panagiotis Vagenas
 */

namespace x_related_posts\themes\main;

use x_related_posts\themes\theme;

class simple_list extends theme
{
    /**
     * @var string Theme's name
     */
    public $name   = 'Simple list';
    public $domain = 'main';
    /**
     * @var string Theme's description
     */
    public $description = 'Simple list theme description'; // todo
    /**
     * @var string A url to an img
     */
    public $preview = '';
    /**
     * @var array Theme default options
     */
    public $defaults
                             = array(
        'orderedList'  => true,
        'borderColor'  => '#ffffff',
        'borderRadius' => 0,
        'borderWeight' => 0,
      );
    public $useCommonOptions = true;
    public $commonOptions
                             = array(
        'post_ttl_size'  => 0,
        'post_ttl_color' => '#ffffff',
      );

    public function display(Array $related, $echo = true)
    {
        $content = $this->view('simple-list.php', compact('related'));
        if ($echo) {
            echo $content;
        }
        return $content;
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
        $content .= $this->©view->view($this, 'themes/simple-list-settings.php', array('options' => $this->options));
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
          'orderedList'  => isset($newOptions ['orderedList']),
          'borderColor'  => isset($newOptions['borderColor'])
            ? esc_sql($newOptions['borderColor'])
            : $this->defaults['borderColor'],
          'borderRadius' => isset($newOptions ['borderRadius']) && (int)$newOptions['borderRadius'] >= 0
            ? (int)$newOptions ['borderRadius']
            : $this->defaults['borderRadius'],
          'borderWeight' => isset($newOptions ['borderWeight']) && (int)$newOptions['borderWeight'] >= 0
            ? (int)$newOptions ['borderWeight']
            : $this->defaults['borderWeight'],
        );

        return array_merge($this->validateCommonOptions($newOptions), $validated);
    }
}
