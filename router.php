<?php
class Router{

    private $controller;
    private $method;
    private $ruta;

public function __construct($ruta)
{
   $this->ruta=$ruta;
   $this->matchRoute();

}

public function matchroute()
{
    $url=rtrim($this->ruta,"/");
    $url=filter_var($url,FILTER_SANITIZE_URL);
    $url=explode("/",$url);


    $this->controller=($url[0]!=""?$url[0]:"Home");
    
    $rutaController="controllers/".$this->controller."controller.php";
    if(file_exists($rutaController)){
        require_once($rutaController) ;
        

    }else{
        echo "No existe controlador";
    }
}


public function run()
{
    $controller=new $this->controller;
}

}



?>