<?php

use LDAP\Result;

require_once 'config/db.php';
    class Producto{

        private $id;
        private $categoria_id;
        private $nombre;
        private $descripcion;
        private $precio;
        private $stock;
        private $oferta;
        private $fecha;
        private $imagen;
        private $db;

        //Metodo constructor para instanciar el método connect de la clase Database
        public function __construct()
        {
            $this->db = Database::connect();
        }

        //Métodos get
        function getId(){
            return $this->id;
        }
        function getCategoria_id(){
            return $this->categoria_id;
        }
        function getNombre(){
            return $this->nombre;
        }
        function getDescripcion(){
            return $this->descripcion;
        }
        function getPrecio(){
            return $this->precio;
        }
        function getStock(){
            return $this->stock;
        }
        function getOferta(){
            return $this->oferta;
        }
        function getFecha(){
            return $this->fecha;
        }
        function getImagen(){
            return $this->imagen;
        }

        //Métodos set
        function setId($id){
            $this->id = $id;
        }
        function setCategioria_id($categoria){
            $this->categoria_id = (int)$this->db->real_escape_string($categoria);
        }
        function setNombre($nombre){
            $this->nombre = $this->db->real_escape_string($nombre);
        }
        function setDescripcion($descripcion){
            $this->descripcion = $this->db->real_escape_string($descripcion);
        }
        function setPrecio($precio){
            $this->precio = $this->db->real_escape_string($precio);
        }
        function setStock($stock){
            $this->stock = $this->db->real_escape_string($stock);
        }
        function setOferta($oferta){
            $this->oferta = $this->db->real_escape_string($oferta);
        }
        function setFecha($fecha){
            $this->fecha = $fecha;
        }
        function setImagen($imagen){           
            $this->imagen = $imagen;   
        }

        //Método para obtener todos los datos de la bd
        public function getAll(){
            $productos = $this->db->query("SELECT * FROM productos ORDER BY id DESC;");
            return $productos;
        }

        public function save(){
            $sql = "INSERT INTO productos VALUES (NULL,{$this->getCategoria_id()}, '{$this->getNombre()}','{$this->getDescripcion()}',{$this->getPrecio()}, {$this->getStock()},'{$this->getOferta()}',CURDATE(),'{$this->getImagen()}');";
            // var_dump($sql);
            // die();
            $producto = $this->db->query($sql);

            $result = false;
            if($producto){
                $result = true;
            }

            return $result;
            
        }

        public function delete(){
            $result = false;
            $sql = "DELETE FROM productos WHERE id = '{$this->getId()}';";
            $delete = $this->db->query($sql);
            if ($delete) {
                $result = true;
            }

            return $result;
        }

        public function getOne(){
            $producto = $this->db->query("SELECT * FROM productos WHERE id = {$this->getId()};");
          
            return $producto->fetch_object();
        }

        public function edit(){
            $result = false;
            $sql = "UPDATE productos 
                    SET nombre      = '{$this->getNombre()}', 
                        descripcion = '{$this->getDescripcion()}',
                        precio      = {$this->getPrecio()},
                        stock       = {$this->getStock()},  
                        oferta      = '{$this->getOferta()}',
                       CURDATE() ";
                        if ($this->getImagen() != null) {
                            $sql .= ",imagen = '{$this->getImagen()}"; 
                        }
                        $sql .= "WHERE id = {$this->getId()};";
                       
            $update = $this->db->query($sql);
            if ($update) {
                $result = true;
            }

            return $result;
        }


    }



?>