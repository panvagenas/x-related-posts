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
	public $posts_to_display;
	public $offset;
	public $sort_by;
	public $entropy;

	public $defaults;

	public static $dt_asc_rt_desc = 'date_ascending_then_rating_descending';

	public function __construct($instance, $posts_to_display = 6, $offset = 0, $sort_by = 'date_ascending_then_rating_descending', $entropy = 0.0){
		parent::__construct($instance);
		$this->defaults = array(
			'posts_to_display' => 6,
			'offset' => 0,
			'sort_by' => self::$dt_asc_rt_desc,
			'entropy' => 0.0,
		);
		$this->posts_to_display = $posts_to_display;
		$this->offset = $offset;
		$this->sort_by = $sort_by;
		$this->entropy = $entropy;
	}
	public function processRelTable($relTable = array(), $relOptions = array()){
		return $relTable;
	}

	public function getRelated($pid, $relOptions = array()){
		$relTable = $this->©db_actions->getAll($pid);
		return $relTable;
	}

	public function formSqlQuery($relOptions){
		$sql = '';
		return $sql;
	}
}