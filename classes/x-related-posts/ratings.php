<?php
/**
 * Project: x-related-posts
 * File: ratings.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 29/4/2015
 * Time: 8:38 μμ
 * Since: 150429
 * Copyright: 2015 Panagiotis Vagenas
 */

namespace x_related_posts;

class ratings extends framework
{
    /**
     * Categories weight
     *
     * @since 150429
     * @var float
     */
    public $catWeight = 0;
    /**
     * Tags weight
     *
     * @since 150429
     * @var float
     */
    public $tagWeight = 0;
    /**
     * Clicks per displayed weight
     *
     * @since 150429
     * @var float
     */
    public $clickWeight = 0;
    /**
     * @var int
     */
    public $entropy = 0;

    public function totalRating(posts $hostPost, posts $visPost, $catWeight = false, $tagWeight = false, $clickWeight = false)
    {
        $catWeight   = (float)($catWeight ? $catWeight : $this->catWeight);
        $tagWeight   = (float)($tagWeight ? $tagWeight : $this->tagWeight);
        $clickWeight = (float)($clickWeight ? $clickWeight : $this->clickWeight);
    }

    /**
     * @param posts $hostPost
     * @param posts $visPost
     * @param bool  $lookInCache
     *
     * @return array|bool|mixed
     * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
     * @since  150429
     */
    public function getRatings(posts $hostPost, posts $visPost, $lookInCache = false)
    {
        $ratings = array(
          'score_cats' => 0.0,
          'score_tags' => 0.0,
        );

        if ($lookInCache) {
            $row = $this->©db_actions->getRow($hostPost->ID, $visPost->ID);
            if ($row) {
                return $row;
            }
        }

        $ratings['score_cats'] = $this->rateOnCats($hostPost, $visPost);
        $ratings['score_tags'] = $this->rateOnTags($hostPost, $visPost);

        return $ratings;
    }

    /**
     * @param posts $hostPost
     * @param posts $visPost
     *
     * @return float
     * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
     * @since  150429
     */
    protected function rateOnCats(posts $hostPost, posts $visPost)
    {
        $hostCatIds   = array_keys($hostPost->getCategories());
        $guestCatsIds = array_keys($visPost->getCategories());

        if (empty($hostCatIds) || empty($guestCatsIds)) {
            return 0.0;
        }

        $commonCount = count(array_intersect($hostCatIds, $guestCatsIds));

        return ( float )($commonCount / count($hostCatIds));
    }

    /**
     * @param posts $hostPost
     * @param posts $visPost
     *
     * @return float
     * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
     * @since  150429
     */
    protected function rateOnTags(posts $hostPost, posts $visPost)
    {
        $hostTagsIds  = array_keys($hostPost->getTags());
        $guestTagsIds = array_keys($visPost->getTags());

        if (empty($hostTagsIds) || empty($guestTagsIds)) {
            return 0.0;
        }

        $commonCount = count(array_intersect($hostTagsIds, $guestTagsIds));

        return ( float )($commonCount / count($hostTagsIds));
    }

    /**
     * @param posts $hostPost
     * @param posts $visPost
     *
     * @return float
     * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
     * @since  150429
     */
    protected function rateOnClicks(posts $hostPost, posts $visPost)
    {
        $row = $this->©db_actions->getRow($hostPost->ID, $visPost->ID);
        if ($row && isset($row->clicks) && isset($row->displayed)) {
            if ($row->displayed != 0) {
                return (float)$row->clicks / $row->displayed;
            }
        }

        return 0.0;
    }
}
