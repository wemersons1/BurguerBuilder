<?php
namespace App\Model;
use \App\Model\Bd;


class Endereco extends Bd{

    public function gravarEndereco($dados){   
        $query = "INSERT INTO enderecos (cidade, bairro, complemento, cep) values(:CIDADE, :BAIRRO, :COMPLEMENTO, :CEP)";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(":CIDADE", $dados['cidade']);
        $stmt->bindValue(":BAIRRO", $dados['bairro']);
        $stmt->bindValue(":COMPLEMENTO", $dados['complemento']);
        $stmt->bindValue(":CEP", $dados['cep']);
        $stmt->execute();
    
    }
 
    public function getId($dados){
        $query = "SELECT id FROM enderecos WHERE 
        cidade = :CIDADE AND
        bairro = :BAIRRO AND 
        complemento = :COMPLEMENTO AND 
        cep = :CEP";
        
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(":CIDADE", $dados['cidade']);
        $stmt->bindValue(":BAIRRO", $dados['bairro']);
        $stmt->bindValue(":COMPLEMENTO", $dados['complemento']);
        $stmt->bindValue(":CEP", $dados['cep']);
        $stmt->execute();
        $id = $stmt->fetch();
        
        return $id[0];
    }

}