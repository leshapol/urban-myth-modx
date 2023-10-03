if ($(".slider").length) {
  let images = document.querySelectorAll(".slider__image");
  let arrowBefore = document.querySelector(".slider__arrow_before");
  let arrowAfter = document.querySelector(".slider__arrow_after");
  let activeImage = document.querySelector(".slider__image_active");
  let dots = document.querySelectorAll(".slider__dot");

  if (typeof images[0] != "undefined") {
    images[0].classList.add("slider__image_active");
  }
  if (typeof dots[0] != "undefined") {
    dots[0].classList.add("slider__dot_active");
  }

  arrowBefore.addEventListener("click", (e) => {
    let i = $(".slider__dot_active").data("num");

    if (i == 1) {
      i = dots.length;
    } else {
      i--;
    }

    nav_render(i);
    render(i);
  });

  arrowAfter.addEventListener("click", (e) => {
    let i = $(".slider__dot_active").data("num");

    if (i == dots.length) {
      i = 1;
    } else {
      i++;
    }

    nav_render(i);
    render(i);
  });

  $(".slider__dot").on("click", function () {
    let i = $(this).data("num");

    nav_render(i);
    render(i);
  });

  const render = (i) => {
    $(".slider__image").removeClass("slider__image_active");
    $("*[data-imagenum='" + i + "']").addClass("slider__image_active");
  };

  const nav_render = (i) => {
    $(".slider__dot").removeClass("slider__dot_active");
    $("*[data-num='" + i + "']").addClass("slider__dot_active");
  };
}
