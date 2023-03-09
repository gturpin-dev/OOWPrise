<?php

namespace App\CPT;

use App\CPT\CPT_Page;
use App\CPT\CPT_Post;
use OOWPrise\ServiceProvider\ServiceProviderInterface;

/**
 * The CPT service provider.
 */
final class CPTServiceProvider implements ServiceProviderInterface {

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
		// Boot every CPTs.
		CPT_Post::init();
		CPT_Page::init();

		// Stylish the admin columns cell
		add_action( 'admin_head', [ $this, 'admin_column_styles' ] );
	}

	/**
	 * Stylish the admin columns cell
	 *
	 * @return void
	 */
	public function admin_column_styles() {
		echo '<style>
			body.wp-admin .wp-list-table .column-template {
				user-select: all;
			}
			body.wp-admin .wp-list-table .column-id {
				width: 45px !important;
				text-align: center;
				overflow: hidden;
				user-select: all;
			}
			body.wp-admin .wp-list-table .column-thumbnail {
				width: 175px !important;
				text-align: center;
				overflow: hidden;
			}
		</style>';
	}
}
