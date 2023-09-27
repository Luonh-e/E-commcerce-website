<?php
define('_DIR_ROOT', __DIR__);

//Xử lý http root
if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] = 'on') {
    $web_root = 'https://' .$_SERVER['HTTP_HOST'];
} else {
    $web_root = 'http://' .$_SERVER['HTTP_HOST'];
}

$folder =str_replace(strtolower($_SERVER['DOCUMENT_ROOT']), '', strtolower(_DIR_ROOT));

$web_root = $web_root.$folder;

define('_WEB_ROOT', $web_root);

// config
require_once 'configs/routes.php';
require_once 'configs/database.php';
require_once 'configs/app.php';
// 
require_once 'core/Route.php';
require_once 'app/App.php';
if (!empty($config['database'])) {
    $db_config = array_filter($config['database']);
    if (!empty ($db_config)) {
        require_once 'core/Connection.php';
        require_once 'core/Database.php';
    }
}

require_once 'core/Model.php';
require_once 'core/Controller.php'; 