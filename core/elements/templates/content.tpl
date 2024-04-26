<!DOCTYPE html>
<html lang="en">
  [[$head? &css=`content`]]

  <body>
    <div class="wrapper">
      [[$header]]

      <main>
        <article class="article">
          <div class="article__top-line container">
            <a class="article__category" href="[[~[[*parent]]]]">
              [[#[[*parent]].pagetitle]]
            </a>
            <ul class="article__tags tags">
              [[!toLinks?
              &items=`[[*blog-tags:is=``:then=`[[*tags]]`:else=`[[*blog-tags]]`]]`
              &tagKey=`[[*blog-tags:is=``:then=`tags`:else=`blog-tags`]]`
              &tpl=`tag.tpl` &target=`127`
              &outputDelim=`` ]]
            </ul>
          </div>
          <div class="article__header page-head page-head_content container">
            <h1 class="page-head__title">[[*pagetitle]]</h1>
            <p class="page-head__desc">[[*description]]</p>
          </div>

          <div class="article__image">
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

          <div class="article__main container">
            <div class="article__text-block">[[*content]]</div>

            <div class="article__footer">
              [[!has-details:is=`1`:then=`
              <div class="article__details">
                <p class="article__details-title">Details:</p>
                <dl class="article__details-list">
                  [[*details-style:notempty=`
                    <dt class="article__details-subtitle">Style:</dt>
                    <dd class="article__details-desc">[[*details-style]]</dd>
                  `]] [[*details-finishes:notempty=`
                    <dt class="article__details-subtitle">Finishes:</dt>
                    <dd class="article__details-desc">[[*details-finishes]]</dd>
                  `]] [[*details-appliances:notempty=`
                    <dt class="article__details-subtitle">Appliances:</dt>
                    <dd class="article__details-desc">[[*details-appliances]]</dd>
                  `]] 
                </dl>
              </div>
              `]]

              <!--<a href="#" class="article__share">Share</a>-->
            </div>
          </div>
        </article>
        [[*parent:is=`3`:then=`
        [[$last-articles? &type=`kitchen`]]`:else=`
        [[$last-articles]]`]]
        
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
