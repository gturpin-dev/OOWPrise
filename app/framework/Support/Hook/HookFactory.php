<?php

namespace OOWPrise\Support\Hook;

use OOWPrise\Helpers\Singleton;

/**
 * Factory for hook classes.
 */
final class HookFactory extends Singleton {

	/**
	 * Register a hook based on the hook class name.
	 * The class must extends the Hook class.
	 * The class must implements the HookInterface interface.
	 *
	 * @param string $hook_class The class name of the Hook to register.
	 *
	 * @return void
	 */
	public function register( string $hook_class ): void {
		if ( ! class_exists( $hook_class ) ) {
			throw new \Exception( 'Cannot register the Hook, class ' . $hook_class . ' does not exist.' );
		}

		if ( ! is_subclass_of( $hook_class, Hook::class ) ) {
			throw new \Exception( 'Cannot register the Hook, class ' . $hook_class . ' does not extends the Hook class.' );
		}

		$hook_class = new $hook_class();
		$hook_class->register();
	}
}
