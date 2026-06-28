<?php
/**
 * The template for displaying the blog posts index page (Our Blog)
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

<main id="primary" class="site-main blog-template flex-grow">
	<!-- Hero Section -->
	<section class="relative overflow-hidden bg-cover bg-center bg-no-repeat rounded-b-[32px] md:rounded-b-[48px] lg:rounded-b-[60px] pt-24 pb-10 md:pt-28 md:pb-14 lg:pt-32 lg:pb-18" style="background-image: url('<?php echo esc_url( get_template_directory_uri() . '/assets/images/background%20blog.webp' ); ?>');">
		<!-- Soft white overlay to match mockup's high brightness -->
		<div class="absolute inset-0 bg-white/75 z-0"></div>
		
		<div class="poppy-container relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-8">
			<!-- Left: Title & Breadcrumbs -->
			<div class="flex flex-col items-start text-left">
				<?php poppy_breadcrumbs( 'text-poppy-ink/70 justify-start', 'text-poppy-ink', 'text-poppy-ink/40' ); ?>
				<h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-[52px] font-black text-poppy-ink leading-tight tracking-tight drop-shadow-sm font-serif">
					Our Blog
				</h1>
			</div>

			<!-- Right: Search Bar -->
			<div class="w-full md:w-auto flex items-center justify-start md:justify-end">
				<form role="search" method="get" class="search-form w-full min-w-[280px] sm:min-w-[320px] md:max-w-md relative" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<label class="w-full block">
						<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'poppy' ); ?></span>
						<input type="search" class="search-field w-full bg-white text-poppy-ink text-xs sm:text-sm px-6 py-3.5 rounded-full shadow-[0_4px_20px_rgba(0,0,0,0.03)] border border-slate-100 focus:outline-none focus:border-poppy-accent font-semibold italic placeholder:text-slate-400 placeholder:italic" placeholder="<?php echo esc_attr_x( 'Search articles', 'placeholder', 'poppy' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
					</label>
				</form>
			</div>
		</div>
	</section>

	<!-- Content Loop Section -->
	<section class="poppy-section bg-white relative z-20">
		<div class="poppy-container">
			<?php
			<?php
			// Query categories that have posts
			$categories = get_categories( array(
				'orderby'    => 'name',
				'order'      => 'ASC',
				'hide_empty' => true,
			) );

			if ( ! empty( $categories ) ) :
				foreach ( $categories as $i => $category ) :
					$cat_name = $category->name;
					$cat_id   = $category->term_id;
					$posts_data = array();
					
					// Query actual posts in this category
					$query = new WP_Query( array(
						'post_type'      => 'post',
						'posts_per_page' => 9,
						'cat'            => $cat_id,
					) );
					
					if ( $query->have_posts() ) {
						while ( $query->have_posts() ) {
							$query->the_post();
							$img_url = get_the_post_thumbnail_url( get_the_ID(), 'large' );
							if ( ! $img_url ) {
								$img_url = 'https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=600&q=80';
							}
							
							$posts_data[] = array(
								'title'     => get_the_title(),
								'permalink' => get_permalink(),
								'image'     => $img_url,
								'excerpt'   => wp_trim_words( get_the_excerpt(), 25, '...' ),
								'date'      => get_the_date( 'd F Y' ),
								'author'    => get_the_author(),
							);
						}
						wp_reset_postdata();
					}
					
					if ( empty( $posts_data ) ) {
						continue;
					}
					
					$slider_id = 'blog-slider-' . $i;
					?>
					<div class="mb-20 last:mb-0">
						<!-- Rubrik Header with Horizontal Line -->
						<div class="flex items-center gap-4 mb-8">
							<h3 class="text-sm sm:text-base font-black text-poppy-accent shrink-0 font-serif uppercase tracking-wide">
								<?php echo esc_html( $cat_name ); ?>
							</h3>
							<div class="h-px bg-poppy-accent/25 flex-grow"></div>
						</div>
						
						<!-- Slider Scroll Container -->
						<div id="<?php echo esc_attr( $slider_id ); ?>" class="blog-slider flex gap-6 lg:gap-12 overflow-x-auto scroll-smooth snap-x snap-mandatory scrollbar-none pb-4">
							<?php foreach ( $posts_data as $post_item ) : ?>
								<div class="blog-slide w-full sm:w-[calc(50%-12px)] lg:w-[calc(33.333%-32px)] shrink-0 snap-start flex flex-col justify-between">
									<div>
										<!-- Rounded Card Image -->
										<div class="w-full aspect-[4/3] rounded-2xl overflow-hidden mb-6 relative shadow-sm border border-slate-100/50">
											<img src="<?php echo esc_url( $post_item['image'] ); ?>" alt="<?php echo esc_attr( $post_item['title'] ); ?>" class="w-full h-full object-cover transition hover:scale-105 duration-300 select-none pointer-events-none" />
										</div>
										
										<!-- Short divider line under image -->
										<div class="w-16 h-px bg-slate-200/60 my-4"></div>
										
										<!-- Title -->
										<div class="text-sm sm:text-base font-black text-poppy-ink mb-3 leading-snug font-serif">
											<?php if ( $post_item['permalink'] !== '#' ) : ?>
												<a href="<?php echo esc_url( $post_item['permalink'] ); ?>" class="hover:text-poppy-accent transition">
													<?php echo esc_html( $post_item['title'] ); ?>
												</a>
											<?php else : ?>
												<?php echo esc_html( $post_item['title'] ); ?>
											<?php endif; ?>
										</div>
										
										<!-- Excerpt -->
										<p class="text-xs sm:text-sm text-poppy-muted mb-6 leading-relaxed font-semibold line-clamp-3">
											<?php echo esc_html( $post_item['excerpt'] ); ?>
										</p>
									</div>
									
									<div>
										<!-- Metadata -->
										<div class="text-[10px] sm:text-xs text-poppy-muted/50 font-semibold mb-6 select-none">
											<?php echo esc_html( $post_item['date'] ); ?> - by <?php echo esc_html( $post_item['author'] ); ?>
										</div>
										
										<!-- Button -->
										<a href="<?php echo esc_url( $post_item['permalink'] ); ?>" class="inline-flex items-center justify-center bg-poppy-accent hover:bg-poppy-accent/90 text-white font-extrabold text-[10px] sm:text-xs px-4 py-2.5 rounded-lg transition shadow-sm">
											Baca Selengkapnya
										</a>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
						
						<!-- Slider Navigation Dots -->
						<?php
						$num_dots = ceil( count( $posts_data ) / 3 );
						if ( $num_dots > 1 ) :
							?>
							<div class="blog-slider-dots flex justify-center items-center gap-2 mt-6" data-target="<?php echo esc_attr( $slider_id ); ?>">
								<?php for ( $d = 0; $d < $num_dots; $d ++ ) : ?>
									<div class="slider-dot <?php echo $d === 0 ? 'active border-poppy-accent' : 'border-transparent'; ?> cursor-pointer w-4 h-4 rounded-full border flex items-center justify-center transition">
										<div class="inner-dot w-2 h-2 rounded-full <?php echo $d === 0 ? 'bg-poppy-accent' : 'bg-slate-200 hover:bg-slate-300'; ?> transition-all"></div>
									</div>
								<?php endfor; ?>
							</div>
						<?php endif; ?>
					</div>
				<?php
				endforeach;
			else :
				?>
				<div class="text-center py-20">
					<h3 class="text-sm font-bold text-poppy-muted font-sans">Belum ada kategori atau artikel yang dipublikasikan.</h3>
				</div>
			<?php
			endif;
			?>
		</div>
	</section>
</main>

<script>
document.addEventListener('DOMContentLoaded', () => {
	document.querySelectorAll('.blog-slider-dots').forEach(dotContainer => {
		const targetId = dotContainer.dataset.target;
		const slider = document.getElementById(targetId);
		if (!slider) return;
		
		const dots = dotContainer.querySelectorAll('.slider-dot');
		
		const activeDot = (dot) => {
			dot.classList.add('border-poppy-accent');
			dot.classList.remove('border-transparent');
			const inner = dot.querySelector('.inner-dot');
			if (inner) {
				inner.classList.add('bg-poppy-accent');
				inner.classList.remove('bg-slate-200');
			}
		};

		const deactivateDot = (dot) => {
			dot.classList.remove('border-poppy-accent');
			dot.classList.add('border-transparent');
			const inner = dot.querySelector('.inner-dot');
			if (inner) {
				inner.classList.remove('bg-poppy-accent');
				inner.classList.add('bg-slate-200');
			}
		};

		dots.forEach((dot, index) => {
			dot.addEventListener('click', () => {
				const slides = slider.querySelectorAll('.blog-slide');
				// Scroll to the beginning of the 3-card block: index 0, 3, or 6
				const targetIndex = index * 3;
				if (slides[targetIndex]) {
					slider.scrollTo({
						left: slides[targetIndex].offsetLeft - 12,
						behavior: 'smooth'
					});
				}
				
				dots.forEach(d => deactivateDot(d));
				activeDot(dot);
			});
		});

		// Synchronize dots on manual scroll swipe
		slider.addEventListener('scroll', () => {
			const scrollLeft = slider.scrollLeft;
			const clientWidth = slider.clientWidth;
			const scrollWidth = slider.scrollWidth;
			
			const maxScroll = scrollWidth - clientWidth;
			if (maxScroll <= 0) return;
			
			// Map progress ratio to dot index (0 to dots.length - 1)
			const activeIndex = Math.min(dots.length - 1, Math.round((scrollLeft / maxScroll) * (dots.length - 1)));
			
			dots.forEach((dot, index) => {
				if (index === activeIndex) {
					activeDot(dot);
				} else {
					deactivateDot(dot);
				}
			});
		});
	});
});
</script>

<?php
get_footer();
