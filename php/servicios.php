<?php
include_once 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido_pa = $_POST['apellidoPaterno'];
    $apellido_ma = $_POST['apellidoMaterno'];
    $nacimiento = $_POST['fechaNacimiento'];
    $telefono = $_POST['celular'];
    $correo = $_POST['correoElectronico'];
    $direccion = $_POST['direccion'];

    $stat = $conexion->prepare("INSERT INTO registro_de_paciente(NOMBRE, APELLIDO_PA, APELLIDO_MA, FECHA_DE_NACIMIENTO, CORREO_ELECTRONICO, DIRECCION, CONTACTO) VALUES(?,?,?,?,?,?,?)");
    $stat->bind_param("sssssss", $nombre, $apellido_pa, $apellido_ma, $nacimiento, $telefono, $correo, $direccion );
     
    if ($stat->execute()) {
        echo "Datos guardados";
    } else {
        echo "Error al guardar los datos: " . $stat->error;
    }
}
?>