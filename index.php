<?php

require_once('system/loader.php');
$uri = request_uri();


$parts = explode('/', $uri);
$controller = $parts[1];
$method="index";
if (isset($parts[2]) && strlen($parts[2])>0){
    $method = $parts[2];
}
if ($controller==""){
    $controller="main";

}

$params = array();
for ($i = 3; $i < count($parts); $i++) {
    $params[] = $parts[$i];
}


$controllerClassname = ucfirst($controller) . 'Controller';
$controllerClassname=str_replace("-","_",$controllerClassname);
$controllerInstance=new $controllerClassname();
call_user_func_array(array($controllerInstance,$method),$params);

