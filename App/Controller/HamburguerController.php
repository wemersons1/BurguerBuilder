<?php
namespace App\Controller;
use \App\Classes\Helpers;
use \App\Model\Endereco;
use \App\Model\Hamburguer;
use \App\Classes\Login;
session_start();

class HamburguerController{
    public function indexAction(){
        Helpers::render("index", "Faça seu pedido!", array());
    }

    public function homeAction(){
        
        if(Login::logado())
        {
            Helpers::render("home", "Faça seu pedido!", array());
    
        }
        else{
            Helpers::render("erro", "Sem acesso", array());
        }
    }

    public function gravarPedidoAction(){
        if(Login::logado()){
            $dados = $_POST;
            $dados['id_usuario'] = Login::id();
            $hamburguer = new Hamburguer();
            $hamburguer->gravarPedido($dados);
            Helpers::render("home", "Faça seu pedido!", array());
        }
        else{
            Helpers::render("erro", "Sem acesso", array());
        }
    }

}
