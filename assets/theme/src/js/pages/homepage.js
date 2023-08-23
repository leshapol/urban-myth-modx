let pag = document.getElementsByClassName("pag__item");
let image = document.querySelector(".about__image > img");
let imgarr = new Array("img/about.jpg", "img/aboutus.jpg", "img/aboutus2.jpg");

function imgsrc(i) {
  image.style.opacity = 1;
  image.src = imgarr[i - 1];
}
$(".pag__item").on("click", function () {
  const delay = 5000;
  let i = $(this).data("num");
  let pags = document.querySelectorAll(".pag__item.pag__item_active");

  for (let i = 0; i < pags.length; i++) {
    pags[i].classList.remove("pag__item_active");
  }
  this.classList.add("pag__item_active");

  setTimeout(imgsrc, 300, i);

  image.style.opacity = 0;
});
