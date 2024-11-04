<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestión de Citas de Pacientes</title>
  
  <!-- Enlaces a Bootstrap CSS y JS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Enlace a FontAwesome para iconos -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
                            <li class="nav-item about">
                                <a class="nav-link" href="#acerca-de">Acerca de XPRECION</a>
                            </li>
                            <!-- Dropdown Menu for Servicios -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Servicios
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="AgregarRayosX.html">Rayos X</a></li>
                                    <li><a class="dropdown-item" href="cale.php">Médico</a></li>
                                    <li><a class="dropdown-item" href="Area.html">Área Médica</a></li>
                                    <li><a class="dropdown-item" href="servicios.html">Añadir Paciente</a></li>
                                </ul>
                            </li>
                            <li class="nav-item schedule">
                                <a class="nav-link" href="CestorCitas.php">Agenda tu cita</a>
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
  <div class="container mt-5">
    <div class="card w-100 mx-auto">
      <div class="card-header text-center">
        <h2 class="card-title">Gestión de Citas de Pacientes</h2>
      </div>
      <div class="card-body">
        
        <!-- Formulario de Registro del Paciente -->
        <div class="row mb-4">
          <div class="col-md-6">
            <form id="patientForm">
              <div class="mb-3">
                <label for="patientName" class="form-label">Nombre del Paciente</label>
                <input type="text" class="form-control" id="patientName" placeholder="Ingrese el nombre del paciente">
              </div>
              <div class="mb-3">
                <label for="birthDate" class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" id="birthDate">
              </div>
              <button type="button" class="btn btn-primary w-100" onclick="addPatient()">Agregar Paciente</button>
            </form> 
          </div>

          <!-- Selección de Pacientes Registrados -->
          <div class="col-md-6">
            <label class="form-label">Pacientes Registrados</label>
            <select id="patientList" class="form-select">
              <option value="" disabled selected>Seleccione un paciente</option>
            </select>
            <div id="appointmentDate" class="mt-3 text-success"></div> <!-- Muestra la fecha de cita -->
          </div>
        </div>
        
        <!-- Nuevas especialidades de la clínica -->
        <div class="mb-4">
          <label for="specialty" class="form-label">Seleccione una Especialidad:</label>
          <select id="specialty" class="form-select">
            <option value="" disabled selected>-- Seleccione una especialidad --</option>
            <option value="1">Tomografía Axial Multicorte</option>
            <option value="3">Angiotomografía</option>
            <option value="4">Ultrasonidos</option>
            <option value="5">Elastografía hepática</option>
            <option value="6">Musculoesquelético</option>
            <option value="7">Biopsias</option>
            <option value="10">Rayos X</option>
            <option value="11">Estudios contrastados</ion>
          </select>
        </div>

        <!-- Selección del Mes y Año -->
        <div class="mb-4">
          <label for="month" class="form-label">Seleccione un Mes:</label>
          <select id="month" class="form-select" onchange="updateCalendar()">
            <option value="0">Enero</option>
            <option value="1">Febrero</option>
            <option value="2">Marzo</option>
            <option value="3">Abril</option>
            <option value="4">Mayo</option>
            <option value="5">Junio</option>
            <option value="6">Julio</option>
            <option value="7">Agosto</option>
            <option value="8">Septiembre</option>
            <option value="9">Octubre</option>
            <option value="10">Noviembre</option>
            <option value="11">Diciembre</option>
          </select>
          <label for="year" class="form-label">Seleccione un Año:</label>
          <input type="number" id="year" class="form-control" value="2024" min="2020" max="2030" onchange="updateCalendar()">
        </div>

        <!-- Calendario de Citas Disponibles -->
        <div>
          <label class="form-label">Calendario de Citas Disponibles</label>
          <div id="calendar" class="d-flex flex-wrap border rounded p-2"></div>
        </div>

      </div>
    </div>
  </div>

  <script>
    // Variables para manejar los pacientes, citas y fechas disponibles
    const patients = [];
    const availableDates = [];
    let selectedPatientIndex = null;

    // Función para añadir pacientes
    function addPatient() {
      const name = document.getElementById("patientName").value;
      const birthDate = document.getElementById("birthDate").value;

      if (name && birthDate) {
        patients.push({ name, birthDate, appointmentDate: null });
        updatePatientList();
        
        document.getElementById("patientForm").reset();
      }
    }

    // Función para actualizar el selector de pacientes
    function updatePatientList() {
      const patientList = document.getElementById("patientList");
      patientList.innerHTML = '<option value="" disabled selected>Seleccione un paciente</option>';
      
      patients.forEach((patient, index) => {
        const option = document.createElement("option");
        option.value = index;
        option.textContent = `${patient.name} - Nacido: ${patient.birthDate}`;
        patientList.appendChild(option);
      });
    }

    // Manejar selección de paciente
    document.getElementById("patientList").addEventListener("change", (e) => {
      selectedPatientIndex = e.target.value;
      updateAppointmentDateDisplay();
    });

    // Actualiza la fecha de la cita en pantalla
    function updateAppointmentDateDisplay() {
      const appointmentDateDiv = document.getElementById("appointmentDate");
      if (selectedPatientIndex !== null && patients[selectedPatientIndex].appointmentDate) {
        appointmentDateDiv.textContent = `Fecha de Cita: ${patients[selectedPatientIndex].appointmentDate}`;
      } else {
        appointmentDateDiv.textContent = '';
      }
    }

    // Genera las fechas disponibles en el calendario excluyendo fines de semana
    function generateAvailableDates(month, year) {
      const start = new Date(year, month, 1);
      const end = new Date(year, month + 1, 0); // Último día del mes

      availableDates.length = 0;
      for (let date = start; date <= end; date.setDate(date.getDate() + 1)) {
        availableDates.push(new Date(date));
      }
    }

    // Renderiza el calendario en HTML
    function renderCalendar() {
      const calendar = document.getElementById("calendar");
      calendar.innerHTML = '';

      availableDates.forEach(date => {
        const dayDiv = document.createElement("div");
        dayDiv.className = "border p-2 m-1 text-center cursor-pointer";
        dayDiv.style.width = "14.2%"; // Aproximadamente 7 columnas
        dayDiv.textContent = date.getDate();
        dayDiv.title = date.toDateString();
        dayDiv.style.backgroundColor = '#d4edda';

        // Agrega un evento de clic para seleccionar la fecha
        dayDiv.addEventListener("click", () => {
          setAppointmentDate(date);
        });

        calendar.appendChild(dayDiv);
      });
    }

    // Función para establecer la fecha de cita para el paciente seleccionado
    function setAppointmentDate(date) {
      if (selectedPatientIndex !== null) {
        patients[selectedPatientIndex].appointmentDate = date.toDateString();
        updateAppointmentDateDisplay();
        alert(`Cita establecida para el ${date.toDateString()}`);
      } else {
        alert("Seleccione un paciente primero.");
      }
    }

    // Actualiza el calendario según el mes y año seleccionados
    function updateCalendar() {
      const month = parseInt(document.getElementById("month").value);
      const year = parseInt(document.getElementById("year").value);

      generateAvailableDates(month, year);
      renderCalendar();
    }

    // Inicializa el calendario y fechas disponibles al cargar la página
    document.addEventListener("DOMContentLoaded", () => {
      updateCalendar();
    });
  </script>
</body>
</html>