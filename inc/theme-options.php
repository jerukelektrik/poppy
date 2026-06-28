<?php
/**
 * POPPY Theme Options Administration Panel and Frontend Integrations.
 *
 * @package POPPY
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Register the Theme Options admin menu item.
 */
function poppy_add_theme_options_menu() {
	add_menu_page(
		__( 'POPPY Options', 'poppy' ),
		__( 'POPPY Options', 'poppy' ),
		'manage_options',
		'poppy-options',
		'poppy_theme_options_page',
		'dashicons-admin-generic',
		59
	);
}
add_action( 'admin_menu', 'poppy_add_theme_options_menu' );

/**
 * Helper to get theme options array with defaults.
 */
function poppy_get_theme_options() {
	$defaults = array(
		// Social URL Settings
		'facebook_url'               => '',
		'youtube_url'                => '',
		'instagram_url'              => '',
		'threads_url'                => '',
		'tiktok_url'                 => '',
		'linkedin_url'               => '',
		'whatsapp_number'            => '',
		// Social Metadata Toggles
		'enable_og_title'            => 0,
		'enable_og_desc'             => 0,
		'social_fallback_image'      => '',
		'enable_social_preview'      => 0,
		'enable_twitter_card'        => 0,
		// Social Metadata Toggles
		// SEO Indexing
		'noindex_category'           => 0,
		'noindex_tag'                => 0,
		'noindex_search'             => 0,
		'noindex_author'             => 0,
		'noindex_date'               => 0,
		// SEO Canonical
		'enable_canonical_url'       => 1,
		// SEO Schema Toggles
		'enable_schema_org'          => 0,
		'enable_schema_local'        => 0,
		'enable_schema_article'      => 0,
		'enable_schema_breadcrumbs'  => 0,
		// SEO Breadcrumbs
		'enable_breadcrumbs_frontend' => 0,
		// XML Sitemap
		'enable_xml_sitemap'        => 1,
		// Third-party Integrations
		'gtm_id'                     => '',
		'meta_pixel_id'              => '',
	);

	$saved = get_option( 'poppy_theme_options', array() );
	return wp_parse_args( $saved, $defaults );
}

/**
 * Render Theme Options Dashboard page.
 */
