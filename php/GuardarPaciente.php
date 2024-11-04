<?php

include_once 'conexion.php';

// Validar que los datos han sido enviados
if (isset($_POST['patientName']) && isset($_POST['birthDate'])) {
    // Obtener los datos del formulario
    $patientName = $_POST['patientName'];
    $birthDate = $_POST['birthDate'];

    // Preparar la consulta SQL para insertar el paciente
    $sql = "INSERT INTO pacientes (nombre, fecha_nacimiento) VALUES (?, ?)";
    $stmt = $conexion->prepare($sql);
    
    if ($stmt) {
        // Asignar valores y ejecutar la consulta
        $stmt->bind_param("ss", $patientName, $birthDate);
        if ($stmt->execute()) {
            echo "Paciente guardado correctamente.";
        } else {
            echo "Error al guardar el paciente: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta: " . $conexion->error;
    }
} else {
    echo "Datos incompletos. Por favor, intente nuevamente.";
}

$conexion->close();
?>