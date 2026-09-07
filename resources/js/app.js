function initMegaMenu() {
    const nav = document.querySelector('[data-mega-nav]');
    if (!nav) return;

    const toggles = nav.querySelectorAll('[data-mega-toggle]');

    const closeAll = () => {
        toggles.forEach((toggle) => {
            toggle.setAttribute('aria-expanded', 'false');
            toggle.querySelector('[data-mega-chevron]')?.classList.remove('rotate-180');
        });
        nav.querySelectorAll('[data-mega-panel]').forEach((panel) => panel.classList.add('hidden'));
    };

    toggles.forEach((toggle) => {
        toggle.addEventListener('click', () => {
            const key = toggle.dataset.megaToggle;
            const panel = nav.querySelector(`[data-mega-panel="${key}"]`);
            const isOpen = panel && !panel.classList.contains('hidden');

            closeAll();

            if (panel && !isOpen) {
                panel.classList.remove('hidden');
                toggle.setAttribute('aria-expanded', 'true');
                toggle.querySelector('[data-mega-chevron]')?.classList.add('rotate-180');
            }
        });
    });

    nav.querySelectorAll('[data-mega-close]').forEach((btn) => {
        btn.addEventListener('click', closeAll);
    });

    document.addEventListener('click', (event) => {
        if (!nav.contains(event.target)) closeAll();
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') closeAll();
    });
}

function initMobileMenu() {
    const toggle = document.querySelector('[data-mobile-menu-toggle]');
    const menu = document.querySelector('[data-mobile-menu]');
    if (!toggle || !menu) return;

    const openIcon = toggle.querySelector('[data-mobile-menu-open-icon]');
    const closeIcon = toggle.querySelector('[data-mobile-menu-close-icon]');

    const setOpen = (isOpen) => {
        menu.classList.toggle('hidden', !isOpen);
        toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        openIcon?.classList.toggle('hidden', isOpen);
        closeIcon?.classList.toggle('hidden', !isOpen);
    };

    toggle.addEventListener('click', () => {
        setOpen(menu.classList.contains('hidden'));
    });

    menu.querySelectorAll('[data-mobile-accordion-toggle]').forEach((accordionToggle) => {
        accordionToggle.addEventListener('click', () => {
            const panel = accordionToggle.nextElementSibling;
            const isOpen = panel && !panel.classList.contains('hidden');

            panel?.classList.toggle('hidden');
            accordionToggle.setAttribute('aria-expanded', isOpen ? 'false' : 'true');
            accordionToggle.querySelector('[data-mobile-accordion-chevron]')?.classList.toggle('rotate-180', !isOpen);
        });
    });
}

function initHeroCarousel() {
    const carousel = document.querySelector('[data-carousel]');
    if (!carousel) return;

    const slides = [...carousel.querySelectorAll('[data-carousel-slide]')];
    const dots = [...carousel.querySelectorAll('[data-carousel-dot]')];
    if (slides.length === 0) return;

    const intervalMs = Number(carousel.dataset.carouselInterval) || 6000;
    let index = 0;
    let playing = carousel.dataset.carouselAutoplay !== '0';
    let timer = null;

    const show = (next) => {
        index = (next + slides.length) % slides.length;

        slides.forEach((slide, i) => slide.classList.toggle('hidden', i !== index));
        dots.forEach((dot, i) => {
            dot.classList.toggle('bg-white', i === index);
            dot.classList.toggle('bg-white/40', i !== index);
        });
    };

    const stop = () => {
        clearInterval(timer);
        timer = null;
    };

    const start = () => {
        stop();
        timer = setInterval(() => show(index + 1), intervalMs);
    };

    carousel.querySelector('[data-carousel-prev]')?.addEventListener('click', () => {
        show(index - 1);
        if (playing) start();
    });

    carousel.querySelector('[data-carousel-next]')?.addEventListener('click', () => {
        show(index + 1);
        if (playing) start();
    });

    dots.forEach((dot) => {
        dot.addEventListener('click', () => {
            show(Number(dot.dataset.carouselDot));
            if (playing) start();
        });
    });

    const toggle = carousel.querySelector('[data-carousel-toggle]');
    toggle?.addEventListener('click', () => {
        playing = !playing;
        toggle.querySelector('[data-carousel-pause-icon]')?.classList.toggle('hidden', !playing);
        toggle.querySelector('[data-carousel-play-icon]')?.classList.toggle('hidden', playing);
        playing ? start() : stop();
    });

    if (toggle) {
        toggle.querySelector('[data-carousel-pause-icon]')?.classList.toggle('hidden', !playing);
        toggle.querySelector('[data-carousel-play-icon]')?.classList.toggle('hidden', playing);
    }

    show(0);
    if (playing) start();
}

