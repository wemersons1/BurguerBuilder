<?php
namespace App\Controller;
use \App\Model\Usuario;
use \App\Classes\Login;

session_start();

class LoginController{

    public function autenticarAction(){
        $usuario = new Usuario();
        $usuario->logar($_POST);
        if(Login::logado()){//se está logado, então direcione para a página de pedidos inicial
            header("Location: /home");
        }
        else{
            header("Location: /index?login=erro");
        }
    }

    public function deslogarAction(){
        Login::deslogar();
        header("Location: /index?login=deslogado");
    }
}