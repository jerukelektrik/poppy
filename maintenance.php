<?php
/**
 * Standalone public maintenance page.
 *
 * @package POPPY
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$options          = poppy_get_theme_options();
$site_name        = get_bloginfo( 'name' );
$site_language    = get_bloginfo( 'language' ) ? get_bloginfo( 'language' ) : get_locale();
$message          = ! empty( $options['maintenance_message'] )
	? $options['maintenance_message']
	: 'Website sementara offline. Harap melakukan pembayaran atau pelunasan agar layanan dapat kembali diakses.';
$contact_enabled  = ! empty( $options['maintenance_contact_enabled'] );
$contact_url      = ! empty( $options['maintenance_contact_url'] ) ? $options['maintenance_contact_url'] : '';
$contact_label    = ! empty( $options['maintenance_contact_label'] ) ? $options['maintenance_contact_label'] : 'Hubungi pengelola website';
$logo_url         = get_template_directory_uri() . '/assets/images/Logo.webp';
?>
<!doctype html>
<html lang="<?php echo esc_attr( $site_language ); ?>">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="noindex, nofollow">
	<title><?php echo esc_html( $site_name . ' — ' . __( 'Maintenance', 'poppy' ) ); ?></title>
	<style>
		:root {
			--poppy-maintenance-ink: #26313a;
			--poppy-maintenance-muted: #6e7b82;
			--poppy-maintenance-accent: #ff8b62;
			--poppy-maintenance-cream: #fff8ef;
			--poppy-maintenance-mint: #d9f7ed;
		}

		.poppy-maintenance,
		.poppy-maintenance * {
			box-sizing: border-box;
		}

		.poppy-maintenance {
			min-height: 100vh;
			margin: 0;
			padding: 28px;
			display: grid;
			place-items: center;
			position: relative;
			overflow: hidden;
			background: linear-gradient(135deg, var(--poppy-maintenance-cream) 0%, #fff 48%, var(--poppy-maintenance-mint) 100%);
			color: var(--poppy-maintenance-ink);
			font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
			line-height: 1.5;
		}

		.poppy-maintenance::before,
		.poppy-maintenance::after {
			content: "";
			position: absolute;
			width: 360px;
			height: 360px;
			border-radius: 50%;
			filter: blur(2px);
			opacity: .45;
			pointer-events: none;
		}

		.poppy-maintenance::before {
			top: -180px;
			right: -100px;
			background: #ffd9c9;
		}

		.poppy-maintenance::after {
			bottom: -210px;
			left: -120px;
			background: #bdeedc;
		}

		.poppy-maintenance__shell {
			position: relative;
			z-index: 1;
			width: min(100%, 600px);
			text-align: center;
		}

		.poppy-maintenance__brand {
			display: inline-flex;
			align-items: center;
			justify-content: center;
			min-height: 48px;
			margin-bottom: 24px;
		}

		.poppy-maintenance__brand img {
			display: block;
			width: auto;
			max-width: 220px;
			height: 48px;
			object-fit: contain;
		}

		.poppy-maintenance__card {
			padding: clamp(28px, 6vw, 54px) clamp(22px, 6vw, 56px);
			border: 1px solid rgba(255, 255, 255, .85);
			border-radius: 32px;
			background: rgba(255, 255, 255, .92);
			box-shadow: 0 22px 60px rgba(38, 49, 58, .12);
			backdrop-filter: blur(8px);
		}

		.poppy-maintenance__icon {
			display: inline-grid;
			place-items: center;
			width: 64px;
			height: 64px;
			margin-bottom: 18px;
			border-radius: 20px;
			background: #fff0e8;
			color: var(--poppy-maintenance-accent);
		}

		.poppy-maintenance__eyebrow {
			margin: 0 0 10px;
			color: var(--poppy-maintenance-accent);
			font-size: 11px;
			font-weight: 800;
			letter-spacing: .16em;
			text-transform: uppercase;
		}

		.poppy-maintenance h1 {
			margin: 0;
			font-family: Georgia, "Times New Roman", serif;
			font-size: clamp(2rem, 6vw, 3.15rem);
			font-weight: 900;
			letter-spacing: -.035em;
			line-height: 1.08;
		}

		.poppy-maintenance__message {
			max-width: 460px;
			margin: 18px auto 0;
			color: var(--poppy-maintenance-muted);
			font-size: clamp(.95rem, 2.5vw, 1.05rem);
			line-height: 1.7;
		}

		.poppy-maintenance__message p {
			margin: 0 0 .8em;
		}

		.poppy-maintenance__message p:last-child {
			margin-bottom: 0;
		}

		.poppy-maintenance__contact {
			display: inline-flex;
			align-items: center;
			justify-content: center;
			min-height: 48px;
			margin-top: 26px;
			padding: 0 22px;
			border-radius: 12px;
			background: var(--poppy-maintenance-accent);
			color: #fff;
			font-size: .85rem;
			font-weight: 800;
			text-decoration: none;
			box-shadow: 0 10px 22px rgba(255, 139, 98, .22);
			transition: transform .2s ease, box-shadow .2s ease, background-color .2s ease;
		}

		.poppy-maintenance__contact:hover {
			background: #f47d54;
			box-shadow: 0 12px 26px rgba(255, 139, 98, .3);
			transform: translateY(-2px);
		}

		.poppy-maintenance__contact:focus-visible {
			outline: 3px solid rgba(38, 49, 58, .35);
			outline-offset: 4px;
		}

		.poppy-maintenance__footer {
			margin: 22px 0 0;
			color: rgba(38, 49, 58, .52);
			font-size: .75rem;
		}

		@media (max-width: 480px) {
			.poppy-maintenance {
				padding: 18px;
			}

			.poppy-maintenance__brand img {
				max-width: 180px;
				height: 42px;
			}

			.poppy-maintenance__card {
				border-radius: 26px;
			}
		}

		@media (prefers-reduced-motion: reduce) {
			.poppy-maintenance__contact {
				transition: none;
			}
		}
	</style>
</head>
<body class="poppy-maintenance">
	<main class="poppy-maintenance__shell" role="main">
		<div class="poppy-maintenance__brand">
			<img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php echo esc_attr( $site_name ); ?>">
		</div>

		<section class="poppy-maintenance__card" aria-labelledby="poppy-maintenance-title">
			<div class="poppy-maintenance__icon" aria-hidden="true">
				<svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
					<path d="M14.7 6.3a4.2 4.2 0 0 0-5.4 5.4L3.6 17.4a2.1 2.1 0 1 0 3 3l5.7-5.7a4.2 4.2 0 0 0 5.4-5.4l-2.5 2.5-2.1-.5-.5-2.1 2.5-2.9Z"></path>
				</svg>
			</div>
			<p class="poppy-maintenance__eyebrow"><?php esc_html_e( 'Pemberitahuan', 'poppy' ); ?></p>
			<h1 id="poppy-maintenance-title"><?php esc_html_e( 'Website sementara offline', 'poppy' ); ?></h1>
			<div class="poppy-maintenance__message"><?php echo wpautop( wp_kses_post( $message ) ); ?></div>

			<?php if ( $contact_enabled && $contact_url ) : ?>
				<a class="poppy-maintenance__contact" href="<?php echo esc_url( $contact_url ); ?>">
					<?php echo esc_html( $contact_label ); ?>
				</a>
			<?php endif; ?>

			<p class="poppy-maintenance__footer"><?php esc_html_e( 'Terima kasih atas pengertiannya.', 'poppy' ); ?></p>
		</section>
	</main>
</body>
</html>
