<?php
include 'config/db.php';
class Funciones
{
    public function __construct()
    {
        $this->con = @mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if (!$this->con) {
            die("Imposible conectarse: " . mysqli_error($con));
        }
        if (@mysqli_connect_errno()) {
            die("Conexión falló: " . mysqli_connect_errno() . " : " . mysqli_connect_error());
        }
    }

    public function obtener_archivos()
    {
        $lista_archivos = array();
        $query = "SELECT login.email, login.ip, archivos.nombre from archivos inner join login on login.id = archivos.id_login;";
        $datos = mysqli_query($this->con, $query);
        if (mysqli_num_rows($datos) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($datos)) {
                $archivo = ['nombre' => $row['archivos.nombre'], 'propietario' => $row['login.email'], 'ip' => $row['login.ip']];
                array_push($lista_archivos, $archivo);
            }
        }
        return json_encode($lista_archivos);
    }
}
