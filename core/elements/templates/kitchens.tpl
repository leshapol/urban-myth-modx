<!DOCTYPE html>
<html lang="en">
  [[$head? &css=`kitchens`]]

  <body>
    <div class="wrapper">
      [[$header]]

      <main>
        <section class="catalog">
          <div class="container">
            <div class="catalog__header page-head">
              <h1 class="page-head__title">[[*pagetitle]]</h1>
              <p class="page-head__desc">[[*description]]</p>
            </div>
            <a href="filters" class="catalog__modal-open _popup-link">
              <span class="filters__current">filter</span>
            </a>

            <div class="catalog__catalog-list catalog-list">
              <ul class="catalog-list__list">
                [[pdoResources? &parents=`[[*id]]` &tpl=`category-card.tpl`
                &hideContainers=`1` &includeTVs=`category-img,hero-img,tags`
                &prepareTVs=`1`]]
                <div class="catalog-list__button-wrap">
                  <a
                    href="newsletter"
                    class="catalog-list__button button _popup-link"
                    >JOIN OUR NEWSLETTER</a
                  >
                </div>
              </ul>
            </div>

            <!-- <button class="catalog__button-more button">LOAD MORE</button> -->
          </div>
        </section>
        [[$last-articles]]
      </main>

      <!-- popup's -->
      [[$popup-block? &type=`book-app`]] [[$popup-block? &type=`newsletter`]] [[$popup-block?
      &type=`brochure-request`]]
      [[$popup-block? &type=`filters`]]
      <!------------->
      [[$footer]]
    </div>

    [[$scripts? js=`kitchens`]]
  </body>
</html>
