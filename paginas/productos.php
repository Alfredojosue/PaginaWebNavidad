<?php include("./templates/cabecera.php"); ?>
<?php
include("../administrador/config/bd.php");
//****************Para buscar productos*********
$where = "";
if (!empty($_POST)) {
    $valor = $_POST['campo'];
    if (!empty($valor)) {
        $where = "WHERE nombreProducto LIKE '%$valor%' ";
    }
}
$sentenciaSQL = $conexion->prepare("SELECT * FROM productos $where");
$sentenciaSQL->execute();
$listaProductos = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="wrapper">
    <ul class="nav justify-content-end">
        <li class="nav-item">
            <a class="nav-link link-light" href="index.php">
                <p class="h5">Regresar</p>
            </a>
        </li>
    </ul>
</div>
<br>
<br>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
    <div class="container-sm w-50 p-2 rounded p-3 mb-5">
        <div class="input-group">
            <input class="form-control border-end-1 border rounded-pill" type="text" id="campo" name="campo" value=""
                placeholder="Buscar..." id="search-input">
            <input class="btn btn-primary rounded-pill" type="submit" id="enviar" name="enviar" value="Buscar"/>
        </div>
    </div>
</form>
<!-- PARA VER CARRITO -->
<!-- <div class="fav" style="text-align: right;width:1300px ">
    <a href="carrito/verCarrito.php"><button class="btn" style="color: black;"><i class="fa-solid fa-cart-shopping"></i> carrito</button></a>
</div> -->
<br><br><br>
<?php foreach ($listaProductos as $productos) { ?>
    <div class="col-md-3 p-3">
            <div class="card">
                <img class="card-img-top img-thumbnail rounded" src="../img/<?php echo $productos["imagenProducto"]; ?>"
                    alt="Imagen Producto">
                <div class="card-body">
                    <h4 class="card-title" name="nombreProducto" style="text-align:center;">
                        <?php echo $productos["nombreProducto"]; ?>
                    </h4>
                    <p class="card-text" name="descripcionProducto" style="text-align: center;">Descripción:
                        <?php echo $productos["descripcionProducto"]; ?>
                    </p>
                    <p  hidden class="card-text" name="idProducto" style="text-align: center;">ID:
                        <?php echo $productos["idProducto"]; ?>
                    </p>
                    <p class="card-text" name="precioProducto" style="text-align: center;">Precio:
                        <?php echo $productos["precioProducto"]; ?>
                    </p>
                    <!-- <center>
                    <a class="btn btn-success" href="?>"
                    >Agregar al carrito</a>
                    </center> -->
                </div>
                <div class="card-footer text-muted">
                    <p class="card-text" style="text-align: center;">Producto en Stock</p>
                </div>
            </div>        
    </div>
    
<?php } ?>