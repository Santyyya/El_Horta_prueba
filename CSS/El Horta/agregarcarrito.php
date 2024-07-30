<?php
session_start();
include('productos.php'); // Incluir el archivo con los productos

// Inicializar el carrito si no existe
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}

// Añadir al carrito
if (isset($_POST['add_to_cart'])) {
    $item_id = $_POST['item_id'];
    $quantity = $_POST['quantity'];

    if (isset($_SESSION['carrito'][$item_id])) {
        $_SESSION['carrito'][$item_id] += $quantity;
    } else {
        $_SESSION['carrito'][$item_id] = $quantity;
    }
    
    // Redirigir de vuelta al menú después de añadir al carrito
    header('Location: menu.php');
    exit;
}
?>
