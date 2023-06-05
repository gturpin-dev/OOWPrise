<?php

namespace App\Hooks;

use OOWPrise\Support\Hook\Hook;

class SavePostExample extends Hook {

	protected string $hook          = 'save_post';
	protected int    $accepted_args = 3;

	/**
	 * Document the function here based on your hook type and parameters
	 *
	 * @return void
	 */
	public function callback( $post_id, $post, $update ): void {
		// Do something
	}
}
