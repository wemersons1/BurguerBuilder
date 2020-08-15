<?php
namespace App\Model;
use \App\Model\Bd;

class Hamburguer extends Bd{

    public function gravarPedido($dados){
        $query = "INSERT INTO hamburguer(id_usuario, qtd_queijo, qtd_carne,	qtd_bacon, qtd_presunto, valor)
        values(:USUARIO, :QUEIJO, :CARNE, :BACON, :PRESUNTO, :VALOR)";

        $stmt = $this->conexao->prepare($query);
        $this->executa($stmt, $dados);
        
    }
    /*
    public static function id($dados){
   
        $query = "SELECT id_hamburguer from hamburguer where qtd_queijo = :QUEIJO and qtd_presunto = :PRESUNTO and qtd_bacon = :BACON and qtd_carne = :CARNE and valor = :VALOR";
        $stmt = $this->conexao->prepare($query);
        $stmt = $this->executa($stmt, $dados);
        
        $id = $stmt->fetch();
        return $id[0];
    }
    */
    
    private function executa($stmt, $dados){
        $valor = $dados['valor'];
        $valor = str_replace('R$ ', '', $valor);
        $valor = str_replace(',', '.', $valor);
  
        $stmt->bindValue(":USUARIO", $dados['id_usuario']);
        $stmt->bindValue(":QUEIJO", $dados['qtd-queijo']);
        $stmt->bindValue(":PRESUNTO", $dados['qtd-presunto']);
        $stmt->bindValue(":CARNE", $dados['qtd-carne']);
        $stmt->bindValue(":BACON", $dados['qtd-bacon']);
        $stmt->bindValue(":VALOR", $valor);
       
        $stmt->execute();

        return $stmt;
    }

}