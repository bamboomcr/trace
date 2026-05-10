
/*  =========================================================================
	Trace Page transition
   	/* Adds:
	- simple page transition effect
	========================================================================== */

	(function () {
		'use strict';

		var NAV_CLASS = 'is-navigating';

		var shouldHandleLink = function (link) {
			if (!link) {
				return false;
			}

			/* Same-tab only */
			if (link.target && '_self' !== link.target) {
				return false;
			}

			/* Respect modifiers (open new tab, etc.) */
			if (true === link.hasAttribute('download')) {
				return false;
			}

			var href = link.getAttribute('href');

			if (!href || '#' === href.charAt(0)) {
				return false;
			}

			/* Avoid admin bar / editor links etc. if needed */
			if (link.closest('.wp-block-navigation__responsive-container')) {
				/* Allowed, just an example hook */
			}

			/* Same origin only */
			try {
				var url = new URL(href, window.location.href);

				if (url.origin !== window.location.origin) {
					return false;
				}

				/* Don’t animate file links */
				if (url.pathname.match(/\.(pdf|zip|jpg|jpeg|png|webp)$/i)) {
					return false;
				}
			} catch (e) {
				return false;
			}

			return true;
		};

		/* Fade-in is automatic via CSS on first paint */

		document.addEventListener('click', function (event) {
			var link = event.target.closest('a');

			if (!shouldHandleLink(link)) {
				return;
			}

			/* Let WP handle same-page hash changes */
			if (link.href && link.href.split('#')[0] === window.location.href.split('#')[0] && link.href.indexOf('#') > -1) {
				return;
			}

			event.preventDefault();

			document.documentElement.classList.add(NAV_CLASS);

			window.setTimeout(function () {
				window.location.href = link.href;
			}, 220);
		});

		/* If user hits back/forward, ensure we’re visible */
		window.addEventListener('pageshow', function () {
			document.documentElement.classList.remove(NAV_CLASS);
		});
	})();







/*  =========================================================================
	TRACE SMART HEADER
	/* Smart header scroll direction toggles + top-of-page hold
	/* Adds:
	- body.trace-scroll-down
	- body.trace-scroll-up
	- body.trace-top-page
	========================================================================== */

(function () {
	const header = document.querySelector(".site-header.is-smart");

	if (!header) {
		return;
	}

	let lastScrollY = window.scrollY;
	const threshold = 10;

	// Keep "top" styling for longer when starting to scroll down.
	// Increase/decrease this to taste (e.g. 80–160).
	const topHoldPx = 120;

	function setDirection(isUp) {
		if (true === isUp) {
			document.body.classList.add("trace-scroll-up");
			document.body.classList.remove("trace-scroll-down");
			return;
		}

		document.body.classList.add("trace-scroll-down");
		document.body.classList.remove("trace-scroll-up");
	}

	function setTopState(isTop) {
		if (true === isTop) {
			document.body.classList.add("trace-top-page");
			return;
		}

		document.body.classList.remove("trace-top-page");
	}

	function handleScroll() {
		// If WP mobile menu modal is open, keep header visible and don't flip states.
		if (document.documentElement.classList.contains("has-modal-open")) {
			setDirection(true);
			return;
		}

		const currentScrollY = window.scrollY;

		// Hold "top" state for the first X px of scrolling.
		if (currentScrollY <= topHoldPx) {
			setTopState(true);
			setDirection(true);
		} else {
			setTopState(false);

			// Direction logic (only once we're past the top hold zone).
			if (Math.abs(currentScrollY - lastScrollY) < threshold) {
				return;
			}

			if (currentScrollY > lastScrollY && currentScrollY > 100) {
				setDirection(false);
			} else {
				setDirection(true);
			}

			lastScrollY = currentScrollY;
			return;
		}

		// Still update lastScrollY while in the hold zone to prevent a jump when leaving it.
		lastScrollY = currentScrollY;
	}

	// Initial state.
	if (window.scrollY <= topHoldPx) {
		setTopState(true);
		setDirection(true);
	} else {
		setTopState(false);
		setDirection(true);
	}

	window.addEventListener("scroll", handleScroll, { passive: true });
})();








