<!DOCTYPE html>
<html lang="en">
  [[$head? &css=`blog`]]

  <body>
    <div class="wrapper">
      [[$header]]

      <main>
        <section class="blog">
          <div class="container">
            <div class="blog__header page-head">
              <h1 class="page-head__title">[[*pagetitle]]</h1>
              <p class="page-head__desc">[[*description]]</p>
            </div>

            <div class="blog__catalog-list catalog-list">
              <ul class="catalog-list__list">
                [[pdoResources? &parents=`[[*id]]` &tpl=`category-card.tpl`
                &hideContainers=`1` &includeTVs=`category-img,blog-tags`
                &prepareTVs=`1` &isblog=`1` ]]
              </ul>
              <div class="catalog-list__button-wrap">
                <a
                  href="newsletter"
                  class="catalog-list__button button _popup-link"
                  >JOIN OUR NEWSLETTER</a
                >
              </div>
            </div>

            <!-- <button class="blog__button-more button">LOAD MORE</button> -->
          </div>
        </section>
        [[$last-articles]]
      </main>

      <!-- popup's -->
      [[$popup-block? &type=`book-app`]] [[$popup-block? &type=`newsletter`]]
      <!------------->
      [[$footer]]
    </div>

    [[$scripts? js=`blog`]]
  </body>
</html>
