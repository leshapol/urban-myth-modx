<li class="catalog-list__item card">
  <div class="card__image">
    <a href="[[+uri]]?[[!+GET.style:not=``:then=`style=[[+GET.style]]`]]">
      <picture>
        <source
          type="image/webp"
          data-srcset="[[+tv.category-img:phpthumbof=`w=420&h=420&zc=1&f=webp`]]"
          srcset="
            data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAEALAAAAAABAAEAAAICTAEAOw==
          "
        />
        <img
          loading="lazy"
          class="lazyload"
          src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAEALAAAAAABAAEAAAICTAEAOw=="
          data-srcset="[[+tv.category-img:phpthumbof=`w=420&h=420&zc=1`]]"
          alt="[[+pagetitle]]"
          width="420"
          height="420"
        />
      </picture>
    </a>
  </div>
  <div class="card__body">
    <h3 class="card__title">
      <a href="[[+uri]]">[[+pagetitle]]</a>
    </h3>
    <ul class="card__tags tags">
      [[+tv.blog-tags:notempty=`[[!toLinks?
      &items=`[[+tv.blog-tags]]` &tagKey=`blog-tags`
      &target=`127` &tpl=`tag.tpl` &outputDelim=`` ]]`]]

      [[+tv.tags:notempty=`[[!toLinks?
      &items=`[[+tv.tags]]` &tagKey=`tags`
      &target=`127` &tpl=`tag.tpl` &outputDelim=`` ]]`]]
    </ul>
  </div>
  <div class="card__text">[[+description]]</div>
</li>
