<?php
/**
 * SEO Metadata custom fields and head tags integration.
 *
 * @package POPPY
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Register the SEO Meta Box on pages and posts.
 */
function poppy_seo_register_meta_boxes() {
	$screens = array( 'post', 'page' );
	foreach ( $screens as $screen ) {
		add_meta_box(
			'poppy_seo_settings',
			__( 'SEO Settings', 'poppy' ),
			'poppy_seo_settings_callback',
			$screen,
			'normal',
			'high'
		);
	}
}
add_action( 'add_meta_boxes', 'poppy_seo_register_meta_boxes' );

/**
 * Render SEO Meta Box content.
 *
 * @param WP_Post $post The current post/page object.
 */
function poppy_seo_settings_callback( $post ) {
	// Add a nonce field for security verification
	wp_nonce_field( 'poppy_seo_save_data', 'poppy_seo_nonce' );

	// Retrieve current values
	$seo_title       = get_post_meta( $post->ID, '_poppy_seo_title', true );
	$seo_description = get_post_meta( $post->ID, '_poppy_seo_description', true );
	?>
	<div class="poppy-seo-fields-wrapper" style="padding: 10px 0;">
		
		<div style="margin-bottom: 20px;">
			<label for="poppy_seo_title" style="display: block; font-weight: bold; margin-bottom: 5px;">
				<?php esc_html_e( 'Meta Title', 'poppy' ); ?>
			</label>
			<input 
				type="text" 
				id="poppy_seo_title" 
				name="poppy_seo_title" 
				value="<?php echo esc_attr( $seo_title ); ?>" 
				style="width: 100%; max-width: 600px; height: 36px; padding: 6px 10px; border-radius: 4px; border: 1px solid #ccc;"
				placeholder="<?php esc_attr_e( 'Enter custom SEO Title...', 'poppy' ); ?>"
			/>
			<p class="description" style="margin-top: 5px; color: #666; font-size: 12px;">
				<?php esc_html_e( 'Recommended length: 50-60 characters. Leave empty to use default WordPress page title.', 'poppy' ); ?>
			</p>
		</div>

		<div>
			<label for="poppy_seo_description" style="display: block; font-weight: bold; margin-bottom: 5px;">
				<?php esc_html_e( 'Meta Description', 'poppy' ); ?>
			</label>
			<textarea 
				id="poppy_seo_description" 
				name="poppy_seo_description" 
				rows="4" 
				style="width: 100%; max-width: 600px; padding: 8px 10px; border-radius: 4px; border: 1px solid #ccc; font-family: sans-serif; resize: vertical;"
				placeholder="<?php esc_attr_e( 'Enter custom SEO Meta Description...', 'poppy' ); ?>"
			><?php echo esc_textarea( $seo_description ); ?></textarea>
			<p class="description" style="margin-top: 5px; color: #666; font-size: 12px;">
				<?php esc_html_e( 'Recommended length: 150-160 characters. Summarize the page content for search engines.', 'poppy' ); ?>
			</p>
		</div>

	</div>
	<?php
}

/**
 * Save SEO Meta Box data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function poppy_seo_save_meta_box_data( $post_id ) {
	// Verify nonce
	if ( ! isset( $_POST['poppy_seo_nonce'] ) || ! wp_verify_nonce( $_POST['poppy_seo_nonce'], 'poppy_seo_save_data' ) ) {
		return;
	}

	// Verify user permissions
	if ( isset( $_POST['post_type'] ) && 'page' === $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}
	} else {
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	// Avoid autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Sanitize and save Meta Title
	if ( isset( $_POST['poppy_seo_title'] ) ) {
		$seo_title = sanitize_text_field( $_POST['poppy_seo_title'] );
		update_post_meta( $post_id, '_poppy_seo_title', $seo_title );
	}

	// Sanitize and save Meta Description
	if ( isset( $_POST['poppy_seo_description'] ) ) {
		$seo_desc = sanitize_textarea_field( $_POST['poppy_seo_description'] );
		update_post_meta( $post_id, '_poppy_seo_description', $seo_desc );
	}
}
add_action( 'save_post', 'poppy_seo_save_meta_box_data' );

/**
 * Filter document title to use custom SEO Meta Title.
 *
 * @param array $title_parts Title parts for the current document.
 * @return array Modified title parts.
 */
function poppy_seo_filter_document_title_parts( $title_parts ) {
	if ( is_singular() ) {
		$custom_title = get_post_meta( get_the_ID(), '_poppy_seo_title', true );
		if ( ! empty( $custom_title ) ) {
			$title_parts['title'] = $custom_title;
		}
	}
	return $title_parts;
}
add_filter( 'document_title_parts', 'poppy_seo_filter_document_title_parts' );

/**
 * Output Meta Description tag inside head block.
 */
function poppy_seo_output_meta_description() {
	if ( is_singular() ) {
		$custom_desc = get_post_meta( get_the_ID(), '_poppy_seo_description', true );
		if ( ! empty( $custom_desc ) ) {
			echo "\t" . '<meta name="description" content="' . esc_attr( $custom_desc ) . '">' . "\n";
		}
	}
}
add_action( 'wp_head', 'poppy_seo_output_meta_description', 1 );
