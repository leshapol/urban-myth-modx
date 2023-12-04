<?php
$where = "{ ";
if(isset($_GET['style'])) {
  $where .= '"style:LIKE":"%'.$_GET['style'].'%"';
}
if(isset($_GET['colour'])) {
  $last = substr($where, -1);
  if($last == '"') {
    $where .= ', ';
  }
  $where .= '"colour:LIKE":"%'.$_GET['colour'].'%"';
}
if(isset($_GET['finish'])) {
  $last = substr($where, -1);
  if($last == '"') {
    $where .= ', ';
  }
  $where .= '"finish:LIKE":"%'.$_GET['finish'].'%"';
}
if(!isset($_GET['style']) && !isset($_GET['colour']) && !isset($_GET['finish'])) {
  $where .= '[[*tags:ne=``:then=`"tags:LIKE":"%[[*tags]]%"`]]';
}
$where .= " }";

return $where;