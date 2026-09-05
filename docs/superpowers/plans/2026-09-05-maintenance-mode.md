# Maintenance Mode Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Menambahkan maintenance mode yang dapat di-toggle dari POPPY Theme Options, menampilkan halaman pembayaran/pelunasan kepada publik tanpa mengubah theme normal.

**Architecture:** Opsi disimpan di array `poppy_theme_options` dan dirender pada tab baru `Maintenance Mode`. Hook `template_redirect` akan mem-bypass admin yang login serta endpoint teknis, lalu merender `maintenance.php` mandiri dengan status 503 saat mode aktif.

**Tech Stack:** PHP WordPress theme, WordPress Options API, `template_redirect`, HTML/CSS inline terisolasi.

---

### Task 1: Tambahkan opsi maintenance dan tab admin

**Files:**
- Modify: `inc/theme-options.php:31-70` (defaults)
- Modify: `inc/theme-options.php:87-130` (save handling)
- Modify: `inc/theme-options.php:145-165` (tabs)
- Modify: `inc/theme-options.php` (new maintenance tab form before submit button)

- [ ] **Step 1: Extend defaults**

Tambahkan ke `$defaults`:

```php
'maintenance_mode_enabled'   => 0,
'maintenance_message'        => 'Website sementara offline. Harap melakukan pembayaran atau pelunasan agar layanan dapat kembali diakses.',
'maintenance_contact_enabled' => 0,
'maintenance_contact_label'  => 'Hubungi pengelola website',
'maintenance_contact_url'    => '',
```

- [ ] **Step 2: Add maintenance save branch**

Setelah branch `integrations`, tambahkan:

```php
} elseif ( 'maintenance' === $active_tab ) {
    $options['maintenance_mode_enabled']    = isset( $_POST['maintenance_mode_enabled'] ) ? 1 : 0;
    $options['maintenance_message']         = sanitize_textarea_field( wp_unslash( $_POST['maintenance_message'] ?? '' ) );
    $options['maintenance_contact_enabled'] = isset( $_POST['maintenance_contact_enabled'] ) ? 1 : 0;
    $options['maintenance_contact_label']   = sanitize_text_field( wp_unslash( $_POST['maintenance_contact_label'] ?? '' ) );
    $options['maintenance_contact_url']     = esc_url_raw( wp_unslash( $_POST['maintenance_contact_url'] ?? '' ) );
}
```

- [ ] **Step 3: Add tab link**

Tambahkan link nav-tab `?page=poppy-options&tab=maintenance` dengan label `Maintenance Mode`, memakai pola class tab existing.

- [ ] **Step 4: Add the maintenance form**

Tambahkan branch `<?php elseif ( $current_tab === 'maintenance' ) : ?>` berisi field:

```php
<h2>Maintenance Mode</h2>
<p class="description">Pengunjung publik melihat halaman offline; admin yang login tetap dapat melihat website normal.</p>
<table class="form-table">
    <tr>
        <th scope="row">Status</th>
        <td><label><input type="checkbox" name="maintenance_mode_enabled" value="1" <?php checked( $options['maintenance_mode_enabled'], 1 ); ?> /> Aktifkan maintenance mode</label></td>
    </tr>
    <tr>
        <th scope="row"><label for="maintenance_message">Pesan</label></th>
        <td><textarea id="maintenance_message" name="maintenance_message" rows="4" class="large-text"><?php echo esc_textarea( $options['maintenance_message'] ); ?></textarea></td>
    </tr>
    <tr>
        <th scope="row">Tombol kontak</th>
        <td><label><input type="checkbox" name="maintenance_contact_enabled" value="1" <?php checked( $options['maintenance_contact_enabled'], 1 ); ?> /> Tampilkan tombol kontak</label></td>
    </tr>
    <tr>
        <th scope="row"><label for="maintenance_contact_label">Label tombol</label></th>
        <td><input type="text" id="maintenance_contact_label" name="maintenance_contact_label" value="<?php echo esc_attr( $options['maintenance_contact_label'] ); ?>" class="regular-text" /></td>
    </tr>
    <tr>
        <th scope="row"><label for="maintenance_contact_url">URL kontak</label></th>
        <td><input type="url" id="maintenance_contact_url" name="maintenance_contact_url" value="<?php echo esc_attr( $options['maintenance_contact_url'] ); ?>" class="large-text" placeholder="https://wa.me/..." /></td>
    </tr>
</table>
```

- [ ] **Step 5: Run PHP syntax check**

Run: `php -l inc/theme-options.php`

