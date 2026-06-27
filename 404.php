<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package POPPY
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

<main id="primary" class="site-main error-404-template flex-grow">
	<!-- Hero / Error content section (Overlapping Footer) -->
	<section class="relative overflow-hidden bg-[linear-gradient(135deg,#A5E3FD_0%,#C4F8DD_50%,#FFF6E0_100%)] pt-36 pb-24 md:pt-48 md:pb-36 lg:pt-56 lg:pb-48 rounded-b-[32px] md:rounded-b-[48px] lg:rounded-b-[60px] relative z-10 mb-[-80px] md:mb-[-140px] min-h-[75vh] flex items-center justify-center">
		<!-- Dark overlay to ensure header text readability -->
		<div class="absolute inset-0 bg-white/10 z-0"></div>
		
		<div class="poppy-container relative z-10 flex flex-col items-center justify-center text-center px-4">
			
			<h1 class="text-7xl sm:text-8xl md:text-[120px] font-black text-poppy-ink leading-none tracking-tighter mb-4 font-serif">
				404
			</h1>

			<h2 class="text-xl sm:text-2xl md:text-3xl font-black text-poppy-accent mb-6 uppercase tracking-wide font-serif">
				Halaman Tidak Ditemukan
			</h2>

			<p class="text-xs sm:text-sm md:text-base text-poppy-muted max-w-md mb-10 leading-relaxed font-semibold">
				Maaf, halaman yang Anda cari tidak dapat ditemukan. Mungkin halaman telah dihapus, dipindahkan, atau Anda salah menuliskan URL.
			</p>

			<div>
				<a 
					href="<?php echo esc_url( home_url( '/' ) ); ?>" 
					class="inline-flex items-center justify-center bg-poppy-accent hover:bg-poppy-accent/90 text-white font-extrabold text-xs sm:text-sm px-8 py-3.5 rounded-lg transition shadow-md shadow-poppy-accent/15"
				>
					Kembali ke Beranda
				</a>
			</div>

		</div>
	</section>
</main>

<?php
get_footer();
