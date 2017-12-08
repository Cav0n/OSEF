<?php
/**
 * Created by PhpStorm.
 * User: flbernard
 * Date: 01/12/17
 * Time: 14:08
 */

class Admin
{
    public static function isAdmin() : bool
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] == "admin")
        {
            return true;
        }
        else {
            return false;
        }
    }
}