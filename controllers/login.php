<?php
class login extends Controller
{
    public $mymodel = null;
    // seda zadan model
    public function __construct($model)
    {
        parent::__construct();
        $this->mymodel = $model;
        // $this->ViewObject->myjs=array('login.js');
    }
    
    public function login()
    {
        if (empty($_POST)) {
            $this->ViewObject->render(__class__, 'login', $myuser = array(), 1);
        }
        if (isset($_POST["submit"])) {
            $username = $_POST["username"];
            $password = $_POST["password"];
            $ip = logindata::get_client_ip();
            // $myuser = $this->mymodel->select('user', '*', "username = '$username' AND password = '$password'", 1);
            $myuser = $this->mymodel->select('user', '*', "username = '$username'", 1);
            if (password_verify($password, $myuser["password"])) {
                if ($myuser["typeuser"] == "notactive") {
                    session::setsession('Login', $username);
                    session::setsession('Type', $myuser["typeuser"]);
                    header("Location: " . URL . "/login/login/" . "?error=2");
                }
                if ($myuser["typeuser"] == "Admin") {
                    session::setsession('Login', $username);
                    session::setsession('Type', $myuser["typeuser"]);
                    header("Location: " . URL . "/admin/table/");
                }
                if ($myuser["typeuser"] == "normal") {
                    session::setsession('Login', $username);
                    session::setsession('Type', $myuser["typeuser"]);
                }
                $logindata = array("lastlogin" => time(), "lastloginip" => $ip);
                $logindata = $this->mymodel->update('user', $logindata, "username='$username'");
                $this->ViewObject->render(__class__, 'index', $myuser);
            } else {
                header("Location: " . URL . "/login/login/" . "?error=1");
            }
        }
    }
    public function logout()
    {
        session::sessionDeath();
        header("Location: " . URL . "/site/index/");
        // $this->login();
    }
    public function index()
    {
        $username = $_SESSION["Login"];
        $myuser = $this->mymodel->select('user', '*', "username = '$username'", 1);
        $this->ViewObject->render(__class__, 'index', $myuser);
    }
}