<?php

require_once 'router.php';


$ruta=isset($_GET["url"])?$_GET["url"]:"";
$route=new Router($ruta);
$route->run();


?>
