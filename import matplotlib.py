import matplotlib.pyplot as plt
import numpy as np

# Datos
actividades = [
    'Descansar',
    'Ir al cine',
    'Ver televisión',
    'Visitas a familiares',
    'Salir de paseo',
    'Hacer día de campo',
    'Asistir a la iglesia'
]

sabado = [99, 112, 53, 25, 111, 19, 37]
domingo = [149, 38, 97, 125, 39, 131, 113]

# Gráfica de barras para el Sábado
plt.figure(figsize=(12, 6))
plt.bar(actividades, sabado, color='skyblue')
plt.title('Preferencias de Actividades Recreativas en Sábado')
plt.xlabel('Actividades')
plt.ylabel('Número de Personas')
plt.xticks(rotation=45)
plt.grid(axis='y')
plt.tight_layout()
plt.savefig('/mnt/data/preferencias_sabado.png')
plt.close()

# Gráfica de barras para el Domingo
plt.figure(figsize=(12, 6))
plt.bar(actividades, domingo, color='salmon')
plt.title('Preferencias de Actividades Recreativas en Domingo')
plt.xlabel('Actividades')
plt.ylabel('Número de Personas')
plt.xticks(rotation=45)
plt.grid(axis='y')
plt.tight_layout()
plt.savefig('/mnt/data/preferencias_domingo.png')
plt.close()

# Gráfica de barras múltiple
bar_width = 0.35
x = np.arange(len(actividades))

plt.figure(figsize=(12, 6))
plt.bar(x - bar_width/2, sabado, width=bar_width, label='Sábado', color='skyblue')
plt.bar(x + bar_width/2, domingo, width=bar_width, label='Domingo', color='salmon')
plt.title('Preferencias de Actividades Recreativas (Sábado vs Domingo)')
plt.xlabel('Actividades')
plt.ylabel('Número de Personas')
plt.xticks(x, actividades, rotation=45)
plt.legend()
plt.grid(axis='y')
plt.tight_layout()
plt.savefig('/mnt/data/preferencias_multiple.png')
plt.close()

('/mnt/data/preferencias_sabado.png', '/mnt/data/preferencias_domingo.png', '/mnt/data/preferencias_multiple.png')
