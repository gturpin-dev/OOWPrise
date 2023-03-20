<?php

namespace App\API\Routes;

use OOWPrise\API\APIRoute;
use OOWPrise\API\APIRouteInterface;

// TODO : Find a better example or remove this file.
final class RoutePostMeta extends APIRoute implements APIRouteInterface {

	/**
	 * @inheritDoc
	 */
	public function register_route(): void {
		register_rest_route(
			'wp/v2',
			'/post-meta/(?P<id>\d+)',
			[
				'methods'  => 'GET',
				'callback' => [ $this, 'callback' ],
			]
		);
	}

	/**
	 * @inheritDoc
	 */
	public function callback( \WP_REST_Request $request ): \WP_REST_Response {
		$post_id = $request->get_param( 'id' );

		$post_meta = get_post_meta( $post_id );

		return new \WP_REST_Response( $post_meta );
	}
}
