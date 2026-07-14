<?php
/**
 * Template Name: About Us
 *
 * @package POPPY
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

<main id="primary" class="site-main about-us-template">
	<!-- Hero Section -->
	<section class="relative overflow-hidden bg-cover bg-center bg-no-repeat rounded-b-[32px] md:rounded-b-[48px] lg:rounded-b-[60px] pt-36 pb-20 md:pt-48 md:pb-28 lg:pt-56 lg:pb-36" style="background-image: url('<?php echo esc_url( get_template_directory_uri() . '/assets/images/About%20Us%20Background.webp' ); ?>');">
		<!-- Dark overlay to ensure header text readability -->
		<div class="absolute inset-0 bg-black/35 z-0"></div>
		
		<div class="poppy-container relative z-10 flex flex-col items-center justify-center text-center">
			<?php poppy_breadcrumbs(); ?>
			<h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-[52px] font-black text-white leading-tight tracking-tight drop-shadow-sm">
				About Us
			</h1>
		</div>
	</section>

	<!-- Details & Goals Section (Tentang Kami) -->
	<section class="poppy-section bg-white relative z-20">
		<div class="poppy-container grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">
			
			<!-- Left Column: Tentang Kami Description -->
			<div class="lg:col-span-6 flex flex-col items-start text-left">
				<h2 class="text-2xl sm:text-3xl md:text-[36px] font-black text-poppy-ink mb-10 tracking-tight font-serif inline-block relative">
					Tentang Kami
					<span class="absolute left-0 right-0 top-full mt-1.5 w-full">
						<svg viewBox="0 0 178 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full">
							<path d="M2 10C35 4 143 4 176 10" stroke="#BD4B3B" stroke-width="4" stroke-linecap="round"/>
						</svg>
					</span>
				</h2>

				<div class="text-xs sm:text-sm md:text-base text-poppy-muted leading-relaxed font-medium space-y-5">
					<p>
						LKP Airlangga adalah pusat dan konsultan pendidikan sejak 1996 yang berkomitmen mewujudkan generasi masa depan yang cerdas dan berkarakter. Berlandaskan filosofi <strong class="font-bold italic text-poppy-ink">"Empowering the Future with Intelligence and Integrity"</strong>, kami percaya bahwa pendidikan bukan hanya tentang nilai akademik, tetapi tentang membentuk manusia utuh yang berdaya pikir, berakhlak, dan siap berkontribusi untuk masa depan yang lebih baik.
					</p>
					<p>
						Setiap program kami tumbuh dari pemahaman akan kebutuhan peserta didik dengan pendekatan yang humanis dan berorientasi pada nilai-nilai. Kami hadir untuk menanamkan semangat belajar yang membumi dan bermakna.
					</p>
					<p>
						Tim Airlangga selalu bekerja secara kolaboratif, empatik, dan reflektif — memahami setiap latar belakang, tantangan, serta impian peserta didik, lalu menerjemahkannya menjadi proses pembelajaran yang berkualitas.
					</p>
					<p>
						LKP Airlangga tumbuh bersama mereka yang ingin melangkah lebih jauh, menjadi cerdas juga berintegritas, tangguh, dan siap menghadapi dunia dengan nilai-nilai yang kuat.
					</p>
				</div>
			</div>

			<!-- Right Column: Visi & Misi Card -->
			<div class="lg:col-span-6 w-full">
				<div class="bg-[#F8F9FA] border border-slate-100 rounded-[32px] p-8 sm:p-10 text-left shadow-sm">
					
					<!-- Visi Section -->
					<div class="mb-8">
						<h3 class="text-xl sm:text-2xl font-black font-serif text-poppy-ink mb-3 uppercase tracking-wide">
							Visi
						</h3>
						<p class="text-xs sm:text-sm text-poppy-muted font-semibold leading-relaxed">
							Menjadi Pusat Pendidikan & Lembaga Konsultan Pendidikan terbaik di Indonesia yang mampu mewujudkan generasi masa depan yang cerdas dan berkarakter.
						</p>
					</div>

					<!-- Misi Section -->
					<div>
						<h3 class="text-xl sm:text-2xl font-black font-serif text-poppy-ink mb-4 uppercase tracking-wide">
							Misi
						</h3>
						<ul class="list-disc list-outside pl-5 space-y-3.5 text-xs sm:text-sm font-medium leading-relaxed text-poppy-muted">
							<li>Melayani pendidikan masyarakat untuk berprestasi, sukses meraih cita-cita.</li>
							<li>Meningkatkan kualitas pendidikan dengan budaya; berkompetisi dan berprestasi dengan menghargai proses,</li>
							<li>Memberikan pelayanan prima dengan komitmen tinggi dan profesional,</li>
							<li>Menjalin hubungan yang harmonis dengan mitra kerja baik eksternal maupun internal,</li>
							<li>Membentuk kepribadian siswa yang cerdas, terampil, dan berkarakter dengan melaksanakan training motivasi dan spiritual secara berkala,</li>
							<li>Menciptakan budaya belajar siswa,</li>
							<li>Mengoptimalkan peran serta orang tua dalam pendampingan belajar,</li>
							<li>Memberikan pendampingan konseling siswa dan konseling parenting orang tua siswa,</li>
							<li>Memberikan pendampingan Karir & Pendidikan Studi lanjut dalam dan luar negeri.</li>
						</ul>
					</div>

				</div>
			</div>

	</section>

	<!-- Brand Values Section (Overlapping Footer) -->
	<section class="poppy-section pt-0 pb-0 relative z-10 mb-[-80px] md:mb-[-140px]">
		<div class="poppy-container bg-[linear-gradient(135deg,#A5E3FD_0%,#C4F8DD_50%,#FFF6E0_100%)] rounded-[32px] md:rounded-[48px] p-8 sm:p-12 md:p-16 pb-24 sm:pb-36 md:pb-48 text-center shadow-sm relative overflow-hidden">
			
			<h2 class="text-2xl sm:text-3xl md:text-[36px] font-black text-poppy-ink mb-10 md:mb-12 tracking-tight font-serif uppercase">
				Brand Values
			</h2>

			<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
				
				<!-- Value 1: Profesional -->
				<div class="bg-white rounded-[24px] p-6 sm:p-8 text-left shadow-[0_4px_20px_rgba(0,0,0,0.03)] border border-slate-100/50 flex flex-col justify-start">
					<div class="flex items-center gap-3 mb-3 sm:mb-4">
						<!-- Briefcase Icon -->
						<svg class="w-6 h-6 sm:w-7 sm:h-7 text-poppy-accent flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
							<path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 .621-.504 1.125-1.125 1.125H4.875A1.125 1.125 0 013.75 18.4V14.15m16.5 0c0-1.205-.812-2.285-1.96-2.505l-3.31-.635a12.078 12.078 0 01-4.73 0l-3.31.635a2.53 2.53 0 00-1.96 2.505m16.5 0v-1.65a1.875 1.875 0 00-1.875-1.875H5.625A1.875 1.875 0 003.75 12v2.15M9 5.25h6m-6 0v-1.5A1.125 1.125 0 0110.125 2.625h3.75A1.125 1.125 0 0115 3.75v1.5m-6 0h6"></path>
						</svg>
						<h3 class="text-lg sm:text-xl md:text-[22px] font-black font-serif text-poppy-ink">
							Profesional
						</h3>
					</div>
					<p class="text-xs sm:text-sm text-poppy-muted font-medium leading-relaxed">
						Kami berkomitmen untuk selalu bekerja dengan standar terbaik, menjaga kualitas dan integritas di setiap hasil karya.
					</p>
				</div>

				<!-- Value 2: Trusted -->
				<div class="bg-white rounded-[24px] p-6 sm:p-8 text-left shadow-[0_4px_20px_rgba(0,0,0,0.03)] border border-slate-100/50 flex flex-col justify-start">
					<div class="flex items-center gap-3 mb-3 sm:mb-4">
						<!-- Shield Check Icon -->
						<svg class="w-6 h-6 sm:w-7 sm:h-7 text-poppy-accent flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
							<path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.75h-.152c-3.196 0-6.1-1.248-8.25-3.285z"></path>
						</svg>
						<h3 class="text-lg sm:text-xl md:text-[22px] font-black font-serif text-poppy-ink">
							Trusted
						</h3>
					</div>
					<p class="text-xs sm:text-sm text-poppy-muted font-medium leading-relaxed">
						Kepercayaan adalah aset terbesar kami. Karena itu, kami menjunjung tinggi sikap amanah dalam setiap hubungan dan tanggung jawab.
					</p>
				</div>

				<!-- Value 3: Innovative -->
				<div class="bg-white rounded-[24px] p-6 sm:p-8 text-left shadow-[0_4px_20px_rgba(0,0,0,0.03)] border border-slate-100/50 flex flex-col justify-start">
					<div class="flex items-center gap-3 mb-3 sm:mb-4">
						<!-- Lightbulb Icon -->
						<svg class="w-6 h-6 sm:w-7 sm:h-7 text-poppy-accent flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
							<path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707m0-12.728l.707.707m11.314 11.314l.707-.707M12 7a5 5 0 00-5 5c0 1.956 1.119 3.65 2.764 4.502.26.136.417.382.417.67v.828c0 .552.448 1 1 1h1.636c.552 0 1-.448 1-1v-.829c0-.287.158-.533.418-.669A5.001 5.001 0 0017 12a5 5 0 00-5-5z"></path>
						</svg>
						<h3 class="text-lg sm:text-xl md:text-[22px] font-black font-serif text-poppy-ink">
							Innovative
						</h3>
					</div>
					<p class="text-xs sm:text-sm text-poppy-muted font-medium leading-relaxed">
						Kami menumbuhkan budaya berpikir kritis dan solutif, menghadirkan ide-ide baru yang relevan dengan tantangan zaman.
					</p>
				</div>

				<!-- Value 4: Care -->
				<div class="bg-white rounded-[24px] p-6 sm:p-8 text-left shadow-[0_4px_20px_rgba(0,0,0,0.03)] border border-slate-100/50 flex flex-col justify-start">
					<div class="flex items-center gap-3 mb-3 sm:mb-4">
						<!-- Heart Icon -->
						<svg class="w-6 h-6 sm:w-7 sm:h-7 text-poppy-accent flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
							<path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"></path>
						</svg>
						<h3 class="text-lg sm:text-xl md:text-[22px] font-black font-serif text-poppy-ink">
							Care
						</h3>
					</div>
					<p class="text-xs sm:text-sm text-poppy-muted font-medium leading-relaxed">
						Dengan kepedulian tulus, kami hadir untuk saling memahami, mendukung, dan memberi makna lebih pada setiap interaksi.
					</p>
				</div>

				<!-- Value 5: Togetherness -->
				<div class="bg-white rounded-[24px] p-6 sm:p-8 text-left shadow-[0_4px_20px_rgba(0,0,0,0.03)] border border-slate-100/50 flex flex-col justify-start">
					<div class="flex items-center gap-3 mb-3 sm:mb-4">
						<!-- Togetherness Icon -->
						<svg class="w-6 h-6 sm:w-7 sm:h-7 text-poppy-accent flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
							<path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"></path>
						</svg>
						<h3 class="text-lg sm:text-xl md:text-[22px] font-black font-serif text-poppy-ink">
							Togetherness
						</h3>
					</div>
					<p class="text-xs sm:text-sm text-poppy-muted font-medium leading-relaxed">
						Kami membangun suasana kekeluargaan yang hangat, karena kami yakin kebersamaan melahirkan kekuatan.
					</p>
				</div>

				<!-- Value 6: Friendly -->
				<div class="bg-white rounded-[24px] p-6 sm:p-8 text-left shadow-[0_4px_20px_rgba(0,0,0,0.03)] border border-slate-100/50 flex flex-col justify-start">
					<div class="flex items-center gap-3 mb-3 sm:mb-4">
						<!-- Smiley Icon -->
						<svg class="w-6 h-6 sm:w-7 sm:h-7 text-poppy-accent flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
							<path stroke-linecap="round" stroke-linejoin="round" d="M15.182 15.182a4.5 4.5 0 01-6.364 0M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75zm-.375 0h.008v.015h-.008V9.75zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75zm-.375 0h.008v.015h-.008V9.75z"></path>
						</svg>
						<h3 class="text-lg sm:text-xl md:text-[22px] font-black font-serif text-poppy-ink">
							Friendly
						</h3>
					</div>
					<p class="text-xs sm:text-sm text-poppy-muted font-medium leading-relaxed">
						Dengan keramahan dan sikap bersahabat, kami ingin setiap orang merasa nyaman berinteraksi dengan Airlangga.
					</p>
				</div>

			</div>
		</div>
	</section>

	<?php
	while ( have_posts() ) :
		the_post();
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
		</article>
		<?php
	endwhile;
	?>
</main>

<?php
get_footer();
