<?php
/**
 * Template part for displaying the Promos section
 *
 * @package POPPY
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$show_on = isset( $args['show_on'] ) ? $args['show_on'] : 'home';

$active_class = 'active font-black text-white bg-gradient-to-r from-poppy-ink to-poppy-accent shadow-md';
if ( 'english-kids' === $show_on ) {
	$active_class = 'active font-black text-poppy-ink bg-[linear-gradient(135deg,#EEF9D9_0%,#99EAA7_100%)] shadow-md';
} elseif ( 'pengembangan-diri' === $show_on ) {
	$active_class = 'active font-black text-poppy-ink bg-[linear-gradient(135deg,#A5E3FD_0%,#C4F8DD_50%,#FFF6E0_100%)] shadow-md';
}

$title_color_class = 'text-poppy-accent';
$underline_stroke  = '#132039';
if ( 'english-kids' === $show_on || 'pengembangan-diri' === $show_on ) {
	$title_color_class = 'text-poppy-ink';
	$underline_stroke  = '#BD4B3B';
}


$meta_query = array(
	'relation' => 'OR',
	array(
		'key'     => '_promo_show_on',
		'value'   => $show_on,
		'compare' => 'LIKE',
	),
	array(
		'key'     => '_promo_show_on',
		'compare' => 'NOT EXISTS',
	),
);

if ( 'home' === $show_on ) {
	$meta_query[] = array(
		'key'     => '_promo_show_on',
		'value'   => '',
		'compare' => '=',
	);
}

$promos_query = new WP_Query( array(
	'post_type'      => 'promo',
	'posts_per_page' => -1,
	'post_status'    => 'publish',
	'meta_query'     => $meta_query,
) );

if ( $promos_query->have_posts() ) :
	?>
	<section id="promo" class="poppy-section bg-white py-16 relative z-20 promo-section-wrapper" data-show-on="<?php echo esc_attr( $show_on ); ?>">
		<div class="poppy-container">
			
			<!-- Section Header -->
			<div class="text-center max-w-3xl mx-auto mb-16">
				<h2 class="h2-responsive font-black <?php echo esc_attr( $title_color_class ); ?> inline-block relative">
					Promo
					<!-- Decorative curved line under title -->
					<span class="absolute left-1/2 bottom-[-16px] transform -translate-x-1/2 w-20">
						<svg viewBox="0 0 178 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full">
							<path d="M2 10C35 4 143 4 176 10" stroke="<?php echo esc_attr( $underline_stroke ); ?>" stroke-width="6" stroke-linecap="round"/>
						</svg>
					</span>
				</h2>
			</div>

			<!-- Layout Grid -->
			<div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start mt-8">
				
				<!-- Left Column: Vertically Stacked Tabs -->
				<div class="lg:col-span-4 flex overflow-x-auto gap-3 py-2 scrollbar-none lg:flex-col lg:overflow-visible lg:py-0">
					<?php
					$tab_index = 0;
					while ( $promos_query->have_posts() ) :
						$promos_query->the_post();
						$is_active = ( 0 === $tab_index );
						?>
						<button 
							data-promo-tab="<?php echo esc_attr( get_the_ID() ); ?>" 
							class="promo-tab-btn relative flex-shrink-0 flex items-center justify-between text-left px-6 py-4 rounded-xl text-xs sm:text-sm transition cursor-pointer lg:w-full <?php echo $is_active ? esc_attr( $active_class ) : 'font-bold text-poppy-muted bg-[#F5F7FA]/60 hover:bg-[#F5F7FA]'; ?>"
						>
							<span class="pr-2"><?php the_title(); ?></span>
							
							<!-- Active vertical indicator (desktop only) -->
							<span class="active-indicator-line absolute right-[-20px] top-1/2 transform -translate-y-1/2 w-1 h-8 rounded-full bg-poppy-accent <?php echo $is_active ? 'hidden lg:block' : 'hidden'; ?> z-20" aria-hidden="true"></span>
						</button>
						<?php
						$tab_index++;
					endwhile;
					$promos_query->rewind_posts();
					?>
				</div>

				<!-- Right Column: Promo Content Cards -->
				<div class="lg:col-span-8 bg-[#F5F7FA] rounded-[32px] md:rounded-[48px] p-6 sm:p-10 relative">
					<?php
					$card_index = 0;
					while ( $promos_query->have_posts() ) :
						$promos_query->the_post();
						$is_active = ( 0 === $card_index );
						$action_url = get_post_meta( get_the_ID(), '_promo_action_url', true ) ?: '#';
						?>
						<div 
							data-promo-card="<?php echo esc_attr( get_the_ID() ); ?>" 
							class="<?php echo $is_active ? 'grid' : 'hidden'; ?> grid-cols-1 md:grid-cols-12 gap-8 items-center"
						>
							<!-- Promo Banner Image (Left) -->
							<div class="md:col-span-6 flex items-center justify-center">
								<?php if ( has_post_thumbnail() ) : ?>
									<?php the_post_thumbnail( 'large', array( 'class' => 'w-full h-auto max-h-[380px] rounded-2xl object-contain shadow-sm bg-white' ) ); ?>
								<?php else : ?>
									<img 
										src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/dummyposter.webp' ); ?>" 
										alt="Promo Banner" 
										class="w-full h-auto max-h-[380px] rounded-2xl object-contain shadow-sm bg-white" 
									/>
								<?php endif; ?>
							</div>

							<!-- Promo Details (Right) -->
							<div class="md:col-span-6 flex flex-col justify-center text-left">
								<h3 class="text-lg sm:text-xl font-black font-serif text-poppy-accent mb-4 tracking-wide uppercase leading-tight">
									<?php the_title(); ?>
								</h3>
								
								<div class="text-xs sm:text-sm text-poppy-muted font-medium leading-relaxed mb-8">
									<?php the_content(); ?>
								</div>
								
								<div>
									<a 
										href="<?php echo esc_url( $action_url ); ?>" 
										target="_blank" 
										class="inline-flex items-center justify-center bg-poppy-accent hover:bg-poppy-accent/90 text-white font-extrabold text-xs sm:text-sm px-8 py-3.5 rounded-lg transition shadow-md shadow-poppy-accent/15"
									>
										Ambil Promo
									</a>
								</div>
							</div>
						</div>
						<?php
						$card_index++;
					endwhile;
					wp_reset_postdata();
					?>
				</div>

			</div>
		</div>
	</section>

	<?php
endif;
