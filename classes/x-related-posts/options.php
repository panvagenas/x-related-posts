<?php
/**
 * Project: x-related-posts
 * File: options.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 29/4/2015
 * Time: 8:15 μμ
 * Since: 150429
 * Copyright: 2015 Panagiotis Vagenas
 */

namespace x_related_posts;

/**
 * Class options
 *
 * @package x_related_posts
 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
 * @since 150429
 * @property themes $©themes
 */
class options extends \xd_v141226_dev\options {
	public static $fetchByOptions = array(
		'c'  => 'Categories',
		't'  => 'Tags',
		'ct' => 'Categories first, then tags',
		'tc' => 'Tags first, then categories'
	);
	public static $fetchByOptionsWeights = array(
		'c'  => array( 'clicks' => 0.15, 'categories' => 0.85, 'tags' => 0.0 ),
		't'  => array( 'clicks' => 0.15, 'categories' => 0.0, 'tags' => 0.85 ),
		'ct' => array( 'clicks' => 0.15, 'categories' => 0.60, 'tags' => 0.25 ),
		'tc' => array( 'clicks' => 0.15, 'categories' => 0.25, 'tags' => 0.60 )
	);
	public static $contentPositioningOptions = array(
		't'   => 'Title',
		'p'   => 'Thumbnail',
		'e'   => 'Excerpt',
		'te'  => 'Title, excerpt',
		'tp'  => 'Title, thumbnail',
		'pt'  => 'Thumbnail, title',
		'pte' => 'Thumbnail, title, excerpt',
		'tpe' => 'Title, thumbnail, excerpt',
		'tep' => 'Title, excerpt, thumbnail'
	);
	public static $sortOptions = array(
		'dd'   => 'Date descending',
		'da'   => 'Date ascending',
		'rd'   => 'Rating descending',
		'ra'   => 'Rating ascending',
		'ddrd' => 'Date descending then Rating descending',
		'dard' => 'Date ascending then Rating descending',
		'ddra' => 'Date descending then Rating ascending',
		'dara' => 'Date ascending then Rating ascending',
		'rddd' => 'Rating descending then Date descending',
		'radd' => 'Rating ascending then Date descending',
		'rdda' => 'Rating descending then Date ascending',
		'rada' => 'Rating ascending then Date ascending',
	);
	public static $entropy = array(
		'0.0'    => 'None',
		'0.0001' => 'Just a little',
		'0.002'  => 'Mix result',
		'0.3'    => 'Almost random',
		'1.0'    => 'Random',
	);

