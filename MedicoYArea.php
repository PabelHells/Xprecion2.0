<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro de Médico</title>
    <link rel="stylesheet" href="MedicoYArea.css">
</head>
<body>
    <a href="index.html" class="back-button">Volver a la Página Principal</a>
    <p></p>
    <p></p>
    <p></p>
    <p></p>
    <p></p>
    <p></p>
    <h2>Formulario de Registro de Médico</h2>
    <form action="php/Medico.php" method="POST">
        <!-- Campo para el nombre del médico -->
        <label for="nombre">Nombre del médico:</label>
        <input type="text" id="nombre" name="nombre" maxlength="50" required>
        <br><br>

        <!-- Apellido paterno -->
        <label for="APELLIDO_PA">Apellido paterno:</label>
        <input type="text" id="APELLIDO_PA" name="APELLIDO_PA" maxlength="50" required>
        <br><br>

        <!-- Apellido materno -->
        <label for="APELLIDO_MA">Apellido materno:</label>
        <input type="text" id="APELLIDO_MA" name="APELLIDO_MA" maxlength="50" required>
        <br><br>

        <!-- Combo box de Área -->
        <label for="mi_combo">Área:</label>
<select id="mi_combo" name="Area"> <!-- El name debe coincidir con el PHP -->
    <?php
    include_once 'php/conexion.php';
    $query = "SELECT ID_AREA, AREA FROM area_medico";
    $result = $conexion->query($query);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row['ID_AREA'] . '">' . htmlspecialchars($row['AREA']) . '</option>';
        }
    } else {
        echo "<option>No se encontraron áreas</option>";
    }
    ?>
    </select>
        
        <br><br>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>