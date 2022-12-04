<?php

    class Utils{
        public static function deleteSesion($name){
            if (isset($_SESSION[$name])) {
                $_SESSION[$name] = null;
                unset($_SESSION[$name]);   
            }

            return $name;
        }

        //Función para validr el tipo de usuario logeado
        public static function isAdmin(){

            if (!isset($_SESSION['admin'])) {
                header("Location:".base_url);
            }else{
                return true;
            }
        }

        //Metodo que revisa si el usuario se encuentra logeado
        public static function isIdentity(){

            if (!isset($_SESSION['identity'])) {
                header("Location:".base_url);
            }else{
                return true;
            }
        }



        public static function showCategorias(){
            require_once 'models/Categoria.php';
            $objeto = new Categoria();
            $categorias = $objeto->getCategorias();
            return $categorias;
        }

        public static function showProductos(){
            require_once 'models/Producto.php';
            $objeto = new Producto();
            $productos=$objeto->getAll();
            return $productos;
        }

        public static function statsCarrito(){
            $stats = array(
                'count' => 0,
                'total' => 0
            );

            if(isset($_SESSION['carrito'])){
                $stats['count'] = count($_SESSION['carrito']);
                foreach ($_SESSION['carrito'] as $elemento) {
                    $stats['total'] += $elemento['precio']*$elemento['unidades'];
                }
            }

            return $stats;
        }
    }


?>