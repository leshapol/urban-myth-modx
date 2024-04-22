<header class="header">
  <div class="header__column">
    <div class="header__head">
      <div class="container">
        <div class="header__wrap">
          <div class="header__tel">
            <a class="header__link" href="tel:02085313413">020 8531 3413</a>
          </div>
          <div class="header__broshure">
            <a class="header__link _popup-link" href="brochure-request">
              REQUEST BROCHURE
            </a>
          </div>
          <div class="header__contact">
            <a class="header__link" href="[[~23]]">FIND US</a>
          </div>
          <!--<a
            href="https://www.trustpilot.com/review/urbanmyth.net"
            class="header__trustpilot trustpilot-link"
          >
            <img
              alt="TrustScore 5 out of 5"
              src="/assets/theme/build/img/trustpilot-stars-5.svg"
              class="trustpilot-link__image trustpilot-link__image_stars"
            />
            <img
              alt=""
              width="140"
              src="/assets/theme/build/img/trustpilot-logo-white.svg"
              class="trustpilot-link__image"
            />
          </a>-->
          
          <!-- TrustBox widget - Micro Star -->
          <div class="header__trustpilot trustpilot-link">
            <div class="trustpilot-widget" data-locale="en-GB" data-template-id="5419b732fbfb950b10de65e5" data-businessunit-id="61dd99c73bd1310fccb06b5b" data-style-height="24px" data-style-width="100%" data-theme="dark">
            <a href="https://uk.trustpilot.com/review/urbanmyth.net" target="_blank" rel="noopener">Trustpilot</a>
            </div>
          </div>
          <!-- End TrustBox widget -->

          <!--<div class="header__slogan">MORE THAN A KITCHEN</div>-->
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
        
        [[*hide-menu:isnot=`1`:then=`
        <ul
          class="header__list"
          itemprop="about"
          itemscope=""
          itemtype="http://schema.org/ItemList"
        >
          [[+wrapper]]
        </ul>
        `]]
        
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
        <a href="[[+link]]">[[+pagetitle]]</a>
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
