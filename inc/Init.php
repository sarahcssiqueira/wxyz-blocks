<?php
/**
 * Init
 *
 * @package wxyzblocks
 */

namespace WXYZBlocks\Inc;

/**
 * Init
 */
class Init {


	/**
	 * Constructor for handle WordPress Hooks
	 */
	public function __construct() {
		add_filter( 'block_categories_all', [ $this, 'register_new_category' ] );
	}

	/*
	 Register custom category
	*/
	public function register_new_category( $categories ) {
		$categories[] = [
			'slug'  => 'wxyz-blocks',
			'title' => 'XYW...Z Blocks',
		];

		return $categories;
	}

}