/*  =========================================================================
	TRACE REVEAL
	/* assets/css/trace-reveal.css
	/* Smart reveal as image scrolls into view
	========================================================================== */

	(function () {
		'use strict';

		function initTraceReveal() {
			var items = document.querySelectorAll(
				'.trace-reveal .wp-block-post-template > li.wp-block-post'
			);

			if (!items.length) return;

			// Fallback
			if (!('IntersectionObserver' in window)) {
				items.forEach(function (item) {
					item.classList.add('is-visible');
				});
				return;
			}

			var observer = new IntersectionObserver(
				function (entries, obs) {
					entries.forEach(function (entry) {
						if (entry.isIntersecting) {
							entry.target.classList.add('is-visible');
							obs.unobserve(entry.target);
						}
					});
				},
				{
					threshold: 0.5,
					rootMargin: '0px 0px -10% 0px'
				}
			);

			items.forEach(function (item) {
				observer.observe(item);
			});
		}

		document.readyState === 'loading'
			? document.addEventListener('DOMContentLoaded', initTraceReveal)
			: initTraceReveal();
	})();





/*  =========================================================================
	TRACE SMOOTH SCROLL
	assets/js/trace-smooth-scroll.js

	- Smooth-scrolls to same-page anchors, with header offset.
	- Respects prefers-reduced-motion.
	- Ignores Trace UI components (tabs/accordion/etc.) via `.trace-ui`
	  and also supports `[data-no-smooth-scroll]` opt-out.
	========================================================================== */

(function () {
	'use strict';

	// Respect reduced motion
	if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
		return;
	}

	/**
	 * Anything inside these containers will NOT trigger Trace smooth scroll.
	 * - .trace-ui is your "namespace" wrapper for Trace interactive components
	 * - [data-no-smooth-scroll] is an explicit opt-out hook
	 */
	var EXCLUSION_SELECTOR = '.trace-ui, [data-no-smooth-scroll]';

	function getHeaderOffset() {
		var header = document.querySelector('header');
		return header ? header.offsetHeight : 0;
	}

	function smoothScrollTo(target) {
		var headerOffset = getHeaderOffset();
		var targetPosition =
			target.getBoundingClientRect().top +
			window.pageYOffset -
			headerOffset;

		window.scrollTo({
			top: targetPosition,
			behavior: 'smooth'
		});
	}

	function isSamePageAnchor(url) {
		return (
			url.pathname === window.location.pathname &&
			url.origin === window.location.origin &&
			!!url.hash
		);
	}

	document.addEventListener('click', function (e) {
		// 1) Ignore clicks inside Trace UI components (tabs, etc.)
		if (e.target.closest(EXCLUSION_SELECTOR)) return;

		// 2) Only handle anchor clicks that include a hash
		var link = e.target.closest('a[href^="#"], a[href*="#"]');
		if (!link) return;

		// 3) Ignore if link itself opts out
		if (link.hasAttribute('data-no-smooth-scroll')) return;

		var url;
		try {
			url = new URL(link.href, window.location.href);
		} catch (err) {
			return;
		}

		// 4) Only handle same-page anchors
		if (!isSamePageAnchor(url)) return;

		// 5) Find target element
		var target = document.querySelector(url.hash);
		if (!target) return;

		// 6) Smooth scroll with header offset
		e.preventDefault();
		smoothScrollTo(target);
	});
})();





