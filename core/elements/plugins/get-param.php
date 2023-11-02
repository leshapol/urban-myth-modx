<?php
foreach ($_GET as $key => $val) {
  $modx->setPlaceholder('GET.'.$key, $val);
}
return '';