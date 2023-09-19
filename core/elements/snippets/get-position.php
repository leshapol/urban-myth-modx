<?php
$vertical = empty($vertical) ? 'bottom' : $vertical ;
$horizontal = empty($horizontal) ? 'left' : $horizontal;

$positions = $modx->runSnippet('getImageList', array(
  'tvname' => 'positions',
  'tpl' => '@CODE: position_[[+position-horizontal]] position_[[+position-vertical]]',
  'where' => '{"section:=":"'.$section.'"}',
));

if(empty($positions)) $positions = "position_$vertical position_$horizontal";

echo $positions;