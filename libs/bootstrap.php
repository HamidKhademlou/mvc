<?php
$uri = $_SERVER['REQUEST_URI'];
$url = trim($uri, "/");
$request = explode("/", $url);
$inp = array_slice($request, 4);
//===============controller=================
if (file_exists('controllers/' . $request[2] . '.php')) {
    require("Controllers/" . $request[2] . ".php");
    $model = ucfirst($request[2]) . "_model";
    if ($request[2] !== "errors") {
        require("models/" . $model . ".php");
    }
} else {
    require_once('Controllers/errors.php');
    $err = new errors;
    // $err->index(5, "controller not found");
    $err->logic_error(404, "Controller not found");
}
//================function==================
if ($request[2] == "errors") {
    $currentcontroller = new $request[2]();
} else {
    $currentmodel = new $model;
    $currentcontroller = new $request[2]($currentmodel);
}
// if ($request[2] == "login") {
//     $request[3] = $request[2];
// }
if ($request[2] == "register") {
    $request[3] = $request[2];
}
if (@$request[3] == null) {
    $request[3] = "index";
}
@$currentfunction = $request[3];
if (method_exists($currentcontroller, $currentfunction)) {
    $currentcontroller->$currentfunction($inp);
} else {
    require_once('Controllers/errors.php');
    $err = new errors;
    $err->logic_error(404, "Function not found<br>(inter sum or mul)");
}