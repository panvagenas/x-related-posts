<?php
/**
 * Project: x-related-posts
 * File: initializer.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 29/4/2015
 * Time: 8:45 μμ
 * Since: TODO ${VERSION}
 * Copyright: 2015 Panagiotis Vagenas
 */

namespace x_related_posts;

/**
 * Class initializer
 *
 * @package x_related_posts
 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
 * @since TODO ${VERSION}
 */
class initializer extends \xd_v141226_dev\initializer {
	/**
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	public function after_setup_theme_hooks() {
		if ( $this->©option->get( 'track_visited' ) ) {
			$this->add_action( 'init', '©tracker.track' );
		}

		$this->add_action( 'widgets_init', '©initializer.register_widgets' );

		$this->add_action( 'transition_post_status', '©posts.hookTransitionPostStatus' );
		$this->add_action( 'delete_post', '©posts.hookDeletePost' );

		$this->add_filter( 'the_content', '©main.hookTheContent' );

		add_shortcode(
			$this->©string->with_underscores( $this->instance->plugin_root_ns_stub ),
			array( $this, '©shortcodes__shortcode.display' )
		);
	}

	/**
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	public function register_widgets() {
		register_widget( __NAMESPACE__ . '\widget' );
	}
}