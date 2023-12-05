<?php
/**
 * Block W
 *
 * @package xywzblocks
 */

namespace XYWZBlocks\Inc;

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
		add_filter( 'block_categories_all', [ $this, 'register_new_category' ], 10, 2 );
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

	/**
	 * Register custom category
	 */
	public function register_new_category( $categories ) {
		$categories[] = [
			'slug'  => 'xywz-blocks',
			'title' => 'XYW...Z Blocks',
		];

		return $categories;
	}
}
