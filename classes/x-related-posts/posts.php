<?php
/**
 * Project: x-related-posts
 * File: posts.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 29/4/2015
 * Time: 9:30 μμ
 * Since: 150429
 * Copyright: 2015 Panagiotis Vagenas
 */

namespace x_related_posts;

/**
 * Class posts
 *
 * @package x_related_posts
 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
 * @since 150429
 * @property db_actions                                                         $©db_actions
 * @method db_actions                                                           ©db_actions()
 * @property db_tables                                                          $©db_tables
 * @property db_tables                                                          $©db_table
 * @method db_tables                                                            ©db_tables()
 * @method db_tables                                                            ©db_table()
 * @property initializer                                                        $©initializer
 * @method initializer                                                          ©initializer()
 * @property main                                                               $©main
 * @method main                                                                 ©main()
 * @property menu_pages                                                         $©menu_pages
 * @property menu_pages                                                         $©menu_page
 * @method menu_pages                                                           ©menu_pages()
 * @method menu_pages                                                           ©menu_page()
 * @property menu_pages\menu_page                                               $©menu_pages__menu_page
 * @method menu_pages\menu_page                                                 ©menu_pages__menu_page()
 * @property options                                                            $©options
 * @property options                                                            $©option
 * @method options                                                              ©options()
 * @method options                                                              ©option()
 * @property posts                                                              $©posts
 * @property posts                                                              $©post
 * @method posts                                                                ©posts()
 * @method posts                                                                ©post()
 * @property ratings                                                            $©ratings
 * @method ratings                                                              ©ratings()
 * @property related                                                            $©related
 * @method related                                                              ©related()
 * @property tracker                                                            $©tracker
 * @method tracker                                                              ©tracker()
 * @property widget                                                             $©widget
 * @method widget                                                               ©widget()
 * @property shortcodes\shortcode                                               $©shortcodes__shortcode
 * @method shortcodes\shortcode                                                 ©shortcodes__shortcode()
 */
class posts extends \xd_v141226_dev\posts {
	/**
	 * @var null|int
	 */
	public $ID = null;

	/**
	 * @param array|\xd_v141226_dev\framework $instance
	 * @param int|\WP_Post                    $ID
	 */
	public function __construct( $instance, $ID = null ) {
		parent::__construct( $instance );
		if ( $ID ) {
			$this->ID = $this->getPostId( $ID );
		}
	}

	/**
	 * @param int|\WP_Post $post
	 *
	 * @return bool
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since 150429
	 */
	public function isExcluded( $post ) {
		$postType = get_post_type( $post );

		return $postType && in_array( $postType, $this->©option->get( 'post_types' ) );
	}

	/**
	 * True iff post id exists in pid1 col
	 *
	 * @param $post
	 *
	 * @return bool
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since 150429
	 */
	public function isRated( $post ) {
		$pid = (int) $this->getPostId( $post );
		if ( ! $pid ) {
			return false;
		}
		$this->©db->get_var( 'SELECT * FROM ' . $this->©db_table->tableName() . ' WHERE pid1=' . $pid );

		return $this->©db->num_rows > 0;
	}

	/**
	 * Get related posts for the given post
	 *
	 * @param int|\WP_Post $post
	 *
	 * @return array
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since 150429
	 */
	public function getRelated( $post ) {
		// TODO implement
		return array();
	}

	/**
	 * Returns the post id from the given obj or int.
	 * If $post is int then an additional check takes place if post exists in DB
	 *
	 * @param int|\WP_Post $post
	 *
	 * @return int|null
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since 150429
	 */
	public function getPostId( $post ) {
		if ( $post instanceof \WP_Post ) {
			return $post->ID;
		}
		if ( is_numeric( $post ) && get_post_status( $post ) ) {
			return (int) $post;
		}

		return null;
	}

	/**
	 * @param null|int|\WP_Post $post
	 *
	 * @return array
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since 150429
	 */
	public function getCategories( $post = null ) {
		$pid        = $post ? $this->getPostId( $post ) : $this->ID;
		$taxNames   = (array) $this->getTaxonomiesNames( $post, true );
		$categories = array();
		foreach ( $taxNames as $taxName ) {
			$cats = get_the_terms( $pid, $taxName );
			if ( ! empty( $cats ) && ! is_wp_error( $cats ) ) {
				foreach ( $cats as $cat ) {
					$categories[ $cat->term_id ] = $cat;
				}
			}
		}

		return $categories;
	}

	/**
	 * @param null|int|\WP_Post $post
	 *
	 * @return array
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since 150429
	 */
	public function getTags( $post = null ) {
		$pid      = $post ? $this->getPostId( $post ) : $this->ID;
		$taxNames = (array) $this->getTaxonomiesNames( $post, false );
		$tags     = array();
		foreach ( $taxNames as $taxName ) {
			$tgs = get_the_terms( $pid, $taxName );
			if ( ! empty( $tgs ) && ! is_wp_error( $tgs ) ) {
				foreach ( $tgs as $tg ) {
					$tags[ $tg->term_id ] = $tg;
				}
			}
		}

		return $tags;
	}

	/**
	 * @param null|int|\WP_Post $post
	 * @param bool              $hierarchical
	 *
	 * @return array
	 * @internal param string $output
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since 150429
	 */
	public function getTaxonomiesNames( $post = null, $hierarchical = true ) {
		$pid      = $post ? $this->getPostId( $post ) : $this->ID;
		$postType = get_post_type( $pid );
		if ( ! $postType ) {
			return array();
		}

		$taxonomies = get_object_taxonomies( $postType, 'objects' );
		$taxNames   = array();
		foreach ( $taxonomies as $k => $v ) {
			if ( $hierarchical && $v->hierarchical ) {
				$taxNames[] = $v->name;
			} elseif ( ! $hierarchical && ! $v->hierarchical ) {
				$taxNames[] = $v->name;
			}
		}

		return $taxNames;
	}

	/**
	 * @param null|int|\WP_Post $post
	 *
	 * @return string
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since 150429
	 */
	public function getPostDate( $post = null ) {
		$pid = $post ? $this->getPostId( $post ) : $this->ID;

		return get_the_time( 'Y-m-d', $pid );
	}

	/**
	 * Does a new rating on a post
	 *
	 * @param null $post
	 *
	 * @return array
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	public function doRating( $post = null ) {
		// todo implement
		return array();
	}

	/**
	 * @param $newStatus
	 * @param $oldStatus
	 * @param $post
	 *
	 * @return int
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since 150429
	 */
	public function hookTransitionPostStatus( $newStatus, $oldStatus, $post ) {
		// If a revision get the pid from parent
		$revision = wp_is_post_revision( $post->ID );
		if ( $revision ) {
			$pid = $revision;
		} else {
			$pid = $post->ID;
		}

		if ( $oldStatus == 'publish' && $newStatus != 'publish' ) {
			// Post is now unpublished, we should remove cache entries
			return $this->©db_actions->deleteAll( $pid );
		}
		if ( $newStatus == 'publish' ) {
			if ( ! $this->isExcluded( $pid ) ) {
				return $this->doRating( $pid );
			}
		}

		return 0;
	}

	/**
	 * @param $pid
	 *
	 * @return int
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since 150429
	 */
	public function hookDeletePost( $pid ) {
		return $this->©db_actions->deleteAll( $pid );
	}
}