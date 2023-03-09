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

		// Remove the post_tag taxonomy by default
		$posts->remove_taxonomy( 'post_tag' );

		// Adding columns to the admin list
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
			'cb'        => 0,
			'id'        => 1,
			'title'     => 2,
			'thumbnail' => 3,
		] );

		$posts->register();
	}
}
