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
            if(isset($_POST)){
                
                $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
                $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
                $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
                $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
                $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
                $oferta = isset($_POST['oferta']) ? $_POST['oferta'] : false;
                //$imagen = isset($_POST['imagen']) ? $_POST['imagen'] : "NULL";

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
                    $file = $_FILES['imagen'];
                    $filename = $file['name'];
                    $mimetype = $file['type'];
                    
                    if ($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "image/gif") {
                        if (!is_dir('uploads/imagenes')) {
                            mkdir('uploads/imagenes', 0777, true);
                        }

                        move_uploaded_file($file['tmp_name'],'uploads/imagenes/'.$filename);
                        $objeto->setImagen($filename);
                    }
                
                    $save = $objeto->save();
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