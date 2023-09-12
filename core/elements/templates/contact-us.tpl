<!DOCTYPE html>
<html lang="en">
  [[$head? &css=`contact-us`]]

  <body>
    <div class="wrapper">
      [[$header]]

      <main>
        <section class="contact">
          <div class="story__header page-head container">
            <h1 class="page-head__title">[[*pagetitle]]</h1>
            <p class="page-head__desc">[[*description]]</p>
          </div>

          <div class="contact__body container">
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
            <div class="contact__map-wrapper">
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2477.7669669421407!2d-0.03169292377639002!3d51.60915830326494!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48761e72017283c3%3A0xadf5a0e674acc213!2sUrban%20Myth!5e0!3m2!1sru!2sru!4v1694001009444!5m2!1sru!2sru"
                width="100%"
                height="100%"
                style="border: 0"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
              ></iframe>
            </div>
          </div>
        </section>

        [[$last-articles]]
      </main>

      <!-- popup's -->
      [[$popup-block? &type=`book-app`]] [[$popup-block?
      &type=`brochure-request`]]
      <!------------->
      [[$footer]]
    </div>

    [[$scripts? js=`common`]]
  </body>
</html>
