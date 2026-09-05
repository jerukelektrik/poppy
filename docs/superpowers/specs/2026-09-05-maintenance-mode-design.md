# Maintenance Mode — Design Specification

## Goal

Tambahkan mode maintenance yang dapat diaktifkan/nonaktifkan dari menu **POPPY Theme Options**, tanpa mengubah perilaku atau tampilan halaman normal ketika mode nonaktif.

## User experience

- Default: **Inactive**.
- Saat **Active**, pengunjung publik melihat satu halaman maintenance yang mengikuti nuansa visual POPPY (latar pastel, kartu putih, ikon alat, headline jelas).
- Copy default: “Website sementara offline. Harap melakukan pembayaran atau pelunasan agar layanan dapat kembali diakses.”
- Tombol kontak bersifat opsional; label dan URL dapat dikonfigurasi dari Theme Options.
- Pengguna yang sudah login dengan kemampuan `manage_options` melewati maintenance mode agar admin tetap dapat mengelola situs.

## Architecture

1. Tambahkan opsi tersimpan pada option array `poppy_theme_options`:
   - `maintenance_mode_enabled` (boolean)
   - `maintenance_message` (string)
   - `maintenance_contact_enabled` (boolean)
   - `maintenance_contact_label` (string)
   - `maintenance_contact_url` (URL)
2. Daftarkan field dan section baru di `inc/theme-options.php`, memakai nonce dan sanitasi yang sama dengan opsi existing.
3. Tambahkan handler `template_redirect` prioritas awal:
   - bypass admin, login, AJAX, REST, cron, feed, dan request aset;
   - jika aktif dan request publik, kirim header `503 Service Unavailable`, `Retry-After`, dan `X-Robots-Tag: noindex, nofollow`;
   - render template maintenance mandiri lalu `exit`, sehingga header/footer theme tidak ikut memengaruhi layout.
4. Tambahkan template `maintenance.php` di root theme yang memuat logo/nama situs, pesan tersanitasi, CTA opsional, dan CSS inline terisolasi dengan prefix `poppy-maintenance`.

## Error handling and safety

- URL CTA hanya disimpan lewat `esc_url_raw`; output memakai `esc_url`.
- Copy memakai `sanitize_textarea_field` dan output `wp_kses_post` agar markup berbahaya dihapus.
- Jika opsi tidak lengkap, gunakan default yang aman.
- Mode dapat dimatikan dari admin tanpa menghapus konten atau mengubah template existing.

## Testing

- Verifikasi toggle default inactive mempertahankan homepage apa adanya.
- Verifikasi active menampilkan maintenance untuk anonymous visitor pada beberapa URL.
- Verifikasi admin login tetap melihat halaman normal.
- Verifikasi CTA hidden/visible dan URL sanitization.
- Verifikasi response status `503` serta `X-Robots-Tag`.
- Verifikasi layout responsif pada viewport mobile dan desktop.
