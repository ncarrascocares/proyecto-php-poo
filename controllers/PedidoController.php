<?php
require_once 'models/Pedido.php';
    class PedidoController{

        public function hacer(){
            
            require_once 'views/pedido/hacer.php';

        }

        public function add(){
            //En el caso de estar logeado
            if (isset($_SESSION['identity'])) {
                //Asignando los valores del formulario en variables locales
                $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false;
                $localidad = isset($_POST['localidad']) ? $_POST['localidad'] : false;
                $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
                
                // fichero con metodos para usuar en cualquier parte
                $stats = Utils::statsCarrito();
                $coste = $stats['total'];

                if ($provincia && $localidad && $direccion) {
                    //Pasando las variables al modelo donde se realizara el guardado en la bd
                    $objeto = new Pedido();
                    $objeto->setUsuario_id($_SESSION['identity']->id);
                    $objeto->setProvincia($provincia);
                    $objeto->setLocalidad($localidad);
                    $objeto->setDireccion($direccion);
                    $objeto->setCoste($coste);

                    $pedido = $objeto->save();

                    // Guardando en tabla linea_pedido
                    $save_linea = $objeto->save_linea();

                    //Verificnado que se halla guardado el pedido
                    if($pedido && $save_linea){
                        $_SESSION['pedido'] = "complete";
                    }else{
                        $_SESSION['pedido'] = "failed";
                    }
                }else{
                    $_SESSION['pedido'] = "failed";
                }
                
                header("Location:".base_url."pedido/confirmado");
            }else{
                //Sino, redirigir al index
                header("Location:".base_url);
            }
        }

        public function confirmado(){
            if (isset($_SESSION['identity'])) {
                $identity = $_SESSION['identity'];
                $objeto = new Pedido();
                $objeto->setUsuario_id($identity->id);
                
                $pedido = $objeto->getOneByUser();

                //Obteniendo datos desde la tabla linea_pedido
                $pedido_productos = new Pedido();
                $productos = $pedido_productos->getProductosByPedido($pedido->id);
            }
            
            require_once 'views/pedido/confirmado.php';
        }

        public function pedidos(){

            //Utilizando el metodo verficador de logeo del fichero Utils
            Utils::isIdentity();
            $usuario_id = $_SESSION['identity']->id;
            $objeto = new Pedido();

            //Sacando los pedidos del usuario desde el modelo
            $objeto->setUsuario_id($usuario_id);
            $pedidos = $objeto->getAllByUser();

            require_once 'views/pedido/mis_pedidos.php';
        }

        public function detalle(){
            //Utilizando el metodo verficador de logeo del fichero Utils
            Utils::isIdentity();
            if (isset($_GET['id'])) {
                $id = $_GET['id'];

                //Sacar el pedido
                $objeto = new Pedido();
                $objeto->setId($id);
                $pedido = $objeto->getOne();

                //Sacar los productos
                $pedido_productos = new Pedido();
                $productos = $pedido_productos->getProductosByPedido($id);

                require_once 'views/pedido/detalle.php';
            }else{
                header("Location:".base_url."pedido/pedidos");
            }
            
        }
       
    }



?>