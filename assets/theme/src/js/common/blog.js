let blogList = document.querySelector(".blog__list");

function scrollHorizontally(e) {
  //включает горизонтальный скрол элемента колесом
  e = window.event || e;
  var delta = Math.max(-1, Math.min(1, e.wheelDelta || -e.detail)); //это шаг колеса для разных браузеров

  var sk = delta * 3;

  let timeScrioll = setInterval(() => {
    blogList.scrollBy(-sk, 0);
  }, 5);

  setTimeout(() => {
    clearInterval(timeScrioll);
  }, 150);

  e.preventDefault();
}

function addMouseWell(elem, callback) {
  if (elem.addEventListener) {
    if ("onwheel" in document) {
      elem.addEventListener("wheel", callback);
    } else if ("onmousewheel" in document) {
      elem.addEventListener("mousewheel", callback);
    } else {
      elem.addEventListener("MozMousePixelScroll", callback);
    }
  } else {
    elem.attachEvent("onmousewheel", callback);
  }
}

addMouseWell(document.querySelector(".blog__list"), scrollHorizontally);
