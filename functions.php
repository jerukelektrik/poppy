<?php
/**
 * POPPY functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package POPPY
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'POPPY_VERSION', '0.1.0' );
define( 'POPPY_DIR', get_template_directory() );
define( 'POPPY_URI', get_template_directory_uri() );

$poppy_includes = array(
	'inc/setup.php',
	'inc/helpers.php',
	'inc/assets.php',
	'inc/testimonials.php',
	'inc/promos.php',
	'inc/customizer.php',
	'inc/seo.php',
	'inc/theme-options.php',
	'inc/html-minify.php',
);

foreach ( $poppy_includes as $poppy_include ) {
	require_once POPPY_DIR . '/' . $poppy_include;
}

/**
 * Programmatically create Gallery page if it doesn't exist to prevent 404
 */
add_action( 'init', function() {
	if ( class_exists( 'WP_CLI' ) ) {
		return;
	}
	$slug = 'gallery';
	$page = get_page_by_path( $slug );
	if ( ! $page ) {
		$page_id = wp_insert_post( array(
			'post_title'     => 'Gallery Photo',
			'post_name'      => $slug,
			'post_status'    => 'publish',
			'post_type'      => 'page',
			'post_author'    => 1,
		) );
		if ( $page_id && ! is_wp_error( $page_id ) ) {
			update_post_meta( $page_id, '_wp_page_template', 'page-templates/template-gallery.php' );
			flush_rewrite_rules();
		}
	}
} );
