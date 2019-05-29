<?php
class Auth
{
    /**
     * check guard
     *
     * @param string $guard
     * @return void
     */
    public static function guard($guard)
    {
        $type = $_SESSION['Type'] ?? 'guest';
        if ($_SESSION["Type"] == $guard) { } else {
            header("Location: " . URL . "/site/index/" . "?alert=سطح دسترسی شما " . $type . " می باشد، تنها کاربر " . $guard . " به این صفحه دسترسی دارد ");
        }
    }
}
