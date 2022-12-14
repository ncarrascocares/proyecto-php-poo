<?php

    class Categoria{

        //Variables de la clase que representan los campos de la bd
        private $id;
        private $nombre;

        //Variable para instanciar al metodo de la clase Database
        private $db;

        //Constructor para imbocar a la clase Database del fichero db.php
        public function __construct()
        {
            $this->db = Database::connect();
        }

        //Metodos get
        function getId(){
            return $this->id;
        }

        function getNombre(){
            return $this->nombre;
        }

        //Metodos set
        function setId($id){
            $this->id = (int)$this->db->real_escape_string($id);
        }
        function setNombre($nombre){
            $this->nombre = $this->db->real_escape_string($nombre);
        }
        //Método para listar todas las categorias existentes en la bd
        public function getCategorias(){
            $categorias = $this->db->query("SELECT * FROM categorias ORDER BY id DESC;");
            return $categorias;
        }

        public function getOne(){
            $categoria = $this->db->query("SELECT * FROM categorias WHERE id = {$this->getId()} ORDER BY id DESC;");
            return $categoria->fetch_object();
        }

        public function save(){
            $sql = "INSERT INTO categorias VALUES (NULL, '$this->nombre');";
            $save = $this->db->query($sql);

            $result = false;

            if($save){
                $result = true;
            }

            return $result;

        }


    }


?>