function poppy_theme_options_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	// Handle Save Action
	if ( isset( $_POST['poppy_options_save'] ) ) {
		if ( ! isset( $_POST['poppy_theme_options_nonce'] ) || ! wp_verify_nonce( $_POST['poppy_theme_options_nonce'], 'poppy_theme_options_save' ) ) {
			echo '<div class="notice notice-error"><p>' . esc_html__( 'Security check failed. Settings not saved.', 'poppy' ) . '</p></div>';
		} else {
			$options = poppy_get_theme_options();
			$active_tab = isset( $_POST['active_tab'] ) ? sanitize_key( $_POST['active_tab'] ) : 'social';
			
			if ( 'social' === $active_tab ) {
				// Sanitize Social Media inputs
				$options['facebook_url']          = esc_url_raw( $_POST['facebook_url'] );
				$options['youtube_url']           = esc_url_raw( $_POST['youtube_url'] );
				$options['instagram_url']         = esc_url_raw( $_POST['instagram_url'] );
				$options['threads_url']           = esc_url_raw( $_POST['threads_url'] );
				$options['tiktok_url']            = esc_url_raw( $_POST['tiktok_url'] );
				$options['linkedin_url']          = esc_url_raw( $_POST['linkedin_url'] );
				$options['whatsapp_number']       = sanitize_text_field( $_POST['whatsapp_number'] );

				$options['enable_og_title']       = isset( $_POST['enable_og_title'] ) ? 1 : 0;
				$options['enable_og_desc']        = isset( $_POST['enable_og_desc'] ) ? 1 : 0;
				$options['social_fallback_image'] = esc_url_raw( $_POST['social_fallback_image'] );
				$options['enable_social_preview'] = isset( $_POST['enable_social_preview'] ) ? 1 : 0;
				$options['enable_twitter_card']   = isset( $_POST['enable_twitter_card'] ) ? 1 : 0;
			} elseif ( 'seo' === $active_tab ) {
				$options['noindex_category']      = isset( $_POST['noindex_category'] ) ? 1 : 0;
				$options['noindex_tag']           = isset( $_POST['noindex_tag'] ) ? 1 : 0;
				$options['noindex_search']        = isset( $_POST['noindex_search'] ) ? 1 : 0;
				$options['noindex_author']        = isset( $_POST['noindex_author'] ) ? 1 : 0;
				$options['noindex_date']          = isset( $_POST['noindex_date'] ) ? 1 : 0;

				$options['enable_canonical_url']  = isset( $_POST['enable_canonical_url'] ) ? 1 : 0;

				$options['enable_schema_org']         = isset( $_POST['enable_schema_org'] ) ? 1 : 0;
				$options['enable_schema_local']       = isset( $_POST['enable_schema_local'] ) ? 1 : 0;
				$options['enable_schema_article']     = isset( $_POST['enable_schema_article'] ) ? 1 : 0;
				$options['enable_schema_breadcrumbs'] = isset( $_POST['enable_schema_breadcrumbs'] ) ? 1 : 0;

				$options['enable_breadcrumbs_frontend'] = isset( $_POST['enable_breadcrumbs_frontend'] ) ? 1 : 0;

				$options['enable_xml_sitemap'] = isset( $_POST['enable_xml_sitemap'] ) ? 1 : 0;
			} elseif ( 'integrations' === $active_tab ) {
				// Sanitize Third-party Integrations
				$options['gtm_id']                = sanitize_text_field( $_POST['gtm_id'] );
				$options['meta_pixel_id']         = sanitize_text_field( $_POST['meta_pixel_id'] );
			}

			update_option( 'poppy_theme_options', $options );
			if ( 'seo' === $active_tab ) {
				flush_rewrite_rules( false );
			}
			echo '<div class="notice notice-success is-dismissible"><p>' . esc_html__( 'Settings saved successfully!', 'poppy' ) . '</p></div>';
		}
	}

	$options = poppy_get_theme_options();
	$current_tab = isset( $_GET['tab'] ) ? sanitize_key( $_GET['tab'] ) : 'social';
	?>
	<div class="wrap poppy-options-wrap">
		<h1 style="margin-bottom: 20px; font-weight: 800;"><?php echo esc_html__( 'POPPY Theme Options', 'poppy' ); ?></h1>
		
		<h2 class="nav-tab-wrapper">
			<a href="?page=poppy-options&tab=social" class="nav-tab <?php echo $current_tab === 'social' ? 'nav-tab-active' : ''; ?>">
				<?php esc_html_e( 'Social Media', 'poppy' ); ?>
			</a>
			<a href="?page=poppy-options&tab=seo" class="nav-tab <?php echo $current_tab === 'seo' ? 'nav-tab-active' : ''; ?>">
				<?php esc_html_e( 'SEO Settings', 'poppy' ); ?>
			</a>
			<a href="?page=poppy-options&tab=integrations" class="nav-tab <?php echo $current_tab === 'integrations' ? 'nav-tab-active' : ''; ?>">
				<?php esc_html_e( 'Third-Party Integrations', 'poppy' ); ?>
			</a>
		</h2>

		<form method="post" action="" style="background: #fff; padding: 25px 35px; border: 1px solid #ccd0d4; border-top: none; max-width: 900px; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
			<?php wp_nonce_field( 'poppy_theme_options_save', 'poppy_theme_options_nonce' ); ?>
			<input type="hidden" name="active_tab" value="<?php echo esc_attr( $current_tab ); ?>" />

			<?php if ( $current_tab === 'social' ) : ?>
				<!-- SOCIAL MEDIA TAB -->
				<h2 style="border-bottom: 1px solid #eee; padding-bottom: 10px; font-weight: 700; margin-top: 0;"><?php esc_html_e( 'Social Media Integration', 'poppy' ); ?></h2>
				<table class="form-table">
					<tr>
						<th scope="row"><label for="facebook_url"><?php esc_html_e( 'Facebook URL', 'poppy' ); ?></label></th>
						<td>
							<input type="url" id="facebook_url" name="facebook_url" value="<?php echo esc_url( $options['facebook_url'] ); ?>" class="regular-text" placeholder="https://facebook.com/username" />
						</td>
					</tr>
					<tr>
						<th scope="row"><label for="youtube_url"><?php esc_html_e( 'YouTube URL', 'poppy' ); ?></label></th>
						<td>
							<input type="url" id="youtube_url" name="youtube_url" value="<?php echo esc_url( $options['youtube_url'] ); ?>" class="regular-text" placeholder="https://youtube.com/c/channel" />
						</td>
					</tr>
					<tr>
						<th scope="row"><label for="instagram_url"><?php esc_html_e( 'Instagram URL', 'poppy' ); ?></label></th>
						<td>
							<input type="url" id="instagram_url" name="instagram_url" value="<?php echo esc_url( $options['instagram_url'] ); ?>" class="regular-text" placeholder="https://instagram.com/username" />
						</td>
					</tr>
					<tr>
						<th scope="row"><label for="threads_url"><?php esc_html_e( 'Threads URL', 'poppy' ); ?></label></th>
						<td>
							<input type="url" id="threads_url" name="threads_url" value="<?php echo esc_url( $options['threads_url'] ); ?>" class="regular-text" placeholder="https://threads.net/@username" />
						</td>
					</tr>
					<tr>
						<th scope="row"><label for="tiktok_url"><?php esc_html_e( 'TikTok URL', 'poppy' ); ?></label></th>
						<td>
							<input type="url" id="tiktok_url" name="tiktok_url" value="<?php echo esc_url( $options['tiktok_url'] ); ?>" class="regular-text" placeholder="https://tiktok.com/@username" />
						</td>
					</tr>
					<tr>
						<th scope="row"><label for="linkedin_url"><?php esc_html_e( 'LinkedIn URL', 'poppy' ); ?></label></th>
						<td>
							<input type="url" id="linkedin_url" name="linkedin_url" value="<?php echo esc_url( $options['linkedin_url'] ); ?>" class="regular-text" placeholder="https://linkedin.com/company/name" />
						</td>
					</tr>
					<tr>
						<th scope="row"><label for="whatsapp_number"><?php esc_html_e( 'WhatsApp Number', 'poppy' ); ?></label></th>
						<td>
							<input type="text" id="whatsapp_number" name="whatsapp_number" value="<?php echo esc_attr( $options['whatsapp_number'] ); ?>" class="regular-text" placeholder="628123456789" />
							<p class="description"><?php esc_html_e( 'Use country code format without spaces or symbols.', 'poppy' ); ?></p>
						</td>
					</tr>
				</table>

				<h2 style="border-bottom: 1px solid #eee; padding-bottom: 10px; font-weight: 700; margin-top: 30px;"><?php esc_html_e( 'Open Graph & Social Metadata Settings', 'poppy' ); ?></h2>
				<table class="form-table">
					<tr>
						<th scope="row"><?php esc_html_e( 'Enable OG Title', 'poppy' ); ?></th>
						<td>
							<label>
								<input type="checkbox" name="enable_og_title" value="1" <?php checked( $options['enable_og_title'], 1 ); ?> />
								<?php esc_html_e( 'Enable Open Graph title output.', 'poppy' ); ?>
							</label>
						</td>
					</tr>
					<tr>
						<th scope="row"><?php esc_html_e( 'Enable OG Description', 'poppy' ); ?></th>
						<td>
							<label>
								<input type="checkbox" name="enable_og_desc" value="1" <?php checked( $options['enable_og_desc'], 1 ); ?> />
								<?php esc_html_e( 'Enable Open Graph description output.', 'poppy' ); ?>
							</label>
						</td>
					</tr>
					<tr>
						<th scope="row"><label for="social_fallback_image"><?php esc_html_e( 'Default Sharing Image', 'poppy' ); ?></label></th>
						<td>
							<input type="url" id="social_fallback_image" name="social_fallback_image" value="<?php echo esc_url( $options['social_fallback_image'] ); ?>" class="large-text" placeholder="https://yoursite.com/image.jpg" />
							<p class="description"><?php esc_html_e( 'URL to a fallback banner image shown on social media shares when featured images are not defined.', 'poppy' ); ?></p>
						</td>
					</tr>
					<tr>
						<th scope="row"><?php esc_html_e( 'Preview Facebook/X Settings', 'poppy' ); ?></th>
						<td>
							<label>
								<input type="checkbox" name="enable_social_preview" value="1" <?php checked( $options['enable_social_preview'], 1 ); ?> />
								<?php esc_html_e( 'Enable basic social layout tags.', 'poppy' ); ?>
							</label>
						</td>
					</tr>
					<tr>
						<th scope="row"><?php esc_html_e( 'Enable Twitter Cards', 'poppy' ); ?></th>
						<td>
							<label>
								<input type="checkbox" name="enable_twitter_card" value="1" <?php checked( $options['enable_twitter_card'], 1 ); ?> />
								<?php esc_html_e( 'Enable Twitter card metadata layout outputs.', 'poppy' ); ?>
							</label>
						</td>
					</tr>
				</table>

			<?php elseif ( $current_tab === 'seo' ) : ?>
				<!-- SEO TAB -->
				<h2 style="border-bottom: 1px solid #eee; padding-bottom: 10px; font-weight: 700; margin-top: 0;"><?php esc_html_e( 'Indexing Controls (Add Noindex)', 'poppy' ); ?></h2>
				<p class="description" style="margin-bottom: 15px;"><?php esc_html_e( 'Select the sections that should be set to noindex, follow to keep them out of search results:', 'poppy' ); ?></p>
				<table class="form-table">
					<tr>
						<th scope="row"><?php esc_html_e( 'Noindex Categories', 'poppy' ); ?></th>
						<td>
							<label>
								<input type="checkbox" name="noindex_category" value="1" <?php checked( $options['noindex_category'], 1 ); ?> />
								<?php esc_html_e( 'Add noindex to Category Archives.', 'poppy' ); ?>
							</label>
						</td>
					</tr>
					<tr>
						<th scope="row"><?php esc_html_e( 'Noindex Tags', 'poppy' ); ?></th>
						<td>
							<label>
								<input type="checkbox" name="noindex_tag" value="1" <?php checked( $options['noindex_tag'], 1 ); ?> />
								<?php esc_html_e( 'Add noindex to Tag Archives.', 'poppy' ); ?>
							</label>
						</td>
					</tr>
					<tr>
						<th scope="row"><?php esc_html_e( 'Noindex Search Results', 'poppy' ); ?></th>
						<td>
							<label>
								<input type="checkbox" name="noindex_search" value="1" <?php checked( $options['noindex_search'], 1 ); ?> />
								<?php esc_html_e( 'Add noindex to the Search Results page.', 'poppy' ); ?>
							</label>
						</td>
					</tr>
					<tr>
						<th scope="row"><?php esc_html_e( 'Noindex Author Archives', 'poppy' ); ?></th>
						<td>
							<label>
								<input type="checkbox" name="noindex_author" value="1" <?php checked( $options['noindex_author'], 1 ); ?> />
								<?php esc_html_e( 'Add noindex to Author Pages.', 'poppy' ); ?>
							</label>
						</td>
					</tr>
					<tr>
						<th scope="row"><?php esc_html_e( 'Noindex Date Archives', 'poppy' ); ?></th>
						<td>
							<label>
								<input type="checkbox" name="noindex_date" value="1" <?php checked( $options['noindex_date'], 1 ); ?> />
								<?php esc_html_e( 'Add noindex to Date-based Archive lists.', 'poppy' ); ?>
							</label>
						</td>
					</tr>
				</table>

				<h2 style="border-bottom: 1px solid #eee; padding-bottom: 10px; font-weight: 700; margin-top: 30px;"><?php esc_html_e( 'Canonical URLs', 'poppy' ); ?></h2>
				<table class="form-table">
					<tr>
						<th scope="row"><?php esc_html_e( 'Enable Canonical URL', 'poppy' ); ?></th>
						<td>
							<label>
								<input type="checkbox" name="enable_canonical_url" value="1" <?php checked( $options['enable_canonical_url'], 1 ); ?> />
								<?php esc_html_e( 'Output canonical URL tags for indexable pages, posts, and archives.', 'poppy' ); ?>
							</label>
							<p class="description"><?php esc_html_e( 'Recommended for avoiding duplicate URL signals from parameters, pagination, and alternate URL forms.', 'poppy' ); ?></p>
						</td>
					</tr>
				</table>

				<h2 style="border-bottom: 1px solid #eee; padding-bottom: 10px; font-weight: 700; margin-top: 30px;"><?php esc_html_e( 'Schema Integrations (JSON-LD)', 'poppy' ); ?></h2>
				<table class="form-table">
					<tr>
						<th scope="row"><?php esc_html_e( 'Organization Schema', 'poppy' ); ?></th>
						<td>
							<label>
								<input type="checkbox" name="enable_schema_org" value="1" <?php checked( $options['enable_schema_org'], 1 ); ?> />
								<?php esc_html_e( 'Enable Organization structured data markup.', 'poppy' ); ?>
							</label>
						</td>
					</tr>
					<tr>
						<th scope="row"><?php esc_html_e( 'Local Business Schema', 'poppy' ); ?></th>
						<td>
							<label>
								<input type="checkbox" name="enable_schema_local" value="1" <?php checked( $options['enable_schema_local'], 1 ); ?> />
								<?php esc_html_e( 'Enable Local Business structured data markup.', 'poppy' ); ?>
							</label>
						</td>
					</tr>
					<tr>
						<th scope="row"><?php esc_html_e( 'Article Schema', 'poppy' ); ?></th>
						<td>
							<label>
								<input type="checkbox" name="enable_schema_article" value="1" <?php checked( $options['enable_schema_article'], 1 ); ?> />
								<?php esc_html_e( 'Enable Article metadata schema on single blog posts.', 'poppy' ); ?>
							</label>
						</td>
					</tr>
					<tr>
						<th scope="row"><?php esc_html_e( 'Breadcrumb List Schema', 'poppy' ); ?></th>
						<td>
							<label>
								<input type="checkbox" name="enable_schema_breadcrumbs" value="1" <?php checked( $options['enable_schema_breadcrumbs'], 1 ); ?> />
								<?php esc_html_e( 'Enable BreadcrumbList schema markup.', 'poppy' ); ?>
							</label>
						</td>
					</tr>
				</table>

				<h2 style="border-bottom: 1px solid #eee; padding-bottom: 10px; font-weight: 700; margin-top: 30px;"><?php esc_html_e( 'Breadcrumbs Navigation', 'poppy' ); ?></h2>
				<table class="form-table">
					<tr>
						<th scope="row"><?php esc_html_e( 'Enable Breadcrumbs', 'poppy' ); ?></th>
						<td>
							<label>
								<input type="checkbox" name="enable_breadcrumbs_frontend" value="1" <?php checked( $options['enable_breadcrumbs_frontend'], 1 ); ?> />
								<?php esc_html_e( 'Show breadcrumbs navigation inside subpage Hero sections.', 'poppy' ); ?>
							</label>
						</td>
					</tr>
				</table>

				<h2 style="border-bottom: 1px solid #eee; padding-bottom: 10px; font-weight: 700; margin-top: 30px;"><?php esc_html_e( 'XML Sitemap', 'poppy' ); ?></h2>
				<table class="form-table">
					<tr>
						<th scope="row"><?php esc_html_e( 'Enable XML Sitemap', 'poppy' ); ?></th>
						<td>
							<label>
								<input type="checkbox" name="enable_xml_sitemap" value="1" <?php checked( $options['enable_xml_sitemap'], 1 ); ?> />
								<?php esc_html_e( 'Generate a native theme sitemap at /sitemap.xml.', 'poppy' ); ?>
							</label>
							<p class="description">
								<?php
								printf(
									wp_kses_post( __( 'Sitemap URL: <a href="%s" target="_blank" rel="noopener noreferrer">%s</a>. Disable this if another SEO plugin already generates sitemap.xml.', 'poppy' ) ),
									esc_url( home_url( '/sitemap.xml' ) ),
									esc_html( home_url( '/sitemap.xml' ) )
								);
								?>
							</p>
						</td>
					</tr>
				</table>

			<?php elseif ( $current_tab === 'integrations' ) : ?>
				<!-- INTEGRATION TAB -->
				<h2 style="border-bottom: 1px solid #eee; padding-bottom: 10px; font-weight: 700; margin-top: 0;"><?php esc_html_e( 'Third-Party Analytics & Scripts', 'poppy' ); ?></h2>
				<table class="form-table">
					<tr>
						<th scope="row"><label for="gtm_id"><?php esc_html_e( 'Google Tag Manager ID', 'poppy' ); ?></label></th>
						<td>
							<input type="text" id="gtm_id" name="gtm_id" value="<?php echo esc_attr( $options['gtm_id'] ); ?>" class="regular-text" placeholder="GTM-XXXXXXX" />
							<p class="description"><?php esc_html_e( 'Input Google Tag Manager container ID.', 'poppy' ); ?></p>
						</td>
					</tr>
					<tr>
						<th scope="row"><label for="meta_pixel_id"><?php esc_html_e( 'Meta (Facebook) Pixel ID', 'poppy' ); ?></label></th>
						<td>
							<input type="text" id="meta_pixel_id" name="meta_pixel_id" value="<?php echo esc_attr( $options['meta_pixel_id'] ); ?>" class="regular-text" placeholder="15 Digit Pixel ID" />
							<p class="description"><?php esc_html_e( 'Input Meta Pixel ID.', 'poppy' ); ?></p>
						</td>
					</tr>
				</table>
			<?php endif; ?>

			<p class="submit" style="margin-top: 25px; padding-top: 15px; border-top: 1px solid #eee;">
				<input type="submit" name="poppy_options_save" class="button button-primary button-large" value="<?php esc_attr_e( 'Save Settings', 'poppy' ); ?>" />
			</p>
		</form>
	</div>
	<?php
}



