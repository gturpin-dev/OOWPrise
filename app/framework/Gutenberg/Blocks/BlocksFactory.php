<?php

namespace OOWPrise\Gutenberg\Blocks;

use OOWPrise\Theme;
use OOWPrise\Helpers\Singleton;
use OOWPrise\Gutenberg\Blocks\Block;

/**
 * The factory that is responsible for registering the custom blocks.
 */
final class BlocksFactory extends Singleton {

	public static bool $autoload = true;

	/**
	 * The directory where the blocks are located.
	 * @var string
	 */
	private string $blocks_directory;

	/**
	 * The blocks that are registered.
	 * @var array<Block>
	 */
	private array $blocks = [];

	protected function __construct() {
		$this->blocks_directory = Theme::get_instance()->get_path() . '/build/blocks';
		$this->init();
	}

	/**
	 * Initialize the factory.
	 *
	 * @return void
	 */
	private function init(): void {
		$this->maybe_autoload();
	}

	/**
	 * Autoload the blocks located in the blocks directory.
	 * Add the blocks only if the static property $autoload is set to true.
	 *
	 * @return bool True if the blocks were autoloaded, false otherwise.
	 */
	private function maybe_autoload(): bool {
		if ( ! self::$autoload ) return false;

		$blocks       = $this->retrieve_blocks();
		$blocks       = array_map( fn( $block_slug ) => new Block( $block_slug, $this->blocks_directory ), $blocks );

		// TODO: add a filter to allow the user to modify the blocks before registering them. || Or a maybe_dequeue method.
		$this->blocks = $blocks;

		return true;
	}

	/**
	 * Retrieve the blocks from the blocks directory.
	 *
	 * @return array<string> The blocks slug.
	 */
	private function retrieve_blocks(): array {
		if ( ! is_dir( $this->blocks_directory ) ) {
			throw new \Exception( 'The blocks directory does not exist.' );
		}

		$files = scandir( $this->blocks_directory );
		$files = array_diff( $files, [ '.', '..' ] );

		return $files;
	}

	/**
	 * Register the custom blocks by using block.json file.
	 * @see https://developer.wordpress.org/reference/functions/register_block_type/
	 *
	 * @param string $block_slug The block slug in the format of namespace/block-name.
	 *
	 * @return void
	 */
	public function register( string $block_slug ): void {
		$block = $this->get_block( $block_slug );

		if ( ! $block ) {
			throw new \Exception( 'The block does not exist.' );
		}

		$block->register();
	}

	/**
	 * Get a block from the blocks array by its slug.
	 *
	 * @param string $block_slug The block slug without namespace.
	 *
	 * @return Block|null The block if it exists, null otherwise.
	 */
	private function get_block( string $block_slug ): ?Block {
		$blocks = array_filter( $this->blocks, fn( $block ) => $block->get_slug() === $block_slug );

		if ( empty( $blocks ) ) {
			return null;
		}

		return array_shift( $blocks );
	}
}
