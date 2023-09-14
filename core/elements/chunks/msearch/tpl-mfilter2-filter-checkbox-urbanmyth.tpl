{var $key = $table ~ $delimeter ~ $filter}
<label for="mse2_{$key}_{$idx}" class="filters__label {$disabled}">
    <input type="checkbox" class="filters__input" name="{$filter_key}" id="mse2_{$key}_{$idx}" value="{$value}" {$checked} {$disabled}/>
    <span class="filters__item">{$title}<sup class="filters__counter">{$num}</sup></span>
</label><br/>