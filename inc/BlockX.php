<?php
/**
 * Block X
 *
 * @package wxyzblocks
 */

namespace WXYZBlocks\Inc;

/**
 * Block X
 */
class BlockX {


	/**
	 * Constructor for handle WordPress Hooks
	 */
	public function __construct() {
		add_action( 'init', [ $this, 'block_x_register' ] );
		add_action( 'enqueue_block_editor_assets', [ $this, 'block_x_enqueues' ] );
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
			plugin_dir_url( __FILE__ ) . '../blocks/block-x/build/index.js',
			[ 'wp-blocks', 'wp-i18n', 'wp-editor' ]
		);

		wp_enqueue_style(
			'block-x',
			plugin_dir_url( __FILE__ ) . '..style/style.css',
			[],
		);
	}
}
