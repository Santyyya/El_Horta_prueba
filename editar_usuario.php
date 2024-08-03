<?php
require 'conexion.php';

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Obtener datos del usuario
    $sql = "SELECT * FROM usuarios WHERE idusuarios = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();
} else {
    // Redirigir si no se pasa un ID de usuario válido
    header('Location: consultasusuario.php');
    exit;
}

// Manejar el formulario de actualización
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['telefono'];
    $contraseña = $_POST['contraseña'];
    $correo = $_POST['correo'];

    $sql = "UPDATE usuarios SET nombre=?, apellidos=?, telefono=?, contraseña=?, correo=? WHERE idusuarios=?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("sssssi", $nombre, $apellidos, $telefono, $contraseña, $correo, $userId);

    if ($stmt->execute()) {
        // Redirigir después de actualizar
        header('Location: consultasusuario.php');
        exit;
    } else {
        $error = "Error al actualizar el usuario.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
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
        <h1>Editar Usuario</h1>
        <?php if (isset($error)): ?>
            <p><?php echo $error; ?></p>
        <?php endif; ?>
        <form action="editar_usuario.php?id=<?php echo $userId; ?>" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="<?php echo htmlspecialchars($user['nombre']); ?>" required>

            <label for="apellidos">Apellidos:</label>
            <input type="text" name="apellidos" id="apellidos" value="<?php echo htmlspecialchars($user['apellidos']); ?>" required>

            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" id="telefono" value="<?php echo htmlspecialchars($user['telefono']); ?>" required>

            <label for="contraseña">Contraseña:</label>
            <input type="password" name="contraseña" id="contraseña" value="<?php echo htmlspecialchars($user['contraseña']); ?>" required>

            <label for="correo">Correo:</label>
            <input type="email" name="correo" id="correo" value="<?php echo htmlspecialchars($user['correo']); ?>" required>

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
