<?php

    /**
     * Se carga el modelo Categoria oara poder acceder los metodos existentes
     */
    require_once 'models/Categoria.php';
    require_once 'models/Producto.php';
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
            $save = $objeto->save();
            }
            

            header("Location:".base_url."categoria/index");
        }

        public function ver(){
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                //Conseguir categoria
                $objeto_categoria = new Categoria();
                $objeto_categoria->setId($id);
                $categoria = $objeto_categoria->getOne();

                //Conseguir producto
                $objeto_producto  = new Producto();
                $objeto_producto->setCategoria_id($id);
                $producto = $objeto_producto->getAllxCategoria();                
            }
            require_once 'views/categoria/ver.php';
        }
    }



?>