/*  =========================================================================
	TRACE FEATURED REVEAL (hover)
	/* assets/css/trace-featured-reveal.css
	/* assets/js/trace-featured-reveal.js
	========================================================================== */

	(function () {
		'use strict';

		var preview = document.createElement('div');
		preview.className = 'trace-featured-reveal-preview';
		preview.innerHTML = '<img alt="">';
		document.body.appendChild(preview);

		var imgEl = preview.querySelector('img');

		var mouseX = 0;
		var mouseY = 0;
		var targetX = 0;
		var targetY = 0;
		var active = false;
		var rafId = null;

		var OFFSET = 18;

		function clamp(value, min, max) {
			return Math.min(Math.max(value, min), max);
		}

		// Ensure we always call closest() on an Element (not a Text node)
		function getClosestPostItem(e) {
			var el = e.target;

			// e.target can be a Text node; closest() only exists on Elements
			if (!el || el.nodeType !== 1) {
				el = e.target && e.target.parentElement ? e.target.parentElement : null;
			}

			return el
				? el.closest('.trace-featured-reveal .wp-block-post-template > li.wp-block-post')
				: null;
		}

		function animate() {
			if (!active) {
				rafId = null;
				return;
			}

			var w = preview.offsetWidth;
			var h = preview.offsetHeight;

			targetX = mouseX + OFFSET;
			targetY = mouseY + OFFSET;

			targetX = clamp(targetX, 12, window.innerWidth - w - 12);
			targetY = clamp(targetY, 12, window.innerHeight - h - 12);

			preview.style.transform =
				'translate3d(' + targetX + 'px,' + targetY + 'px,0) scale(1)';

			rafId = requestAnimationFrame(animate);
		}

		document.addEventListener(
			'mousemove',
			function (e) {
				mouseX = e.clientX;
				mouseY = e.clientY;

				if (active && !rafId) {
					rafId = requestAnimationFrame(animate);
				}
			},
			{ passive: true }
		);

		function onEnter(e) {
			var li = getClosestPostItem(e);
			if (!li) return;

			var featured = li.querySelector('.wp-block-post-featured-image img');
			if (!featured) return;

			imgEl.src = featured.currentSrc || featured.src;

			active = true;
			preview.classList.add('is-visible');

			if (!rafId) {
				rafId = requestAnimationFrame(animate);
			}
		}

		function onLeave(e) {
			var li = getClosestPostItem(e);
			if (!li) return;

			active = false;
			preview.classList.remove('is-visible');
		}

		document.addEventListener('mouseenter', onEnter, true);
		document.addEventListener('mouseleave', onLeave, true);
	})();


// Optional: muted the ResizeObserver loop warning in Chrome DevTools
// (function () {
// 	const roMsg = 'ResizeObserver loop completed with undelivered notifications.';

// 	window.addEventListener('error', function (e) {
// 		if (e && e.message === roMsg) {
// 			e.stopImmediatePropagation();
// 		}
// 	}, true);
// })();







/*  =========================================================================
	TRACE CAROUSEL
	/* assets/css/trace-carousel.css
	/* assets/js/trace-carousel.js
	========================================================================== */

	// Carousel Scroll Nudge to add animation to the carousel on scroll 
	(() => {
		'use strict';

		const nudgedCarousels = document.querySelectorAll('.scroll-nudge');

		if (0 === nudgedCarousels.length) {
			return;
		}

		const clamp = (value, min, max) => Math.min(Math.max(value, min), max);

		const handleCarousel = (carousel) => {
			const maxShift = parseInt(carousel.dataset.scrollNudge, 10) || 100;
			let latestScrollY = window.scrollY;
			let ticking = false;

			const update = () => {
				const rect = carousel.getBoundingClientRect();
				const viewportHeight = window.innerHeight;

				/* Only move while in view */
				if (rect.bottom < 0 || rect.top > viewportHeight) {
					ticking = false;
					return;
				}

				const progress = clamp(
					(viewportHeight - rect.top) / (viewportHeight + rect.height),
					0,
					1
				);

				const translateX = -Math.round(progress * maxShift);
				carousel.style.transform = `translateX(${translateX}px)`;

				ticking = false;
			};

			window.addEventListener('scroll', () => {
				latestScrollY = window.scrollY;

				if (false === ticking) {
					window.requestAnimationFrame(update);
					ticking = true;
				}
			});
		};

		const observer = new IntersectionObserver(
			(entries) => {
				entries.forEach((entry) => {
					if (true === entry.isIntersecting) {
						handleCarousel(entry.target);
						observer.unobserve(entry.target);
					}
				});
			},
			{
				threshold: 0.1
			}
		);

		nudgedCarousels.forEach((carousel) => {
			observer.observe(carousel);
		});
	})();




/*  =========================================================================
	TRACE SCROLL CTA (glitch-free marquee)
	- Builds [half A][half B]
	- Animates by the exact pixel offset where B starts
	- Safer ResizeObserver handling to avoid resize feedback loops
	========================================================================== */

