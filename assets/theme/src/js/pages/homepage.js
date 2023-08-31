let images = document.querySelectorAll(".about__image");
let arrowBefore = document.querySelector(".about__arrow_before");
let arrowAfter = document.querySelector(".about__arrow_after");
let activeImage = document.querySelector(".about__image_active");
let pags = document.querySelectorAll(".pag__item");

//----//

arrowBefore.addEventListener("click", (e) => {
  let elem = activeImage.previousElementSibling;
  if (elem) {
    render(elem);
  }
});

arrowAfter.addEventListener("click", (e) => {
  let elem = activeImage.nextElementSibling;
  if (elem) {
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

  // animation //

  activeImage.animate([{ opacity: 1 }, { opacity: 0 }], 500);
  activeImage.classList.remove("about__image_active");
  setTimeout(() => {
    elem.classList.add("about__image_active");
    activeImage = elem;
  }, 500);

  //----//
};

//----//
