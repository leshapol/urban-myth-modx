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
            <div class="container">
              <div class="hero__body [[!get-position? &section=`hero`]]">
                <p class="hero__text section-text">
                  Bespoke kitchens and bedrooms designed just for you. Our
                  complete service means our experienced team is with you every
                  step of the way.
                </p>
                <a href="[[~3]]" class="hero__button button button_small">
                  VIEW KITCHEN GALLERY
                </a>
              </div>
            </div>
            <div class="hero__image absolute-image border-radius_right-bottom">
              <picture>
                <source
                  type="image/webp"
                  media="(min-width: 425px)"
                  srcset="[[*hero-img:phpthumbof=`f=webp`]]"
                />
                [[*hero-img-mobile:isnot=``:then=`
                <source
                  srcset="[[*hero-img-mobile:phpthumbof=`f=webp`]]"
                  type="image/webp"
                />
                `:else=`
                <source
                  srcset="[[*hero-img:phpthumbof=`&w=1080&h=720&zc=1&f=webp`]]"
                  type="image/webp"
                />
                `]]
                <img src="[[*hero-img]]" alt="[[*pagetitle]]" />
              </picture>
            </div>
          </div>
        </section>

        [[$showroom-trustpilot]]

        <section class="top-images">
          <div class="kitchens__body">
            [[getImageList? &tvname=`top-images` &tpl=`kitchens-section.tpl` ]]
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

        <section class="stay">
          <div class="stay__text-block">
            <h2 class="stay__title">How can we help?</h2>
            <p class="stay__text">
              Have a question for our team or want to learn more about our
              service?<br />
              Fill in the form below and we will be in touch.
            </p>

            <div class="stay__form">
              [[$formit]] [[$contact-form? &subject=`0`]]
            </div>
          </div>
        </section>

        [[$showroom-features]]

        <section class="kitchens">
          <div class="kitchens__body">
            [[getImageList? &tvname=`kitchens` &tpl=`kitchens-section.tpl` ]]
          </div>
        </section>

        <section class="about">
          <div class="container">
            <div class="about__body">
              <div class="about__text-block">
                <h2 class="about__title">About Urban Myth</h2>
                <ul class="about__list">
                  [[getImageList? &tvname=`about-bullets` &tpl=`@CODE:
                  <li class="about__item">[[+text]]</li>
                  ` ]]
                </ul>
                <a href="[[~6]]" class="about__link button button_small">
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
                  [[getImageList? &tvname=`slider` &tpl=`@CODE:
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
                  [[getImageList? &tvname=`slider` &tpl=`@CODE:
                  <span data-num="[[+idx]]" class="pag__item"></span>` ]]
                </div>
              </div>
            </div>
          </div>
        </section>

        <section class="awards">
          <div class="container">
            <h2 class="awards__title">
              [[getImageList?
                &tvname=`awards`
                &tpl=`@CODE: [[+title]]`
                &limit=`1`
              ]]
            </h2>
            <p class="awards__desc">
              [[getImageList?
                &tvname=`awards`
                &tpl=`@CODE: [[+text]]`
                &limit=`1`
              ]]
            </p>
            <ul class="awards__list">
              [[getImageList? &tvname=`awards` &tpl=`@CODE:
                <li class="awards__item">
                  <picture>
                    <source
                      type="image/webp"
                      srcset="[[+image:phpthumbof=`f=webp]]"
                    />
                    <img
                      loading="lazy"
                      class="awards__image"
                      src="[[+image]]"
                      alt="urbanmyth award"
                    />
                  </picture>
                </li>
              ` ]]
            </ul>
            <a href="[[~241]]" class="awards__link button button_small">learn more</a>
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
    <script
      defer
      src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"
    ></script>
    [[$scripts? js=`homepage`]]
  </body>
</html>
