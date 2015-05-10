<?php
/**
 * Project: x-related-posts
 * File: main.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 29/4/2015
 * Time: 9:27 μμ
 * Since: 150429
 * Copyright: 2015 Panagiotis Vagenas
 */

namespace x_related_posts {


	class main extends framework {
		public function hookTheContent( $content ) {
			global $post;
			if($this->©option->get('main_activate') && $this->isShowTime()){
				$themeSlug = $this->©themes->getActiveThemeSlug('main');
				if(!empty($themeSlug)){
					$themeClass = $this->©themes->getThemeClassFromSlug($themeSlug);
					if(!empty($themeClass)){
						$this->$themeClass->display(
							$this->©posts($post->ID)->getRelated(
								$this->©options->get('main_posts_to_display'),
								$this->©options->get('main_offset'),
								$this->©options->get('main_rate_by'),
								$this->©options->get('main_sort_by'),
								$this->©options->get('main_entropy')
							)
						);
					}
				}
			}

			return $content;
		}

		/**
		 * Checks if we are in single post page and it's time to take some action.
		 *
		 * @return bool True if global $post is set and is single post and in main query and in the loop
		 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
		 * @since 150429
		 */
		public function isShowTime() {
			global $post;

			return ! empty( $post )
			       && is_single( $post->ID )
			       && is_main_query()
			       && in_the_loop()
			       && ! $this->©post->isExcluded( $post );
		}
	}
}