<div class="popup__title">Book an appointment</div>
<div class="popup__text">
  Send us an email or call
  <span class="popup__text_bold"> 020 8531 3413 </span>
</div>
<form class="popup__form form">
  <label class="form__label form__label_select"
    >Subject:

    <select class="_select" name="subject">
      <option></option>
      <option>Value 1</option>
      <option>Value 2</option>
      <option>Value 3</option>
      <option>Value 4</option>
    </select>
  </label>

  <label class="form__label"
    >Name:
    <input type="text" name="name" class="form__input" />
  </label>
  <label class="form__label"
    >Email:
    <input type="email" name="email" class="form__input" />
  </label>
  <label class="form__label"
    >Tel:
    <input type="tel" name="phone" class="form__input" />
  </label>
  <label class="form__label"
    >Message:
    <textarea name="message" class="form__input form__input_high"></textarea>
  </label>
  <div class="form__privacy">
    <div class="form__privacy-caption">Privacy</div>
    <label class="form__label-privacy">
      <input type="checkbox" name="accept" class="form__input-checkbox" />
      I have read and accept the Urban Myth Privacy Policy
    </label>
  </div>
  <button type="submit" class="form__submit button">send</button>
</form>
