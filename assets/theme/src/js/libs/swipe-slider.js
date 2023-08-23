$("#slider").on("input change", (e) => {
  const sliderPos = e.target.value;

  // Update the width of the foreground image
  $(".swiper__foreground-img").css("width", `${sliderPos}%`);
  // Update the position of the slider button
  $(".swiper__slider-button").css("left", `calc(${sliderPos}% - 18px)`);
});
