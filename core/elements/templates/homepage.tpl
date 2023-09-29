<!DOCTYPE html>
<html lang="en">
  [[$head? &css=`homepage` &trustbox=`1`]]

  <body>
    <div class="wrapper">
      [[$header]]

      <main>
        <h1 class="visually-hidden">[[*longtitle]]</h1>
        <section class="hero">
          <div class="hero__wrap">
            <div class="hero__image absolute-image border-radius_right-bottom">
              <picture>
                <source
                  srcset="[[*hero-img:phpthumbof=`f=webp]]"
                  type="image/webp"
                />
                <img src="[[*hero-img]]" alt="[[*pagetitle]]" />
              </picture>
            </div>
            <div class="container">
              <div class="hero__body [[!get-position? &section=`hero`]]">
                <p class="hero__text section-text">
                  Bespoke kitchens and bedrooms designed just for you. Our
                  complete service means our experienced team is with you every
                  step of the way.
                </p>
                <a href="[[~3]]" class="hero__button button button_long">
                  VIEW KITCHEN GALLERY
                </a>
              </div>
            </div>
          </div>
        </section>

        <section class="swiper">
          <div class="container">
            <div class="swiper__body [[!get-position? &section=`swiper`]]">
              <h2 class="swiper__title section-title">
                Turning ideas into beautiful kitchens
              </h2>
              <p class="swiper__text section-text">
                The first step to your dream kitchen is a tour of our showroom
                and a free consultation with a designer. 
              </p>
              <a
                href="book-app"
                class="swiper__link button button_long _popup-link"
              >
                BOOK FREE CONSULTATION
              </a>
            </div>
          </div>
          <div class="swiper__wrap">
            <!-- <div class="swiper__body">
                
              </div> -->
            <div class="swiper__img swiper__background-img"></div>
            <div class="swiper__img swiper__foreground-img"></div>
            <input
              type="range"
              min="1"
              max="100"
              value="50"
              class="swiper__slider"
              name="slider"
              id="slider"
            />
            <div class="swiper__slider-button">
              <span class="swiper__slider-line"></span>
            </div>
          </div>
        </section>

        <section class="more">
          <div class="container">
            <div class="more__wrap">
              <h2 class="more__title">more than a kitchen</h2>
              <p class="more__text section-text">
                We believe great design is achievable on any budget what sets us
                apart is the quality of service we deliver
              </p>
            </div>
          </div>
        </section>

        <section class="kitchens">
          <div class="kitchens__body">
            [[getImageList? &tvname=`kitchens` &tpl=`kitchens-section.tpl` ]]
          </div>
        </section>

        <section class="stay">
          <div class="stay__text-block">
            <h2 class="stay__title">How can we help?</h2>
            <p class="stay__text">
              Have a question for our team or want to learn more about our
              service?<br />
              Fill in the form below and we will be in touch.
            </p>

            <div class="stay__form">
              [[$formit? &email-to=`info@urbanmyth.net`]] [[$contact-form?
              &subject=`0`]]
            </div>
          </div>
        </section>

        <section class="trustpilot">
          <div class="container">
            <h2 class="trustpilot__title">What our customer say</h2>
            <!-- TrustBox widget - Carousel -->
            <div
              class="trustpilot-widget"
              data-locale="en-US"
              data-template-id="53aa8912dec7e10d38f59f36"
              data-businessunit-id="61dd99c73bd1310fccb06b5b"
              data-style-height="140px"
              data-style-width="100%"
              data-theme="light"
              data-stars="1,2,3,4,5"
              data-review-languages="en"
            >
              <a
                href="https://www.trustpilot.com/review/urbanmyth.net"
                target="_blank"
                rel="noopener"
                >Trustpilot</a
              >
            </div>
            <!-- End TrustBox widget -->
          </div>
        </section>

        <section class="about">
          <div class="container">
            <div class="about__body">
              <div class="about__text-block">
                <h2 class="about__title">About Urban Myth</h2>
                <ul class="about__list">
                  <li class="about__item">
                    Full design and consultation service
                  </li>
                  <li class="about__item">
                    UK manufactured kitchens and bedrooms
                  </li>
                  <li class="about__item">The latest appliances and brands</li>
                  <li class="about__item">Dedicated customer service</li>
                </ul>
                <a href="[[~6]]" class="about__link button button_long">
                  WHY CHOOSE URBAN MYTH
                </a>
              </div>
              <div class="about__figure">
                <button
                  class="about__arrow about__arrow_before"
                  type="button"
                ></button>
                <button
                  class="about__arrow about__arrow_after"
                  type="button"
                ></button>
                <div class="about__images">
                  [[getImageList? &tvname=`gallery` &tpl=`@CODE:
                  <picture>
                    <source
                      type="image/webp"
                      srcset="[[+image:phpthumbof=`f=webp]]"
                    />
                    <img
                      loading="lazy"
                      class="about__image"
                      data-imagenum="[[+idx]]"
                      src="[[+image]]"
                      alt="[[+title]]"
                    />
                  </picture>
                  ` ]]
                </div>
                <div class="about__pag pag">
                  [[getImageList? &tvname=`gallery` &tpl=`@CODE:
                  <span data-num="[[+idx]]" class="pag__item"></span>` ]]
                </div>
              </div>
            </div>
          </div>
        </section>

        [[$last-articles]]
      </main>
      <!-- popup's -->
      [[$popup-block? &type=`book-app`]] [[$popup-block?
      &type=`brochure-request`]] [[-$popup-block? &type=`contact`]]

      <!------------->
      [[$footer]]
    </div>

    [[$scripts? js=`homepage`]]
  </body>
</html>
