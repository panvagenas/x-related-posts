<?php
/**
 * Project: x-related-posts
 * File: related.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 29/4/2015
 * Time: 8:32 μμ
 * Since: 150429
 * Copyright: 2015 Panagiotis Vagenas
 */

namespace x_related_posts;

// todo maybe remove
class related extends framework{
	public function getRelated($post){
		if($this->©post->isRated($post)){
			$relTable = $this->©db_actions->getAll($post->ID);
		} else {
			// do new rating
			$relTable = $this->©post->doRating($post);
		}
		return $relTable;
	}
}