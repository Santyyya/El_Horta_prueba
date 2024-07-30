<?php
require 'conexion.php'

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cuenta - Taquería Mi Vecindario</title>
    <link rel="stylesheet" href="CSS/signupcss.css">
    
</head>
<body>
    <header>
        <div class="nav-logo">
            <img src="Resourses/7633253-removebg-preview.png" alt="Logo de la Taquería Mi Vecindario" class="logo">
        </div>
        <nav>
            <ul>
                <li><a href="index.html">Inicio</a></li>
                <li><a href="menu.php">Menú</a></li>
                <li><a href="noveYProm.html">Promociones</a></li>
                <li><a href="contacto.html">Contacto</a></li>
                <li><a href="carrito.php">Carrito</a></li>
                <li><a href="crear_cuenta.php" class="active">Crear Cuenta</a></li>
            </ul>
        </nav>
    </header>

    <main class="form-container">
        <h2>Crear Cuenta</h2>
        <form action="validarUsuario.php" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="apellidos">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" required>

          <label for="telefono">Teléfono:</label>
            <input type="tel" id="telefono" name="telefono" required>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
         
     <label for="correo">Correo Electrónico:</label>
            <input type="email" id="correo" name="correo" required>

            <div class="form-check">
                <input type="checkbox" id="terminos" name="terminos" required>
                <label for="terminos">Acepto los términos y condiciones</label>
            </div>

            <button type="submit" class="submit-btn">Registrar</button>
        </form>
        <p class="login-link">¿Ya tienes cuenta? <a href="login.html">Inicia sesión aquí</a></p>
    </main>

    <footer>
        <div class="social-icons">
            <a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
            <a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="https://www.tiktok.com" target="_blank"><i class="fab fa-tiktok"></i></a>
        </div>
        <p>&copy; 2024 Taquería Mi Vecindario. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
