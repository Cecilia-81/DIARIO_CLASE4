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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container-fluid">
       <?php require("menu.php");?>
    </div>
</body>

</html>