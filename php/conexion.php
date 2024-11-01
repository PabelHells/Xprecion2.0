<?php

$host = "localhost";
$usuario = "root";
$contraseña= "";
$baseDatos = "xprecion2";
$conexion = new mysqli(hostname: $host, username: $usuario, password: $contraseña, database: $baseDatos);

if ($conexion->connect_error){
    die("Fallo en la conexión: " . $conexion->connect_error);
}// Solo muestra el mensaje si $mostrar_mensaje_conexion está definida y es verdadera
if (isset($mostrar_mensaje_conexion) && $mostrar_mensaje_conexion) {
    echo "Conexión exitosa";
}

?>