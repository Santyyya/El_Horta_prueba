<?php
session_start();
include('productos.php'); // Asegúrate de que productos.php tiene las imágenes

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirigir al usuario a la página de inicio de sesión si no está logueado
    exit;
}

// Inicializa el carrito si no existe
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}

// Calcular el total
$total = 0;
foreach ($_SESSION['carrito'] as $item_id => $quantity) {
    if (isset($productos[$item_id])) {
        $producto = $productos[$item_id];
        $total += $producto['precio'] * $quantity;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito - Taquería Mi Vecindario</title>
    <link rel="stylesheet" href="CSS/carrito.css">
</head>
<body>
    <header>
        <div class="nav-logo">
            <img src="Resourses/7633253-removebg-preview.png" alt="Logo de la Taquería Mi Vecindario" class="logo">
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="menu.php">Menú</a></li>
                <li><a href="noveYProm.html">Promociones</a></li>
                <li><a href="contacto.html">Contacto</a></li>
                <li><a href="carrito.php">Carrito 
                <?php 
                    if (isset($_SESSION['carrito'])) {
                        echo '(' . array_sum($_SESSION['carrito']) . ')';
                    } else {
                        echo '(0)';
                    }
                ?>
                </a></li>
            </ul>
        </nav>
    </header>
    <div class="cart-container">
        <h2>Carrito de Compras</h2>
        <?php if (empty($_SESSION['carrito'])): ?>
            <p>Tu carrito está vacío.</p>
        <?php else: ?>
            <?php foreach ($_SESSION['carrito'] as $item_id => $quantity): ?>
                <?php if (isset($productos[$item_id])): ?>
                    <?php
                    $producto = $productos[$item_id];
                    $subtotal = $producto['precio'] * $quantity;
                    ?>
                    <div class="cart-item">
                        <img src="Resourses/<?php echo $producto['imagen']; ?>" alt="<?php echo $producto['nombre']; ?>">
                        <div class="cart-item-details">
                            <div class="cart-item-name"><?php echo $producto['nombre']; ?></div>
                            <div class="cart-item-price">$<?php echo number_format($producto['precio'], 2); ?></div>
                            <div class="cart-item-quantity">
                                Cantidad:
                                <input type="number" value="<?php echo $quantity; ?>" disabled>
                            </div>
                            <div class="cart-item-total">
                                Total: $<?php echo number_format($subtotal, 2); ?>
                            </div>
                            <form action="actualizarcarrito.php" method="post" style="margin-top: 10px;">
                                <input type="hidden" name="item_id" value="<?php echo $item_id; ?>">
                                <button type="submit" name="update_cart" class="cart-item-remove">Actualizar</button>
                            </form>
                            <form action="actualizarcarrito.php" method="post">
                                <input type="hidden" name="item_id" value="<?php echo $item_id; ?>">
                                <button type="submit" name="remove_from_cart" class="cart-item-remove">Eliminar</button>
                            </form>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
            <div class="cart-total">
                Total general: $<?php echo number_format($total, 2); ?>
            </div>
            <form action="checkout.php" method="post">
                <button type="submit" class="checkout-button">Realizar Pedido</button>
            </form>
        <?php endif; ?>
    </div>
    <footer>
        <div class="social-icons">
            <a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
            <a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="https://www.tiktok.com" target="_blank"><i class="fab fa-tiktok"></i></a>
        </div>
        <p>&copy; 2024 Taquería El Horta. Todos los derechos reservados.</p>
    </footer>    
</body>
</html>
