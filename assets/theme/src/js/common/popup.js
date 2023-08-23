let popup_link = document.querySelectorAll("._popup-link");
let popups = document.querySelectorAll(".popup");

if (location.hash) {
  const hsh = location.hash.replace("#", "");
  if (document.querySelector(".popup_" + hsh)) {
    popup_open(hsh);
  }
}

for (let index = 0; index < popup_link.length; index++) {
  const el = popup_link[index];
  el.addEventListener("click", function (e) {
    let item = el.getAttribute("href").replace("#", "");
    popup_open(item);
    e.preventDefault();
  });
}

for (let index = 0; index < popups.length; index++) {
  const popup = popups[index];
  popup.addEventListener("click", function (e) {
    if (!e.target.closest(".popup__body")) {
      popup_close(e.target.closest(".popup"));
    }
  });
}

function popup_open(item) {
  let activePopup = document.querySelectorAll(".popup._active");
  if (activePopup.length > 0) {
    popup_close("");
  }
  let curent_popup = document.querySelector(".popup_" + item);
  if (curent_popup) {
    curent_popup.classList.add("_active");
    history.pushState("", "", location.href + "#" + item);
    $("body").addClass("_lock");
  }
}

function popup_close(item) {
  if (!item) {
    for (let index = 0; index < popups.length; index++) {
      const popup = popups[index];
      popup.classList.remove("_active");
    }
  } else {
    item.classList.remove("_active");
  }
  history.pushState("", "", window.location.href.split("#")[0]);
  $("body").removeClass("_lock");
  sessionStorage.setItem("shuldShowExitPopup", "false");
}

let popup_close_icon = document.querySelectorAll(".popup__close,._popup-close");
if (popup_close_icon) {
  for (let index = 0; index < popup_close_icon.length; index++) {
    const el = popup_close_icon[index];
    el.addEventListener("click", function () {
      popup_close(el.closest(".popup"));
    });
  }
}

document.addEventListener("keydown", function (e) {
  if (e.code === "Escape") {
    popup_close();
  }
});

let header = document.querySelectorAll(".popup-form-select__header");
for (let heade of header) {
  heade.onclick = function () {
    heade.classList.toggle("popup-form-select__header_active");
  };
}
//-----------------------------//
