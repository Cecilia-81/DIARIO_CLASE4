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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

</head>

<body>
    <div class="container">
        <?php require("menu.php"); ?>
        <h1>Nuevo Usuario</h1>
        <form action="usuario_nuevo_guardar.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="Nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
            </div>
            <div class="mb-3">
                <label for="Apellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" required>
            </div>
            <div class="mb-3">
                <label for="Password" class="form-label">Password</label>
                <input type="text" class="form-control" id="password" name="password" placeholder="password" required>
            </div>
            <div class="mb-3">
                <label for="Usuario" class="form-label">Usuario</label>
                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="usuario" required>
            </div>
            <!--<div class="mb-3">
                <label for="cuerpo" class="form-label">Cuerpo</label>
                <textarea rows="10" class="form-control" id="cuerpo" name="cuerpo" required></textarea>
            </div>-->
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                <input type="file" class="form-control" id="imagen" name="imagen" required></input>
            </div>
            <div class="mb-3">
                <label for="tipo_usuario" class="form-label">Tipo de Usuario</label>
                <select type="file" class="form-control" id="tipo_usuario" name="tipo_usuario" required></input>
                    <option value="SuperUsuario">SuperUsuario</option>
                    <option value="Editor">Editor</option>
                    <option value="Carga">Carga</option>
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-success" id="enviar" name="enviar" value="Guardar">
            </div>

        </form>
        

        

    </div>
</body>

</html>