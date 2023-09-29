<?php
session_start(); //inicio la sesion
if (isset($_SESSION['usuario_logueado']))
    header("location:home.php");
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
        <div class="row">
            <div>
                <?php
                if (isset($_SESSION['mensaje'])) //aca pregunto si la variable isset de session existe
                {
                    print("<p>" . $_SESSION['mensaje'] . "</p>");
                    /*Con echo debo usar comillas dobles si o si, con print 
                    puedo usar simple o doble*/
                    unset($_SESSION['mensaje']);/*luego de mostrar el mensaje lo borro al apretar f5*/
                }
                ?>

                 <!--<form action="login.php" method="post">
                 <div class="mb-3">
                    <label for="USUARIO" class="form-label">Usuario</label>
                    <input type="text" class="form-control" id="usuario" name="usuario"placeholder="usuario"required> 
                </div>
                <div class="mb-3">
                    <label for="PASSWORD" class="form-label">Password</label>
                    <input type="PASSWORD" class="form-control" id="password" name="password"placeholder="password"required> 
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" id="enviar" name="enviar" value="Loguearse"> 
                </div>
            </form>

            </div>
        </div>-->
        <form action="login.php" method="post">
        <section class="vh-100 gradient-custom">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-dark text-white" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">

                                <div class="mb-md-5 mt-md-4 pb-5">

                                    <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                    <p class="text-white-50 mb-5">Ingrese su Usuario y Contraseña</p>

                                    <div class="form-outline form-white mb-4">
                                        <label for="USUARIO" class="form-label">Usuario</label>
                                        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="usuario" required>
                                      <!--  <input type="text" id="usuario" class="form-control form-control-lg" />
                                        <label class="form-label" for="typeEmailX">Email</label>-->
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <label for="PASSWORD" class="form-label">Contraseña</label>
                                        <input type="PASSWORD" class="form-control" id="password" name="password" placeholder="contraseña" required>
                                        <!-- <input type="password" id="typePasswordX" class="form-control form-control-lg" />
                                        <label class="form-label" for="typePasswordX">Password</label>-->
                                     </div>
                                     
                                 <input type="submit" class="btn btn-outline-light btn-lg px-5" id="enviar" name="enviar" value="Loguearse">
                                  
                                    
                                 
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        </form>


</body>

</html>