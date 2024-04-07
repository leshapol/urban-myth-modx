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

            <div class="blog__catalog-list catalog-list" id="pdopage">
              [[!+page.nav]]
              <ul class="catalog-list__list rows" >
                [[!pdoPage? 
                  &limit=`12` 
                  &parents=`[[*id]]` 
                  &tpl=`category-card.tpl`
                  &hideContainers=`1` 
                  &includeTVs=`category-img,blog-tags`
                  &prepareTVs=`1` 
                  &ajaxMode=`button`
                  &ajaxTplMore=`@INLINE <button class="blog__button-morebutton button_long button_center">LOAD MORE</button>`
                  &sortby=`menuindex`
                  &sortdir=`ASC`
                ]]
                [[*newsletter:is=`1`:then=`
                <div class="catalog-list__button-wrap">
                  <a
                    href="newsletter"
                    class="button_long button _popup-link"
                    >JOIN OUR NEWSLETTER</a
                  >
                </div>
                [[$popup-block? &type=`newsletter`]]
                `]]
              </ul>
              
              
            </div>

            
          </div>
        </section>
        [[$last-articles]]
      </main>

      <!-- popup's -->
      [[$popup-block? &type=`book-app`]]  [[$popup-block?
      &type=`brochure-request`]]
      <!------------->
      [[$footer]]
    </div>

    [[$scripts? js=`blog`]]
  </body>
</html>
