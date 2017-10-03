<?php

$controllerName = "posts";
$action = "all";
$controllersPath = 'controllers/';
$modelsPath = 'models/';

$requestURI = $_SERVER['REQUEST_URI'];
$routes = explode('/', str_replace(array($_SERVER['HTTP_HOST'],$siteName),'',$requestURI));
   
if( sizeof($routes) > 0 && $routes[0]){
    $controllerName = $routes[0];
}
    
if( sizeof($routes) > 1 && $routes[1]){
    $action = $routes[1];
}

$modelName = $controllerName;
$controllerPath = $controllersPath.$controllerName.'.php';
$modelPath = $modelsPath.$modelName.'.php';

if(file_exists($modelPath)){
    require_once ($modelPath);
}else{
    $modelPath = $modelsPath.'posts'.'.php';
    require_once ($modelPath);
}

if(file_exists($controllerPath)){
    require_once ($controllerPath);
}else{
    $controllerName = "posts";
    $action = "all";
    $controllerPath = $controllersPath.$controllerName.'.php';
    require_once ($controllerPath);
}

$controllerName = $controllerName."Controller";
$controller = new $controllerName;

if(method_exists($controller, $action)){
    $controller->$action();
}