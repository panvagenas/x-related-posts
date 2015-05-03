<?php
/**
 * Project: x-related-posts
 * File: simple-list.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 3/5/2015
 * Time: 8:07 πμ
 * Since: TODO ${VERSION}
 * Copyright: 2015 Panagiotis Vagenas
 */

namespace x_related_posts\themes\main;


use x_related_posts\themes\theme;

class simple_list extends theme{
	/**
	 * @var string Theme's name
	 */
	public $name = 'Simple list';
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
	public $defaults = array();

	public function display( Array $related, $echo = true ) {
		$content = $this->view('simple-list.php');
		if ( $echo ) {
			echo $content;
		}
		return $content;
	}
}