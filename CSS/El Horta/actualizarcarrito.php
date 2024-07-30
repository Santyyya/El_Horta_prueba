<?php
session_start();

if (isset($_POST['update_cart'])) {
    $item_id = $_POST['item_id'];
    $quantity = $_POST['quantity'];

    if (isset($_SESSION['carrito'][$item_id])) {
        $_SESSION['carrito'][$item_id] = $quantity;
    }
}

if (isset($_POST['remove_from_cart'])) {
    $item_id = $_POST['item_id'];

    if (isset($_SESSION['carrito'][$item_id])) {
        unset($_SESSION['carrito'][$item_id]);
    }
}

header('Location: carrito.php');
exit;
?>
