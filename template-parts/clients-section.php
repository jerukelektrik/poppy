<?php
/**
 * Template part for displaying the Clients section (Dipercaya oleh 100+ Instansi & Institusi)
 *
 * @package POPPY
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="poppy-section bg-transparent pt-16 pb-10 relative z-20">

	<div class="poppy-container relative z-10">
		
		<!-- Section Header -->
		<div class="text-center max-w-3xl mx-auto mb-12">
			<h2 class="text-2xl sm:text-3xl md:text-4xl font-black text-poppy-ink inline-block relative">
				Dipercaya oleh 100+ Instansi & Institusi
				<!-- Decorative curved line under title (Terracotta) -->
				<span class="absolute left-1/2 bottom-[-16px] transform -translate-x-1/2 w-64">
					<svg viewBox="0 0 178 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full">
						<path d="M2 10C35 4 143 4 176 10" stroke="#BD4B3B" stroke-width="6" stroke-linecap="round"/>
					</svg>
				</span>
			</h2>
		</div>

		<!-- Client Logos Grid / Scrollable Container -->
		<div class="w-full max-w-5xl mx-auto mt-12 overflow-hidden">
			<div class="flex items-center justify-start lg:justify-center gap-8 md:gap-12 py-6 overflow-x-auto scrollbar-none snap-x snap-mandatory">
				
				<?php 
				$mitra_images = array(
					'mitra-1.png',
					'mitra-2.png',
					'mitra-3.png',
					'mitra-4.png',
					'mitra-6.png',
					'mitra-7.png',
					'mitra-8.png',
					'mitra-9.png',
					'mitra-10.png',
					'mitra-11.png',
					'mitra-12.png',
					'mitra-13.png',
				);
				foreach ( $mitra_images as $image ) : 
				?>
					<!-- Client Logo Box -->
					<div class="flex-shrink-0 snap-center flex items-center justify-center w-[140px] sm:w-[160px] md:w-[180px] h-20 opacity-85 hover:opacity-100 transition-opacity duration-300 select-none">
						<img 
							src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/' . $image ); ?>" 
							alt="Mitra LKP Airlangga" 
							class="max-h-12 max-w-full object-contain grayscale hover:grayscale-0 transition-all duration-300 filter"
						/>
					</div>
				<?php endforeach; ?>

			</div>

			<!-- Pagination Indicator Dots (Mockup match, hidden on desktop if too many items) -->
			<div class="flex sm:hidden items-center justify-center gap-2 mt-4">
				<button class="w-2.5 h-2.5 rounded-full bg-poppy-accent scale-110 cursor-pointer focus:outline-none" aria-label="Go to client slide 1"></button>
				<button class="w-2.5 h-2.5 rounded-full bg-gray-300 transition duration-300 cursor-pointer focus:outline-none" aria-label="Go to client slide 2"></button>
				<button class="w-2.5 h-2.5 rounded-full bg-gray-300 transition duration-300 cursor-pointer focus:outline-none" aria-label="Go to client slide 3"></button>
			</div>

		</div>
	</div>
</section>
