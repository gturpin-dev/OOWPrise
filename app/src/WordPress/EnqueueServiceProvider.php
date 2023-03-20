<?php

namespace App\WordPress;

use OOWPrise\Theme;
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
	 * The theme's path.
	 *
	 * @var string
	 */
	private string $theme_path;

	/**
	 * The theme's URL.
	 *
	 * @var string
	 */
	private string $theme_url;

	/**
	 * @inheritDoc
	 */
	public function register(): void {
		$this->assets_enqueuer = AssetsEnqueue::get_instance();
		$this->theme_path      = Theme::get_instance()->get_path();
		$this->theme_url       = Theme::get_instance()->get_url();
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
			$this->theme_url . '/build/theme/index.js',
			$asset['dependencies'] ?? [],
			filemtime( $this->theme_path . '/build/theme/index.js' ),
			true
		);
		$this->assets_enqueuer->add_stylesheet(
			'app',
			$this->theme_url . '/build/theme/index.css',
			[],
			filemtime( $this->theme_path . '/build/theme/index.css' ),
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
			$this->theme_url . '/build/theme/editor.js',
			$editor_asset['dependencies'] ?? [],
			filemtime( $this->theme_path . '/build/theme/editor.js' ),
			true
		);

		$this->assets_enqueuer->add_editor_stylesheet(
			'app-editor',
			$this->theme_url . '/build/theme/editor.css',
			[],
			filemtime( $this->theme_path . '/build/theme/editor.css' ),
		);
	}
}
