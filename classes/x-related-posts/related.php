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
class related extends framework
{
    public $posts_to_display;
    public $offset;
    public $sort_by;
    public $entropy;
    public $rate_by;

    public $defaults;

    /**
     * @param array|\xd_v141226_dev\framework $instance
     * @param int                             $posts_to_display
     * @param int                             $offset
     * @param string                          $rate_by
     * @param string                          $sort_by
     * @param float                           $entropy
     *
     * @throws \exception
     */
    public function __construct($instance, $posts_to_display = 6, $offset = 0, $rate_by = 'c', $sort_by = 'ddrd', $entropy = 0.0)
    {
        parent::__construct($instance);
        $this->defaults         = array(
          'posts_to_display' => 6,
          'offset'           => 0,
          'sort_by'          => 'ddrd',
          'entropy'          => 0.0,
          'rate_by'          => 'c',
        );
        $this->posts_to_display = (int)$posts_to_display;
        $this->offset           = (int)$offset;
        $this->sort_by          = esc_sql($sort_by);
        $this->entropy          = (float)$entropy;
        $this->rate_by          = esc_sql($rate_by);
    }

    /**
     * @param $pid
     *
     * @return mixed
     * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
     * @since  150429
     */
    public function getRelated($pid)
    {
        $sql      = $this->formSqlQuery($pid);
        $relTable = $this->©db->get_results($sql);
        return $relTable;
    }

    /**
     * @param $pid
     *
     * @return string
     * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
     * @since  150429
     */
    public function formSqlQuery($pid)
    {
        $weights = $this->getWeight($this->rate_by);

        $sql
          = "SELECT * FROM (SELECT pid1, pid2, post_date,
						(score_cats * {$weights['categories']}) AS score_cats,
						(score_tags * {$weights['tags']}) AS score_tags,
						((clicks/displayed) * {$weights['clicks']}) AS clicks,
						((((score_cats * {$weights['categories']}) + (score_tags * {$weights['tags']}) + IFNULL(((clicks/displayed) * {$weights['clicks']}), 0))) * (FLOOR((RAND() * (1000-((1.0-{$this->entropy})*1000)+1))+((1.0-{$this->entropy})*1000))/1000)) AS rating
				FROM {$this->©db_table->tableName()}
				WHERE ";

        $where = ' pid1='.(int)$pid;

        if ($this->©tracker->isEnabled() && ($visited = $this->©tracker->getVisited())) {
            $where .= ' AND pid2 NOT IN ('.implode(',', $visited).') ';
        }

        $sql .= "$where ) AS rel WHERE rel.rating > 0";

        $sortParts = str_split($this->sort_by);
        $orderBy   = '';

        for ($i = 0; $i < 4; $i += 2) {
            if (isset($sortParts[$i])) {
                if ($i > 1) {
                    $orderBy .= ',';
                }
                if ($sortParts[$i + 1] === 'd') {
                    $order = ' DESC ';
                } else {
                    $order = ' ASC ';
                }
                if ($sortParts[$i] === 'd') {
                    $orderBy .= ' post_date ';
                } else {
                    $orderBy .= ' rating ';
                }
                $orderBy .= $order;
            }
        }
        if ($orderBy) {
            $orderBy = ' ORDER BY '.$orderBy.', rel.pid2 DESC';
        }

        $limit = $this->offset > 0
          ? (" LIMIT {$this->offset},{$this->posts_to_display} ")
          : (" LIMIT {$this->posts_to_display} ");

        return $sql.$orderBy.$limit;
    }

    /**
     * @param string $spec
     * @param string $key
     *
     * @return mixed
     * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
     * @since  150429
     */
    public function getWeight($spec = 'c', $key = '')
    {
        $weights = options::$fetchByOptionsWeights[$spec];
        if ($key && isset($weights[$key])) {
            return $weights[$key];
        }
        return $weights;
    }
}
