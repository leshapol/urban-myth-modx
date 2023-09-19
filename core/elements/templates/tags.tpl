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
              <p class="page-head__desc_small">[[*description]]</p>
            </div>

            <div class="blog__catalog-list catalog-list">
              <ul class="catalog-list__list rows" >
                [[!getResourcesTag? 
                  &element=`pdoResources`
                  &parents=`3,4` 
                  &tpl=`category-card.tpl`
                  &hideContainers=`1` 
                  &includeTVs=`category-img,blog-tags`
                  &prepareTVs=`1` 
                ]]
              </ul>
            </div>
          </div>
        </section>
        [[$last-articles]]
      </main>

      <!-- popup's -->
      [[$popup-block? &type=`book-app`]] [[$popup-block? &type=`newsletter`]] [[$popup-block?
      &type=`brochure-request`]]
      <!------------->
      [[$footer]]
    </div>

    [[$scripts? js=`blog`]]
  </body>
</html>
