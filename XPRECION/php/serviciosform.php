<?php
include 'conexion.php';

if (isset($_POST['nombre'])){
    $nombre = $_POST['nombre'];
    $nacimiento = $_POST('fechaNacimiento');
    $telefono = $_POST('celular'); 
    $email = $_POST('correoElectronico');
    $direccion = $_POST('direccion');

    $stat = $conexion->prepare("INSERT INTO registro_de_paciente(NOMBRE, FECHA_DE_NACIMIENTO, CONTACTO, CORREO_ELECTRONICO, DIRECCION)VALUES(?,?,?,?,?)");
    $stat->bind_param("ssss", $nombre, $nacimiento, $telefono, $email, $direccion);
     
    if ($stat->execute())
    {
        echo "Datos guardados";
     }else{
        echo "error al guardar";
     }
    
}
?>