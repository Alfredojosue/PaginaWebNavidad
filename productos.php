<?php include("templates/cabeceraP.php"); ?>
<?php include("bd.php");
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
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
        <div  id="contenedor" class="container-sm w-50 p-2 rounded p-3 mb-5">
            <div class="input-group">
                <input class="form-control border-end-1 border rounded-pill" type="text" id="campo" name="campo"
                    value="" placeholder="Buscar..." id="search-input">
                <input class="btn btn-primary rounded-pill" type="submit" id="enviar" name="enviar" value="Buscar" />
            </div>
        </div>
    </form>
<!-- PARA VER CARRITO -->
<!-- <div class="fav" style="text-align: right;width:1300px ">
    <a href="carrito/verCarrito.php"><button class="btn" style="color: black;"><i class="fa-solid fa-cart-shopping"></i> carrito</button></a>
</div> -->
<?php foreach ($listaProductos as $productos) { ?>
<div class="col-md-4 p-4">
    <div class="card">
        <img class="card-im" src="./img/<?php echo $productos["imagenProducto"]; ?>"
            alt="Imagen Producto">
        <div class="card-body">
            <h4 name="nombreProducto">
                <?php echo $productos["nombreProducto"]; ?>
            </h4>
            <p name="descripcionProducto">Descripción:
                <?php echo $productos["descripcionProducto"]; ?>
            </p>
            <p hidden class="card-text" name="idProducto" style="text-align: center;">ID:
                <?php echo $productos["idProducto"]; ?>
            </p>
            <p name="precioProducto" style="text-align: center;">Precio:
                <?php echo $productos["precioProducto"]; ?>
            </p>
                <a href="./carrito/carrito.php" class="btn"><i class="bi bi-cart4"></i> Agregar</a>
        </div>
        <div class="card-footer text-muted">
            <p class="card-text" style="text-align: center;">Producto en Stock</p>
        </div>
    </div>
</div>
<?php } ?>