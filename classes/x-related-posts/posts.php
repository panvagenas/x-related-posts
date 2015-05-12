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
 *
 * @augments \WP_Post
 */
class posts extends \xd_v141226_dev\posts {
	/**
	 * @var \WP_Post
	 */
	protected $post;

	/**
	 * @param array|\xd_v141226_dev\framework $instance
	 * @param int|\WP_Post                    $ID
	 */
	public function __construct( $instance, $ID = null ) {
		parent::__construct( $instance );
		if ( $ID ) {
			$this->post = get_post( $ID );
		}
	}

	/**
	 * @param int|\WP_Post $post
	 *
	 * @return bool
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since 150429
	 */
	public function isExcluded( $post = null ) {
		return false; // todo change when implemented
		$postType = get_post_type( $post ? $post : $this->post );

		return $postType && in_array( $postType, $this->©option->get( 'post_types' ) );
	}

	/**
	 * True iff post id exists in pid1 col
	 *
	 * @param int|\WP_Post $post
	 *
	 * @return bool
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since 150429
	 */
	public function isRated( $post = null ) {
		if ( !$post && ! $this->isLoaded() ) {
			return false;
		}
		$pid = $post ? $post->ID : $this->ID;
		$this->©db->get_var( 'SELECT * FROM ' . $this->©db_table->tableName() . ' WHERE pid1=' . (int)$pid . ' LIMIT 1' );

		return $this->©db->num_rows > 0;
	}

