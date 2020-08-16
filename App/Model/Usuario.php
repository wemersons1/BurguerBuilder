<?php


use \App\Model\Bd;
use \App\Model\Pedidos;
use \App\Model\Endereco;

namespace App\Model;
session_start();
class Usuario extends Bd{
 
 
    private function consultaLogin(){
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $query = "SELECT * FROM usuario where user = :USER and pass = :PASS";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(":USER", $user);
        $stmt->bindValue(":PASS", $pass);
        $stmt->execute();
        $registros = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $numRegistros = count($registros);

        return $numRegistros;
    }
    private function consultaEmail(){
        $query = "SELECT * from usuario where user = :USER";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(":USER", $_POST['user']);
        $stmt->execute();
        $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        
        return count($resultado);
    }
    public function logar($dados){    
     
        if($dados['opcao']=='logar'){
            
            if($this->consultaLogin()){
                $id = $this->getId($dados);
                \App\Classes\Login::logar($id);
                $endereco = new Endereco();
                $endereco->gravarEndereco($dados);
                $id = $this->getId($dados);
                $dados['id_usuario'] = $id;
                $dados['id_endereco'] = $endereco->getId($dados);                
                $pedido = new Pedidos();
                $pedido->gravarPedido($dados);
            }
            else{                
                \App\Classes\Login::deslogar();
            }
        }
        else{

            if(!$this->consultaEmail()){//se não existir nenhum registro
                $this->gravarLogin($dados);  
                \App\Classes\Login::logar($this->getId($dados));     
            }
            else{
                \App\Classes\Login::deslogar();
            }
        }
        return \App\Classes\Login::logado();
    
    }

    protected function gravarLogin($dados){
        $endereco = new Endereco();
        $endereco->gravarEndereco($dados);
        $id_endereco = $endereco->getId($dados);
        $dados['id_endereco'] = $id_endereco;

        $query = "INSERT INTO usuario (user, pass) values (:USER, :PASS)";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(":USER", $dados['user']);
        $stmt->bindValue(":PASS", $dados['pass']);
        $stmt->execute();
        $id_usuario = $this->getId($dados);
        $dados['id_usuario'] = $id_usuario;
        $pedido = new Pedidos();
        $pedido->gravarPedido($dados);
    }

    private function getId($dados){

        $query = "SELECT id FROM usuario where user = :USER and pass = :PASS";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(":USER", $dados['user']);
        $stmt->bindValue(":PASS", $dados['pass']);
        $stmt->execute();
        $id = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $id['id'];
    }
}