/**
 * Output SEO meta description tags on the front page and noindex tags where specified.
 */
function poppy_theme_options_seo_meta_tags() {
	$options = poppy_get_theme_options();



	// Indexing Controls (noindex tags)
	$noindex = false;
	if ( is_category() && $options['noindex_category'] ) {
		$noindex = true;
	} elseif ( is_tag() && $options['noindex_tag'] ) {
		$noindex = true;
	} elseif ( is_search() && $options['noindex_search'] ) {
		$noindex = true;
	} elseif ( is_author() && $options['noindex_author'] ) {
		$noindex = true;
	} elseif ( is_date() && $options['noindex_date'] ) {
		$noindex = true;
	}

	if ( $noindex ) {
		echo "\t" . '<meta name="robots" content="noindex, follow">' . "\n";
	}
}
add_action( 'wp_head', 'poppy_theme_options_seo_meta_tags', 2 );

/**
 * Disable WordPress core canonical output when theme canonical URLs are enabled.
 */
function poppy_theme_options_maybe_disable_core_canonical() {
	$options = poppy_get_theme_options();

	if ( ! empty( $options['enable_canonical_url'] ) ) {
		remove_action( 'wp_head', 'rel_canonical' );
	}
}
add_action( 'wp', 'poppy_theme_options_maybe_disable_core_canonical' );

