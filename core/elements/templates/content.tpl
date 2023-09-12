<!DOCTYPE html>
<html lang="en">
  [[$head? &css=`content`]]

  <body>
    <div class="wrapper">
      [[$header]]

      <main>
        <article class="article">
          <div class="article__top-line container">
            <p class="article__category">
              <a href="[[~[[*parent]]]]">[[#[[*parent]].pagetitle]]</a>
            </p>
            <ul class="article__tags tags">
              [[!toLinks?
              &items=`[[*blog-tags:is=``:then=`[[*tags]]`:else=`[[*blog-tags]]`]]`
              &tagKey=`[[*blog-tags:is=``:then=`tags`:else=`blog-tags`]]`
              &tpl=`tag.tpl` &target=`127`
              &outputDelim=`` ]]
            </ul>
          </div>
          <div class="article__header page-head container">
            <h1 class="page-head__title">[[*pagetitle]]</h1>
            <p class="page-head__desc">[[*description]]</p>
          </div>

          <div class="article__image">
            <div class="hero__image absolute-image border-radius_right-bottom">
              <picture>
                <source
                  srcset="[[*hero-img:phpthumbof=`f=webp]]"
                  type="image/webp"
                />
                <img src="[[*hero-img]]" alt="[[*pagetitle]]" />
              </picture>
            </div>
          </div>

          <div class="article__main container">
            <div class="article__text-block">[[*content]]</div>

            <div class="article__footer">
              [[*blog-tags:ne=``:then=``:else=`
              <div class="article__details">
                <div class="article__details-title">Details:</div>
                <dl class="article__details-list">
                  [[*style:notempty=`
                  <div class="article__details-wrap">
                    <dt class="article__details-subtitle">Style:</dt>
                    <dd class="article__details-desc">[[*style]]</dd>
                  </div>
                  `]] [[*finish:notempty=`
                  <div class="article__details-wrap">
                    <dt class="article__details-subtitle">Finish:</dt>
                    <dd class="article__details-desc">[[*finish]]</dd>
                  </div>
                  `]] [[*colour:notempty=`
                  <div class="article__details-wrap">
                    <dt class="article__details-subtitle">Colour:</dt>
                    <dd class="article__details-desc">[[*colour]]</dd>
                  </div>
                  `]] [[*shape:notempty=`
                  <div class="article__details-wrap">
                    <dt class="article__details-subtitle">Shape:</dt>
                    <dd class="article__details-desc">[[*shape]]</dd>
                  </div>
                  `]]

                  <!-- <div class="article__details-wrap">
                    <dt class="article__details-subtitle">Fittings:</dt>
                    <dd class="article__details-desc">
                      Blum Handles and Fankle Basin
                    </dd>
                  </div>
                  <div class="article__details-wrap">
                    <dt class="article__details-subtitle">Appliances:</dt>
                    <dd class="article__details-desc">
                      Smeg Oven and hob, Quooker Tap
                    </dd>
                  </div> -->
                </dl>
              </div>
              `]]

              <a href="#" class="article__share">Share</a>
            </div>
          </div>
        </article>

        [[$last-articles]]
      </main>
      <!-- popup's -->
      [[$popup-block? &type=`book-app`]] [[$popup-block?
      &type=`brochure-request`]]
      <!------------->
      [[$footer]]
    </div>

    [[$scripts? js=`content`]]

    <script
      defer
      src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"
    ></script>
    <script
      defer
      src="https://mreq.github.io/slick-lightbox/dist/slick-lightbox.js"
    ></script>
  </body>
</html>
