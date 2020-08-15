<?php
namespace App\Classes;

class Login{

    public static function logado(){
        return $_SESSION['AUTH'];
    }

    public static function logar($id){
        $_SESSION['ID'] = $id;
        $_SESSION['AUTH'] = true;
    }

    public static function deslogar(){
        $_SESSION['AUTH'] = false;
        unset($_SESSION['ID']);
    }
    public static function id(){
        return $_SESSION['ID'];
    }
}