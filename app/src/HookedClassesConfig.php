<?php

namespace App;

/**
 * The hooked classes configuration.
 * Declare any Class that uses PHP Attributes to register hooks here.
 */
final class HookedClassesConfig {

	/**
	 * The classes that are looked to find PHP Attributes which defines hooks.
	 * Update this array to add new hooked classes.
	 * The hooked classes must be added with the fully qualified namespace MyClass::class syntax.
	 *
	 * @var array<Object>
	 */
	private static array $hooked_classes = [
		// MyHook::class,
	];

	/**
	 * Get the hooked classes.
	 *
	 * @return array<Object>
	 */
	public static function get_hooked_classes(): array {
		return self::$hooked_classes;
	}
}
