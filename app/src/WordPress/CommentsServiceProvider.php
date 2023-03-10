<?php

namespace App\WordPress;

use OOWPrise\WordPress\Comments;
use OOWPrise\ServiceProvider\ServiceProviderInterface;

/**
 * The theme service provider.
 */
final class CommentsServiceProvider implements ServiceProviderInterface {

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
		// Disable comments
		Comments::disable();
	}
}