/**
 * Resolve the canonical URL for the current request.
 *
 * @return string
 */
function poppy_theme_options_get_canonical_url() {
	if ( is_search() || is_404() ) {
		return '';
	}

	if ( is_front_page() ) {
		return home_url( '/' );
	}

	if ( is_home() ) {
		$posts_page_id = (int) get_option( 'page_for_posts' );
		return $posts_page_id ? get_permalink( $posts_page_id ) : get_post_type_archive_link( 'post' );
	}

	if ( is_singular() ) {
		return get_permalink();
	}

	if ( is_category() || is_tag() || is_tax() ) {
		$term = get_queried_object();
		if ( $term && ! is_wp_error( $term ) ) {
			return get_term_link( $term );
		}
	}

	if ( is_post_type_archive() ) {
		$post_type = get_query_var( 'post_type' );
		if ( is_array( $post_type ) ) {
			$post_type = reset( $post_type );
		}
		return get_post_type_archive_link( $post_type );
	}

	if ( is_author() ) {
		return get_author_posts_url( get_queried_object_id() );
	}

	if ( is_date() ) {
		return get_pagenum_link( max( 1, get_query_var( 'paged' ) ) );
	}

	if ( is_archive() ) {
		return get_pagenum_link( max( 1, get_query_var( 'paged' ) ) );
	}

	return '';
}

