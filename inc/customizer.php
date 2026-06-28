<?php
/**
 * Theme Customizer settings for LKP Airlangga.
 *
 * @package POPPY
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'customize_register', 'poppy_customize_register' );
/**
 * Register customizer options.
 *
 * @param WP_Customize_Manager $wp_customize Customizer manager.
 */
function poppy_customize_register( $wp_customize ): void {
	// Add Section for WhatsApp Feature
	$wp_customize->add_section(
		'poppy_whatsapp_section',
		array(
			'title'       => __( 'WhatsApp Floating Button', 'poppy' ),
			'priority'    => 30,
			'description' => __( 'Fitur ikon melayang WhatsApp untuk semua halaman website.', 'poppy' ),
		)
	);

	// Setting 1: Enable/Disable
	$wp_customize->add_setting(
		'poppy_whatsapp_enable',
		array(
			'default'           => false,
			'sanitize_callback' => 'poppy_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'poppy_whatsapp_enable',
		array(
			'label'   => __( 'Aktifkan Floating Icon WhatsApp', 'poppy' ),
			'section' => 'poppy_whatsapp_section',
			'type'    => 'checkbox',
		)
	);

	// Setting 2: Phone Number
	$wp_customize->add_setting(
		'poppy_whatsapp_number',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'poppy_whatsapp_number',
		array(
			'label'       => __( 'Nomor WhatsApp', 'poppy' ),
			'description' => __( 'Gunakan kode negara tanpa simbol + atau spasi (contoh: 628123456789).', 'poppy' ),
			'section'     => 'poppy_whatsapp_section',
			'type'        => 'text',
		)
	);

	// Setting 3: Default Message
	$wp_customize->add_setting(
		'poppy_whatsapp_message',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'poppy_whatsapp_message',
		array(
			'label'       => __( 'Pesan WhatsApp Otomatis', 'poppy' ),
			'description' => __( 'Pesan pembuka ketika pengunjung mengeklik ikon WhatsApp.', 'poppy' ),
			'section'     => 'poppy_whatsapp_section',
			'type'        => 'textarea',
		)
	);

	// Setting 4: Position
	$wp_customize->add_setting(
		'poppy_whatsapp_position',
		array(
			'default'           => 'bottom_right',
			'sanitize_callback' => 'poppy_sanitize_select',
		)
	);
	$wp_customize->add_control(
		'poppy_whatsapp_position',
		array(
			'label'   => __( 'Posisi Ikon Melayang', 'poppy' ),
			'section' => 'poppy_whatsapp_section',
			'type'    => 'select',
			'choices' => array(
				'bottom_right' => __( 'Kanan Bawah', 'poppy' ),
				'bottom_left'  => __( 'Kiri Bawah', 'poppy' ),
			),
		)
	);

	// Setting 5: Tooltip/Badge Text
	$wp_customize->add_setting(
		'poppy_whatsapp_tooltip',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'poppy_whatsapp_tooltip',
		array(
			'label'       => __( 'Teks Sapaan / Tooltip', 'poppy' ),
			'description' => __( 'Teks melayang di samping ikon WhatsApp (contoh: Hubungi Kami!). Kosongkan jika tidak ingin menampilkan.', 'poppy' ),
			'section'     => 'poppy_whatsapp_section',
			'type'        => 'text',
		)
	);
}

/**
 * Sanitize checkbox inputs.
 *
 * @param bool $checked Checked state.
 * @return bool Sanitized value.
 */
function poppy_sanitize_checkbox( $checked ): bool {
	return ( ( isset( $checked ) && true === $checked ) ? true : false );
}

/**
 * Sanitize select inputs based on choices.
 *
 * @param string               $input Input value.
 * @param WP_Customize_Setting $setting Setting instance.
 * @return string Sanitized value.
 */
function poppy_sanitize_select( $input, $setting ): string {
	$choices = $setting->manager->get_control( $setting->id )->choices;
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

add_action( 'wp_footer', 'poppy_whatsapp_floating_button' );
/**
 * Render the floating WhatsApp button in footer.
 */
function poppy_whatsapp_floating_button(): void {
	$enable   = get_theme_mod( 'poppy_whatsapp_enable', false );
	$number   = get_theme_mod( 'poppy_whatsapp_number', '' );
	$message  = get_theme_mod( 'poppy_whatsapp_message', '' );
	$position = get_theme_mod( 'poppy_whatsapp_position', 'bottom_right' );
	$tooltip  = get_theme_mod( 'poppy_whatsapp_tooltip', '' );

	if ( ! $enable || empty( $number ) ) {
		return;
	}

	// Clean number from non-numeric characters
	$number = preg_replace( '/[^0-9]/', '', $number );

	// Build URL
	$url = 'https://wa.me/' . $number;
	if ( ! empty( $message ) ) {
		$url = add_query_arg( 'text', rawurlencode( $message ), $url );
	}

	// Dynamic positioning classes
	$position_class = 'right-6';
	$flex_row_class = 'flex-row';
	if ( 'bottom_left' === $position ) {
		$position_class = 'left-6';
		$flex_row_class = 'flex-row-reverse';
	}
	?>
	<!-- Floating WhatsApp Button -->
	<div class="fixed bottom-6 <?php echo esc_attr( $position_class ); ?> z-[9999] flex items-center gap-3 group pointer-events-auto select-none">
		
		<?php if ( ! empty( $tooltip ) ) : ?>
			<!-- Tooltip Text (Desktop only) -->
			<span class="hidden md:inline-flex bg-white text-poppy-ink shadow-lg rounded-xl px-4 py-2 text-xs font-bold border border-slate-100/80 opacity-0 transform translate-y-2 scale-95 transition-all duration-300 pointer-events-none group-hover:opacity-100 group-hover:translate-y-0 group-hover:scale-100 <?php echo 'bottom_left' === $position ? 'order-2' : ''; ?>">
				<?php echo esc_html( $tooltip ); ?>
			</span>
		<?php endif; ?>

		<a href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener noreferrer" class="w-12 h-12 md:w-14 md:h-14 bg-[#25D366] hover:bg-[#20BA5A] text-white rounded-full flex items-center justify-center shadow-lg hover:shadow-xl hover:scale-110 transition duration-300 focus:outline-none relative <?php echo 'bottom_left' === $position ? 'order-1' : ''; ?>">
			<!-- WhatsApp SVG Icon -->
			<svg class="w-6 h-6 md:w-7 md:h-7 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
				<path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L0 24l6.335-1.662c1.746.953 3.71 1.458 5.705 1.459h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
			</svg>
			
			<!-- Ping attention dot -->
			<span class="absolute top-0 right-0 h-3.5 w-3.5 translate-x-1/4 -translate-y-1/4 z-10">
				<span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
				<span class="relative inline-flex rounded-full h-3.5 w-3.5 bg-red-500"></span>
			</span>
		</a>
	</div>
	<?php
}
