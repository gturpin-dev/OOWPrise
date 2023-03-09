<?php

namespace App\CPT;

use PostTypeHandler\PostType;
use OOWPrise\CPT\CPTInterface;

class CPT_Post implements CPTInterface {

	/**
	 * Static slug of the CPT
	 *
	 * @var string
	 */
	public static $slug = 'post';

	/**
	 * Init the CPT.
	 *
	 * @return void
	 */
	public static function init() {
		$posts = new PostType( ucfirst( self::$slug ) );

		$posts->columns()->add( [
			'id'        => 'ID',
			'thumbnail' => __( 'Thumbnail', 'oowprise' ),
		] );

		$posts->columns()->populate( 'id', function( $column, $post_id ) {
			echo $post_id;
		} );
		$posts->columns()->populate( 'thumbnail', function( $column, $post_id ) {
			echo get_the_post_thumbnail( $post_id, [ 100, 100 ] );
		} );

		$posts->columns()->order( [
			'cb'          => 0,
			'id'          => 1,
			'title'       => 2,
			'thumbnail'   => 3,
		] );

		$posts->register();

		// Stylish the admin columns cell
		add_action( 'admin_head', [ __CLASS__, 'admin_column_styles' ] );
	}

	/**
	 * Stylish the admin columns cell
	 *
	 * @return void
	 */
	public static function admin_column_styles() {
		echo '<style>
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
