<?php

namespace App\Hooks;

use OOWPrise\Support\Hook\HookFactory;
use OOWPrise\ServiceProvider\ServiceProviderInterface;

/**
 * The hook service provider.
 */
final class HooksServiceProvider implements ServiceProviderInterface {

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
		$this->register_hooks();
	}

	/**
	 * Register all hooks classes.
	 *
	 * @return void
	 */
	public function register_hooks(): void {
		$hook_factory = HookFactory::get_instance();
		// $hook_factory->register( SavePostExample::class );
	}
}
