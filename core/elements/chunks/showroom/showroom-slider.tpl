<section class="slider">
  <div class="container">
    <div class="slider__body">
      <div class="slider__text-block">
        <h2 class="slider__title">[[+title]]</h2>
        <ul class="slider__text">
          [[+description]]
        </ul>
      </div>
      <div class="slider__slider">
        <button
          class="slider__arrow slider__arrow_before"
          type="button"
        ></button>
        <button
          class="slider__arrow slider__arrow_after"
          type="button"
        ></button>
        <div class="slider__images">
          [[getImageList? &tvname=`slider` &tpl=`showroom-slider-img.tpl` ]]
        </div>
        <div class="slider__dots">
          [[getImageList? &tvname=`slider` &tpl=`showroom-slider-dot.tpl` ]]
        </div>
      </div>
    </div>
  </div>
</section>
