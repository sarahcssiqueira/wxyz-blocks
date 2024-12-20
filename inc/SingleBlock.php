<?php
/**
 * Single Blocks class
 *
 * @package wxyzblocks
 */

namespace WXYZBlocks\Inc;

/**
 * Single Blocks class implementing BlockManagerInterface
 */
class SingleBlock implements BlockManagerInterface {

	/**
	 * Custom constructor for handle WordPress Hooks
	 */
	public function initialize() {
		add_action( 'init', [ $this, 'blocks_list' ] );
		add_action( 'init', [ $this, 'blocks_register' ] );
		add_action( 'init', [ $this, 'blocks_enqueues' ] );
		add_action( 'init', [ $this, 'custom_block_register' ] );
		add_action( 'enqueue_block_editor_assets', [ $this, 'custom_block_enqueues' ] );
	}

	/**
	 * Store the block names and paths at an array
	 *
	 * @return array Full list of block names and paths
	 */
	public function blocks_list(): array {
		return [
			'block-w',
			'block-x',
			'block-y',
			'block-z',
		];
	}

	/**
	 * Register all blocks.
	 *
	 * Iterates over the list of block names returned by the blocks_list method
	 * and registers each block using the custom_block_register method.
	 */
	public function blocks_register(): void {
		foreach ( $this->blocks_list() as $block ) {
			$this->custom_block_register( $block );
		}
	}

	/**
	 * Enqueue all block assets.
	 *
	 * Iterates over the list of block names returned by the blocks_list method
	 * and enqueues the scripts and styles for each block using the custom_block_enqueues method.
	 */
	public function blocks_enqueues(): void {
		foreach ( $this->blocks_list() as $block ) {
			$this->custom_block_enqueues( $block );
		}
	}

	/**
	 * Register Block
	 *
	 * @param  block $block block from the blocks_list method.
	 */
	public function custom_block_register(string $block): void {
		register_block_type( __DIR__ . "/../blocks/$block" );
	}

	/**
	 * Enqueues
	 *
	 * @param  block $block block from the blocks_list method.
	 */
	public function custom_block_enqueues(string $block): void {
		wp_enqueue_script(
			'$block',
			plugin_dir_url( __FILE__ ) . "../blocks/$block/build/index.js",
			[ 'wp-blocks', 'wp-i18n', 'wp-editor' ]
		);

		wp_enqueue_style(
			'$block',
            plugin_dir_url( __FILE__ ) . "../blocks/$block/style.css",
			[],
            null
		);
	}
}
