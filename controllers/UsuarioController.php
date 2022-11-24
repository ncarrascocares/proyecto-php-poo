<?php
require_once 'models/Usuario.php';
class UsuarioController
{

    public function index()
    {
        echo "Controlador Usuarios, Accion index";
    }

    public function registro()
    {
        require_once 'views/usuario/registro.php';
    }

    public function save()
    {
        if ($_POST) {
            //Validando que los campos exitan
            $nombre =   isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : false;
            $email =    isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;

            if ($nombre && $apellido && $email && $password) {
                $usuario = new Usuario();
                /*
                * Pasando la información recibida desde el formulario del fichero registro.php
                * a los metodos seteadores de la clase Usuario
                */
                $usuario->setNonbre($nombre);
                $usuario->setApellidos($apellido);
                $usuario->setEmail($email);
                $usuario->setPassword($password);

                #Imbocando el metodo "save" de la clase Usaurio que realiza el guardado de la información a la base de datos
                $guardar = $usuario->save();

                if ($guardar) {
                    $_SESSION['register'] = "complete";
                } else {
                    $_SESSION['register'] = "failed";
                }
            } else {
                $_SESSION['register'] = "failed";
            }
        } else {
            $_SESSION['register'] = "failed";
        }

        header("Location:" . base_url . "/usuario/registro");
    }

    #Método para realizar el logeo de los usuarios
    public function login(){
        if($_POST){
            //Instancia de un objeto de la clase Uusario
            $usuario = new Usuario();
            //1. Asignando los valores recibidos desde el formulario a los métodos seteadores de la clase Usuario
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);

            //2. Imbocando al método que realiza la consula a la base de datos
            $identity = $usuario->login();
           
            //3. Crear sesion
            if ($identity && is_object($identity)) {
                $_SESSION['identity'] = $identity;

                if ($identity->role == 'admin') {
                    $_SESSION['admin'] = true;
                }
            }else{
                $_SESSION['error_login'] = "Identificacion fallida";
            }
            
        }

        header("Location:".base_url);
    }
}
