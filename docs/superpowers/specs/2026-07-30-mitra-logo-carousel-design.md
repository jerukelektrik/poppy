# Mitra Logo Carousel Design

## Goal

Replace the auto-scrolling partner-logo marquee with a manually controlled, responsive carousel.

## Layout

- Keep the existing section heading and partner-logo assets unchanged.
- Display logos in a horizontally scrollable track with a tighter `1.5rem` to `2rem` gap.
- Use smaller previous/next controls styled consistently with the testimonial slider.
- Keep the controls inside the carousel boundary so they are never clipped.

## Interaction

- Previous and next controls scroll one visible group of logos at a time.
- Native horizontal touch scrolling remains available on mobile.
- Remove automatic motion so clicking controls always produces predictable movement.

## Responsiveness and Safety

- Preserve logo aspect ratios with `object-fit: contain`.
- Keep all logos, links, and section content intact.
- Scope JavaScript and CSS to this section to avoid affecting the testimonial carousel.
- Verify the track, arrows, and logo spacing on mobile, tablet, and desktop.
