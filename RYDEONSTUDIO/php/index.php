<<<<<<< HEAD
<?php
include_once 'conexion.php';

if ($_SERVER["REQUEST_METHOD"]= "POST"){
    $nombre = $_POST['nombre'];
    $email = $_POST('email');
    $telefono = $_POST('telefono'); 
    $direccion = $_POST('direccion');

    $stat = $conexion->prepare("INSERT INTO clientes(nombre, email, telefono, direccion)VALUES(?,?,?,?");
    $stat->bind_param("ssss", $nombre, $email, $telefono, $direccion);
     
    if ($stat->execute()){
        echo "Datos guardados";
     }else{
        echo "Error al guardar los datos" . $stat->error;
     }
}



=======
<?php
include_once 'conexion.php';

if ($_SERVER["REQUEST_METHOD"]= "POST"){
    $nombre = $_POST['nombre'];
    $email = $_POST('email');
    $telefono = $_POST('telefono'); 
    $direccion = $_POST('direccion');

    $stat = $conexion->prepare("INSERT INTO clientes(nombre, email, telefono, direccion)VALUES(?,?,?,?");
    $stat->bind_param("ssss", $nombre, $email, $telefono, $direccion);
     
    if ($stat->execute()){
        echo "Datos guardados";
     }else{
        echo "Error al guardar los datos" . $stat->error;
     }
}



>>>>>>> 217cb81 (creacion de formularios(Agregar rayosx, medico y areas) y conecion de estos con la base de datos)
?>