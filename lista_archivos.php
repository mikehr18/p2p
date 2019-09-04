<?php
include 'config/db.php';

$con = @mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if (!$con) {
            die("Imposible conectarse: " . mysqli_error($con));
        }
        if (@mysqli_connect_errno()) {
            die("Conexión falló: " . mysqli_connect_errno() . " : " . mysqli_connect_error());
        }

$lista_archivos = array();
        $query = "SELECT login.email, login.ip, archivos.nombre from archivos inner join login on login.id = archivos.id_login where login.activo = 1;";
        $datos = mysqli_query($con, $query);
        if (mysqli_num_rows($datos) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($datos)) {
                //$archivo = ['nombre' => $row['archivos.nombre'], 'propietario' => $row['login.email'], 'ip' => $row['login.ip']];
                $archivo = ['nombre' => $row['nombre'], 'propietario' => $row['email'], 'ip' => $row['ip']];
                array_push($lista_archivos, $archivo);
            }
        }
        echo json_encode($lista_archivos);

/*switch ($_POST['accion']) {
    case 'obtener_archivos':
        $funcion = new Funciones();
        $resultado = $funcion->obtener_archivos();
        break;
        
    default:
        $resultado = '';
        break;
    }*/
