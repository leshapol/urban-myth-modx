<header class="header">
  <div class="header__column">
    <div class="header__head">
      <div class="container">
        <div class="header__wrap">
          <div class="header__tel">
            <a href="tel:02085313413">020 8531 3413</a>
          </div>
          <div class="header__broshure">
            <a href="brochure-request" class="_popup-link">
              REQUEST BROCHURE
            </a>
          </div>
          <div class="header__slogan">MORE THAN A KITCHEN</div>
        </div>
      </div>
    </div>

    <div class="header__body container">
      <a href="index.html" class="header__logo">
        <img
          src="/assets/theme/build/img/logo-black.png"
          srcset="
            /assets/theme/build/img/logo-black.png    1x,
            /assets/theme/build/img/logo-black@2x.png 2x
          "
          alt="Urban myth logo"
          width="180"
          height="95"
        />
      </a>

      [[pdoMenu? &parents=`15` &tplOuter=`@INLINE
      <nav
        class="header__nav"
        itemscope=""
        itemtype="http://schema.org/SiteNavigationElement"
      >
        <ul
          class="header__list"
          itemprop="about"
          itemscope=""
          itemtype="http://schema.org/ItemList"
        >
          [[+wrapper]]
        </ul>
        <a href="book-app" class="header__btn button _popup-link"
          >BOOK APPOINTMENT</a
        >
      </nav>
      ` &tpl=`@INLINE
      <li
        itemprop="itemListElement"
        itemscope=""
        itemtype="http://schema.org/ItemList"
        class="header__item"
      >
        <a href="[[+link]]" class="header__link">[[+pagetitle]]</a>
      </li>
      `]]

      <div class="header__burger">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
</header>
