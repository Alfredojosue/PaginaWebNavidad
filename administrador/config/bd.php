<?php 
$host = "localhost";
$bd = "pagweb_navidad";
$usuario = "root";
$contrasegna = "";
try {
    $conexion = new PDO("mysql:host=$host; dbname=$bd",$usuario,$contrasegna);
    
} catch (Exception $ex) {
    echo $ex->getMessage();
}
?>