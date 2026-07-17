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
<section class="poppy-section bg-white pt-20 pb-16 relative z-20 border-t border-slate-100/60">

	<div class="poppy-container relative z-10">
		
		<!-- Section Header (Revamped to match the clean mockup design) -->
		<div class="text-center max-w-4xl mx-auto mb-16 flex flex-col items-center">
			
			<!-- Blue Badge -->
			<span class="inline-flex items-center justify-center bg-[#3B6DBF] text-white font-extrabold text-[10px] sm:text-xs px-4 py-1.5 rounded-md uppercase tracking-wider mb-4 shadow-sm">
				Our Partners
			</span>
			
			<!-- Title -->
			<h2 class="text-2xl sm:text-3xl md:text-4xl font-serif font-black text-poppy-ink tracking-tight mb-4">
				Dipercaya oleh 100+ Instansi & Institusi
			</h2>
			
			<!-- Subtitle / Description -->
			<p class="text-xs sm:text-sm text-poppy-muted font-medium max-w-2xl mx-auto leading-relaxed">
				Kami bekerja sama dengan berbagai sekolah, universitas, perusahaan, dan instansi untuk menyelenggarakan asesmen psikologi, coaching karier, serta bimbingan belajar terbaik.
			</p>
			
		</div>

		<!-- Infinite Auto-scrolling Marquee -->
		<style>
			@keyframes marquee-scroll {
				0% { transform: translateX(0); }
				100% { transform: translateX(-50%); }
			}
			.marquee-container {
				display: flex;
				overflow: hidden;
				width: 100%;
				/* Gradient mask for smooth fade effect at edges */
				mask-image: linear-gradient(to right, transparent, black 15%, black 85%, transparent);
				-webkit-mask-image: linear-gradient(to right, transparent, black 15%, black 85%, transparent);
			}
			.marquee-content {
				display: flex;
				gap: 4rem; /* Spacing between logos */
				animation: marquee-scroll 45s linear infinite;
				width: max-content;
			}
			.marquee-content:hover {
				animation-play-state: paused;
			}
			.mitra-logo {
				max-height: 48px;
				width: auto;
				object-fit: contain;
				opacity: 0.75;
				transition: all 0.3s ease;
			}
			.mitra-logo:hover {
				opacity: 1;
				transform: scale(1.05);
			}
		</style>

		<div class="w-full max-w-6xl mx-auto mt-12 overflow-hidden">
			<div class="marquee-container py-4">
				<div class="marquee-content">
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
					// Render twice to build a seamless loop
					for ( $loop = 0; $loop < 2; $loop++ ) {
						foreach ( $mitra_images as $image ) {
							?>
							<div class="flex-shrink-0 flex items-center justify-center w-[120px] sm:w-[150px] h-16 select-none">
								<img 
									src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/' . $image ); ?>" 
									alt="Mitra LKP Airlangga" 
									class="mitra-logo"
								/>
							</div>
							<?php
						}
					}
					?>
				</div>
			</div>
		</div>
	</div>
</section>