/**
 * Output canonical URL tag.
 */
function poppy_theme_options_canonical_tag() {
	$options = poppy_get_theme_options();

	if ( empty( $options['enable_canonical_url'] ) ) {
		return;
	}

	$canonical_url = poppy_theme_options_get_canonical_url();
	if ( empty( $canonical_url ) || is_wp_error( $canonical_url ) ) {
		return;
	}

	echo "\t" . '<link rel="canonical" href="' . esc_url( $canonical_url ) . '">' . "\n";
}
add_action( 'wp_head', 'poppy_theme_options_canonical_tag', 2 );

/**
 * Register the native XML sitemap route.
 */
function poppy_theme_options_sitemap_rewrite_rule() {
	add_rewrite_rule( '^sitemap\.xml$', 'index.php?poppy_sitemap=1', 'top' );
}
add_action( 'init', 'poppy_theme_options_sitemap_rewrite_rule' );

/**
 * Allow the sitemap query var.
 *
 * @param array $vars Public query variables.
 * @return array
 */
function poppy_theme_options_sitemap_query_vars( $vars ) {
	$vars[] = 'poppy_sitemap';
	return $vars;
}
add_filter( 'query_vars', 'poppy_theme_options_sitemap_query_vars' );

/**
 * Flush rewrite rules when the theme is activated.
 */
function poppy_theme_options_sitemap_flush_rewrites() {
	poppy_theme_options_sitemap_rewrite_rule();
	flush_rewrite_rules( false );
}
add_action( 'after_switch_theme', 'poppy_theme_options_sitemap_flush_rewrites' );

/**
 * Determine whether the current request targets the XML sitemap.
 *
 * @return bool
 */
function poppy_theme_options_is_sitemap_request() {
	if ( '1' === get_query_var( 'poppy_sitemap' ) ) {
		return true;
	}

	$request_uri = isset( $_SERVER['REQUEST_URI'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) ) : '';
	$request_path = wp_parse_url( $request_uri, PHP_URL_PATH );

	return 'sitemap.xml' === trim( (string) $request_path, '/' );
}

/**
 * Build a single XML sitemap entry.
 *
 * @param string $loc URL.
 * @param string $lastmod Last modified date in W3C format.
 * @param string $changefreq Change frequency.
 * @param string $priority Priority.
 * @return array
 */
function poppy_theme_options_sitemap_entry( $loc, $lastmod = '', $changefreq = 'monthly', $priority = '0.5' ) {
	return array(
		'loc'        => $loc,
		'lastmod'    => $lastmod,
		'changefreq' => $changefreq,
		'priority'   => $priority,
	);
}

/**
 * Collect sitemap entries from public site content.
 *
 * @return array
 */