(function () {
	'use strict';

	var SELECTOR = '.wp-block-group.trace-scroll-cta';

	function buildStructure(group) {
		if ('true' === group.dataset.traceScrollHydrated) return;

		var rail = document.createElement('div');
		rail.className = 'trace-scroll-cta__rail';

		var track = document.createElement('div');
		track.className = 'trace-scroll-cta__track';

		var item = document.createElement('div');
		item.className = 'trace-scroll-cta__item';

		while (group.firstChild) {
			item.appendChild(group.firstChild);
		}

		track.appendChild(item);
		rail.appendChild(track);
		group.appendChild(rail);

		group.dataset.traceScrollHydrated = 'true';
	}

	function getTrack(group) {
		return group.querySelector('.trace-scroll-cta__track');
	}

	function getFirstItem(group) {
		return group.querySelector('.trace-scroll-cta__track .trace-scroll-cta__item');
	}

	function getIntervalMs(group) {
		var intervalMs = parseInt(group.getAttribute('data-swap-ms') || '500', 10);

		if (Number.isNaN(intervalMs) || intervalMs < 200) {
			intervalMs = 500;
		}

		return intervalMs;
	}

	function normaliseFitTextSize(group) {
		var firstItem = getFirstItem(group);
		if (!firstItem) return;

		var firstP = firstItem.querySelector('p');
		if (!firstP) return;

		var computedSize = window.getComputedStyle(firstP).fontSize;
		if (!computedSize) return;

		group.querySelectorAll('.trace-scroll-cta__item p').forEach(function (p) {
			p.style.fontSize = computedSize;
		});

		group.dataset.traceLockedSize = computedSize;
	}

	function startGroupGallerySwap(group, intervalMs) {
		if (group._traceSwapTimer) {
			window.clearInterval(group._traceSwapTimer);
			group._traceSwapTimer = null;
		}

		var galleries = Array.from(
			group.querySelectorAll('.wp-block-gallery.has-nested-images')
		);

		if (!galleries.length) return;

		var slideCount = galleries[0].querySelectorAll('.wp-block-image').length;
		if (!slideCount) return;

		function setActive(idx) {
			galleries.forEach(function (gallery) {
				var slides = Array.from(gallery.querySelectorAll('.wp-block-image'));
				if (!slides.length) return;

				var safe = idx % slides.length;

				slides.forEach(function (slide, i) {
					if (i === safe) {
						slide.classList.add('is-active');
						slide.setAttribute('aria-hidden', 'false');
					} else {
						slide.classList.remove('is-active');
						slide.setAttribute('aria-hidden', 'true');
					}
				});
			});
		}

		var index = 0;
		setActive(index);

		if (slideCount < 2) return;

		group._traceSwapTimer = window.setInterval(function () {
			index = (index + 1) % slideCount;
			setActive(index);
		}, intervalMs);
	}

	function rebuildMarquee(group) {
		var track = getTrack(group);
		var firstItem = getFirstItem(group);

		if (!track || !firstItem) return;

		// Reset to a single original item
		var items = Array.from(track.querySelectorAll('.trace-scroll-cta__item'));
		items.forEach(function (item, index) {
			if (index > 0) {
				item.remove();
			}
		});

		// Re-get first item after cleanup
		firstItem = getFirstItem(group);
		if (!firstItem) return;

		// Build first half until wide enough
		var groupWidth = group.getBoundingClientRect().width;
		var safety = 0;

		while (track.scrollWidth < (groupWidth + 400) && safety < 60) {
			track.appendChild(firstItem.cloneNode(true));
			safety++;
		}

		// Snapshot first half
		var halfItems = Array.from(track.querySelectorAll('.trace-scroll-cta__item'));

		// Sentinel marks exact start of second half
		var sentinel = document.createElement('span');
		sentinel.className = 'trace-scroll-cta__sentinel';
		sentinel.setAttribute('aria-hidden', 'true');
		sentinel.style.cssText = 'display:block;width:0;height:0;pointer-events:none;';
		track.appendChild(sentinel);

		// Append second half
		halfItems.forEach(function (item) {
			track.appendChild(item.cloneNode(true));
		});

		window.requestAnimationFrame(function () {
			var distance = sentinel.offsetLeft;

			sentinel.remove();

			track.style.setProperty('--trace-marquee-distance', distance + 'px');
			track.style.transform = 'translate3d(0,0,0)';
		});
	}

	function safeRebuild(group) {
		normaliseFitTextSize(group);
		rebuildMarquee(group);
		startGroupGallerySwap(group, getIntervalMs(group));
	}

	function setupResizeObserver(group) {
		if (group._traceResizeObserver || !('ResizeObserver' in window)) return;

		var lastWidth = 0;
		var lastHeight = 0;
		var rafId = null;
		var reconnectRaf = null;
		var isMutating = false;

		group._traceResizeObserver = new ResizeObserver(function (entries) {
			var entry = entries[0];
			if (!entry) return;
			if (isMutating) return;

			var width = Math.round(entry.contentRect.width);
			var height = Math.round(entry.contentRect.height);

			// Ignore no-op size changes
			if (width === lastWidth && height === lastHeight) {
				return;
			}

			lastWidth = width;
			lastHeight = height;

			if (rafId) {
				window.cancelAnimationFrame(rafId);
			}

			if (reconnectRaf) {
				window.cancelAnimationFrame(reconnectRaf);
			}

			rafId = window.requestAnimationFrame(function () {
				isMutating = true;
				group._traceResizeObserver.disconnect();

				safeRebuild(group);

				reconnectRaf = window.requestAnimationFrame(function () {
					isMutating = false;
					group._traceResizeObserver.observe(group);
				});
			});
		});

		group._traceResizeObserver.observe(group);
	}

	function setupWindowResizeFallback(group) {
		var resizeTimer = null;

		window.addEventListener('resize', function () {
			window.clearTimeout(resizeTimer);

			resizeTimer = window.setTimeout(function () {
				safeRebuild(group);
			}, 120);
		});
	}

	function primeWhenReady(group) {
		buildStructure(group);

		window.requestAnimationFrame(function () {
			safeRebuild(group);
		});

		if (document.fonts && document.fonts.ready) {
			document.fonts.ready.then(function () {
				safeRebuild(group);
			});
		}

		window.addEventListener(
			'load',
			function () {
				safeRebuild(group);
			},
			{ once: true }
		);

		setupResizeObserver(group);
		setupWindowResizeFallback(group);
	}

	function init() {
		var groups = document.querySelectorAll(SELECTOR);
		if (!groups.length) return;

		groups.forEach(function (group) {
			primeWhenReady(group);
		});
	}

	if ('loading' === document.readyState) {
		document.addEventListener('DOMContentLoaded', init);
	} else {
		init();
	}
})();

	




