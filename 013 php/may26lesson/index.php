<?php

define('KEY', 1);

echo __DIR__;

echo 'index';
echo __DIR__ .'/kitas/vienas.php';

require __DIR__ .'/kitas/vienas.php';
require __DIR__ .'/kitas/vienas.php';
include './dar-kitas/du.php';

$data = require __DIR__ .'/kitas/data.php';

print_r($data);