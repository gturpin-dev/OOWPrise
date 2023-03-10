<?php

namespace OOWPrise\WordPress;

use OOWPrise\Helpers\Singleton;

/**
 * This class aims to provide a simple way to enqueue scripts and styles.
 */
class Enqueuer extends Singleton {
	private array $scripts = [];
	private array $stylesheets = [];
	private array $editor_scripts = [];
	private array $editor_stylesheets = [];

	/**
	 * The function to call to enqueue all scripts and styles.
	 * Launches all scripts and styles with the right hooks.
	 *
	 * @return void
	 */
	public function register() {
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_stylesheets' ] );
		add_action( 'enqueue_block_editor_assets', [ $this, 'enqueue_editor_scripts' ] );
		add_action( 'enqueue_block_editor_assets', [ $this, 'enqueue_editor_stylesheets' ] );
	}

	/**
	 * Setters.
	 */

	/**
	 * Register a script on front-end.
	 * @see https://developer.wordpress.org/reference/functions/wp_register_script/
	 *
	 * @return void
	 */
	public function register_script( string $handle, string $src, array $deps = [], string $version = '', bool $in_footer = true ): void {
		$this->scripts[ $handle ] = [
			'src'      => $src,
			'deps'     => $deps,
			'version'  => $version,
			'in_footer' => $in_footer,
		];
	}

	/**
	 * Register a stylesheet on front-end.
	 * @see https://developer.wordpress.org/reference/functions/wp_register_style/
	 *
	 * @return void
	 */
	public function register_stylesheet( string $handle, string $src, array $deps = [], string $version = '', string $media = 'all' ): void {
		$this->stylesheets[ $handle ] = [
			'src'      => $src,
			'deps'     => $deps,
			'version'  => $version,
			'media'    => $media,
		];
	}

	/**
	 * Register a script on editor.
	 * @see https://developer.wordpress.org/reference/functions/wp_register_script/
	 *
	 * @return void
	 */
	public function register_editor_script( string $handle, string $src, array $deps = [], string $version = '', bool $in_footer = true ): void {
		$this->editor_scripts[ $handle ] = [
			'src'      => $src,
			'deps'     => $deps,
			'version'  => $version,
			'in_footer' => $in_footer,
		];
	}

	/**
	 * Register a stylesheet on editor.
	 * @see https://developer.wordpress.org/reference/functions/wp_register_style/
	 *
	 * @return void
	 */
	public function register_editor_stylesheet( string $handle, string $src, array $deps = [], string $version = '', string $media = 'all' ): void {
		$this->editor_stylesheets[ $handle ] = [
			'src'      => $src,
			'deps'     => $deps,
			'version'  => $version,
			'media'    => $media,
		];
	}

	/**
	 * Enqueue scripts.
	 * @see https://developer.wordpress.org/reference/functions/wp_enqueue_script/
	 *
	 * @return void
	 */
	public function enqueue_scripts(): void {
		foreach ( $this->scripts as $handle => $script ) {
			wp_enqueue_script( $handle, $script['src'], $script['deps'], $script['version'], $script['in_footer'] );
		}
	}

	/**
	 * Enqueue stylesheets.
	 * @see https://developer.wordpress.org/reference/functions/wp_enqueue_style/
	 *
	 * @return void
	 */
	public function enqueue_stylesheets(): void {
		foreach ( $this->stylesheets as $handle => $stylesheet ) {
			wp_enqueue_style( $handle, $stylesheet['src'], $stylesheet['deps'], $stylesheet['version'], $stylesheet['media'] );
		}
	}

	/**
	 * Enqueue editor scripts.
	 * @see https://developer.wordpress.org/reference/functions/wp_enqueue_script/
	 *
	 * @return void
	 */
	public function enqueue_editor_scripts(): void {
		foreach ( $this->editor_scripts as $handle => $script ) {
			wp_enqueue_script( $handle, $script['src'], $script['deps'], $script['version'], $script['in_footer'] );
		}
	}

	/**
	 * Enqueue editor stylesheets.
	 * @see https://developer.wordpress.org/reference/functions/wp_enqueue_style/
	 *
	 * @return void
	 */
	public function enqueue_editor_stylesheets(): void {
		foreach ( $this->editor_stylesheets as $handle => $stylesheet ) {
			wp_enqueue_style( $handle, $stylesheet['src'], $stylesheet['deps'], $stylesheet['version'], $stylesheet['media'] );
		}
	}
}