	/**
	 * Get related posts for the given post
	 *
	 * @param array $relOptions
	 *
	 * @return array
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since 150429
	 */
	public function getRelated( $posts_to_display = 6, $offset = 0, $rate_by = 'c', $sort_by = 'ddrd', $entropy = 0.0 ) {
		if(!$this->isLoaded()){
			return array();
		}

		if($this->isRated()){
			$relTable = $this->©related($posts_to_display, $offset, $rate_by, $sort_by, $entropy)->getRelated($this->ID);
		} else {
			$this->doRating();
			$this->©db_actions->performCachedQueries();
			$relTable = $this->©related($posts_to_display, $offset, $rate_by, $sort_by, $entropy)->getRelated($this->ID);
		}

		return $relTable;
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
	 *
	 * @return array
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	public function getTagsSlugs($post = null){
		$pid      = $post ? $this->getPostId( $post ) : $this->ID;
		$tags = $this->getTags($post);
		$out = array();
		foreach ( $tags as $tag ) {
			$out[$tag->term_id] = $tag->slug;
		}
		return $out;
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
	 * @param null|int|\WP_Post $post
	 *
	 * @return array
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	public function doRating( $post = null ) {
		$pid = $post ? $this->getPostId( $post ) : $this->ID;
		if(!$pid){
			return array();
		}
		$related = array();
		$postCats = $this->getCategories($post);
		$postTags = $this->getTagsSlugs($post);
		if(!empty($postCats)){
			$this->©query
				->resetQuery()
				->categoriesIn(array_keys($postCats))
				->limit(500)
				->postNotIn(array($pid));
			$q = $this->©query->getWpQuery();
			if(!empty($q->posts)){
				foreach ( $q->posts as $k => $p ) {
					$related[$p->ID] = $this->©ratings->getRatings($this->©post($pid), $this->©post($p->ID));
					$related[$p->ID]['post_date'] = get_the_time('Y-m-d', $p->ID);

					$this->©db_actions->insert($pid, $p->ID, $related[$p->ID]);

					$related[$p->ID]['pid1'] = $pid;
					$related[$p->ID]['pid2'] = $p->ID;
				}
			}
		}
		if(!empty($postTags)){
			$this->©query
				->resetQuery()
				->tagsIn($postTags)
				->limit(500)
				->postNotIn(array($pid));

			$q = $this->©query->getWpQuery();
			if(!empty($q->posts)){
				foreach ( $q->posts as $k => $p ) {
					if(isset($related[$p->ID]) && is_array($related[$p->ID])){
						continue;
					}
					$related[$p->ID] = $this->©ratings->getRatings($this->©post($pid), $this->©post($p->ID));
					$related[$p->ID]['post_date'] = get_the_time('Y-m-d', $p->ID);

					$this->©db_actions->insert($pid, $p->ID, $related[$p->ID]);

					$related[$p->ID]['pid1'] = $pid;
					$related[$p->ID]['pid2'] = $p->ID;
				}
			}
		}

		return $related;
	}

	/**
	 * @param int    $excLength In words
	 * @param string $moreText
	 *
	 * @return string
	 * @throws \xd_v141226_dev\exception
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	public function getExcerpt($excLength, $moreText = ''){
		$this->isLoaded(true);

		if (!empty($this->post_excerpt)) {
			$exc = $this->post_excerpt;
		} else {
			$exc = $this->post_content;
		}

		$exc = strip_shortcodes($exc);
		$exc = str_replace(']]>', ']]&gt;', $exc);
		$exc = wp_strip_all_tags($exc);

		$tokens = explode(' ', $exc, $excLength + 1);

		if (count($tokens) > $excLength) {
			array_pop($tokens);
		}
		$moreText && array_push($tokens, ' ' . $moreText);
		return implode(' ', $tokens);
	}

	/**
	 * @param string $timeFormat
	 *
	 * @return false|string
	 * @throws \xd_v141226_dev\exception
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	public function getTheTime($timeFormat = 'Y-m-d H:i:s') {
		$this->isLoaded(true);

		return get_the_time($timeFormat, $this->ID);
	}

	/**
	 * @return bool|string
	 * @throws \xd_v141226_dev\exception
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	public function getThePermalink(){
		$this->isLoaded(true);
		return get_the_permalink($this->ID);
	}

	/**
	 * @param string $defaultThumbnail
	 * @param string $size
	 *
	 * @return array|bool|string
	 * @throws \xd_v141226_dev\exception
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	public function getThumbnail($defaultThumbnail = '', $size = 'single-post-thumbnail'){
		$this->isLoaded(true);

		if(empty($defaultThumbnail)){
			$defaultThumbnail = $this->©option->get('default_thumb');
		}

		$image_url = '';
		if($this->hasThumbnail()){
			$image_url = wp_get_attachment_image_src(get_post_thumbnail_id($this->ID), $size);
			$image_url = $image_url[0];
		} else {
			// todo maybe set from options if it should search in posts
			// todo maybe handle externals
			preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $this->post->post_content, $matches);
			if(empty($matches [1] [0])){
				$image_url = $defaultThumbnail;
			} else {
				$image_url = $matches [1] [0];
			}
		}
		return $image_url;
	}

	/**
	 * @return bool
	 * @throws \xd_v141226_dev\exception
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	public function hasThumbnail(){
		if(isset($this->static[__FUNCTION__])){
			return $this->static[__FUNCTION__];
		}

		$this->isLoaded(true);

		$this->static[__FUNCTION__] = has_post_thumbnail($this->ID);

		return $this->static[__FUNCTION__];
	}

	/**
	 * fixme this isn't working as it should.. posts don't get cached
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

	public function __isset($property)
	{
		$property = (string)$property;

		if(property_exists($this->post, $property))
			return isset($this->post->$property);

		return parent::__isset($property); // Default return value.
	}

	public function __get($property)
	{
		$property = (string)$property; // Typecasting this to a string value.

		if(property_exists($this->post, $property))
			return $this->post->$property;

		return parent::__get($property); // Default return value.
	}

	public function __call($method, $args)
	{
		$method = (string)$method;
		$args   = (array)$args;

		if(method_exists($this->post, $method)){
			return call_user_func_array(array($this->post, $method), $args);
		}
		return parent::__call($method, $args); // Default return value.
	}

	private function isLoaded($raiseException = false){
		$is = $this->post instanceof \WP_Post;
		if ( $raiseException && ! $is ) {
			throw $this->©exception(
				$this->method( __FUNCTION__ ) . '#post_obj_not_set', null,
				$this->__( 'Doing it wrong. Use $this->©posts($postId) before calling post functions.' ) );
		}
		return $is;
	}
}