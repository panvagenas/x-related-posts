<?php
/**
 * Project: x-related-posts
 * File: framework.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 29/4/2015
 * Time: 8:12 μμ
 * Since: 150429
 * Copyright: 2015 Panagiotis Vagenas
 */
namespace x_related_posts {
    use xd_v141226_dev\shortcodes\shortcode;

    if (!defined('WPINC')) {
        exit('Do NOT access this file directly: '.basename(__FILE__));
    }

    require_once dirname(dirname(dirname(__FILE__))).'/core/stub.php';

    /**
     * Class framework
     *
     * @package x_related_posts
     * @author  Panagiotis Vagenas <pan.vagenas@gmail.com>
     * @since   150429
     *
     * @property db_actions                                                         $©db_actions
     * @method db_actions                                                           ©db_actions()
     *
     * @property db_tables                                                          $©db_tables
     * @property db_tables                                                          $©db_table
     * @method db_tables                                                            ©db_tables()
     * @method db_tables                                                            ©db_table()
     *
     * @property initializer                                                        $©initializer
     * @method initializer                                                          ©initializer()
     *
     * @property main                                                               $©main
     * @method main                                                                 ©main()
     *
     * @property menu_pages                                                         $©menu_pages
     * @property menu_pages                                                         $©menu_page
     * @method menu_pages                                                           ©menu_pages()
     * @method menu_pages                                                           ©menu_page()
     *
     * @property menu_pages\menu_page                                               $©menu_pages__menu_page
     * @method menu_pages\menu_page                                                 ©menu_pages__menu_page()
     *
     * @property options                                                            $©options
     * @property options                                                            $©option
     * @method options                                                              ©options()
     * @method options                                                              ©option()
     *
     * @property posts                                                              $©posts
     * @property posts                                                              $©post
     * @method posts                                                                ©posts()
     * @method posts                                                                ©post()
     *
     * @property ratings                                                            $©ratings
     * @method ratings                                                              ©ratings()
     *
     * @property related                                                            $©related
     * @method related                                                              ©related()
     *
     * @property tracker                                                            $©tracker
     * @method tracker                                                              ©tracker()
     *
     * @property widget                                                             $©widget
     * @method widget                                                               ©widget()
     *
     * @property shortcodes\shortcode                                               $©shortcodes__shortcode
     * @method shortcodes\shortcode                                                 ©shortcodes__shortcode()
     *
     * @property themes                                                             $©themes
     * @method themes                                                               ©themes()
     *
     * @property themes\theme                                                       $©themes__theme
     * @method themes\theme                                                         ©themes__theme()
     *
     * @property themes\main\carousel                                               $©themes__main__carousel
     * @method themes\main\carousel                                                 ©themes__main__carousel()
     * @property themes\main\grid                                                   $©themes__main__grid
     * @method themes\main\grid                                                     ©themes__main__grid()
     * @property themes\main\simple_list                                            $©themes__main__simple_list
     * @method themes\main\simple_list                                              ©themes__main__simple_list()
     */
    class framework extends \xd__framework
    {
    }

    $GLOBALS[__NAMESPACE__] = new framework(
      array(
        'plugin_root_ns' => __NAMESPACE__,
        // The root namespace
        'plugin_var_ns'  => 'xrp',
        // A shorter namespace alias (or the same as `plugin_root_ns` if you like).
        'plugin_cap'     => 'manage_options',
        // The WordPress capability (or role) required to manage plugin options.
        'plugin_name'    => 'X Related Posts',
        //
        'plugin_version' => '150429',
        'plugin_site'    => 'http://example.com', // TODO
        'plugin_dir'     => dirname(dirname(dirname(__FILE__))) // Your plugin directory.
      )
    );
}
