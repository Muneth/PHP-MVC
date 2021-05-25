const navSlide = () => {
  const burger = document.querySelector(".burger");
  const nav = document.querySelector(".nav-links");
  const navLinks = document.querySelectorAll(".nav-links li");
  const navbar = document.querySelector("#marginBottom");

  // Toogle Nav and add margin 
  burger.addEventListener("click", () => {
    nav.classList.toggle("nav-active");
    navbar.classList.toggle("mobileMargin");

    // Animate Links
    navLinks.forEach((link, index) => {
      if (link.style.animation) {
        link.style.animation = "";
      } else {
        link.style.animation = `navLinkFade 0.5s ease forwards ${
          index / 7 + 0.5
        }s`;
      }
    });
    // Burger Animation
    burger.classList.toggle("burgerAnimate");
  });
};

const app = () => {
  navSlide();
};

app();
