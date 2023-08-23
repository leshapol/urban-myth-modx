let burger = document.querySelector(".header__burger");
let menu = document.querySelector(".header__nav");
let body = document.body;

burger.onclick = function () {
  burger.classList.toggle("header__burger_active");
  menu.classList.toggle("header__nav_active");
  body.classList.toggle("lock");
};
