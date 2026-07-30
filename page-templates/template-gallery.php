<?php
/**
 * Template Name: Gallery Photo
 *
 * @package POPPY
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

// Gallery items configuration
$gallery_items = array(
	array(
		'title'    => 'Asesmen Karyawan Oemar Bakery',
		'category' => 'asesmen',
		'image'    => 'gp_Asesmen Oemar Bakery.jpg',
		'desc'     => 'Layanan asesmen profesional untuk pemetaan potensi dan kompetensi karyawan Oemar Bakery.',
	),
	array(
		'title'    => 'Asesmen Siswa SMA Yos Sudarso',
		'category' => 'asesmen',
		'image'    => 'gp_Asesmen SMA Yos Sudarso.jpg',
		'desc'     => 'Pelaksanaan psikotes dan pemetaan minat bakat untuk siswa-siswi SMA Yos Sudarso.',
	),
	array(
		'title'    => 'Asesmen Siswa SMP Yos Sudarso',
		'category' => 'asesmen',
		'image'    => 'gp_Asesmen SMP Yos Sudarso.jpg',
		'desc'     => 'Tes minat bakat dan asesmen akademik untuk siswa-siswi SMP Yos Sudarso.',
	),
	array(
		'title'    => 'Asesmen Surya Tsabat Mandiri',
		'category' => 'asesmen',
		'image'    => 'gp_Asesmen Surya Tsabat Mandiri.jpg',
		'desc'     => 'Evaluasi psikologis dan asesmen kompetensi untuk institusi Surya Tsabat Mandiri.',
	),
	array(
		'title'    => 'Asesmen TalentDNA SD WU',
		'category' => 'asesmen',
		'image'    => 'gp_Asesmen TalentDNA SD WU.jpg',
		'desc'     => 'Analisis potensi diri anak melalui metode TalentDNA di SD WU.',
	),
	array(
		'title'    => 'Graduation English Course Photo',
		'category' => 'belajar',
		'image'    => 'gp_Graduation English Course Photo.jpg',
		'desc'     => 'Pelepasan siswa berprestasi yang telah menyelesaikan tingkat pembelajaran Kursus Bahasa Inggris.',
	),
	array(
		'title'    => 'IHT SMAN 3 Metro',
		'category' => 'kemitraan',
		'image'    => 'gp_IHT SMAN 3 Metro.jpg',
		'desc'     => 'Pelatihan pengembangan kompetensi pendidik (guru) di SMAN 3 Metro.',
	),
	array(
		'title'    => 'MoU Airlangga & ESQ',
		'category' => 'kemitraan',
		'image'    => 'gp_MoU Airlangga & ESQ.jpg',
		'desc'     => 'Penandatanganan nota kesepahaman (MoU) kemitraan program antara LKP Airlangga dan ESQ.',
	),
	array(
		'title'    => 'Ramadhan SDN 1 Metro Pusat',
		'category' => 'belajar',
		'image'    => 'gp_Ramadhan SDN 1 Metro Pusat.jpg',
		'desc'     => 'Kegiatan bakti sosial dan pesantren kilat Ramadhan di SDN 1 Metro Pusat.',
	),
	array(
		'title'    => 'Sharing Bersama Aburizal Bakrie',
		'category' => 'kemitraan',
		'image'    => 'gp_Sharing Aburizal Bakrie.jpg',
		'desc'     => 'Sesi diskusi dan berbagi inspirasi wirausaha bersama tokoh nasional Aburizal Bakrie.',
	),
	array(
		'title'    => 'Sharing Session Asrama Leo Dehon',
		'category' => 'kemitraan',
		'image'    => 'gp_Sharing Session Asrama Leo Dehon.jpg',
		'desc'     => 'Sesi konseling kelompok dan pembekalan motivasi belajar di Asrama Leo Dehon.',
	),
	array(
		'title'    => 'Tes Kesiapan Belajar Anak',
		'category' => 'belajar',
		'image'    => 'gp_Tes Kesiapan Belajar.jpg',
		'desc'     => 'Pengujian kesiapan psikologis dan kognitif anak untuk memasuki jenjang sekolah dasar.',
	),
);

// Map categories to labels
$categories = array(
	'all'       => 'Semua',
	'belajar'   => 'Belajar & Event',
	'asesmen'   => 'Asesmen & Psikotes',
	'kemitraan' => 'Pelatihan & Kemitraan',
);
?>

<main id="primary" class="site-main gallery-template">
	<!-- Hero Section -->
	<section class="relative overflow-hidden bg-cover bg-center bg-no-repeat rounded-b-[32px] md:rounded-b-[48px] lg:rounded-b-[60px] pt-36 pb-20 md:pt-48 md:pb-28 lg:pt-56 lg:pb-36" style="background-image: url('<?php echo esc_url( get_template_directory_uri() . '/assets/images/About%20Us%20Background.webp' ); ?>');">
		<!-- Dark overlay to ensure header text readability -->
		<div class="absolute inset-0 bg-black/35 z-0"></div>
		
		<div class="poppy-container relative z-10 flex flex-col items-center justify-center text-center">
			<?php poppy_breadcrumbs(); ?>
			<h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-[52px] font-black text-white leading-tight tracking-tight drop-shadow-sm uppercase">
				Galeri Foto
			</h1>
		</div>
	</section>

	<!-- Gallery Content Section -->
	<section class="poppy-section bg-white relative z-20">
		<div class="poppy-container">
			
			<!-- Section Header & Underline -->
			<div class="text-center max-w-3xl mx-auto mb-12">
				<h2 class="text-2xl sm:text-3xl md:text-4xl font-black font-serif text-poppy-ink inline-block relative">
					Dokumentasi Kegiatan Kami
					<!-- Decorative curved line under title (Accent Orange) -->
					<span class="absolute left-1/2 top-full mt-2 transform -translate-x-1/2 w-48">
						<svg viewBox="0 0 178 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full">
							<path d="M2 10C35 4 143 4 176 10" stroke="#e34a0d" stroke-width="4" stroke-linecap="round"/>
						</svg>
					</span>
				</h2>
				<p class="text-xs sm:text-sm text-poppy-muted font-semibold leading-relaxed mt-10">
					Intip momen-momen seru belajar-mengajar, aktivitas seru kelas luar ruangan (outdoor), serta fasilitas ruang kelas pendukung di LKP Airlangga.
				</p>
			</div>

			<!-- Category Filter Buttons -->
			<div class="flex flex-wrap items-center justify-center gap-3 mb-12">
				<?php foreach ( $categories as $slug => $label ) : ?>
					<button 
						data-filter="<?php echo esc_attr( $slug ); ?>" 
						class="gallery-filter-btn <?php echo 'all' === $slug ? 'active bg-poppy-ink text-white font-extrabold shadow-sm' : 'bg-slate-100 hover:bg-slate-200 text-poppy-muted font-semibold'; ?> text-xs sm:text-sm px-6 py-2.5 rounded-full transition transform hover:scale-[1.02] cursor-pointer"
					>
						<?php echo esc_html( $label ); ?>
					</button>
				<?php endforeach; ?>
			</div>

			<!-- Gallery Grid -->
			<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8" id="gallery-grid">
				<?php foreach ( $gallery_items as $index => $item ) : 
					$img_url = get_template_directory_uri() . '/assets/images/' . $item['image'];
					?>
					<div 
						data-category="<?php echo esc_attr( $item['category'] ); ?>" 
						class="gallery-item-card bg-white rounded-[24px] border border-slate-100 shadow-sm overflow-hidden group hover:shadow-md transition-all duration-300 transform"
					>
						<!-- Image Container -->
						<div class="overflow-hidden relative aspect-[4/3] cursor-pointer gallery-trigger" data-index="<?php echo esc_attr( $index ); ?>">
							<img 
								src="<?php echo esc_url( $img_url ); ?>" 
								alt="<?php echo esc_attr( $item['title'] ); ?>" 
								class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
								data-large="<?php echo esc_url( $img_url ); ?>"
								data-title="<?php echo esc_attr( $item['title'] ); ?>"
								data-desc="<?php echo esc_attr( $item['desc'] ); ?>"
							/>
							<!-- Hover Overlay -->
							<div class="absolute inset-0 bg-poppy-ink/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
								<div class="w-12 h-12 rounded-full bg-white/90 flex items-center justify-center shadow transform scale-90 group-hover:scale-100 transition-transform duration-300">
									<svg class="w-6 h-6 text-poppy-accent" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
										<path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m3-3H7"></path>
									</svg>
								</div>
							</div>
						</div>
						
						<!-- Details -->
						<div class="p-6 text-left">
							<span class="inline-block bg-poppy-accent/10 text-poppy-accent text-[10px] font-bold uppercase tracking-wider px-3 py-1 rounded-full mb-3">
								<?php echo esc_html( $categories[ $item['category'] ] ); ?>
							</span>
							<h3 class="text-sm sm:text-base font-black text-poppy-ink mb-2 leading-snug group-hover:text-poppy-accent transition-colors duration-200">
								<?php echo esc_html( $item['title'] ); ?>
							</h3>
							<p class="text-xs text-poppy-muted font-medium leading-relaxed line-clamp-2">
								<?php echo esc_html( $item['desc'] ); ?>
							</p>
						</div>
					</div>
				<?php endforeach; ?>
			</div>

		</div>
	</section>

	<!-- Lightbox Overlay (Pure Javascript Driven) -->
	<div id="gallery-lightbox" class="fixed inset-0 z-[9999] bg-poppy-ink/95 flex items-center justify-center p-4 md:p-8 opacity-0 pointer-events-none transition-opacity duration-300">
		<!-- Close Button -->
		<button id="lightbox-close" class="absolute top-6 right-6 text-white/80 hover:text-white transition p-2 cursor-pointer focus:outline-none" aria-label="Close Gallery">
			<svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
				<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
			</svg>
		</button>

		<!-- Prev/Next Controls -->
		<button id="lightbox-prev" class="absolute left-4 md:left-8 top-1/2 transform -translate-y-1/2 text-white/80 hover:text-white transition p-3 rounded-full hover:bg-white/10 cursor-pointer focus:outline-none" aria-label="Previous Image">
			<svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
				<path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
			</svg>
		</button>
		
		<button id="lightbox-next" class="absolute right-4 md:right-8 top-1/2 transform -translate-y-1/2 text-white/80 hover:text-white transition p-3 rounded-full hover:bg-white/10 cursor-pointer focus:outline-none" aria-label="Next Image">
			<svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
				<path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
			</svg>
		</button>

		<!-- Lightbox Container -->
		<div class="max-w-4xl w-full flex flex-col items-center">
			<div class="relative bg-white rounded-3xl overflow-hidden shadow-2xl p-2 max-h-[70vh] flex items-center justify-center">
				<img id="lightbox-img" src="" alt="" class="max-w-full max-h-[66vh] object-contain rounded-2xl">
			</div>
			<!-- Caption -->
			<div class="text-center mt-6 max-w-2xl px-4 text-white">
				<h4 id="lightbox-title" class="text-base sm:text-lg md:text-xl font-black mb-2"></h4>
				<p id="lightbox-desc" class="text-xs sm:text-sm text-white/80 leading-relaxed font-medium"></p>
			</div>
		</div>
	</div>
</main>

<!-- Interactive Gallery Script -->
<script>
document.addEventListener('DOMContentLoaded', () => {
	// ==========================================
	// 1. Grid Filtering Logic
	// ==========================================
	const filterBtns = document.querySelectorAll('.gallery-filter-btn');
	const items = document.querySelectorAll('.gallery-item-card');

	filterBtns.forEach(btn => {
		btn.addEventListener('click', () => {
			const filter = btn.getAttribute('data-filter');

			// Update active button state
			filterBtns.forEach(b => {
				b.className = 'gallery-filter-btn bg-slate-100 hover:bg-slate-200 text-poppy-muted font-semibold text-xs sm:text-sm px-6 py-2.5 rounded-full transition transform hover:scale-[1.02] cursor-pointer';
			});
			btn.className = 'gallery-filter-btn active bg-poppy-ink text-white font-extrabold shadow-sm text-xs sm:text-sm px-6 py-2.5 rounded-full transition transform hover:scale-[1.02] cursor-pointer';

			// Filter items
			items.forEach(item => {
				const cat = item.getAttribute('data-category');
				if ('all' === filter || cat === filter) {
					item.style.display = 'block';
					setTimeout(() => {
						item.style.opacity = '1';
						item.style.transform = 'scale(1)';
					}, 50);
				} else {
					item.style.opacity = '0';
					item.style.transform = 'scale(0.95)';
					setTimeout(() => {
						item.style.display = 'none';
					}, 200);
				}
			});
		});
	});

	// ==========================================
	// 2. Lightbox Logic
	// ==========================================
	const triggers = document.querySelectorAll('.gallery-trigger');
	const lightbox = document.getElementById('gallery-lightbox');
	const lightboxImg = document.getElementById('lightbox-img');
	const lightboxTitle = document.getElementById('lightbox-title');
	const lightboxDesc = document.getElementById('lightbox-desc');
	const lightboxClose = document.getElementById('lightbox-close');
	const lightboxPrev = document.getElementById('lightbox-prev');
	const lightboxNext = document.getElementById('lightbox-next');

	let currentIndex = 0;
	const activeItems = [];

	// Retrieve active items data
	function updateActiveItems() {
		activeItems.length = 0;
		triggers.forEach(trigger => {
			const card = trigger.closest('.gallery-item-card');
			if (card.style.display !== 'none') {
				const img = trigger.querySelector('img');
				activeItems.push({
					large: img.getAttribute('data-large'),
					title: img.getAttribute('data-title'),
					desc: img.getAttribute('data-desc')
				});
			}
		});
	}

	function showLightboxImage(idx) {
		if (idx < 0 || idx >= activeItems.length) return;
		currentIndex = idx;
		const data = activeItems[currentIndex];
		
		lightboxImg.setAttribute('src', data.large);
		lightboxImg.setAttribute('alt', data.title);
		lightboxTitle.textContent = data.title;
		lightboxDesc.textContent = data.desc;
	}

	// Trigger open lightbox
	triggers.forEach(trigger => {
		trigger.addEventListener('click', () => {
			updateActiveItems();
			const img = trigger.querySelector('img');
			const targetSrc = img.getAttribute('data-large');
			
			// Find index in active list
			const idx = activeItems.findIndex(item => item.large === targetSrc);
			
			if (idx !== -1) {
				showLightboxImage(idx);
				lightbox.classList.remove('pointer-events-none');
				lightbox.classList.remove('opacity-0');
				document.body.style.overflow = 'hidden'; // Disable page scrolling
			}
		});
	});

	// Close lightbox
	function closeLightbox() {
		lightbox.classList.add('pointer-events-none');
		lightbox.classList.add('opacity-0');
		document.body.style.overflow = ''; // Enable page scrolling
	}

	lightboxClose.addEventListener('click', closeLightbox);
	lightbox.addEventListener('click', (e) => {
		if (e.target === lightbox) {
			closeLightbox();
		}
	});

	// Nav controls
	lightboxPrev.addEventListener('click', (e) => {
		e.stopPropagation();
		let targetIdx = currentIndex - 1;
		if (targetIdx < 0) targetIdx = activeItems.length - 1; // Loop back
		showLightboxImage(targetIdx);
	});

	// Keyboard controls
	lightboxNext.addEventListener('click', (e) => {
		e.stopPropagation();
		let targetIdx = currentIndex + 1;
		if (targetIdx >= activeItems.length) targetIdx = 0; // Loop forward
		showLightboxImage(targetIdx);
	});

	// Keyboard controls
	document.addEventListener('keydown', (e) => {
		if (lightbox.classList.contains('opacity-0')) return;
		if (e.key === 'Escape') closeLightbox();
		if (e.key === 'ArrowLeft') lightboxPrev.click();
		if (e.key === 'ArrowRight') lightboxNext.click();
	});
});
</script>

<?php
get_footer();
