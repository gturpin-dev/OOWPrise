<?php

namespace App\API;

use App\API\Routes\RoutePostMeta;
use OOWPrise\API\APIRouteFactory;
use OOWPrise\ServiceProvider\ServiceProviderInterface;

/**
 * The API service provider.
 */
final class APIServiceProvider implements ServiceProviderInterface {

	/**
	 * @inheritDoc
	 */
	public function register(): void {
		// Nothing to do here.
	}

	/**
	 * @inheritDoc
	 */
	public function boot(): void {
		$this->register_custom_routes();
	}

	/**
	 * Register custom routes.
	 *
	 * @return void
	 */
	private function register_custom_routes(): void {
		$api_route_factory = APIRouteFactory::get_instance();

		$api_route_factory->register_route( RoutePostMeta::class );
	}
}
