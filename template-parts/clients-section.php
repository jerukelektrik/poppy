<?php
/**
 * Template part for displaying the Clients section (Telah Sukses & Dipercaya oleh Banyak Mitra)
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
				Telah Sukses & Dipercaya oleh Banyak Mitra
				<!-- Decorative curved line under title (Terracotta) -->
				<span class="absolute left-1/2 bottom-[-16px] transform -translate-x-1/2 w-64">
					<svg viewBox="0 0 178 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full">
						<path d="M2 10C35 4 143 4 176 10" stroke="#BD4B3B" stroke-width="6" stroke-linecap="round"/>
					</svg>
				</span>
			</h2>
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
				max-height: 80px;
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
						'mitra-14.webp',
						'mitra-15.png',
						'mitra-16.jpg',
						'mitra-17.jpg',
					);
					// Render twice to build a seamless loop
					for ( $loop = 0; $loop < 2; $loop++ ) {
						foreach ( $mitra_images as $image ) {
							?>
							<div class="flex-shrink-0 flex items-center justify-center w-[180px] sm:w-[240px] h-32 select-none">
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
