<?php
require 'conexion.php';
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taquería El Horta</title>
    <link rel="stylesheet" href="CSS/indexcss.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header>
        <div class="video-container">
            <video autoplay muted loop>
                <source src="Resourses/background_index.mp4" type="video/mp4">
                Tu navegador no soporta videos HTML5.
            </video>
            <div class="overlay"></div>
        </div>
        <div class="header-content">
            <div class="nav-logo">
                <img src="Resourses/7633253-removebg-preview.png" alt="Logo de la Taquería Mi Vecindario" class="logo">
            </div>
            <nav>
                <ul>
                    <?php if (isset($_SESSION['nombre'])): ?>
                        <li class="user-icon" onclick="toggleMenu()">
                            <span class="user-initials"><?php echo strtoupper(substr($_SESSION['nombre'], 0, 2)); ?></span>
                            <div class="user-menu" id="user-menu"></div>
                        </li>
                    <?php else: ?>
                        <li><a href="signup.php">Crea tu cuenta</a></li>
                    <?php endif; ?>
                    <li><a href="menu.php">Menú</a></li>
                    <li><a href="noveYProm.html">Promociones</a></li>
                    <li><a href="contacto.html">Contacto</a></li>
                    <li><a href="carrito.php">Carrito</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="container">
        <section class="intro">
            <h2>Bienvenidos a la Taquería El Horta</h2>
            <p>¡Los mejores tacos de la ciudad, a solo un paso de tu casa!</p>
        </section>
        <section class="photos">
            <div class="photo-item">
                <img src="Resourses/carne-asada-tacos1.jpg" alt="Taco de bistec">
                <p>Taco de bistec</p>
            </div>
            <div class="photo-item">
                <img src="Resourses/images.jpeg" alt="Taco al pastor">
                <p>Taco al Pastor</p>
            </div>
            <div class="photo-item">
                <img src="Resourses/Platillos/chorizo.jpg" alt="Taco de chorizo">
                <p>Taco de chorizo</p>
            </div>
            <div class="menu-button-container">
                <a href="menu.php" class="menu-button">Ver Menú Completo</a>
            </div>
        </section>
        <section class="info">
            <h2>Información sobre la Taquería</h2>
            <div class="info-item">
                <img src="Resourses/pngwing.com.png" alt="Novedades">
                <div class="info-text">
                    <h3>Novedades</h3>
                    <p>Enterate de las novedades más recientes.</p>
                </div>
                <div class="info-button-container">
                    <a href="noveYProm.html" class="menu-button">Revisa las novedades</a>
                </div>
            </div>
        </section>
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


    
    <script>
        
        //Script JS para el icono de usuario

        function toggleMenu() {
            var menu = document.getElementById('user-menu');
            menu.classList.toggle('active');
        }

        document.addEventListener('click', function(event) {
            var menu = document.getElementById('user-menu');
            var icon = document.querySelector('.user-icon');
            if (!menu.contains(event.target) && !icon.contains(event.target)) {
                menu.classList.remove('active');
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            var userMenu = document.getElementById('user-menu');
            <?php if (isset($_SESSION['nombre'])): ?>
                userMenu.innerHTML = '<p><strong><?php echo htmlspecialchars($_SESSION['nombre']); ?></strong></p>';
                <?php if ($_SESSION['nombre'] == 'admin'): ?>
                    userMenu.innerHTML += '<a href="consultasusuario.php">Panel de control</a>';
                <?php endif; ?>
                userMenu.innerHTML += '<a href="logout.php">Cerrar sesión</a>';
            <?php endif; ?>
        });
    </script>
</body>
</html>
