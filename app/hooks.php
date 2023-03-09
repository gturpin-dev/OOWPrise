<?php

/**
 * Declare any actions and filters here.
 * In most cases you should use a service provider, but in cases where you
 * just need to add an action/filter and forget about it you can add it here.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Set the number of revisions to keep.
add_filter( 'wp_revisions_to_keep', fn() => 5 );
