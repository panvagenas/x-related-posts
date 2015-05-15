<?php
/**
 * Project: x-related-posts
 * File: carousel.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 3/5/2015
 * Time: 8:07 πμ
 * Since: TODO ${VERSION}
 * Copyright: 2015 Panagiotis Vagenas
 */

namespace x_related_posts\themes\main;


use x_related_posts\themes\theme;

class carousel extends theme {
	/**
	 * @var string Theme's name
	 */
	public $name = 'Carousel';
	public $domain = 'main';
	/**
	 * @var string Theme's description
	 */
	public $description = 'Carousel theme description'; // todo
	/**
	 * @var string A url to an img
	 */
	public $preview = '';
	/**
	 * @var array Theme default options
	 */
	public $defaults = array(
		'thumbCaption'       => false,
		'carouselAutoTime'   => 3,
		'carouselMaxVisible' => 6,
		'carouselMinVisible' => 2,
		'carouselPauseHover' => true,
	);
	public $useCommonOptions = true;

	public function display( Array $related, $echo = true ) {
		$this->enqueueScripts();
		$content = $this->view( 'carousel.php', compact('related') );
		if ( $echo ) {
			echo $content;
		}

		return $content;
	}

	protected function enqueueScripts() {
		$scripts = array(
			$this->instance->ns_with_dashes . '--jssor.slider.mini' => array(
				'url' => $this->©url->to_plugin_dir_file( '/templates/assets/js/jssor.slider.mini.js' ),
				'ver' => $this->instance->plugin_version_with_dashes,
			)
		);
		$this->©script->register( $scripts );
		$this->©script->enqueue( array_keys( $scripts ) );
	}

	/**
	 * @param bool $echo
	 *
	 * @return string
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	public function settings( $echo = true ) {
		$content = parent::settings(false);
		$content .= $this->©view->view( $this, 'themes/carousel-settings.php', array( 'options' => $this->options ) );
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
	 * @since TODO ${VERSION}
	 */
	public function validateOptions( Array $newOptions ) {
		$validated = array(
			'thumbCaption'       => isset( $newOptions ['thumbCaption'] ),
			'carouselPauseHover' => isset( $newOptions ['carouselPauseHover'] ),
			'carouselAutoTime'   => isset( $newOptions ['carouselAutoTime'] ) && (int) $newOptions['carouselAutoTime'] >= 0
				? (int) $newOptions ['carouselAutoTime']
				: $this->defaults['carouselAutoTime'],
			'carouselMinVisible' => isset( $newOptions ['carouselMinVisible'] ) && (int) $newOptions['carouselMinVisible'] > 0
				? (int) $newOptions ['carouselMinVisible']
				: $this->defaults['carouselMinVisible'],
		);

		$validated['carouselMaxVisible'] = isset( $newOptions ['carouselMaxVisible'] ) && (int) $newOptions['carouselMaxVisible'] > $validated['carouselMinVisible']
			? (int) $newOptions ['carouselMaxVisible']
			: $validated['carouselMinVisible'];

		return array_merge( $this->validateCommonOptions( $newOptions ), $validated );
	}
}