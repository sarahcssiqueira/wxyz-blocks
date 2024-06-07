<?php
/**
 * Block W
 *
 * @package wxyzblocks
 */

namespace WXYZBlocks\Inc;

/**
 * Block W
 */
class BlockW {


	/**
	 * Constructor for handle WordPress Hooks
	 */
	public function __construct() {
		add_action( 'init', [ $this, 'block_w_register' ] );
		add_action( 'enqueue_block_editor_assets', [ $this, 'block_w_enqueues' ] );
	}

	/**
	 * Register Block
	 */
	public function block_w_register() {
		register_block_type( __DIR__ );
	}

	/**
	 * Enqueues
	 */
	public function block_w_enqueues() {
		wp_enqueue_script(
			'block-w',
			plugin_dir_url( __FILE__ ) . '../blocks/block-w/build/index.js',
			[ 'wp-blocks', 'wp-i18n', 'wp-editor' ]
		);

		wp_enqueue_style(
			'block-w',
			plugin_dir_url( __FILE__ ) . '..style/style.css',
			[],
		);
	}
}
