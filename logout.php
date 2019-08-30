<?php

session_start();
$username=$_SESSION['id'];
include("config/db.php");//Contienen las variables, el servidor, usuario, contraseña y nombre  de la base de datos
include("config/conexion.php");

$ses_sqll=mysqli_query($con, "UPDATE archivos set activo=0 where id_login='".$username."'");
$row = mysqli_fetch_assoc($ses_sqll);
session_start();
if(session_destroy()) // Destruye todas las sesiones
{
  
header("Location: index.php"); // Redireccionando a la pagina index.php
}
?>