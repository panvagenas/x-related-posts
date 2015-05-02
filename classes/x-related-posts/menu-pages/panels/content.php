<?php
/**
 * Project: x-related-posts
 * File: general-options.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 2/5/2015
 * Time: 8:57 πμ
 * Since: TODO ${VERSION}
 * Copyright: 2015 Panagiotis Vagenas
 */

namespace x_related_posts\menu_pages\panels;


use xd_v141226_dev\menu_pages\panels\panel;

class content extends panel{
	/**
	 * @var string Heading/title for this panel.
	 * @extenders Should be overridden by class extenders.
	 */
	public $heading_title = 'Content settings';

	/**
	 * @var string Content/body for this panel.
	 * @extenders Should be overridden by class extenders.
	 */
	public $content_body = '';

	/**
	 * @var string Additional documentation for this panel.
	 * @extenders Can be overridden by class extenders.
	 */
	public $documentation = '';

	public function __construct( $instance, $menu_page ) {
		parent::__construct( $instance, $menu_page );

		/**
		 * Add the content
		 */
		$this->content_body .= $this->©view->view($this, 'panel/content.php');
	}
}