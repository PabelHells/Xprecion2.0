<?php
include_once 'conexion.php';

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener datos del formulario y validar
$appointmentDate = isset($_POST['appointmentDate']) ? $_POST['appointmentDate'] : null;
$specialty = isset($_POST['specialty']) ? $_POST['specialty'] : null;
$patientId = isset($_POST['patientId']) ? $_POST['patientId'] : null;

if ($appointmentDate && $specialty && $patientId) {
    // Preparar la consulta
    $stmt = $conn->prepare("INSERT INTO citas (fecha_cita, especialidad, id_paciente) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $appointmentDate, $specialty, $patientId);

    // Ejecutar y verificar resultado
    if ($stmt->execute()) {
        echo "Cita registrada exitosamente.";
    } else {
        echo "Error al registrar la cita: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Por favor complete todos los campos.";
}

// Cerrar conexión
$conn->close();
?>