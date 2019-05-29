<?php
class Session
{
    public static function init()
    {
        session_start();
    }
    public static function setsession($name, $param)
    {
        $_SESSION[$name] = $param;
    }
    public static function getsession($name)
    {
        return $_SESSION[$name];
    }
    public static function sessionDeath()
    {
        session_unset();
        session_destroy();
        if (isset($_COOKIE["username"]) && isset($_COOKIE["password"])) {
            setcookie("username", "", time() - 60);
            setcookie("password", "", time() - 60);
        }
    }
}
