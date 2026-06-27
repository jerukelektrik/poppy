<?php
/**
 * Theme setup.
 *
 * @package POPPY
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'after_setup_theme', 'poppy_setup' );
function poppy_setup(): void {
	load_theme_textdomain( 'poppy', POPPY_DIR . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', array( 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script', 'search-form' ) );
	add_theme_support( 'custom-logo', array( 'height' => 96, 'width' => 320, 'flex-height' => true, 'flex-width' => true ) );
	add_theme_support( 'editor-styles' );
	add_editor_style( 'assets/css/theme.css' );

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'poppy' ),
			'footer'  => __( 'Footer Menu', 'poppy' ),
		)
	);

	add_image_size( 'poppy-hero', 1280, 800, true );
	add_image_size( 'poppy-card', 720, 520, true );
	add_image_size( 'poppy-square', 520, 520, true );
}
