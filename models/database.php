<?php
global $config;
$config = include('config.php');

class Database {
    public $db;
    public $conn;
    public $datos;
    
    public function __construct() {
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

}
