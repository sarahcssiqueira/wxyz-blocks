<?php
/**
 * Init
 *
 * @package wxyzblocks
 */

namespace WXYZBlocks\Inc;

/**
 * Class to be used by all blocks
 */
class Blocks {

	/**
	 * Custom constructor for handle WordPress Hooks
	 */
	public function initialize() {
		add_filter( 'block_categories_all', [ $this, 'register_new_category' ] );
	}

	/**
	 * Register new blocks category
	 *
	 * @param array $categories Existing block categories.
	 * @return array Modified block categories
	 */
	public function register_new_category( $categories ) {
		$categories[] = [
			'slug'  => 'wxyz-blocks',
			'title' => 'XYW...Z Blocks',
		];

		return $categories;
	}

}
