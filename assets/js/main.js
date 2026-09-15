(() => {
  const header = document.querySelector("[data-header]");
  const toggle = document.querySelector("[data-nav-toggle]");
  const checkbox = document.querySelector("[data-nav-checkbox]");
  const mobileNav = document.querySelector("[data-mobile-nav]");
  const overlay = document.querySelector("[data-nav-overlay]");

  const onScroll = () => {
    if (!header) return;
    header.classList.toggle("is-scrolled", window.scrollY > 12);
  };

  onScroll();
  window.addEventListener("scroll", onScroll, { passive: true });

  const setNavOpen = (open) => {
    if (!mobileNav || !overlay) return;
    if (checkbox) {
      checkbox.checked = open;
      checkbox.setAttribute("aria-expanded", String(open));
    }
    if (toggle) {
      toggle.setAttribute("aria-label", open ? "Close menu" : "Open menu");
    }
    mobileNav.classList.toggle("is-open", open);
    mobileNav.setAttribute("aria-hidden", String(!open));
    overlay.classList.toggle("is-open", open);
    if (open) {
      overlay.removeAttribute("hidden");
    } else {
      overlay.setAttribute("hidden", "");
    }
    document.body.classList.toggle("nav-open", open);
  };

  if (checkbox && mobileNav && overlay) {
    checkbox.addEventListener("change", () => {
      setNavOpen(checkbox.checked);
    });

    overlay.addEventListener("click", () => setNavOpen(false));

    mobileNav.querySelectorAll("a").forEach((link) => {
      link.addEventListener("click", () => setNavOpen(false));
    });

    document.addEventListener("keydown", (event) => {
      if (event.key === "Escape") setNavOpen(false);
    });
  }

  const reduceMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  const reveals = document.querySelectorAll(".reveal");

  if (reduceMotion) {
    reveals.forEach((el) => el.classList.add("is-visible"));
  } else if ("IntersectionObserver" in window) {
    const io = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            // Force a reflow so opacity transition reliably starts
            void entry.target.offsetWidth;
            entry.target.classList.add("is-visible");
            io.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.08, rootMargin: "0px 0px -20px 0px" }
    );
    reveals.forEach((el) => io.observe(el));
  } else {
    reveals.forEach((el) => el.classList.add("is-visible"));
  }

  const filterButtons = document.querySelectorAll("[data-filter]");
  const portfolioItems = document.querySelectorAll("[data-type]");

  filterButtons.forEach((btn) => {
    btn.addEventListener("click", () => {
      const value = btn.getAttribute("data-filter") || "all";
      filterButtons.forEach((b) => b.classList.toggle("is-active", b === btn));
      portfolioItems.forEach((item) => {
        const type = item.getAttribute("data-type") || "";
        const show = value === "all" || type === value;
        item.hidden = !show;
      });
    });
  });
})();
