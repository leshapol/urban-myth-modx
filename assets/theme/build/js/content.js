/*! lazysizes - v5.2.0-beta1 */
!function(a,b){var c=b(a,a.document);a.lazySizes=c,"object"==typeof module&&module.exports&&(module.exports=c)}("undefined"!=typeof window?window:{},function(a,b){"use strict";var c,d;if(function(){var b,c={lazyClass:"lazyload",loadedClass:"lazyloaded",loadingClass:"lazyloading",preloadClass:"lazypreload",errorClass:"lazyerror",autosizesClass:"lazyautosizes",srcAttr:"data-src",srcsetAttr:"data-srcset",sizesAttr:"data-sizes",minSize:40,customMedia:{},init:!0,expFactor:1.5,hFac:.8,loadMode:2,loadHidden:!0,ricTimeout:0,throttleDelay:125};d=a.lazySizesConfig||a.lazysizesConfig||{};for(b in c)b in d||(d[b]=c[b])}(),!b||!b.getElementsByClassName)return{init:function(){},cfg:d,noSupport:!0};var e=b.documentElement,f=a.Date,g=a.HTMLPictureElement,h="addEventListener",i="getAttribute",j=a[h],k=a.setTimeout,l=a.requestAnimationFrame||k,m=a.requestIdleCallback,n=/^picture$/i,o=["load","error","lazyincluded","_lazyloaded"],p={},q=Array.prototype.forEach,r=function(a,b){return p[b]||(p[b]=new RegExp("(\\s|^)"+b+"(\\s|$)")),p[b].test(a[i]("class")||"")&&p[b]},s=function(a,b){r(a,b)||a.setAttribute("class",(a[i]("class")||"").trim()+" "+b)},t=function(a,b){var c;(c=r(a,b))&&a.setAttribute("class",(a[i]("class")||"").replace(c," "))},u=function(a,b,c){var d=c?h:"removeEventListener";c&&u(a,b),o.forEach(function(c){a[d](c,b)})},v=function(a,d,e,f,g){var h=b.createEvent("Event");return e||(e={}),e.instance=c,h.initEvent(d,!f,!g),h.detail=e,a.dispatchEvent(h),h},w=function(b,c){var e;!g&&(e=a.picturefill||d.pf)?(c&&c.src&&!b[i]("srcset")&&b.setAttribute("srcset",c.src),e({reevaluate:!0,elements:[b]})):c&&c.src&&(b.src=c.src)},x=function(a,b){return(getComputedStyle(a,null)||{})[b]},y=function(a,b,c){for(c=c||a.offsetWidth;c<d.minSize&&b&&!a._lazysizesWidth;)c=b.offsetWidth,b=b.parentNode;return c},z=function(){var a,c,d=[],e=[],f=d,g=function(){var b=f;for(f=d.length?e:d,a=!0,c=!1;b.length;)b.shift()();a=!1},h=function(d,e){a&&!e?d.apply(this,arguments):(f.push(d),c||(c=!0,(b.hidden?k:l)(g)))};return h._lsFlush=g,h}(),A=function(a,b){return b?function(){z(a)}:function(){var b=this,c=arguments;z(function(){a.apply(b,c)})}},B=function(a){var b,c=0,e=d.throttleDelay,g=d.ricTimeout,h=function(){b=!1,c=f.now(),a()},i=m&&g>49?function(){m(h,{timeout:g}),g!==d.ricTimeout&&(g=d.ricTimeout)}:A(function(){k(h)},!0);return function(a){var d;(a=!0===a)&&(g=33),b||(b=!0,d=e-(f.now()-c),d<0&&(d=0),a||d<9?i():k(i,d))}},C=function(a){var b,c,d=99,e=function(){b=null,a()},g=function(){var a=f.now()-c;a<d?k(g,d-a):(m||e)(e)};return function(){c=f.now(),b||(b=k(g,d))}},D=function(){var g,m,o,p,y,D,F,G,H,I,J,K,L=/^img$/i,M=/^iframe$/i,N="onscroll"in a&&!/(gle|ing)bot/.test(navigator.userAgent),O=0,P=0,Q=0,R=-1,S=function(a){Q--,(!a||Q<0||!a.target)&&(Q=0)},T=function(a){return null==K&&(K="hidden"==x(b.body,"visibility")),K||!("hidden"==x(a.parentNode,"visibility")&&"hidden"==x(a,"visibility"))},U=function(a,c){var d,f=a,g=T(a);for(G-=c,J+=c,H-=c,I+=c;g&&(f=f.offsetParent)&&f!=b.body&&f!=e;)(g=(x(f,"opacity")||1)>0)&&"visible"!=x(f,"overflow")&&(d=f.getBoundingClientRect(),g=I>d.left&&H<d.right&&J>d.top-1&&G<d.bottom+1);return g},V=function(){var a,f,h,j,k,l,n,o,q,r,s,t,u=c.elements;if((p=d.loadMode)&&Q<8&&(a=u.length)){for(f=0,R++;f<a;f++)if(u[f]&&!u[f]._lazyRace)if(!N||c.prematureUnveil&&c.prematureUnveil(u[f]))ba(u[f]);else if((o=u[f][i]("data-expand"))&&(l=1*o)||(l=P),r||(r=!d.expand||d.expand<1?e.clientHeight>500&&e.clientWidth>500?500:370:d.expand,c._defEx=r,s=r*d.expFactor,t=d.hFac,K=null,P<s&&Q<1&&R>2&&p>2&&!b.hidden?(P=s,R=0):P=p>1&&R>1&&Q<6?r:O),q!==l&&(D=innerWidth+l*t,F=innerHeight+l,n=-1*l,q=l),h=u[f].getBoundingClientRect(),(J=h.bottom)>=n&&(G=h.top)<=F&&(I=h.right)>=n*t&&(H=h.left)<=D&&(J||I||H||G)&&(d.loadHidden||T(u[f]))&&(m&&Q<3&&!o&&(p<3||R<4)||U(u[f],l))){if(ba(u[f]),k=!0,Q>9)break}else!k&&m&&!j&&Q<4&&R<4&&p>2&&(g[0]||d.preloadAfterLoad)&&(g[0]||!o&&(J||I||H||G||"auto"!=u[f][i](d.sizesAttr)))&&(j=g[0]||u[f]);j&&!k&&ba(j)}},W=B(V),X=function(a){var b=a.target;if(b._lazyCache)return void delete b._lazyCache;S(a),s(b,d.loadedClass),t(b,d.loadingClass),u(b,Z),v(b,"lazyloaded")},Y=A(X),Z=function(a){Y({target:a.target})},$=function(a,b){try{a.contentWindow.location.replace(b)}catch(c){a.src=b}},_=function(a){var b,c=a[i](d.srcsetAttr);(b=d.customMedia[a[i]("data-media")||a[i]("media")])&&a.setAttribute("media",b),c&&a.setAttribute("srcset",c)},aa=A(function(a,b,c,e,f){var g,h,j,l,m,p;(m=v(a,"lazybeforeunveil",b)).defaultPrevented||(e&&(c?s(a,d.autosizesClass):a.setAttribute("sizes",e)),h=a[i](d.srcsetAttr),g=a[i](d.srcAttr),f&&(j=a.parentNode,l=j&&n.test(j.nodeName||"")),p=b.firesLoad||"src"in a&&(h||g||l),m={target:a},s(a,d.loadingClass),p&&(clearTimeout(o),o=k(S,2500),u(a,Z,!0)),l&&q.call(j.getElementsByTagName("source"),_),h?a.setAttribute("srcset",h):g&&!l&&(M.test(a.nodeName)?$(a,g):a.src=g),f&&(h||l)&&w(a,{src:g})),a._lazyRace&&delete a._lazyRace,t(a,d.lazyClass),z(function(){var b=a.complete&&a.naturalWidth>1;p&&!b||(b&&s(a,"ls-is-cached"),X(m),a._lazyCache=!0,k(function(){"_lazyCache"in a&&delete a._lazyCache},9)),"lazy"==a.loading&&Q--},!0)}),ba=function(a){if(!a._lazyRace){var b,c=L.test(a.nodeName),e=c&&(a[i](d.sizesAttr)||a[i]("sizes")),f="auto"==e;(!f&&m||!c||!a[i]("src")&&!a.srcset||a.complete||r(a,d.errorClass)||!r(a,d.lazyClass))&&(b=v(a,"lazyunveilread").detail,f&&E.updateElem(a,!0,a.offsetWidth),a._lazyRace=!0,Q++,aa(a,b,f,e,c))}},ca=C(function(){d.loadMode=3,W()}),da=function(){3==d.loadMode&&(d.loadMode=2),ca()},ea=function(){if(!m){if(f.now()-y<999)return void k(ea,999);m=!0,d.loadMode=3,W(),j("scroll",da,!0)}};return{_:function(){y=f.now(),c.elements=b.getElementsByClassName(d.lazyClass),g=b.getElementsByClassName(d.lazyClass+" "+d.preloadClass),j("scroll",W,!0),j("resize",W,!0),j("pageshow",function(a){if(a.persisted){var c=b.querySelectorAll("."+d.loadingClass);c.length&&c.forEach&&l(function(){c.forEach(function(a){a.complete&&ba(a)})})}}),a.MutationObserver?new MutationObserver(W).observe(e,{childList:!0,subtree:!0,attributes:!0}):(e[h]("DOMNodeInserted",W,!0),e[h]("DOMAttrModified",W,!0),setInterval(W,999)),j("hashchange",W,!0),["focus","mouseover","click","load","transitionend","animationend"].forEach(function(a){b[h](a,W,!0)}),/d$|^c/.test(b.readyState)?ea():(j("load",ea),b[h]("DOMContentLoaded",W),k(ea,2e4)),c.elements.length?(V(),z._lsFlush()):W()},checkElems:W,unveil:ba,_aLSL:da}}(),E=function(){var a,c=A(function(a,b,c,d){var e,f,g;if(a._lazysizesWidth=d,d+="px",a.setAttribute("sizes",d),n.test(b.nodeName||""))for(e=b.getElementsByTagName("source"),f=0,g=e.length;f<g;f++)e[f].setAttribute("sizes",d);c.detail.dataAttr||w(a,c.detail)}),e=function(a,b,d){var e,f=a.parentNode;f&&(d=y(a,f,d),e=v(a,"lazybeforesizes",{width:d,dataAttr:!!b}),e.defaultPrevented||(d=e.detail.width)&&d!==a._lazysizesWidth&&c(a,f,e,d))},f=function(){var b,c=a.length;if(c)for(b=0;b<c;b++)e(a[b])},g=C(f);return{_:function(){a=b.getElementsByClassName(d.autosizesClass),j("resize",g)},checkElems:g,updateElem:e}}(),F=function(){!F.i&&b.getElementsByClassName&&(F.i=!0,E._(),D._())};return k(function(){d.init&&F()}),c={cfg:d,autoSizer:E,loader:D,init:F,uP:w,aC:s,rC:t,hC:r,fire:v,gW:y,rAF:z}});
let burger = document.querySelector(".header__burger");
let menu = document.querySelector(".header__nav");
let body = document.body;

