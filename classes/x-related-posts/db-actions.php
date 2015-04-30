<?php
/**
 * Project: x-related-posts
 * File: db-actions.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 30/4/2015
 * Time: 12:07 πμ
 * Since: TODO ${VERSION}
 * Copyright: 2015 Panagiotis Vagenas
 */

namespace x_related_posts;


class db_actions extends framework{
	/**
	 * @var array Holds data to be inserted in rel table
	 */
	protected $insert = array();
	/**
	 * @var array Holds data to be removed from rel table
	 */
	protected $delete = array();
	/**
	 * @var array Posts to increase displayed value
	 */
	protected $displayed = array();
	/**
	 * Deletes all occurrences of a post in DB
	 * @param $pid
	 *
	 * @return int
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	public function deleteAll($pid){
		return 0;
	}

	/**
	 * Finds all occurrences of given post id in related table
	 * @param $pid
	 *
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	public function getAll($pid){}

	/**
	 * Returns unique ids in pid1 field of rel table
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	public function getDistinctPostIds(){}

	/**
	 * Flushes all records from rel table in DB
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	public function truncateTable(){}

	/**
	 * Get a single row form related table
	 * @param $pid1
	 * @param $pid2
	 *
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	public function getRow($pid1, $pid2){}

	/**
	 * Inserts a single row in related table, if a record already exists it just updates it with given data
	 * @param       $pid1
	 * @param       $pid2
	 * @param array $data
	 *
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	public function insertRow($pid1, $pid2, Array $data){}

	/**
	 * Updates a record in related table or creates a new one if old is not found.
	 * If array has to be reversed, reverses it
	 * @param       $pid1
	 * @param       $pid2
	 * @param array $data
	 *
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	public function update($pid1, $pid2, Array $data){}

	/**
	 * Deletes a record from related table in DB
	 * @param $pid1
	 * @param $pid2
	 *
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	public function delete($pid1, $pid2){}

	/**
	 * Increment click value in DB for a given pair of pids
	 * @param $pid1
	 * @param $pid2
	 *
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	public function incClick($pid1, $pid2){}

	/**
	 * Increment displayed value in DB for a given pair of pids
	 * @param $pid1
	 * @param $pid2
	 *
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	public function incDisplayed($pid1, $pid2){}

	/**
	 * Reverses rel data array eg pid1<=>pid2 etc
	 * @param $data
	 *
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	protected function reverseDataArray( $data ){}

	/**
	 * Performs cached delete query
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	protected function performDeleteQuery(){}

	/**
	 * Inserts records cached in $this->insert array
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	protected function performInsertQuery(){}

	/**
	 * Performs cached add displayed queries
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	protected function performDisplayedQuery(){}

	/**
	 * Performs cached queries if any
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO ${VERSION}
	 */
	protected function performCachedQueries( ) {
		$this->performInsertQuery();
		$this->performDeleteQuery();
		$this->performDisplayedQuery();
	}

	/**
	 * Before object destructed must perform cached queries
	 */
	public function __destruct( ) {
		$this->performCachedQueries();
	}
}