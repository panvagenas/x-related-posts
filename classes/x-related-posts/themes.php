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


use x_related_posts\themes\theme;

class themes extends framework{
	public function __construct($instance){
		parent::__construct($instance);
		// todo remove
		//$this->init();
	}
	/**
	 * Get theme names for a specific theme domain (widget, main, shortcode)
	 *
	 * @param string $domain Default is 'main'
	 *
	 * @return array
	 * @throws \xd_v141226_dev\exception
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	public function getThemeNames($domain = 'main'){
		$this->check_arg_types('string:!empty', func_get_args());
		$names = array();
		$iterator = $this->©dir->iteration(dirname(__FILE__)."/themes/$domain");
		$iterator->setMaxDepth(1);
		foreach ( $iterator as $it ) {
			$name = $this->©string->with_underscores($this->©dir_file->abs_basename($it->getBasename()));
			$class = $this->instance->plugin_root_ns."\\themes\\$domain\\$name";
			if($it->isFile()
			   && $this->©dir_file->has_extension($it->getPathname(), '', array('php'))
			   && class_exists($class)
			){
				$c = $this->getThemeClass($domain, $name);
				if($this->©var->are_set($this->$c) && $this->$c instanceof theme){
					$names[$this->$c->getSlug()] = $this->$c->name;
				}
			}
		}
		asort($names, SORT_STRING);
		return $names;
	}

	/**
	 * @param $domain
	 * @param $name
	 *
	 * @return string
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	public function getThemeClass($domain, $name){
		$name = $this->©string->with_underscores($this->©dir_file->abs_basename($name));
		$domain = $this->©string->with_dashes($this->©dir_file->abs_basename($domain));
		return "©themes__{$domain}__{$name}";
	}

	/**
	 * @param $slug
	 *
	 * @return string
	 * @throws \xd_v141226_dev\exception
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	public function getThemeClassFromSlug($slug){
		$this->check_arg_types('string:!empty', func_get_args());
		$parts = explode('__', $slug);
		if($this->©string->are_set($parts[2], $parts[3]) && $this->©strings->are_not_empty($parts[2], $parts[3])){
			return $this->getThemeClass($parts[2], $parts[3]);
		}
		return '';
	}

	/**
	 * @param string $domain
	 *
	 * @return int|string
	 * @throws \xd_v141226_dev\exception
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	public function getActiveThemeSlug($domain = 'main'){
		$this->check_arg_types('string:!empty', func_get_args());
		$options = $this->©option->get("{$domain}_theme");
		foreach ( (array)$options as $slug => $t ) {
			if(isset($t['active']) && $t['active']){
				return $slug;
			}
		}
		return '';
	}

	/**
	 * // todo move this to plugin activate hooks
	 * @throws \xd_v141226_dev\exception
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	private function init(){
		$themeOptionsMain = $this->©option->get('main_theme');
		foreach ( $this->getThemeNames('main') as $slug => $name ) {
			if(!isset($themeOptionsMain[$slug]) || !isset($themeOptionsMain[$slug]['options']) || !isset($themeOptionsMain[$slug]['active'])){
				$themeClass = $this->getThemeClass('main', $name);
				$themeOptionsMain[$slug] = array('active' => 0);
				$themeOptionsMain[$slug]['options'] = $this->$themeClass->defaults;
			}
		}
		$activeTheme = $this->getActiveThemeSlug('main');
		if(empty($activeTheme)){
			$themeOptionsMain['selected'] = 'x_related_posts__themes__main__grid';
		} else {
			$themeOptionsMain['selected'] = $activeTheme;
		}
		$this->©option->®update(array('main_theme' => $themeOptionsMain));
	}
}