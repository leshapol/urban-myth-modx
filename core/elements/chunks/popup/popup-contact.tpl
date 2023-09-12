<p class="popup__title">Contact us</p>
<p class="popup__text">
  Send us an email or call
  <span class="popup__text_bold"> 020 8531 3413 </span>
</p>
[[!FormIt? 
  &hooks=`spam,FormItSaveForm,email,redirect`
  &emailUseFieldForSubject=`1`
  &emailSubject=`Email From Website` 
  &emailTo=`webadmin@urbanmyth.net,nancy@urbanmyth.net`
  &emailFrom=`website@urbanmyth.net`
  &redirectTo=`126`
  &validate=`name:required,email:required,accept:required`
  &emailTpl=`email-chunk`
  &submitVar=`contact-form`
  &validationErrorMessage=`The form contains errors!`
  &successMessage=`Message sent successfully`
]] 
[[$contact-form]]
