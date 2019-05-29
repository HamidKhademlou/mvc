<?php
class login extends Controller
{
    public $mymodel = null;
    public function __construct($model)
    {
        parent::__construct();
        $this->mymodel = $model;
        $this->ViewObject->myjs = array('login.js');
    }

    public function login()
    {
        if (empty($_POST)) {
            if (!isset($_SESSION["username"])) {
                if (isset($_COOKIE["username"]) && isset($_COOKIE["password"])) {
                    $username = $_COOKIE["username"];
                    $password = $_COOKIE["password"];
                    $ip = logindata::get_client_ip();
                    $myuser = $this->mymodel->select('user', '*', "username = '$username'", 1);
                    if (password_verify($password, $myuser["password"])) {
                        $logindata = array("lastlogin" => time(), "lastloginip" => $ip);
                        $logindata = $this->mymodel->update('user', $logindata, "username='$username'");
                        session::setsession('Login', $username);
                        if ($myuser["typeuser"] == "notactive") {
                            session::setsession('Type', $myuser["typeuser"]);
                            header("Location: " . URL . "/login/login/" . "?error=2");
                        }
                        if ($myuser["typeuser"] == "Admin") {
                            session::setsession('Type', $myuser["typeuser"]);
                            header("Location: " . URL . "/admin/table/");
                        }
                        if ($myuser["typeuser"] == "normal") {
                            session::setsession('Type', $myuser["typeuser"]);
                        }
                        $this->ViewObject->render(__class__, 'index', $myuser);
                    }
                }
            }
            $this->ViewObject->render(__class__, 'login', $myuser = array(), 1);
        }
        if (isset($_POST["submit"])) {
            $username = $_POST["username"];
            $password = $_POST["password"];
            $ip = logindata::get_client_ip();
            $myuser = $this->mymodel->select('user', '*', "username = '$username'", 1);
            if (password_verify($password, $myuser["password"])) {
                $logindata = array("lastlogin" => time(), "lastloginip" => $ip);
                $logindata = $this->mymodel->update('user', $logindata, "username='$username'");
                if ($_POST["remember"] == true) {
                    setcookie("username", $username, time() + 60 * 60 * 24 * 7);
                    setcookie("password", $password, time() + 60 * 60 * 24 * 7);
                }
                session::setsession('Login', $username);
                if ($myuser["typeuser"] == "notactive") {
                    session::setsession('Type', $myuser["typeuser"]);
                    header("Location: " . URL . "/login/login/" . "?error=2");
                }
                if ($myuser["typeuser"] == "Admin") {
                    session::setsession('Type', $myuser["typeuser"]);
                    header("Location: " . URL . "/admin/table/");
                }
                if ($myuser["typeuser"] == "normal") {
                    session::setsession('Type', $myuser["typeuser"]);
                    $this->ViewObject->render(__class__, 'index', $myuser);
                }
            } else {
                header("Location: " . URL . "/login/login/" . "?error=1");
            }
        }
    }
    public function logout()
    {
        session::sessionDeath();
        header("Location: " . URL . "/site/index/");
    }
    public function index($myuser)
    {
        $username = $_SESSION["Login"];
        $myuser = $this->mymodel->select('user', '*', "username = '$username'", 1);
        $this->ViewObject->render(__class__, 'index', $myuser);
    }
}
