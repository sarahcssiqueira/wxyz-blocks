<?php
/**
 * Plugin Name:       XYW...Z Blocks
 * Plugin URI:        https://sarahjobs.com/wordpress/plugins/xywz-blocks
 * Description:       Structure to work with multiple blocks in a single plugin.
 * Version:           1.0.0-beta
 * Requires at least: 5.6
 * Requires PHP:      7.4
 * Author:            Sarah Siqueira
 * Author URI:        https://sarahjobs.com/about
 * License:           GPLv2 or later
 * License URI:       https://www.gnu.org/licenses/gpl.html
 * Text Domain:       xywz-blocks
 * Domain Path:       /languages
 * Update URI:        https://sarahjobs.com/wordpress/plugins/xywz-blocks/update
 *
 * @package xywzblocks
 */

defined( 'ABSPATH' ) || exit;

/**
 * Block X
 */
require dirname( __FILE__ ) . '/inc/class-block-x.php';
use XYWZBlocks\Inc\Block_X;
new Block_X();

/**
 * Block Y
 */
require dirname( __FILE__ ) . '/inc/class-block-y.php';
use XYWZBlocks\Inc\Block_Y;
new Block_Y();
