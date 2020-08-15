<?php
namespace App;

class Rotas{
    
    private $rotas;

    public function __construct(){
        $this->run();
    }
    
    private function init(){

        $rotas['index'] = ['rota' =>'/','controller' => 'HamburguerController', 'action' => 'indexAction'];
        $rotas['autenticar'] = ['rota' =>'/autenticar','controller' => 'LoginController', 'action' => 'autenticarAction'];
        $rotas['index2'] = ['rota' =>'/index','controller' => 'HamburguerController', 'action' => 'indexAction'];
        $rotas['home'] = ['rota' =>'/home', 'controller' =>'HamburguerController', 'action' => 'homeAction'];
        $rotas['logado-home'] = ['rota' =>'/gravarpedido', 'controller' =>'HamburguerController', 'action' => 'gravarPedidoAction'];

        $rotas['logout'] = ['rota' =>'/logout', 'controller' =>'LoginController', 'action' => 'deslogarAction'];
        /*
        $rotas['autenticar'] = ['rota' =>'/autenticar','controller' => 'LoginController', 'action' => 'autenticarAction'];
        $rotas['logout'] = ['rota' =>'/logout', 'controller' =>'LoginController', 'action' => 'deslogarAction'];
        $rotas['home'] = ['rota' =>'/home', 'controller' =>'HamburguerController', 'action' => 'homeAction'];
    */
        
        $this->setRotas($rotas);
    }

    private function setRotas($rotas){
        $this->rotas = $rotas;
    }

    private function getUrl(){
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    private function run(){
        $this->init();
        $url = $this->getUrl();
       
        foreach ($this->rotas as $key => $value){
            if($value['rota'] === $url){

                $class = "\\App\\Controller\\".ucfirst($value['controller']);
                $controlador = new $class();
                $action = $value['action'];
                $controlador->$action();                

            }

        }
      
    }

}