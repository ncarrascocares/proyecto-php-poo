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
}
