[[!+fi.validation_error_message:notempty=`
<p>[[!+fi.validation_error_message]]</p>
`]]

<form action="[[~[[*id]]]]" class="popup__form form" method="post">
  [[+subject:ne=`0`:then=` [[+text-subject:is=`1`:then=`
  <label class="form__label">
    <input
      type="text"
      name="subject"
      class="form__input"
      value="[[+fi.subject]]"
    />
  </label>
  `:else=`
  <label class="form__label form__label_select">
    <select class="_select" name="subject">
      <option value="">Subject (Select)</option>
      <option>New Kitchen Enquiry</option>
      <option>Additions to an Urban Myth Kitchen</option>
      <option>Customer Support</option>
      <option>General Enquiry</option>
    </select>
  </label>
  `]] `]]
  <input name="form_name" type="hidden" value="ContactPage" />
  <label class="form__label">
    <input
      type="text"
      name="name"
      class="form__input"
      value="[[+fi.name]]"
      placeholder="Name"
      required
    />
  </label>
  <label class="form__label">
    <input
      type="email"
      name="email"
      class="form__input"
      value="[[+fi.email]]"
      placeholder="Email"
      required
    />
  </label>
  <label class="form__label">
    <input
      type="tel"
      name="phone"
      class="form__input"
      value="[[+fi.phone]]"
      placeholder="Telephone"
      required
    />
  </label>
  <label class="form__label">
    <textarea
      name="message"
      placeholder="Message"
      class="form__input form__input_high"
    >
[[+fi.message]]</textarea
    >
  </label>
  <div class="form__subscribe">
    <label class="form__label-privacy">
      <input
        type="checkbox"
        name="subscribe"
        value="Yes please, keep me updated with the latest news and events at Urban Myth"
        class="form__input-checkbox"
      />
      <span
        >Yes please, keep me updated with the latest news and events at Urban
        Myth</span
      >
    </label>
  </div>
  <div class="form__privacy">
    <label class="form__label-privacy">
      <input
        type="checkbox"
        name="accept"
        value="I accept the privacy policy"
        class="form__input-checkbox"
        required
      />
      <span
        >I have read and accept the Urban Myth
        <a href="[[~22]]" target="_blank">Privacy Policy</a></span
      >
    </label>
  </div>

  <input
    type="submit"
    name="[[+submit-var:is=``:then=`contact-form`:else=`[[+submit-var]]`]]"
    class="form__submit button button_medium button_small"
    value="Send"
  />

  [[!rcv3_html? &action=`[[+rcv3Action:default=``]]`
  &error=`[[+fi.error.g-recaptcha-response]]`]]
</form>
