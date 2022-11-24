<?php
    require_once 'models/Producto.php';
    class ProductoController{
        
        public function index(){
           //Renderizar la vista
           require_once 'views/producto/destacados.php';
        }

        public function gestion(){
            Utils::isAdmin();
            $objeto = new Producto();
            $productos=$objeto->getAll();
            require_once 'views/producto/gestion.php';
        }

        public function crear(){
            Utils::isAdmin();
           require_once 'views/producto/crear.php';
        }

        public function save(){
            Utils::isAdmin();
            if($_POST){
               
                $objeto = new Producto();
                $objeto->setCategioria_id($_POST['categoria']);
                $objeto->setNombre($_POST['nombre']);
                $objeto->setDescripcion($_POST['descripcion']);
                $objeto->setPrecio($_POST['precio']);
                $objeto->setStock($_POST['precio']);
                $objeto->setOferta($_POST['oferta']);
                
                $objeto->save();
            }

            header("Location:".base_url."producto/gestion");
        }
    }

?>