<?php
global $config;
$config = include('config.php');


class Database
{
    public $db;
    public $conn;
    public $datos;


    public function __construct()
    {
        global $config;
        $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset=utf8mb4";
        $user = $config['user'];
        $password = $config['password'];
        $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        );
        try {
            $this->db = new PDO($dsn, $user, $password, $options);
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    public function insertuser($datos, $db)
    {

        $this->datos = $datos;


        $sql = 'INSERT INTO usuarios (nombre, apellidos, dni, email, contrasena) VALUES (:nombre,:apellidos,:dni,:email,:contrasena)';
        $stmt = $this->db->prepare($sql);

        $stmt->bindParam(':nombre', $this->datos['nombre']);
        $stmt->bindParam(':apellidos', $this->datos['apellidos']);
        $stmt->bindParam(':dni', $this->datos['dni']);
        $stmt->bindParam(':email', $this->datos["email"]);
        $stmt->bindParam(':contrasena', $this->datos["contrasena"]);
        $stmt->execute();
    }
}
