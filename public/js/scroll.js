/* On scroll */
import { getElement } from "./utils.js";

/* shadow box on navBar */
const navBar = getElement(".navbar");

function navScrolling() {
  const scrollHeight = window.pageYOffset;
  // console.log(scrollHeight);

  if (scrollHeight > 100) {
    navBar.classList.add("shadow");
  } else {
    navBar.classList.remove("shadow");
  }
}
window.addEventListener("scroll", navScrolling);

/* reveal */
function reveal() {
  let reveals = document.querySelectorAll(".reveal");
  reveals.forEach((reveal) => {
    let windowheight = window.innerHeight;
    let revealtop = reveal.getBoundingClientRect().top;

    if (revealtop < windowheight) {
      reveal.style.transition = "all 2s ease";
      reveal.classList.add("active");
    } else {
      reveal.classList.remove("active");
    }
    /* on hover change the transition */
    reveal.addEventListener("mouseover", () => {
      reveal.style.transition = "all 0.3s linear";
    });
  });
}

window.addEventListener("scroll", reveal);
