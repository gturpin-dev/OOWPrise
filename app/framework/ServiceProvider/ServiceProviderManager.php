<?php

namespace OOWPrise\ServiceProvider;

/**
 * The service provider manager.
 */
final class ServiceProviderManager {

	/**
	 * The service providers.
	 *
	 * @var array<ServiceProviderInterface>
	 */
	private array $service_providers;

	/**
	 * The service provider manager constructor.
	 *
	 * @param array<ServiceProviderInterface> $service_providers The service providers.
	 */
	public function __construct( array $service_providers ) {
		$this->service_providers = $service_providers;
		$this->register();
	}

	/**
	 * Register the service providers.
	 *
	 * @return void
	 */
	private function register(): void {
		foreach ( $this->service_providers as &$service_provider ) {

			// Check if the service provider is a class and if it implements the ServiceProviderInterface.
			if ( ! is_string( $service_provider ) || ! is_subclass_of( $service_provider, ServiceProviderInterface::class ) ) {
				throw new \Exception( 'The service provider "' . $service_provider . '" must be a valid class and must implement the ServiceProviderInterface.' );
			}

			$service_provider = new $service_provider();
			$service_provider->register();
		}
	}

	/**
	 * Boot the service providers.
	 *
	 * @return void
	 */
	public function boot(): void {
		foreach ( $this->service_providers as $service_provider ) {
			$service_provider->boot();
		}
	}
}
