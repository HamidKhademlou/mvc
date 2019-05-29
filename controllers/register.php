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
            extract($_POST);
            if (empty($username) or empty($password) or empty($email) or empty($firstname) or empty($lastname)) {
                header("Location: " . URL . "/register/" . "?error=1&&username=$username&&email=$email&&firstname=$firstname&&lastname=$lastname");
            } else {
                $firstname = FormValidation::securityTest_input($firstname);

                $lastname = FormValidation::securityTest_input($lastname);

                $username = FormValidation::securityTest_input($username);
                $usernameerr = $this->mymodel->notrep_handler("username", $username); //check for not repetitive

                $password = FormValidation::securityTest_input($password);
                
                $email = FormValidation::securityTest_input($email);
                $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                if (FormValidation::validation_email($email)) {
                    $emailerr = $this->mymodel->notrep_handler("email", $email); //check for not repetitive
                } else {
                    $emailerr = "Invalid email format!";
                }

                if (!empty($usernameerr) or !empty($emailerr)) {
                    if (!empty($emailerr)) {
                        header("Location: " . URL . "/register/" . "?emailerr=$emailerr&&username=$username&&firstname=$firstname&&lastname=$lastname");
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
                    $read["lastlogin"] = time();
                    $read["lastloginip"] = $ip;
                    $myuser = $this->mymodel->insert('user', $read);
                    $this->ViewObject->render(__class__, 'index', $read);
                }
            }
        }
    }
}
