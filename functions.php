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

// Load composer if it exists.
if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once __DIR__ . '/vendor/autoload.php';
} else {
	throw new \Exception( 'Composer is not installed.' );
}

// Init the theme.
Theme::init();

// Load procedural PHP files
require_once __DIR__ . '/app/hooks.php';
