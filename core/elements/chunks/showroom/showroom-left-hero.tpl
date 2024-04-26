<section class="hero-left">
  <div class="hero-left__body container">
    <div class="hero-left__image">
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
    <div class="hero-left__text-block">
      <h2 class="hero-left__title">[[+title]]</h2>
      <div class="hero-left__text">[[+description]]</div>
    </div>
  </div>
</section>
