<?php
// 1. Incluir la clase y arrancar la sesión
include 'elCarrito.php';
$cart = new Cart;

// 2. Verificar si el carrito tiene productos
if ($cart->total_items() > 0) {
    $telefono = "524731032987"; // Reemplaza con tu número (Cód. País + Número sin espacios)
    
    // 3. Iniciar la construcción del mensaje
    $mensaje = "🛍️ *Nuevo Pedido desde la Web*\n";
    $mensaje .= "--------------------------\n";
    
    // 4. Obtener items del carrito (vienen de la sesión de MySQL/Class)
    $cartItems = $cart->contents();
    
    foreach ($cartItems as $item) {
        $mensaje .= "• " . $item["nombreProducto"] . "\n";
        $mensaje .= "  Cant: " . $item["qty"] . " x $" . $item["precioProducto"] . " MX\n";
        $mensaje .= "  Subtotal: $" . $item["subtotal"] . " MX\n\n";
    }
    
    $mensaje .= "--------------------------\n";
    $mensaje .= "💰 *TOTAL A PAGAR: $" . $cart->total() . " MX*";

    // 5. Codificar el mensaje para URL y redireccionar
    $url_whatsapp = "https://wa.me/" . $telefono . "?text=" . urlencode($mensaje);
    
    header("Location: " . $url_whatsapp);
    exit;
} else {
    // Si el carrito está vacío, volver a la página de productos
    header("Location: ../productos.php");
    exit;
}
?>
