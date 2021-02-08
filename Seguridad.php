<?php 
if(!isset($_SESSION)){
    session_start();
}

require_once "./config/Sentencias.php";

class controladorFormularios {
    /*     * ************ *************************************** */
    /*                    REGISTROS                               */
    /*     * **************************************************** */

    static public function Registro() {
        if (isset($_POST["btnCrear"])) {     
            if($_POST["RePass"] == $_POST["RePass2"]){
                if (filter_var($_POST["ReEmail"], FILTER_VALIDATE_EMAIL)) {                      
                    $Tabla = "usuario";                       
                    $Datos = array(                            
                        "Usuario" => $_POST["ReEmail"],                           
                        "Email" => $_POST["ReEmail"],                          
                        "Pass" => $_POST["RePass"],                         
                        "Nombre" => $_POST["ReNom"],                     
                        "Apellidos" => $_POST["ReApe"],                   
                         "Rol" => 'Usuario'
                    );
                    Sentencias::RegistroUsuario($Tabla, $Datos);
                } else {
                    header("location:registro.php");
                }
            }else {
                header("location:registro.php");
            }
        }
    }


    /*     * **************************************************** */
    /*                     INGRESO                                */
    /*     * **************************************************** */

    public function Ingreso() {

        if (isset($_POST["btnEntrar"])) {
            $Tabla = "usuario";
            $Campo = "Email";
            $Usuario = $_POST["ValUsu"];
            $respuesta = Sentencias::IngresoUsuario($Tabla, $Campo, $Usuario);
        

           
             if($respuesta["Email"] == $_POST["ValUsu"] && $respuesta["Pass"] == $_POST["Valpass"]){            
                $_SESSION["Validacion"] = "ok";
                sleep(2);
                header("location:MiPerfil.php");
            }else{
                header("location:index.php");
            
           } 
        }
    }

    /*     * **************************************************** */
    /*                     MOSTRAR                                */
    /*     * **************************************************** */

    public function Mostrar() {
        $Tabla = "usuario";
        return Sentencias::MostrarUsuario($Tabla);
    }

}

$pregunta = new controladorFormularios();

if (isset($_POST["btnCrear"])) {
    $pregunta->Registro();
}
if (isset($_REQUEST["btnEntrar"])) {
    $pregunta->Ingreso();
}