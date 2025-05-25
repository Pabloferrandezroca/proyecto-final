<?php
class Db{
    private $host = 'localhost';
    private $db_name = 'JardinBrillante';
    private $username = 'root';
    private $password = '';
    public $conexion;

    public function __construct() {
        $this->conexion = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
    }

    public function obtenerProductos() {
        $this->conexion->set_charset("utf8");
        $query = "SELECT * FROM products";
        $result = mysqli_query($this->conexion, $query);
        $productos = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $productos[] = $row;
        }  
        return $productos;
    }

    public function inicioSesion($usuario, $contraseña) {
        $this->conexion->set_charset("utf8");
        $query = "SELECT * FROM customers WHERE name = '$usuario' AND password = '$contraseña'";
        $result = mysqli_query($this->conexion, $query);
        if (mysqli_num_rows($result) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function comprobarRegistro($usuario, $email, $contraseña){
        $this->conexion->set_charset("utf8");
        $query = "SELECT * FROM customers WHERE name = '$usuario' OR email = '$email'";
        $result = mysqli_query($this->conexion, $query);
        if (mysqli_num_rows($result) === 0) {
            $this->registro($usuario, $email, $contraseña);
            
        }
        else{
            $query = "SELECT * FROM customers WHERE name = '$usuario'";
            $result = mysqli_query($this->conexion, $query);
            if (mysqli_num_rows($result) > 0) {
                return "El nombre de usuario ya esta en uso";
            }
            $query = "SELECT * FROM customers WHERE email = '$email'";
            $result = mysqli_query($this->conexion, $query);
            if (mysqli_num_rows($result) > 0) {
                return "El correo electronico ya está registrado";
            }
        }
    }
    private function registro($usuario, $email, $contraseña){
        $this->conexion->set_charset("utf8");
        $query = "INSERT INTO customers (name, email, password) VALUES ('$usuario', '$email', '$contraseña')";
        $result = mysqli_query($this->conexion, $query);
        if ($result){
            return true;
        }
        else{
            return false;
        }
    }
    public function obtenerPorId($id) {
        $this->conexion->set_charset("utf8");
        $query = "SELECT * FROM products WHERE id = '$id'";
        $result = mysqli_query($this->conexion, $query);
        if (mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result);
        } else {
            return null;
        }
    }
}
