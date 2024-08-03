<?php
require 'conexion.php';

if (isset($_GET['id'])) {
    $pedidoId = $_GET['id'];

    // Obtener datos del pedido
    $sql = "SELECT * FROM pedidos WHERE idpedidos = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("i", $pedidoId);
    $stmt->execute();
    $pedido = $stmt->get_result()->fetch_assoc();
} else {
    // Redirigir si no se pasa un ID de pedido válido
    header('Location: consultasusuario.php');
    exit;
}

// Manejar el formulario de actualización
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $total = $_POST['total'];
    $usuarios_idusuarios = $_POST['usuarios_idusuarios'];

    $sql = "UPDATE pedidos SET fecha=?, hora=?, total=?, usuarios_idusuarios=? WHERE idpedidos=?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("sssii", $fecha, $hora, $total, $usuarios_idusuarios, $pedidoId);

    if ($stmt->execute()) {
        // Redirigir después de actualizar
        header('Location: consultasusuario.php');
        exit;
    } else {
        $error = "Error al actualizar el pedido.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pedido</title>
    <link rel="stylesheet" href="CSS/consultasusuarios.css">
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
                <li><a href="carrito.php">Carrito</a></li>
            </ul>
        </nav>
    </header>

    <div class="admin-container">
        <h1>Editar Pedido</h1>
        <?php if (isset($error)): ?>
            <p><?php echo $error; ?></p>
        <?php endif; ?>
        <form action="editar_pedido.php?id=<?php echo $pedidoId; ?>" method="POST">
            <label for="fecha">Fecha:</label>
            <input type="text" name="fecha" id="fecha" value="<?php echo htmlspecialchars($pedido['fecha']); ?>" required>

            <label for="hora">Hora:</label>
            <input type="text" name="hora" id="hora" value="<?php echo htmlspecialchars($pedido['hora']); ?>" required>

            <label for="total">Total:</label>
            <input type="text" name="total" id="total" value="<?php echo htmlspecialchars($pedido['total']); ?>" required>

            <label for="usuarios_idusuarios">Usuario Id:</label>
            <input type="text" name="usuarios_idusuarios" id="usuarios_idusuarios" value="<?php echo htmlspecialchars($pedido['usuarios_idusuarios']); ?>" required>

            <button type="submit">Guardar Cambios</button>
        </form>
    </div>

    <footer>
        <div class="social-icons">
            <a href="https://www.facebook.com/share/4DB59jmaFHCS54vK/?mibextid=qi2Omg" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.instagram.com/taqueriaelhorta/" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="https://www.tiktok.com/@taqueria_el_horta" target="_blank"><i class="fab fa-tiktok"></i></a>
        </div>
        <p>&copy; 2024 Taquería El Horta. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
