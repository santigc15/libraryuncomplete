<?php


class User
{
    public $datos = array();
    public function __construct()
    {
        if (isset($_POST['register'])) {
            require_once("./models/Database.php");
           
            $datos = array();
            $datos["nombre"] = $_POST['name'];
            $datos["apellidos"] = $_POST['surname'];
            $datos["dni"] = $_POST['dni'];
            $datos["email"] = $_POST['email'];
            $datos["contrasena"] = $_POST['password'];

            $db = new Database();

            $db->insertuser($datos, $db);
        } else {
            require_once("./views/register.php");
        }
    }
}
