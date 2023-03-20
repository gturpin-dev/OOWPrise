<?php

namespace OOWPrise\API;

use OOWPrise\Helpers\Singleton;

/**
 * Factory for the API routes.
 */
final class APIRouteFactory extends Singleton {

	/**
	 * Register a route based on its class name.
	 * The class name must be in the same namespace as the factory.
	 * The class must extends the APIRoute class.
	 * The class must implements the APIRouteInterface interface.
	 *
	 * @param string $route_class_name The class name of the route to register.
	 *
	 * @return void
	 */
	public function register_route( string $route_class_name ): void {
		if ( ! class_exists( $route_class_name ) ) {
			throw new \Exception( 'Cannot instanciate the API route, class ' . $route_class_name . ' does not exist.' );
		}

		if ( ! is_subclass_of( $route_class_name, APIRoute::class ) ) {
			throw new \Exception( 'Cannot instanciate the API route, class ' . $route_class_name . ' does not extends the APIRoute class.' );
		}

		if ( ! in_array( APIRouteInterface::class, class_implements( $route_class_name ) ) ) {
			throw new \Exception( 'Cannot instanciate the API route, class ' . $route_class_name . ' does not implements the APIRouteInterface interface.' );
		}

		$route_class_name::get_instance();
	}
}
