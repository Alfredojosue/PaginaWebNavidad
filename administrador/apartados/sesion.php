<?php
session_start();
$host = "localhost";
$usuario = "root";
$clave = "";
$bd = "sitio_plantas";

$conexion = mysqli_connect($host, $usuario, $clave, $bd);

if(!$conexion){
   die("No hay conexcion".mysqli_connect_error());
}


$user =htmlspecialchars($_POST["usuario"]);
$password = htmlspecialchars($_POST["contrasegna"]);

//realiza una consulta en la base dde datos
$sql = "SELECT * FROM usuarios WHERE usuario ='$user' and contrasegna = '$password'";
if ( $query = mysqli_query($conexion,$sql) ) {
    $nr = mysqli_fetch_row($query);
    if ($nr[1] > 0)
    {       
      header('Location: index.php');
    // echo "Haz ingresado !<br><a href='bienvenido.php'>Da click aqui</a>";

    } else{
    echo "No ingreso , por favor intentelo nuevamente";
    }
}