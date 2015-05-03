<?php
/**
 * Project: x-related-posts
 * File: theme.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 2/5/2015
 * Time: 11:59 μμ
 * Since: TODO ${VERSION}
 * Copyright: 2015 Panagiotis Vagenas
 */

namespace x_related_posts\themes;


use x_related_posts\themes;

class theme extends themes{
	/**
	 * @var string Theme's name
	 */
	public $name = '';
	/**
	 * @var string Theme's description
	 */
	public $description = '';
	/**
	 * @var string A url to an img
	 */
	public $preview = '';
	/**
	 * @var bool Holds theme state
	 */
	protected $loaded = false;

	public function display(){}
	public function settings(){}
	public function getContent($echo = false){}
	public function whereViewsMayReside($domain = 'main'){}

	/**
	 * @param bool $raiseException
	 *
	 * @return bool
	 * @throws \xd_v141226_dev\exception
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	protected function isLoaded($raiseException = false){
		if($raiseException && !$this->loaded){
			throw $this->©exception(
				$this->method(__FUNCTION__).'#theme_not_loaded', null,
				$this->__('Doing it wrong. Theme must be initialized first'));
		}
		return $this->loaded;
	}

	/**
	 * @param $defaults
	 * @param $validators
	 *
	 * @return array
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	public function setUp($defaults, $validators){
		return parent::setUp($defaults, $validators);
	}
}