<?php
/**
 * Project: x-related-posts
 * File: db-actions.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 30/4/2015
 * Time: 12:07 πμ
 * Since: 150429
 * Copyright: 2015 Panagiotis Vagenas
 */

namespace x_related_posts;


class db_actions extends framework {
	/**
	 * @var array Holds data to be inserted in rel table
	 */
	protected $insert = array();
	/**
	 * @var array Holds data to be updated in rel table
	 */
	protected $update = array();
	/**
	 * @var array Holds data to be removed from rel table
	 */
	protected $delete = array();
	/**
	 * @var array Posts to increase displayed value
	 */
	protected $displayed = array();

	public function __construct($instance){
		parent::__construct($instance);
		// todo calling these to instatiate the classes
		$this->©db->prefix;
		$this->©db_table->tableName();
	}

	/**
	 * Deletes all occurrences of a post in DB
	 *
	 * @param $pid
	 *
	 * @return int
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since 150429
	 */
	public function deleteAll( $pid ) {
		$res = (int) $this->©db->delete( $this->©db_table->tableName(), array( 'pid1' => $pid ) );
		$res += (int) $this->©db->delete( $this->©db_table->tableName(), array( 'pid2' => $pid ) );

		return $res;
	}

	/**
	 * Finds all occurrences of given post id in related table.
	 * Searches only in pid1 col
	 *
	 * @param $pid
	 *
	 * @return bool|mixed
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since 150429
	 */
	public function getAll( $pid ) {
		$pid = (int) $pid;
		if ( ! $pid ) {
			return false;
		}

		return $this->©db->get_results( 'SELECT * FROM ' . $this->©db_table->tableName() . ' WHERE pid1=' . $pid );
	}

	/**
	 * Returns unique ids in pid1 field of rel table
	 *
	 * @return bool|mixed
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since 150429
	 */
	public function getDistinctPostIds() {
		return $this->©db->get_results( 'SELECT DISTINCT(pid1) AS pid FROM ' . $this->©db_table->tableName() );
	}

	/**
	 * Flushes all records from rel table in DB
	 *
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since 150429
	 */
	public function truncateTable() {
		return $this->©db->query( 'DELETE FROM ' . $this->©db_table->tableName() );
	}

	/**
	 * Get a single row from related table
	 *
	 * @param $pid1
	 * @param $pid2
	 *
	 * @return bool|mixed
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since 150429
	 */
	public function getRow( $pid1, $pid2 ) {
		$sql = $this->©db->prepare(
			'SELECT * FROM '
			. $this->©db_table->tableName()
			. ' WHERE pid1=%d AND pid2=%d', $pid1, $pid2 );

		return $this->©db->get_row( $sql );
	}

	/**
	 * Inserts a single row in related table, if a record already exists it just updates it with given data
	 *
	 * @param       $pid1
	 * @param       $pid2
	 * @param array $data
	 *
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since 150429
	 */
	public function insert( $pid1, $pid2, Array $data ) {
		$pid1 = (int) $pid1;
		$pid2 = (int) $pid2;
		$data = (array) $data;
		if ( $pid1 && $pid2 && ! empty( $data ) && isset( $data['post_date'] ) && ! empty( $data['post_date'] ) ) {
			if(isset($this->insert[ $pid1 ][ $pid2 ])){
				$this->insert[ $pid1 ][ $pid2 ] = array_merge($this->insert[ $pid1 ][ $pid2 ], $data);
			} else {
				$this->insert[ $pid1 ][ $pid2 ] = $data;
			}

		}
	}

	/**
	 * @param $pid1
	 * @param $pid2
	 *
	 * @return bool
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since 150429
	 */
	public function exists( $pid1, $pid2 ) {
		$res = $this->getRow( $pid1, $pid2 );

		return ! empty( $res );
	}

	/**
	 * Updates a record in related table or creates a new one if old is not found.
	 * If array has to be reversed, reverses it
	 *
	 * @param       $pid1
	 * @param       $pid2
	 * @param array $data
	 *
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since 150429
	 */
	public function update( $pid1, $pid2, Array $data ) {
		$pid1 = (int) $pid1;
		$pid2 = (int) $pid2;
		$data = (array) $data;
		if ( $pid1 && $pid2 && ! empty( $data ) ) {
			if(isset($this->update[ $pid1 ][ $pid2 ])){
				$this->update[ $pid1 ][ $pid2 ] = array_merge($this->update[ $pid1 ][ $pid2 ], $data);
			} else {
				$this->update[ $pid1 ][ $pid2 ] = $data;
			}
		}
	}

	/**
	 * Deletes a record from related table in DB
	 *
	 * @param $pid1
	 * @param $pid2
	 *
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since 150429
	 */
	public function delete( $pid1, $pid2 ) {
		$pid1 = (int) $pid1;
		$pid2 = (int) $pid2;
		if ( $pid1 && $pid2 ) {
			$this->delete[] = compact( 'pid1', 'pid2' );
		}
	}

	/**
	 * Increment click value in DB for a given pair of pids
	 *
	 * @param $pid1
	 * @param $pid2
	 *
	 * @return int
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since 150429
	 */
	public function incrementClick( $pid1, $pid2 ) {
		$record = $this->getRow( $pid1, $pid2 );
		if ( empty( $record ) ) {
			return 0;
		}
		$clicks = (int) $record->clicks + 1;
		$this->update( $pid1, $pid2, array( 'clicks' => $clicks ) );

		return $clicks;
	}

