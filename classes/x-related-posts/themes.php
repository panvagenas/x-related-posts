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
	/**
	 * @var array Default options
	 */
	public $defaults = array();
	/**
	 * @var array Default validators
	 */
	public $validators = array();

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
				$c = "©themes__main__{$name}";
				if($this->$c instanceof theme){
					$names[] = $this->$c->name;
				}
			}
		}
		sort($names, SORT_STRING);
		return $names;
	}

	/**
	 * @param $defaults
	 * @param $validators
	 *
	 * @return array
	 *
	 * @extend
	 *
	 * @throws \xd_v141226_dev\exception
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	public function setUp($defaults, $validators){
		return $this->_setUp($defaults, $validators);
	}

	/**
	 * @param $defaults
	 * @param $validators
	 *
	 * @return array
	 * @throws \xd_v141226_dev\exception
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	protected function _setUp($defaults, $validators){
		$options = array();
		if(!is_array($options)){
			throw $this->©exception(
				$this->method(__FUNCTION__).'#invalid_options', $options,
				$this->__('Options must be an array'));
		}
		return $options;
	}
}