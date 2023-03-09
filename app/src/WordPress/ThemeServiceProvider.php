<?php

namespace App\WordPress;

use OOWPrise\ServiceProvider\ServiceProviderInterface;

/**
 * The theme service provider.
 */
final class ThemeServiceProvider implements ServiceProviderInterface {

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
		$this->load_text_domain();
		$this->theme_support();
	}

	/**
	 * Load the theme text domain.
	 *
	 * @return void
	 */
	public function load_text_domain(): void {
		load_theme_textdomain( 'oowprise', get_template_directory() . DIRECTORY_SEPARATOR . 'languages' );
	}

	/**
	 * Add theme support for various features.
	 *
	 * @return void
	 */
	public function theme_support(): void {
		// Support title tag in the head.
		add_theme_support( 'title-tag' );

		// Support thumbnails for all CPTs.
		add_theme_support( 'post-thumbnails' );
	}
}
