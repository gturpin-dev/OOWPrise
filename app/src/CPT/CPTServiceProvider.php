<?php

namespace App\CPT;

use App\CPT\CPT_Post;
use OOWPrise\ServiceProvider\ServiceProviderInterface;

/**
 * The CPT service provider.
 */
final class CPTServiceProvider implements ServiceProviderInterface {

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
		// Boot every CPTs.
		CPT_Post::init();
	}
}
