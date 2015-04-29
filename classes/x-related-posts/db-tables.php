<?php
/**
 * Project: x-related-posts
 * File: db-tables.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 29/4/2015
 * Time: 9:09 μμ
 * Since: TODO ${VERSION}
 * Copyright: 2015 Panagiotis Vagenas
 */

namespace x_related_posts;


class db_tables extends \xd_v141226_dev\db_tables{
	/**
	 * Constructor.
	 *
	 * @param object|array $instance Required at all times.
	 *    A parent object instance, which contains the parent's `$instance`,
	 *    or a new `$instance` array.
	 *
	 * @extenders Other properties should be set by class extenders.
	 *
	 * @throws exception If invalid types are passed through arguments list.
	 */
	public function __construct( $instance ) {
		parent::__construct( $instance );

		// Other properties should be set by class extenders.

		$this->prefix = $this->prefix();
		$this->tables = array('related' => 'related');

		// TODO maybe this should be moved to install when dev is over
		$checkAgainst = $this->get( 'related' );

		if ( ! $this->©db_util->tableExists( $checkAgainst ) ) {
			$this->install_file = $this->instance->plugin_dir . DIRECTORY_SEPARATOR . 'sql/install.sql';
		}

		if ( $this->©db_util->tableExists( $checkAgainst ) ) {
			$this->upgrade_file   = $this->instance->plugin_dir . DIRECTORY_SEPARATOR . 'sql/upgrade.sql';
			$this->uninstall_file = $this->instance->plugin_dir . DIRECTORY_SEPARATOR . 'sql/uninstall.sql';
		}
	}

	/**
	 * Get plugin's DB table name
	 * @return string
	 * @throws \xd_v141226_dev\exception
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	public function tableName(){
		return $this->get('related');
	}
}