	/**
	 * Increment displayed value in DB for a given pair of pids
	 *
	 * @param           $pid1
	 * @param int|array $pid2
	 *
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since 150429
	 */
	public function incrementDisplayed( $pid1, $pid2 ) {
		if ( is_array( $pid2 ) ) {
			foreach ( $pid2 as $key => $value ) {
				$this->incrementDisplayed( $pid1, $value );
			}
		} else {
			if ( is_array( $this->displayed [ $pid1 ] ) ) {
				$this->displayed [ $pid1 ] = array();
			}
			if ( isset( $this->displayed[ $pid1 ][ $pid2 ] ) ) {
				$this->displayed[ $pid1 ][ $pid2 ] ++;
			} else {
				$this->displayed[ $pid1 ][ $pid2 ] = 1;
			}
		}
	}

	/**
	 * Performs cached delete query
	 *
	 * @return false|int
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since 150429
	 */
	protected function performDeleteQuery() {
		$deleted = 0;
		if ( ! empty( $this->delete ) ) {
			$where = '';
			foreach ( $this->delete as $k => $v ) {
				$where .= ' (pid1 =' . ( (int) $v['pid1'] ) . ' AND pid2=' . ( (int) $v['pid2'] ) . ') OR';
				unset($this->delete[$k]);
			}
			$where = rtrim( $where, ' OR' );
			if ( ! empty( $where ) ) {
				$deleted = $this->©db->query( 'DELETE FROM ' . $this->©db_table->tableName() . ' WHERE ' . $where );
			}
		}

		return $deleted;
	}

	/**
	 * Inserts records cached in $this->insert array
	 * @return false|int
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since 150429
	 */
	protected function performInsertQuery() {
		$inserted = 0;
		if ( ! empty( $this->insert ) ) {
			$values = '';
			foreach ( $this->insert as $pid1 => $v ) {
				foreach ( $v as $pid2 => $data ) {
					if ( $this->exists( $pid1, $pid2 ) ) {
						$this->update($pid1, $pid2, $data);
					} else {
						$values .= $this->©db->prepare(
							'(%d, %d, %s, %f, %f, %d, %d, %s),',
							$pid1,
							$pid2,
							$data['post_date'],
							( isset( $data['score_cats'] ) ? $data['score_cats'] : 0 ),
							( isset( $data['score_tags'] ) ? $data['score_tags'] : 0 ),
							( isset( $data['displayed'] ) ? $data['displayed'] : 0 ),
							( isset( $data['clicks'] ) ? $data['clicks'] : 0 ),
							( isset( $data['update_time'] ) ? $data['update_time'] : date( 'Y-m-d H:i:s' ) )
						);
					}
					unset($this->insert[$pid1][$pid2]);
				}
			}
			$values = rtrim( $values, ',' );
			if ( ! empty( $values ) ) {
				$inserted = $this->©db->query(
					'INSERT INTO '
					. $this->©db_table->tableName()
					. ' (pid1, pid2, post_date, score_cats, score_tags, displayed, clicks, update_time) VALUES '
					. $values
				);
			}
		}

		return $inserted;
	}

	/**
	 * Performs cached add displayed queries
	 *
	 * @return int
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since 150429
	 */
	protected function performDisplayedQuery() {
		$incremented = 0;
		if(!empty($this->displayed)){
			foreach ( $this->displayed as $pid1 => $v ) {
				foreach ( $v as $pid2 => $value ) {
					$this->update($pid1, $pid2, array('displayed' => 'displayed+'.((int)$value)));
					$incremented++;
					unset($this->displayed[$pid1][$pid2]);
				}
			}
		}
		return $incremented;
	}

	/**
	 * Performs cached update queries
	 *
	 * @return false|int
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since 150429
	 */
	protected function performUpdateQuery() {
		$updated = 0;
		$toInsert = false;
		if ( ! empty( $this->update ) ) {
			$sql = '';
			$pre = ' UPDATE ' . $this->©db_table->tableName() . ' SET ';
			foreach ( $this->update as $pid1 => $v ) {
				foreach ( $v as $pid2 => $data ) {
					if ( $this->exists( $pid1, $pid2 ) ) {
						$set = '';
						if(isset($data['post_date'])){
							$set .= 'post_date="'.(string)$data['post_date'].'",';
						}
						if(isset($data['score_cats'])){
							$set .= 'score_cats='.(float)$data['score_cats'].',';
						}
						if(isset($data['score_tags'])){
							$set .= 'score_tags='.(float)$data['score_tags'].',';
						}
						if(isset($data['displayed'])){
							$set .= 'displayed='.(int)$data['displayed'].',';
						}
						if(isset($data['clicks'])){
							$set .= 'clicks='.(int)$data['clicks'].',';
						}
						if(isset($data['update_time'])){
							$set .= 'update_time="'.(string)$data['update_time'].'",';
						}

						if(!empty($set)){
							$set = rtrim($set, ',');
							$sql .= $pre.$set.' WHERE pid1='.(int)$pid1.' AND pid2='.(int)$pid2.';';
						}
					} else {
						$this->insert($pid1, $pid2, $data);
						$toInsert = true;
					}
					unset($this->update[$pid1][$pid2]);
				}
			}

			if ( ! empty( $sql ) ) {
				$updated = $this->©db->query($sql);
			}
			if($toInsert){
				$updated += $this->performInsertQuery();
			}
		}

		return $updated;
	}

	/**
	 * Performs cached queries if any
	 *
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since 150429
	 */
	public function performCachedQueries() {
		$this->performDeleteQuery();
		$this->performInsertQuery();
		$this->performDisplayedQuery();
		$this->performUpdateQuery();
	}

	/**
	 * Before object destructed must perform cached queries
	 */
	public function __destruct() {
		$this->performCachedQueries();
	}
}