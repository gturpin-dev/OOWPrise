<?php

namespace OOWPrise\Hook;

class Action implements HookInterface {

	/**
	 * Add an action.
	 * @alias of "add_action" function
	 *
	 * @param string   $hook         The name of the action.
	 * @param callable $callback     The callback function.
	 * @param int      $priority     The priority of the action.
	 * @param int      $accepted_args The number of arguments accepted by the callback function.
	 *
	 * @return void
	 */
	public static function add( string $hook, callable $callback, int $priority = 10, int $accepted_args = 1 ): void {
		add_action( $hook, $callback, $priority, $accepted_args );
	}

	/**
	 * Call the callback functions that have been registered on an action.
	 * @alias of "do_action" function
	 *
	 * @param string $hook The name of the action.
	 * @param mixed  $args The arguments passed to the callback function.
	 *
	 * @return mixed
	 */
	public static function run( string $hook, $args = null ): mixed {
		return do_action( $hook, $args );
	}

	/**
	 * Remove a registered action.
	 * @alias of "remove_action" function
	 *
	 * @param string $hook The name of the action.
	 * @param callable|null $callback The callback to remove
	 * @param integer $priority The priority of the action.
	 *
	 * @return boolean True if the action was removed, false otherwise.
	 */
	public static function remove( string $hook, callable $callback = null, int $priority = 10 ): bool {
		return remove_action( $hook, $callback, $priority );
	}

	/**
	 * Check if a registered action exists.
	 * @alias of "has_action" function
	 *
	 * @param string $hook The name of the action.
	 *
	 * @return boolean
	 */
	public static function exists( string $hook, callable|false $callback = false ): bool {
		return has_action( $hook, $callback );
	}
}
