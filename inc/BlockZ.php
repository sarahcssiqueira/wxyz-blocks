<?php
/**
 * Block Z
 *
 * @package wxyzblocks
 */

namespace WXYZBlocks\Inc;

/**
 * Block Y
 */
class BlockZ {


	/**
	 * Constructor for handle WordPress Hooks
	 */
	public function __construct() {
		add_action( 'init', [ $this, 'block_z_register' ] );
		add_action( 'enqueue_block_editor_assets', [ $this, 'block_z_enqueues' ] );
	}

	/**
	 * Register Block
	 */
	public function block_z_register() {
		register_block_type( __DIR__ );
	}

	/**
	 * Enqueues
	 */
	public function block_z_enqueues() {
		wp_enqueue_script(
			'block-z',
			plugin_dir_url( __FILE__ ) . '../blocks/block-z/build/index.js',
			[ 'wp-blocks', 'wp-i18n', 'wp-editor' ]
		);

		wp_enqueue_style(
			'block-z',
			plugin_dir_url( __FILE__ ) . '..style/style.css',
			[],
		);
	}
}
