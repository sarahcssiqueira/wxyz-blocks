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
 *
 */

defined( 'ABSPATH' ) || exit;

new Block_X();

class Block_X {

	public function __construct() {
		add_action( 'init', array( $this, 'block_x_register' ) );
		add_action( 'enqueue_block_editor_assets', array( $this, 'block_x_enqueues' ) );
		add_filter( 'block_categories_all', array( $this, 'register_new_category' ), 10, 2 );
	}

	/**
	 * Register Block
	 */
	public function block_x_register() {
		register_block_type( __DIR__ );
	}

	/**
	 * Enqueues
	 */
	public function block_x_enqueues() {
		wp_enqueue_script(
			'block-x',
			plugin_dir_url( __FILE__ ) . './blocks/block-x/build/index.js',
			array( 'wp-blocks', 'wp-i18n', 'wp-editor' )
		);

		wp_enqueue_style(
			'block-x',
			plugin_dir_url( __FILE__ ) . '.style/style.css',
			array(),
		);
	}

	/**
	 * Register custom category
	 */
	public function register_new_category( $categories ) {
		$categories[] = array(
			'slug'  => 'xywz-blocks',
			'title' => 'XYW...Z Blocks',
		);

		return $categories;
	}
}