/*  =========================================================================
	TRACE TABS
	/* assets/css/trace-tabs.css
	/* assets/js/trace-tabs.js
	========================================================================== */

(function () {
  const prefersReducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  function initTraceTabs(root) {
    const tablist = root.querySelector(".trace-tablist");
    const tabs = Array.from(root.querySelectorAll(".trace-tab a"));
    const panels = Array.from(root.querySelectorAll(".trace-panel"));
    const panelsWrap = root.querySelector(".trace-panels");

    if (!tablist || !tabs.length || !panels.length || !panelsWrap) return;

    tablist.setAttribute("role", "tablist");

    // --- Ensure panels have IDs that match tab hrefs (fixes missing/changed IDs) ---
    const hrefIds = tabs
      .map((a) => (a.getAttribute("href") || "").trim())
      .filter((h) => h.startsWith("#"))
      .map((h) => h.slice(1));

    // Map href id -> panel element. If not found, assign by order.
    hrefIds.forEach((id, i) => {
      // Try to find by existing id first
      let panel = root.querySelector("#" + CSS.escape(id));

      // If panel doesn't exist by id, fall back to panel order
      if (!panel) panel = panels[i] || null;

      // If we found a panel but it has no id (or mismatched), assign it
      if (panel && panel.id !== id) {
        panel.id = id;
      }
    });

    // Apply ARIA wiring now that IDs are guaranteed
    tabs.forEach((a, i) => {
      const href = (a.getAttribute("href") || "").trim();
      const id = href.startsWith("#") ? href.slice(1) : "";

      a.setAttribute("role", "tab");
      a.setAttribute("tabindex", i === 0 ? "0" : "-1");
      a.setAttribute("aria-selected", "false");

      const panel = id ? root.querySelector("#" + CSS.escape(id)) : null;
      if (panel) {
        if (!a.id) a.id = `trace-tab-${id}`;
        a.setAttribute("aria-controls", id);

        panel.setAttribute("role", "tabpanel");
        panel.setAttribute("tabindex", "0");
        panel.setAttribute("aria-labelledby", a.id);
      }
    });

    // Smooth height
    function setWrapperHeightTo(panelEl) {
      if (!panelEl) return;

      if (prefersReducedMotion) {
        panelsWrap.style.height = "auto";
        return;
      }

      const startHeight = panelsWrap.getBoundingClientRect().height;
      const endHeight = panelEl.getBoundingClientRect().height;

      panelsWrap.style.height = startHeight + "px";
      panelsWrap.offsetHeight; // reflow
      panelsWrap.style.height = endHeight + "px";

      const onEnd = (e) => {
        if (e.propertyName !== "height") return;
        panelsWrap.style.height = "auto";
        panelsWrap.removeEventListener("transitionend", onEnd);
      };
      panelsWrap.addEventListener("transitionend", onEnd);
    }

    function setActive(panelId, { focusPanel = false } = {}) {
      // Tabs
      tabs.forEach((a) => {
        const isActive = (a.getAttribute("href") || "") === "#" + panelId;
        a.closest(".trace-tab")?.classList.toggle("is-active", isActive);
        a.setAttribute("aria-selected", isActive ? "true" : "false");
        a.setAttribute("tabindex", isActive ? "0" : "-1");
      });

      // Panels
      let activePanel = null;
      panels.forEach((p) => {
        const isActive = p.id === panelId;
        p.classList.toggle("is-active", isActive);
        p.hidden = !isActive;
        if (isActive) activePanel = p;
      });

      if (activePanel) setWrapperHeightTo(activePanel);

      if (focusPanel && activePanel) {
        activePanel.focus({ preventScroll: true });
      }
    }

    // Init
    panels.forEach((p) => (p.hidden = true));

    const hash = (location.hash || "").replace("#", "");
    const defaultId =
      (hash && root.querySelector("#" + CSS.escape(hash)) && hash) ||
      (hrefIds[0] && root.querySelector("#" + CSS.escape(hrefIds[0])) && hrefIds[0]) ||
      panels[0].id;

    setActive(defaultId);

    // Click
    tabs.forEach((a) => {
      a.addEventListener("click", (e) => {
        const href = (a.getAttribute("href") || "").trim();
        if (!href.startsWith("#")) return;

        e.preventDefault();
        const id = href.slice(1);
        if (!root.querySelector("#" + CSS.escape(id))) return;

        history.replaceState(null, "", href);
        setActive(id);
        a.focus({ preventScroll: true });
      });
    });

    // Keyboard (Left/Right/Home/End)
    tablist.addEventListener("keydown", (e) => {
      const current = document.activeElement;
      if (!current || !tabs.includes(current)) return;

      const i = tabs.indexOf(current);
      let next = i;

      if (e.key === "ArrowRight") next = (i + 1) % tabs.length;
      if (e.key === "ArrowLeft") next = (i - 1 + tabs.length) % tabs.length;
      if (e.key === "Home") next = 0;
      if (e.key === "End") next = tabs.length - 1;

      if (next !== i) {
        e.preventDefault();
        const nextTab = tabs[next];
        const id = (nextTab.getAttribute("href") || "").replace("#", "");
        setActive(id);
        nextTab.focus({ preventScroll: true });
      }

      if (e.key === "Enter" || e.key === " ") {
        e.preventDefault();
        const id = (current.getAttribute("href") || "").replace("#", "");
        setActive(id, { focusPanel: true });
      }
    });

    // Hash change
    window.addEventListener("hashchange", () => {
      const id = (location.hash || "").replace("#", "");
      if (id && root.querySelector("#" + CSS.escape(id))) setActive(id);
    });
  }

  document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".trace-tabs").forEach(initTraceTabs);
  });
})();






