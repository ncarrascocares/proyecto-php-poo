<?php

//use LDAP\Result;

require_once 'config/db.php';

    class Pedido{

        private $id;
        private $usuario_id;
        private $provincia;
        private $localidad;
        private $direccion;
        private $coste;
        private $estado;
        private $fecha;
        private $hora;
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
        function getUsuario_id(){
            return $this->usuario_id;
        }
        function getProvincia(){
            return $this->provincia;
        }
        function getLocalidad(){
            return $this->localidad;
        }
        function getDireccion(){
            return $this->direccion;
        }
        function getCoste(){
            return $this->coste;
        }
        function getEstado(){
            return $this->estado;
        }
        function getFecha(){
            return $this->fecha;
        }
        function getHora(){
            return $this->hora;
        }

        //Métodos set
        function setId($id){
            $this->id = (int)$this->db->real_escape_string($id);
        }
        function setUsuario_id($usuario_id){
            $this->usuario_id = (int)$this->db->real_escape_string($usuario_id);
        }
        function setProvincia($provincia){
            $this->provincia = $this->db->real_escape_string($provincia);
        }
        function setLocalidad($localidad){
            $this->localidad = $this->db->real_escape_string($localidad);
        }
        function setDireccion($direccion){
            $this->direccion = $this->db->real_escape_string($direccion);
        }
        function setCoste($coste){
            $this->coste = (int)$this->db->real_escape_string($coste);
        }
        function setEstado($estado){
            $this->estado = $this->db->real_escape_string($estado);
        }
        function setFecha($fecha){
            $this->fecha = $fecha;
        }
        function setHora($hora){           
            $this->hora = $hora;   
        }

        //Método para obtener todos los datos de la bd
        public function getAll(){
            $pedidos = $this->db->query("SELECT * FROM pedidos ORDER BY id DESC;");
            return $pedidos;
        }

        public function save(){
            $sql = "INSERT INTO pedidos VALUES (NULL,{$this->getUsuario_id()}, '{$this->getProvincia()}','{$this->getLocalidad()}','{$this->getDireccion()}', {$this->getCoste()},'confirm',CURDATE(),CURTIME());";
            // var_dump($sql);
            // die();
            $pedidos = $this->db->query($sql);

            $result = false;
            if($pedidos){
                $result = true;
            }

            return $result;
            
        }

        //Metodo para guardar información de los pedidos en tabla lienas_pedido
        public function save_linea(){
            $sql = "SELECT LAST_INSERT_ID() as 'pedido';";
            $query = $this->db->query($sql);
            $pedido_id = $query->fetch_object()->pedido;

            foreach($_SESSION['carrito'] as $elemento){
                $producto = $elemento['producto'];

                $insert = "INSERT INTO lineas_pedidos VALUES (NULL, {$pedido_id}, {$producto->id},{$elemento['unidades']});";

                $save = $this->db->query($insert);

            }

            $result = false;
            if($save){
                $result = true;
            }

            return $result;
        }


        public function getOne(){
            $pedidos = $this->db->query("SELECT * FROM pedidos WHERE id = {$this->getId()};");
          
            return $pedidos->fetch_object();
        }
        //Consulta que saca el ultimo pedido de un usuario
        public function getOneByUser(){
            $sql = "SELECT p.id, p.coste, lp.unidades FROM pedidos p"
                  ." INNER JOIN lineas_pedidos lp ON lp.pedido_id = p.id"
                  ." WHERE p.usuario_id = {$this->getUsuario_id()} ORDER BY id DESC LIMIT 1;";
            $pedidos = $this->db->query($sql);
          
            return $pedidos->fetch_object();
        }
        //Consulta que saca todos los pedidos de un usuario
        public function getAllByUser(){
            $sql = "SELECT p.* FROM pedidos p"
                  ." WHERE p.usuario_id = {$this->getUsuario_id()} ORDER BY id DESC;";
            $pedidos = $this->db->query($sql);
          
            return $pedidos;
        }
        public function getProductosByPedido($id){
            $sql = "SELECT pr.*, lp.unidades FROM productos pr "
                  ."INNER JOIN lineas_pedidos lp ON pr.id = lp.producto_id "
                  ."WHERE lp.pedido_id = {$id};";

                //   echo $sql;
                //   die();
            $productos = $this->db->query($sql);
            return $productos;
        }

    }



?>