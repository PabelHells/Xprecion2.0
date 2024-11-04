<?php
include_once 'conexion.php';

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener datos del formulario
$appointmentDate = $_POST['appointmentDate'];
$specialty = $_POST['specialty'];
$patientId = $_POST['patientId'];

// Insertar datos de la cita en la tabla
$sql = "INSERT INTO citas (fecha_cita, especialidad, id_paciente) VALUES ('$appointmentDate', '$specialty', '$patientId')";

if ($conn->query($sql) === TRUE) {
    echo "Cita registrada exitosamente.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>