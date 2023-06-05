<?php

namespace OOWPrise\Hook;

class Filter implements HookInterface {

	/**
	 * Add an filter.
	 * @alias of "add_filter" function
	 *
	 * @param string   $hook         The name of the filter.
	 * @param callable $callback     The callback function.
	 * @param int      $priority     The priority of the filter.
	 * @param int      $accepted_args The number of arguments accepted by the callback function.
	 *
	 * @return void
	 */
	public static function add( string $hook, callable $callback, int $priority = 10, int $accepted_args = 1 ): void {
		add_filter( $hook, $callback, $priority, $accepted_args );
	}

	/**
	 * Call the callback functions that have been registered on an filter.
	 * @alias of "do_filter" function
	 *
	 * @param string $hook The name of the filter.
	 * @param mixed  $args The arguments passed to the callback function.
	 *
	 * @return mixed
	 */
	public static function run( string $hook, $args = null ): mixed {
		return apply_filters( $hook, $args );
	}

	/**
	 * Remove a registered filter.
	 * @alias of "remove_filter" function
	 *
	 * @param string $hook The name of the filter.
	 * @param callable|null $callback The callback to remove
	 * @param integer $priority The priority of the filter.
	 *
	 * @return boolean True if the filter was removed, false otherwise.
	 */
	public static function remove( string $hook, callable $callback = null, int $priority = 10 ): bool {
		return remove_filter( $hook, $callback, $priority );
	}

	/**
	 * Check if a registered filter exists.
	 * @alias of "has_filter" function
	 *
	 * @param string $hook The name of the filter.
	 *
	 * @return boolean
	 */
	public static function exists( string $hook, callable|false $callback = false ): bool {
		return has_filter( $hook );
	}
}
