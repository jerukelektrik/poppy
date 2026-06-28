<?php
/**
 * Template part for displaying the CTA section (Masih Ragu?)
 *
 * @package POPPY
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="bg-white pt-6 pb-0 md:pt-6 md:pb-0 relative z-30" style="position: relative; z-index: 30;">
	<div class="poppy-container relative z-10">
		
		<!-- CTA Outer Card Container (relative, overflow-visible to let head pop out, overlapping footer) -->
		<div class="relative text-white max-w-5xl mx-auto mt-8 mb-[-80px] md:mt-8 md:mb-[-140px] z-30 overflow-hidden md:overflow-visible rounded-[32px] md:rounded-none" style="position: relative; z-index: 30;">
			
			<!-- Clipped Background and Pattern Container (overflow-hidden to clip pattern!) -->
			<div class="absolute inset-0 bg-poppy-accent rounded-[32px] md:rounded-[48px] overflow-hidden z-0">
				<!-- Watermark pattern (clipped to rounded card) -->
				<img 
					src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/PatternCTAsection.webp' ); ?>" 
					alt="" 
					class="absolute bottom-0 right-0 w-[65%] sm:w-[50%] md:w-[45%] lg:w-[40%] h-auto opacity-35 z-0 pointer-events-none select-none"
				/>
			</div>

			<!-- Content Grid (relative, z-10, items-stretch to let column heights match card height) -->
			<div class="relative grid grid-cols-12 gap-0 md:gap-8 px-5 sm:px-12 md:px-16 overflow-visible z-10 min-h-[280px] md:min-h-[320px]">
				
				<!-- Left Column: Copywriting and CTA Action (7 cols) -->
				<div class="col-span-7 flex flex-col justify-center text-left py-4 pr-2 md:col-span-7 md:py-16 md:pr-0 relative z-20">
					<h2 class="cta-title text-2xl sm:text-3xl md:text-[38px] font-black font-serif leading-tight mb-3 md:mb-4">
						Masih Ragu Pilih<br />Program yang Tepat?
					</h2>
					<p class="cta-description text-xs sm:text-sm md:text-base text-white/90 leading-relaxed font-medium mb-5 md:mb-8 max-w-lg">
						Konsultasikan masa depan akademismu secara gratis dengan Konsultan Pendidikan kami. Kami siap membantu menemukan jalur suksesmu!
					</p>
					<div>
						<a 
							href="https://wa.me/6282371966568?text=Halo%20kak%2C%20saya%20ingin%20konsultasi%20untuk%20kebutuhan%20belajar" 
							target="_blank" 
							rel="noopener noreferrer"
							class="inline-flex items-center justify-center bg-poppy-ink hover:bg-poppy-ink/90 text-white font-extrabold text-xs sm:text-sm px-4 py-2.5 md:px-8 md:py-3.5 rounded-lg transition shadow-md shadow-poppy-ink/15"
						>
							Daftar Sekarang
						</a>
					</div>
				</div>

				<!-- Right Column: Student Image (5 cols, overflow-visible) -->
				<div class="col-span-5 md:col-span-5 relative h-full min-h-[280px] md:min-h-0 overflow-visible flex items-end justify-end">
					
					<!-- Desktop Layout (Overlapping absolute layout, flush at bottom, head pops out at top) -->
					<div class="hidden md:block absolute bottom-0 right-[-16px] lg:right-[-24px] w-[135%] max-w-[380px] lg:max-w-[420px] h-auto z-10 select-none pointer-events-none">
						<img 
							src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/CTAimage.webp' ); ?>" 
							alt="Konsultasi LKP Airlangga" 
							class="w-full h-auto block"
						/>
					</div>

					<!-- Mobile Layout (Inline stacked layout, flush at bottom) -->
					<div class="md:hidden absolute bottom-0 right-[-20px] w-[46vw] max-w-[210px] flex items-end justify-end z-10">
						<img 
							src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/CTAimage.webp' ); ?>" 
							alt="Konsultasi LKP Airlangga" 
							class="w-full h-auto block"
						/>
					</div>

				</div>

			</div>
		</div>

	</div>
</section>
