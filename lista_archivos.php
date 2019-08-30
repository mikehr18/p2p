<?php
require_once 'Funciones.php';

switch ($_POST['accion']) {
    case 'obtener_archivos':
        $funcion = new Funciones();
        $resultado = $funcion->obtener_archivos();
        break;
        
    default:
        $resultado = '';
        break;
    }
return $resultado;