function poppy_theme_options_get_sitemap_entries() {
	$options = poppy_get_theme_options();
	$entries = array();

	$latest_modified = get_lastpostmodified( 'gmt' );
	$home_lastmod = $latest_modified ? mysql2date( 'c', $latest_modified, false ) : '';
	$entries[] = poppy_theme_options_sitemap_entry( home_url( '/' ), $home_lastmod, 'weekly', '1.0' );

	$pages = get_posts( array(
		'post_type'              => 'page',
		'post_status'            => 'publish',
		'posts_per_page'         => -1,
		'orderby'                => 'modified',
		'order'                  => 'DESC',
		'no_found_rows'          => true,
		'update_post_meta_cache' => false,
		'update_post_term_cache' => false,
	) );

	foreach ( $pages as $page ) {
		$entries[] = poppy_theme_options_sitemap_entry(
			get_permalink( $page ),
			get_post_modified_time( 'c', true, $page ),
			'monthly',
			(int) get_option( 'page_on_front' ) === (int) $page->ID ? '1.0' : '0.8'
		);
	}

	$posts = get_posts( array(
		'post_type'              => 'post',
		'post_status'            => 'publish',
		'posts_per_page'         => -1,
		'orderby'                => 'modified',
		'order'                  => 'DESC',
		'no_found_rows'          => true,
		'update_post_meta_cache' => false,
		'update_post_term_cache' => false,
	) );

	foreach ( $posts as $post ) {
		$entries[] = poppy_theme_options_sitemap_entry(
			get_permalink( $post ),
			get_post_modified_time( 'c', true, $post ),
			'weekly',
			'0.7'
		);
	}

	if ( empty( $options['noindex_category'] ) ) {
		$categories = get_categories( array(
			'hide_empty' => true,
		) );

		foreach ( $categories as $category ) {
			$entries[] = poppy_theme_options_sitemap_entry(
				get_category_link( $category ),
				'',
				'weekly',
				'0.5'
			);
		}
	}

	if ( empty( $options['noindex_tag'] ) ) {
		$tags = get_tags( array(
			'hide_empty' => true,
		) );

		foreach ( $tags as $tag ) {
			$entries[] = poppy_theme_options_sitemap_entry(
				get_tag_link( $tag ),
				'',
				'weekly',
				'0.4'
			);
		}
	}

	$unique_entries = array();
	foreach ( $entries as $entry ) {
		if ( empty( $entry['loc'] ) ) {
			continue;
		}
		$unique_entries[ trailingslashit( $entry['loc'] ) ] = $entry;
	}

	return array_values( $unique_entries );
}

/**
 * Output XML sitemap at /sitemap.xml.
 */
function poppy_theme_options_render_sitemap() {
	if ( ! poppy_theme_options_is_sitemap_request() ) {
		return;
	}

	$options = poppy_get_theme_options();
	if ( empty( $options['enable_xml_sitemap'] ) ) {
		status_header( 404 );
		nocache_headers();
		exit;
	}

	status_header( 200 );
	header( 'Content-Type: application/xml; charset=' . get_bloginfo( 'charset' ), true );
	nocache_headers();

	echo '<?xml version="1.0" encoding="' . esc_attr( get_bloginfo( 'charset' ) ) . "\"?>\n";
	echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

	foreach ( poppy_theme_options_get_sitemap_entries() as $entry ) {
		echo "\t<url>\n";
		echo "\t\t<loc>" . esc_xml( $entry['loc'] ) . "</loc>\n";
		if ( ! empty( $entry['lastmod'] ) ) {
			echo "\t\t<lastmod>" . esc_xml( $entry['lastmod'] ) . "</lastmod>\n";
		}
		if ( ! empty( $entry['changefreq'] ) ) {
			echo "\t\t<changefreq>" . esc_xml( $entry['changefreq'] ) . "</changefreq>\n";
		}
		if ( ! empty( $entry['priority'] ) ) {
			echo "\t\t<priority>" . esc_xml( $entry['priority'] ) . "</priority>\n";
		}
		echo "\t</url>\n";
	}

	echo '</urlset>';
	exit;
}
add_action( 'template_redirect', 'poppy_theme_options_render_sitemap', 0 );

/**
 * Advertise the sitemap in WordPress' virtual robots.txt output.
 *
 * @param string $output Robots.txt content.
 * @param bool   $public Whether the site discourages search engines.
 * @return string
 */
function poppy_theme_options_add_sitemap_to_robots( $output, $public ) {
	$options = poppy_get_theme_options();

	if ( ! $public || empty( $options['enable_xml_sitemap'] ) ) {
		return $output;
	}

	$output .= "\nSitemap: " . home_url( '/sitemap.xml' ) . "\n";
	return $output;
}
add_filter( 'robots_txt', 'poppy_theme_options_add_sitemap_to_robots', 10, 2 );

/**
 * Output Google Tag Manager & Meta Pixel head scripts.
 */
