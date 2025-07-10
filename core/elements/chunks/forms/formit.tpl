[[!FormIt? 
  &hooks=`[[+no-rc:is=``:then=`rcv3,`]]FormItSaveForm,email,redirect`
  &emailUseFieldForSubject=`1`
  &emailSubject=`Email From Website` 
  &emailTo=`[[+email-to:is=``:then=`[[++email-to]]`:else=`[[+email-to]]`]]`
  &emailBCC=`[[++email-bcc]]`
  &emailFrom=`[[++emailsender]]`
  &emailReplyTo=`[[++emailsender]]`
  &redirectTo=`126`
  &validate=`name:required,email:required,accept:required`
  &emailTpl=`email-chunk`
  &submitVar=`[[+submit-var:is=``:then=`contact-form`:else=`[[+submit-var]]`]]`
  &validationErrorMessage=`The form contains errors!`
  &successMessage=`Message sent successfully`
]] 