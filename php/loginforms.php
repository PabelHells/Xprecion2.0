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
        // Usuario no encontrado
        echo '<script>
                alert("Usuario no encontrado.");
                window.location.href="index.html"; // Cambia al archivo correcto si es necesario
              </script>';
    }
}
?>