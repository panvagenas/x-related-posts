<?php
/**
 * Project: x-related-posts
 * File: themes.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 2/5/2015
 * Time: 11:58 μμ
 * Since: TODO ${VERSION}
 * Copyright: 2015 Panagiotis Vagenas
 */

namespace x_related_posts;


class themes extends framework{
	/**
	 * @var array Default options
	 */
	public $defaults = array();
	/**
	 * @var array Default validators
	 */
	public $validators = array();
	public function getThemeNames($domain = 'main'){}
	public function setUp($defaults, $validators){
		return $this->_setUp($defaults, $validators);
	}
	protected function _setUp($defaults, $validators){}
}