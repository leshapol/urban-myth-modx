<li class="gallery__item">
  <a
    target="_blank"
    class="slider__popup thumbnail"
    data-title="[[+title]]"
    data-lightbox="carusel"
    href="[[+image:phpthumbof=`h=800`]]"
  >
    <div class="gallery__image-gallery">
      <picture>
        <source
          type="image/webp"
          media="(min-width: 1920px)"
          data-srcset="[[+image:phpthumbof=`w=1200&h=800&zc=1&f=webp`]]"
          srcset="
            data:image/gif;base64,R0lGODlhIwAWAIAAAP///wAAACH5BAEAAAEALAAAAAAjABYAAAIajI+py+0Po5y02ouz3rz7D4biSJbmiaZqWAAAOw==
          "
        />
        <source
          type="image/webp"
          data-srcset="[[+image:phpthumbof=`w=700&h=440&zc=1&f=webp`]]"
          srcset="
            data:image/gif;base64,R0lGODlhIwAWAIAAAP///wAAACH5BAEAAAEALAAAAAAjABYAAAIajI+py+0Po5y02ouz3rz7D4biSJbmiaZqWAAAOw==
          "
        />
        <img
          loading="lazy"
          class="lazyload"
          src="data:image/gif;base64,R0lGODlhIwAWAIAAAP///wAAACH5BAEAAAEALAAAAAAjABYAAAIajI+py+0Po5y02ouz3rz7D4biSJbmiaZqWAAAOw=="
          data-srcset="[[+image:phpthumbof=`w=700&h=440&zc=1`]]"
          alt="[[+title]]"
          width="700"
          height="440"
        />
      </picture>
    </div>
  </a>
</li>
