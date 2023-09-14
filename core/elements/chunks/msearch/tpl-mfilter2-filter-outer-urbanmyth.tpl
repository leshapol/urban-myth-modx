{var $key = $table ~ $delimeter ~ $filter}
<fieldset class="filters__wrapper" id="mse2_{$key}">
    <p class="filters__header">{('mse2_filter_' ~ $table ~ '_' ~ $filter) | lexicon}</p>

    <div class="filters__list">{$rows}</div>
</fieldset>