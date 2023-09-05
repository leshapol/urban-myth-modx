<!DOCTYPE html>
<html lang="en">
  [[$head? &css=`common`]]

  <body>
    <div class="wrapper">
      [[$header]]

      <main>
        <article class="article">
          <div class="container">
            <h1 class="page-head__title">[[*pagetitle]]</h1>
            [[*content]]
          </div>
        </article>
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
