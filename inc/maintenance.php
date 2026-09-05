<?php
/**
 * Public maintenance mode request handling.
 *
 * @package POPPY
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Determine whether the current request should bypass maintenance mode.
 *
 * @return bool
 */
function poppy_should_bypass_maintenance() {
	return is_admin()
		|| current_user_can( 'manage_options' )
		|| wp_doing_ajax()
		|| ( defined( 'REST_REQUEST' ) && REST_REQUEST )
		|| ( defined( 'DOING_CRON' ) && DOING_CRON )
		|| is_feed()
		|| is_trackback()
		|| is_customize_preview()
		|| ( function_exists( 'wp_is_json_request' ) && wp_is_json_request() )
		|| ( function_exists( 'wp_is_jsonp_request' ) && wp_is_jsonp_request() );
}

/**
 * Render the standalone maintenance page for public visitors.
 *
 * @return void
 */
function poppy_render_maintenance_mode() {
	$options = poppy_get_theme_options();

	if ( empty( $options['maintenance_mode_enabled'] ) || poppy_should_bypass_maintenance() ) {
		return;
	}

	status_header( 503 );
	header( 'Retry-After: 86400' );
	header( 'X-Robots-Tag: noindex, nofollow', true );
	nocache_headers();

	include POPPY_DIR . '/maintenance.php';
	exit;
}
add_action( 'template_redirect', 'poppy_render_maintenance_mode', 0 );
