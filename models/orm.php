<?php

class Orm
{

    protected $datos;
    protected $conn;


    public function __construct($datos, $conn)
    {
        $this->datos = $datos;
        $this->conn = $conn;
    }

    public function insertuser($datos, $conn)
    {
        $stmt = $this->conn->prepare("INSERT INTO usuarios (nombre, apellidos, dni, email, contrasena) VALUES (:nombre, :apellido, :dni, :email, :pass)");
        $stmt->bindParam(':nombre', $this->datos["nombre"]);
        $stmt->bindParam(':apellido', $this->datos["apellidos"]);
        $stmt->bindParam(':dni', $this->datos["dni"]);
        $stmt->bindParam(':email', $this->datos["email"]);
        $stmt->bindParam(':pass', $this->datos["contrasena"]);
        $stmt->execute();
    }
}
