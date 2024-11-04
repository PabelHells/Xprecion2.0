
<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Datos de registro
    $nombre_usuario = $_POST['nombre_usuario'];
    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];
    
    // Encriptar contraseña
    $contraseña_hash = password_hash($contraseña, PASSWORD_BCRYPT);
    
    // Crear token de sesión
    $token_sesion = bin2hex(random_bytes(32));
    $expiracion_token = date('Y-m-d H:i:s', strtotime('+7 days'));

    // Insertar en la base de datos
    $stmt = $conexion->prepare("INSERT INTO usuarios (nombre_usuario, email, contraseña_hash, token_sesion, expiracion_token) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nombre_usuario, $email, $contraseña_hash, $token_sesion, $expiracion_token);
    
    if ($stmt->execute()) {
        // Configurar la cookie de sesión para mantener al usuario registrado
        setcookie("token_sesion", $token_sesion, time() + (86400 * 7), "/"); // Expira en 7 días
        echo "Registro exitoso y sesión iniciada.";
    } else {
        echo "Error en el registro: " . $stmt->error;
    }
    $stmt->close();
}
?>