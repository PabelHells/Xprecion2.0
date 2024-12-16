<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro de Médico</title>
    <link rel="stylesheet" href="MedicoYArea.css">
    <link rel="stylesheet" href="MedicoYArea.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="styles.css">

</head>
<header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
                <div class="container">
                    <a class="navbar-brand" href="index.html">
                        <img src="logo.jpg" alt="XPRECION Logo" style="width: 40px; height: auto;" class="d-inline-block align-text-top">
                        XPRECION
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item menu-active">
                                <a class="nav-link" href="index.html">Home</a>
                            </li>
                            <!-- Dropdown Menu for Servicios -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Servicios
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="AgregarRayosX.html">Rayos X</a></li>
                                    <li><a class="dropdown-item" href="MedicoForm.php">Médico</a></li>
                                    <li><a class="dropdown-item" href="Area.html">Área Médica</a></li>
                                    <li><a class="dropdown-item" href="servicios.html">Añadir Paciente</a></li>
                                </ul>
                            </li>
                            <li class="nav-item schedule">
                                <a class="nav-link" href="GestorCitas.html">Agenda tu cita</a>
                            </li>
                        </ul>
                        <div class="d-flex">
                            <a href="register.html" class="btn btn-outline-primary me-2">Registrar Usuario</a>
                            <a href="login.html" class="btn btn-outline-secondary">Iniciar Sesión</a>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script>
        // Función para abrir/cerrar el widget de quejas
        function toggleWidget() {
            var widget = document.getElementById('quejas-widget');
            var display = window.getComputedStyle(widget).display;
            widget.style.display = (display === "none") ? "block" : "none";
        }
    </script>
</body>
</html>