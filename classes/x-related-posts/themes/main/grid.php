<?php
/**
 * Project: x-related-posts
 * File: grid.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 3/5/2015
 * Time: 8:07 πμ
 * Since: TODO ${VERSION}
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

	/**
	 * @param array $related
	 * @param bool  $echo
	 *
	 * @return bool|string
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	public function display( Array $related, $echo = true ) {
		$content = $this->view( 'grid.php', compact( 'related' ) );
		if ( $echo ) {
			echo $content;
		}

		return $content;
	}

	/**
	 * @param bool $echo
	 *
	 * @return string
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	public function settings( $echo = true ) {
		$content = $this->©view->view( $this, 'themes/themes-common.php', array( 'options' => $this->getOptions() ) );
		$content .= $this->©view->view( $this, 'themes/grid-settings.php', array( 'options' => $this->getOptions() ) );
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