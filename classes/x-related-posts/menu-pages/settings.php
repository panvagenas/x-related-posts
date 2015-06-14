<?php
/**
 * Project: x-related-posts
 * File: main-page.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 2/5/2015
 * Time: 8:55 πμ
 * Since: 150429
 * Copyright: 2015 Panagiotis Vagenas
 */

namespace x_related_posts\menu_pages;


class settings extends menu_page{
	public $updates_options = true;

	/**
	 * Constructor.
	 *
	 * @param object|array $instance Required at all times.
	 *    A parent object instance, which contains the parent's ``$instance``,
	 *    or a new ``$instance`` array.
	 */
	public function __construct( $instance ) {
		parent::__construct( $instance );

		$s = $this->©menu_page->is_plugin_page('x_related_posts--settings');

		$this->heading_title           = $this->__( 'Main settings' );
		$this->sub_heading_description = sprintf( $this->__( '%1$s settings ' ), esc_html( $this->instance->plugin_name ) );
	}

	/**
	 * Displays HTML markup producing content panels for this menu page.
	 */
	public function display_content_panels() {
		$this->add_content_panel( $this->©menu_pages__panels__general( $this ), true );
		$this->add_content_panel( $this->©menu_pages__panels__main_settings( $this ), true );
		$this->add_content_panel( $this->©menu_pages__panels__theme( $this ), true );
		$this->add_content_panel( $this->©menu_pages__panels__excluded( $this ), true );

		$this->display_content_panels_in_order();
	}

	/**
	 * Displays HTML markup producing sidebar panels for this menu page.
	 *
	 * @extenders Can be overridden by class extenders (i.e. by each menu page),
	 *    so that custom sidebar panels can be displayed by this routine.
	 */
	public function display_sidebar_panels() {
		parent::display_sidebar_panels();
	}

	/**
	 * Displays HTML markup for notices, for this menu page.

	 */
	public function display_notices() {
	}
}
