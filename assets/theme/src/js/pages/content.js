$(document).ready(function () {
  let sliders = document.querySelector(".slider__list");

  $(".slider__list").slick({
    infinite: false,
    slidesToShow: 4,
    slidesToScroll: 2,
    easing: "ease",

    responsive: [
      {
        breakpoint: 2400,
        settings: {
          slidesToShow: 3,
        },
      },
      {
        breakpoint: 1700,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          centerMode: true,
          variableWidth: true,
        },
      },
    ],
  });

  $(".slider__list").slickLightbox({
    itemSelector: "li > a",
    navigateByKeyboard: true,
    caption: true,
    caption: "title",

    easing: "ease",

    // layouts: {
    //   closeButton:
    //     '<span class = "slider-closed-btn" style="font-size: 16px;font-weight: 400;letter-spacing: 2.24px;">CLOSE</span>',
    // },
  });
});
