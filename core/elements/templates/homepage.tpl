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
                  href="[[~3]]"
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
                    srcset="[[*kitchen-1-img:phpthumbof=`f=webp]]"
                    type="image/webp"
                  />
                  <img src="[[*kitchen-1-img]]" alt="Learn more" />
                </picture>
              </div>

              <div class="kitchens__button-mobile">
                <a href="[[~3]]" class="button">Learn more</a>
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
                  href="[[~3]]"
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
                    srcset="[[*kitchen-2-img:phpthumbof=`f=webp]]"
                    type="image/webp"
                  />
                  <img
                    src="[[*kitchen-2-img]]"
                    alt="Explore our kitchen features"
                  />
                </picture>
              </div>

              <div class="kitchens__button-mobile">
                <a href="[[~3]]" class="button" target="_blank">
                  Explore our kitchen features
                </a>
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
                  href="[[~3]]"
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
                    srcset="[[*kitchen-1-img:phpthumbof=`f=webp]]"
                    type="image/webp"
                  />
                  <img src="[[*kitchen-1-img]]" alt="Visit the showroom" />
                </picture>
              </div>

              <div class="kitchens__button-mobile">
                <a href="[[~3]]" class="button">Visit the showroom</a>
              </div>
            </div>
          </div>
        </section>

        <section class="stay">
          <div class="stay__text-block">
            <h2 class="stay__title">Stay in touch</h2>
            <p class="stay__text">
              Lorem ipsum dolor sit amet consectetur. Quis at quis eget nunc.
              Tempor vestibulum leo metus et leo et. Nullam bibendum aliquet
              velit magnis at. Aliquam dignissim ut massa adipiscing blandit
              porttitor pretium lorem.
            </p>

            <div class="stay__form">[[$formit]] [[$contact-form]]</div>
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
                  <img
                    class="about__image about__image_active"
                    src="/assets/theme/build/img/about.jpg"
                    alt=""
                  />
                  <img
                    class="about__image"
                    src="/assets/theme/build/img/about.jpg"
                    alt=""
                  />
                  <img
                    class="about__image"
                    src="/assets/theme/build/img/about.jpg"
                    alt=""
                  />
                </div>
                <div class="about__pag pag">
                  <span data-num="0" class="pag__item pag__item_active"></span>
                  <span data-num="1" class="pag__item"></span>
                  <span data-num="2" class="pag__item"></span>
                </div>
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
