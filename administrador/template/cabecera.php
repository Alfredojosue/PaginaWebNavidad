<?php
session_start();
if(!isset($_SESSION["usuario"])){
    header("Location:../index.php");
}else{
    if ($_SESSION["usuario"] == "ok") {
        $nombreUsuario = $_SESSION["nombreUsuario"];
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Admin</title>
    <link rel="shortcut icon" href="/favicon.ico" />
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    


     <!-- ICONO DE LA PAGINA WEB -->
     <link rel="shortcut icon" href="../../assets/images/marsol.png" type="image/x-icon">

</head>

<body>

    <?php $url = "http://" . $_SERVER['HTTP_HOST'] . "/Mar&Sol/sitioWeb"; ?>
    
    <nav class="navbar navbar-expand navbar-light bg-light">
        <div class="nav navbar-nav ms-auto me-2 mb-2">
            <a class="nav-item nav-link active" href="inicio.php">Administrador del sitio web <span class="sr-only">(current)</span></a>
            <!-- <a class="nav-item nav-link" href="<?php echo $url; ?>/administrador/inicio.php">Inicio</a> -->
            <!-- <a class="nav-item nav-link" href="<?php echo $url; ?>/administrador/secciones/productos.php">Productos</a> -->
            <!-- <a class="nav-item nav-link" href="<?php echo $url; ?>/administrador/secciones/usuarios.php">Usuarios</a> -->
            <!-- <a class="nav-item nav-link" href="<?php echo $url; ?>">Ver página principal</a> -->
            <a class="nav-item nav-link" href="cerrarSesion.php">Cerrar sesión</a>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">