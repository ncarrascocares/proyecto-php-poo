<?php

    /**
     * Se carga el modelo Categoria oara poder acceder los metodos existentes
     */
    require_once 'models/Categoria.php';
    class CategoriaController{
        public function index(){
            Utils::isAdmin();
            $objeto = new Categoria();
            $categorias = $objeto->getCategorias();

            
            require_once 'views/categoria/index.php';
            
        }

        //Metodo para crear categorias
        public function crear(){
            Utils::isAdmin();
            require_once 'views/categoria/crear.php';
        }

        // Método para guardar nuevas categorias
        public function save(){
            Utils::isAdmin();
            if ($_POST && isset($_POST['nombre'])) {
                //Guardar la categoria en bd
            $objeto = new Categoria();
            $objeto->setNombre($_POST['nombre']);
            $sav3 = $objeto->save();
            }
            

            header("Location:".base_url."categoria/index");
        }
    }



?>