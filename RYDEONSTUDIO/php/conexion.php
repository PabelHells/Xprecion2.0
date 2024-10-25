<?php
// Configuración de la conexión
$host = "localhost";  // Servidor (en XAMPP es localhost)
$usuario = "root";     // Usuario de MySQL (en XAMPP el usuario por defecto es root)
$contraseña = "";      // Contraseña de MySQL (en XAMPP por defecto es una cadena vacía)
$base_de_datos = "xprecion";  // Nombre de tu base de datos

// Crear la conexión usando MySQLi
$conexion = new mysqli($host, $usuario, $contraseña, $base_de_datos);

// Verificar si la conexión tuvo éxito
if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

// Si llegamos aquí, la conexión fue exitosa
echo "Conexión exitosa a la base de datos!";
?>