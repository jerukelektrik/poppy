/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and screens.
 */
document.addEventListener('DOMContentLoaded', () => {
	const button = document.querySelector('.menu-toggle');
	const menu = document.querySelector('.main-navigation .nav-menu');

	if (button && menu) {
		button.addEventListener('click', () => {
			const expanded = button.getAttribute('aria-expanded') === 'true';
			button.setAttribute('aria-expanded', expanded ? 'false' : 'true');
			menu.classList.toggle('toggled');

			// Toggle icon visibility
			const hamburger = button.querySelector('.hamburger-icon');
			const close = button.querySelector('.close-icon');
			if (hamburger && close) {
				hamburger.classList.toggle('hidden', !expanded);
				close.classList.toggle('hidden', expanded);
			}
		});
	}

	document.querySelectorAll('.promo-section-wrapper').forEach(section => {
		const tabs = section.querySelectorAll('[data-promo-tab]');
		const cards = section.querySelectorAll('[data-promo-card]');
		const showOn = section.getAttribute('data-show-on') || 'home';

		tabs.forEach(tab => {
			tab.addEventListener('click', () => {
				const targetId = tab.getAttribute('data-promo-tab');

				tabs.forEach(item => {
					item.className = 'promo-tab-btn relative flex-shrink-0 flex items-center justify-between text-left px-6 py-4 rounded-xl text-xs sm:text-sm font-bold text-poppy-muted bg-[#F5F7FA]/60 hover:bg-[#F5F7FA] transition cursor-pointer lg:w-full';
					const indicator = item.querySelector('.active-indicator-line');
					indicator?.classList.add('hidden');
					indicator?.classList.remove('lg:block');
				});

				if (showOn === 'english-kids') {
					tab.className = 'promo-tab-btn active relative flex-shrink-0 flex items-center justify-between text-left px-6 py-4 rounded-xl text-xs sm:text-sm font-black text-poppy-ink bg-[linear-gradient(135deg,#EEF9D9_0%,#99EAA7_100%)] shadow-md transition cursor-pointer lg:w-full';
				} else if (showOn === 'pengembangan-diri') {
					tab.className = 'promo-tab-btn active relative flex-shrink-0 flex items-center justify-between text-left px-6 py-4 rounded-xl text-xs sm:text-sm font-black text-poppy-ink bg-[linear-gradient(135deg,#A5E3FD_0%,#C4F8DD_50%,#FFF6E0_100%)] shadow-md transition cursor-pointer lg:w-full';
				} else {
					tab.className = 'promo-tab-btn active relative flex-shrink-0 flex items-center justify-between text-left px-6 py-4 rounded-xl text-xs sm:text-sm font-black text-white bg-gradient-to-r from-poppy-ink to-poppy-accent shadow-md transition cursor-pointer lg:w-full';
				}
				
				const activeIndicator = tab.querySelector('.active-indicator-line');
				activeIndicator?.classList.remove('hidden');
				activeIndicator?.classList.add('lg:block');

				cards.forEach(card => {
					const isTarget = card.getAttribute('data-promo-card') === targetId;
					card.classList.toggle('hidden', !isTarget);
					card.classList.toggle('grid', isTarget);
				});
			});
		});
	});
});
