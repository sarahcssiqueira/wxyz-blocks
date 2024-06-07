<?php
/**
 * Plugin Name:       WXY...Z Blocks
 * Plugin URI:        https://sarahjobs.com/wordpress/plugins/wxyz-blocks
 * Description:       Structure to work with multiple blocks in a single plugin.
 * Version:           1.0.0-beta
 * Requires at least: 5.6
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

defined( 'ABSPATH' ) || exit;

require __DIR__ . '/vendor/autoload.php';

use WXYZBlocks\Inc\BlockX;
use WXYZBlocks\Inc\BlockY;
use WXYZBlocks\Inc\BlockW;
use WXYZBlocks\Inc\BlockZ;
use WXYZBlocks\Inc\Init;

new BlockX();
new BlockY();
new BlockW();
new BlockZ();
new Init();

