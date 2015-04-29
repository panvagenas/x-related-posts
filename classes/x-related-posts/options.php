<?php
/**
 * Project: x-related-posts
 * File: options.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 29/4/2015
 * Time: 8:15 μμ
 * Since: TODO ${VERSION}
 * Copyright: 2015 Panagiotis Vagenas
 */

namespace x_related_posts;

/**
 * Class options
 *
 * @package x_related_posts
 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
 * @since TODO ${VERSION}
 * @extends \wpdb
 */
class options extends \xd_v141226_dev\options {
	/**
	 * @param array $defaults
	 * @param array $validators
	 *
	 * @return array
	 * @throws \xd_v141226_dev\exception
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
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
			'main_rate_by'                               => 'categories',
			'post_types'                                 => array( 'post', 'page' ),
			/***********************************************
			 * Content Options
			 ***********************************************/
			'main_posts_to_display'                      => 6,
			'main_offset'                                => 0,
			'main_sort_by'                               => 'date_ascending_then_rating_descending',
			'main_entropy'                               => 0.0,
			/***********************************************
			 * Layout Options
			 ***********************************************/
			'main_position'                              => 'bottom',
			'main_content'                               => 'thumbnail-title',
			'main_crop_thumb'                            => 1,
			'main_thumb_height'                          => 200,
			'main_thumb_width'                           => 300,
			'default_thumb'                              => '',
			'main_post_ttl_size'                         => 0,
			'main_post_ttl_color'                        => '',
			'main_post_exc_size'                         => 0,
			'main_post_exc_color'                        => '',
			'read_more'                                  => '...read more',
			'main_theme'                                 => 'grid',
			/***********************************************
			 * TODO Excluded
			 ***********************************************/
		);

		$pluginValidators = array(
			/***********************************************
			 * General Options
			 ***********************************************/
			'main_activate'         => array( 'string:numeric >=' => 0, 'string:numeric <=' => 1 ),
			'track_visited'         => array( 'string:numeric >=' => 0, 'string:numeric <=' => 1 ),
			'main_title'            => array( 'string' ),
			'main_rate_by'          => array( 'string:!empty' ),
			'post_types'            => array( 'array:!empty' ),
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
			'main_post_ttl_size'    => array( 'string:numeric >=' => 1 ),
			'main_post_ttl_color'   => array( 'string' ),
			'main_post_exc_size'    => array( 'string:numeric >=' => 1 ),
			'main_post_exc_color'   => array( 'string' ),
			'read_more'             => array( 'string' ),
			'main_theme'            => array( 'string:!empty' ),

		);

		return parent::setup( array_merge( $defaults, $pluginDefaults ), array_merge( $validators, $pluginValidators ) );
	}
}