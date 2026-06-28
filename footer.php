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
			<div class="lg:col-span-4 flex flex-col gap-6">
				<div class="flex flex-col md:flex-row items-start md:items-center gap-6 lg:gap-8">
					<!-- Airlangga White Logo branding -->
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center select-none">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/Logo white.webp" alt="<?php bloginfo( 'name' ); ?>" class="h-12 sm:h-14 w-auto object-contain">
					</a>

					<!-- Vertical separating line (desktop only) -->
					<div class="hidden md:block w-px h-16 bg-white/20 self-center"></div>
				</div>

				<!-- Address -->
				<p class="text-xs sm:text-sm text-white/70 leading-relaxed font-semibold max-w-xs">
					JL. AR. Prawiranegara No.32, Metro, Kec. Metro Pusat, Kota Metro, Lampung 34111
				</p>

				<!-- Social Media Icons -->
				<?php
				$options = poppy_get_theme_options();
				$social_links = array();

				if ( ! empty( $options['whatsapp_number'] ) ) {
					$social_links['whatsapp'] = array(
						'url'  => 'https://wa.me/' . preg_replace( '/[^0-9]/', '', $options['whatsapp_number'] ),
						'icon' => '<svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12.004 2C6.51 2 2.014 6.5 2.014 12c0 2.14.675 4.14 1.83 5.8L2 22l4.31-1.13c1.55.85 3.32 1.3 5.17 1.3 5.49 0 9.99-4.5 9.99-10S16.5 2 12.004 2zm5.72 13.91c-.24.68-1.24 1.25-1.91 1.33-.56.07-1.3.11-3.67-.88-3.03-1.27-4.99-4.37-5.14-4.57-.15-.2-1.24-1.66-1.24-3.15 0-1.5.77-2.23 1.04-2.5.24-.25.64-.37.99-.37.11 0 .21 0 .3.01.27.01.41.03.59.45.23.55.78 1.9.85 2.05.07.15.11.33.01.53-.1.2-.21.3-.36.48-.15.18-.32.39-.46.53-.16.16-.33.34-.14.67.19.33.84 1.39 1.81 2.26 1.25 1.12 2.3 1.47 2.63 1.63.33.16.52.12.72-.1.2-.23.85-.99 1.08-1.34.22-.35.45-.3.75-.19.3.11 1.91.9 2.24 1.07.33.17.55.25.63.39.08.14.08.82-.16 1.5z"/></svg>'
					);
				}
				if ( ! empty( $options['facebook_url'] ) ) {
					$social_links['facebook'] = array(
						'url'  => $options['facebook_url'],
						'icon' => '<svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c4.56-.93 8-4.96 8-9.75z"/></svg>'
					);
				}
				if ( ! empty( $options['tiktok_url'] ) ) {
					$social_links['tiktok'] = array(
						'url'  => $options['tiktok_url'],
						'icon' => '<svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.01.08 1.53.63 3.02 1.59 4.23.95.84 2.19 1.4 3.51 1.55v3.83c-1.74-.08-3.41-.77-4.66-1.93-.07 2.82.02 5.64-.09 8.46-.19 2.17-1.28 4.24-3.14 5.41-2.07 1.43-4.88 1.83-7.25 1.05-2.22-.67-4.14-2.43-4.98-4.59-.97-2.37-.62-5.18.94-7.21 1.48-1.92 3.96-2.92 6.36-2.58.01 1.34-.01 2.68-.01 4.02-1.39-.32-2.9.15-3.8 1.25-.87.97-.99 2.45-.3 3.5.64 1.08 1.95 1.72 3.2 1.56 1.43-.09 2.68-1.2 2.86-2.62.13-2.61.03-5.22.06-7.83-.01-4.04-.01-8.08-.01-12.12z"/></svg>'
					);
				}
				if ( ! empty( $options['youtube_url'] ) ) {
					$social_links['youtube'] = array(
						'url'  => $options['youtube_url'],
						'icon' => '<svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M23.498 6.163a3.003 3.003 0 0 0-2.11-2.11C19.518 3.5 12 3.5 12 3.5s-7.518 0-9.388.503a3.003 3.003 0 0 0-2.11 2.11C0 8.033 0 12 0 12s0 3.967.502 5.837a3.003 3.003 0 0 0 2.11 2.11c1.87.503 9.388.503 9.388.503s7.518 0 9.388-.503a3.003 3.003 0 0 0 2.11-2.11C24 15.967 24 12 24 12s0-3.967-.502-5.837zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>'
					);
				}
				if ( ! empty( $options['linkedin_url'] ) ) {
					$social_links['linkedin'] = array(
						'url'  => $options['linkedin_url'],
						'icon' => '<svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>'
					);
				}
				if ( ! empty( $options['instagram_url'] ) ) {
					$social_links['instagram'] = array(
						'url'  => $options['instagram_url'],
						'icon' => '<svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.051.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.406-11.845a1.44 1.44 0 1 0 0 2.881 1.44 1.44 0 0 0 0-2.881z"/></svg>'
					);
				}

				if ( ! empty( $social_links ) ) :
				?>
					<div class="flex items-center gap-4 text-white/50">
						<?php foreach ( $social_links as $key => $social ) : ?>
							<a href="<?php echo esc_url( $social['url'] ); ?>" target="_blank" rel="noopener noreferrer" class="hover:text-white transition duration-200" title="<?php echo esc_attr( ucfirst( $key ) ); ?>">
								<?php echo $social['icon']; ?>
							</a>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
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
						<li><a href="<?php echo esc_url( home_url( '/blog' ) ); ?>" class="hover:text-white transition">Blog</a></li>
						<li><a href="https://wa.me/6282371966568?text=Halo%20kak%2C%20saya%20ingin%20konsultasi%20untuk%20kebutuhan%20belajar" target="_blank" rel="noopener noreferrer" class="hover:text-white transition">Konsultasi</a></li>
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
