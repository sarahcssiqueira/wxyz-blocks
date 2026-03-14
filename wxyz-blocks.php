<?php
/**
 * Plugin Name:       WXY...Z Blocks
 * Plugin URI:        https://sarahjobs.com/wordpress/plugins/wxyz-blocks
 * Description:       Structure to work with multiple blocks in a single plugin.
 * Version:           1.0.0-beta
 * Requires at least: 5.8
 * Requires PHP:      7.4
 * Author:            Sarah Siqueira
 * Author URI:        https://sarahjobs.com/about
 * License:           GPLv2 or later
 * License URI:       https://www.gnu.org/licenses/gpl.html
 * Text Domain:       wxyz-blocks
 * Domain Path:       /languages
 * Update URI:        https://sarahjobs.com/wordpress/plugins/wxyz-blocks/update
 *
 * @package wxyzblocks
 */

/**
 * Exit is accessed directly.
 */
defined( 'ABSPATH' ) || exit;

/**
 * Define essential constants
 */
define( 'WXYZ_BLOCKS_VERSION', '0.1.0' );

define( 'WXYZ_BLOCKS_PHP_MINIMUM', '7.4.0' );

define( 'WXYZ_BLOCKS_WP_MINIMUM', '6.4.0' );


/**
 * Composer Autoload
 */
if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once __DIR__ . '/vendor/autoload.php';
}

/**
 * Bootstraps the plugin
 */
use WXYZBlocks\Inc\Init;
$init = new Init();
$init->register_classes_list();
