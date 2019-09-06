<?php

session_start();
$username=$_SESSION['id'];
echo $username;
// Estableciendo la conexion a la base de datos
include("config/db.php");//Contienen las variables, el servidor, usuario, contraseña y nombre  de la base de datos
include("config/conexion.php");//Contiene de conexion a la base de datos
if ($_FILES['archivo']["error"] > 0)

  {
  echo "Error: " . $_FILES['archivo']['error'] . "<br>";
  }

else
  {
  echo "Nombre: " . $_FILES['archivo']['name'] . "<br>";
  echo "Tipo: " . $_FILES['archivo']['type'] . "<br>";
  echo "Tamaño: " . ($_FILES["archivo"]["size"] / 1024) . " kB<br>";
  //echo "Carpeta temporal: " . $_FILES['archivo']['tmp_name'];

$sql = "INSERT INTO archivos (nombre,peso,id_login) values ('". $_FILES['archivo']['name'] . "','". ($_FILES["archivo"]["size"] / 1024) . "', '".$username."');" ;
$query=mysqli_query($con,$sql);

  move_uploaded_file($_FILES['archivo']['tmp_name'], "subidas/" . $_FILES['archivo']['name']);
  
  }

?><!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
  <title>Lista de archivos</title>
</head>

<body>
  <div class="container">
    <a href="profile.php"><h4>Inicio</h4></a>
		<a href="archivos.html"><h4>Ver archivos disponibles</h4></a>
  </div>
  <script src="js/jquery-3.4.1.min.js"></script>
  
</body>

</html>
