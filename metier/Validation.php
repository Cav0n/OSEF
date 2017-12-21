<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 21/12/2017
 * Time: 13:50
 */

class Validation
{

    public static function sanitizeEmail(String $email){
        if (isset($email))
            filter_var($email,FILTER_SANITIZE_EMAIL);
    }

    public static function sanitizeRegis(String $nom){
        if(isset($nom))
            filter_var($nom,FILTER_SANITIZE_STRING);
    }


}