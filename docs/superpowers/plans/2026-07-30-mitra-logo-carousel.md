# Mitra Logo Carousel Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Replace the auto-scrolling partner-logo marquee with a responsive, manually controlled carousel with tighter logo spacing.

**Architecture:** Keep the partner logo array and image markup in `template-parts/clients-section.php`. Replace marquee-only styles with a scroll-snap track, scoped previous/next controls, and a small section-local script that scrolls one visible group per interaction.

**Tech Stack:** PHP WordPress template part, Tailwind utility classes, scoped CSS, vanilla JavaScript.

---

### Task 1: Restructure the partner-logo track

**Files:**
- Modify: `template-parts/clients-section.php:33-97`

- [ ] **Step 1: Replace duplicate marquee markup with one scroll-snap track**

Replace the marquee container and the duplicated render loop with a single track:

```php
<div class="mitra-carousel relative">
    <div class="mitra-carousel-track flex overflow-x-auto gap-6 px-12 py-4 scroll-smooth snap-x snap-mandatory scrollbar-none">
        <?php foreach ( $mitra_images as $image ) : ?>
            <div class="mitra-logo-item snap-center flex-shrink-0 flex items-center justify-center w-[140px] sm:w-[180px] h-24 sm:h-28 select-none">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/' . $image ); ?>" alt="Mitra LKP Airlangga" class="mitra-logo">
            </div>
        <?php endforeach; ?>
    </div>
</div>
```

- [ ] **Step 2: Keep image aspect ratios and tighten visual spacing**

Use the existing `.mitra-logo` selector with the following focused rules:

```css
.mitra-logo {
    max-height: 72px;
    width: auto;
    object-fit: contain;
    opacity: 0.75;
    transition: opacity 0.3s ease, transform 0.3s ease;
}
.mitra-logo:hover {
    opacity: 1;
    transform: scale(1.05);
}
```

### Task 2: Add carousel controls

**Files:**
- Modify: `template-parts/clients-section.php:after mitra-carousel-track`

- [ ] **Step 1: Add accessible previous and next buttons**

Insert controls inside `.mitra-carousel` after the track:

```php
<button type="button" class="mitra-carousel-arrow mitra-carousel-prev hidden md:flex" aria-label="<?php esc_attr_e( 'Previous partners', 'poppy' ); ?>">
    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"><path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
</button>
<button type="button" class="mitra-carousel-arrow mitra-carousel-next hidden md:flex" aria-label="<?php esc_attr_e( 'Next partners', 'poppy' ); ?>">
    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"><path d="M9 6L15 12L9 18" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
</button>
```

- [ ] **Step 2: Add scoped control positioning**

Add styles that keep controls visible inside the carousel:

```css
.mitra-carousel { position: relative; }
.mitra-carousel-arrow {
    position: absolute;
    top: 50%;
    z-index: 10;
    display: flex;
    width: 40px;
    height: 40px;
    align-items: center;
    justify-content: center;
    border: 1px solid #e2e8f0;
    border-radius: 9999px;
    box-shadow: 0 4px 10px rgba(19, 32, 57, 0.12);
    transform: translateY(-50%);
}
.mitra-carousel-prev { left: 8px; background: #fff; color: #132039; }
.mitra-carousel-next { right: 8px; background: #e34a0d; color: #fff; }
```

### Task 3: Add local carousel behavior

**Files:**
- Modify: `template-parts/clients-section.php:before closing section`

- [ ] **Step 1: Add the scoped interaction script**

```html
<script>
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.mitra-carousel').forEach(carousel => {
        const track = carousel.querySelector('.mitra-carousel-track');
        const previous = carousel.querySelector('.mitra-carousel-prev');
        const next = carousel.querySelector('.mitra-carousel-next');
        if (!track || !previous || !next) return;

        const scrollAmount = () => Math.max(track.clientWidth - 96, 240);
        previous.addEventListener('click', () => track.scrollBy({ left: -scrollAmount(), behavior: 'smooth' }));
        next.addEventListener('click', () => track.scrollBy({ left: scrollAmount(), behavior: 'smooth' }));
    });
});
</script>
```

### Task 4: Verify the carousel

**Files:**
- Verify: `template-parts/clients-section.php`

- [ ] **Step 1: Check PHP syntax**

Run: `php -l template-parts/clients-section.php`

Expected: `No syntax errors detected`.

- [ ] **Step 2: Verify desktop behavior**

Open the homepage, confirm arrow buttons are fully visible, then click each button once. The track should move smoothly and every logo should retain its aspect ratio.

- [ ] **Step 3: Verify mobile behavior**

Use a narrow viewport. Confirm arrow controls are hidden, horizontal swipe scroll works, and the tighter logo gap does not cause clipping.
