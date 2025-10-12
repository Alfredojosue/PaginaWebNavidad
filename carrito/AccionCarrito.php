<?php
// Iniciamos la clase de la carta
include 'el-carrito.php';
$cart = new Cart;
// include database configuration file
include("configuracion.php");
if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){
    if($_REQUEST['action'] == 'addToCart' && !empty($_REQUEST['txtID'])){
        $productID = $_REQUEST['txtID'];
        // get product details
        $query = $db->query("SELECT * FROM plantas WHERE txtID = ".$productID);
        $row = $query->fetch_assoc();
        $itemData = array(
            'txtID' => $row['txtID'],
            'txtNombre' => $row['txtNombre'],
            'precio' => $row['precio'],
            'qty' => 1
        );
        $insertItem = $cart->insert($itemData);
        $redirectLoc = $insertItem?'VerCarrito.php':'index.php';
        header("Location: ".$redirectLoc);
    }elseif($_REQUEST['action'] == 'updateCartItem' && !empty($_REQUEST['txtID'])){
        $itemData = array(
            'rowid' => $_REQUEST['txtID'],
            'qty' => $_REQUEST['qty']
        );
        $updateItem = $cart->update($itemData);
        echo $updateItem?'ok':'err';die;
    }elseif($_REQUEST['action'] == 'removeCartItem' && !empty($_REQUEST['txtID'])){
        $deleteItem = $cart->remove($_REQUEST['txtID']);
        header("Location: verCarrito.php");
    }else{
        header("Location: plantas.php");
    }
}else{
    header("Location: index.php");
}