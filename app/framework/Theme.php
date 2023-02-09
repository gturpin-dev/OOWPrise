<?php

namespace OOWPrise;

use App\ServiceProviderConfig;
use OOWPrise\ServiceProvider\ServiceProviderManager;

/**
 * This class is the entry point of the theme.
 * It is responsible for loading the theme's dependencies and store the theme's information.
 */
final class Theme {

	/**
	 * The theme's instance.
	 *
	 * @var self|null
	 */
	private static ?self $_instance = null;

	/**
	 * The theme's slug.
	 *
	 * @var string
	 */
	private string $slug;

	/**
	 * The theme's path (the directory where the theme's functions file is located).
	 */
	private string $path;

	/**
	 * The theme's URL.
	 */
	private string $url;

	/**
	 * The theme's data
	 * @see https://developer.wordpress.org/reference/classes/wp_theme/
	 * @var \WP_Theme
	 */
	private \WP_Theme $theme_data;

	/**
	 * Initialize the theme.
	 * Can be called only once.
	 *
	 * @return void
	 */
	public static function init(): void {
		if ( ! is_null( self::$_instance ) ) {
			throw new \Exception( 'The theme has already been initialized.' );
		};

		self::$_instance = new self();
	}

	/**
	 * The theme's constructor.
	 * Called only once by the init() method.
	 * Store the theme's data and load the theme's features.
	 * @psalm-suppress MissingFile
	 */
	private function __construct() {
		if ( ! function_exists( 'wp_get_theme' ) ) {
			require_once( ABSPATH . 'wp-includes/theme.php' );
		}

		$this->slug       = get_template();
		$this->theme_data = wp_get_theme( $this->slug );
		$this->path       = get_template_directory();
		$this->url        = get_template_directory_uri();
		$this->boot();
	}

	/**
	 * Boot the theme.
	 *
	 * @return void
	 */
	private function boot(): void {
		add_action( 'after_setup_theme', [ $this, 'instanciate_service_providers' ] );
	}

	/**
	 * Instanciate the service providers.
	 *
	 * @return void
	 */
	public function instanciate_service_providers(): void {
		$service_provider_manager = new ServiceProviderManager( ServiceProviderConfig::get_service_providers() );
		$service_provider_manager->boot();
	}

	// Prevent the instance from being cloned.
	private function __clone() {}

	// Prevent from being unserialized.
	private function __wakeup() {}

	/**
	 * Get the theme's instance.
	 *
	 * @return self The theme's instance.
	 */
	public static function get_instance(): self {
		if ( is_null( self::$_instance ) ) {
			throw new \Exception( 'The theme has not been initialized yet.' );
		}

		return self::$_instance;
	}

	/**
	 * Get the theme's slug.
	 *
	 * @return string The theme's slug.
	 */
	public function get_slug(): string {
		return $this->slug;
	}

	/**
	 * Get the theme's data.
	 *
	 * @return \WP_Theme The theme's data.
	 */
	public function get_theme_data(): \WP_Theme {
		return $this->theme_data;
	}

	/**
	 * Get the theme's path.
	 *
	 * @return string The theme's path.
	 */
	public function get_path(): string {
		return $this->path;
	}

	/**
	 * Get the theme's URL.
	 *
	 * @return string The theme's URL.
	 */
	public function get_url(): string {
		return $this->url;
	}

	/**
	 * Get the theme's version.
	 *
	 * @return array<array-key, mixed>|false|string The theme's version.
	 */
	public function get_version(): mixed {
		return $this->theme_data->get( 'Version' );
	}
}
