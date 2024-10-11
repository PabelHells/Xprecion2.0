<?
include_once
("config.php");
if ($_SERVER("REQUEST_METHO") == "POST");

try{
    $database = new conexion[];
    $database->conectar();
}
?>