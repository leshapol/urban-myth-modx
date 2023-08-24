<!DOCTYPE html>
<html lang="en">
[[$head? &css=`homepage` &trustbox=`1`]]

<body>
  <div class="wrapper">
    [[$header]]
    <!-- 123 -->
    <main>
      <h1 class="visually-hidden">h1 title for seo</h1>
      <section class="prewiew">
        <div class="prewiew__wrap">
          <h2 class="visually-hidden">opening slogan</h2>
          <div class="prewiew__image">
            <picture>
              <source type="image/webp" media="(min-width: 470px)" srcset="
                    /assets/theme/build/img/hero-img.webp    1x,
                    /assets/theme/build/img/hero-img@2x.webp 2x
                  " width="1920" height="720" />
              <source type="image/webp" srcset="
                    /assets/theme/build/img/hero-img-mobile.webp    1x,
                    /assets/theme/build/img/hero-img-mobile@2x.webp 2x
                  " width="480" height="720" />
              <source media="(min-width: 470px)" srcset="
                    /assets/theme/build/img/hero-img.jpg    1x,
                    /assets/theme/build/img/hero-img@2x.jpg 2x
                  " width="1920" height="720" />
              <img src="/assets/theme/build/img/hero-img-mobile.jpg" srcset="
                    /assets/theme/build/img/hero-img-mobile.jpg    1x,
                    /assets/theme/build/img/hero-img-mobile@2x.jpg 2x
                  " alt="Urban myth hero" width="480" height="720" />
            </picture>
          </div>
          <div class="container">
            <div class="prewiew__body prewiew__body_bottom">
              <p class="prewiew__text">
                Bespoke kitchens and bedrooms designed just for you. Our
                complete service means our experienced team is with you every
                step of the way.
              </p>
              <a href="#" class="prewiew__link button button_long">
                VIEW KITCHEN GALLERY
              </a>
            </div>
          </div>
        </div>
      </section>

      <section class="swiper">
        <div class="container">
          <div class="swiper__body">
            <h2 class="swiper__title">
              Turning ideas into beautiful kitchens
            </h2>
            <p class="swiper__text">
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
          <input type="range" min="1" max="100" value="50" class="swiper__slider" name="slider" id="slider" />
          <div class="swiper__slider-button">
            <span class="swiper__slider-line"></span>
          </div>
        </div>
      </section>
      <section class="more">
        <div class="container">
          <div class="more__wrap">
            <h2 class="more__title">more than a kitchen</h2>
            <p class="more__text">
              We believe great design is achievable on any budget what sets us
              apart is the quality of service we deliver
            </p>
          </div>
        </div>
      </section>

      <section class="advantage">
        <h2 class="visually-hidden">advantages</h2>
        <div class="advantage__wrapper perfect">
          <h3 class="advantage__title advantage__title_mobile perfect__title">
            Perfect kitchens for you 
          </h3>
          <div class="advantage__image perfect__image">
            <picture>
              <source media="(min-width: 470px)"
                data-srcset="/assets/theme/build/img/perfect.jpg 1x, /assets/theme/build/img/perfect@2x.jpg 2x" srcset="
                    data:image/gif;base64,R0lGODlhCAADAIAAAP///wAAACH5BAEAAAEALAAAAAAIAAMAAAIEjI+pVwA7
                  " width="1920" height="720" />
              <img loading="lazy" class="lazyload"
                src="data:image/gif;base64,R0lGODlhAgADAIAAAP///wAAACH5BAEAAAEALAAAAAACAAMAAAICjF8AOw=="
                data-srcset="/assets/theme/build/img/perfect-mobile.jpg    1x, /assets/theme/build/img/perfect-mobile@2x.jpg 2x"
                alt="Perfect kitchens for you" width="480" height="720" />
            </picture>
          </div>
          <div class="container">
            <div class="advantage__body perfect__body advantage__body_medium advantage__body_right">
              <h3 class="advantage__title perfect__title">
                Perfect kitchens for you 
              </h3>
              <p class="advantage__text perfect__text">
                Whatever the size of your space, every one of our kitchen
                designs is unique, made to suit your home and lifestyle. 
              </p>
            </div>
            <a href="#"
              class="advantage__link perfect__link circle-button advantage__link_bottom advantage__link_right">
              learn more
            </a>
          </div>
        </div>
        <a class="advantage__button button"> BOOK FREE CONSULTATION </a>
        <div class="advantage__wrapper detail">
          <h3 class="advantage__title advantage__title_mobile detail__title">
            It’s all in the detail 
          </h3>
          <div class="advantage__image detail__image">
            <img src="/assets/theme/build/img/hero3.jpg" alt="" />
          </div>
          <div class="container">
            <a href="#" class="advantage__link detail__link circle-button">
              Explore <br />
              our kitchen features
            </a>
            <div class="advantage__body detail__body advantage__body_bottom">
              <h3 class="advantage__title detail__title">
                It’s all in the detail 
              </h3>
              <p class="advantage__text detail__text">
                The finishing touches that add personality to your space 
              </p>
            </div>
          </div>
        </div>
        <a class="advantage__button button"> BOOK FREE CONSULTATION </a>
        <div class="advantage__wrapper inspiration">
          <h3 class="advantage__title advantage__title_mobile inspiration__title">
            Inspiration at every turn 
          </h3>
          <div class="advantage__image inspiration__image">
            <img src="/assets/theme/build/img/insp.jpg" alt="" />
          </div>
          <div class="container">
            <div class="advantage__body inspiration__body">
              <h3 class="advantage__title inspiration__title">
                Inspiration at every turn 
              </h3>
              <p class="advantage__text inspiration__text">
                Designed to inspire, our showroom offers you the opportunity
                to experience the quality of our kitchens in a relaxed
                atmosphere. 
              </p>
            </div>
            <a href="#"
              class="advantage__link inspiration__link circle-button advantage__link_bottom advantage__link_right">
              Visit the showroom
            </a>
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
            <a href="contact" class="stay__submit button _popup-link">contact us</a>
          </div>
        </div>
      </section>

      <section class="trustpilot">
        <div class="container">
          <h2 class="trustpilot__title">What our customer say</h2>
          <!-- TrustBox widget - Carousel -->
          <div class="trustpilot-widget" data-locale="en-US" data-template-id="53aa8912dec7e10d38f59f36"
            data-businessunit-id="61dd99c73bd1310fccb06b5b" data-style-height="140px" data-style-width="100%"
            data-theme="light" data-stars="1,2,3,4,5" data-review-languages="en">
            <a href="https://www.trustpilot.com/review/urbanmyth.net" target="_blank" rel="noopener">Trustpilot</a>
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