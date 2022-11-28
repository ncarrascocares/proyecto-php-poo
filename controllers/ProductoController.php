<?php
    require_once 'models/Producto.php';
    class ProductoController{
        
        public function index(){
            $objeto = new Producto();
            $producto = $objeto->getRandom(6);

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

        public function editar(){
            Utils::isAdmin();
            if ($_GET) {
               
                $objeto = new Producto();
                $editar = true;
                $id = (int)$_GET['id'];
                $objeto->setId($id);
                $pro = $objeto->getOne();
                require_once 'views/producto/crear.php';
            }else{
                header("Location:".base_url."producto/gestion");
            }
            
        }

        public function eliminar(){
            Utils::isAdmin();
            if($_GET){
                // var_dump($_GET);
                // die();
                $id = isset($_GET['id']) ? $_GET['id'] : false;

                if ($id) {
                    $objeto = new Producto();
                    $objeto->setId($id);
                    $delete = $objeto->delete();

                    if ($delete) {
                        $_SESSION['delete'] = 'delete_complete';
                    }
                }else{
                    $_SESSION['delete'] = 'delete_failed';
                }
            }else{
                $_SESSION['delete'] = 'delete_failed';
            }
            
            header("Location:".base_url."producto/gestion");
        }

        public function save(){
            Utils::isAdmin();
            if(isset($_POST)){
                
                //$accion = isset($_GET['id'])? true:false;
                $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
                $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
                $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
                $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
                $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
                $oferta = isset($_POST['oferta']) ? $_POST['oferta'] : false;
                

               

                //Validando que las variables no sean false
                if($categoria && $nombre && $descripcion && $precio && $stock && $oferta){
                    $objeto = new Producto();
                    $objeto->setCategioria_id($categoria);
                    $objeto->setNombre($nombre);
                    $objeto->setDescripcion($descripcion);
                    $objeto->setPrecio($precio);
                    $objeto->setStock($stock);
                    $objeto->setOferta($oferta);

                    //Guardar imagen
                    if (isset($_FILES['imagen']) && $_FILES['imagen'] != "") {
                        $file = $_FILES['imagen'];
                        $filename = $file['name'];
                        $mimetype = $file['type'];
                        
                        if ($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "image/gif") {
                            if (!is_dir('uploads/imagenes')) {
                                mkdir('uploads/imagenes', 0777, true);
                            }    
                            $objeto->setImagen($filename);
                            move_uploaded_file($file['tmp_name'],'uploads/imagenes/'.$filename);
                        }
                    }

                    if(isset($_GET['id']) && ($_GET['id']) != ""){
                        $id = $_GET['id'];                     
                        $objeto->setId($id);   
                        $save = $objeto->edit();
                        
                    }elseif(empty($_GET['id'])){
                        $save = $objeto->save();
                    }

                    if($save){
                        $_SESSION['producto'] = "Complete";
                    }else{
                        $_SESSION['producto'] = "failed";
                    }
                }else{
                    $_SESSION['producto'] = "failed";
                }
            }else{
                $_SESSION['producto'] = "failed";
            }

            header("Location:".base_url."producto/gestion");
        }
    }

?>