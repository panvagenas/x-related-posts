<?php
/**
 * Project: x-related-posts
 * File: plugin.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 29/4/2015
 * Time: 8:03 μμ
 * Since: 150429
 * Copyright: 2015 Panagiotis Vagenas
 */

/**
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/gpl-3.0.txt>.
 */

/* -- WordPress® --------------------------------------------------------------------------------------------------------------------------

Version: 150429
Stable tag: 150429
Tested up to: 4.2.1
Requires at least: 3.5.1

Requires at least Apache version: 2.1
Tested up to Apache version: 2.4.7

Requires at least PHP version: 5.3.1
Tested up to PHP version: 5.5.12

Copyright: © 2015 Panagiotis Vagenas <pan.vagenas@gmail.com>
License: GPL V3+
Contributors: pan.vagenas

Author: Panagiotis Vagenas
Author URI: todo

Text Domain: xrp
Domain Path: /translations

Plugin Name: X Related Posts
Plugin URI: todo

Description: todo
Tags: todo

-- end section for WordPress®. --------------------------------------------------------------------------------------------------------- */

namespace randomizer {

	if ( ! defined( 'WPINC' ) ) {
		exit( 'Do NOT access this file directly: ' . basename( __FILE__ ) );
	}

	require_once dirname( __FILE__ ) . '/classes/randomizer/framework.php';
}