burger.onclick = function () {
  burger.classList.toggle("header__burger_active");
  menu.classList.toggle("header__nav_active");
  body.classList.toggle("_lock");
};

let popup_link = document.querySelectorAll("._popup-link");
let popups = document.querySelectorAll(".popup");
let head_menu = document.querySelector(".header__nav");

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

  if (head_menu) {
    if (!head_menu.classList.contains("header__nav_active")) {
      $("body").removeClass("_lock");
    }
  } else {
    $("body").removeClass("_lock");
  }

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

//Select
let selects = document.querySelectorAll("._select");
if (selects.length > 0) {
  selects_init();
}
function selects_init() {
  for (let index = 0; index < selects.length; index++) {
    const select = selects[index];
    select_init(select);
  }
  //select_callback();
  document.addEventListener("click", function (e) {
    selects_close(e);
  });
  document.addEventListener("keydown", function (e) {
    if (e.code === "Escape") {
      selects_close(e);
    }
  });
}
function selects_close(e) {
  const selects = document.querySelectorAll(".select");
  if (!e.target.closest(".select") && !e.target.classList.contains("_option")) {
    for (let index = 0; index < selects.length; index++) {
      const select = selects[index];
      const select_body_options = select.querySelector(".select__options");
      select.classList.remove("_active");
      _slideUp(select_body_options, 100);
    }
  }
}
function select_init(select) {
  const select_parent = select.parentElement;
  const select_modifikator = select.getAttribute("class");
  const select_selected_option = select.querySelector("option:checked");
  select.setAttribute("data-default", select_selected_option.value);
  select.style.display = "none";

  select_parent.insertAdjacentHTML(
    "beforeend",
    '<div class="select select_' + select_modifikator + '"></div>'
  );

  let new_select = select.parentElement.querySelector(".select");
  new_select.appendChild(select);
  select_item(select);
}
function select_item(select) {
  const select_parent = select.parentElement;
  const select_items = select_parent.querySelector(".select__item");
  const select_options = select.querySelectorAll("option");
  const select_selected_option = select.querySelector("option:checked");
  const select_selected_text = select_selected_option.text;
  const select_type = select.getAttribute("data-type");

  if (select_items) {
    select_items.remove();
  }

  let select_type_content = "";
  if (select_type == "input") {
    select_type_content =
      '<div class="select__value icon-select-arrow"><input autocomplete="off" type="text" name="form[]" value="' +
      select_selected_text +
      '" data-error="Ошибка" data-value="' +
      select_selected_text +
      '" class="select__input"></div>';
  } else {
    select_type_content =
      '<div class="select__value icon-select-arrow"><span>' +
      select_selected_text +
      "</span></div>";
  }

  select_parent.insertAdjacentHTML(
    "beforeend",
    '<div class="select__item">' +
      '<div class="select__title">' +
      select_type_content +
      "</div>" +
      '<div class="select__options">' +
      select_get_options(select_options) +
      "</div>" +
      "</div></div>"
  );

  select_actions(select, select_parent);
}
function select_actions(original, select) {
  const select_item = select.querySelector(".select__item");
  const selectTitle = select.querySelector(".select__title");
  const select_body_options = select.querySelector(".select__options");
  const select_options = select.querySelectorAll(".select__option");
  const select_type = original.getAttribute("data-type");
  const select_input = select.querySelector(".select__input");

  selectTitle.addEventListener("click", function (e) {
    selectItemActions();
  });

  function selectMultiItems() {
    let selectedOptions = select.querySelectorAll(".select__option");
    let originalOptions = original.querySelectorAll("option");
    let selectedOptionsText = [];
    for (let index = 0; index < selectedOptions.length; index++) {
      const selectedOption = selectedOptions[index];
      originalOptions[index].removeAttribute("selected");
      if (selectedOption.classList.contains("_selected")) {
        const selectOptionText = selectedOption.innerHTML;
        selectedOptionsText.push(selectOptionText);
        originalOptions[index].setAttribute("selected", "selected");
      }
    }
    select.querySelector(".select__value").innerHTML =
      "<span>" + selectedOptionsText + "</span>";
  }
  function selectItemActions(type) {
    if (!type) {
      let selects = document.querySelectorAll(".select");
      for (let index = 0; index < selects.length; index++) {
        const select = selects[index];
        const select_body_options = select.querySelector(".select__options");
        if (select != select_item.closest(".select")) {
          select.classList.remove("_active");
          _slideUp(select_body_options, 100);
        }
      }
      _slideToggle(select_body_options, 100);
      select.classList.toggle("_active");
    }
  }
  for (let index = 0; index < select_options.length; index++) {
    const select_option = select_options[index];
    const select_option_value = select_option.getAttribute("data-value");
    const select_option_text = select_option.innerHTML;

    if (select_type == "input") {
      select_input.addEventListener("keyup", select_search);
    } else {
      if (
        select_option.getAttribute("data-value") == original.value &&
        !original.hasAttribute("multiple")
      ) {
        select_option.style.display = "none";
      }
    }
    select_option.addEventListener("click", function () {
      for (let index = 0; index < select_options.length; index++) {
        const el = select_options[index];
        el.style.display = "block";
      }
      if (select_type == "input") {
        select_input.value = select_option_text;
        original.value = select_option_value;
      } else {
        if (original.hasAttribute("multiple")) {
          select_option.classList.toggle("_selected");
          selectMultiItems();
        } else {
          select.querySelector(".select__value").innerHTML =
            "<span>" + select_option_text + "</span>";
          original.value = select_option_value;
          select_option.style.display = "none";
        }
      }
      let type;
      if (original.hasAttribute("multiple")) {
        type = "multiple";
      }
      selectItemActions(type);
    });
  }
}
function select_get_options(select_options) {
  if (select_options) {
    let select_options_content = "";
    for (let index = 0; index < select_options.length; index++) {
      const select_option = select_options[index];
      const select_option_value = select_option.value;
      if (select_option_value != "") {
        const select_option_text = select_option.innerHTML;
        select_options_content =
          select_options_content +
          '<div data-value="' +
          select_option_value +
          '" class="select__option">' +
          select_option_text +
          "</div>";
      }
    }
    return select_options_content;
  }
}
function select_search(e) {
  let select_block = e.target
    .closest(".select ")
    .querySelector(".select__options");
  let select_options = e.target
    .closest(".select ")
    .querySelectorAll(".select__option");
  let select_search_text = e.target.value.toUpperCase();

  for (let i = 0; i < select_options.length; i++) {
    let select_option = select_options[i];
    let select_txt_value = select_option.textContent || select_option.innerText;
    if (select_txt_value.toUpperCase().indexOf(select_search_text) > -1) {
      select_option.style.display = "";
    } else {
      select_option.style.display = "none";
    }
  }
}
function selects_update_all() {
  let selects = document.querySelectorAll("select");
  if (selects) {
    for (let index = 0; index < selects.length; index++) {
      const select = selects[index];
      select_item(select);
    }
  }
}

