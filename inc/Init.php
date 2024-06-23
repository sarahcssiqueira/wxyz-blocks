<?php
/**
 * Init class
 *
 * @package wxyzblocks
 */

namespace WXYZBlocks\Inc;

/**
 * Init
 */
class Init {

	/**
	 * Store the classes inside an array
	 *
	 * @return array Full list of classes
	 */
	public static function classes_list() {
		return [
			Blocks::class,
			SingleBlock::class,
		];
	}

	/**
	 * Loop through the classes list, instatiate them,
	 * and call the initialize() method if it exists
	 */
	public static function register_classes_list() {
		foreach ( self::classes_list() as $class ) {
			$classname = self::instantiate( $class );
			if ( method_exists( $classname, 'initialize' ) ) {
				$classname->initialize();
			}
		}
	}

	/**
	 * Initialize the classes
	 *
	 * @param  class $class    class from the services array.
	 * @return class instance  new instance of the class
	 */
	private static function instantiate( $class ) {
		$classname = new $class();
		return $classname;
	}
};
