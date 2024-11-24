import { gsap } from "gsap";

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
