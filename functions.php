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