function poppy_theme_options_header_scripts() {
	$options = poppy_get_theme_options();

	// Google Tag Manager head script
	if ( ! empty( $options['gtm_id'] ) ) {
		$gtm_id = esc_attr( $options['gtm_id'] );
		?>
		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','<?php echo $gtm_id; ?>');</script>
		<!-- End Google Tag Manager -->
		<?php
	}

	// Meta Pixel script
	if ( ! empty( $options['meta_pixel_id'] ) ) {
		$pixel_id = esc_attr( $options['meta_pixel_id'] );
		?>
		<!-- Meta Pixel Code -->
		<script>
		!function(f,b,e,v,n,t,s)
		{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		n.callMethod.apply(n,arguments):n.queue.push(arguments)};
		if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
		n.queue=[];t=b.createElement(e);t.async=!0;
		t.src=v;s=b.getElementsByTagName(e)[0];
		s.parentNode.insertBefore(t,s)}(window, document,'script',
		'https://connect.facebook.net/en_US/fbevents.js');
		fbq('init', '<?php echo $pixel_id; ?>');
		fbq('track', 'PageView');
		</script>
		<noscript><img height="1" width="1" style="display:none"
		src="https://www.facebook.com/tr?id=<?php echo $pixel_id; ?>&ev=PageView&noscript=1"
		/></noscript>
		<!-- End Meta Pixel Code -->
		<?php
	}
}
add_action( 'wp_head', 'poppy_theme_options_header_scripts', 1 );

/**
 * Output Google Tag Manager body noscript tag.
 */
function poppy_theme_options_body_scripts() {
	$options = poppy_get_theme_options();
	if ( ! empty( $options['gtm_id'] ) ) {
		$gtm_id = esc_attr( $options['gtm_id'] );
		?>
		<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo $gtm_id; ?>"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->
		<?php
	}
}
add_action( 'wp_body_open', 'poppy_theme_options_body_scripts' );

/**
 * Output Open Graph and Twitter Card tags.
 */
function poppy_theme_options_social_meta_tags() {
	$options = poppy_get_theme_options();
	
	$has_og   = $options['enable_og_title'] || $options['enable_og_desc'] || $options['enable_social_preview'];
	$has_tw   = $options['enable_twitter_card'];

	if ( ! $has_og && ! $has_tw ) {
		return;
	}

	$title = '';
	$desc  = '';
	$image = '';

	if ( is_singular() ) {
		$post_id = get_the_ID();
		
		// Get Title
		$title = get_post_meta( $post_id, '_poppy_seo_title', true );
		if ( empty( $title ) ) {
			$title = get_the_title();
		}

		// Get Description
		$desc = get_post_meta( $post_id, '_poppy_seo_description', true );
		if ( empty( $desc ) ) {
			$desc = wp_strip_all_tags( get_the_excerpt() );
		}

		// Get Featured Image
		if ( has_post_thumbnail( $post_id ) ) {
			$image = get_the_post_thumbnail_url( $post_id, 'large' );
		}
	} else {
		// Front page / Archives
		if ( is_front_page() || is_home() ) {
			$title = ! empty( $options['home_seo_title'] ) ? $options['home_seo_title'] : get_bloginfo( 'name' );
			$desc  = ! empty( $options['home_seo_desc'] ) ? $options['home_seo_desc'] : get_bloginfo( 'description' );
		} else {
			$title = wp_get_document_title();
			$desc  = get_bloginfo( 'description' );
		}
	}

	// Fallback image
	if ( empty( $image ) && ! empty( $options['social_fallback_image'] ) ) {
		$image = $options['social_fallback_image'];
	}

	// Output Open Graph Tags
	if ( $has_og ) {
		echo "\t" . '<!-- Open Graph Meta Tags -->' . "\n";
		echo "\t" . '<meta property="og:type" content="' . ( is_singular() ? 'article' : 'website' ) . '">' . "\n";
		if ( $options['enable_og_title'] && ! empty( $title ) ) {
			echo "\t" . '<meta property="og:title" content="' . esc_attr( $title ) . '">' . "\n";
		}
		if ( $options['enable_og_desc'] && ! empty( $desc ) ) {
			echo "\t" . '<meta property="og:description" content="' . esc_attr( $desc ) . '">' . "\n";
		}
		if ( ! empty( $image ) ) {
			echo "\t" . '<meta property="og:image" content="' . esc_url( $image ) . '">' . "\n";
		}
		echo "\t" . '<meta property="og:url" content="' . esc_url( get_permalink() ) . '">' . "\n";
		echo "\t" . '<meta property="og:site_name" content="' . esc_attr( get_bloginfo( 'name' ) ) . '">' . "\n";
	}

	// Output Twitter Card Tags
	if ( $has_tw ) {
		echo "\t" . '<!-- Twitter Card Meta Tags -->' . "\n";
		echo "\t" . '<meta name="twitter:card" content="summary_large_image">' . "\n";
		if ( ! empty( $title ) ) {
			echo "\t" . '<meta name="twitter:title" content="' . esc_attr( $title ) . '">' . "\n";
		}
		if ( ! empty( $desc ) ) {
			echo "\t" . '<meta name="twitter:description" content="' . esc_attr( $desc ) . '">' . "\n";
		}
		if ( ! empty( $image ) ) {
			echo "\t" . '<meta name="twitter:image" content="' . esc_url( $image ) . '">' . "\n";
		}
	}
}
add_action( 'wp_head', 'poppy_theme_options_social_meta_tags', 3 );

/**
 * Output JSON-LD Schemas.
 */
