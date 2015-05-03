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

class theme extends themes {
	/**
	 * @var string Theme's name
	 */
	public $name = '';
	/**
	 * @var string Domain (main, widget, shortcode)
	 */
	public $domain = '';
	/**
	 * @var string Theme's description
	 */
	public $description = '';
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
	/**
	 * @var bool Holds theme state
	 */
	protected $loaded = false;

	/**
	 * @param array $related
	 *
	 * @return string
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	public function display( Array $related, $echo = true ) {
		if ( $echo ) {
			echo '';
		}

		return '';
	}

	/**
	 * @param bool $echo
	 *
	 * @return string
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	public function settings( $echo = true ) {
		if ( $echo ) {
			echo '';
		}

		return '';
	}

	/**
	 * @param       $file
	 * @param array $viewData
	 * @param bool  $echo
	 *
	 * @return bool|string
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	protected function view( $file, Array $viewData = array(), $echo = false ) {
		( $viewData ) ? extract( $viewData ) : null;

		ob_start();
		require $this->viewPath($file);
		$content = ob_get_clean();
		if ( ! $echo ) {
			return $content;
		}
		echo $content;
		return true;
	}

	/**
	 * @return array
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	protected function whereViewsMayReside(  ) {
		$dirs = $this->©dirs->where_templates_may_reside();

		foreach ( $dirs as &$dir ) {
			$dir = rtrim($dir, '/') . "/{$this->domain}";
		}

		return $this->apply_filters(__FUNCTION__, $dirs);
	}

	/**
	 * @param  $file
	 *
	 * @return string
	 * @throws \xd_v141226_dev\exception
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	protected function viewPath($file){
		$this->check_arg_types( 'string:!empty', 'string:!empty', func_get_args() );

		$dir_file = ltrim( $this->©dir_file->n_seps( $file ), '/' );

		foreach ( ( $dirs = $this->whereViewsMayReside() ) as $_dir ) {
			if ( file_exists( $path = $_dir . '/' . $dir_file ) && is_readable( $path ) ) {
				return $path;
			}
		} // Absolute directory/file path.
		unset( $_dir ); // Housekeeping.
		return '';
	}

	/**
	 * @return array
	 * @throws \xd_v141226_dev\exception
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	public function getOptions(){
		$options = $this->©option->get("{$this->domain}_theme");
		return isset($options[$this->name]) ? $options[$this->name] : $this->defaults;
	}

	/**
	 * @param array $oldOptions
	 * @param array $newOptions
	 *
	 * @return array
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	public function validateOptions( Array $oldOptions, Array $newOptions ) {
		$validated = array();
		return $validated;
	}

	/**
	 * @param bool $raiseException
	 *
	 * @return bool
	 * @throws \xd_v141226_dev\exception
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	protected function isLoaded( $raiseException = false ) {
		if ( $raiseException && ! $this->loaded ) {
			throw $this->©exception(
				$this->method( __FUNCTION__ ) . '#theme_not_loaded', null,
				$this->__( 'Doing it wrong. Theme must be initialized first' ) );
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
	public function setUp( $defaults, $validators ) {
		return parent::setUp( $defaults, $validators );
	}
}