<?php
/**
 * Template Name: English for Kids
 *
 * @package POPPY
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

<main id="primary" class="site-main english-kids-template">
	<!-- Hero Section -->
	<section class="relative overflow-hidden bg-[linear-gradient(135deg,#EEF9D9_0%,#99EAA7_100%)] pt-24 pb-0 md:pt-36 md:pb-24 lg:pt-40 lg:pb-32 rounded-b-[32px] md:rounded-b-[48px] lg:rounded-b-[60px]">
		<div class="poppy-container relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-6 md:gap-12 lg:gap-8 items-center">
			
			<!-- Left Column: Hero Text Content -->
			<div class="lg:col-span-7 flex flex-col justify-center text-left">
				<?php poppy_breadcrumbs( 'text-poppy-ink/70 justify-start', 'text-poppy-ink', 'text-poppy-ink/40' ); ?>
				<h1 class="seo-heading text-xs sm:text-sm font-extrabold uppercase tracking-wide text-poppy-ink mb-3 sm:mb-4 block">
					Kursus Bahasa Inggris Anak #1 di Metro Lampung
				</h1>
				
				<h2 class="text-3xl sm:text-4xl md:text-5xl lg:text-[52px] font-black leading-[1.15] mb-6 text-poppy-ink">
					Bikin Si Kecil Jago Bahasa Inggris Lewat Metode Bermain yang Super Seru
				</h2>
				
				<p class="text-xs sm:text-sm md:text-base text-poppy-muted leading-relaxed max-w-xl mb-8 sm:mb-10 font-medium">
					Ubah waktu belajar menjadi waktu favorit si kecil. Dengan metode belajar yang menyenangkan, kami memastikan si Kecil memahami bahasa Inggris secara natural tanpa beban hafalan. Bekali masa depan mereka dengan kemampuan komunikasi global yang dimulai dari keceriaan di ruang kelas kami.
				</p>
				
				<div class="flex flex-wrap gap-4">
					<a href="#featured-programs" class="inline-flex items-center justify-center bg-poppy-accent hover:bg-poppy-accent/90 text-white font-extrabold text-xs sm:text-sm px-8 py-3.5 rounded-lg transition shadow-md shadow-poppy-accent/15">
						Lihat Program
					</a>
					<a href="https://wa.me/6282371966568?text=Halo%20kak%2C%20saya%20ingin%20konsultasi%20untuk%20kebutuhan%20belajar" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center bg-poppy-ink hover:bg-poppy-ink/90 text-white font-extrabold text-xs sm:text-sm px-8 py-3.5 rounded-lg transition shadow-md shadow-poppy-ink/15">
						Konsultasi
					</a>
				</div>
			</div>
			
			<!-- Right Column: Hero Image -->
			<div class="lg:col-span-5 relative h-auto sm:h-[460px] lg:h-[460px] flex items-end justify-center lg:justify-end">
				<img 
					src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/Hero image english.webp' ); ?>" 
					alt="Kursus Bahasa Inggris Anak LKP Airlangga" 
					class="relative z-10 w-full h-auto max-w-[420px] sm:max-w-[500px] lg:max-w-none lg:w-[580px] xl:w-[640px] lg:absolute lg:bottom-0 lg:right-[-40px] transform sm:translate-y-12 lg:translate-y-32 select-none pointer-events-none"
				/>
			</div>
			
		</div>
	</section>

	<!-- Why Choose Us Section -->
	<section class="poppy-section bg-white relative z-20">
		<div class="poppy-container">
			
			<!-- Section Header -->
			<div class="text-center max-w-3xl mx-auto mb-16">
				<h2 class="text-2xl sm:text-3xl md:text-4xl font-black font-serif text-poppy-ink inline-block relative">
					Mengapa Bimbel di
					<span class="relative inline-block text-poppy-ink">
						<!-- Decorative curved line under the highlighted phrase (red) -->
						<span class="absolute left-1/2 top-full mt-2 transform -translate-x-1/2 w-full">
							<svg viewBox="0 0 178 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full">
								<path d="M2 10C35 4 143 4 176 10" stroke="#BD4B3B" stroke-width="4" stroke-linecap="round"/>
							</svg>
						</span>LKP Airlangga</span>?
				</h2>
				
				<p class="text-xs sm:text-sm md:text-base text-poppy-muted leading-relaxed mt-10 font-medium">
					Kami hadir sejak tahun 1996, dimana ribuan alumni kami berhasil meraih impian masuk ke sekolah & kampus favorit di Indonesia. LKP Airlangga tak hanya sekadar memberikan materi, namun kami hadir memberikan solusi untuk cara belajar yang lebih efektif & menyenangkan.
				</p>
			</div>

			<!-- Grid of Features/Cards -->
			<div class="grid grid-cols-2 lg:grid-cols-4 gap-8 md:gap-12 mt-12">
				
				<!-- Feature Card 1 -->
				<div class="flex flex-col items-center text-center">
					<div class="w-20 h-20 sm:w-[88px] sm:h-[88px] flex items-center justify-center mb-3">
						<img 
							src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/Artboard 16.webp' ); ?>" 
							alt="Metode Enjoyable Learning" 
							class="max-w-full max-h-full object-contain transition hover:scale-105 duration-300 select-none pointer-events-none"
						/>
					</div>
					<h3 class="text-xs sm:text-sm md:text-base feature-title font-black text-poppy-ink max-w-[180px] leading-snug">
						Metode Enjoyable Learning
					</h3>
				</div>

				<!-- Feature Card 2 -->
				<div class="flex flex-col items-center text-center">
					<div class="w-20 h-20 sm:w-[88px] sm:h-[88px] flex items-center justify-center mb-3">
						<img 
							src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/Artboard 17.webp' ); ?>" 
							alt="Fasilitas Kelas yang Nyaman" 
							class="max-w-full max-h-full object-contain transition hover:scale-105 duration-300 select-none pointer-events-none"
						/>
					</div>
					<h3 class="text-xs sm:text-sm md:text-base feature-title font-black text-poppy-ink max-w-[180px] leading-snug">
						Fasilitas Kelas<span class="block md:inline"> yang Nyaman</span>
					</h3>
				</div>

				<!-- Feature Card 3 -->
				<div class="flex flex-col items-center text-center">
					<div class="w-20 h-20 sm:w-[88px] sm:h-[88px] flex items-center justify-center mb-3">
						<img 
							src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/Artboard 18.webp' ); ?>" 
							alt="Jadwal Fleksibel & Bebas Pilih Materi Belajar" 
							class="max-w-full max-h-full object-contain transition hover:scale-105 duration-300 select-none pointer-events-none"
						/>
					</div>
					<h3 class="text-xs sm:text-sm md:text-base feature-title font-black text-poppy-ink max-w-[180px] leading-snug">
						Jadwal Fleksibel & Bebas Pilih Materi Belajar
					</h3>
				</div>

				<!-- Feature Card 4 -->
				<div class="flex flex-col items-center text-center">
					<div class="w-20 h-20 sm:w-[88px] sm:h-[88px] flex items-center justify-center mb-3">
						<img 
							src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/Artboard 19.webp' ); ?>" 
							alt="Laporan Perkembangan belajar" 
							class="max-w-full max-h-full object-contain transition hover:scale-105 duration-300 select-none pointer-events-none"
						/>
					</div>
					<h3 class="text-xs sm:text-sm md:text-base feature-title font-black text-poppy-ink max-w-[180px] leading-snug">
						Laporan<span class="block md:inline"> Perkembangan belajar</span>
					</h3>
				</div>

			</div>
		</div>
	</section>

	<!-- Featured Programs Section (Landing Page) -->
	<section id="featured-programs" class="poppy-section bg-white pt-8 pb-16 relative z-20">
		<div class="poppy-container">
			<div class="bg-[linear-gradient(135deg,#EEF9D9_0%,#99EAA7_100%)] rounded-[32px] md:rounded-[48px] lg:rounded-[60px] py-16 px-6 sm:px-12 md:px-16 lg:px-20 relative overflow-hidden">
				
				<!-- Section Header -->
				<div class="text-center max-w-3xl mx-auto mb-16">
					<h2 class="text-2xl sm:text-3xl md:text-4xl font-black font-serif text-poppy-ink inline-block relative">
						Pilih Program Unggulan untuk
						<span class="relative inline-block text-poppy-ink">
							<!-- Decorative curved line under the highlighted phrase (red) -->
							<span class="absolute left-1/2 top-full mt-2 transform -translate-x-1/2 w-full">
								<svg viewBox="0 0 178 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full">
									<path d="M2 10C35 4 143 4 176 10" stroke="#BD4B3B" stroke-width="4" stroke-linecap="round"/>
								</svg>
							</span>Masa Depanmu</span>
					</h2>
				</div>

				<!-- Grid of Pricing Cards -->
				<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 relative z-10">
					
					<!-- Card 1 -->
					<div class="bg-white rounded-[24px] overflow-hidden shadow-md flex flex-col justify-between border-b-[8px] border-poppy-ink">
						<div>
							<!-- Header -->
							<div class="bg-[#3B6DBF] py-4 px-6 text-left">
								<h3 class="text-base sm:text-lg font-black text-white leading-tight">
									Children One
								</h3>
							</div>
							<!-- Body -->
							<div class="p-6 text-left">
								<p class="text-xs text-poppy-muted leading-relaxed mb-6 font-medium">
									Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
								</p>
							</div>
						</div>
						<!-- Footer/Price -->
						<div class="px-6 pb-6 text-left">
							<a href="https://wa.me/6282371966568?text=Halo%20kak%2C%20saya%20ingin%20konsultasi%20untuk%20kebutuhan%20belajar" target="_blank" rel="noopener noreferrer" class="w-full inline-flex items-center justify-center bg-[#3B6DBF] hover:opacity-90 text-white font-extrabold text-xs px-6 py-2.5 rounded-lg transition text-center">
								Konsultasi Sekarang
							</a>
						</div>
					</div>

					<!-- Card 2 -->
					<div class="bg-white rounded-[24px] overflow-hidden shadow-md flex flex-col justify-between border-b-[8px] border-poppy-ink">
						<div>
							<!-- Header -->
							<div class="bg-[#3A96B7] py-4 px-6 text-left">
								<h3 class="text-base sm:text-lg font-black text-white leading-tight">
									Children Two
								</h3>
							</div>
							<!-- Body -->
							<div class="p-6 text-left">
								<p class="text-xs text-poppy-muted leading-relaxed mb-6 font-medium">
									Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
								</p>
							</div>
						</div>
						<!-- Footer/Price -->
						<div class="px-6 pb-6 text-left">
							<a href="https://wa.me/6282371966568?text=Halo%20kak%2C%20saya%20ingin%20konsultasi%20untuk%20kebutuhan%20belajar" target="_blank" rel="noopener noreferrer" class="w-full inline-flex items-center justify-center bg-[#3A96B7] hover:opacity-90 text-white font-extrabold text-xs px-6 py-2.5 rounded-lg transition text-center">
								Konsultasi Sekarang
							</a>
						</div>
					</div>

					<!-- Card 3 -->
					<div class="bg-white rounded-[24px] overflow-hidden shadow-md flex flex-col justify-between border-b-[8px] border-poppy-ink">
						<div>
							<!-- Header -->
							<div class="bg-[#3BA7AA] py-4 px-6 text-left">
								<h3 class="text-base sm:text-lg font-black text-white leading-tight">
									Children Three
								</h3>
							</div>
							<!-- Body -->
							<div class="p-6 text-left">
								<p class="text-xs text-poppy-muted leading-relaxed mb-6 font-medium">
									Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
								</p>
							</div>
						</div>
						<!-- Footer/Price -->
						<div class="px-6 pb-6 text-left">
							<a href="https://wa.me/6282371966568?text=Halo%20kak%2C%20saya%20ingin%20konsultasi%20untuk%20kebutuhan%20belajar" target="_blank" rel="noopener noreferrer" class="w-full inline-flex items-center justify-center bg-[#3BA7AA] hover:opacity-90 text-white font-extrabold text-xs px-6 py-2.5 rounded-lg transition text-center">
								Konsultasi Sekarang
							</a>
						</div>
					</div>

					<!-- Card 4 -->
					<div class="bg-white rounded-[24px] overflow-hidden shadow-md flex flex-col justify-between border-b-[8px] border-poppy-ink">
						<div>
							<!-- Header -->
							<div class="bg-[#3CA986] py-4 px-6 text-left">
								<h3 class="text-base sm:text-lg font-black text-white leading-tight">
									Conversation Junior
								</h3>
							</div>
							<!-- Body -->
							<div class="p-6 text-left">
								<p class="text-xs text-poppy-muted leading-relaxed mb-6 font-medium">
									Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
								</p>
							</div>
						</div>
						<!-- Footer/Price -->
						<div class="px-6 pb-6 text-left">
							<a href="https://wa.me/6282371966568?text=Halo%20kak%2C%20saya%20ingin%20konsultasi%20untuk%20kebutuhan%20belajar" target="_blank" rel="noopener noreferrer" class="w-full inline-flex items-center justify-center bg-[#3CA986] hover:opacity-90 text-white font-extrabold text-xs px-6 py-2.5 rounded-lg transition text-center">
								Konsultasi Sekarang
							</a>
						</div>
					</div>

				</div>

			</div>
		</div>
	</section>
</main>

<?php get_template_part( 'template-parts/testimonials-section', null, array( 'show_on' => 'english-kids' ) ); ?>

<?php get_template_part( 'template-parts/promo-section', null, array( 'show_on' => 'english-kids' ) ); ?>

<!-- Unified Sections Wrapper with Left Pattern -->
<div class="relative bg-white z-20 overflow-hidden" style="position: relative; z-index: 20;">
	<!-- Large continuous background pattern on the left -->
	<div class="hidden md:block absolute top-0 left-0 md:w-[45%] lg:w-[35%] max-w-[600px] h-full pointer-events-none select-none z-0 overflow-hidden">
		<img 
			src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/pattern2.webp' ); ?>" 
			alt="" 
			class="h-full w-auto max-w-none object-left-top object-cover opacity-90"
		/>
	</div>

	<!-- Program Section -->
	<?php get_template_part( 'template-parts/program-section', null, array( 'show_on' => 'english-kids' ) ); ?>

	<!-- Clients Section -->
	<?php get_template_part( 'template-parts/clients-section' ); ?>
</div>

<?php
get_footer();
