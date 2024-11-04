<?php
include_once 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $area = $_POST['Area'];
    $apellido_pa = $_POST['APELLIDO_PA'];
    $apellido_ma = $_POST['APELLIDO_MA'];

    $stat = $conexion->prepare("INSERT INTO medico(NOMBRE, ID_AREA, APELLIDO_PA, APELLIDO_MA) VALUES(?,?,?,?)");
    $stat->bind_param("ssss", $nombre, $area, $apellido_pa, $apellido_ma);
     
    if ($stat->execute()) {
        echo "Datos guardados";
    } else {
        echo "Error al guardar los datos: " . $stat->error;
    }
}
?>