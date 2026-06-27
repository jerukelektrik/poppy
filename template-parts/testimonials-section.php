<?php
/**
 * Template part for displaying the Testimonials section
 *
 * @package POPPY
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$show_on = isset( $args['show_on'] ) ? $args['show_on'] : 'home';

$title_color_class = 'text-poppy-accent';
$underline_stroke  = '#132039';
if ( 'english-kids' === $show_on || 'pengembangan-diri' === $show_on ) {
	$title_color_class = 'text-poppy-ink';
	$underline_stroke  = '#BD4B3B';
}

$meta_query = array(
	'relation' => 'OR',
	array(
		'key'     => '_testimonial_show_on',
		'value'   => $show_on,
		'compare' => 'LIKE',
	),
	array(
		'key'     => '_testimonial_show_on',
		'compare' => 'NOT EXISTS',
	),
);

if ( 'home' === $show_on ) {
	$meta_query[] = array(
		'key'     => '_testimonial_show_on',
		'value'     => '',
		'compare' => '=',
	);
}

$testimonials_query = new WP_Query( array(
	'post_type'      => 'testimonial',
	'posts_per_page' => -1,
	'post_status'    => 'publish',
	'meta_query'     => $meta_query,
) );

if ( $testimonials_query->have_posts() ) :
	?>
	<section id="cerita-alumni" class="poppy-section bg-white pb-20 relative z-20 testimonials-section-wrapper">
		<div class="poppy-container">
			
			<!-- Section Header -->
			<div class="text-center max-w-3xl mx-auto mb-12">
				<h2 class="text-2xl sm:text-3xl md:text-4xl font-black font-serif <?php echo esc_attr( $title_color_class ); ?> inline-block relative">
					Cerita Alumni Kami
					<!-- Decorative curved line under title -->
					<span class="absolute left-1/2 bottom-[-16px] transform -translate-x-1/2 w-44">
						<svg viewBox="0 0 178 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full">
							<path d="M2 10C35 4 143 4 176 10" stroke="<?php echo esc_attr( $underline_stroke ); ?>" stroke-width="4" stroke-linecap="round"/>
						</svg>
					</span>
				</h2>
			</div>

			<!-- Testimonial Slider Outer Wrapper -->
			<div class="relative overflow-hidden w-full max-w-5xl mx-auto">
				
				<!-- Scroll Container (Snap scroll) -->
				<div class="testimonials-scroll-container flex overflow-x-auto gap-6 px-4 md:px-12 py-8 scroll-smooth snap-x snap-mandatory scrollbar-none">
					
					<?php
					$index = 0;
					while ( $testimonials_query->have_posts() ) :
						$testimonials_query->the_post();
						$major = get_post_meta( get_the_ID(), '_testimonial_major', true );
						$stars = get_post_meta( get_the_ID(), '_testimonial_stars', true ) ?: 5;
						?>
						<!-- Testimonial Card -->
						<div class="testimonial-card snap-center flex-shrink-0 w-full max-w-[290px] sm:max-w-[360px] md:max-w-[400px] bg-white rounded-[32px] p-6 sm:p-8 border border-slate-100/80 shadow-sm relative flex flex-col justify-between min-h-[300px]">
							<div>
								<!-- Quote Mark Icon -->
								<img 
									src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/quotes.png' ); ?>" 
									alt="Quote Mark" 
									class="w-28 sm:w-32 h-auto absolute top-2 left-2 sm:top-4 sm:left-4 select-none pointer-events-none z-0 grayscale"
								/>
								
								<!-- Quote Content -->
								<div class="text-xs sm:text-sm md:text-base italic text-[#2D3748] font-medium leading-relaxed mb-6 z-10 relative">
									<?php the_content(); ?>
								</div>
							</div>

							<!-- Alumnus Info -->
							<div class="mt-auto">
								<hr class="border-poppy-line/30 mb-4" />
								<h4 class="text-sm sm:text-base font-black text-poppy-ink mb-1"><?php the_title(); ?></h4>
								<p class="text-[10px] sm:text-xs text-poppy-muted font-semibold mb-3 leading-none"><?php echo esc_html( $major ); ?></p>
								
								<!-- Stars -->
								<div class="flex gap-1 text-[#F59E0B]">
									<?php
									for ( $i = 0; $i < 5; $i++ ) {
										if ( $i < $stars ) {
											?>
											<svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
											<?php
										} else {
											?>
											<svg class="w-4 h-4 text-gray-200 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
											<?php
										}
									}
									?>
								</div>
							</div>
						</div>
						<?php
						$index++;
					endwhile;
					wp_reset_postdata();
					?>

				</div>

				<!-- Pagination Dots -->
				<div class="flex items-center justify-center gap-2 mt-4">
					<?php for ( $i = 0; $i < $index; $i++ ) : ?>
						<button data-testimonial-dot="<?php echo $i; ?>" class="testimonial-dot w-3 h-3 rounded-full <?php echo $i === 0 ? 'bg-poppy-accent scale-110' : 'bg-gray-300'; ?> transition-all duration-300 cursor-pointer focus:outline-none" aria-label="Go to testimonial slide <?php echo $i + 1; ?>"></button>
					<?php endfor; ?>
				</div>

			</div>
		</div>
	</section>

	<!-- Scoped Testimonial Slider Script -->
	<script>
		document.addEventListener('DOMContentLoaded', () => {
			const testimonialSections = document.querySelectorAll('.testimonials-section-wrapper');
			
			testimonialSections.forEach(section => {
				const container = section.querySelector('.testimonials-scroll-container');
				const cards = section.querySelectorAll('.testimonial-card');
				const dots = section.querySelectorAll('.testimonial-dot');

				if (!container || cards.length <= 1) return;

				// Scroll-to slide logic when clicking dots
				dots.forEach((dot, index) => {
					dot.addEventListener('click', () => {
						const card = cards[index];
						if (card) {
							const containerWidth = container.clientWidth;
							const cardWidth = card.clientWidth;
							const cardLeft = card.offsetLeft;
							// Center the active card in the scroll container view
							const scrollTarget = cardLeft - (containerWidth / 2) + (cardWidth / 2);
							container.scrollTo({
								left: scrollTarget,
								behavior: 'smooth'
							});
						}
					});
				});

				// Active dot highlight logic on scroll
				container.addEventListener('scroll', () => {
					let activeIndex = 0;
					let minDiff = Infinity;
					const containerCenter = container.getBoundingClientRect().left + container.clientWidth / 2;

					cards.forEach((card, idx) => {
						const cardCenter = card.getBoundingClientRect().left + card.clientWidth / 2;
						const diff = Math.abs(containerCenter - cardCenter);
						if (diff < minDiff) {
							minDiff = diff;
							activeIndex = idx;
						}
					});

					dots.forEach((dot, idx) => {
						if (idx === activeIndex) {
							dot.classList.add('bg-poppy-accent', 'scale-110');
							dot.classList.remove('bg-gray-300');
						} else {
							dot.classList.remove('bg-poppy-accent', 'scale-110');
							dot.classList.add('bg-gray-300');
						}
					});
				});
			});
		});
	</script>
	<?php
endif;
