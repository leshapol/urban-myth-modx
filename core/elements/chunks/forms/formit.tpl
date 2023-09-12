[[!FormIt? 
  &hooks=`spam,FormItSaveForm,email,redirect`
  &emailUseFieldForSubject=`1`
  &emailSubject=`Email From Website` 
  &emailTo=`[[++email-to]]`
  &emailFrom=`[[++emailsender]]`
  &redirectTo=`126`
  &validate=`name:required,email:required,accept:required`
  &emailTpl=`email-chunk`
  &submitVar=`[[+submit-var:is=``:then=`contact-form`:else=`[[+submit-var]]`]]`
  &validationErrorMessage=`The form contains errors!`
  &successMessage=`Message sent successfully`
]] 