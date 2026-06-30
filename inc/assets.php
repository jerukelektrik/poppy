<?php
/**
 * Asset loading.
 *
 * @package POPPY
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'wp_enqueue_scripts', 'poppy_enqueue_assets' );
function poppy_enqueue_assets(): void {
	wp_enqueue_style(
		'poppy-fonts',
		'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Montserrat:wght@400;500;600;700;800;900&display=swap',
		array(),
		null
	);

	wp_enqueue_style(
		'poppy-theme',
		POPPY_URI . '/assets/css/theme.css',
		array( 'poppy-fonts' ),
		poppy_asset_version( 'assets/css/theme.css' )
	);

	wp_enqueue_script(
		'poppy-navigation',
		POPPY_URI . '/assets/js/navigation.js',
		array(),
		poppy_asset_version( 'assets/js/navigation.js' ),
		array( 'strategy' => 'defer', 'in_footer' => true )
	);
}

add_action( 'wp_enqueue_scripts', 'poppy_remove_unused_wp_css', 100 );
/**
 * Dequeue unused default WordPress block library and classic theme styles to eliminate render-blocking CSS resources.
 */
function poppy_remove_unused_wp_css(): void {
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
	wp_dequeue_style( 'classic-theme-styles' );
}

