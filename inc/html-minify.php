<?php
/**
 * Conservative production HTML minification.
 *
 * @package POPPY
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'template_redirect', 'poppy_start_html_minification', 0 );
function poppy_start_html_minification(): void {
	$is_robots_request = function_exists( 'is_robots' ) && is_robots();
	if ( is_admin() || wp_doing_ajax() || wp_doing_cron() || is_feed() || is_trackback() || $is_robots_request ) {
		return;
	}

	$request_method = isset( $_SERVER['REQUEST_METHOD'] ) ? strtoupper( sanitize_text_field( wp_unslash( $_SERVER['REQUEST_METHOD'] ) ) ) : 'GET';
	if ( ! in_array( $request_method, array( 'GET', 'HEAD' ), true ) || headers_sent() ) {
		return;
	}

	ob_start( 'poppy_minify_html_output' );
}

function poppy_minify_html_output( string $html ): string {
	if ( '' === trim( $html ) || false === stripos( $html, '<html' ) ) {
		return $html;
	}

	$protected_blocks = array();
	$html              = preg_replace_callback(
		'#<(pre|code|textarea|script|style|svg)\b[^>]*>.*?</\1\s*>#is',
		static function ( array $matches ) use ( &$protected_blocks ): string {
			$token = "___POPPY_HTML_BLOCK_" . count( $protected_blocks ) . "___";
			$protected_blocks[ $token ] = $matches[0];
			return $token;
		},
		$html
	);

	if ( null === $html ) {
		return $html;
	}

	$html = preg_replace( '/<!--(?!\[if\b|<!\[endif\b)[\s\S]*?-->/', '', $html );
	$html = preg_replace( '/[\t\r\n ]+/', ' ', $html );

	foreach ( $protected_blocks as $token => $block ) {
		$html = str_replace( $token, $block, $html );
	}

	return null !== $html ? $html : '';
}
