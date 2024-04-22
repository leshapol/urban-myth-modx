if ($(".features-slider").length) {
  $(".features-slider__list").slick({
    infinite: false,
    slidesToShow: 4,
    slidesToScroll: 2,
    easing: "ease",
    autoplay: true,
    autoplaySpeed: 4000,
    infinite: true,
    variableWidth: false,
    arrows: true,
    dots: false,

    responsive: [
      {
        breakpoint: 2400,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 2,
        },
      },
      {
        breakpoint: 1700,
        settings: {
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 769,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 670,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });
}
