<?php
    session_start();//llama la variable session
    //session start crea la sesion pero si ya hay una creada usa esa
    session_destroy();//destruye la session
    header("location:index.php");// me manda al index
?>