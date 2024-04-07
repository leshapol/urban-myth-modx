if ($(".gallery__list").length) {
  $(".gallery__list").slickLightbox({
    itemSelector: "li > a",
    navigateByKeyboard: true,
    closeOnBackdropClick: true,
    caption: true,
    lazy: true,
    caption: "title",
    easing: "ease",

    // layouts: {
    //   closeButton:
    //     '<span class = "slider-closed-btn" style="font-size: 16px;font-weight: 400;letter-spacing: 2.24px;">CLOSE</span>',
    // },
  });
}
