<?php
require 'conexion.php';

$sql = "SELECT * FROM usuarios";
$result = mysqli_query($db, $sql);

$sql = "SELECT * FROM pedidos";
$result2 = mysqli_query($db, $sql);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración de Usuarios</title>
    <link rel="stylesheet" href="CSS/consultasusuario.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $row['idusuarios']; ?></td>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['apellidos']; ?></td>
                <td><?php echo $row['telefono']; ?></td>
                <td><?php echo $row['contraseña']; ?></td>
                <td><?php echo $row['correo']; ?></td>
                <td>
                    <form action='eliminar_usuario.php' method='POST'>
                        <input type='hidden' name='id' value='<?php echo $row['idusuarios']; ?>'>
                        <button type='submit'>Eliminar</button>
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
            <?php while ($row = mysqli_fetch_assoc($result2)): ?>
            <tr>
                <td><?php echo $row['idpedidos']; ?></td>
                <td><?php echo $row['fecha']; ?></td>
                <td><?php echo $row['hora']; ?></td>
                <td><?php echo $row['total']; ?></td>
                <td><?php echo $row['usuarios_idusuarios']; ?></td>
                <td>
                    <button type='button' class='btn btn-info' data-toggle='modal' data-target='#detallePedidoModal<?php echo $row['idpedidos']; ?>'>Ver detalles</button>
                </td>
            </tr>
            
            <!-- Modal -->
            <div class='modal fade' id='detallePedidoModal<?php echo $row['idpedidos']; ?>' tabindex='-1' role='dialog' aria-labelledby='detallePedidoModalLabel<?php echo $row['idpedidos']; ?>' aria-hidden='true'>
                <div class='modal-dialog' role='document'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h5 class='modal-title' id='detallePedidoModalLabel<?php echo $row['idpedidos']; ?>'>Detalles del Pedido #<?php echo $row['idpedidos']; ?></h5>
                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>
                        <div class='modal-body'>
                            <?php
                            $pedido_id = $row['idpedidos'];
                            $detalle_sql = "SELECT * FROM factura WHERE pedidos_idpedidos = $pedido_id";
                            $detalle_result = mysqli_query($db, $detalle_sql);
                            ?>
                            <table class='table table-striped'>
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Precio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($detalle_row = mysqli_fetch_assoc($detalle_result)): ?>
                                    <tr>
                                        <td><?php echo $detalle_row['mision']; ?></td>
                                        <td><?php echo $detalle_row['total']; ?></td>
                                    </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
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

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
