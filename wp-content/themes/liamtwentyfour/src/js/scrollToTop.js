import { gsap } from "gsap";

import { ScrollToPlugin } from "gsap/ScrollToPlugin";

gsap.registerPlugin(ScrollToPlugin);

/**
 * Scroll to top button
 */
document.getElementById('scrollToTop').addEventListener('click', function (event) {
    event.preventDefault();
    scrollToTopOfPage();
  });
  
  function scrollToTopOfPage() {
    gsap.to(window, {
      duration: 1.5,
      ease: 'power2.inOut',
      scrollTo: { y: 0, autoKill: true },
      overwrite: true
    });
  }