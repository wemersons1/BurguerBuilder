<?php
namespace App\Controller;
use \App\Classes\Helpers;
use \App\Model\Endereco;
use \App\Model\Pedidos;
use \App\Classes\Login;
session_start();

class PedidosController{
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
            $endereco = new Endereco();
            $endereco->gravarEndereco($dados);
            $dados['id_usuario'] = Login::id();
            $dados['id_endereco'] = $endereco->getId($dados);
            $hamburguer = new Pedidos();
            $hamburguer->gravarPedido($dados);
            Helpers::render("home", "Faça seu pedido!", array());
        }
        else{
            Helpers::render("erro", "Sem acesso", array());
        }
    }

    public function listarPedidosAction(){
        $pedidos = new Pedidos();
        $dados = $pedidos->listarPedidos(Login::id());
        
        Helpers::render("lista", "Lista de pedidos", $dados);
    }

}
