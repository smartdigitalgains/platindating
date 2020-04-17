<?php

session_start();

ini_set('display_errors',1);
ini_set('max_execution_time', 0);
error_reporting(E_ALL|E_STRICT);

require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/c0r3/c0r3.php';

Core::load();

( new Core\Router() )->route();

?>
