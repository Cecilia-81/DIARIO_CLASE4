<?php
session_start(); //inicio la sesion
extract($_REQUEST);
if (!isset($_SESSION['usuario_logueado'])) /*&& ($_SESSION['usuario_logueado']=="SI"))/*si el ususario
 no esta logueado lo manda al index tambien si en lugar de SI coloca admin, solo puede ingresar
 a la pagina el administrador*/
    header("location:index.php"); //lo mando al index

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="../lib/bootstrap-5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="../lib/bootstrap-5.3.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container-fluid">
        <?php require("menu.php"); ?>
        <h1>Usuarios</h1>
        <?php
        if (isset($mensaje)) //si el mensaje esta lo muestra. el mensaje viene de noticia nueva guardar al final la envia por linea de comando
            print("<h3 style='color:#cc00ff'>" . $mensaje . "</h3>");
        ?>
        <a href="usuario_nuevo.php" class="btn btn-primary">Agregar</a>
    </div>
    <table class="table">
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>editar</th>
            <th>borrar</th>
        </tr>
        <?php
        require("conexion.php");
        $conexion = mysqli_connect("$server_db", "$usuario_db", "$password_db") //aca nos conectamos a la BD
            or die("No se puede conectar con el servidor");
        mysqli_select_db($conexion, "$base_db")
            or die("No se puede seleccionar la base de datos");
        $instruccion = "select * from noticias order by fecha desc";
        //trabajar con super usuario y discriminacion de usuarios
        /*
        if(isset($_SESSION['SUPER']))
            $instruccion="select * from noticias order by fecha desc";
            else
             $instruccion="select * from noticias where id_usuario=".$_SESSION['id_usuario']." order by fecha desc";
       */
        $consulta = mysqli_query($conexion, $instruccion) or die("no puedo consultar");
        $nfilas = mysqli_num_rows($consulta);
        for ($i = 0; $i < $nfilas; $i++) {
            $resultado = mysqli_fetch_array($consulta);
            print('
                    <tr>
                    <td>' . trim($resultado['nombre']) . '</td>
                    <td>' . substr($resultado['apellido'], 0, 50) . '...</td>
                    <td><a href="usuarios_editar.php?id_usuario=' . $resultado['id_usuario'] . '"class="btn btn-secondary">editar</a></td>
                    <td><a href="usuarios_borrar.php?id_usuario=' . $resultado['id_usuario'] . '&imagen=' . $resultado['imagen'] . '" class="btn btn-danger" onclick="return confirm(&quot; Desea eliminar &quot;)">borrar</a></td>
                   
                    
                    </tr>
                    ');
        }
        mysqli_close($conexion);
        ?>
    </table>

</body>

</html>