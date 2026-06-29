<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package POPPY
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

<main id="primary" class="site-main single-post-template flex-grow">
	<!-- Hero Section -->
	<section class="relative overflow-hidden bg-cover bg-center bg-no-repeat rounded-b-[32px] md:rounded-b-[48px] lg:rounded-b-[60px] pt-24 pb-6 md:pt-28 md:pb-8 lg:pt-32 lg:pb-10" style="background-image: url('<?php echo esc_url( get_template_directory_uri() . '/assets/images/background%20single%20post.webp' ); ?>');">
		<!-- Soft white overlay to match mockup's high brightness -->
		<div class="absolute inset-0 bg-white/75 z-0"></div>
		
		<div class="poppy-container relative z-10">
			<?php poppy_breadcrumbs( 'text-poppy-ink/70 justify-start', 'text-poppy-ink', 'text-poppy-ink/40' ); ?>
		</div>
	</section>

	<!-- Content Section -->
	<section class="poppy-section bg-white relative z-20">
		<div class="poppy-container">
			<!-- Main Layout Grid -->
			<div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start mb-16">
				<!-- Left Column: Article Content (8 cols) -->
				<div class="lg:col-span-8">
					<?php
					if ( have_posts() ) :
						while ( have_posts() ) :
							the_post();
							?>
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<header class="entry-header mb-8">
									<!-- Date / Author -->
									<div class="text-xs sm:text-sm text-poppy-muted mb-4 font-semibold italic">
										<?php echo get_the_date(); ?> - by <?php the_author(); ?>
									</div>
									
									<!-- Post Title -->
									<h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-[42px] font-black text-poppy-ink mb-6 leading-tight font-serif">
										<?php the_title(); ?>
									</h1>
									
									<!-- Featured Image -->
									<?php if ( has_post_thumbnail() ) : ?>
										<div class="w-full rounded-2xl overflow-hidden shadow-sm border border-slate-100 mb-8">
											<?php the_post_thumbnail( 'large', array( 'class' => 'w-full h-auto object-cover' ) ); ?>
										</div>
									<?php endif; ?>
								</header>

								<!-- Content -->
								<div class="entry-content prose prose-slate max-w-none text-poppy-ink leading-relaxed font-sans font-medium text-xs sm:text-sm md:text-base space-y-4">
									<?php the_content(); ?>
								</div>
							</article>
							<?php
						endwhile;
					endif;
					?>
				</div>

				<!-- Right Column: Sidebar (4 cols) -->
				<aside class="lg:col-span-4 flex flex-col gap-8">
					<!-- Search Bar -->
					<div class="w-full">
						<form role="search" method="get" class="search-form w-full relative" action="<?php echo esc_url( home_url( '/' ) ); ?>">
							<label class="w-full block">
								<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'poppy' ); ?></span>
								<input type="search" class="search-field w-full bg-white text-poppy-ink text-xs sm:text-sm px-6 py-3.5 rounded-full border border-slate-200 focus:outline-none focus:border-poppy-accent font-semibold italic placeholder:text-slate-400 placeholder:italic" placeholder="<?php echo esc_attr_x( 'Search Articles...', 'placeholder', 'poppy' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
							</label>
						</form>
					</div>

					<!-- Categories Widget Card -->
					<div class="bg-white rounded-[32px] p-8 border border-slate-100 shadow-[0_8px_30px_rgba(0,0,0,0.015)] text-left">
						<div class="pb-3 border-b-2 border-poppy-ink mb-6">
							<h3 class="text-base sm:text-lg font-black text-poppy-ink font-serif uppercase tracking-wide">
								Categories
							</h3>
						</div>
						<ul class="space-y-4">
							<?php
							$categories = get_categories();
							foreach ( $categories as $category ) :
								?>
								<li class="border-b border-slate-100/70 pb-3 last:border-b-0 last:pb-0">
									<a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>" class="text-sm font-semibold italic text-poppy-muted hover:text-poppy-accent transition block">
										<?php echo esc_html( $category->name ); ?>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>

					<!-- Recent Post Widget Card -->
					<div class="bg-white rounded-[32px] p-8 border border-slate-100 shadow-[0_8px_30px_rgba(0,0,0,0.015)] text-left">
						<div class="pb-3 border-b-2 border-poppy-ink mb-6">
							<h3 class="text-base sm:text-lg font-black text-poppy-ink font-serif uppercase tracking-wide">
								Recent Post
							</h3>
						</div>
						<ul class="space-y-4">
							<?php
							$recent_posts = array();
							$recent_posts_query = new WP_Query( array(
								'post_type'      => 'post',
								'posts_per_page' => 5,
								'post_status'    => 'publish',
							) );

							if ( $recent_posts_query->have_posts() ) {
								while ( $recent_posts_query->have_posts() ) {
									$recent_posts_query->the_post();
									$recent_posts[] = array(
										'title'     => get_the_title(),
										'permalink' => get_permalink(),
										'date'      => get_the_date( 'd F Y' ),
									);
								}
								wp_reset_postdata();
							}

							// Backfill with mock recent posts if fewer than 5
							$current_recent_count = count( $recent_posts );
							for ( $m = $current_recent_count; $m < 5; $m ++ ) {
								$recent_posts[] = array(
									'title'     => 'Lorem ipsum dolor sit amet',
									'permalink' => '#',
									'date'      => '21 Juli 2026',
								);
							}

							foreach ( $recent_posts as $rec_post ) :
								?>
								<li class="border-b border-slate-100/70 pb-3 last:border-b-0 last:pb-0">
									<div class="text-[10px] sm:text-xs text-poppy-muted/50 italic font-semibold mb-1">
										<?php echo esc_html( $rec_post['date'] ); ?>
									</div>
									<p class="text-xs sm:text-sm font-normal text-poppy-ink leading-snug hover:text-poppy-accent transition">
										<?php if ( $rec_post['permalink'] !== '#' ) : ?>
											<a href="<?php echo esc_url( $rec_post['permalink'] ); ?>">
												<?php echo esc_html( $rec_post['title'] ); ?>
											</a>
										<?php else : ?>
											<?php echo esc_html( $rec_post['title'] ); ?>
										<?php endif; ?>
									</p>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>

					<!-- Similar Post Widget Card -->
					<div class="bg-white rounded-[32px] p-8 border border-slate-100 shadow-[0_8px_30px_rgba(0,0,0,0.015)] text-left">
						<div class="pb-3 border-b-2 border-poppy-ink mb-6">
							<h3 class="text-base sm:text-lg font-black text-poppy-ink font-serif uppercase tracking-wide">
								Similar Post
							</h3>
						</div>
						<ul class="space-y-4">
							<?php
							$current_categories = wp_get_post_categories( get_the_ID() );
							$similar_posts = array();

							if ( ! empty( $current_categories ) ) {
								$similar_posts_query = new WP_Query( array(
									'category__in'   => $current_categories,
									'post__not_in'   => array( get_the_ID() ),
									'posts_per_page' => 5,
									'post_status'    => 'publish',
								) );

								if ( $similar_posts_query->have_posts() ) {
									while ( $similar_posts_query->have_posts() ) {
										$similar_posts_query->the_post();
										$similar_posts[] = array(
											'title'     => get_the_title(),
											'permalink' => get_permalink(),
											'date'      => get_the_date( 'd F Y' ),
										);
									}
									wp_reset_postdata();
								}
							}

							// Backfill with mock similar posts if fewer than 5
							$current_similar_count = count( $similar_posts );
							for ( $k = $current_similar_count; $k < 5; $k ++ ) {
								$similar_posts[] = array(
									'title'     => 'Lorem ipsum dolor sit amet',
									'permalink' => '#',
									'date'      => '21 Juli 2026',
								);
							}

							foreach ( $similar_posts as $sim_post ) :
								?>
								<li class="border-b border-slate-100/70 pb-3 last:border-b-0 last:pb-0">
									<div class="text-[10px] sm:text-xs text-poppy-muted/50 italic font-semibold mb-1">
										<?php echo esc_html( $sim_post['date'] ); ?>
									</div>
									<p class="text-xs sm:text-sm font-normal text-poppy-ink leading-snug hover:text-poppy-accent transition">
										<?php if ( $sim_post['permalink'] !== '#' ) : ?>
											<a href="<?php echo esc_url( $sim_post['permalink'] ); ?>">
												<?php echo esc_html( $sim_post['title'] ); ?>
											</a>
										<?php else : ?>
											<?php echo esc_html( $sim_post['title'] ); ?>
										<?php endif; ?>
									</p>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>

					<!-- Hot Deals Banner Widget -->
					<div class="text-left">
						<div class="pb-3 border-b-2 border-poppy-accent mb-6">
							<h3 class="text-base sm:text-lg font-black text-poppy-accent font-serif uppercase tracking-wide">
								Hot Deals
							</h3>
						</div>
						<div class="w-full rounded-[32px] overflow-hidden shadow-sm border border-slate-100">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/dummyposter.webp' ); ?>" alt="Hot Deals Banner" class="w-full h-auto object-cover select-none pointer-events-none" />
						</div>
					</div>
				</aside>
			</div>

			<!-- Divider line and Related Posts Section -->
			<hr class="border-t border-slate-100 my-12" />

			<?php
			// Fetch categories of the current post
			$categories_related = wp_get_post_categories( get_the_ID() );
			$related_posts = array();

			if ( ! empty( $categories_related ) ) {
				$related_query = new WP_Query( array(
					'category__in'   => $categories_related,
					'post__not_in'   => array( get_the_ID() ),
					'posts_per_page' => 12,
					'post_status'    => 'publish',
				) );

				if ( $related_query->have_posts() ) {
					while ( $related_query->have_posts() ) {
						$related_query->the_post();
						$img_url = get_the_post_thumbnail_url( get_the_ID(), 'large' );
						if ( ! $img_url ) {
							$img_url = 'https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=600&q=80';
						}
						$related_posts[] = array(
							'title'     => get_the_title(),
							'permalink' => get_permalink(),
							'image'     => $img_url,
						);
					}
					wp_reset_postdata();
				}
			}

			if ( ! empty( $related_posts ) ) :
				$slider_id = 'related-slider';
				?>
				<!-- Related Posts Section -->
				<div class="related-posts-section mb-10">
					<h2 class="h2-responsive font-black text-poppy-ink mb-6 font-serif">
						Artikel Terkait Lainnya
					</h2>

					<!-- Related Slider Scroll Container -->
					<div id="<?php echo esc_attr( $slider_id ); ?>" class="related-slider flex gap-6 overflow-x-auto scroll-smooth snap-x snap-mandatory scrollbar-none pb-4">
						<?php foreach ( $related_posts as $post_item ) : ?>
							<div class="related-slide w-full sm:w-[calc(50%-12px)] lg:w-[calc(33.333%-16px)] shrink-0 snap-start flex flex-col justify-start">
								<!-- Rounded Card Image -->
								<div class="w-full aspect-[4/3] rounded-2xl overflow-hidden mb-4 relative shadow-sm border border-slate-100/50">
									<img src="<?php echo esc_url( $post_item['image'] ); ?>" alt="<?php echo esc_attr( $post_item['title'] ); ?>" class="w-full h-full object-cover transition hover:scale-105 duration-300 select-none pointer-events-none" />
								</div>
								
								<!-- Title -->
								<div class="text-sm sm:text-base md:text-lg font-bold text-poppy-ink leading-snug font-serif line-clamp-2">
									<?php if ( $post_item['permalink'] !== '#' ) : ?>
										<a href="<?php echo esc_url( $post_item['permalink'] ); ?>" class="hover:text-poppy-accent transition">
											<?php echo esc_html( $post_item['title'] ); ?>
										</a>
									<?php else : ?>
										<?php echo esc_html( $post_item['title'] ); ?>
									<?php endif; ?>
								</div>
							</div>
						<?php endforeach; ?>
					</div>

					<!-- Related Slider Navigation Dots (Dynamic) -->
					<?php
					$num_dots_related = ceil( count( $related_posts ) / 3 );
					if ( $num_dots_related > 1 ) :
						?>
						<div class="related-slider-dots flex justify-center items-center gap-2 mt-6" data-target="<?php echo esc_attr( $slider_id ); ?>">
							<?php for ( $d = 0; $d < $num_dots_related; $d ++ ) : ?>
								<div class="slider-dot <?php echo $d === 0 ? 'active border-poppy-accent' : 'border-transparent'; ?> cursor-pointer w-4 h-4 rounded-full border flex items-center justify-center transition">
									<div class="inner-dot w-2 h-2 rounded-full <?php echo $d === 0 ? 'bg-poppy-accent' : 'bg-slate-200 hover:bg-slate-300'; ?> transition-all"></div>
								</div>
							<?php endfor; ?>
						</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
	</section>
</main>

<script>
document.addEventListener('DOMContentLoaded', () => {
	const dotContainer = document.querySelector('.related-slider-dots');
	if (!dotContainer) return;
	
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
			const slides = slider.querySelectorAll('.related-slide');
			// Scroll to the beginning of the 3-card block: index 0, 3, 6, or 9
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
</script>

<?php
get_footer();
