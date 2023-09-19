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
              <p class="page-head__desc_small">[[*description]]</p>
            </div>
            <a href="filters" class="catalog__filter-button button button_long _popup-link">
              Filter
            </a>

            [[!mFilter2? 
              &filters=`tv|tags, tv|style, tv|colour, tv|shape, tv|finish, tv|case-study:boolean`
              &aliases=`tv|tags==tags, tv|style==style, tv|colour==colour, tv|shape==shape, tv|finish==finish, tv|case-study:boolean==case-study`
              &element=`pdoResources`
              &paginator'=`pdoPage`,
              &limit=`12` 
              &parents=`3` 
              &tpl=`category-card.tpl`
              &hideContainers=`1` 
              &includeTVs=`category-img,hero-img,tags`
              &prepareTVs=`1`
              &ajaxMode=`button`
              &ajaxTplMore=`@INLINE <button class="blog__button-more button button_more btn-more">LOAD MORE</button>`
              &tplOuter=`tpl.mFilter2.outer.Urbanmyth`
              &tplFilter.outer.default=`tpl.mFilter2.filter.outer.Urbanmyth`
              &tplFilter.row.default=`tpl.mFilter2.filter.checkbox.Urbanmyth`
            ]]

            

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

    [[$scripts? js=`kitchens`]]
  </body>
</html>
