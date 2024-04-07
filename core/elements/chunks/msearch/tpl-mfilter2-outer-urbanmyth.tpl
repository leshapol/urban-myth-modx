<div class="catalog__filter" id="mse2_mfilter">

    <div class="popup popup_filters">
        <div class="popup__content">
            <div class="popup__body">
            <div class="popup__close popup__close-cross">×</div>
            <p class="popup__title">Filters</p>
            <form class="filters" action="{$_modx->resource.id | url}" method="post" id="mse2_filters">
                <div class="filters__body">
                    {$filters}
                </div>
                {if $filters}
                <div class="filters__button-container">
                    <button type="reset" class="filters__button button button_medium">{'mse2_reset' | lexicon}</button>
                    <button type="submit" class="filters__button button button_medium">{'mse2_submit' | lexicon}</button>
                    <a class="filters__button button button_medium _popup-close">Apply</a>
                </div>
                {/if}
            </form>
            </div>
        </div>
    </div>


    <div class="catalog__catalog-list catalog-list" id="pdopage">
        <div id="mse2_selected_wrapper" class="catalog__selected-wrapper">
            <!--<p>{'mse2_filter_total' | lexicon} <span id="mse2_total">{$total ?: 0}</span></p>-->
            <div id="mse2_selected" class="catalog__selected filter-list">
                {'mse2_selected' | lexicon}:<span></span>
            </div>
        </div>
        
        <ul id="mse2_results" class="catalog-list__list rows">
            {$results}
            <div class="catalog-list__button-wrap">
            <a
                href="newsletter"
                class="button_long button _popup-link"
                >JOIN OUR NEWSLETTER</a
            >
            </div>
        </ul>

        <div class="mse2_pagination">
            {'page.nav' | placeholder}
        </div>
    </div>
</div>