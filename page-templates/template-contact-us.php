<?php
/**
 * Template Name: Contact Us
 *
 * @package POPPY
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

<main id="primary" class="site-main contact-us-template">
	<!-- Hero Section -->
	<section class="relative overflow-hidden bg-cover bg-center bg-no-repeat rounded-b-[32px] md:rounded-b-[48px] lg:rounded-b-[60px] pt-36 pb-20 md:pt-48 md:pb-28 lg:pt-56 lg:pb-36" style="background-image: url('<?php echo esc_url( get_template_directory_uri() . '/assets/images/About%20Us%20Background.webp' ); ?>');">
		<!-- Dark overlay to ensure header text readability -->
		<div class="absolute inset-0 bg-black/35 z-0"></div>
		
		<div class="poppy-container relative z-10 flex flex-col items-center justify-center text-center">
			<?php poppy_breadcrumbs(); ?>
			<h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-[52px] font-black text-white leading-tight tracking-tight drop-shadow-sm">
				Contact Us
			</h1>
		</div>
	</section>

	<!-- Details & Goals Section -->
	<section class="poppy-section bg-white relative z-20">
		<div class="poppy-container grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">
			
			<!-- Left Column: Contact Info -->
			<div class="lg:col-span-6 flex flex-col items-start text-left">
				<!-- Logo -->
				<div class="mb-10 select-none">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/Logo.webp" alt="<?php bloginfo( 'name' ); ?>" class="h-16 w-auto object-contain">
				</div>

				<!-- Contact Details List -->
				<div class="flex flex-col gap-6 sm:gap-8 w-full">
					
					<!-- Detail Item 1: Telepon -->
					<div class="flex items-start gap-4">
						<div class="w-12 h-12 rounded-full bg-poppy-accent flex items-center justify-center flex-shrink-0 shadow-sm">
							<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/iconphone.webp" alt="Telepon" class="w-6 h-6 object-contain">
						</div>
						<div class="flex flex-col justify-center">
							<h4 style="font-size: 19px !important;" class="text-sm font-bold text-poppy-ink mb-1 font-serif">Telepon</h4>
							<p class="text-xs sm:text-sm text-poppy-muted font-semibold leading-relaxed">
								(0725) 43165
							</p>
						</div>
					</div>

					<!-- Detail Item 2: Alamat -->
					<div class="flex items-start gap-4">
						<div class="w-12 h-12 rounded-full bg-poppy-accent flex items-center justify-center flex-shrink-0 shadow-sm">
							<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/iconpath.webp" alt="Alamat" class="w-6 h-6 object-contain">
						</div>
						<div class="flex flex-col justify-center max-w-md">
							<h4 style="font-size: 19px !important;" class="text-sm font-bold text-poppy-ink mb-1 font-serif">Alamat</h4>
							<p class="text-xs sm:text-sm text-poppy-muted font-semibold leading-relaxed">
								JL. AR. Prawiranegara No.32, Metro, Kec. Metro Pusat, Kota Metro, Lampung 34111
							</p>
						</div>
					</div>

					<!-- Detail Item 3: Social Media -->
					<div class="flex items-start gap-4">
						<div class="w-12 h-12 rounded-full bg-poppy-accent flex items-center justify-center flex-shrink-0 shadow-sm">
							<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/iconsocial.webp" alt="Social Media" class="w-6 h-6 object-contain">
						</div>
						<div class="flex flex-col justify-center">
							<h4 style="font-size: 19px !important;" class="text-sm font-bold text-poppy-ink mb-1 font-serif">Social Media</h4>
							<a href="https://instagram.com" target="_blank" rel="noopener noreferrer" class="text-xs sm:text-sm text-poppy-muted font-semibold leading-relaxed hover:text-poppy-accent transition">
								Instagram
							</a>
						</div>
					</div>

					<!-- Detail Item 4: Email -->
					<div class="flex items-start gap-4">
						<div class="w-12 h-12 rounded-full bg-poppy-accent flex items-center justify-center flex-shrink-0 shadow-sm">
							<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/iconmail.webp" alt="Email" class="w-6 h-6 object-contain">
						</div>
						<div class="flex flex-col justify-center">
							<h4 style="font-size: 19px !important;" class="text-sm font-bold text-poppy-ink mb-1 font-serif">Email</h4>
							<a href="mailto:lkpairlangga@gmail.com" class="text-xs sm:text-sm text-poppy-muted font-semibold leading-relaxed hover:text-poppy-accent transition">
								lkpairlangga@gmail.com
							</a>
						</div>
					</div>

				</div>
			</div>

			<!-- Right Column: Our Goals Card -->
			<div class="lg:col-span-6 w-full">
				<div class="bg-poppy-accent rounded-[32px] p-8 sm:p-10 text-left text-white shadow-lg">
					<h3 class="text-xl sm:text-2xl font-black font-serif text-white mb-6 uppercase tracking-wide">
						Our Goals
					</h3>
					<ul class="list-disc list-outside pl-5 space-y-4 text-xs sm:text-sm font-medium leading-relaxed text-white/95">
						<li>Membantu peserta didik untuk belajar dengan metode yang lebih tepat sehingga mampu menguasai materi pelajaran dan keterampilan dengan lebih baik.</li>
						<li>Mendorong peserta didik untuk berprestasi dengan motivasi berkompetisi dan menghargai proses.</li>
						<li>Membantu orang tua didik dalam mengarahkan, mendorong dan memfasilitasi langkah-langkah untuk menuju prestasi anak.</li>
						<li>Membantu siswa dalam menentukan studi lanjut dan membuat rencana karir yang sesuai minat siswa, bakat siswa, kompetensi siswa, dan kebutuhan masyarakat.</li>
						<li>Ikut membantu mencerdaskan anak bangsa.</li>
						<li>Ikut membantu mewujudkan Kota Metro sebagai Kota Pendidikan.</li>
						<li>Membantu sekolah mitra dalam pengembangan dan meningkatkan mutu pendidikan.</li>
					</ul>
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
