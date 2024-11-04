<?php
include_once 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoge los datos del formulario
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Verifica que los campos no estén vacíos
    if (empty($username) || empty($password)) {
        echo '<script>
                alert("Por favor completa todos los campos.");
                window.location.href="login.html";
              </script>';
        exit;
    }

    // Cifra la contraseña antes de guardarla
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Prepara la consulta SQL para insertar el nuevo usuario
    $stat = $conexion->prepare("INSERT INTO medico (NOMBRE, passwords) VALUES (?, ?)");
    $stat->bind_param("ss", $username, $passwordHash);

    if ($stat->execute()) {
        echo '<script>
                alert("Datos guardados correctamente.");
                window.location.href="login.html";
              </script>';
    } else {
        echo "Error al guardar los datos: " . $stat->error;
    }
}
?>