<?php
session_start();

error_reporting(-1);
ini_set('display_errors', 'On');


date_default_timezone_set('Asia/Tehran');
global $config;
require_once('config.php');
require_once('system/common.php');
require_once('system/db.php');
require_once('system/view.php');




spl_autoload_register(function ($classname) {
    if (str_has($classname, "Model")) {
        $filename = str_replace('Model', '', $classname);
        $fullpath = "mvc/model/$filename.php";
        if (!file_exists($fullpath)) {
            err404();
        }
        require_once $fullpath;
    }


    if (str_has($classname, "Controller")) {
        $filename = str_replace('Controller', '', $classname);
        $fullpath = "mvc/controller/$filename.php";
        if (!file_exists($fullpath)) {
            err404();
        }
        require_once $fullpath;
    }

});