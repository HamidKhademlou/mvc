<?php
class register extends Controller
{
    public $mymodel = null;
    public function __construct($model)
    {
        parent::__construct();
        $this->mymodel = $model;
    }

    public function register()
    {
        $this->ViewObject->myjs = array('registerform.js');
        if (empty($_POST)) {
            $this->ViewObject->render(__class__, 'register', $myuser = array());
        }
        if (isset($_POST["submit"])) {
            $ip = logindata::get_client_ip();
            $username = $_POST["username"];
            $email = $_POST["email"];
            $firstname = $_POST["firstname"];
            $lastname = $_POST["lastname"];
            if (empty($_POST["username"]) or empty($_POST["password"]) or empty($_POST["email"]) or empty($_POST["firstname"]) or empty($_POST["lastname"])) {
                header("Location: " . URL . "/register/" . "?error=1&&username=$username&&email=$email&&firstname=$firstname&&lastname=$lastname");
            } else {
                if (empty($_POST["username"])) {
                    $usernameerr = "username is required";
                } else {
                    $username = FormValidation::securityTest_input($_POST['username']);
                    // $username = $this->mymodel->test_input_handler($_POST["username"]);
                    $usernameerr = $this->mymodel->notrep_handler("username", $username);
                }
                if (empty($_POST["password"])) {
                    $passworderr = "password is requierd";
                } else {
                    $password = FormValidation::securityTest_input($_POST['password']);
                }
                if (empty($_POST["email"])) {
                    $emailerr = "email is requierd";
                } else {
                    $email = FormValidation::securityTest_input($_POST['email']);
                    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                    $emailerr = $this->mymodel->notrep_handler("email", $email);
                }
                if (empty($_POST["firstname"])) {
                    $firstnameerr = "firstname is requierd";
                } else {
                    $firstname = FormValidation::securityTest_input($_POST['firstname']);
                }
                if (empty($_POST["lastname"])) {
                    $lastnameerr = "lastname is requierd";
                } else {
                    $lastname = FormValidation::securityTest_input($_POST['lastname']);
                }
                if (!empty($usernameerr) or !empty($emailerr)) {
                    if (!empty($emailerr)) {
                        header("Location: " . URL . "/register/" . "?error=3&&username=$username&&firstname=$firstname&&lastname=$lastname");
                    }
                    if (!empty($usernameerr)) {
                        header("Location: " . URL . "/register/" . "?error=2&&email=$email&&firstname=$firstname&&lastname=$lastname");
                    }
                } else {
                    $read = array();
                    $read["username"] = $username;
                    $password = password_hash($password, PASSWORD_DEFAULT);
                    $read["password"] = $password;
                    $read["email"] = $email;
                    $read["firstname"] = $firstname;
                    $read["lastname"] = $lastname;
                    $myuser = $this->mymodel->insert('user', $read);
                    $this->ViewObject->render(__class__, 'index', $read);
                }
            }
        }
    }
}