import { gsap } from "gsap";

import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);


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