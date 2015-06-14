<?php
/**
 * Project: x-related-posts
 * File: shortcode.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 29/4/2015
 * Time: 8:49 μμ
 * Since: 150429
 * Copyright: 2015 Panagiotis Vagenas
 */

namespace x_related_posts\shortcodes;

class shortcode extends \xd_v141226_dev\shortcodes\shortcode
{
    public $content = '';

    /**
     * Gets default shortcode attributes.
     *
     * @note This should be overwritten by class extenders.
     * @return array Default shortcode attributes.
     */
    public function attr_defaults()
    {
        // TODO return default sc options
    }

    /**
     * Gets all shortcode attribute keys, interpreted as boolean values.
     *
     * @note This should be overwritten by class extenders.
     * @return array Boolean attribute keys.
     */
    public function boolean_attr_keys()
    {
        return array();
    }

    /**
     * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
     * @since  150429
     */
    public function display()
    {
        // TODO
        return $this->content;
    }
}
