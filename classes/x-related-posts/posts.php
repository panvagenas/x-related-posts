<?php
/**
 * Project: x-related-posts
 * File: posts.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 29/4/2015
 * Time: 9:30 μμ
 * Since: TODO ${VERSION}
 * Copyright: 2015 Panagiotis Vagenas
 */

namespace x_related_posts;

/**
 * Class posts
 *
 * @package x_related_posts
 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
 * @since TODO ${VERSION}
 *
 * @property db_tables                                                          $©db_tables
 * @property db_tables                                                          $©db_table
 * @method db_tables                                                            ©db_tables()
 * @method db_tables                                                            ©db_table()
 *
 * @property initializer                                                        $©initializer
 * @method initializer                                                          ©initializer()
 *
 * @property main                                                               $©main
 * @method main                                                                 ©main()
 *
 * @property menu_pages                                                         $©menu_pages
 * @property menu_pages                                                         $©menu_page
 * @method menu_pages                                                           ©menu_pages()
 * @method menu_pages                                                           ©menu_page()
 *
 * @property menu_pages\menu_page                                               $©menu_pages__menu_page
 * @method menu_pages\menu_page                                                 ©menu_pages__menu_page()
 *
 * @property options                                                            $©options
 * @property options                                                            $©option
 * @method options                                                              ©options()
 * @method options                                                              ©option()
 *
 * @property posts                                                              $©posts
 * @property posts                                                              $©post
 * @method posts                                                                ©posts()
 * @method posts                                                                ©post()
 *
 * @property ratings                                                            $©ratings
 * @method ratings                                                              ©ratings()
 *
 * @property related                                                            $©related
 * @method related                                                              ©related()
 *
 * @property tracker                                                            $©tracker
 * @method tracker                                                              ©tracker()
 *
 * @property widget                                                             $©widget
 * @method widget                                                               ©widget()
 *
 * @property shortcodes\shortcode                                               $©shortcodes__shortcode
 * @method shortcodes\shortcode                                                 ©shortcodes__shortcode()
 */
class posts extends \xd_v141226_dev\posts{
	/**
	 * @param int|\WP_Post $post
	 *
	 * @return bool
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	public function isExcluded($post){
		$postType = get_post_type($post);
		return $postType && in_array($postType, $this->©option->get('post_types'));
	}

	/**
	 * @param $post
	 *
	 * @return bool
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	public function isCached($post){
		$pid = (int)$this->getPostId($post);
		if(!$pid){
			return false;
		}
		$this->©db->get_var('SELECT * FROM ' . $this->©db_table->tableName() . ' WHERE pid1='.$pid);
		return $this->©db->num_rows > 0;
	}

	/**
	 * Get related posts for the given post
	 *
	 * @param int|\WP_Post $post
	 *
	 * @return array
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	public function getRelated($post){
		// TODO implement
		return array();
	}

	/**
	 * Returns the post id from the given obj or int.
	 * If $post is int then an additional check takes place if post exists in DB
	 *
	 * @param int|\WP_Post $post
	 *
	 * @return int
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	public function getPostId($post){
		if($post instanceof \WP_Post){
			return $post->ID;
		}
		if(is_numeric($post) && get_post_status($post)){
			return (int) $post;
		}
		return 0;
	}

	/**
	 * @param $newStatus
	 * @param $oldStatus
	 * @param $post
	 *
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	public function hookTransitionPostStatus($newStatus, $oldStatus, $post){
		// If a revision get the pid from parent
		$revision = wp_is_post_revision( $post->ID );
		if ( $revision ) {
			$pid = $revision;
		} else {
			$pid = $post->ID;
		}

		if ( $oldStatus == 'publish' && $newStatus != 'publish' ) {
			// Post is now unpublished, we should remove cache entries
			// todo
			// $this->deletePostInCache( $pid );
		} elseif ( $newStatus == 'publish' ) {
			// todo
//			$this->deletePostInCache( $pid );
//			$plugin = easyRelatedPostsPRO::get_instance();
//
//			if ( $plugin->isInExcludedPostTypes( $pid ) || $plugin->isInExcludedTaxonomies( $pid ) ) {
//				return;
//			}
//			erpPROPaths::requireOnce( erpPROPaths::$erpProRelated );
//			erpPROPaths::requireOnce( erpPROPaths::$erpPROMainOpts );
//
//			$opts = new erpPROMainOpts();
//
//			$opts->setOptions( array(
//				'queryLimit' => 1000
//			) );
//			$rel = erpProRelated::get_instance( $opts );
//
//			$rel->doRating( $pid );
		}
	}

	public function hookDeletePost($pid){
		// todo implement
		// $db->deleteAllOccurrences( $pid );
	}
}