/* =========================================================================
	TRACE PARALLAX (opt-in on .is-style-trace-parallax)
	- Supports: core/image + core/cover
	========================================================================= */

(function () {
	'use strict';

	const SELECTOR =
		'.wp-block-image.is-style-trace-parallax, .wp-block-cover.is-style-trace-parallax';

	const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
	if (prefersReducedMotion) return;

	let ticking = false;
	const active = new Set();

	function clamp(n, min, max) {
		return Math.max(min, Math.min(max, n));
	}

	// Only needed for core/image where WP often puts radius on the <img>
	function syncRadius(el) {
		if (!el.classList.contains('wp-block-image')) return;

		const img = el.querySelector('img');
		if (!img) return;

		let r = img.style.borderRadius;
		if (!r) r = window.getComputedStyle(img).borderRadius;

		if (r && r !== '0px' && r !== '0px 0px 0px 0px') {
			el.style.borderRadius = r;
			el.style.overflow = 'hidden';
		}
	}

	function initEl(el) {
		if (el.dataset.traceParallaxHydrated === 'true') return;
		el.dataset.traceParallaxHydrated = 'true';
		syncRadius(el);
	}

	function getParallaxTarget(el) {
		if (el.classList.contains('wp-block-cover')) {
			return (
				el.querySelector('.wp-block-cover__image-background') ||
				el.querySelector('video.wp-block-cover__video-background')
			);
		}

		if (el.classList.contains('wp-block-image')) {
			return el.querySelector('img');
		}

		return null;
	}

	function update() {
		ticking = false;

		const vh = window.innerHeight || document.documentElement.clientHeight;

		active.forEach((el) => {
			const target = getParallaxTarget(el);
			if (!target) return;

			const rect = el.getBoundingClientRect();
			const progress = (vh - rect.top) / (vh + rect.height);
			const p = clamp(progress, 0, 1);

			const rawIntensity = parseFloat(el.getAttribute('data-parallax'));
			const intensity = Number.isFinite(rawIntensity) ? rawIntensity : 40;

			const y = (p - 0.5) * (intensity * 2);
			target.style.setProperty('--trace-parallax-y', `${y.toFixed(2)}px`);
		});
	}

	function requestUpdate() {
		if (ticking) return;
		ticking = true;
		window.requestAnimationFrame(update);
	}

	function init() {
		const els = document.querySelectorAll(SELECTOR);
		if (!els.length) return;

		els.forEach(initEl);

		const io = new IntersectionObserver(
			(entries) => {
				entries.forEach((entry) => {
					if (entry.isIntersecting) active.add(entry.target);
					else active.delete(entry.target);
				});
				requestUpdate();
			},
			{
				root: null,
				threshold: 0,
				rootMargin: '200px 0px 200px 0px',
			}
		);

		els.forEach((el) => io.observe(el));

		window.addEventListener('scroll', requestUpdate, { passive: true });
		window.addEventListener('resize', () => {
			els.forEach(syncRadius);
			requestUpdate();
		});

		requestUpdate();
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', init);
	} else {
		init();
	}
})();



