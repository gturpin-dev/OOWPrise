<?php

namespace App\ServiceProviders;

use OOWPrise\Gutenberg\Blocks\BlocksFactory;
use OOWPrise\ServiceProvider\ServiceProviderInterface;

/**
 * The blocks service provider.
 */
final class BlocksServiceProvider implements ServiceProviderInterface {

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
		// BlocksFactory::$autoload = true;
		// BlocksFactory::get_instance()->enqueue_blocks();

		// If you want to enqueue a specific block, you can do it like this:
		$blocks_factory = BlocksFactory::get_instance();
		$blocks_factory->register( 'my-first-block' );
		$blocks_factory->register( 'my-second-block' );
		$blocks_factory->register( 'test' );
		$blocks_factory->enqueue_blocks();
	}
}
