<?php
session_start();
require 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $contraseña = $_POST['contraseña'];

    $sql = "SELECT * FROM usuarios WHERE nombre = ? AND contraseña = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("ss", $nombre, $contraseña);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        $_SESSION['user_id'] = $user['idusuarios']; // Guardar el ID del usuario en la sesión
        $_SESSION['nombre'] = $user['nombre']; // Guardar el nombre del usuario en la sesión
        header("Location: index.php"); // Redirigir al usuario a la página de inicio
        exit;
    } else {
        echo "Nombre de usuario o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="CSS/login.css">
</head>
<body>
    <header>
        <div class="header-content">
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
                    <?php if (isset($_SESSION['nombre'])): ?>
                        <li>
                            <div class="user-icon" onclick="toggleUserMenu()">
                                <?php echo strtoupper(substr($_SESSION['nombre'], 0, 1)); ?>
                            </div>
                            <div class="user-menu" id="userMenu">
                                <a href="profile.php">Perfil</a>
                                <?php if ($_SESSION['nombre'] == 'admin'): ?>
                                    <a href="consultasusuario.php">Panel de control</a>
                                <?php endif; ?>
                                <a href="logout.php">Cerrar sesión</a>
                            </div>
                        </li>
                    <?php else: ?>
                        <li><a href="login.php">Iniciar sesión</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </header>

    <main class="container mt-5">
        <div class="form-container">
            <h2 class="text-center">Iniciar Sesión</h2>
            <?php if (isset($error_message)): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo htmlspecialchars($error_message); ?>
                </div>
            <?php endif; ?>
            <form action="login.php" method="post">
                <div class="form-group">
                    <label for="nombre">Nombre de Usuario</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="contraseña">Contraseña</label>
                    <input type="password" id="contraseña" name="contraseña" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
            </form>
            <div class="register-link mt-3">
                <p>¿No tienes una cuenta? <a href="signup.php">Regístrate aquí</a></p>
            </div>
        </div>
    </main>

    <footer class="bg-dark text-light text-center py-3">
        <div class="social-icons">
            <a href="https://www.facebook.com" target="_blank" class="text-light mr-2"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.twitter.com" target="_blank" class="text-light mr-2"><i class="fab fa-twitter"></i></a>
            <a href="https://www.instagram.com" target="_blank" class="text-light mr-2"><i class="fab fa-instagram"></i></a>
            <a href="https://www.tiktok.com" target="_blank" class="text-light"><i class="fab fa-tiktok"></i></a>
        </div>
        <p class="mb-0">&copy; 2024 Taquería Mi Vecindario. Todos los derechos reservados.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function toggleUserMenu() {
            var userMenu = document.getElementById('userMenu');
            userMenu.classList.toggle('active');
        }

        // Cerrar el menú cuando se hace clic fuera de él
        document.addEventListener('click', function(event) {
            var userMenu = document.getElementById('userMenu');
            if (!userMenu.contains(event.target) && event.target.closest('.user-icon') === null) {
                userMenu.classList.remove('active');
            }
        });
    </script>
</body>
</html>

