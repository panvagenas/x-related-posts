<?php
/**
 * Project: x-related-posts
 * File: widget.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 29/4/2015
 * Time: 8:22 μμ
 * Since: 150429
 * Copyright: 2015 Panagiotis Vagenas
 */

namespace x_related_posts;

/**
 * Class widget
 *
 * @package x_related_posts
 * @author  Panagiotis Vagenas <pan.vagenas@gmail.com>
 * @since   150429
 *
 * @property framework $framework
 */
class widget extends \WP_Widget
{
    /**
     * @var string Slug for this widget.
     * @note Set to the basename of the class w/ dashes.
     */
    public $slug = 'xdark';

    /**
     * @var string Name for this widget.
     * @note Set to the name of the widget w/ dashes.
     */
    public $name = 'XDaRk Widget';

    /**
     * @var array Options for this widget.
     * @note Set options for this widget.
     */
    public $options = array('description' => 'XDaRk Widget Description');

    /**
     * @var array Options for this widget.
     * @note Set options for this widget. Currently only width is supported.
     */
    public $controlOptions = array();

    /**
     * Plugin framework
     *
     * @var framework
     */
    protected $framework;

    /**
     * Register widget with WordPress.
     */
    public function __construct()
    {

        global $xdark;
        $this->framework = $xdark;

        $this->options['description'] = $this->framework->__($this->options['description']);

        parent::__construct(
          $this->framework->__($this->slug),
          $this->framework->__($this->name),
          $this->options,
          $this->controlOptions
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see    WP_Widget::widget()
     *
     * @param array $args
     *            Widget arguments.
     * @param array $instance
     *            Saved values from database.
     *
     * @since  140901
     * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
     */
    public function widget($args, $instance)
    {
    }

    /**
     * Back-end widget form.
     * Outputs the options form on admin
     *
     * @see    \WP_Widget::form()
     *
     * @param array $instance
     *            Previously saved values from database.
     *
     * @return string|void
     * @since  140901
     * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
     */
    public function form($instance)
    {
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see    WP_Widget::update()
     *
     * @param array $new_instance
     *            Values just sent to be saved.
     * @param array $old_instance
     *            Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     * @since  1.0.0
     * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
     */
    public function update($new_instance, $old_instance)
    {
    }
}
