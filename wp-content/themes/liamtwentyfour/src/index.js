import './index.css';
import { gsap } from "gsap";

import { ScrollTrigger } from "gsap/ScrollTrigger";
import { ScrollToPlugin } from "gsap/ScrollToPlugin";
import { TextPlugin } from "gsap/TextPlugin";

(function () {
  const circle = document.getElementById('circle');
  document.addEventListener('mousemove', (e) => {
    circle.style.left = `${e.clientX}px`;
    circle.style.top = `${e.clientY}px`;
  });
});




gsap.registerPlugin(ScrollTrigger, ScrollToPlugin, TextPlugin);


/**
 * Word scroll effect
 */
let words = document.querySelectorAll(".word");
words.forEach((word) => {
  let letters = word.textContent.split("");
  word.textContent = "";
  letters.forEach((letter) => {
    let span = document.createElement("span");
    span.textContent = letter === " " ? "\u00A0" : letter; // Use non-breaking space for spaces
    span.className = "letter";
    word.append(span);
  });
});

let tl = gsap.timeline({
  repeat: -1,
  defaults: { stagger: 0.05 },
  paused: true,
});

words.forEach((word, i) => {
  if (i) {
    tl.from(word.childNodes, {
      y: -100,
      ease: "expo.out"
    }, "+=1");
    tl.to(words[i - 1].childNodes, {
      y: 100,
      ease: "expo.in"
    }, "<-=0.3");
  }
});
tl.fromTo(words[0].childNodes, {
  y: -100
}, {
  y: 0,
  ease: "expo.out",
  immediateRender: false,
}, "+=1")
  .to(words[words.length - 1].childNodes, {
    y: 100,
    ease: "expo.in"
  }, "<-=0.3");

gsap.from(words[0].childNodes, {
  y: -100,
  ease: "expo.out",
  stagger: 0.05,
  onComplete: () => tl.play(),
});

/**
 * Footer scroll effect
 */
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

// Select all elements with the class "text-block"
const textBlocks = document.querySelectorAll(".skill-text");

// Loop through each text block and apply individual animations
textBlocks.forEach((block) => {
  gsap.fromTo(block,
    {
      opacity: 0,   // Start invisible
      x: 200        // Start off-screen to the right
    },
    {
      opacity: 1,   // Fade in
      x: 0,         // Move to original position
      duration: 1.5,
      ease: "power3.out",
      scrollTrigger: {
        trigger: block,          // Use the specific element as the trigger
        start: "top 90%",        // Start when the top of the block is 80% down the viewport
        end: "top 20%",          // End when the block reaches 20% from the top of the viewport
        toggleActions: "play none none reset", // Reverse the animation when leaving the viewport
        once: false
      }
    }
  );
});

// Select all elements with the class "icon"
const iconBlocks = document.querySelectorAll(".icon");

// Loop through each text block and apply individual animations
iconBlocks.forEach((block) => {
  gsap.fromTo(block,
    {
      opacity: 0,   // Start invisible
      x: -200        // Start off-screen to the right
    },
    {
      opacity: 1,   // Fade in
      x: 0,         // Move to original position
      duration: 1.5,
      ease: "power3.out",
      scrollTrigger: {
        trigger: block,          // Use the specific element as the trigger
        start: "top 90%",        // Start when the top of the block is 80% down the viewport
        end: "top 20%",          // End when the block reaches 20% from the top of the viewport
        toggleActions: "play none none reset", // Reverse the animation when leaving the viewport
        once: false
      }
    }
  );
});