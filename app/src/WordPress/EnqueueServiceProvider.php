<?php

namespace App\WordPress;

use OOWPrise\WordPress\AssetsEnqueue;
use OOWPrise\ServiceProvider\ServiceProviderInterface;

/**
 * This service provider is used to enqueue scripts and styles.
 */
final class EnqueueServiceProvider implements ServiceProviderInterface {

	/**
	 * The assets enqueuer.
	 *
	 * @var AssetsEnqueue
	 */
	private AssetsEnqueue $assets_enqueuer;

	/**
	 * @inheritDoc
	 */
	public function register(): void {
		$this->assets_enqueuer = AssetsEnqueue::get_instance();
	}

	/**
	 * @inheritDoc
	 */
	public function boot(): void {
		$this->enqueue_front();
		$this->enqueue_editor();

		$this->assets_enqueuer->register();
	}

	/**
	 * Enqueue scripts and styles on front-end.
	 *
	 * @return void
	 */
	private function enqueue_front(): void {
		$asset = require get_template_directory() . '/build/theme/index.asset.php';

		$this->assets_enqueuer->add_script(
			'app',
			get_template_directory_uri() . '/build/theme/index.js',
			$asset['dependencies'] ?? [],
			filemtime( get_template_directory() . '/build/theme/index.js' ),
			true
		);
		$this->assets_enqueuer->add_stylesheet(
			'app',
			get_template_directory_uri() . '/build/theme/index.css',
			[],
			filemtime( get_template_directory() . '/build/theme/index.css' ),
		);
	}

	/**
	 * Enqueue scripts and styles on editor.
	 *
	 * @return void
	 */
	private function enqueue_editor(): void {
		$editor_asset = require get_template_directory() . '/build/theme/editor.asset.php';

		$this->assets_enqueuer->add_editor_script(
			'app-editor',
			get_template_directory_uri() . '/build/theme/editor.js',
			$editor_asset['dependencies'] ?? [],
			filemtime( get_template_directory() . '/build/theme/editor.js' ),
			true
		);

		$this->assets_enqueuer->add_editor_stylesheet(
			'app-editor',
			get_template_directory_uri() . '/build/theme/editor.css',
			[],
			filemtime( get_template_directory() . '/build/theme/editor.css' ),
		);
	}
}
