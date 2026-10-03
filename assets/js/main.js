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

    mobileNav.querySelectorAll("[data-mobile-expand]").forEach((button) => {
      const panel = document.getElementById(button.getAttribute("aria-controls"));
      button.addEventListener("click", () => {
        const open = button.getAttribute("aria-expanded") !== "true";
        button.setAttribute("aria-expanded", String(open));
        button.setAttribute("aria-label", open ? "Hide services" : "Show services");
        button.closest("[data-mobile-group]")?.classList.toggle("is-expanded", open);
        if (panel) panel.hidden = !open;
      });
    });

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

  document.querySelectorAll("[data-nav-dropdown]").forEach((dropdown) => {
    const toggle = dropdown.querySelector(".nav-dropdown-toggle");
    const setExpanded = (open) => toggle.setAttribute("aria-expanded", String(open));
    dropdown.addEventListener("mouseenter", () => setExpanded(true));
    dropdown.addEventListener("mouseleave", () => {
      setExpanded(false);
      dropdown.classList.remove("is-dismissed");
    });
    dropdown.addEventListener("focusin", () => setExpanded(true));
    dropdown.addEventListener("focusout", (event) => {
      if (!dropdown.contains(event.relatedTarget)) {
        setExpanded(false);
        dropdown.classList.remove("is-dismissed");
      }
    });
    dropdown.addEventListener("keydown", (event) => {
      if (event.key !== "Escape") return;
      dropdown.classList.add("is-dismissed");
      setExpanded(false);
      toggle.focus();
    });
  });

  const fab = document.querySelector("[data-fab]");
  const fabToggle = fab?.querySelector("[data-fab-toggle]");

  if (fab && fabToggle) {
    const setFabOpen = (open) => {
      fab.classList.toggle("is-open", open);
      fabToggle.setAttribute("aria-expanded", String(open));
      fabToggle.setAttribute("aria-label", open ? "Close contact options" : "Open contact options");
    };

    fabToggle.addEventListener("click", () => setFabOpen(!fab.classList.contains("is-open")));
    fab.querySelectorAll("a").forEach((link) => link.addEventListener("click", () => setFabOpen(false)));
    document.addEventListener("click", (event) => {
      if (!fab.contains(event.target)) setFabOpen(false);
    });
    document.addEventListener("keydown", (event) => {
      if (event.key === "Escape") setFabOpen(false);
    });
  }

  document.querySelectorAll("[data-compare]").forEach((slider) => {
    const range = slider.querySelector("[data-compare-range]");
    if (!range) return;
    const update = () => slider.style.setProperty("--pos", `${range.value}%`);
    range.addEventListener("input", update);
    update();
  });
})();
