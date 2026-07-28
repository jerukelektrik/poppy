<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package POPPY
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<!doctype html>
<html lang="id">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="shortcut icon" href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/favicon.webp' ); ?>" type="image/x-icon">

	<?php wp_head(); ?>
</head>


<body <?php body_class( 'bg-white text-poppy-ink' ); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site min-h-screen flex flex-col justify-between">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'poppy' ); ?></a>

	<header id="masthead" class="site-header absolute top-0 left-0 w-full z-50 bg-transparent">
		<div class="poppy-container relative flex items-center justify-between py-4">
			<!-- Site Branding & Custom Logo -->
			<div class="site-branding">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center select-none">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/Logo.webp" alt="<?php bloginfo( 'name' ); ?>" class="h-10 sm:h-12 w-auto object-contain">
				</a>
			</div><!-- .site-branding -->

			<!-- Navigation Menu -->
			<nav id="site-navigation" class="main-navigation flex items-center gap-6">
				<!-- Desktop Menu (Fallback) -->
				<?php
				if ( has_nav_menu( 'primary' ) ) {
					wp_nav_menu(
						array(
							'theme_location' => 'primary',
							'menu_id'        => 'primary-menu',
							'container'      => false,
							'menu_class'     => 'nav-menu flex items-center gap-6 lg:gap-8 text-sm font-bold text-poppy-ink/80',
						)
					);
				} else {
					?>
					<ul class="nav-menu flex items-center gap-6 lg:gap-8 text-sm font-extrabold text-poppy-ink/80">
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:text-poppy-accent transition">Home</a></li>
						<li><a href="<?php echo esc_url( home_url( '/english-for-kids' ) ); ?>" class="hover:text-poppy-accent transition">English for Kids</a></li>
						<li><a href="<?php echo esc_url( home_url( '/pengembangan-diri' ) ); ?>" class="hover:text-poppy-accent transition">Airlangga Consultant Center</a></li>
						<li><a href="<?php echo esc_url( home_url( '/about-us' ) ); ?>" class="hover:text-poppy-accent transition">About Us</a></li>
						<li><a href="<?php echo esc_url( home_url( '/gallery' ) ); ?>" class="hover:text-poppy-accent transition">Gallery</a></li>
						<li><a href="<?php echo esc_url( home_url( '/contact-us' ) ); ?>" class="hover:text-poppy-accent transition">Contact Us</a></li>
					</ul>
					<?php
				}
				?>

				<!-- Right Side CTA & Mobile Toggle -->
				<div class="flex items-center gap-3">
					<a href="https://wa.me/6282371966568?text=Halo%20kak%2C%20saya%20ingin%20konsultasi%20untuk%20kebutuhan%20belajar" target="_blank" rel="noopener noreferrer" class="hidden md:inline-flex items-center justify-center bg-poppy-accent hover:bg-poppy-accent/90 text-white font-extrabold text-xs px-6 py-2.5 rounded-lg transition shadow-sm">
						Konsultasi
					</a>
					<button class="menu-toggle md:hidden p-2 text-poppy-ink hover:text-poppy-accent transition focus:outline-none" aria-controls="primary-menu" aria-expanded="false">
						<!-- Hamburger Icon -->
						<svg class="hamburger-icon w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
						</svg>
						<!-- Close Icon -->
						<svg class="close-icon hidden w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
						</svg>
					</button>
				</div>
			</nav><!-- #site-navigation -->
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content flex-grow relative z-20" style="position: relative; z-index: 20;">
