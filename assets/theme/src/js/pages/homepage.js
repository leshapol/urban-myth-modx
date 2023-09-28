let images = document.querySelectorAll(".about__image");
let arrowBefore = document.querySelector(".about__arrow_before");
let arrowAfter = document.querySelector(".about__arrow_after");
let activeImage = document.querySelector(".about__image_active");
let pags = document.querySelectorAll(".pag__item");

//----//
if (typeof images[0] != "undefined") {
  images[0].classList.add("about__image_active");
}
if (typeof pags[0] != "undefined") {
  pags[0].classList.add("pag__item_active");
}

arrowBefore.addEventListener("click", (e) => {
  let i = $(".pag__item_active").data("num");

  if (i == 1) {
    i = pags.length;
  } else {
    i--;
  }

  nav_render(i);
  render(i);
});

arrowAfter.addEventListener("click", (e) => {
  let i = $(".pag__item_active").data("num");

  if (i == pags.length) {
    i = 1;
  } else {
    i++;
  }

  nav_render(i);
  render(i);
});

$(".pag__item").on("click", function () {
  let i = $(this).data("num");

  nav_render(i);
  render(i);
});

const render = (i) => {
  $(".about__image").removeClass("about__image_active");
  $("*[data-imagenum='" + i + "']").addClass("about__image_active");
};

const nav_render = (i) => {
  $(".pag__item").removeClass("pag__item_active");
  $("*[data-num='" + i + "']").addClass("pag__item_active");
};