/*  =========================================================================
	TRACE AC ACCORDION
	/* assets/css/trace-accordion.css
	/* assets/js/trace-accordion.js
	========================================================================== */
// Keep open panels correct on resize / font reflow
window.addEventListener('resize', () => {
	document.querySelectorAll('.wp-block-accordion .wp-block-accordion-item.is-open > .wp-block-accordion-panel')
		.forEach((panel) => setOpenHeight(panel));
});

(() => {
	const SELECTOR = '.wp-block-accordion .wp-block-accordion-item';

	function setOpenHeight(panel) {
	// Set height to the actual content height (px)
	panel.style.height = panel.scrollHeight + 'px';
}

function openPanel(panel) {
	// Animate 0 -> scrollHeight
	panel.style.height = panel.scrollHeight + 'px';

	const onEnd = (e) => {
		if (e.propertyName !== 'height') return;

		// IMPORTANT: do NOT set to auto (prevents the "jump")
		// Lock it to the final pixel height
		setOpenHeight(panel);

		panel.removeEventListener('transitionend', onEnd);
	};

	panel.addEventListener('transitionend', onEnd);
}

	function closePanel(panel) {
	// Ensure we start from a pixel height
	setOpenHeight(panel);

	// Force reflow
	panel.getBoundingClientRect();

	// Animate to closed
	panel.style.height = '0px';
}

	function syncItem(item) {
		const panel = item.querySelector(':scope > .wp-block-accordion-panel');
		if (!panel) return;

		const isOpen = item.classList.contains('is-open');

		// On first run, set correct starting state with no jank
		if (!panel.dataset.traceInit) {
			panel.dataset.traceInit = '1';
			panel.style.height = isOpen ? 'auto' : '0px';
			return;
		}

		if (isOpen) openPanel(panel);
		else closePanel(panel);
	}

	function init() {
		document.querySelectorAll(SELECTOR).forEach((item) => {
			syncItem(item);

			// Watch class changes from core/accordion (is-open toggles)
			const mo = new MutationObserver(() => syncItem(item));
			mo.observe(item, { attributes: true, attributeFilter: ['class'] });
		});
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', init);
	} else {
		init();
	}
})();




