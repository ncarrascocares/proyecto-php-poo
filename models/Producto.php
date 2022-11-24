<?php
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

        //Métodos set
        function setId($id){
            $this->id = $id;
        }
        function setCategioria_id($categoria){
            $this->categoria_id = (int)$categoria;
        }
        function setNombre($nombre){
            $this->nombre = $this->db->real_escape_string($nombre);
        }
        function setDescripcion($descripcion){
            $this->descripcion = $this->db->real_escape_string($descripcion);
        }
        function setPrecio($precio){
            $this->precio = $precio;
        }
        function setStock($stock){
            $this->stock = $stock;
        }
        function setOferta($oferta){
            $this->oferta = $this->db->real_escape_string($oferta);
        }
        function setFecha($fecha){
            $this->fecha = $fecha;
        }

        //Método para obtener todos los datos de la bd
        public function getAll(){
            $productos = $this->db->query("SELECT * FROM productos ORDER BY id DESC;");
            return $productos;
        }

        public function save(){
            $sql = "INSERT INTO productos VALUES (NULL,$this->categoria_id, '$this->nombre','$this->descripcion',$this->precio, $this->stock,'$this->oferta',CURDATE(),NULL);";
            
            $producto = $this->db->query($sql);

            

            $result = false;
            if($producto){
                $result = true;
            }

            return $result;
            
        }


    }



?>