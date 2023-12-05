<?php
/**
 * Block Y
 *
 * @package xywzblocks
 */

namespace XYWZBlocks\Inc;

/**
 * Block Y
 */
class BlockY {


	/**
	 * Constructor for handle WordPress Hooks
	 */
	public function __construct() {
		add_action( 'init', [ $this, 'block_y_register' ] );
		add_action( 'enqueue_block_editor_assets', [ $this, 'block_y_enqueues' ] );
	}

	/**
	 * Register Block
	 */
	public function block_y_register() {
		register_block_type( __DIR__ );
	}

	/**
	 * Enqueues
	 */
	public function block_y_enqueues() {
		wp_enqueue_script(
			'block-y',
			plugin_dir_url( __FILE__ ) . '../blocks/block-y/build/index.js',
			[ 'wp-blocks', 'wp-i18n', 'wp-editor' ]
		);

		wp_enqueue_style(
			'block-y',
			plugin_dir_url( __FILE__ ) . '..style/style.css',
			[],
		);
	}
}