function initTabs() {
    document.querySelectorAll('[data-tabs]').forEach((tabs) => {
        const triggers = [...tabs.querySelectorAll('[data-tab-trigger]')];
        const panels = [...tabs.querySelectorAll('[data-tab-panel]')];

        triggers.forEach((trigger) => {
            trigger.addEventListener('click', () => {
                const key = trigger.dataset.tabTrigger;

                triggers.forEach((t) => {
                    const active = t === trigger;
                    t.classList.toggle('bg-primary', active);
                    t.classList.toggle('text-white', active);
                    t.classList.toggle('shadow-sm', active);
                    t.classList.toggle('bg-white', !active);
                    t.classList.toggle('text-text-muted', !active);
                });

                panels.forEach((panel) => {
                    panel.classList.toggle('hidden', panel.dataset.tabPanel !== key);
                });
            });
        });
    });
}

function initBackToTop() {
    const button = document.querySelector('[data-back-to-top]');
    if (!button) return;

    const toggleVisibility = () => {
        button.classList.toggle('hidden', window.scrollY < 400);
        button.classList.toggle('flex', window.scrollY >= 400);
    };

    window.addEventListener('scroll', toggleVisibility, { passive: true });
    button.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
    toggleVisibility();
}

function initParallax() {
    const layers = [...document.querySelectorAll('[data-parallax]')];
    if (layers.length === 0) return;
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

    let ticking = false;

    const update = () => {
        const viewportHeight = window.innerHeight;

        layers.forEach((layer) => {
            const rect = layer.getBoundingClientRect();
            if (rect.bottom < 0 || rect.top > viewportHeight) return;

            const speed = Number(layer.dataset.parallaxSpeed) || 0.2;
            const progress = (rect.top + rect.height / 2 - viewportHeight / 2) / viewportHeight;

            layer.style.transform = `translate3d(0, ${(progress * speed * 100).toFixed(2)}px, 0)`;
        });

        ticking = false;
    };

    const onScroll = () => {
        if (ticking) return;
        ticking = true;
        requestAnimationFrame(update);
    };

    window.addEventListener('scroll', onScroll, { passive: true });
    window.addEventListener('resize', onScroll);
    update();
}

function initHistoryLightbox() {
    const lightbox = document.querySelector('[data-milestone-lightbox]');
    if (!lightbox) return;

    const image = lightbox.querySelector('[data-milestone-lightbox-image]');
    const year = lightbox.querySelector('[data-milestone-lightbox-year]');
    const title = lightbox.querySelector('[data-milestone-lightbox-title]');
    const description = lightbox.querySelector('[data-milestone-lightbox-description]');

    const open = (trigger) => {
        image.src = trigger.dataset.image ?? '';
        image.alt = trigger.dataset.title ?? '';
        year.textContent = trigger.dataset.year ?? '';
        title.textContent = trigger.dataset.title ?? '';
        description.textContent = trigger.dataset.description ?? '';

        lightbox.classList.remove('hidden');
        lightbox.classList.add('flex');
        document.body.classList.add('overflow-hidden');
    };

    const close = () => {
        lightbox.classList.add('hidden');
        lightbox.classList.remove('flex');
        document.body.classList.remove('overflow-hidden');
        image.src = '';
    };

    document.querySelectorAll('[data-milestone-trigger]').forEach((trigger) => {
        trigger.addEventListener('click', () => open(trigger));
    });

    lightbox.querySelector('[data-milestone-lightbox-close]')?.addEventListener('click', close);

    lightbox.addEventListener('click', (event) => {
        if (event.target === lightbox) close();
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && !lightbox.classList.contains('hidden')) close();
    });
}

function initCookieBanner() {
    const banner = document.querySelector('[data-cookie-banner]');
    if (!banner) return;

    if (!localStorage.getItem('cookie-consent')) {
        banner.classList.remove('hidden');
    }

    banner.querySelector('[data-cookie-accept]')?.addEventListener('click', () => {
        localStorage.setItem('cookie-consent', 'accepted');
        banner.classList.add('hidden');
    });
}

document.addEventListener('DOMContentLoaded', () => {
    initMegaMenu();
    initMobileMenu();
    initHeroCarousel();
    initTabs();
    initParallax();
    initBackToTop();
    initHistoryLightbox();
    initCookieBanner();
});
