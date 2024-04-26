<section class="full-image">
  <div class="full-image__body">
    <div class="full-image__image-block">
      <div
        class="full-image__image full-image__border-radius absolute-image border-radius_left-bottom"
      >
        <picture>
          <source
            srcset="[[+image:phpthumbof=`f=webp]]"
            media="(min-width: 425px)"
            type="image/webp"
          />
          [[+image-mobile:isnot=``:then=`
          <source
            srcset="[[+image-mobile:phpthumbof=`f=webp`]]"
            type="image/webp"
          />
          `:else=`
          <source
            srcset="[[+image-mobile=`&w=600&h=720&zc=1&f=webp`]]"
            type="image/webp"
          />
          `]]
          <img src="[[+image]]" alt="[[+title]]" />
        </picture>
      </div>
      <div class="container">
        <div
          class="full-image__text-block position_[[+position-vertical]] position_[[+position-horizontal]] [[+text-color:is=`white`:then=`white-color`]]"
        >
          [[+title:ne=``:then=`
          <p class="full-image__title">[[+title]]</p>
          `]]
          <p class="full-image__text">[[+description]]</p>
        </div>
      </div>
    </div>
  </div>
</section>
