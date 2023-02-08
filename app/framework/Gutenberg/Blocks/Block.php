<?php

namespace OOWPrise\Gutenberg\Blocks;

/**
 * Models a block.
 */
final class Block {

	public function __construct(
		/**
		 * The slug of the block.
		 * @var string
		 */
		private readonly string $slug,

		/**
		 * The path to the block directory.
		 *
		 * @var string
		 */
		private readonly string $path,
	) {}

	/**
	 * Register the block.
	 *
	 * @return void
	 */
	public function register(): void {
		add_action( 'init', [ $this, 'register_block' ] );
	}

	/**
	 * Register the block.
	 *
	 * @throws \Exception If the block could not be registered.
	 *
	 * @return bool True if the block was registered
	 */
	public function register_block(): bool {
		$block = register_block_type( $this->path . DIRECTORY_SEPARATOR . $this->slug );

		if ( is_wp_error( $block ) ) {
			throw new \Exception( 'Error registering block: ' . $block->get_error_message() );
		}

		return true;
	}

	public function get_slug() {
		return $this->slug;
	}
}
