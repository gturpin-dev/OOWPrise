<?php

namespace OOWPrise\Helpers;

/**
 * Implements the Singleton pattern.
 */
abstract class Singleton {

	protected function __construct() {
		// to override in child classes
	}

	// prevent cloning
	private function __clone() {}

	/**
	 * Return the current instance of the child class
	 *
	 * @return Singleton the child class
	 */
	final public static function get_instance(): Singleton {
		static $_instance = [];

		$called_class = get_called_class();

		if ( ! array_key_exists( $called_class, $_instance ) ) {
			$_instance[ $called_class ] = new $called_class();
		}

		return $_instance[ $called_class ];
	}
}
