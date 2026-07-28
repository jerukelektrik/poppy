<?php
/**
 * Promos Custom Post Type and Meta Boxes
 *
 * @package POPPY
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Register Custom Post Type for Promos
function poppy_register_promo_cpt(): void {
	$labels = array(
		'name'               => _x( 'Promos', 'post type general name', 'poppy' ),
		'singular_name'      => _x( 'Promo', 'post type singular name', 'poppy' ),
		'menu_name'          => _x( 'Promos', 'admin menu', 'poppy' ),
		'name_admin_bar'     => _x( 'Promo', 'add new on admin bar', 'poppy' ),
		'add_new'            => _x( 'Add New', 'promo', 'poppy' ),
		'add_new_item'       => __( 'Add New Promo', 'poppy' ),
		'new_item'           => __( 'New Promo', 'poppy' ),
		'edit_item'          => __( 'Edit Promo', 'poppy' ),
		'view_item'          => __( 'View Promo', 'poppy' ),
		'all_items'          => __( 'All Promos', 'poppy' ),
		'search_items'       => __( 'Search Promos', 'poppy' ),
		'parent_item_colon'  => __( 'Parent Promos:', 'poppy' ),
		'not_found'          => __( 'No promos found.', 'poppy' ),
		'not_found_in_trash' => __( 'No promos found in Trash.', 'poppy' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => false, // Non-public, no single page routes
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => false,
		'rewrite'            => false,
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => 26,
		'menu_icon'          => 'dashicons-tag',
		'supports'           => array( 'title', 'editor', 'thumbnail' ), // Title, Editor (Promo description), Thumbnail (Featured Image)
	);

	register_post_type( 'promo', $args );
}
add_action( 'init', 'poppy_register_promo_cpt' );

// Register Meta Boxes for Promos
function poppy_add_promo_metaboxes(): void {
	add_meta_box(
		'poppy_promo_details',
		__( 'Promo Settings', 'poppy' ),
		'poppy_promo_metabox_callback',
		'promo',
		'normal',
		'default'
	);
}
add_action( 'add_meta_boxes', 'poppy_add_promo_metaboxes' );

function poppy_promo_metabox_callback( $post ): void {
	wp_nonce_field( 'poppy_save_promo_meta', 'poppy_promo_nonce' );

	$show_on    = get_post_meta( $post->ID, '_promo_show_on', true );
	$action_url = get_post_meta( $post->ID, '_promo_action_url', true );

	// Default to all selected if not set yet
	if ( '' === $show_on ) {
		$show_on_array = array( 'home', 'english-kids', 'pengembangan-diri' );
	} else {
		$show_on_array = explode( ',', $show_on );
	}
	?>
	<p>
		<label for="poppy_promo_action_url"><strong><?php esc_html_e( 'Link Ambil Promo (URL / WhatsApp Link):', 'poppy' ); ?></strong></label><br />
		<input type="text" id="poppy_promo_action_url" name="poppy_promo_action_url" value="<?php echo esc_url( $action_url ); ?>" class="large-text" placeholder="e.g. https://wa.me/6281234567890?text=Halo%20saya%20tertarik%20dengan%20promo%20ini" />
	</p>
	<p>
		<strong><?php esc_html_e( 'Tampilkan di Halaman (Landing Pages):', 'poppy' ); ?></strong><br />
		<label>
			<input type="checkbox" name="poppy_promo_show_on[]" value="home" <?php checked( in_array( 'home', $show_on_array, true ) ); ?> />
			<?php esc_html_e( 'Homepage', 'poppy' ); ?>
		</label><br />
		<label>
			<input type="checkbox" name="poppy_promo_show_on[]" value="english-kids" <?php checked( in_array( 'english-kids', $show_on_array, true ) ); ?> />
			<?php esc_html_e( 'English for Kids', 'poppy' ); ?>
		</label><br />
		<label>
			<input type="checkbox" name="poppy_promo_show_on[]" value="pengembangan-diri" <?php checked( in_array( 'pengembangan-diri', $show_on_array, true ) ); ?> />
			<?php esc_html_e( 'Airlangga Consultant Center', 'poppy' ); ?>
		</label>
	</p>
	<?php
}

// Save Meta Box content
function poppy_save_promo_meta( $post_id ): void {
	if ( ! isset( $_POST['poppy_promo_nonce'] ) ) {
		return;
	}

	if ( ! wp_verify_nonce( $_POST['poppy_promo_nonce'], 'poppy_save_promo_meta' ) ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	if ( isset( $_POST['poppy_promo_action_url'] ) ) {
		update_post_meta( $post_id, '_promo_action_url', esc_url_raw( $_POST['poppy_promo_action_url'] ) );
	}

	if ( isset( $_POST['poppy_promo_show_on'] ) && is_array( $_POST['poppy_promo_show_on'] ) ) {
		$clean_show_on = array_map( 'sanitize_text_field', $_POST['poppy_promo_show_on'] );
		update_post_meta( $post_id, '_promo_show_on', implode( ',', $clean_show_on ) );
	} else {
		update_post_meta( $post_id, '_promo_show_on', '' );
	}
}
add_action( 'save_post_promo', 'poppy_save_promo_meta' );

// Pre-populate mock promo posts if none exist
function poppy_seed_promos(): void {
	$query = new WP_Query( array(
		'post_type'      => 'promo',
		'posts_per_page' => 1,
		'post_status'    => 'any',
	) );

	if ( ! $query->have_posts() ) {
		$dummy_promos = array(
			array(
				'title'      => 'Diskon Kakak & Adik',
				'content'    => 'Dapatkan diskon khusus pendaftaran untuk kakak dan adik yang mendaftar bersamaan di LKP Airlangga. Diskon berupa pemotongan biaya bimbingan sebesar 10% setiap bulannya.',
				'show_on'    => 'home,english-kids,pengembangan-diri',
				'action_url' => 'https://wa.me/6281234567890?text=Halo%20Airlangga,%20saya%20tertarik%20dengan%20Promo%20Diskon%20Kakak%20Adik!',
			),
			array(
				'title'      => 'Promo New Semester',
				'content'    => 'Sambut semester baru dengan semangat belajar baru! Dapatkan potongan langsung biaya pendaftaran sebesar Rp 100.000 untuk pendaftaran kelas baru di semua tingkatan.',
				'show_on'    => 'home,english-kids,pengembangan-diri',
				'action_url' => 'https://wa.me/6281234567890?text=Halo%20Airlangga,%20saya%20tertarik%20dengan%20Promo%20New%20Semester!',
			),
			array(
				'title'      => 'Promo New Academic Year',
				'content'    => 'Persiapkan tahun ajaran baru lebih awal. Nikmati potongan khusus biaya bimbingan belajar hingga 15% untuk paket bimbingan tahunan yang dibayarkan di awal.',
				'show_on'    => 'home,english-kids,pengembangan-diri',
				'action_url' => 'https://wa.me/6281234567890?text=Halo%20Airlangga,%20saya%20tertarik%20dengan%20Promo%20New%20Academic%20Year!',
			),
			array(
				'title'      => 'Promo Kerjasama Sekolah/Instansi',
				'content'    => 'Program kerjasama khusus untuk sekolah atau instansi Anda. Kami menyediakan program bimbingan kelompok khusus, asesmen minat bakat massal, dan seminar motivasi gratis.',
				'show_on'    => 'home,english-kids,pengembangan-diri',
				'action_url' => 'https://wa.me/6281234567890?text=Halo%20Airlangga,%20saya%20tertarik%20dengan%20Promo%20Kerjasama%20Sekolah!',
			),
		);

		foreach ( $dummy_promos as $promo ) {
			$post_id = wp_insert_post( array(
				'post_title'   => $promo['title'],
				'post_content' => $promo['content'],
				'post_status'  => 'publish',
				'post_type'    => 'promo',
			) );

			if ( $post_id && ! is_wp_error( $post_id ) ) {
				update_post_meta( $post_id, '_promo_show_on', $promo['show_on'] );
				update_post_meta( $post_id, '_promo_action_url', $promo['action_url'] );
			}
		}
	}
}
add_action( 'after_switch_theme', 'poppy_seed_promos' );
add_action( 'init', 'poppy_seed_promos' );
