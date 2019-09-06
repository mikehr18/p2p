<?php
include 'session.php';
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Página de Inicio</title>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!-- for-mobile-apps -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Flat Login Form Widget Responsive, Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<!-- //for-mobile-apps -->
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Signika:400,600' rel='stylesheet' type='text/css'>
<!--google fonts-->
</head>
<body>
<!--header start here-->
<h1>Página de Inicio</h1>
<div class="header agile">
	<div class="wrap">
		<div class="login-main wthree">
			<div class="login">
			<h3>Bienvenid@ al sistema  <i><?php echo $login_session; ?></i></h3>
			<a href="archivos.html"><h4>Ver archivos disponibles</h4></a>
	<?php
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
echo $ip;?>
			<form action="file.php" method="post" enctype="multipart/form-data">
            <input type="file" name="archivo" id="archivo">
            <input type="submit" value="Subir archivo">

        </form>
		<script>
			var insertar_en = document.querySelector("#archivos ul");
			file_in = document.querySelector("#files")
			file_in.onchange = function(e){
				var files = e.target.files;
				for(var i=0,f;f= files[i];++i){
					var archivo = document.createElement("li");
					archivo.innerHTML = f.name + " - (<b>" + f.type + "</b>) ->" + f.size;insertar_en.appendChild(archivo);
				}
			}


		</script>


			<div class="clear"> </div>
				<h4><a href="logout.php"> Cerrar sesión</a></h4>
			</div>


		</div>
	</div>
</div>
<!--header end here-->



</body>
</html>
