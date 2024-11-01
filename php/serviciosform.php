<?php
include_once 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $nacimiento = $_POST['fechaNacimiento'];
    $contacto = $_POST['celular'];
    $correo = $_POST['correoElectronico'];
    $ubicacion = $_POST['direccion'];

    $stat = $conexion->prepare("INSERT INTO registro_de_paciente(NOMBRE, FECHA_DE_NACIMIENTO, CONTACTO, CORREO_ELECTRONICO, DIRECCION) VALUES(?, ?, ?, ?, ?)");
    $stat->bind_param("sssss", $nombre, $nacimiento, $contacto, $correo, $ubicacion);
     
    if ($stat->execute()) {
        echo "Datos guardados";
    } else {
        echo "Error al guardar los datos: " . $stat->error;
    }
}
?>