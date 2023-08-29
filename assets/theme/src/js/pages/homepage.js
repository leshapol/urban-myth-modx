let images = document.querySelectorAll(".about__image");
let arrowBefore = document.querySelector(".about__arrow_before");
let arrowAfter = document.querySelector(".about__arrow_after");
let activeImage = document.querySelector(".about__image_active");
let pags = document.querySelectorAll(".pag__item");

//----//

arrowBefore.addEventListener("click", (e) => {
  if (activeImage.previousElementSibling.classList.contains("about__image")) {
    let elem = activeImage.previousElementSibling;
    render(elem);
  }
});

arrowAfter.addEventListener("click", (e) => {
  if (activeImage.nextElementSibling.classList.contains("about__image")) {
    let elem = activeImage.nextElementSibling;
    render(elem);
  }
});

//----//

$(".pag__item").on("click", function () {
  let i = $(this).data("num");
  pagRender(i);

  let elem = images[i];
  render(elem);
});

//----//

const pagRender = (i) => {
  for (let i = 0; i < pags.length; i++) {
    pags[i].classList.remove("pag__item_active");
  }
  pags[i].classList.add("pag__item_active");
};

//----//

const render = (elem) => {
  let i;
  for (const key of images.keys()) {
    if (images[key] == elem) {
      i = key;
    }
  }
  pagRender(i);

  activeImage.animate([{ opacity: 1 }, { opacity: 0 }], 500);
  activeImage.classList.remove("about__image_active");
  setTimeout(() => {
    elem.classList.add("about__image_active");
    elem.animate([{ opacity: 0 }, { opacity: 1 }], 500);
    activeImage = elem;
  }, 500);
};

//----//
