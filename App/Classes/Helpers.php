<?php
namespace App\Classes;


class Helpers{
    

    public static function render($arquivo, $title, $dados = [] ){

        $caminho = "../App/View/".$arquivo.".php";

        require_once "../App/View/layout.php";
    
    }

}