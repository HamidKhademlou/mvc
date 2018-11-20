<?php
class Controller
{
    public $ViewObject = null;
    public function __construct()
    {
        $this->ViewObject = new View();
        session::init();
    }
    public function check_access()
    {
        // session::init();
        if(!session::getsession('Login')){
            header("Location: " . URL . "/login/index/");
        }
    }
}