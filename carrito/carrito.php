<?php
// initializ shopping cart class
include 'elCarrito.php';
$cart = new Cart;
?>
<?php include('templates/cabeceraCarrito.php'); ?>
<div class="container-sm border border-success">
    <div class="panel panel-default">
        <div class="panel-body">
            <p class="h2">Carrito de compras </p>
            <br>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Articulo</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Sub total</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($cart->total_items() > 0) {
                            //get cart items from session
                            $cartItems = $cart->contents();
                            foreach ($cartItems as $item) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $item["nombreProducto"]; ?>
                                    </td>
                                    <td>
                                        <?php echo '$' . $item["precioProducto"] . ' MX'; ?>
                                    </td>
                                    <td><input type="number" class="form-control text-center"
                                            value="<?php echo $item["qty"]; ?>"
                                            onchange="updateCartItem(this, '<?php echo $item['rowid']; ?>')"></td>
                                    <td>
                                        <?php echo '$' . $item["subtotal"] . ' MX'; ?>
                                    </td>
                                    <td>
                                        <a href="accionCarrito.php?action=removeCartItem&idProducto=<?php echo $item["rowid"]; ?>"
                                            class="btn btn-danger" onclick="return confirm('¿Desea eliminar?')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                                class="bi bi-trash" viewBox="0 0 16 16">
                                                <path
                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                <path
                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            <?php }
                        } else { ?>
                            <tr>
                                <td colspan="5">
                                    <p>Tu carrito esta vacio.....</p>
                                </td>
                            <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td><a href="../productos.php" class="btn btn-warning"><i
                                        class="glyphicon glyphicon-menu-left"></i> Continuar Comprando</a></td>
                            <td colspan="2"></td>
                            <?php if ($cart->total_items() > 0) { ?>
                                <td class="text-center"><strong>Total
                                        <?php echo '$' . $cart->total() . ' MX'; ?>
                                    </strong></td>
                                <td><a href="../index.php" class="btn btn-success btn-block">Pagar<i
                                            class="glyphicon glyphicon-menu-right"></i></a></td>
                            <?php } ?>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
<div>
<?php include("templates/pieCarrito.php"); ?>