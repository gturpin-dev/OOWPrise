<?php

namespace OOWPrise\ServiceProvider;

/**
 * The service provider interface.
 */
interface ServiceProviderInterface {

	/**
	 * Define all the necessary bindings and dependencies for the service.
	 * The method is executed when the service is registered.
	 *
	 * @return void
	 */
	public function register(): void;

	/**
	 * Boot the service
	 * Execute any code that needs to be executed after the service has been registered.
	 *
	 * @return void
	 */
	public function boot(): void;
}
