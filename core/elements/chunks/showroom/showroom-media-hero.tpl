[[+title:ne=``:then=`
<section class="hero hero_media">
  <div class="hero__body">
    <div class="hero__image absolute-image border-radius_right-bottom">
      <iframe
        loading="lazy"
        class=""
        src="[[+title]]"
        frameborder="0"
        allowfullscreen
        allow="xr-spatial-tracking; accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
      ></iframe>
    </div>
  </div>
</section>
`:else=`
<section class="hero hero_media">
  <div class="hero__body">
    <div class="hero__image absolute-image border-radius_right-bottom">
      <video autoplay muted loop id="myVideo">
        <source src="[[+image]]" type="video/mp4" />
      </video>
    </div>
  </div>
</section>
`]]
