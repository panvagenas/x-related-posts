<?php
/**
 * Project: x-related-posts
 * File: ratings.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 29/4/2015
 * Time: 8:38 μμ
 * Since: 150429
 * Copyright: 2015 Panagiotis Vagenas
 */

namespace x_related_posts;


class ratings {
	/**
	 * Categories weight
	 *
	 * @since 150429
	 * @var float
	 */
	public $catWeight = 0;
	/**
	 * Tags weight
	 *
	 * @since 150429
	 * @var float
	 */
	public $tagWeight = 0;
	/**
	 * Clicks per displayed weight
	 *
	 * @since 150429
	 * @var float
	 */
	public $clickWeight = 0;
	/**
	 * @var int
	 */
	public $entropy = 0;

	public function totalRating(posts $hostPost, posts $visPost, $catWeight = false, $tagWeight = false, $clickWeight = false ) {
		$catWeight   = (float) ( $catWeight ? $catWeight : $this->catWeight );
		$tagWeight   = (float) ( $tagWeight ? $tagWeight : $this->tagWeight );
		$clickWeight = (float) ( $clickWeight ? $clickWeight : $this->clickWeight );
	}

	protected function rateOnCats(posts $post){}
	protected function rateOnTags(posts $post){}
	protected function rateOnClicks(posts $post){}
}