function poppy_theme_options_schema_markup() {
	$options = poppy_get_theme_options();
	$home_url = esc_url( home_url( '/' ) );
	$site_name = esc_attr( get_bloginfo( 'name' ) );

	// 1. Organization Schema
	if ( $options['enable_schema_org'] ) {
		$org_schema = array(
			'@context' => 'https://schema.org',
			'@type'    => 'Organization',
			'name'     => $site_name,
			'url'      => $home_url,
			'logo'     => esc_url( get_template_directory_uri() . '/assets/images/Logo.webp' ),
			'sameAs'   => array_filter( array(
				esc_url( $options['facebook_url'] ),
				esc_url( $options['youtube_url'] ),
				esc_url( $options['instagram_url'] ),
				esc_url( $options['threads_url'] ),
				esc_url( $options['linkedin_url'] ),
			) ),
		);
		echo "\n" . '<script type="application/ld+json">' . json_encode( $org_schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT ) . '</script>' . "\n";
	}

	// 2. Local Business Schema
	if ( $options['enable_schema_local'] ) {
		$local_schema = array(
			'@context'  => 'https://schema.org',
			'@type'     => 'LocalBusiness',
			'name'      => $site_name,
			'url'       => $home_url,
			'logo'      => esc_url( get_template_directory_uri() . '/assets/images/Logo.webp' ),
			'image'     => esc_url( get_template_directory_uri() . '/assets/images/About%20Us%20Background.webp' ),
			'telephone' => '(0725) 43165',
			'address'   => array(
				'@type'           => 'PostalAddress',
				'streetAddress'   => 'JL. AR. Prawiranegara No.32, Metro',
				'addressLocality' => 'Kota Metro',
				'addressRegion'   => 'Lampung',
				'postalCode'      => '34111',
				'addressCountry'  => 'ID',
			),
			'sameAs'    => array_filter( array(
				esc_url( $options['facebook_url'] ),
				esc_url( $options['youtube_url'] ),
				esc_url( $options['instagram_url'] ),
				esc_url( $options['threads_url'] ),
				esc_url( $options['linkedin_url'] ),
			) ),
		);
		echo "\n" . '<script type="application/ld+json">' . json_encode( $local_schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT ) . '</script>' . "\n";
	}

	// 3. Article Schema
	if ( $options['enable_schema_article'] && is_single() ) {
		global $post;
		$article_schema = array(
			'@context'      => 'https://schema.org',
			'@type'         => 'NewsArticle',
			'headline'      => esc_attr( get_the_title() ),
			'datePublished' => get_the_date( 'c' ),
			'dateModified'  => get_the_modified_date( 'c' ),
			'author'        => array(
				'@type' => 'Person',
				'name'  => get_the_author(),
			),
			'publisher'     => array(
				'@type' => 'Organization',
				'name'  => $site_name,
				'logo'  => array(
					'@type' => 'ImageObject',
					'url'   => esc_url( get_template_directory_uri() . '/assets/images/Logo.webp' ),
				),
			),
		);
		if ( has_post_thumbnail() ) {
			$article_schema['image'] = array( get_the_post_thumbnail_url( get_the_ID(), 'large' ) );
		}
		echo "\n" . '<script type="application/ld+json">' . json_encode( $article_schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT ) . '</script>' . "\n";
	}

	// 4. Breadcrumbs Schema
	if ( $options['enable_schema_breadcrumbs'] && ! is_front_page() && ! is_home() ) {
		$crumbs = array();
		$crumbs[] = array(
			'@type'    => 'ListItem',
			'position' => 1,
			'name'     => 'Home',
			'item'     => $home_url,
		);

		if ( is_singular() ) {
			$crumbs[] = array(
				'@type'    => 'ListItem',
				'position' => 2,
				'name'     => esc_attr( get_the_title() ),
				'item'     => esc_url( get_permalink() ),
			);
		} elseif ( is_archive() ) {
			$crumbs[] = array(
				'@type'    => 'ListItem',
				'position' => 2,
				'name'     => esc_attr( wp_strip_all_tags( get_the_archive_title() ) ),
				'item'     => esc_url( get_pagenum_link() ),
			);
		}

		$crumbs_schema = array(
			'@context'        => 'https://schema.org',
			'@type'           => 'BreadcrumbList',
			'itemListElement' => $crumbs,
		);
		echo "\n" . '<script type="application/ld+json">' . json_encode( $crumbs_schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT ) . '</script>' . "\n";
	}
}
add_action( 'wp_head', 'poppy_theme_options_schema_markup', 10 );

/**
 * Output Breadcrumbs navigation markup.
 */
function poppy_breadcrumbs( $color_class = 'text-white/70 justify-center', $active_class = 'text-white', $separator_class = 'text-white/40' ) {
	$options = poppy_get_theme_options();
	if ( ! $options['enable_breadcrumbs_frontend'] ) {
		return;
	}

	// Breadcrumbs are not shown on static front page
	if ( is_front_page() ) {
		return;
	}

	echo '<nav class="poppy-breadcrumbs flex items-center gap-2 text-xs font-semibold ' . esc_attr( $color_class ) . ' select-none mb-4 tracking-wide font-sans relative z-10" aria-label="Breadcrumb">';
	
	// Home Link
	echo '<a href="' . esc_url( home_url( '/' ) ) . '" class="hover:opacity-90 transition">Home</a>';
	
	// Separator
	echo '<span class="' . esc_attr( $separator_class ) . '">/</span>';

	if ( is_singular() ) {
		echo '<span class="' . esc_attr( $active_class ) . '">' . esc_html( get_the_title() ) . '</span>';
	} elseif ( is_home() ) {
		$blog_title = get_the_title( get_option( 'page_for_posts' ) );
		if ( empty( $blog_title ) ) {
			$blog_title = 'Blog';
		}
		echo '<span class="' . esc_attr( $active_class ) . '">' . esc_html( $blog_title ) . '</span>';
	} elseif ( is_archive() ) {
		echo '<span class="' . esc_attr( $active_class ) . '">' . esc_html( wp_strip_all_tags( get_the_archive_title() ) ) . '</span>';
	}

	echo '</nav>';
}
