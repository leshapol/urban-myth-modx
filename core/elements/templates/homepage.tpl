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
                  type="image/webp"
                  media="(min-width: 470px)"
                  srcset="
                    /assets/theme/build/img/homepage/hero-img.webp    1x,
                    /assets/theme/build/img/homepage/hero-img@2x.webp 2x
                  "
                  width="1920"
                  height="720"
                />
                <source
                  type="image/webp"
                  srcset="
                    /assets/theme/build/img/homepage/hero-img-mobile.webp    1x,
                    /assets/theme/build/img/homepage/hero-img-mobile@2x.webp 2x
                  "
                  width="480"
                  height="720"
                />
                <source
                  media="(min-width: 470px)"
                  srcset="
                    /assets/theme/build/img/homepage/hero-img.jpg    1x,
                    /assets/theme/build/img/homepage/hero-img@2x.jpg 2x
                  "
                  width="1920"
                  height="720"
                />
                <img
                  src="/assets/theme/build/img/homepage/hero-img-mobile.jpg"
                  srcset="
                    /assets/theme/build/img/homepage/hero-img-mobile.jpg    1x,
                    /assets/theme/build/img/homepage/hero-img-mobile@2x.jpg 2x
                  "
                  alt="Urban myth hero"
                  width="480"
                  height="720"
                />
              </picture>
            </div>
            <div class="container">
              <div class="hero__body position_bottom position_left">
                <p class="hero__text section-text">
                  Bespoke kitchens and bedrooms designed just for you. Our
                  complete service means our experienced team is with you every
                  step of the way.
                </p>
                <a href="#" class="hero__button button button_long">
                  VIEW KITCHEN GALLERY
                </a>
              </div>
            </div>
          </div>
        </section>

        <section class="swiper">
          <div class="container">
            <div class="swiper__body position_left position_top">
              <h2 class="swiper__title section-title">
                Turning ideas into beautiful kitchens
              </h2>
              <p class="swiper__text section-text">
                The first step to your dream kitchen is a tour of our showroom
                and a free consultation with a designer. 
              </p>
              <a class="swiper__link button button_long">
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
          <h2 class="visually-hidden">Kitchens</h2>

          <div class="kitchens__body">
            <div class="kitchens__block">
              <div class="container">
                <div class="kitchens__text-block position_top position_right">
                  <h3 class="kitchens__title section-title">
                    Perfect kitchens for you
                  </h3>
                  <p class="kitchens__text section-text">
                    Whatever the size of your space, every one of our kitchen
                    designs is unique, made to suit your home and lifestyle.
                  </p>
                </div>
                <a
                  href="#"
                  class="kitchens__button circle-button circle-button_bottom circle-button_right"
                >
                  learn more
                </a>
              </div>

              <div
                class="kitchens__image kitchens__border-radius absolute-image border-radius_right-bottom"
              >
                <picture>
                  <source
                    media="(min-width: 470px)"
                    data-srcset="/assets/theme/build/img/homepage/kitchen-1.jpg 1x, /assets/theme/build/img/homepage/kitchen-1@2x.jpg 2x"
                    srcset="
                      data:image/gif;base64,R0lGODlhCAADAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAMAAAIEjI+pVwA7
                    "
                    width="1920"
                    height="720"
                  />
                  <img
                    loading="lazy"
                    class="lazyload"
                    src="data:image/gif;base64,R0lGODlhAgADAIAAAP///wAAACH5BAEAAAEALAAAAAACAAMAAAICjF8AOw=="
                    data-srcset="/assets/theme/build/img/homepage/kitchen-1-mobile.jpg    1x, /assets/theme/build/img/homepage/kitchen-1-mobile@2x.jpg 2x"
                    alt="Perfect kitchens for you"
                    width="480"
                    height="720"
                  />
                </picture>
              </div>

              <div class="kitchens__button-mobile">
                <a href="#" class="button"> BOOK FREE CONSULTATION </a>
              </div>
            </div>

            <div class="kitchens__block">
              <div class="container">
                <div class="kitchens__text-block position_bottom position_left">
                  <h3 class="kitchens__title section-title">
                    It’s all in the detail 
                  </h3>
                  <p class="kitchens__text section-text">
                    The finishing touches that add personality to your space 
                  </p>
                </div>
                <a
                  href="#"
                  class="kitchens__button circle-button circle-button_top circle-button_left"
                >
                  Explore our kitchen features
                </a>
              </div>

              <div
                class="kitchens__image kitchens__border-radius absolute-image border-radius_left-top"
              >
                <picture>
                  <source
                    media="(min-width: 470px)"
                    data-srcset="/assets/theme/build/img/homepage/kitchen-2.jpg 1x, /assets/theme/build/img/homepage/kitchen-2@2x.jpg 2x"
                    srcset="
                      data:image/gif;base64,R0lGODlhCAADAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAMAAAIEjI+pVwA7
                    "
                    width="1920"
                    height="720"
                  />
                  <img
                    loading="lazy"
                    class="lazyload"
                    src="data:image/gif;base64,R0lGODlhAgADAIAAAP///wAAACH5BAEAAAEALAAAAAACAAMAAAICjF8AOw=="
                    data-srcset="/assets/theme/build/img/homepage/kitchen-2-mobile.jpg    1x, /assets/theme/build/img/homepage/kitchen-2-mobile@2x.jpg 2x"
                    alt="Perfect kitchens for you"
                    width="480"
                    height="720"
                  />
                </picture>
              </div>

              <div class="kitchens__button-mobile">
                <a href="#" class="button"> BOOK FREE CONSULTATION </a>
              </div>
            </div>

            <div class="kitchens__block">
              <div class="container">
                <div
                  class="kitchens__text-block position_top position_left white-color"
                >
                  <h3 class="kitchens__title section-title">
                    Inspiration at every turn 
                  </h3>
                  <p class="kitchens__text section-text">
                    Designed to inspire, our showroom offers you the opportunity
                    to experience the quality of our kitchens in a relaxed
                    atmosphere. 
                  </p>
                </div>
                <a
                  href="#"
                  class="kitchens__button circle-button circle-button_bottom circle-button_right"
                >
                  Visit the showroom
                </a>
              </div>

              <div
                class="kitchens__image kitchens__border-radius absolute-image border-radius_right-bottom"
              >
                <picture>
                  <source
                    media="(min-width: 470px)"
                    data-srcset="/assets/theme/build/img/homepage/kitchen-3.jpg 1x, /assets/theme/build/img/homepage/kitchen-3@2x.jpg 2x"
                    srcset="
                      data:image/gif;base64,R0lGODlhCAADAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAMAAAIEjI+pVwA7
                    "
                    width="1920"
                    height="720"
                  />
                  <img
                    loading="lazy"
                    class="lazyload"
                    src="data:image/gif;base64,R0lGODlhAgADAIAAAP///wAAACH5BAEAAAEALAAAAAACAAMAAAICjF8AOw=="
                    data-srcset="/assets/theme/build/img/homepage/kitchen-3-mobile.jpg    1x, /assets/theme/build/img/homepage/kitchen-3-mobile@2x.jpg 2x"
                    alt="Perfect kitchens for you"
                    width="480"
                    height="720"
                  />
                </picture>
              </div>

              <div class="kitchens__button-mobile">
                <a href="#" class="button"> BOOK FREE CONSULTATION </a>
              </div>
            </div>
          </div>
        </section>

        <section class="stay">
          <div class="container">
            <div class="stay__row">
              <div class="stay__column">
                <h2 class="stay__title">Stay in touch</h2>
                <p class="stay__text">
                  Lorem ipsum dolor sit amet consectetur. Quis at quis eget
                  nunc. Tempor vestibulum leo metus et leo et. Nullam bibendum
                  aliquet velit magnis at. Aliquam dignissim ut massa adipiscing
                  blandit porttitor pretium lorem.
                </p>
              </div>
              <a href="contact" class="stay__submit button _popup-link"
                >contact us</a
              >
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
          <div class="about__row">
            <div class="container">
              <div class="about__body">
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
                <a class="about__link button button_long">
                  WHY CHOOSE URBAN MYTH
                </a>
              </div>
            </div>
            <div class="about__figure">
              <div class="about__image">
                <img src="/assets/theme/build/img/about.jpg" alt="" />
              </div>
              <div class="about__pag pag">
                <span data-num="1" class="pag__item pag__item_active"></span>
                <span data-num="2" class="pag__item"></span>
                <span data-num="3" class="pag__item"></span>
              </div>
            </div>
          </div>
        </section>

        [[$last-articles]]
      </main>
      <!-- popup's -->
      [[$popup-block? &type=`book-app`]] [[$popup-block?
      &type=`brochure-request`]] [[$popup-block? &type=`contact`]]

      <!------------->
      [[$footer]]
    </div>

    [[$scripts? js=`homepage`]]
  </body>
</html>
