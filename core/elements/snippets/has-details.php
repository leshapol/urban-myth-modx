<?php
$style=$modx->resource->getTVValue('details-style');
$finishes=$modx->resource->getTVValue('details-finishes');
$appliances=$modx->resource->getTVValue('details-appliances');

if ($style || $finishes || $appliances) {
  return 1;
}