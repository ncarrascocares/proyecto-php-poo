<?php

    /**
     * Se carga el modelo Categoria oara poder acceder los metodos existentes
     */
    require_once 'models/Categoria.php';
    class CategoriaController{
        public function index(){
            $objeto = new Categoria();
            $categorias = $objeto->getCategorias();
            require_once 'views/categoria/index.php';
            
        }
    }



?>