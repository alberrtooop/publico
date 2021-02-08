<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/estilos.css">
    <title>Registro</title>
</head>
<body>  
        <form class="contacto" action="Seguridad.php" method="POST">
            <div>
                <label for="Email">Usuario</label>
                <input type="text" name="ValUsu"/>
            </div>
            <div>
                <label for="Pass">Contraseña</label>
                <input type="password" name="Valpass"/>
            </div>
            <div>
                <input type="submit" name="btnEntrar" value="Entrar"/>
            </div>
            <div class="letraA"><a href="registro.php">Registrate ahora</a></div>
        </form>
</body>
</html>
