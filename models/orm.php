<?php

class Orm
{
protected $db;
    protected $datos;
    protected $conn;


    public function __construct($datos, $conn)
    {
        $this->datos = $datos;
        $this->conn = $conn;
    }


}
