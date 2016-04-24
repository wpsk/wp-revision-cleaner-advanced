<?php

/*
 * Plugin Name: Revision Cleaner Advanced for WordPress
 * Description: 
 * Version: 1.0.0
 * Author: WordPress.sk
 * Author URI: http://wp.sk/
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

//  work out plugin folder name and store it as a constant
$plugin_dir = str_replace(basename(__FILE__), "", plugin_basename(__FILE__));
$plugin_dir = substr($plugin_dir, 0, strlen($plugin_dir) - 1);
define('WPRCA_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('WPRCA_PLUGIN_DIR', $plugin_dir);
define('WPRCA_PLUGIN_INDEX', __FILE__);

require_once 'lib' . DIRECTORY_SEPARATOR . 'WPRCA_Core.php';
require_once 'lib' . DIRECTORY_SEPARATOR . 'WPRCA_Admin.php';

// enable I18N
load_plugin_textdomain('wprca', false, dirname(plugin_basename(__FILE__)) . '/i18n/');

// WPRCA_Core::__init();
$wprca_admin =  new WPRCA_Admin();
$wprca_admin->init();
//$cron = new WPRCA_Cron();

//	activation & deactivation hooks (these MUST be in this file)
//register_activation_hook(__FILE__, array($cron, 'activate'));
//register_deactivation_hook(__FILE__, array($cron, 'deactivation'));
