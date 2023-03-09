<?php

namespace App\CPT;

use PostTypeHandler\PostType;
use OOWPrise\CPT\CPTInterface;

class CPT_Page implements CPTInterface {

	/**
	 * Static slug of the CPT
	 *
	 * @var string
	 */
	public static $slug = 'page';

	/**
	 * Init the CPT.
	 *
	 * @return void
	 */
	public static function init() {
		$pages = new PostType( ucfirst( self::$slug ) );

		$pages->columns()->add( [
			'id'        => 'ID',
			'thumbnail' => __( 'Thumbnail', 'oowprise' ),
			'template'  => __( 'Template', 'oowprise' ),
		] );

		$pages->columns()->populate( 'id', function( $column, $post_id ) {
			echo $post_id;
		} );
		$pages->columns()->populate( 'thumbnail', function( $column, $post_id ) {
			echo get_the_post_thumbnail( $post_id, [ 100, 100 ] ) ?: '-';
		} );
		$pages->columns()->populate( 'template', function( $column, $post_id ) {
			$template = get_page_template_slug( $post_id );
			echo $template ?: '-';
		} );

		$pages->columns()->order( [
			'cb'        => 0,
			'id'        => 1,
			'title'     => 2,
			'thumbnail' => 3,
			'template'  => 4,
		] );

		$pages->register();
	}
}
