<?php
/**
 * The template for displaying category archive pages
 *
 * @package POPPY
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

<main id="primary" class="site-main category-template flex-grow">
	<!-- Hero Section -->
	<section class="relative overflow-hidden bg-cover bg-center bg-no-repeat rounded-b-[32px] md:rounded-b-[48px] lg:rounded-b-[60px] pt-36 pb-20 md:pt-48 md:pb-28 lg:pt-56 lg:pb-36" style="background-image: url('<?php echo esc_url( get_template_directory_uri() . '/assets/images/background%20blog.webp' ); ?>');">
		<!-- Soft white overlay to match mockup's high brightness -->
		<div class="absolute inset-0 bg-white/75 z-0"></div>
		
		<div class="poppy-container relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-8">
			<!-- Left: Title & Breadcrumbs -->
			<div class="flex flex-col items-start text-left">
				<?php poppy_breadcrumbs( 'text-poppy-ink/70 justify-start', 'text-poppy-ink', 'text-poppy-ink/40' ); ?>
				<h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-[52px] font-black text-poppy-ink leading-tight tracking-tight drop-shadow-sm font-serif">
					<?php single_cat_title(); ?>
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

	<!-- Content Loop Section (To be updated in subsequent briefs) -->
	<section class="poppy-section bg-white relative z-20">
		<div class="poppy-container">
			<?php
			if ( have_posts() ) :
				?>
				<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
					<?php
					while ( have_posts() ) :
						the_post();
						?>
						<article id="post-<?php the_ID(); ?>" <?php post_class( 'bg-white rounded-[32px] p-6 border border-slate-100/80 shadow-sm flex flex-col justify-between' ); ?>>
							<div>
								<h2 class="text-lg font-bold text-poppy-ink mb-2">
									<a href="<?php the_permalink(); ?>" class="hover:text-poppy-accent transition">
										<?php the_title(); ?>
									</a>
								</h2>
								<div class="text-xs text-poppy-muted mb-4">
									<?php echo get_the_date(); ?>
								</div>
								<div class="text-sm text-poppy-muted mb-6 leading-relaxed">
									<?php the_excerpt(); ?>
								</div>
							</div>
							<a href="<?php the_permalink(); ?>" class="text-xs font-bold text-poppy-accent hover:text-poppy-ink transition inline-flex items-center gap-1">
								Baca Selengkapnya &rarr;
							</a>
						</article>
						<?php
					endwhile;
					?>
				</div>
				<?php
				the_posts_navigation();
			else :
				?>
				<p class="text-center text-poppy-muted"><?php esc_html_e( 'Belum ada artikel dalam kategori ini.', 'poppy' ); ?></p>
				<?php
			endif;
			?>
		</div>
	</section>
</main>

<?php
get_footer();