//=================
//SlideToggle
let _slideUp = (target, duration = 500) => {
  target.style.transitionProperty = "height, margin, padding";
  target.style.transitionDuration = duration + "ms";
  target.style.height = target.offsetHeight + "px";
  target.offsetHeight;
  target.style.overflow = "hidden";
  target.style.height = 0;
  target.style.paddingTop = 0;
  target.style.paddingBottom = 0;
  target.style.marginTop = 0;
  target.style.marginBottom = 0;
  window.setTimeout(() => {
    target.style.display = "none";
    target.style.removeProperty("height");
    target.style.removeProperty("padding-top");
    target.style.removeProperty("padding-bottom");
    target.style.removeProperty("margin-top");
    target.style.removeProperty("margin-bottom");
    target.style.removeProperty("overflow");
    target.style.removeProperty("transition-duration");
    target.style.removeProperty("transition-property");
    target.classList.remove("_slide");
  }, duration);
};
let _slideDown = (target, duration = 500) => {
  target.style.removeProperty("display");
  let display = window.getComputedStyle(target).display;
  if (display === "none") display = "block";

  target.style.display = display;
  let height = target.offsetHeight;
  target.style.overflow = "hidden";
  target.style.height = 0;
  target.style.paddingTop = 0;
  target.style.paddingBottom = 0;
  target.style.marginTop = 0;
  target.style.marginBottom = 0;
  target.offsetHeight;
  target.style.transitionProperty = "height, margin, padding";
  target.style.transitionDuration = duration + "ms";
  target.style.height = height + "px";
  target.style.removeProperty("padding-top");
  target.style.removeProperty("padding-bottom");
  target.style.removeProperty("margin-top");
  target.style.removeProperty("margin-bottom");
  window.setTimeout(() => {
    target.style.removeProperty("height");
    target.style.removeProperty("overflow");
    target.style.removeProperty("transition-duration");
    target.style.removeProperty("transition-property");
    target.classList.remove("_slide");
  }, duration);
};
let _slideToggle = (target, duration = 500) => {
  if (!target.classList.contains("_slide")) {
    target.classList.add("_slide");
    if (window.getComputedStyle(target).display === "none") {
      return _slideDown(target, duration);
    } else {
      return _slideUp(target, duration);
    }
  }
};


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

