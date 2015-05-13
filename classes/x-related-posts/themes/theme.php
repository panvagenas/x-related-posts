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


use x_related_posts\framework;
use x_related_posts\posts;

class theme extends framework {
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
	 * @var bool Holds theme state
	 */
	protected $loaded = false;
	/**
	 * @var string Dynamically set. Do not overwrite
	 */
	public $slug = '';
	public $options = array();
	public $useCommonOptions = false;

	public $commonOptions = array(
		'post_ttl_size'  => 0,
		'post_exc_size'  => 0,
		'post_ttl_color' => '#ffffff',
		'post_exc_color' => '#ffffff',
		'post_exc_len'   => 10,
	);

	public function __construct( $instance ) {
		parent::__construct( $instance );
		$this->slug = $this->©string->with_underscores( get_class( $this ) );

		foreach ( $this->commonOptions as $k => &$v ) {
			$v = $this->©option->get( $k );
		}
		$this->options = $this->getOptions();
	}

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
		require $this->viewPath( $file );
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
	protected function whereViewsMayReside() {
		$dirs = $this->©dirs->where_templates_may_reside();

		foreach ( $dirs as &$dir ) {
			$dir = rtrim( $dir, '/' ) . "/{$this->domain}";
		}

		return $this->apply_filters( __FUNCTION__, $dirs );
	}

	/**
	 * @param  $file
	 *
	 * @return string
	 * @throws \xd_v141226_dev\exception
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	protected function viewPath( $file ) {
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
	public function getOptions() {
		$options = $this->©option->get( "{$this->domain}_theme_options" );

		$opts = $this->©vars->are_set( $options[ $this->slug ], $options[ $this->slug ] )
			? $options[ $this->slug ]
			: $this->defaults;

		return $this->useCommonOptions ? array_merge($this->commonOptions, $opts) : $opts;
	}

	/**
	 * @param array $newOptions
	 *
	 * @return array
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	public function validateOptions( Array $newOptions ) {
		return $newOptions;
	}

	/**
	 * @param $newOptions
	 *
	 * @return array
	 * @throws \xd_v141226_dev\exception
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	public function validateCommonOptions( $newOptions ) {
		$validated = array(
			'post_ttl_size'  => isset( $newOptions ['post_ttl_size'] ) && $newOptions ['post_ttl_size'] >= 0
				? (int) $newOptions ['post_ttl_size']
				: $this->©option->get( 'post_ttl_size' ),
			'post_exc_size'  => isset( $newOptions ['post_exc_size'] ) && $newOptions ['post_exc_size'] >= 0
				? (int) esc_sql( $newOptions ['post_exc_size'] )
				: $this->©option->get( 'post_exc_size' ),
			'post_ttl_color' => isset( $newOptions['post_ttl_color'] ) && ! empty( $newOptions['post_ttl_color'] )
				? esc_sql( $newOptions['post_ttl_color'] )
				: $this->©option->get( 'post_ttl_color' ),
			'post_exc_color' => isset( $newOptions['post_exc_color'] ) && ! empty( $newOptions['post_exc_color'] )
				? esc_sql( $newOptions['post_exc_color'] )
				: $this->©option->get( 'post_exc_color' ),
			'post_exc_len'  => isset( $newOptions ['post_exc_len'] ) && $newOptions ['post_exc_len'] >= 0
				? (int) esc_sql( $newOptions ['post_exc_len'] )
				: $this->©option->get( 'post_exc_len' ),
		);

		return $validated;
	}

	/**
	 * @param posts $post
	 *
	 * @return string
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	public function getPostTitleFormatted(posts $post){
		$title = wp_strip_all_tags($post->post_title);
		if(!$this->useCommonOptions){
			return $title;
		}

		$size = ((int)$this->options['post_ttl_size']) > 0 ? (int)$this->options['post_ttl_size'] : 0;
		$color = strtolower($this->options['post_ttl_color']) != '#ffffff' ? $this->options['post_ttl_color'] : 0;
		return $this->getFormattedText($title, $size, $color);
	}

	/**
	 * @param posts $post
	 *
	 * @return string
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	public function getPostExcFormatted(posts $post){
		$exc = $post->getExcerpt($this->©option->get('post_exc_len'), $this->©option->get('read_more'));
		if(!$this->useCommonOptions){
			return $exc;
		}

		$size = ((int)$this->options['post_exc_size']) > 0 ? (int)$this->options['post_exc_size'] : 0;
		$color = strtolower($this->options['post_exc_color']) != '#ffffff' ? $this->options['post_exc_color'] : 0;
		return $this->getFormattedText($exc, $size, $color);
	}

	/**
	 * @param        $text
	 * @param int    $size
	 * @param string $color
	 * @param string $sizeUnit
	 *
	 * @return string
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	public function getFormattedText($text, $size = 0, $color = '', $sizeUnit = 'px'){
		$out = '';
		if($size > 0){
			$out .='font-size: ' . $size . $sizeUnit . ';';
		}
		if($color){
			$out .= ' color: ' . $color . ';';
		}
		return empty($out) ? $text : ('<span style="' . $out . '">' . $text . '</span>');
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
	 * @param $field_value
	 * @param $field
	 *
	 * @return string
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	public function fieldMarkup( $field_value, $field ) {
		$field['name'] = "[{$this->domain}_theme_options][{$this->slug}]{$field['name']}";

		return $this->©menu_pages__settings->option_form_fields->markup( $field_value, $field );
	}

	/**
	 * @return array|string
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	public function getSlug() {
		return $this->slug;
	}
}