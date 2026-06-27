<?php
/**
 * Template part for displaying the Program section (Temukan Program Lainnya)
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

$all_cards = array(
	'kids' => array(
		'title'        => 'Airlangga for Kids',
		'description'  => 'Program kursus bahasa Inggris yang dirancang khusus untuk anak-anak dengan metode belajar yang interaktif dan penuh keceriaan.',
		'image'        => 'englishkids.webp',
		'url'          => home_url( '/english-for-kids' ),
		'color_class'  => 'text-poppy-accent font-serif',
		'button_class' => 'bg-poppy-accent hover:bg-poppy-accent/90',
	),
	'bimbel' => array(
		'title'        => 'Airlangga Bimbel',
		'description'  => 'Program bimbel khusus untuk SD, SMP, SMA, dan persiapan UTBK yang dirancang khusus dengan metode belajar yang interaktif dan penuh keceriaan.',
		'image'        => 'thumbnail bimbel.webp',
		'url'          => home_url( '/' ),
		'color_class'  => 'text-poppy-accent font-serif',
		'button_class' => 'bg-poppy-accent hover:bg-poppy-accent/90',
	),
	'consultant' => array(
		'title'        => 'Airlangga Consultant Center',
		'description'  => 'Layanan konsultasi dan coaching secara menyeluruh. Mendampingi individu dan institusi dalam proses tumbuh dan berkembang melalui pendekatan yang terukur, personal, dan berbasis nilai.',
		'image'        => 'training.webp',
		'url'          => home_url( '/pengembangan-diri' ),
		'color_class'  => 'text-poppy-ink',
		'button_class' => 'bg-poppy-ink hover:bg-poppy-ink/90',
	),
);

$display_cards = array();
if ( 'english-kids' === $show_on ) {
	$display_cards = array( $all_cards['bimbel'], $all_cards['consultant'] );
} elseif ( 'pengembangan-diri' === $show_on ) {
	$display_cards = array( $all_cards['kids'], $all_cards['bimbel'] );
} else {
	// default / home
	$display_cards = array( $all_cards['kids'], $all_cards['consultant'] );
}
?>
<section class="poppy-section bg-transparent py-16 relative z-20">
	<div class="poppy-container relative z-10">
		
		<!-- Section Header -->
		<div class="text-center max-w-3xl mx-auto mb-16">
			<h2 class="h2-responsive font-black font-serif <?php echo esc_attr( $title_color_class ); ?> inline-block relative">
				Temukan Program Lainnya
				<!-- Decorative curved line under title -->
				<span class="absolute left-1/2 bottom-[-16px] transform -translate-x-1/2 w-48">
					<svg viewBox="0 0 178 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full">
						<path d="M2 10C35 4 143 4 176 10" stroke="<?php echo esc_attr( $underline_stroke ); ?>" stroke-width="6" stroke-linecap="round"/>
					</svg>
				</span>
			</h2>
		</div>

		<!-- Cards Grid -->
		<div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12 max-w-4xl mx-auto mt-8">
			<?php foreach ( $display_cards as $card ) : ?>
				<div class="bg-white rounded-[32px] overflow-hidden border border-slate-100/80 shadow-sm hover:shadow-md transition duration-300 flex flex-col justify-between h-full w-full">
					<div>
						<!-- Card Banner Image -->
						<div class="aspect-video w-full overflow-hidden bg-gray-100">
							<img 
								src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/' . $card['image'] ); ?>" 
								alt="<?php echo esc_attr( $card['title'] ); ?>" 
								class="w-full h-full object-cover transition hover:scale-105 duration-500"
							/>
						</div>
						
						<!-- Card Body -->
						<div class="p-6 sm:p-8">
							<h3 class="text-base sm:text-lg font-black <?php echo esc_attr( $card['color_class'] ); ?> mb-3 tracking-wide uppercase">
								<?php echo esc_html( $card['title'] ); ?>
							</h3>
							<p class="text-xs sm:text-sm text-poppy-muted leading-relaxed font-medium">
								<?php echo esc_html( $card['description'] ); ?>
							</p>
						</div>
					</div>
					
					<!-- Card Footer -->
					<div class="px-6 pb-6 sm:px-8 sm:pb-8 pt-0">
						<hr class="border-poppy-line/50 mb-6" />
						<div class="text-left">
							<a 
								href="<?php echo esc_url( $card['url'] ); ?>" 
								class="inline-flex items-center justify-center <?php echo esc_attr( $card['button_class'] ); ?> text-white font-extrabold text-xs sm:text-sm px-6 py-3 rounded-xl transition shadow-sm"
							>
								Pilih Paket
							</a>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
