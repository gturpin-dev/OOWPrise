<?php

namespace OOWPrise\API;

use OOWPrise\Helpers\Singleton;

/**
 * Each child classes must implements the Singleton pattern.
 */
abstract class APIRoute extends Singleton {

	/**
	 * Bind the route declaration to the right hook.
	 */
	protected function __construct() {
		add_action( 'rest_api_init', [ $this, 'register_route' ] );
	}
}
