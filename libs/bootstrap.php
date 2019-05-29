<?php
session::init();
$uri = $_SERVER['REQUEST_URI'];
$url = trim($uri, "/");
$request[1] = "site";
$request = explode("/", $url);
$inp = array_slice($request, 3);
//===============controller=================
if (file_exists("controllers/" . $request[1] . ".php")) {
    require_once("Controllers/" . $request[1] . ".php");
    $model = ucfirst($request[1]) . "_model";
    if ($request[1] !== "errors") {
        require("models/" . $model . ".php");
    }
} else {
    require_once("Controllers/errors.php");
    $err = new errors;
    // $err->index(5, "controller not found");
    $err->logic_error(404, "Controller not found");
}
//================function==================
if ($request[1] == "errors") {
    $currentcontroller = new $request[1]();
} else {
    $currentmodel = new $model;
    $currentcontroller = new $request[1]($currentmodel);
}
// if ($request[1] == "login") {
//     $request[2] = $request[1];
// }
if ($request[1] == "register") {
    $request[2] = $request[1];
}
if (@$request[2] == null) {
    $request[2] = "index";
}
@$currentfunction = $request[2];
if (method_exists($currentcontroller, $currentfunction)) {
    $currentcontroller->$currentfunction($inp);
} else {
    require_once("Controllers/errors.php");
    $err = new errors;
    $err->logic_error(404, "Function not found");
}
