/**
 * Footer scroll effect
 */
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.fromTo("footer",
    { yPercent: -80, opacity: 0 }, // Start from these values
    {
      yPercent: 0, opacity: 1, ease: "none", // Animate to these values
      scrollTrigger: {
        trigger: "main", // Element that triggers the animation
        start: "top bottom", // Start when the top of the main reaches the bottom of the viewport
        end: "bottom top", // End when the bottom of the main reaches the top of the viewport
        scrub: true, // Smooth scrubbing
      }
    }
  );