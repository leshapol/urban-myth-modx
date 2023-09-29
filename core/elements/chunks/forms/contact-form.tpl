[[!+fi.validation_error_message:notempty=`<p>[[!+fi.validation_error_message]]</p>`]]

<form action="[[~[[*id]]]]" class="popup__form form" method="post">
  [[+subject:ne=`0`:then=`
    [[+text-subject:is=`1`:then=`
      <label class="form__label"
        >Subject:
        <input type="text" name="subject" class="form__input" value="[[+fi.subject]]"/>
      </label>
      `:else=`
      <label class="form__label form__label_select"
        >Subject:

        <select class="_select" name="subject">
          <option value="">Select an option...</option>
          <option>New Kitchen Enquiry</option>
          <option>Additions to an Urban Myth Kitchen</option>
          <option>Customer Support</option>
          <option>General Enquiry</option>
        </select>
      </label>
      `]]
  `]]  

  <label class="form__label"
    >Name:
    <input type="text" name="name" class="form__input" value="[[+fi.name]]"/>
  </label>
  <label class="form__label"
    >Email:
    <input type="email" name="email" class="form__input" value="[[+fi.email]]" required/>
  </label>
  <label class="form__label"
    >Tel:
    <input type="tel" name="phone" class="form__input" value="[[+fi.phone]]"/>
  </label>
  <label class="form__label"
    >Message:
    <textarea name="message" class="form__input form__input_high">[[+fi.message]]</textarea>
  </label>
  <div class="form__privacy">
    <div class="form__privacy-caption">Privacy</div>
    <label class="form__label-privacy">
      <input type="checkbox" name="accept" value="I accept the privacy policy" class="form__input-checkbox" required/>
      <span>I have read and accept the Urban Myth <a href="[[~22]]" target="_blank">Privacy Policy</a></span>
    </label>
  </div>
  <input type="submit" name="[[+submit-var:is=``:then=`contact-form`:else=`[[+submit-var]]`]]" class="form__submit button" value="Send"/>
</form>
