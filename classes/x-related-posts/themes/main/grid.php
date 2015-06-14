<?php
/**
 * Project: x-related-posts
 * File: grid.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 3/5/2015
 * Time: 8:07 πμ
 * Since: 150429
 * Copyright: 2015 Panagiotis Vagenas
 */

namespace x_related_posts\themes\main;


use x_related_posts\themes\theme;

class grid extends theme {
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
	public $defaults = array(
		'numOfPostsPerRow' => 3,
		'thumbCaption'     => false,
		'backgroundColor'  => '#ffffff',
		'borderColor'      => '#ffffff',
		'borderRadius'     => 0,
		'borderWeight'     => 0,
	);
	public $useCommonOptions = true;
	public $commonOptions = array(
		'post_ttl_size'  => 0,
		'post_exc_size'  => 0,
		'post_ttl_color' => '#ffffff',
		'post_exc_color' => '#ffffff',
		'post_exc_len'   => 10,
		'content'        => 'pt',
		'crop_thumb'     => 1,
		'thumb_height'   => 200,
		'thumb_width'    => 300,
	);

	/**
	 * @param array $related
	 * @param bool  $echo
	 *
	 * @return bool|string
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since 150429
	 */
	public function display( Array $related, $echo = true ) {
		$this->enqueueScripts();

		switch ( $this->options['numOfPostsPerRow'] ) {
			default:
			case '1':
			case '2':
			case '3':
			case '4':
			case '6':
				$colSpan = 12 / (int) $this->options['numOfPostsPerRow'];
				break;
			case '5':
			case '10':
				$colSpan = 10 / (int) $this->options['numOfPostsPerRow'];
				break;
			case '7':
				$colSpan = 14 / (int) $this->options['numOfPostsPerRow'];
				break;
			case '8':
				$colSpan = 16 / (int) $this->options['numOfPostsPerRow'];
				break;
			case '9':
				$colSpan = 18 / (int) $this->options['numOfPostsPerRow'];
				break;
		}
		$content = $this->view( 'grid.php', array(
			'related'      => $related,
			'relPostClass' => 'xrp-col-' . $colSpan,
		) );
		if ( $echo ) {
			echo $content;
		}

		return $content;
	}

	protected function enqueueScripts() {
		switch ( $this->options['numOfPostsPerRow'] ) {
			default:
			case '1':
			case '2':
			case '3':
			case '4':
			case '6':
				$cssFile = 'grid-12.min.css';
				break;
			case '5':
			case '10':
				$cssFile = 'grid-10.min.css';
				break;
			case '7':
				$cssFile = 'grid-14.min.css';
				break;
			case '8':
				$cssFile = 'grid-16.min.css';
				break;
			case '9':
				$cssFile = 'grid-18.min.css';
				break;
		}
		$styles = array(
			$this->instance->ns_with_dashes . '--'.$cssFile => array(
				'url' => $this->©url->to_plugin_dir_file( '/templates/assets/css/' . $cssFile ),
				'ver' => $this->instance->plugin_version_with_dashes,
			)
		);
		$this->©styles->register( $styles );
		$this->©styles->enqueue( array_keys( $styles ) );
	}

	/**
	 * @param bool $echo
	 *
	 * @return string
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since 150429
	 */
	public function settings( $echo = true ) {
		$content = parent::settings(false);
		$content .= $this->©view->view( $this, 'themes/grid-settings.php', array( 'options' => $this->options ) );
		if ( $echo ) {
			echo $content;
		}

		return $content;
	}

	/**
	 * @param array $newOptions
	 *
	 * @return array
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since 150429
	 */
	public function validateOptions( Array $newOptions ) {
		$validated = array(
			'numOfPostsPerRow' => isset( $newOptions ['numOfPostsPerRow'] )
				? (int) $newOptions ['numOfPostsPerRow']
				: $this->defaults['numOfPostsPerRow'],
			'thumbCaption'     => isset( $newOptions ['thumbCaption'] ),
			'backgroundColor'  => isset( $newOptions['backgroundColor'] ) ?
				esc_sql( $newOptions['backgroundColor'] )
				: $this->defaults['backgroundColor'],
			'borderColor'      => isset( $newOptions['borderColor'] )
				? esc_sql( $newOptions['borderColor'] )
				: $this->defaults['borderColor'],
			'borderRadius'     => isset( $newOptions ['borderRadius'] ) && (int) $newOptions['borderRadius'] >= 0
				? (int) $newOptions ['borderRadius']
				: $this->defaults['borderRadius'],
			'borderWeight'     => isset( $newOptions ['borderWeight'] ) && (int) $newOptions['borderWeight'] >= 0
				? (int) $newOptions ['borderWeight']
				: $this->defaults['borderWeight'],
		);

		return array_merge( $this->validateCommonOptions( $newOptions ), $validated );
	}
}
