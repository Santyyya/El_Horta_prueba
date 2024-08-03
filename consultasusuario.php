<?php
require 'conexion.php';


// Obtener todos los usuarios
$sql = "SELECT * FROM usuarios";
$result = mysqli_query($db, $sql);

// Obtener todos los pedidos
$sql2 = "SELECT * FROM pedidos";
$result2 = mysqli_query($db, $sql2);

// Función para obtener los detalles de un pedido
function obtenerDetallesPedido($pedido_id) {
    global $db;
    $sql = "SELECT * FROM factura WHERE pedidos_idpedidos = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("i", $pedido_id);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}

$detallesPedido = [];
if (isset($_GET['detalles'])) {
    $pedido_id = $_GET['detalles'];
    $detallesPedido = obtenerDetallesPedido($pedido_id);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración de Usuarios</title>
    <link rel="stylesheet" href="CSS/consultasusuarios.css">
    <link rel="icon" href="Resourses/7633253-removebg-preview.png" type="image/x-icon">
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
        <h1>Consultas Usuarios</h1>
        <table>
            <tr>
                <th>Id Usuario</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Teléfono</th>
                <th>Contraseña</th>
                <th>Correo</th>
                <th>Eliminar</th>
                <th>Editar</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $row['idusuarios']; ?></td>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['apellidos']; ?></td>
                <td><?php echo $row['telefono']; ?></td>
                <td><?php echo $row['contraseña']; ?></td>
                <td><?php echo $row['correo']; ?></td>
                <td>
                    <form action="eliminar_usuario.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['idusuarios']; ?>">
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
                <td>
                <form action="editar_usuario.php" method="GET" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $row['idusuarios']; ?>">
                        <button type="submit">Editar</button>
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>

    <div class="admin-container">
        <h1>Pedidos Realizados</h1>
        <table>
            <tr>
                <th>Id Pedido</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Total</th>
                <th>Usuario Id</th>
                <th>Detalles del pedido</th>
                <th>Eliminar</th>
                <th>Editar</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result2)): ?>
            <tr>
                <td><?php echo $row['idpedidos']; ?></td>
                <td><?php echo $row['fecha']; ?></td>
                <td><?php echo $row['hora']; ?></td>
                <td><?php echo $row['total']; ?></td>
                <td><?php echo $row['usuarios_idusuarios']; ?></td>
                <td>
                    <a href="?detalles=<?php echo $row['idpedidos']; ?>">Ver detalles</a>
                </td>
                <td>
                    <form action="eliminar_pedido.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['idpedidos']; ?>">
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
                <td>
                <form action="editar_pedido.php" method="GET">
                    <input type="hidden" name="id" value="<?php echo $row['idpedidos']; ?>">
                    <button type="submit">Editar</button>
                </form>
            </td>
            </tr>
            <?php endwhile; ?>
        </table>

        <?php if (!empty($detallesPedido)): ?>
        <div class="pedido-detalles">
            <h2>Detalles del Pedido <?php echo htmlspecialchars($pedido_id); ?></h2>
            <table>
                <tr>
                    <th>producto</th>
                    <th>Total</th>
                </tr>
                <?php foreach ($detallesPedido as $detalle): ?>
                <tr>
                    <td><?php echo htmlspecialchars($detalle['mision']); ?></td>
                    <td><?php echo htmlspecialchars($detalle['total']); ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <?php endif; ?>
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
