<?php

use OOWPrise\Theme;

// Load composer if it exists.
if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once __DIR__ . '/vendor/autoload.php';
} else {
	throw new \Exception( 'Composer is not installed.' );
}

// Init the theme.
Theme::init();