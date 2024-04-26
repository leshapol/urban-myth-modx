<section class="hero">
  <div class="hero__body">
    <div class="hero__image absolute-image border-radius_right-bottom">
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
        <img src="[[+image]]" alt="[[*pagetitle]]" />
      </picture>
    </div>
    <div class="container">
      <div class="hero__text-block hero__text-block_[[+position-horizontal]]">
        <h2 class="hero__title">[[+title]]</h2>
        <div class="hero__text">[[+description]]</div>
      </div>
    </div>
  </div>
</section>
