<?php
/**
 * Project: x-related-posts
 * File: ajax.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 5/5/2015
 * Time: 1:00 μμ
 * Since: 150429
 * Copyright: 2015 Panagiotis Vagenas
 */

namespace x_related_posts;


class ajax extends \xd_v141226_dev\ajax{
	public function ®ajaxGetThemeOptions($themeSlug){
		if ( ! $this->©user->is_super_admin() ) {
			$this->sendJSONError( 'Authorization failed', 401 );
			return false;
		}

		if(!$themeSlug){
			$this->sendJSONError('No theme is specified');
			return false;
		}

		$themeClass = $this->©themes->getThemeClassFromSlug($themeSlug);
		if(!$themeClass){
			$this->sendJSONError('Theme not found');
			return false;
		}
		$out = $this->$themeClass->settings(false);
		$this->sendJSONSuccess(array('html' => $out));
		return true;
	}
}
