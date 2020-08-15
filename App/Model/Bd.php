<?php
namespace App\Model;

class Bd{

    const USER = "root";
    const PASS = "root";

    protected $conexao;

    public function __construct(){
        try{
            $this->conexao = new \PDO("mysql:host=localhost;dbname=hamburgueria", self::USER, self::PASS);
        }catch(\PDOException $e){
            echo "Falha ao conectar no banco";
        }
   
    }
    
   

}
