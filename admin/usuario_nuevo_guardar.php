<?php
session_start();
    extract($_REQUEST);
if (!isset($_SESSION['usuario_logueado']))
header("location:index.php");
// si no esta logueado lo saca

require("conexion.php");
//var_dump($_REQUEST);

$conexion = mysqli_connect("$server_db", "$usuario_db", "$password_db")//aca nos conectamos a la BD
    or die("No se puede conectar con el servidor");
mysqli_select_db($conexion, "$base_db")
    or die("No se puede seleccionar la base de datos");
$fecha=date("Y-m-d");
$id_usuario=$_SESSION['id_usuario'];
//metodo1
$nombre=mysqli_real_escape_string($conexion,$nombre);
$apellido=mysqli_real_escape_string($conexion,$apellido);
$password=mysqli_real_escape_string($conexion,$password);
$usuario=mysqli_real_escape_string($conexion,$usuario);
$tipo_usuario=mysqli_real_escape_string($conexion,$tipo_usuario);


//subir imagen
$copiarArchivo=false;
if(is_uploaded_file($_FILES['imagen']['tmp_name']))/*primero pregunto si se subio un archivo al servidor
is uploaded file, luego con $files lo guardo con el nombre que trae, en este caso imagen, en el temporal */
{
// las imagenes se van a gurdar en imagenes subidas
$nombreDirectorio="../imagenes_subidas/";//con ..salgo del directorio
$idUnico=time();
$nombreFichero=$idUnico.$_FILES['imagen']['name'];
$copiarArchivo=true;
}
else // en caso de que no se envie imagen
    $nombreFichero="";
if($copiarArchivo)
move_uploaded_file($_FILES['imagen']['tmp_name'],$nombreDirectorio.$nombreFichero);

$instruccion="insert into usuarios (nombre,apellido,password,usuario,tipo_usuario) values ('$nombre','$apellido','$password','$usuario','$tipo_usuario')";
$consulta=mysqli_query($conexion,$instruccion)
        or die("no se pudo insertar");
        //metodo 2
    /*$stmt=mysqli_prepare($conexion,"insert into noticias (titulo,copete,cuerpo,imagen,categoria,id_usuario,fecha) values (?,?,?,?,?,?,?)");
    mysqli_stmt_bind_param($stmt,'sssssds', $titulo,$copete,$cuerpo,$imagen,$categoria,$id_usuario,$fecha);
   mysqli_stmt_execute($stmt);*/
mysqli_close($conexion);
header("location:usuarios.php?mensaje=Guardo");

?>