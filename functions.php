<?php

/**
 * Bootstrap theme.
 *
 * The purpose of this file is to bootstrap your theme by loading all dependencies and helpers.
 *
 * YOU SHOULD NORMALLY NOT NEED TO ADD ANYTHING HERE - any custom functionality unrelated
 * to bootstrapping the theme should go into a service provider or a separate helper file
 * (refer to the directory structure in README.md).
 */

use OOWPrise\Theme;
use OOWPrise\ServiceProvider\ServiceProviderManager;
use App\ServiceProviders\ServiceProviderConfig;

// Load composer if it exists.
if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once __DIR__ . '/vendor/autoload.php';
} else {
	throw new \Exception( 'Composer is not installed.' );
}

// Init the theme.
Theme::init();

// Init the service providers.
add_action( 'after_setup_theme', function() {
	$service_provider_manager = new ServiceProviderManager( ServiceProviderConfig::get_service_providers() );
	$service_provider_manager->boot();
} );
