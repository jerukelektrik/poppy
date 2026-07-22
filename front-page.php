<?php
/**
 * The template for displaying the front page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package POPPY
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

<main id="primary" class="site-main front-page-content">

	<!-- Hero Section -->
	<section class="relative overflow-hidden bg-poppy-paper pt-24 pb-0 md:pt-32 md:pb-16 lg:pt-36 lg:pb-24 rounded-b-[32px] md:rounded-b-[48px] lg:rounded-b-[60px]">
		
		<!-- Large watermark pattern positioned absolute to the section (top-right) -->
		<div class="absolute top-0 right-0 w-[75%] sm:w-[60%] lg:w-[50%] max-w-[850px] h-[110%] opacity-85 pointer-events-none select-none z-0">
			<img 
				src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/pattern%20hero%20section.webp' ); ?>" 
				alt="Background Pattern" 
				class="w-full h-full object-right-top object-contain"
			/>
		</div>

		<div class="poppy-container relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-6 md:gap-12 lg:gap-8 items-center">
			
			<!-- Left Column: Hero Text Content -->
			<div class="lg:col-span-7 flex flex-col justify-center text-left relative z-10">
				<!-- Pill Badge -->
				<div class="mb-4">
					<span class="inline-flex items-center gap-3 bg-[#FFF2EE] border border-[#FFDEC8] text-poppy-accent font-extrabold text-[11px] sm:text-xs px-6 py-2 rounded-full select-none">
						<span class="text-[13px] sm:text-[15px] leading-none">★</span> Bimbel SD, SMP, SMA Terbaik di Metro Lampung
					</span>
				</div>
				
				<h2 class="text-4xl sm:text-5xl md:text-[56px] lg:text-[60px] xl:text-[68px] font-black leading-[1.15] mb-6 text-poppy-ink">
					Belajar Lebih Seru, <br />
					Raih <span class="text-poppy-accent">Sekolah & <br />Kampus Impian</span>
				</h2>
				
				<p class="text-xs sm:text-sm md:text-base text-poppy-muted leading-relaxed max-w-xl mb-8 font-medium">
					Wujudkan impianmu masuk sekolah & kampus favorit bersama LKP Airlangga. Kami menggabungkan metode belajar adaptif dengan pengajar profesional untuk memastikan kamu paham setiap materi tanpa beban. Yuk, jadi bagian dari ribuan siswa berprestasi di seluruh Indonesia.
				</p>

				<!-- Hero Stats Cards (Direct Image Assets) -->
				<div class="flex flex-wrap gap-3 sm:gap-4 mb-8 sm:mb-10">
					<img 
						src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/icon-hero-1.webp' ); ?>" 
						alt="5000+ Alumni" 
						class="h-24 sm:h-28 w-auto object-contain select-none pointer-events-none"
					/>
					<img 
						src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/icon-hero-2.webp' ); ?>" 
						alt="17+ Mitra" 
						class="h-24 sm:h-28 w-auto object-contain select-none pointer-events-none"
					/>
					<img 
						src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/icon-hero-3.webp' ); ?>" 
						alt="10+ Pengajar Profesional" 
						class="h-24 sm:h-28 w-auto object-contain select-none pointer-events-none"
					/>
				</div>
				
				<div class="flex flex-wrap gap-4">
					<a href="#programs" class="inline-flex items-center justify-center bg-poppy-accent hover:bg-poppy-accent/90 text-white font-extrabold text-xs sm:text-sm px-8 py-3.5 rounded-lg transition shadow-md shadow-poppy-accent/15">
						Lihat Program
					</a>
					<a href="https://wa.me/6282371966568?text=Halo%20kak%2C%20saya%20ingin%20konsultasi%20untuk%20kebutuhan%20belajar" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center bg-poppy-ink hover:bg-poppy-ink/90 text-white font-extrabold text-xs sm:text-sm px-8 py-3.5 rounded-lg transition shadow-md shadow-poppy-ink/15">
						Konsultasi
					</a>
				</div>
			</div>
			
			<!-- Right Column: Hero Image -->
			<div class="lg:col-span-5 relative h-auto sm:h-[460px] lg:h-[460px] flex items-end justify-center lg:justify-end">
				<!-- Large Hero Image (Students) -->
				<style>
					/* High specificity rules to override theme-wide img max-width constraints */
					main.site-main img.hero-student-image {
						width: 320px !important;
						max-width: none !important;
						transform: translateY(60px) !important;
					}
					@media (min-width: 640px) {
						main.site-main img.hero-student-image {
							width: 500px !important;
							transform: translateY(130px) !important;
						}
					}
					@media (min-width: 1024px) {
						main.site-main img.hero-student-image {
							width: 700px !important;
							transform: translateY(210px) !important;
						}
					}
					@media (min-width: 1280px) {
						main.site-main img.hero-student-image {
							width: 780px !important;
						}
					}
				</style>
				<img 
					src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/hero%20image.webp' ); ?>" 
					alt="Siswa Berprestasi LKP Airlangga" 
					class="hero-student-image relative z-10 h-auto lg:absolute lg:bottom-0 lg:right-[-40px] block select-none pointer-events-none"
				/>
			</div>
			
		</div>
	</section>
 
	<!-- Why Choose Us Section -->
	<section class="poppy-section bg-white relative z-20">
		<div class="poppy-container">
			
			<!-- Section Header -->
			<div class="text-center max-w-3xl mx-auto mb-16">
				<h2 class="text-2xl sm:text-3xl md:text-4xl font-black font-serif text-poppy-accent inline-block relative">
					Mengapa Bimbel di
					<span class="relative inline-block">
						<!-- Decorative curved line under the highlighted phrase -->
						<span class="absolute left-1/2 top-full mt-2 transform -translate-x-1/2 w-full">
							<svg viewBox="0 0 178 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full">
								<path d="M2 10C35 4 143 4 176 10" stroke="#132039" stroke-width="4" stroke-linecap="round"/>
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
							src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/icon1.webp' ); ?>" 
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
							src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/icon2.webp' ); ?>" 
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
							src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/icon3.webp' ); ?>" 
							alt="Jadwal Fleksibel & Bebas Pilih Materi" 
							class="max-w-full max-h-full object-contain transition hover:scale-105 duration-300 select-none pointer-events-none"
						/>
					</div>
					<h3 class="text-xs sm:text-sm md:text-base feature-title font-black text-poppy-ink max-w-[180px] leading-snug">
						Jadwal Fleksibel & Bebas Pilih Materi
					</h3>
				</div>

				<!-- Feature Card 4 -->
				<div class="flex flex-col items-center text-center">
					<div class="w-20 h-20 sm:w-[88px] sm:h-[88px] flex items-center justify-center mb-3">
						<img 
							src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/icon4.webp' ); ?>" 
							alt="Laporan Perkembangan" 
							class="max-w-full max-h-full object-contain transition hover:scale-105 duration-300 select-none pointer-events-none"
						/>
					</div>
					<h3 class="text-xs sm:text-sm md:text-base feature-title font-black text-poppy-ink max-w-[180px] leading-snug">
						Laporan<span class="block md:inline"> Perkembangan</span>
					</h3>
				</div>

			</div>
		</div>
	</section>
 
	<!-- Featured Programs Section -->
	<section id="programs" class="poppy-section bg-white pt-8 pb-16 relative z-20">
		<div class="poppy-container">
			<div class="bg-[#F5F7FA] rounded-[32px] md:rounded-[48px] lg:rounded-[60px] py-16 px-6 sm:px-12 md:px-16 lg:px-20 relative overflow-hidden">
				
				<!-- Section Header -->
				<div class="text-center max-w-3xl mx-auto mb-12">
					<h2 class="text-2xl sm:text-3xl md:text-4xl font-black text-poppy-ink inline-block relative mb-4">
						Program Unggulan
						<span class="relative inline-block">
							Bimbel Airlangga
							<!-- Decorative curved line under the highlighted phrase (Terracotta) -->
							<span class="absolute left-1/2 top-full mt-1.5 transform -translate-x-1/2 w-full">
								<svg viewBox="0 0 178 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full">
									<path d="M2 10C35 4 143 4 176 10" stroke="#BD4B3B" stroke-width="4" stroke-linecap="round"/>
								</svg>
							</span>
						</span>
					</h2>
					<p class="text-xs sm:text-sm text-poppy-muted font-semibold leading-relaxed mt-6">
						Temukan paket belajar terbaik untuk mendukung prestasi dan persiapan jenjang berikutnya.
					</p>
				</div>

				<!-- Program Tabs -->
				<div class="flex flex-wrap items-center justify-center gap-3 sm:gap-4 mb-16">
					<button data-program-tab="sd" class="program-tab-btn active bg-gradient-to-r from-poppy-ink to-poppy-accent text-white font-black text-xs sm:text-sm px-8 py-3 rounded-full shadow-md transition transform hover:scale-[1.02] cursor-pointer">
						SD
					</button>
					<button data-program-tab="smp" class="program-tab-btn bg-[#E2E8F0]/60 hover:bg-[#E2E8F0] text-poppy-muted font-bold text-xs sm:text-sm px-8 py-3 rounded-full transition transform hover:scale-[1.02] cursor-pointer">
						SMP
					</button>
					<button data-program-tab="sma" class="program-tab-btn bg-[#E2E8F0]/60 hover:bg-[#E2E8F0] text-poppy-muted font-bold text-xs sm:text-sm px-8 py-3 rounded-full transition transform hover:scale-[1.02] cursor-pointer">
						SMA
					</button>
					<button data-program-tab="utbk" class="program-tab-btn bg-[#E2E8F0]/60 hover:bg-[#E2E8F0] text-poppy-muted font-bold text-xs sm:text-sm px-8 py-3 rounded-full transition transform hover:scale-[1.02] cursor-pointer">
						UTBK
					</button>
				</div>

				<!-- Tab Contents -->
				<div id="program-contents-wrapper">
					
					<!-- SD Program Content -->
					<div data-program-content="sd" class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-3xl mx-auto">
						
						<!-- Card 1: Kelas IV & V -->
						<div class="bg-white rounded-[32px] p-6 sm:p-8 shadow-sm hover:shadow-md transition-shadow duration-300 flex flex-col justify-between h-full min-h-[460px] max-w-[360px] mx-auto w-full">
							<div>
								<!-- Card Header -->
								<div class="flex items-center justify-between mb-8">
									<div class="-ml-6 sm:-ml-8 bg-poppy-accent text-white py-3 pl-6 sm:pl-8 pr-8 rounded-r-full font-black text-base sm:text-lg font-serif leading-none">
										Kelas IV & V
									</div>
									<div class="flex flex-col text-right">
										<span class="text-poppy-accent font-extrabold text-xs sm:text-sm">2 Sesi/minggu</span>
										<span class="text-poppy-muted text-[10px] sm:text-xs font-semibold">10 Siswa/kelas</span>
									</div>
								</div>

								<!-- Card Features -->
								<ul class="space-y-2 mb-8 text-left text-[#2D3748] text-xs sm:text-sm font-medium">
									<li>&bull; Modul</li>
									<li>&bull; Try Out</li>
									<li>&bull; Pendampingan PTS/PAS/US</li>
									<li>&bull; Extra Hour</li>
									<li class="leading-relaxed">&bull; Asesmen Minat Bakat (IQ, Kecenderungan minat, gaya belajar)</li>
									<li>&bull; Pendampingan Psikologi</li>
									<li>&bull; Extra Ordinary Class (Outdor Class)</li>
								</ul>
							</div>

							<!-- Card Footer -->
							<div>
								<hr class="border-poppy-line/50 mb-6" />
								<div class="w-full">
									<a href="https://wa.me/6282371966568?text=Halo%20kak%2C%20saya%20ingin%20konsultasi%20untuk%20kebutuhan%20belajar" target="_blank" rel="noopener noreferrer" class="w-full inline-flex items-center justify-center bg-poppy-accent hover:bg-poppy-accent/90 text-white font-extrabold text-xs sm:text-sm px-6 py-3 rounded-xl transition shadow-sm text-center">
										Konsultasi Sekarang
									</a>
								</div>
							</div>
						</div>

						<!-- Card 2: Kelas VI -->
						<div class="bg-white rounded-[32px] p-6 sm:p-8 shadow-sm hover:shadow-md transition-shadow duration-300 flex flex-col justify-between h-full min-h-[460px] max-w-[360px] mx-auto w-full">
							<div>
								<!-- Card Header -->
								<div class="flex items-center justify-between mb-8">
									<div class="-ml-6 sm:-ml-8 bg-poppy-ink text-white py-3 pl-6 sm:pl-8 pr-8 rounded-r-full font-black text-base sm:text-lg font-serif leading-none">
										Kelas VI
									</div>
									<div class="flex flex-col text-right">
										<span class="text-poppy-ink font-extrabold text-xs sm:text-sm">3 Sesi/minggu</span>
										<span class="text-poppy-muted text-[10px] sm:text-xs font-semibold">10 Siswa/kelas</span>
									</div>
								</div>

								<!-- Card Features -->
								<ul class="space-y-2 mb-8 text-left text-[#2D3748] text-xs sm:text-sm font-medium">
									<li>&bull; Modul</li>
									<li>&bull; Try Out</li>
									<li>&bull; Pendampingan PTS/PAS/US</li>
									<li>&bull; Extra Hour</li>
									<li class="leading-relaxed">&bull; Asesmen Minat Bakat (IQ, Kecenderungan minat, gaya belajar)</li>
									<li>&bull; Pendampingan Psikologi</li>
									<li>&bull; Extra Ordinary Class (Outdor Class)</li>
								</ul>
							</div>

							<!-- Card Footer -->
							<div>
								<hr class="border-poppy-line/50 mb-6" />
								<div class="w-full">
									<a href="https://wa.me/6282371966568?text=Halo%20kak%2C%20saya%20ingin%20konsultasi%20untuk%20kebutuhan%20belajar" target="_blank" rel="noopener noreferrer" class="w-full inline-flex items-center justify-center bg-poppy-ink hover:bg-poppy-ink/90 text-white font-extrabold text-xs sm:text-sm px-6 py-3 rounded-xl transition shadow-sm text-center">
										Konsultasi Sekarang
									</a>
								</div>
							</div>
						</div>

					</div>

					<!-- SMP Program Content -->
					<div data-program-content="smp" class="hidden grid-cols-1 md:grid-cols-2 gap-8 max-w-3xl mx-auto">
						
						<!-- Card 1: SMP Kelas VII & VIII -->
						<div class="bg-white rounded-[32px] p-6 sm:p-8 shadow-sm hover:shadow-md transition-shadow duration-300 flex flex-col justify-between h-full min-h-[460px] max-w-[360px] mx-auto w-full">
							<div>
								<!-- Card Header -->
								<div class="flex items-center justify-between mb-8">
									<div class="-ml-6 sm:-ml-8 bg-poppy-accent text-white py-3 pl-6 sm:pl-8 pr-8 rounded-r-full font-black text-base sm:text-lg font-serif leading-none">
										Kelas VII & VIII
									</div>
									<div class="flex flex-col text-right">
										<span class="text-poppy-accent font-extrabold text-xs sm:text-sm">2 Sesi/minggu</span>
										<span class="text-poppy-muted text-[10px] sm:text-xs font-semibold">10 Siswa/kelas</span>
									</div>
								</div>

								<!-- Card Features -->
								<ul class="space-y-2 mb-8 text-left text-[#2D3748] text-xs sm:text-sm font-medium">
									<li>&bull; Modul</li>
									<li>&bull; Try Out</li>
									<li>&bull; Pendampingan PTS/PAS/US</li>
									<li>&bull; Extra Hour Service</li>
									<li class="leading-relaxed">&bull; Asesmen Minat Bakat (IQ, Kecenderungan minat, gaya belajar)</li>
									<li>&bull; Pendampingan Psikologi</li>
									<li>&bull; Extra Ordinary Class (Outdoor Class)</li>
								</ul>
							</div>

							<!-- Card Footer -->
							<div>
								<hr class="border-poppy-line/50 mb-6" />
								<div class="w-full">
									<a href="https://wa.me/6282371966568?text=Halo%20kak%2C%20saya%20ingin%20konsultasi%20untuk%20kebutuhan%20belajar" target="_blank" rel="noopener noreferrer" class="w-full inline-flex items-center justify-center bg-poppy-accent hover:bg-poppy-accent/90 text-white font-extrabold text-xs sm:text-sm px-6 py-3 rounded-xl transition shadow-sm text-center">
										Konsultasi Sekarang
									</a>
								</div>
							</div>
						</div>

						<!-- Card 2: SMP Kelas IX -->
						<div class="bg-white rounded-[32px] p-6 sm:p-8 shadow-sm hover:shadow-md transition-shadow duration-300 flex flex-col justify-between h-full min-h-[460px] max-w-[360px] mx-auto w-full">
							<div>
								<!-- Card Header -->
								<div class="flex items-center justify-between mb-8">
									<div class="-ml-6 sm:-ml-8 bg-poppy-ink text-white py-3 pl-6 sm:pl-8 pr-8 rounded-r-full font-black text-base sm:text-lg font-serif leading-none">
										Kelas IX
									</div>
									<div class="flex flex-col text-right">
										<span class="text-poppy-ink font-extrabold text-xs sm:text-sm">3 Sesi/minggu</span>
										<span class="text-poppy-muted text-[10px] sm:text-xs font-semibold">13 Siswa/kelas</span>
									</div>
								</div>

								<!-- Card Features -->
								<ul class="space-y-2 mb-8 text-left text-[#2D3748] text-xs sm:text-sm font-medium">
									<li>&bull; Modul</li>
									<li>&bull; Try Out</li>
									<li>&bull; Pendampingan PTS/PAS/US</li>
									<li>&bull; Extra Hour Service</li>
									<li class="leading-relaxed">&bull; Asesmen Minat Bakat (IQ, Kecenderungan minat, gaya belajar)</li>
									<li>&bull; Pendampingan Psikologi</li>
									<li>&bull; Extra Ordinary Class (Outdoor Class)</li>
								</ul>
							</div>

							<!-- Card Footer -->
							<div>
								<hr class="border-poppy-line/50 mb-6" />
								<div class="w-full">
									<a href="https://wa.me/6282371966568?text=Halo%20kak%2C%20saya%20ingin%20konsultasi%20untuk%20kebutuhan%20belajar" target="_blank" rel="noopener noreferrer" class="w-full inline-flex items-center justify-center bg-poppy-ink hover:bg-poppy-ink/90 text-white font-extrabold text-xs sm:text-sm px-6 py-3 rounded-xl transition shadow-sm text-center">
										Konsultasi Sekarang
									</a>
								</div>
							</div>
						</div>

					</div>

					<!-- SMA Program Content -->
					<div data-program-content="sma" class="hidden grid-cols-1 md:grid-cols-2 gap-8 max-w-3xl mx-auto">
						
						<!-- Card 1: SMA Kelas X & XI -->
						<div class="bg-white rounded-[32px] p-6 sm:p-8 shadow-sm hover:shadow-md transition-shadow duration-300 flex flex-col justify-between h-full min-h-[460px] max-w-[360px] mx-auto w-full">
							<div>
								<!-- Card Header -->
								<div class="flex items-center justify-between mb-8">
									<div class="-ml-6 sm:-ml-8 bg-poppy-accent text-white py-3 pl-6 sm:pl-8 pr-8 rounded-r-full font-black text-base sm:text-lg font-serif leading-none">
										Kelas X & XI
									</div>
									<div class="flex flex-col text-right">
										<span class="text-poppy-accent font-extrabold text-xs sm:text-sm">3 Sesi/minggu</span>
										<span class="text-poppy-muted text-[10px] sm:text-xs font-semibold">13 Siswa/kelas</span>
									</div>
								</div>

								<!-- Card Features -->
								<ul class="space-y-2 mb-8 text-left text-[#2D3748] text-xs sm:text-sm font-medium">
									<li>&bull; Modul</li>
									<li>&bull; Coaching Karir</li>
									<li>&bull; Try Out</li>
									<li>&bull; Pendampingan PTS/PAS/US</li>
									<li>&bull; Analisa SNBP</li>
									<li>&bull; Extra Hour Service</li>
									<li class="leading-relaxed">&bull; Asesmen Minat Bakat (IQ, Kecenderungan minat, gaya belajar)</li>
									<li>&bull; Pendampingan Psikologi</li>
									<li>&bull; Extra Ordinary Class (Outdoor Class)</li>
								</ul>
							</div>

							<!-- Card Footer -->
							<div>
								<hr class="border-poppy-line/50 mb-6" />
								<div class="w-full">
									<a href="https://wa.me/6282371966568?text=Halo%20kak%2C%20saya%20ingin%20konsultasi%20untuk%20kebutuhan%20belajar" target="_blank" rel="noopener noreferrer" class="w-full inline-flex items-center justify-center bg-poppy-accent hover:bg-poppy-accent/90 text-white font-extrabold text-xs sm:text-sm px-6 py-3 rounded-xl transition shadow-sm text-center">
										Konsultasi Sekarang
									</a>
								</div>
							</div>
						</div>

						<!-- Card 2: SMA Kelas XII -->
						<div class="bg-white rounded-[32px] p-6 sm:p-8 shadow-sm hover:shadow-md transition-shadow duration-300 flex flex-col justify-between h-full min-h-[460px] max-w-[360px] mx-auto w-full">
							<div>
								<!-- Card Header -->
								<div class="flex items-center justify-between mb-8">
									<div class="-ml-6 sm:-ml-8 bg-poppy-ink text-white py-3 pl-6 sm:pl-8 pr-8 rounded-r-full font-black text-base sm:text-lg font-serif leading-none">
										Kelas XII
									</div>
									<div class="flex flex-col text-right">
										<span class="text-poppy-ink font-extrabold text-xs sm:text-sm">3 Sesi/minggu</span>
										<span class="text-poppy-muted text-[10px] sm:text-xs font-semibold">13 Siswa/kelas</span>
									</div>
								</div>

								<!-- Card Features -->
								<ul class="space-y-2 mb-8 text-left text-[#2D3748] text-xs sm:text-sm font-medium">
									<li>&bull; Modul</li>
									<li>&bull; Coaching Karir</li>
									<li>&bull; Try Out UTBK-SNBT</li>
									<li>&bull; Pendampingan PTS/PAS/US</li>
									<li>&bull; Analisa SNBP</li>
									<li>&bull; Extra Hour Service</li>
									<li class="leading-relaxed">&bull; Asesmen Minat Bakat (IQ, Kecenderungan minat, gaya belajar)</li>
									<li>&bull; Pendampingan Psikologi</li>
									<li>&bull; Extra Ordinary Class (Outdoor Class)</li>
								</ul>
							</div>

							<!-- Card Footer -->
							<div>
								<hr class="border-poppy-line/50 mb-6" />
								<div class="w-full">
									<a href="https://wa.me/6282371966568?text=Halo%20kak%2C%20saya%20ingin%20konsultasi%20untuk%20kebutuhan%20belajar" target="_blank" rel="noopener noreferrer" class="w-full inline-flex items-center justify-center bg-poppy-ink hover:bg-poppy-ink/90 text-white font-extrabold text-xs sm:text-sm px-6 py-3 rounded-xl transition shadow-sm text-center">
										Konsultasi Sekarang
									</a>
								</div>
							</div>
						</div>

					</div>

					<!-- UTBK Program Content -->
					<div data-program-content="utbk" class="hidden grid-cols-1 gap-8 max-w-3xl mx-auto">
						
						<!-- Card 1: UTBK-SNBT -->
						<div class="bg-white rounded-[32px] p-6 sm:p-8 shadow-sm hover:shadow-md transition-shadow duration-300 flex flex-col justify-between h-full min-h-[460px] max-w-[360px] mx-auto w-full">
							<div>
								<!-- Card Header -->
								<div class="flex items-center justify-between mb-8">
									<div class="-ml-6 sm:-ml-8 bg-poppy-accent text-white py-3 pl-6 sm:pl-8 pr-8 rounded-r-full font-black text-base sm:text-lg font-serif leading-none">
										SNBT
									</div>
									<div class="flex flex-col text-right">
										<span class="text-poppy-accent font-extrabold text-xs sm:text-sm">3 Sesi/minggu</span>
										<span class="text-poppy-muted text-[10px] sm:text-xs font-semibold">13 Siswa/kelas</span>
									</div>
								</div>

								<!-- Card Features -->
								<ul class="space-y-2 mb-8 text-left text-[#2D3748] text-xs sm:text-sm font-medium">
									<li>&bull; Modul UTBK-SNBT</li>
									<li>&bull; Try Out UTBK-SNBT</li>
									<li>&bull; Pembahasan Soal</li>
									<li>&bull; TPS Penalaran Umum</li>
									<li>&bull; Literasi Bahasa Indonesia</li>
									<li>&bull; Literasi Bahasa Inggris</li>
									<li>&bull; Penalaran Matematika</li>
									<li>&bull; Coaching Jurusan & Kampus</li>
									<li>&bull; Extra Hour Service</li>
								</ul>
							</div>

							<!-- Card Footer -->
							<div>
								<hr class="border-poppy-line/50 mb-6" />
								<div class="w-full">
									<a href="https://wa.me/6282371966568?text=Halo%20kak%2C%20saya%20ingin%20konsultasi%20untuk%20kebutuhan%20belajar" target="_blank" rel="noopener noreferrer" class="w-full inline-flex items-center justify-center bg-poppy-accent hover:bg-poppy-accent/90 text-white font-extrabold text-xs sm:text-sm px-6 py-3 rounded-xl transition shadow-sm text-center">
										Konsultasi Sekarang
									</a>
								</div>
							</div>
						</div>

					</div>

				</div>

			</div>
		</div>
	</section>

	<!-- Simple interactive tab switcher script -->
	<script>
		document.addEventListener('DOMContentLoaded', () => {
			const tabs = document.querySelectorAll('[data-program-tab]');
			const contents = document.querySelectorAll('[data-program-content]');

			tabs.forEach(tab => {
				tab.addEventListener('click', () => {
					const target = tab.getAttribute('data-program-tab');

					// Reset tabs
					tabs.forEach(btn => {
						btn.className = 'program-tab-btn bg-[#E2E8F0]/60 hover:bg-[#E2E8F0] text-poppy-muted font-bold text-xs sm:text-sm px-8 py-3 rounded-full transition transform hover:scale-[1.02] cursor-pointer';
					});

					// Set active tab
					tab.className = 'program-tab-btn active bg-gradient-to-r from-poppy-ink to-poppy-accent text-white font-black text-xs sm:text-sm px-8 py-3 rounded-full shadow-md transition transform hover:scale-[1.02] cursor-pointer';

					// Show target content, hide others
					contents.forEach(content => {
						if (content.getAttribute('data-program-content') === target) {
							content.classList.remove('hidden');
							content.classList.add('grid');
						} else {
							content.classList.add('hidden');
							content.classList.remove('grid');
						}
					});
				});
			});
		});
	</script>
 
	<!-- Testimonials / Alumni Stories Section -->
	<?php get_template_part( 'template-parts/testimonials-section', null, array( 'show_on' => 'home' ) ); ?>

	<!-- Promo Section -->
	<?php get_template_part( 'template-parts/promo-section', null, array( 'show_on' => 'home' ) ); ?>

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
		<?php get_template_part( 'template-parts/program-section', null, array( 'show_on' => 'home' ) ); ?>

		<!-- Clients Section -->
		<?php get_template_part( 'template-parts/clients-section' ); ?>
	</div>

</main><!-- #primary -->

<?php
get_footer();
