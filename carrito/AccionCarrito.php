<?php
// Iniciamos la clase de la carta
include 'elCarrito.php';
$cart = new Cart;
// include database configuration file
include("configuracion.php");
if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){
    if($_REQUEST['action'] == 'addToCart' && !empty($_REQUEST['idProducto'])){
        $productID = $_REQUEST['idProducto'];
        // get product details
        $query = $db->query("SELECT * FROM productos WHERE idProducto = ".$productID);
        $row = $query->fetch_assoc();
        $itemData = array(
            'idProducto' => $row['idProducto'],
            'nombreProducto' => $row['nombreProducto'],
            'precioProducto' => $row['precioProducto'],
            'qty' => 1
        );
        $insertItem = $cart->insert($itemData);
        $redirectLoc = $insertItem?'VerCarrito.php':'index.php';
        header("Location: ".$redirectLoc);
    }elseif($_REQUEST['action'] == 'updateCartItem' && !empty($_REQUEST['idProducto'])){
        $itemData = array(
            'rowid' => $_REQUEST['idProducto'],
            'qty' => $_REQUEST['qty']
        );
        $updateItem = $cart->update($itemData);
        echo $updateItem?'ok':'err';die;
    }elseif($_REQUEST['action'] == 'removeCartItem' && !empty($_REQUEST['idProducto'])){
        $deleteItem = $cart->remove($_REQUEST['idProducto']);
        header("Location: carrito.php");
    }else{
        header("Location: productos.php");
    }
}else{
    header("Location: index.php");
}