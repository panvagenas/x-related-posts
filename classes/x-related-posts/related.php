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


class related extends framework{
	public function getRelated($post){
		if($this->©post->isRated($post)){
			// get ratings from db
		} else {
			// do new rating
			$relTable = $this->©post->doRating($post);
		}
	}
}