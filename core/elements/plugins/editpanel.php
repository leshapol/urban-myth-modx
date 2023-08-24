<?php
if ($modx->event->name == 'OnWebPagePrerender') {
    //$special_info_right = $modx->getOption('special_info_right');
    if (!$modx->user->isMember(array('Administrator'))) {
        return;
    }
    $edit_link = '';   

    $html = '
        <ul id="editPanel">
            <li><a class="editButton edit_page" href="' . MODX_MANAGER_URL . 'index.php?a=resource/update&id=' . $modx->resource->id . '" target="_blank"><span>Edit page</span></a></li>
            <li><a class="editButton edit_template" href="' . MODX_MANAGER_URL . 'index.php?a=element/template/update&id=' . $modx->resource->template . '" target="_blank"><span>Edit template</span></a></li>
				</ul>';


    $source = $modx->resource->_output;
    $result = str_replace('</body>', $html.'</body>', $source);
    $modx->resource->_output = $result;
}