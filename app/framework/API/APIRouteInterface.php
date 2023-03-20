<?php

namespace OOWPrise\API;

use OOWPrise\Helpers\Singleton;

/**
 * Each class must implements the Singleton pattern.
 */
interface APIRouteInterface {

	/**
	 * Init the route with the register_rest_route function
	 * @see https://developer.wordpress.org/reference/functions/register_rest_route/
	 *
	 * @return void
	 */
	public function register_route();

	/**
	 * The route callback function
	 *
	 * @param \WP_REST_Request $request The request object
	 *
	 * @return \WP_REST_Response
	 */
	public function callback( \WP_REST_Request $request ): \WP_REST_Response;

	/**
	 * Return the current instance of the class
	 *
	 * @return Singleton the child class
	 */
	public static function get_instance(): Singleton;
}