	/**
	 * @param array $defaults
	 * @param array $validators
	 *
	 * @return array
	 * @throws \xd_v141226_dev\exception
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since 150429
	 */
	public function setup( $defaults, $validators ) {
		$pluginDefaults = array(
			'encryption.key'                             => 'a6s5df4KJLdsf5456dfFDS654ds',
			'support.url'                                => 'example.com',
			'styles.front_side.theme'                    => 'yeti',
			'crons.config'                               => array(),
			'menu_pages.theme'                           => 'yeti',
			'captchas.google.public_key'                 => '6LeCANsSAAAAAIIrlB3FrXe42mr0OSSZpT0pkpFK',
			'captchas.google.private_key'                => '6LeCANsSAAAAAGBXMIKAirv6G4PmaGa-ORxdD-oZ',
			'url_shortener.default_built_in_api'         => 'goo_gl',
			'url_shortener.custom_url_api'               => '',
			'url_shortener.api_keys.goo_gl'              => '',
			'menu_pages.panels.email_updates.action_url' => '',
			'menu_pages.panels.community_forum.feed_url' => '',
			'menu_pages.panels.news_kb.feed_url'         => '',
			'menu_pages.panels.videos.yt_playlist'       => '',
			/***********************************************
			 * General Options
			 ***********************************************/
			'main_activate'                              => 1,
			'track_visited'                              => 0,
			'main_title'                                 => 'Related Posts',
			'main_rate_by'                               => 'c',
			/***********************************************
			 * Content Options
			 ***********************************************/
			'main_posts_to_display'                      => 6,
			'main_offset'                                => 0,
			'main_sort_by'                               => 'dard',
			'main_entropy'                               => 0.0,
			/***********************************************
			 * Layout Options
			 ***********************************************/
			'main_position'                              => 'bottom',
			'main_content'                               => 'tt',
			'main_crop_thumb'                            => 1,
			'main_thumb_height'                          => 200,
			'main_thumb_width'                           => 300,
			'default_thumb'                              => '',
			'read_more'                                  => '...read more',
			/***********************************************
			 * themes
			 ***********************************************/
			'post_ttl_size'                              => 0,
			'post_ttl_color'                             => '#ffffff',
			'post_exc_size'                              => 0,
			'post_exc_color'                             => '#ffffff',
			'main_theme'                                 => 'x_related_posts__themes__main__grid',
			'main_theme_options'                         => array(),
			/***********************************************
			 * TODO Included
			 ***********************************************/
			'post_types'                                 => array( 'post', 'page' ),
		);

		$pluginValidators = array(
			/***********************************************
			 * General Options
			 ***********************************************/
			'main_activate'         => array( 'string:numeric >=' => 0, 'string:numeric <=' => 1 ),
			'track_visited'         => array( 'string:numeric >=' => 0, 'string:numeric <=' => 1 ),
			'main_title'            => array( 'string' ),
			'main_rate_by'          => array( 'string:!empty' ),
			/***********************************************
			 * Content Options
			 ***********************************************/
			'main_posts_to_display' => array( 'string:numeric >=' => 1 ),
			'main_offset'           => array( 'string:numeric >=' => 0 ),
			'main_sort_by'          => array( 'string:!empty' ),
			'main_entropy'          => array( 'string:numeric >=' => 0 ),
			/***********************************************
			 * Layout Options
			 ***********************************************/
			'main_position'         => array( 'string:!empty' ),
			'main_content'          => array( 'string:!empty' ),
			'main_crop_thumb'       => array( 'string:numeric >=' => 0, 'string:numeric <=' => 1 ),
			'main_thumb_height'     => array( 'string:numeric >=' => 0 ),
			'main_thumb_width'      => array( 'string:numeric >=' => 0 ),
			'default_thumb'         => array( 'string' ),
			'read_more'             => array( 'string' ),
			/***********************************************
			 * Themes
			 ***********************************************/
			'post_ttl_size'         => array( 'string:numeric >=' => 1 ),
			'post_ttl_color'        => array( 'string' ),
			'post_exc_size'         => array( 'string:numeric >=' => 1 ),
			'post_exc_color'        => array( 'string' ),
			'main_theme'            => array( 'string:!empty' ),
			'main_theme_options'    => array( 'array:!empty' ),
			/***********************************************
			 * TODO Included
			 ***********************************************/
			'post_types'            => array( 'array:!empty' ),

		);

		return parent::setup( array_merge( $defaults, $pluginDefaults ), array_merge( $validators, $pluginValidators ) );
	}

	public function update( $new_options = array() ) {
		$bools = array( 'main_activate', 'track_visited', 'main_crop_thumb' );
		foreach ( $bools as $v ) {
			if ( ! isset( $new_options[ $v ] ) ) {
				$new_options[ $v ] = 0;
			}
		}

		// prevent early execution
		if ( $this->©var->are_set( $this->©themes ) ) {
			foreach ( $this->©themes->domains as $domain ) {
				$domainKey       = "{$domain}_theme";
				$themeOptionsKey = "{$domainKey}_options";
				if ( $this->©vars->are_set( $new_options[ $domainKey ], $new_options[ $themeOptionsKey ] ) ) {
					$themeClass = $this->©themes->getThemeClassFromSlug( $new_options[ $domainKey ] );
					if ( ! empty( $themeClass ) ) {
						$themeOptions = $this->$themeClass->validateOptions( $new_options[ $themeOptionsKey ][ $this->$themeClass->slug ] );

						$new_options[ $themeOptionsKey ][ $this->$themeClass->slug ] = $themeOptions;
					}

					$new_options[ $themeOptionsKey ] = array_merge( $this->options[ $themeOptionsKey ], $new_options[ $themeOptionsKey ] );
				}
			}
		}

		parent::update( $new_options );
	}
}