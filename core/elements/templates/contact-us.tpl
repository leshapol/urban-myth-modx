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
            <div>
              [[$formit]] [[$contact-form]]
              <div class="contact__big-title">
                <h2>Showroom Opening hours</h2>
                <div class="contact__text-block">
                  <p>Monday to Friday 9 - 5pm & evenings by appointment</p>
                  <p>Saturday 10 - 3pm</p>
                  <p>Closed Sundays & Bank holidays</p>
                </div>
              </div>
            </div>
            <div class="contact__map-wrapper">
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2083.5523827611723!2d-0.029548595129832496!3d51.609005295533606!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48761e72017283c3%3A0xadf5a0e674acc213!2sUrban%20Myth!5e0!3m2!1sen!2sru!4v1700074004489!5m2!1sen!2sru"
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
