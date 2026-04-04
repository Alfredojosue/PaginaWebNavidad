<?php include("../template/cabecera.php"); ?>
<?php

$txtID = (isset($_POST['idProducto'])) ? $_POST['idProducto'] : "";
$txtNombre = (isset($_POST['nombreProducto'])) ? $_POST['nombreProducto'] : "";
$txtDescripcion = (isset($_POST['descripcionProducto'])) ? $_POST['descripcionProducto'] : "";
$precio = (isset($_POST["precioProducto"])) ? $_POST["precioProducto"] : "";
$txtImagen = (isset($_FILES['imagenProducto']['name'])) ? $_FILES['imagenProducto']['name'] : "";
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

include("../../bd.php");


switch ($accion) {
    case 'Agregar':
        $sentenciaSQL = $conexion->prepare("INSERT INTO productos (nombreProducto, imagenProducto, descripcionProducto, precioProducto) VALUES (:nombre, :imagen, :descripcion , :precio);");
        $sentenciaSQL->bindParam(':nombre', $txtNombre);
        $sentenciaSQL->bindParam(':descripcion', $txtDescripcion);
        $sentenciaSQL->bindParam(':precio', $precio);


        $fecha = new DateTime();
        $nombreArchivo = ($txtImagen != "") ? $fecha->getTimestamp() . "_" . $_FILES["imagenProducto"]["name"] : "imagen.jpg";

        $tmpImagen = $_FILES["imagenProducto"]["tmp_name"];

        if ($tmpImagen != "") {
            move_uploaded_file($tmpImagen, "../../img/" . $nombreArchivo);
        }
        $sentenciaSQL->bindParam(':imagen', $nombreArchivo);
        $sentenciaSQL->execute();
        header("Location:productos.php");
        break;
    case 'Modificar':
        $sentenciaSQL = $conexion->prepare("UPDATE productos SET nombreProducto=:nombre, descripcionProducto=:descripcion,  precioProducto = :precio WHERE idProducto=:id");
        $sentenciaSQL->bindParam(':nombre', $txtNombre);
        $sentenciaSQL->bindParam(':descripcion', $txtDescripcion);
        $sentenciaSQL->bindParam(':precio', $precio);
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();

        if ($txtImagen != "") {

            $fecha = new DateTime();
            $nombreArchivo = ($txtImagen != "") ? $fecha->getTimestamp() . "_" . $_FILES["imagenProducto"]["name"] : "imagen.jpg";
            $tmpImagen = $_FILES["imagenProducto"]["tmp_name"];

            move_uploaded_file($tmpImagen, "../../img/" . $nombreArchivo);
            $sentenciaSQL = $conexion->prepare("SELECT imagenProducto FROM productos WHERE idProducto=:id");
            $sentenciaSQL->bindParam(':id', $txtID);
            $sentenciaSQL->execute();
            $productoI = $sentenciaSQL->fetch(PDO::FETCH_LAZY);

            if (isset($plantaI["imagenProducto"]) && ($productoI["imagenProducto"] != "imagen.jpg")) {
                if (file_exists("../../img/" . $productoI["imagenProducto"])) {
                    unlink("../../img/" . $productoI["imagenProducto"]);
                }
            }

            $sentenciaSQL = $conexion->prepare("UPDATE productos SET imagenProducto=:imagen WHERE idProducto=:id");
            $sentenciaSQL->bindParam(':imagen', $nombreArchivo);
            $sentenciaSQL->bindParam(':id', $txtID);
            $sentenciaSQL->execute();
        }
        header("Location:productos.php");
        break;
    case 'Cancelar':
        header("Location:productos.php");
        break;
    case 'Seleccionar':
        $sentenciaSQL = $conexion->prepare("SELECT * FROM productos WHERE idProducto=:id");
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();
        $productoI = $sentenciaSQL->fetch(PDO::FETCH_LAZY);
        $txtNombre = $productoI['nombreProducto'];
        $txtImagen = $productoI['imagenProducto'];
        $txtDescripcion = $productoI['descripcionProducto'];
        $precio = $productoI['precioProducto'];
        break;
    case 'Borrar':
        $sentenciaSQL = $conexion->prepare("SELECT imagenProducto FROM productos WHERE idProducto=:id");
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();
        $productoI = $sentenciaSQL->fetch(PDO::FETCH_LAZY);

        if (isset($plantaI["imagenProducto"]) && ($plantaI["imagenProducto"] != "imagen.jpg")) {
            if (file_exists("../../img/" . $plantaI["imagenProducto"])) {
                unlink("../../img/" . $plantaI["imagenProducto"]);
            }
        }

        $sentenciaSQL = $conexion->prepare("DELETE FROM productos WHERE idProducto=:id");
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();
        header("Location:productos.php");
        break;
}

