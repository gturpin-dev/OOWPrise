<?php

namespace OOWPrise\Hook;

/**
 * Interface that defines a hook for WordPress, can be either an action or a filter.
 */
interface HookInterface {

	/**
	* Add a hook.
	* @alias of "add_action" or "add_filter" functions
	*
	* @param string   $hook         The name of the hook.
	* @param callable $callback     The callback function.
	* @param int      $priority     The priority of the hook.
	* @param int      $accepted_args The number of arguments accepted by the callback function.
	*
	* @return void
	*/
   public static function add( string $hook, callable $callback, int $priority = 10, int $accepted_args = 1 ): void;

   /**
	* Call the callback functions that have been registered on a hook.
	* @alias of "do_action" or "apply_filters" functions
	*
	* @param string $hook The name of the hook.
	* @param mixed  $args The arguments passed to the callback function.
	*
	* @return mixed
	*/
   public static function run( string $hook, $args = null ): mixed;

   /**
	* Remove a registered hook.
	* @alias of "remove_action" or "remove_filter" functions
	*
	* @param string $hook The name of the hook.
	* @param callable|null $callback The callback to remove
	* @param integer $priority The priority of the hook.
	*
	* @return boolean True if the hook was removed, false otherwise.
	*/
   public static function remove( string $hook, callable $callback = null, int $priority = 10 ): bool;

   /**
	* Check if a registered hook exists.
	* @alias of "has_action" or "has_filter" functions
	*
	* @param string $hook The name of the hook.
	*
	* @return boolean
	*/
   public static function exists( string $hook, callable|false $callback = false ): bool;
}
