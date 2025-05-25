<?php
require_once(__DIR__ . '/../modelo/Db.php');
class ProductosController {
    private $db;

    public function __construct() {
        $this->db = new Db();
    }

    public function mostrarProductos() {
        $productos = $this->db->obtenerProductos();
        return $productos;
    }

    public function obtenerCarrito($id){
        $carrito = $this->db->obtenerPorId($id);
        if ($carrito) {
            return $carrito;
        } else {
            return [];
        }
    } 
}