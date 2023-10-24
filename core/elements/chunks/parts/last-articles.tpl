<section class="last-articles">
  <div class="container">
    <div class="last-articles__body">
      <div class="last-articles__text-block">
        <h2 class="last-articles__title">[[+type:is=`kitchen`:then=`We also recommend`:else=`Urban Blog`]]</h2>
        <p class="last-articles__subtitle">
          [[+type:is=`kitchen`:then=`Similar design inspiration`:else=`Be inspired by our latest kitchen, lifestyle and design news and trends`]]
        </p>
      </div>
      <ul class="last-articles__list">
        [[+type:is=`kitchen`:then=`
        [[pdoResources? 
          &parents=`3` 
          &resources=`-[[*id]]`
          &tpl=`last-articles-item.tpl`
          &hideContainers=`1` 
          &includeTVs=`category-img,tags` 
          &prepareTVs=`1`
          &tvFilters=`[[*tags:ne=``:then=`tags==[[*tags]]`]]`
          &prepareTVs=`1`
          &limit=`8`
        ]]
        `:else=`
        [[pdoResources? 
          &parents=`4` 
          &resources=`-[[*id]]`
          &tpl=`last-articles-item.tpl`
          &hideContainers=`1` 
          &includeTVs=`category-img` 
          &prepareTVs=`1`
          &limit=`8`
        ]]
        `]]        
      </ul>
    </div>
  </div>
</section>
