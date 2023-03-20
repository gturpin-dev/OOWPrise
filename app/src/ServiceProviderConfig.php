<?php

namespace App;

use OOWPrise\ServiceProvider\ServiceProviderInterface;

/**
 * The service provider configuration.
 * The array of service providers is used to register the services.
 */
final class ServiceProviderConfig {

	/**
	 * The service providers that are registered. Update this array to add new service providers.
	 * Each service provider must implement the ServiceProvider interface.
	 * The service providers are registered in the order they are added to the array.
	 * The service providers must be added with the fully qualified namespace ::class syntax.
	 *
	 * @var array<ServiceProviderInterface>
	 */
	private static array $service_providers = [
		\App\Gutenberg\Blocks\BlocksServiceProvider::class,
		\App\CPT\CPTServiceProvider::class,
		\App\WordPress\ThemeServiceProvider::class,
		\App\WordPress\CommentsServiceProvider::class,
		\App\WordPress\EnqueueServiceProvider::class,
		\App\API\APIServiceProvider::class,
	];

	/**
	 * Get the service providers.
	 *
	 * @return array<ServiceProviderInterface>
	 */
	public static function get_service_providers(): array {
		return self::$service_providers;
	}
}
