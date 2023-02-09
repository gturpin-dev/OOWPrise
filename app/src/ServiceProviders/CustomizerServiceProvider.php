<?php

namespace App\ServiceProviders;

use OOWPrise\ServiceProvider\ServiceProviderInterface;

/**
 * The blocks service provider.
 */
final class CustomizerServiceProvider implements ServiceProviderInterface {

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
		// echo 'COUCOU JE SUIS LE CUSTOMIZER SERVICE PROVIDER';
	}
}
