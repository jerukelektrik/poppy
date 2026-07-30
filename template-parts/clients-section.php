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
						<path d="M2 10C35 4 143 4 176 10" stroke="#e34a0d" stroke-width="6" stroke-linecap="round"/>
					</svg>
				</span>
			</h2>
		</div>

		<!-- Partner Logo Carousel -->
		<style>
			.mitra-carousel {
				position: relative;
			}
			.mitra-carousel-track {
				display: flex;
				gap: 1.5rem;
				overflow-x: auto;
				padding: 1rem 3.5rem;
				scroll-behavior: smooth;
				scroll-snap-type: x mandatory;
				scrollbar-width: none;
			}
			.mitra-carousel-track::-webkit-scrollbar { display: none; }
			.mitra-logo-item {
				display: flex;
				flex: 0 0 140px;
				height: 6rem;
				align-items: center;
				justify-content: center;
				scroll-snap-align: center;
			}
			.mitra-logo {
				max-height: 72px;
				width: auto;
				object-fit: contain;
				opacity: 0.75;
				transition: opacity 0.3s ease, transform 0.3s ease;
			}
			.mitra-logo:hover {
				opacity: 1;
				transform: scale(1.05);
			}
			.mitra-carousel-arrow {
				position: absolute;
				top: 50%;
				z-index: 10;
				display: flex;
				width: 40px;
				height: 40px;
				align-items: center;
				justify-content: center;
				border: 1px solid #e2e8f0;
				border-radius: 9999px;
				box-shadow: 0 4px 10px rgba(19, 32, 57, 0.12);
				transform: translateY(-50%);
			}
			.mitra-carousel-prev { left: 8px; background: #fff; color: #132039; }
			.mitra-carousel-next { right: 8px; background: #e34a0d; color: #fff; }
			@media (min-width: 640px) {
				.mitra-carousel-track { gap: 2rem; }
				.mitra-logo-item { flex-basis: 180px; height: 7rem; }
			}
			@media (max-width: 767px) {
				.mitra-carousel-arrow { display: none; }
			}
		</style>

		<div class="w-full max-w-6xl mx-auto mt-12">
			<div class="mitra-carousel">
				<div class="mitra-carousel-track">
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
					foreach ( $mitra_images as $image ) {
						?>
						<div class="mitra-logo-item select-none">
							<img 
								src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/' . $image ); ?>" 
								alt="Mitra LKP Airlangga" 
								class="mitra-logo"
							/>
						</div>
						<?php
					}
					?>
				</div>
				<button type="button" class="mitra-carousel-arrow mitra-carousel-prev" aria-label="<?php esc_attr_e( 'Previous partners', 'poppy' ); ?>">
					<svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"><path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
				</button>
				<button type="button" class="mitra-carousel-arrow mitra-carousel-next" aria-label="<?php esc_attr_e( 'Next partners', 'poppy' ); ?>">
					<svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"><path d="M9 6L15 12L9 18" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
				</button>
			</div>
		</div>
	</div>
</section>

<script>
document.addEventListener('DOMContentLoaded', () => {
	document.querySelectorAll('.mitra-carousel').forEach(carousel => {
		const track = carousel.querySelector('.mitra-carousel-track');
		const previous = carousel.querySelector('.mitra-carousel-prev');
		const next = carousel.querySelector('.mitra-carousel-next');
		if (!track || !previous || !next) return;

		const scrollAmount = () => Math.max(track.clientWidth - 96, 240);
		previous.addEventListener('click', () => track.scrollBy({ left: -scrollAmount(), behavior: 'smooth' }));
		next.addEventListener('click', () => track.scrollBy({ left: scrollAmount(), behavior: 'smooth' }));
	});
});
</script>
