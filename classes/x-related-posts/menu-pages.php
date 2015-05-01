<?php
/**
 * Project: x-related-posts
 * File: menu-pages.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 29/4/2015
 * Time: 8:54 μμ
 * Since: 150429
 * Copyright: 2015 Panagiotis Vagenas
 */

namespace x_related_posts;


class menu_pages extends \xd_v141226_dev\menu_pages{
	/**
	 * Handles WordPress® `admin_menu` hook.
	 *
	 * @extenders Should be overridden by class extenders, if a plugin has menu pages.
	 * @attaches-to WordPress® `admin_menu` hook.
	 * @hook-priority Default is fine.
	 * @return null Nothing.
	 */
	public function admin_menu() {
		$this->add_options_page( '©menu_pages__settings' );
	}

	/**
	 * Handles WordPress® `network_admin_menu` hook.
	 *
	 * @extenders Should be overridden by class extenders, if a plugin has menu pages.
	 * @attaches-to WordPress® `network_admin_menu` hook.
	 * @hook-priority Default is fine.
	 * @return null Nothing.
	 */
	public function network_admin_menu() {
		/**
		 * No global preferences so display admin menu
		 */
		$this->admin_menu();
	}
}