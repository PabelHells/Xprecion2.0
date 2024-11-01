<?php
include_once 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];

    $stat = $conexion->prepare("INSERT INTO medico(NOMBRE, passwords ) VALUES(?,?,?,?)");
    $stat->bind_param("ssss", $nombre, $area, $apellido_pa, $apellido_ma);
     
    if ($stat->execute()) {
        echo "Datos guardados";
    } else {
        echo "Error al guardar los datos: " . $stat->error;
    }
}
?>