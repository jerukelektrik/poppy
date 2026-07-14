<?php
/**
 * Template Name: Pengembangan Diri
 *
 * @package POPPY
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

<main id="primary" class="site-main pengembangan-diri-template">
	<!-- Hero Section -->
	<section class="relative overflow-hidden bg-[linear-gradient(135deg,#A5E3FD_0%,#C4F8DD_50%,#FFF6E0_100%)] pt-24 pb-0 md:pt-36 md:pb-24 lg:pt-40 lg:pb-32 rounded-b-[32px] md:rounded-b-[48px] lg:rounded-b-[60px]">
		<div class="poppy-container relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-6 md:gap-12 lg:gap-8 items-center">
			
			<!-- Left Column: Hero Text Content -->
			<div class="lg:col-span-7 flex flex-col justify-center text-left">
				<?php poppy_breadcrumbs( 'text-poppy-ink/70 justify-start', 'text-poppy-ink', 'text-poppy-ink/40' ); ?>
				<h1 class="seo-heading text-xs sm:text-sm font-extrabold uppercase tracking-wide text-poppy-ink mb-3 sm:mb-4 block">
					Pengembangan Diri
				</h1>
				
				<h2 class="text-3xl sm:text-4xl md:text-5xl lg:text-[52px] font-black leading-[1.15] mb-6 text-poppy-ink">
					Kembangkan Potensi Terbaik Dirimu untuk Raih Masa Depan Cemerlang
				</h2>
				
				<p class="text-xs sm:text-sm md:text-base text-poppy-muted leading-relaxed max-w-xl mb-8 sm:mb-10 font-medium">
					Layanan konsultasi, coaching, dan pelatihan profesional untuk membantu individu serta institusi tumbuh, berkembang, dan mencapai performa maksimal dengan metode terukur.
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
					src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/hero image pengembangan.webp' ); ?>" 
					alt="Program Pengembangan Diri LKP Airlangga" 
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
			<div class="grid grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-8 md:gap-12 mt-12">
				
				<!-- Feature Card 1 -->
				<div class="bg-white rounded-[24px] sm:rounded-3xl p-4 sm:p-8 border border-slate-100/80 shadow-sm flex flex-col items-center text-center odd:last:col-span-2 lg:odd:last:col-span-1">
					<div class="w-16 h-16 sm:w-[88px] sm:h-[88px] flex items-center justify-center mb-3 sm:mb-4">
						<img 
							src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/Pengembangan Diri-Artboard 16.webp' ); ?>" 
							alt="Tenaga pengajar yang professional & kompeten" 
							class="max-w-full max-h-full object-contain transition hover:scale-105 duration-300 select-none pointer-events-none"
						/>
					</div>
					<h3 class="text-xs sm:text-sm md:text-base feature-title font-black text-poppy-ink max-w-[240px] leading-snug">
						Tenaga pengajar yang professional & kompeten
					</h3>
				</div>

				<!-- Feature Card 2 -->
				<div class="bg-white rounded-[24px] sm:rounded-3xl p-4 sm:p-8 border border-slate-100/80 shadow-sm flex flex-col items-center text-center odd:last:col-span-2 lg:odd:last:col-span-1">
					<div class="w-16 h-16 sm:w-[88px] sm:h-[88px] flex items-center justify-center mb-3 sm:mb-4">
						<img 
							src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/Pengembangan Diri-Artboard 17.webp' ); ?>" 
							alt="Pembelajaran lebih personal & dapat disesuaikan" 
							class="max-w-full max-h-full object-contain transition hover:scale-105 duration-300 select-none pointer-events-none"
						/>
					</div>
					<h3 class="text-xs sm:text-sm md:text-base feature-title font-black text-poppy-ink max-w-[240px] leading-snug">
						Pembelajaran lebih personal & dapat disesuaikan
					</h3>
				</div>

				<!-- Feature Card 3 -->
				<div class="bg-white rounded-[24px] sm:rounded-3xl p-4 sm:p-8 border border-slate-100/80 shadow-sm flex flex-col items-center text-center odd:last:col-span-2 lg:odd:last:col-span-1">
					<div class="w-16 h-16 sm:w-[88px] sm:h-[88px] flex items-center justify-center mb-3 sm:mb-4">
						<img 
							src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/Pengembangan Diri-Artboard 18.webp' ); ?>" 
							alt="Peningkatan motivasi belajar" 
							class="max-w-full max-h-full object-contain transition hover:scale-105 duration-300 select-none pointer-events-none"
						/>
					</div>
					<h3 class="text-xs sm:text-sm md:text-base feature-title font-black text-poppy-ink max-w-[240px] leading-snug">
						Peningkatan motivasi belajar
					</h3>
				</div>

				<!-- Feature Card 4 -->
				<div class="bg-white rounded-[24px] sm:rounded-3xl p-4 sm:p-8 border border-slate-100/80 shadow-sm flex flex-col items-center text-center odd:last:col-span-2 lg:odd:last:col-span-1">
					<div class="w-16 h-16 sm:w-[88px] sm:h-[88px] flex items-center justify-center mb-3 sm:mb-4">
						<img 
							src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/Konsultasi.webp' ); ?>" 
							alt="Laporan perkembangan belajar" 
							class="max-w-full max-h-full object-contain transition hover:scale-105 duration-300 select-none pointer-events-none"
						/>
					</div>
					<h3 class="text-xs sm:text-sm md:text-base feature-title font-black text-poppy-ink max-w-[240px] leading-snug">
						Laporan perkembangan belajar
					</h3>
				</div>

				<!-- Feature Card 5 -->
				<div class="bg-white rounded-[24px] sm:rounded-3xl p-4 sm:p-8 border border-slate-100/80 shadow-sm flex flex-col items-center text-center odd:last:col-span-2 lg:odd:last:col-span-1">
					<div class="w-16 h-16 sm:w-[88px] sm:h-[88px] flex items-center justify-center mb-3 sm:mb-4">
						<img 
							src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/Pengembangan Diri-Artboard 19.webp' ); ?>" 
							alt="Metode belajar aktif dengan latihan serta simulasi" 
							class="max-w-full max-h-full object-contain transition hover:scale-105 duration-300 select-none pointer-events-none"
						/>
					</div>
					<h3 class="text-xs sm:text-sm md:text-base feature-title font-black text-poppy-ink max-w-[240px] leading-snug">
						Metode belajar aktif dengan latihan serta simulasi
					</h3>
				</div>

				<!-- Feature Card 6 -->
				<div class="bg-white rounded-[24px] sm:rounded-3xl p-4 sm:p-8 border border-slate-100/80 shadow-sm flex flex-col items-center text-center odd:last:col-span-2 lg:odd:last:col-span-1">
					<div class="w-16 h-16 sm:w-[88px] sm:h-[88px] flex items-center justify-center mb-3 sm:mb-4">
						<img 
							src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/Pengembangan Diri-Artboard 20.webp' ); ?>" 
							alt="Gratis layanan konsultasi" 
							class="max-w-full max-h-full object-contain transition hover:scale-105 duration-300 select-none pointer-events-none"
						/>
					</div>
					<h3 class="text-xs sm:text-sm md:text-base feature-title font-black text-poppy-ink max-w-[240px] leading-snug">
						Gratis layanan konsultasi
					</h3>
				</div>

			</div>
		</div>
	</section>

	<!-- Featured Programs Section (Landing Page) -->
	<section id="featured-programs" class="poppy-section bg-white pt-8 pb-16 relative z-20">
		<div class="poppy-container">
			<div class="bg-[linear-gradient(135deg,#A5E3FD_0%,#C4F8DD_50%,#FFF6E0_100%)] rounded-[32px] md:rounded-[48px] lg:rounded-[60px] py-16 px-6 sm:px-12 md:px-16 lg:px-20 relative overflow-hidden">
				
				<!-- Section Header -->
				<div class="text-center max-w-3xl mx-auto mb-12">
					<h2 class="text-2xl sm:text-3xl md:text-4xl font-black font-serif text-poppy-ink inline-block relative">
						Pilih Program Unggulan untuk
						<span class="relative inline-block text-poppy-ink">
							<!-- Decorative curved line under the highlighted phrase (yellow/orange) -->
							<span class="absolute left-1/2 top-full mt-2 transform -translate-x-1/2 w-full">
								<svg viewBox="0 0 178 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full">
									<path d="M2 10C35 4 143 4 176 10" stroke="#F5A623" stroke-width="4" stroke-linecap="round"/>
								</svg>
							</span>Masa Depanmu</span>
					</h2>
				</div>

				<!-- Tab Navigation Controls -->
				<div class="flex justify-center gap-4 mb-12 relative z-10">
					<button 
						id="tab-btn-asesmen"
						class="px-6 py-3 rounded-full text-sm font-bold transition cursor-pointer bg-[linear-gradient(135deg,#3BA7AA_0%,#132039_100%)] text-white shadow-md"
						onclick="switchProgramTab('asesmen')"
					>
						Asesmen
					</button>
					<button 
						id="tab-btn-pengembangan"
						class="px-6 py-3 rounded-full text-sm font-bold transition cursor-pointer bg-white/80 hover:bg-white text-poppy-ink border border-poppy-ink/10 shadow-sm"
						onclick="switchProgramTab('pengembangan')"
					>
						Pengembangan Diri
					</button>
				</div>

				<!-- Tab 1 Grid: Asesmen -->
				<div id="tab-grid-asesmen" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 relative z-10 transition-all duration-300">
					
					<!-- Card 1: Asesmen Psikologi -->
					<div class="bg-white rounded-[24px] overflow-hidden shadow-md flex flex-col justify-between border-b-[8px] border-poppy-ink">
						<div>
							<!-- Header -->
							<div class="bg-[#3B6DBF] py-4 px-6 text-left">
								<h3 class="text-base sm:text-lg font-black text-white leading-tight">
									Asesmen Psikologi
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

					<!-- Card 2: Talent DNA -->
					<div class="bg-white rounded-[24px] overflow-hidden shadow-md flex flex-col justify-between border-b-[8px] border-poppy-ink">
						<div>
							<!-- Header -->
							<div class="bg-[#3A96B7] py-4 px-6 text-left">
								<h3 class="text-base sm:text-lg font-black text-white leading-tight">
									Talent DNA
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

					<!-- Card 3: Test Kesiapan Belajar -->
					<div class="bg-white rounded-[24px] overflow-hidden shadow-md flex flex-col justify-between border-b-[8px] border-poppy-ink">
						<div>
							<!-- Header -->
							<div class="bg-[#3BA7AA] py-4 px-6 text-left">
								<h3 class="text-base sm:text-lg font-black text-white leading-tight">
									Test Kesiapan Belajar
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

					<!-- Card 4: Pemetaan SDM -->
					<div class="bg-white rounded-[24px] overflow-hidden shadow-md flex flex-col justify-between border-b-[8px] border-poppy-ink">
						<div>
							<!-- Header -->
							<div class="bg-[#3CA986] py-4 px-6 text-left">
								<h3 class="text-base sm:text-lg font-black text-white leading-tight">
									Pemetaan SDM
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

				<!-- Tab 2 Grid: Pengembangan Diri (Airlangga Consulting Packages) -->
				<div id="tab-grid-pengembangan" class="hidden grid-cols-1 sm:grid-cols-2 gap-6 max-w-3xl mx-auto relative z-10 transition-all duration-300">
					
					<!-- Card 1: Coaching Karier -->
					<div class="bg-white rounded-[24px] overflow-hidden shadow-md flex flex-col justify-between border-b-[8px] border-poppy-ink">
						<div>
							<!-- Header -->
							<div class="bg-[#3B6DBF] py-4 px-6 text-left">
								<h3 class="text-base sm:text-lg font-black text-white leading-tight">
									Coaching Karier
								</h3>
							</div>
							<!-- Body -->
							<div class="p-6 text-left">
								<p class="text-xs text-poppy-muted leading-relaxed mb-6 font-medium">
									Pendampingan untuk membantu menentukan arah pendidikan dan karier berdasarkan potensi, minat, dan tujuan hidup.
								</p>
							</div>
						</div>
						<!-- Footer -->
						<div class="px-6 pb-6 text-left">
							<a href="https://wa.me/6282371966568?text=Halo%20kak%2C%20saya%20ingin%20konsultasi%20untuk%20kebutuhan%20belajar" target="_blank" rel="noopener noreferrer" class="w-full inline-flex items-center justify-center bg-[#3B6DBF] hover:opacity-90 text-white font-extrabold text-xs px-6 py-2.5 rounded-lg transition text-center">
								Konsultasi Sekarang
							</a>
						</div>
					</div>

					<!-- Card 2: Konseling -->
					<div class="bg-white rounded-[24px] overflow-hidden shadow-md flex flex-col justify-between border-b-[8px] border-poppy-ink">
						<div>
							<!-- Header -->
							<div class="bg-[#3BA7AA] py-4 px-6 text-left">
								<h3 class="text-base sm:text-lg font-black text-white leading-tight">
									Konseling
								</h3>
							</div>
							<!-- Body -->
							<div class="p-6 text-left">
								<p class="text-xs text-poppy-muted leading-relaxed mb-6 font-medium">
									Layanan profesional untuk membantu mengatasi tantangan pribadi, akademik, maupun pekerjaan sehingga mampu berkembang secara optimal.
								</p>
							</div>
						</div>
						<!-- Footer -->
						<div class="px-6 pb-6 text-left">
							<a href="https://wa.me/6282371966568?text=Halo%20kak%2C%20saya%20ingin%20konsultasi%20untuk%20kebutuhan%20belajar" target="_blank" rel="noopener noreferrer" class="w-full inline-flex items-center justify-center bg-[#3BA7AA] hover:opacity-90 text-white font-extrabold text-xs px-6 py-2.5 rounded-lg transition text-center">
								Konsultasi Sekarang
							</a>
						</div>
					</div>

				</div>

			</div>
		</div>
	</section>

	<!-- Tab Switching Script -->
	<script>
		function switchProgramTab(tabName) {
			const btnAsesmen = document.getElementById('tab-btn-asesmen');
			const btnPengembangan = document.getElementById('tab-btn-pengembangan');
			const gridAsesmen = document.getElementById('tab-grid-asesmen');
			const gridPengembangan = document.getElementById('tab-grid-pengembangan');

			if (tabName === 'asesmen') {
				// Activate Asesmen button
				btnAsesmen.className = "px-6 py-3 rounded-full text-sm font-bold transition cursor-pointer bg-[linear-gradient(135deg,#3BA7AA_0%,#132039_100%)] text-white shadow-md";
				// Deactivate Pengembangan Diri button
				btnPengembangan.className = "px-6 py-3 rounded-full text-sm font-bold transition cursor-pointer bg-white/80 hover:bg-white text-poppy-ink border border-poppy-ink/10 shadow-sm";
				
				// Show Asesmen grid, hide Pengembangan Diri
				gridAsesmen.classList.remove('hidden');
				gridAsesmen.classList.add('grid');
				gridPengembangan.classList.remove('grid');
				gridPengembangan.classList.add('hidden');
			} else {
				// Activate Pengembangan Diri button
				btnPengembangan.className = "px-6 py-3 rounded-full text-sm font-bold transition cursor-pointer bg-[linear-gradient(135deg,#3BA7AA_0%,#132039_100%)] text-white shadow-md";
				// Deactivate Asesmen button
				btnAsesmen.className = "px-6 py-3 rounded-full text-sm font-bold transition cursor-pointer bg-white/80 hover:bg-white text-poppy-ink border border-poppy-ink/10 shadow-sm";

				// Show Pengembangan Diri grid, hide Asesmen
				gridPengembangan.classList.remove('hidden');
				gridPengembangan.classList.add('grid');
				gridAsesmen.classList.remove('grid');
				gridAsesmen.classList.add('hidden');
			}
		}
	</script>
</main>

<?php get_template_part( 'template-parts/testimonials-section', null, array( 'show_on' => 'pengembangan-diri' ) ); ?>

<?php get_template_part( 'template-parts/promo-section', null, array( 'show_on' => 'pengembangan-diri' ) ); ?>

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
	<?php get_template_part( 'template-parts/program-section', null, array( 'show_on' => 'pengembangan-diri' ) ); ?>

	<!-- Clients Section -->
	<?php get_template_part( 'template-parts/clients-section' ); ?>
</div>

<?php
get_footer();
