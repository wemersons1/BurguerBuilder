<?php
namespace App\Model;
use \App\Model\Bd;

class Pedidos extends Bd{

    public function gravarPedido($dados){
        $query = "INSERT INTO pedidos(id_usuario, id_endereco, qtd_queijo, qtd_carne,	qtd_bacon, qtd_presunto, valor)
        values(:USUARIO, :ENDERECO, :QUEIJO, :CARNE, :BACON, :PRESUNTO, :VALOR)";

        $stmt = $this->conexao->prepare($query);
        $this->executa($stmt, $dados);
        
    }
    private function executa($stmt, $dados){
        $valor = $dados['valor'];
        $valor = str_replace('R$ ', '', $valor);
        $valor = str_replace(',', '.', $valor);
        $stmt->bindValue(":USUARIO", $dados['id_usuario']);
        $stmt->bindValue(":ENDERECO", $dados['id_endereco']);
        $stmt->bindValue(":QUEIJO", $dados['qtd-queijo']);
        $stmt->bindValue(":PRESUNTO", $dados['qtd-presunto']);
        $stmt->bindValue(":CARNE", $dados['qtd-carne']);
        $stmt->bindValue(":BACON", $dados['qtd-bacon']);
        $stmt->bindValue(":VALOR", $valor);
       
        $stmt->execute();

        return $stmt;
    }

    public function listarPedidos($id){
        $query = "select * from pedidos inner join enderecos on pedidos.id_endereco = enderecos.id where pedidos.id_usuario = :ID";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(":ID", $id);
        $stmt->execute();
        $dados = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $dados;
    }

    
    

}