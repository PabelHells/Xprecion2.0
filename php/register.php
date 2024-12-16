<?php
// Incluye el archivo de conexión a la base de datos
include 'conexion.php'; // Debe contener $conexion como la conexión activa a MySQL

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Verificar que los datos necesarios están en la solicitud POST
    if (isset($_POST['reg-username'], $_POST['reg-email'], $_POST['reg-password'], $_POST['reg-confirm-password'])) {
        // Sanitizar y validar los datos recibidos
        $username = htmlspecialchars(trim($_POST['reg-username']));
        $email = filter_var(trim($_POST['reg-email']), FILTER_VALIDATE_EMAIL);
        $password = trim($_POST['reg-password']);
        $confirm_password = trim($_POST['reg-confirm-password']);

        // Validaciones del formulario
        if (!$email) {
            die("Error: El correo electrónico no es válido.");
        }

        if (strlen($password) < 8) {
            die("Error: La contraseña debe tener al menos 8 caracteres.");
        }

        if ($password !== $confirm_password) {
            die("Error: Las contraseñas no coinciden.");
        }

        // Encriptar la contraseña
        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        // Generar el token de sesión (opcional, puede ser NULL)
        $token_sesion = bin2hex(random_bytes(32)); // Token único para el usuario
        $expiracion_token = date('Y-m-d H:i:s', strtotime('+7 days')); // Fecha de expiración: 7 días

        // Preparar la consulta SQL para insertar el nuevo usuario
        $sql = "
            INSERT INTO usuarios (nombre_usuario, email, contraseña_hash, token_sesion, expiracion_token) 
            VALUES (?, ?, ?, ?, ?)
        ";

        // Preparar la sentencia SQL
        $stmt = $conexion->prepare($sql);
        if (!$stmt) {
            die("Error en la preparación de la consulta: " . $conexion->error);
        }

        // Asignar los valores y ejecutar la consulta
        $stmt->bind_param("sssss", $username, $email, $password_hash, $token_sesion, $expiracion_token);
        if ($stmt->execute()) {
            // Configurar una cookie con el token de sesión (opcional, según la lógica de tu aplicación)
            setcookie("token_sesion", $token_sesion, [
                'expires' => time() + (86400 * 7), // 7 días
                'path' => '/',
                'secure' => true, // Solo en HTTPS
                'httponly' => true, // Inaccesible desde JavaScript
                'samesite' => 'Strict'
            ]);

            // Confirmación de registro exitoso
            echo "Registro exitoso. Bienvenido, $username.";
        } else {
            die("Error al registrar el usuario: " . $stmt->error);
        }

        // Cerrar la consulta
        $stmt->close();
    } else {
        die("Error: Faltan datos del formulario.");
    }
} else {
    die("Error: Solicitud no válida.");
}
?>