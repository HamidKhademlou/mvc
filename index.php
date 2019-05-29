<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define("db_username", "root");
define("db_password", "");
define("db_Databasename", "mydbpdo");
// define("db_Servername",$_SERVER["SERVER_NAME"]);
define("db_Servername", "localhost");

define('URL', $_SERVER["REQUEST_SCHEME"] . "://" . $_SERVER["HTTP_HOST"] . "/mvc");
// site
define('URL_CSS_SITE', '/libs/site/');
define('URL_IMG_SITE', '/libs/site/');
define('URL_JS_SITE', '/libs/site/');
define('URL_MAIL_SITE', '/libs/site/');
define('URL_SCSS_SITE', '/libs/site/');
// define('URL_VENDOR_SITE','/libs/site/');
// login
define('URL_LOGIN', '/libs/login/');

require_once("libs/Session.php");
require_once("libs/Auth.php");
require_once "Libs/FormValidation.php";
require_once ("libs/logindata.php");
// require_once ("Autoloader.php");
require_once "libs/Controller.php";
require_once "libs/Model.php";
require_once "libs/View.php";
require_once "Controllers/errors.php";

// ===============error=====================
// function customError($errno, $errstr, $errfile, $errline)
// {
//     // echo "<br><b>attention=>Error:</b> [$errno]  $errstr at $errfile in line<b> $errline </b><br>";
//     $err = new errors;
//     $err->logic_error($errno, $errstr, $errfile, $errline);
// }
// set_error_handler("customError");
// echo $test;
require "libs/bootstrap.php";
