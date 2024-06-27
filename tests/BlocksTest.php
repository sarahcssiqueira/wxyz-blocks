<?php
/**
 *
 * Tests for Blocks class.
 *
 * @package wxyzblocks
 */

use \PHPUnit\Framework\TestCase;

/**
 * Blocks Test.
 */
class BlocksTest extends WP_UnitTestCase {

	/**
	 * Test register new category
	 */
	public function test_register_new_category() {
		// Initial set of categories.
		$initial_categories = [
			[
				'slug'  => 'existing-category',
				'title' => 'Existing Category',
			],
		];

		// Expected result.
		$expected_categories = [
			[
				'slug'  => 'existing-category',
				'title' => 'Existing Category',
			],
			[
				'slug'  => 'wxyz-blocks',
				'title' => 'XYW...Z Blocks',
			],
		];

		// Call the function.
		$blocks = new WXYZBlocks\Inc\Blocks();
		$result = $blocks->register_new_category( $initial_categories );

		// Assertions.
		$this->assertCount( 2, $result, 'The result should contain two categories.' );
		$this->assertEquals( $expected_categories, $result, 'The categories should match the expected output.' );
	}
}
