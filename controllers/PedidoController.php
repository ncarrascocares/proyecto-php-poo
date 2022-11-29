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
            require_once 'views/pedido/confirmado.php';
        }
       
    }



?>