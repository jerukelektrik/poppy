<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package POPPY
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

</div><!-- #content -->

<?php
// Only show the pre-footer CTA on pages that are not using the Contact Us, About Us, 404, Blog, or Single Post templates
$exclude_cta = is_page_template( 'page-templates/template-contact-us.php' ) || is_page_template( 'page-templates/template-about-us.php' ) || is_404() || is_home() || is_singular( 'post' );
if ( ! $exclude_cta ) {
	get_template_part( 'template-parts/cta-section' );
}

// Adjust footer z-index on excluded pages to sit above #content (which is z-20)
$footer_z_index = $exclude_cta ? 30 : 10;
?>

	<footer id="colophon" class="site-footer bg-poppy-ink text-white pt-28 pb-12 md:pt-40 md:pb-16 rounded-t-[32px] md:rounded-t-[48px] relative z-10" style="position: relative; z-index: <?php echo $footer_z_index; ?>;">
		<div class="poppy-container grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
			
			<!-- Left Branding Column (4 cols) -->
			<div class="lg:col-span-4 flex flex-col md:flex-row items-start md:items-center gap-6 lg:gap-8">
				<!-- Airlangga White Logo branding -->
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center select-none">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/Logo white.webp" alt="<?php bloginfo( 'name' ); ?>" class="h-12 sm:h-14 w-auto object-contain">
				</a>

				<!-- Vertical separating line (desktop only) -->
				<div class="hidden md:block w-px h-16 bg-white/20 self-center"></div>
			</div>

			<!-- Right Columns: Quick Link lists (8 cols) -->
			<div class="lg:col-span-8 grid grid-cols-2 sm:grid-cols-3 gap-8 text-left">
				
				<!-- Column 1 -->
				<div>
					<h4 class="text-sm font-black text-white font-serif tracking-wider mb-4">Program</h4>
					<ul class="space-y-2 text-xs font-semibold text-white/60">
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:text-white transition">Home</a></li>
						<li><a href="<?php echo esc_url( home_url( '/english-for-kids' ) ); ?>" class="hover:text-white transition">English for Kids</a></li>
						<li><a href="<?php echo esc_url( home_url( '/pengembangan-diri' ) ); ?>" class="hover:text-white transition">Pengembangan Diri</a></li>
					</ul>
				</div>

				<!-- Column 2 -->
				<div>
					<h4 class="text-sm font-black text-white font-serif tracking-wider mb-4">Paket Belajar</h4>
					<ul class="space-y-2 text-xs font-semibold text-white/60">
						<li><a href="<?php echo esc_url( home_url( '/#programs' ) ); ?>" class="hover:text-white transition">Paket SD</a></li>
						<li><a href="<?php echo esc_url( home_url( '/#programs' ) ); ?>" class="hover:text-white transition">Paket SMP</a></li>
						<li><a href="<?php echo esc_url( home_url( '/#programs' ) ); ?>" class="hover:text-white transition">Paket SMA</a></li>
						<li><a href="<?php echo esc_url( home_url( '/#programs' ) ); ?>" class="hover:text-white transition">Paket UTBK</a></li>
					</ul>
				</div>

				<!-- Column 3 -->
				<div>
					<h4 class="text-sm font-black text-white font-serif tracking-wider mb-4">LKP Airlangga</h4>
					<ul class="space-y-2 text-xs font-semibold text-white/60">
						<li><a href="<?php echo esc_url( home_url( '/about-us' ) ); ?>" class="hover:text-white transition">About Us</a></li>
						<li><a href="<?php echo esc_url( home_url( '/contact-us' ) ); ?>" class="hover:text-white transition">Contact Us</a></li>
						<li><a href="<?php echo esc_url( home_url( '/contact-us' ) ); ?>" class="hover:text-white transition">Konsultasi</a></li>
						<li><a href="<?php echo esc_url( home_url( '/#cerita-alumni' ) ); ?>" class="hover:text-white transition">Cerita Alumni</a></li>
						<li><a href="<?php echo esc_url( home_url( '/#promo' ) ); ?>" class="hover:text-white transition">Promo</a></li>
					</ul>
				</div>

			</div>
		</div>

		<!-- Copyright Bottom bar -->
		<div class="poppy-container border-t border-white/10 mt-12 pt-6 text-center text-[10px] font-semibold text-white/40">
			<p>&copy; <?php echo date( 'Y' ); ?> LKP Airlangga. All rights reserved. Crafted by VNDC Digital Agency.</p>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
