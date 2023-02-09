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
		$blocks_factory = BlocksFactory::get_instance();
		$blocks_factory->register( 'test' );
		$blocks_factory->register( 'mon-block' );
		$blocks_factory->enqueue_blocks();
		// echo '<pre>' . print_r( $blocks_factory, true ) . '</pre>';
		// var_dump( 'COUCOU JE SUIS LE BLOCKS SERVICE PROVIDER' );
		// die();

	}
}
