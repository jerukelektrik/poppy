<?php
/**
 * Display helpers.
 *
 * @package POPPY
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function poppy_asset_version( string $relative_path ): string {
	$file = POPPY_DIR . '/' . ltrim( $relative_path, '/' );
	return file_exists( $file ) ? (string) filemtime( $file ) : POPPY_VERSION;
}
