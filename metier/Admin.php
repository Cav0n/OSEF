<?php
/**
 * Created by PhpStorm.
 * User: Cav0n
 * Date: 15/12/2017
 * Time: 10:57
 */

class Admin
{
    private $email;
    private $mdp;
    private $b;


    public function getEmail() : String {
        return $this->email;
    }

    public function getMdp() : String {
        return $this->mdp;
    }

    public function setAdmin(){
        $this->b = true;
    }

    public function __construct(String $email, String $mdp) {
        $this->email = $email;
        $this->mdp = $mdp;
        $this->b = false;
    }

    public function isAdmin() : bool {
        return $this->b;
    }

    public static function isAdminPost() : bool {
        if(isset($_POST['admin'])){
            return $_POST['admin']->b;
        }
        return false;
    }
}