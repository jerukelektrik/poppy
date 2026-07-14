<?php
/**
 * Testimonials Custom Post Type and Meta Boxes
 *
 * @package POPPY
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Register Custom Post Type
function poppy_register_testimonial_cpt(): void {
	$labels = array(
		'name'               => _x( 'Testimonials', 'post type general name', 'poppy' ),
		'singular_name'      => _x( 'Testimonial', 'post type singular name', 'poppy' ),
		'menu_name'          => _x( 'Testimonials', 'admin menu', 'poppy' ),
		'name_admin_bar'     => _x( 'Testimonial', 'add new on admin bar', 'poppy' ),
		'add_new'            => _x( 'Add New', 'testimonial', 'poppy' ),
		'add_new_item'       => __( 'Add New Testimonial', 'poppy' ),
		'new_item'           => __( 'New Testimonial', 'poppy' ),
		'edit_item'          => __( 'Edit Testimonial', 'poppy' ),
		'view_item'          => __( 'View Testimonial', 'poppy' ),
		'all_items'          => __( 'All Testimonials', 'poppy' ),
		'search_items'       => __( 'Search Testimonials', 'poppy' ),
		'parent_item_colon'  => __( 'Parent Testimonials:', 'poppy' ),
		'not_found'          => __( 'No testimonials found.', 'poppy' ),
		'not_found_in_trash' => __( 'No testimonials found in Trash.', 'poppy' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => false, // Keep it non-public so there are no single post pages!
		'publicly_queryable' => false, // Cannot be queried on the front-end directly via URL
		'show_ui'            => true,  // Show in WordPress Admin
		'show_in_menu'       => true,
		'query_var'          => false,
		'rewrite'            => false,
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => 25,
		'menu_icon'          => 'dashicons-testimonial',
		'supports'           => array( 'title', 'editor' ), // Alumnus Name (title) and Testimonial content (editor)
	);

	register_post_type( 'testimonial', $args );
}
add_action( 'init', 'poppy_register_testimonial_cpt' );

// Register Meta Boxes for Testimonial details
function poppy_add_testimonial_metaboxes(): void {
	add_meta_box(
		'poppy_testimonial_details',
		__( 'Alumnus Information', 'poppy' ),
		'poppy_testimonial_metabox_callback',
		'testimonial',
		'normal',
		'default'
	);
}
add_action( 'add_meta_boxes', 'poppy_add_testimonial_metaboxes' );

function poppy_testimonial_metabox_callback( $post ): void {
	// Add nonce for security
	wp_nonce_field( 'poppy_save_testimonial_meta', 'poppy_testimonial_nonce' );

	// Retrieve existing values
	$major   = get_post_meta( $post->ID, '_testimonial_major', true );
	$stars   = get_post_meta( $post->ID, '_testimonial_stars', true );
	$show_on = get_post_meta( $post->ID, '_testimonial_show_on', true );

	if ( '' === $stars ) {
		$stars = 5; // Default to 5 stars
	}

	// Default to all selected if not set yet
	if ( '' === $show_on ) {
		$show_on_array = array( 'home', 'english-kids', 'pengembangan-diri' );
	} else {
		$show_on_array = explode( ',', $show_on );
	}
	?>
	<p>
		<label for="poppy_testimonial_major"><strong><?php esc_html_e( 'School / University & Major:', 'poppy' ); ?></strong></label><br />
		<input type="text" id="poppy_testimonial_major" name="poppy_testimonial_major" value="<?php echo esc_attr( $major ); ?>" class="large-text" placeholder="e.g. Agroteknologi Universitas Brawijaya" />
	</p>
	<p>
		<label for="poppy_testimonial_stars"><strong><?php esc_html_e( 'Star Rating (1 - 5):', 'poppy' ); ?></strong></label><br />
		<select id="poppy_testimonial_stars" name="poppy_testimonial_stars">
			<?php for ( $i = 1; $i <= 5; $i++ ) : ?>
				<option value="<?php echo $i; ?>" <?php selected( $stars, $i ); ?>><?php echo $i; ?> <?php esc_html_e( $i === 1 ? 'Star' : 'Stars', 'poppy' ); ?></option>
			<?php endfor; ?>
		</select>
	</p>
	<p>
		<strong><?php esc_html_e( 'Tampilkan di Halaman (Landing Pages):', 'poppy' ); ?></strong><br />
		<label>
			<input type="checkbox" name="poppy_testimonial_show_on[]" value="home" <?php checked( in_array( 'home', $show_on_array, true ) ); ?> />
			<?php esc_html_e( 'Homepage', 'poppy' ); ?>
		</label><br />
		<label>
			<input type="checkbox" name="poppy_testimonial_show_on[]" value="english-kids" <?php checked( in_array( 'english-kids', $show_on_array, true ) ); ?> />
			<?php esc_html_e( 'English for Kids', 'poppy' ); ?>
		</label><br />
		<label>
			<input type="checkbox" name="poppy_testimonial_show_on[]" value="pengembangan-diri" <?php checked( in_array( 'pengembangan-diri', $show_on_array, true ) ); ?> />
			<?php esc_html_e( 'Airlangga Consulting', 'poppy' ); ?>
		</label>
	</p>
	<?php
}

// Save Meta Box content
function poppy_save_testimonial_meta( $post_id ): void {
	// Check if nonce is set
	if ( ! isset( $_POST['poppy_testimonial_nonce'] ) ) {
		return;
	}

	// Verify nonce
	if ( ! wp_verify_nonce( $_POST['poppy_testimonial_nonce'], 'poppy_save_testimonial_meta' ) ) {
		return;
	}

	// Check permissions
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	// Save school/major
	if ( isset( $_POST['poppy_testimonial_major'] ) ) {
		update_post_meta( $post_id, '_testimonial_major', sanitize_text_field( $_POST['poppy_testimonial_major'] ) );
	}

	// Save stars
	if ( isset( $_POST['poppy_testimonial_stars'] ) ) {
		update_post_meta( $post_id, '_testimonial_stars', intval( $_POST['poppy_testimonial_stars'] ) );
	}

	// Save show on pages
	if ( isset( $_POST['poppy_testimonial_show_on'] ) && is_array( $_POST['poppy_testimonial_show_on'] ) ) {
		$clean_show_on = array_map( 'sanitize_text_field', $_POST['poppy_testimonial_show_on'] );
		update_post_meta( $post_id, '_testimonial_show_on', implode( ',', $clean_show_on ) );
	} else {
		update_post_meta( $post_id, '_testimonial_show_on', '' );
	}
}
add_action( 'save_post_testimonial', 'poppy_save_testimonial_meta' );

// Pre-populate some dummy testimonials if none exist
function poppy_seed_testimonials(): void {
	// Double check if testimonials already exist
	$query = new WP_Query( array(
		'post_type'      => 'testimonial',
		'posts_per_page' => 1,
		'post_status'    => 'any',
	) );

	if ( ! $query->have_posts() ) {
		$dummy_testimonials = array(
			array(
				'title'   => 'Bagas Satria Prabowo',
				'content' => 'Belajar di LKP Airlangga itu enak, asyik dan menyenangkan. Alhamdulillah selama saya belajar di Airlangga saya jadi mengenali potensi diri saya and tentunya nilai saya semakin meningkat dan juga saya lulus SBMPTN jurusan Agroteknologi Universitas Brawijaya. Yuk raih prestasi bersama Airlangga.',
				'major'   => 'Agroteknologi Universitas Brawijaya',
				'stars'   => 5,
				'show_on' => 'home,english-kids,pengembangan-diri',
			),
			array(
				'title'   => 'Anindya Putri',
				'content' => 'Sistem belajar di LKP Airlangga sangat terstruktur. Pengajarnya selalu sabar menjelaskan sampai paham. Saya merasa sangat terbantu hingga lulus ke sekolah favorit pilihan pertama saya. Terima kasih Airlangga!',
				'major'   => 'SMA Negeri 1 Metro',
				'stars'   => 5,
				'show_on' => 'home,english-kids,pengembangan-diri',
			),
			array(
				'title'   => 'Rian Hidayat',
				'content' => 'Tempat bimbel yang paling nyaman, fasilitasnya lengkap dan tutor-tutornya asyik diajak diskusi soal pelajaran maupun karir masa depan. Rekomendasi banget buat yang mau fokus tembus UTBK!',
				'major'   => 'Teknik Informatika ITS',
				'stars'   => 5,
				'show_on' => 'home,english-kids,pengembangan-diri',
			),
		);

		foreach ( $dummy_testimonials as $testi ) {
			$post_id = wp_insert_post( array(
				'post_title'   => $testi['title'],
				'post_content' => $testi['content'],
				'post_status'  => 'publish',
				'post_type'    => 'testimonial',
			) );

			if ( $post_id && ! is_wp_error( $post_id ) ) {
				update_post_meta( $post_id, '_testimonial_major', $testi['major'] );
				update_post_meta( $post_id, '_testimonial_stars', $testi['stars'] );
				update_post_meta( $post_id, '_testimonial_show_on', $testi['show_on'] );
			}
		}
	}
}
add_action( 'after_switch_theme', 'poppy_seed_testimonials' );
add_action( 'init', 'poppy_seed_testimonials' );
