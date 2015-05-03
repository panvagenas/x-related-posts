<?php
/**
 * Project: x-related-posts
 * File: grid.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 3/5/2015
 * Time: 8:07 πμ
 * Since: TODO ${VERSION}
 * Copyright: 2015 Panagiotis Vagenas
 */

namespace x_related_posts\themes\main;


use x_related_posts\themes\theme;

class grid extends theme{
	/**
	 * @var string Theme's name
	 */
	public $name = 'Grid';
	public $domain = 'main';
	/**
	 * @var string Theme's description
	 */
	public $description = 'Grid theme description'; // todo
	/**
	 * @var string A url to an img
	 */
	public $preview = '';
	/**
	 * @var array Theme default options
	 */
	public $defaults = array();
	/**
	 * @var array Theme options validators
	 */
	public $validators = array();

	public function display( Array $related, $echo = true ) {
		$content = $this->view('grid.php');
		if ( $echo ) {
			echo $content;
		}
		return $content;
	}
}