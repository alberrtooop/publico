<?php 
session_start();


include_once "Seguridad.php";
include_once "./config/Sentencias.php";

// Intanciando mi objeto
$pregunta = new controladorFormularios();
//Session

if(isset($_SESSION["Validacion"])){
    if($_SESSION["Validacion"] != "ok"){
        header("location:MiPerfil.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS only -->
        <link rel='stylesheet' href='./CSS/estilos.css'>
        <title>Registro</title>
    </head>
    <body>  
        <div class="Salir"><a href="CerrarSession.php">Salir</a></div>
        <div class="CentroTabla">
            <table class="TablesCss">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Usuario</th>
                        <th>Email</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Actualizar</th>
                        <th>Borrar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $item = 1;
                    foreach ($pregunta->Mostrar() as $key => $value) {
                     ?>
                        <tr> 
                            <td><?php echo $item++ ?></td>
                            <td><?php echo $value["Usuario"] ?></td>
                            <td><?php echo $value["Email"] ?></td>
                            <td><?php echo $value["Nombre"] ?></td>
                            <td><?php echo $value["Apellidos"] ?></td>
                            <td>
                                <form action="borrar.php">
                                    <input class="inputImg" type="image" name="Actualizar" src="IMG/pencil.svg" alt=""/>
                                </form>
                            </td>
                            <td> 
                                <form action="actualizar.php">
                                    <input class="inputImg" type="image" name="Actualizar" src="IMG/trash.svg" alt=""/>
                                </form>             
                            </td>
                        </tr> 
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </body>
</html>

<?php
}else{
    header("location:index.php");
}
