<section class="form-section">
  <div class="form-section__body container">
    <div class="form-section__text-block">
      <h2 class="form-section__title section-title">[[+title]]</h2>
      <div class="form-section__description section-text">[[+description]]</div>
    </div>
    <div class="form-section__form-block">
      [[+form:is=`brochure`:then=`[[$brochure-form]]`]]
      [[+form:is=`contact`:then=`[[$contact-form? &submit-var=`book-form` &formname=`section-contact-form`]]`]]
      [[+form:is=`newsletter`:then=`[[$newsletter-form]]`]]
      [[+form:is=`style-download`:then=`[[$style-download-form]]`]]
    </div>
  </div>
</section>
