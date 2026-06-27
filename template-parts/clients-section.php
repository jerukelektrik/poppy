<?php
/**
 * Template part for displaying the Clients section (Dipercaya oleh 100+ Instansi & Institusi)
 *
 * @package POPPY
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="poppy-section bg-transparent pt-16 pb-10 relative z-20">

	<div class="poppy-container relative z-10">
		
		<!-- Section Header -->
		<div class="text-center max-w-3xl mx-auto mb-12">
			<h2 class="text-2xl sm:text-3xl md:text-4xl font-black text-poppy-ink inline-block relative">
				Dipercaya oleh 100+ Instansi & Institusi
				<!-- Decorative curved line under title (Terracotta) -->
				<span class="absolute left-1/2 bottom-[-16px] transform -translate-x-1/2 w-64">
					<svg viewBox="0 0 178 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full">
						<path d="M2 10C35 4 143 4 176 10" stroke="#BD4B3B" stroke-width="6" stroke-linecap="round"/>
					</svg>
				</span>
			</h2>
		</div>

		<!-- Client Logos Grid / Scrollable Container -->
		<div class="w-full max-w-5xl mx-auto mt-12 overflow-hidden">
			<div class="flex items-center justify-between gap-6 md:gap-8 py-4 overflow-x-auto scrollbar-none snap-x snap-mandatory">
				
				<?php for ( $i = 0; $i < 5; $i++ ) : ?>
					<!-- Client Logo Box -->
					<div class="flex-shrink-0 snap-center flex items-center justify-center w-[160px] sm:w-[180px] md:w-[200px] h-20 opacity-90 select-none">
						<!-- Custom SVG logo placeholder matching the spectacles specs logo + AIRLANGGA text -->
						<div class="flex items-center gap-2">
							<svg class="w-8 h-8 flex-shrink-0" viewBox="0 0 50 44" fill="none" xmlns="http://www.w3.org/2000/svg">
								<polygon points="25,4 42,10 25,16 8,10" fill="#132039" />
								<path d="M16,12.7 V16.5 C16,19 20,20.5 25,20.5 C30,20.5 34,19 34,16.5 V12.7" fill="#132039" />
								<path d="M37,11 V18.5 L39,19.5 V11 Z" fill="#132039" />
								<circle cx="39" cy="19.5" r="1.2" fill="#132039" />
								<path d="M16.5,22 C11.8,22 8,25.8 8,30.5 C8,35.2 11.8,39 16.5,39 C20.3,39 23.5,36.5 24.6,33 C25.5,36.5 28.7,39 32.5,39 C37.2,39 41,35.2 41,30.5 C41,25.8 37.2,22 32.5,22 C28.7,22 25.5,24.5 24.6,28 C23.5,24.5 20.3,22 16.5,22 Z M16.5,26.5 C18.7,26.5 20.5,28.3 20.5,30.5 C20.5,32.7 18.7,34.5 16.5,34.5 C14.3,34.5 12.5,32.7 12.5,30.5 C12.5,28.3 14.3,26.5 16.5,26.5 Z M32.5,26.5 C34.7,26.5 36.5,28.3 36.5,30.5 C36.5,32.7 34.7,34.5 32.5,34.5 C30.3,34.5 28.5,32.7 28.5,30.5 C28.5,28.3 30.3,26.5 32.5,26.5 Z" fill="#BD4B3B" />
							</svg>
							<div class="flex flex-col text-left">
								<span class="text-xs font-black tracking-wider text-poppy-accent leading-none font-serif">AIRLANGGA</span>
								<span class="text-[5.5px] font-bold text-poppy-ink tracking-tight uppercase leading-none mt-0.5">LKP</span>
							</div>
						</div>
					</div>
				<?php endfor; ?>

			</div>

			<!-- Pagination Indicator Dots (Mockup match) -->
			<div class="flex items-center justify-center gap-2 mt-4">
				<button class="w-3 h-3 rounded-full bg-poppy-accent scale-110 cursor-pointer focus:outline-none" aria-label="Go to client slide 1"></button>
				<button class="w-3 h-3 rounded-full bg-gray-300 transition duration-300 cursor-pointer focus:outline-none" aria-label="Go to client slide 2"></button>
				<button class="w-3 h-3 rounded-full bg-gray-300 transition duration-300 cursor-pointer focus:outline-none" aria-label="Go to client slide 3"></button>
				<button class="w-3 h-3 rounded-full bg-gray-300 transition duration-300 cursor-pointer focus:outline-none" aria-label="Go to client slide 4"></button>
			</div>

		</div>
	</div>
</section>
