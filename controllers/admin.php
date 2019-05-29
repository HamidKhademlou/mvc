<?php
class admin extends Controller
{
    public $mymodel = null;
    // seda zadan model
    public function __construct($model)
    {
        parent::__construct();
        $this->mymodel = $model;
        $this->check_access();
        Auth::guard('Admin');
        $this->ViewObject->myjs = array('admin.js','search.js','time.js');
    }

    public function table()
    {
        $alldata = $this->mymodel->select('user', '*', "", 0);
        $this->ViewObject->render(__class__, 'table', $alldata, 0);
    }
    public function table2()
    {
        $alldata = $this->mymodel->select('user', '*', "", 0);
        $this->ViewObject->render(__class__, 'table2', $alldata, 1);
    }

    public function search()
    {
        $search = $_GET["search"];
        $alldata = $this->mymodel->select('user', '*', "lastname like '%$search%' OR firstname like '%$search%'", 0);
        echo json_encode($alldata);
    }
    public function edit()
    {
        if (empty($_POST)) {
            $this->ViewObject->render(__class__, 'edit');
        }
        if (isset($_POST["submit"])) {
            $username = $_POST["username"];
            $password = $_POST["password"];
            $email = $_POST["email"];
            $firstname = $_POST["firstname"];
            $lastname = $_POST["lastname"];
            $id = $_POST["id"];
            if (empty($_POST["username"]) or empty($_POST["password"]) or empty($_POST["email"]) or empty($_POST["firstname"]) or empty($_POST["lastname"])) {
                header("Location: " . URL . "/admin/edit/" . "?error=1&&id=$id&&password=$password&&username=$username&&email=$email&&firstname=$firstname&&lastname=$lastname");
            } else {
                if (empty($_POST["username"])) {
                    $usernameerr = "username is required";
                } else {
                    $username = FormValidation::securityTest_input($_POST["username"]);
                    $usernameerr = $this->mymodel->notrep_handler("username", $username);
                }
                if (empty($_POST["password"])) {
                    $passworderr = "password is requierd";
                } else {
                    $password = FormValidation::securityTest_input($_POST["password"]);
                }
                if (empty($_POST["email"])) {
                    $emailerr = "email is requierd";
                } else {
                    $email = FormValidation::securityTest_input($_POST["email"]);
                    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                    $emailerr = $this->mymodel->notrep_handler("email", $email);
                }
                if (empty($_POST["firstname"])) {
                    $firstnameerr = "firstname is requierd";
                } else {
                    $firstname = FormValidation::securityTest_input($_POST["firstname"]);
                }
                if (empty($_POST["lastname"])) {
                    $lastnameerr = "lastname is requierd";
                } else {
                    $lastname = FormValidation::securityTest_input($_POST["lastname"]);
                }
                echo "<center>";
                if (!empty($usernameerr) or !empty($emailerr)) {
                    if (!empty($emailerr)) {
                        header("Location: " . URL . "/admin/edit/" . "?error=3&&id=$id&&username=$username&&password=$password&&firstname=$firstname&&lastname=$lastname");
                    }
                    if (!empty($usernameerr)) {
                        header("Location: " . URL . "/admin/edit/" . "?error=2&&id=$id&&password=$password&&email=$email&&firstname=$firstname&&lastname=$lastname");
                    }
                    echo "</center>";
                } else {
                    $read = array();
                    $read["username"] = $username;
                    $password = password_hash($password, PASSWORD_DEFAULT);
                    $read["password"] = $password;
                    $read["email"] = $email;
                    $read["firstname"] = $firstname;
                    $read["lastname"] = $lastname;
                    $myuser = $this->mymodel->update("user", $read, "id = '$id'");
                    $alldata = $this->mymodel->select('user', '*', "", 0);
                    $this->ViewObject->render(__class__, 'table', $alldata, 0);
                }
            }
        }
    }
    public function delete()
    {
        $this->mymodel->delete('user', $_GET['id']);
    }
    public function access()
    {
        $id = $_GET['id'];
        $read["typeuser"] = $_GET['typeuser'];
        $myuser = $this->mymodel->update("user", $read, "id = '$id'");
        $myuser = $this->mymodel->select('user', '*', "id = '$id'", 1);
        echo json_encode($myuser["typeuser"]);
        // $this->ViewObject->render(__class__, 'table', $alldata, 0);
    }
    public function onlyadmin()
    {
        $this->ViewObject->render(__class__, 'onlyadmin');
    }
}