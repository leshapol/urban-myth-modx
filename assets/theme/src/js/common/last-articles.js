let blogList = document.querySelector(".last-articles__list");

if (blogList) {
  addMouseWell(
    document.querySelector(".last-articles__list"),
    scrollHorizontally
  );
}

function scrollHorizontally(e) {
  e = window.event || e;
  var delta = Math.max(-1, Math.min(1, e.wheelDelta || -e.detail));
  var sk = delta * 3;

  let scrollEnd =
    blogList.scrollWidth === blogList.scrollLeft + blogList.clientWidth;

  let timeScrioll = setInterval(() => {
    blogList.scrollBy(-sk, 0);
  }, 5);

  setTimeout(() => {
    clearInterval(timeScrioll);
  }, 150);

  if (!(scrollEnd || blogList.scrollLeft == 0)) {
    e.preventDefault(true);
  }
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