$sentenciaSQL = $conexion->prepare("SELECT * FROM productos");
$sentenciaSQL->execute();
$listaProductos = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="col-md-5">
    <div class="card">
        <div class="card-header"> 
            <p class="h5"> <i class="bi bi-info-circle"> Datos del Producto</i></p>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="idProducto">ID:</label>
                    <input type="text" required readonly class="form-control" value="<?php echo $txtID; ?>"
                        name="idProducto" id="idProducto" placeholder="ID del producto">
                </div>

                <div class="form-group">
                    <label for="nombreProducto">Nombre:</label>
                    <input type="text" required class="form-control" value="<?php echo $txtNombre; ?>"
                        name="nombreProducto" id="nombreProducto" placeholder="Nombre del producto">
                </div>

                <div class="form-group">
                    <label for="imagenProducto">Imagen:</label>

                    <br>

                    <?php if ($txtImagen != "") { ?>
                        <img class="img-thumbnail rounded" src="../../img/<?php echo $txtImagen; ?>" width="50"
                            alt="Imagen Planta">
                    <?php } ?>

                    <input type="file" class="form-control" name="imagenProducto" id="imagenProducto">
                </div>

                <div class="form-group">
                    <label for="descripcionProducto">Descripción:</label>
                    <input type="text" required class="form-control" value="<?php echo $txtDescripcion; ?>"
                        name="descripcionProducto" id="descripcionProducto" placeholder="Descripción del producto">
                </div>


                <div class="form-group">
                    <label for="precioProducto">Precio:</label>
                    <input type="text" required class="form-control" value="<?php echo $precio; ?>"
                        name="precioProducto" id="precioProducto" placeholder="Precio del producto">
                </div>

                <div class="btn-group" role="group" aria-label="">
                    <button type="submit" name="accion" <?php echo ($accion == "Seleccionar") ? "disabled" : ""; ?>
                        value="Agregar" class="btn btn-success">Agregar</button>
                    <button type="submit" name="accion" <?php echo ($accion != "Seleccionar") ? "disabled" : ""; ?>
                        value="Modificar" class="btn btn-warning">Modificar</button>
                    <button type="submit" name="accion" <?php echo ($accion != "Seleccionar") ? "disabled" : ""; ?>
                        value="Cancelar" class="btn btn-info">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="col-md-7">
    <div class="card-header">
    <p class="h5"><i class="bi bi-archive-fill"> Productos Agregados</i></p>
    </div>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listaProductos as $producto) { ?>
                <tr>
                    <td>
                        <?php echo $producto['idProducto']; ?>
                    </td>
                    <td>
                        <?php echo $producto['nombreProducto']; ?>
                    </td>
                    <td>
                        <img class="img-thumbnail rounded" src="../../img/<?php echo $producto['imagenProducto']; ?>"
                            width="50" alt="Imagen">
                    </td>
                    <td>
                        <?php echo $producto['descripcionProducto']; ?>
                    </td>
                    <td>
                        <?php echo $producto['precioProducto']; ?>
                    </td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="idProducto" id="idProducto"
                                value="<?php echo $producto['idProducto']; ?>" />
                            <center>
                            <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary"/>
                            <br><br>
                            <input type="submit" name="accion" value="Borrar" class="btn btn-danger"/>
                            </center>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include("../template/pie.php"); ?>