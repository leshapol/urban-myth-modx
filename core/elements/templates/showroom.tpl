<!DOCTYPE html>
<html lang="en">
  [[$head? &css=`showroom`]]

  <body>
    <div class="wrapper">
      [[$header]]

      <main>
        <section class="top">
          <div class="page-head container">
            <h1 class="page-head__title">[[*pagetitle]]</h1>
            <p class="page-head__desc page-head__desc_small">[[*introtext]]</p>
          </div>
        </section>
        
        [[getImageList? &tvname=`sections` &tpl=`sections-list` ]]

        [[$last-articles]]
      </main>
      <!-- popup's -->
      [[$popup-block? &type=`book-app`]] [[$popup-block?
      &type=`brochure-request`]] [[$popup-block? &type=`newsletter`]]
      [[$popup-block? &type=`filters`]]
      <!------------->
      [[$footer]]
    </div>
    <script
      defer
      src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"
    ></script>
    [[$scripts? js=`showroom`]]
  </body>
</html>
