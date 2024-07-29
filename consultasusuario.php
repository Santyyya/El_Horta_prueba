<?php
require 'conexion.php';

$sql_usuarios = "SELECT * FROM usuarios";
$result_usuarios = mysqli_query($db, $sql_usuarios);

$sql_pedidos = "SELECT * FROM pedidos";
$result_pedidos = mysqli_query($db, $sql_pedidos);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración de Usuarios</title>
    <link rel="stylesheet" href="CSS/consultasusuario.css">
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
                <th>Acciones</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result_usuarios)): ?>
            <tr>
                <td><?php echo $row['idusuarios']; ?></td>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['apellidos']; ?></td>
                <td><?php echo $row['telefono']; ?></td>
                <td><?php echo $row['contraseña']; ?></td>
                <td><?php echo $row['correo']; ?></td>
                <td>
                    <form action="eliminar_usuario.php" method="POST">
                        <input type="hidden" name="id" value=" <?php echo $row['idusuarios']; ?>">
                        <button type="submit">Eliminar</button>
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
                <th>Acciones</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result_pedidos)): ?>
            <tr>
                <td><?php echo $row['idpedidos']; ?></td>
                <td><?php echo $row['fecha']; ?></td>
                <td><?php echo $row['hora']; ?></td>
                <td><?php echo $row['total']; ?></td>
                <td><?php echo $row['usuarios_idusuarios']; ?></td>
                <td>
                    <form action="eliminar_pedido.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['idpedidos']; ?>">
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
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