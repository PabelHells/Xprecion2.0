function updateCalendar() {
    const month = parseInt(document.getElementById('month').value);
    const year = parseInt(document.getElementById('year').value);

    if (isNaN(month) || isNaN(year)) {
        alert('Por favor selecciona un mes y un año válidos.');
        return;
    }

    // Calcular los días del mes
    const daysInMonth = new Date(year, month + 1, 0).getDate();
    const firstDay = new Date(year, month, 1).getDay(); // Día de la semana del primer día del mes (0 = domingo)

    // Generar el calendario
    const calendar = document.createElement('table');
    calendar.className = 'table table-bordered';
    calendar.innerHTML = '<thead><tr><th>Dom</th><th>Lun</th><th>Mar</th><th>Mié</th><th>Jue</th><th>Vie</th><th>Sáb</th></tr></thead>';

    const tbody = document.createElement('tbody');
    let row = document.createElement('tr');

    // Añadir celdas vacías al inicio si el mes no empieza en domingo
    for (let i = 0; i < firstDay; i++) {
        row.appendChild(document.createElement('td'));
    }

    // Llenar los días del mes
    for (let day = 1; day <= daysInMonth; day++) {
        if (row.children.length === 7) {
            tbody.appendChild(row);
            row = document.createElement('tr');
        }

        const cell = document.createElement('td');
        cell.textContent = day;
        row.appendChild(cell);
    }

    // Añadir la última fila al cuerpo de la tabla
    tbody.appendChild(row);
    calendar.appendChild(tbody);

    // Mostrar el calendario generado
    const calendarContainer = document.getElementById('appointmentDate');
    calendarContainer.innerHTML = ''; // Limpiar calendario anterior
    calendarContainer.appendChild(calendar);
}