$(document).ready(function () {
  // If the 'hide cookie is not set we show the message
  if (readCookie("hide", true)) {
    $("#cookie_panel").hide();
  }

  // Add the event that closes the popup and sets the cookie that tells us to
  // not show it again until one day has passed.
  $("#accept_cookies").click(function () {
    $("#cookie_panel").hide();
    setCookie("hide", true, 365);
    return false;
  });
  $("#c19").click(function () {
    $("#statement").hide();
  });
});

// ---
// And some generic cookie logic
// ---
function setCookie(name, value, days) {
  if (days) {
    var date = new Date();
    date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
    var expires = "; expires=" + date.toGMTString();
  } else var expires = "";
  document.cookie = name + "=" + value + expires + "; path=/";
}

function readCookie(name) {
  var nameEQ = name + "=";
  var ca = document.cookie.split(";");
  for (var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == " ") c = c.substring(1, c.length);
    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
  }
  return null;
}

function eraseCookie(name) {
  setCookie(name, "", -1);
}

$(document).ready(function () {
  let sliders = document.querySelector(".slider__list");

  $(".slider__list").slick({
    infinite: false,
    slidesToShow: 4,
    slidesToScroll: 2,
    easing: "ease",
    variableWidth: true,
    arrows: true,
    dots: false,

    responsive: [
      {
        breakpoint: 2400,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
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
        },
      },
    ],
  });

  $(".slider__list").slickLightbox({
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
});
