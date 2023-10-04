<div class="kitchens__block">
  <div class="container">
    <div
      class="kitchens__text-block position_[[+text-position-vertical]] position_[[+text-position-horizontal]] [[+text-color:is=`white`:then=`white-color`]]"
    >
      <h3 class="kitchens__title section-title">[[+title]]</h3>
      <p class="kitchens__text section-text">[[+description]]</p>
    </div>
    
    [[+button-text:ne=``:then=`
    <a
      href="[[+button-link]]"
      class="kitchens__button circle-button circle-button_[[+button-position-vertical]] circle-button_[[+button-position-horizontal]]"
    >
      [[+button-text]]
    </a>
    `]]
  </div>

  <div
    class="kitchens__image kitchens__border-radius absolute-image border-radius_[[+border-radius]]"
  >
    <picture>
      <source srcset="[[+image:phpthumbof=`f=webp]]" type="image/webp" />
      <img src="[[+image]]" alt="[[+title]]" />
    </picture>
  </div>

  [[+button-text:ne=``:then=`
  <div class="kitchens__button-mobile">
    <a href="[[+button-link]]" class="button" target="_blank">
      [[+button-text]]
    </a>
  </div>
  `]]
</div>
