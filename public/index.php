<?php
require_once __DIR__ . "/../webInit.php";

list($action) = explode('?', $_SERVER['REQUEST_URI']);
$action = substr($action, 1);

App__run($action);
