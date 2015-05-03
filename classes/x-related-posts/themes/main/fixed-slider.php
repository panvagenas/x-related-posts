<?php
/**
 * Project: x-related-posts
 * File: fixed-slider.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 3/5/2015
 * Time: 6:21 μμ
 * Since: TODO ${VERSION}
 * Copyright: 2015 Panagiotis Vagenas
 */

namespace x_related_posts\themes\main;


use x_related_posts\themes\theme;

class fixed_slider extends theme{
	/**
	 * @var string Theme's name
	 */
	public $name = 'Fixed Slider';
	public $domain = 'main';
	/**
	 * @var string Theme's description
	 */
	public $description = 'Fixed slider theme description'; // todo
	/**
	 * @var string A url to an img
	 */
	public $preview = '';
	/**
	 * @var array Theme default options
	 */
	public $defaults = array();

	public function display( Array $related, $echo = true ) {
		$content = $this->view('fixed-slider.php');
		if ( $echo ) {
			echo $content;
		}
		return $content;
	}
}