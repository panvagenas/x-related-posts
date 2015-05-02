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
	public $name = '';
	public $description = '';
	public $content = '';
	public function display(){}
	public function getContent($echo = false){}
	public function whereViewsMayReside($domain = 'main'){}
}