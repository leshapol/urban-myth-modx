<div class="kitchens__block">
  <div class="container">
    <div
      class="kitchens__text-block position_[[+text-position-vertical]] position_[[+text-position-horizontal]] [[+text-color:is=`white`:then=`white-color`]]"
    >
      <h3 class="kitchens__title section-title">[[+title]]</h3>
      <div class="kitchens__text section-text">[[+description]]</div>
    </div>
    
    [[+button-text:ne=``:then=`
    <a
      href="[[+button-link]]"
      class="kitchens__button circle-button circle-button_[[+button-position-vertical]] circle-button_[[+button-position-horizontal]] [[+popup-link:is=`yes`:then=`_popup-link`]]"
    >
      [[+button-text]]
    </a>
    `]]
  </div>

  <div
    class="kitchens__image kitchens__border-radius absolute-image border-radius_[[+border-radius]]"
  >
    <picture>
      <source 
        type="image/webp" 
        media="(min-width: 425px)" 
        srcset="[[+image:phpthumbof=`f=webp`]]"
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

  [[+button-text:ne=``:then=`
  <div class="kitchens__button-mobile">
    <a href="[[+button-link]]" class="button [[+popup-link:is=`yes`:then=`_popup-link`]]" target="_blank">
      [[+button-text]]
    </a>
  </div>
  `]]
</div>