Expected: `No syntax errors detected in inc/theme-options.php`

- [ ] **Step 6: Commit**

```bash
git add inc/theme-options.php
git commit -m "feat: add maintenance mode theme options"
```

### Task 2: Implement public maintenance request handler

**Files:**
- Modify: `functions.php` (register include)
- Create: `inc/maintenance.php`

- [ ] **Step 1: Load the module**

Add `'inc/maintenance.php',` to `$poppy_includes` in `functions.php`.

- [ ] **Step 2: Add bypass and render logic**

Create `inc/maintenance.php` with:

```php
<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function poppy_should_bypass_maintenance() {
    return is_user_logged_in()
        || ( function_exists( 'current_user_can' ) && current_user_can( 'manage_options' ) )
        || wp_doing_ajax()
        || ( defined( 'REST_REQUEST' ) && REST_REQUEST )
        || ( defined( 'DOING_CRON' ) && DOING_CRON )
        || is_feed()
        || is_trackback()
        || wp_is_json_request()
        || ( function_exists( 'wp_is_jsonp_request' ) && wp_is_jsonp_request() );
}

function poppy_render_maintenance_mode() {
    $options = poppy_get_theme_options();
    if ( empty( $options['maintenance_mode_enabled'] ) || poppy_should_bypass_maintenance() ) {
        return;
    }

    status_header( 503 );
    header( 'Retry-After: 86400' );
    header( 'X-Robots-Tag: noindex, nofollow', true );
    nocache_headers();

    include POPPY_DIR . '/maintenance.php';
    exit;
}
add_action( 'template_redirect', 'poppy_render_maintenance_mode', 0 );
```

- [ ] **Step 3: Run syntax check**

Run: `php -l inc/maintenance.php && php -l functions.php`

Expected: both files report no syntax errors.

- [ ] **Step 4: Commit**

```bash
git add functions.php inc/maintenance.php
git commit -m "feat: intercept public requests in maintenance mode"
```

### Task 3: Build isolated maintenance page

**Files:**
- Create: `maintenance.php`

- [ ] **Step 1: Create semantic document**

Render `get_bloginfo( 'name' )`, optional custom logo via `get_custom_logo()`, the sanitized message with `wpautop( wp_kses_post(...) )`, and the optional CTA only when both its enable flag and URL are present.

- [ ] **Step 2: Add isolated responsive styles**

Use a complete document with a `.poppy-maintenance` root, CSS variables matching POPPY (`#ff8b62`, `#26313a`, pastel cream/mint), responsive card spacing, focus-visible CTA styling, and `lang="<?php echo esc_attr( get_bloginfo( 'language' ) ); ?>"`.

- [ ] **Step 3: Add accessibility and metadata**

Include `<meta name="robots" content="noindex, nofollow">`, descriptive `<title>`, `role="main"`, a single `<h1>`, and an accessible link label.

- [ ] **Step 4: Run syntax check**

Run: `php -l maintenance.php`

Expected: `No syntax errors detected in maintenance.php`

- [ ] **Step 5: Commit**

```bash
git add maintenance.php
git commit -m "feat: add POPPY maintenance page"
```

### Task 4: Verify locally and prepare GitHub push

**Files:**
- Test: `inc/theme-options.php`, `inc/maintenance.php`, `maintenance.php` through local WordPress site

- [ ] **Step 1: Verify inactive behavior**

With the toggle off, load the homepage and a subpage; confirm the existing POPPY header/footer/content render unchanged.

- [ ] **Step 2: Verify active public behavior**

Enable the toggle in **POPPY Options → Maintenance Mode**, open the site in an anonymous/private browser window, and confirm the maintenance page appears with the payment/pelunasan message.

- [ ] **Step 3: Verify admin bypass**

While logged into WordPress as an administrator, load the homepage and `/wp-admin/`; confirm normal site/admin screens remain available.

- [ ] **Step 4: Verify HTTP headers**

Run:

```bash
curl -I http://airlangga.local/
```

Expected when active: `HTTP/1.1 503`, `Retry-After: 86400`, and `X-Robots-Tag: noindex, nofollow`.

- [ ] **Step 5: Review diff**

Run: `git diff HEAD~3..HEAD --check && git status --short`

Expected: no whitespace errors; only intended theme files changed.

- [ ] **Step 6: Inspect remote before push**

Run: `git remote -v && git branch --show-current`

If a remote exists and the user confirms it is the intended repository, push with:

```bash
git push origin main
```

If no remote exists, ask for the GitHub repository URL before adding it; do not invent or overwrite a remote.
