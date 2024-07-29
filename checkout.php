<?php
session_start();
require 'conexion.php';
require 'productos.php';
date_default_timezone_set('America/Mexico_City');


if ($db->connect_error) {
    die("Conexión fallida: " . $db->connect_error);
}

$pedido_realizado = false; // Variable para rastrear el éxito del pedido

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_SESSION['carrito'])) {
    $total = 0;
    foreach ($_SESSION['carrito'] as $item_id => $cantidad) {
        if (isset($productos[$item_id])) {
            $total += $productos[$item_id]['precio'] * $cantidad;
        }
    }

    $fecha = date("Y-m-d"); // Obtiene la fecha actual en formato 'YYYY-MM-DD'
    $hora = date("H:i:s"); // Obtiene la hora actual en formato 'HH:MM:SS'
    
    $usuarios_idusuarios = 1; // Ajustar según el usuario autenticado

    // Usar declaraciones preparadas para evitar problemas de formato y SQL Injection
    $sql_pedido = "INSERT INTO pedidos (fecha, hora, total, usuarios_idusuarios) VALUES (?, ?, ?, ?)";
    if ($stmt = $db->prepare($sql_pedido)) {
        $stmt->bind_param("ssii", $fecha, $hora, $total, $usuarios_idusuarios);

        if ($stmt->execute()) {
            $idpedido = $db->insert_id;

            foreach ($_SESSION['carrito'] as $item_id => $cantidad) {
                if (isset($productos[$item_id])) {
                    $producto = $productos[$item_id];
                    $sql_factura = "INSERT INTO factura (mision, total, pedidos_idpedidos) VALUES (?, ?, ?)";
                    if ($stmt_factura = $db->prepare($sql_factura)) {
                        $mision = 'Compra de ' . $producto['nombre'];
                        $total_producto = $producto['precio'] * $cantidad;
                        $stmt_factura->bind_param("sii", $mision, $total_producto, $idpedido);
                        $stmt_factura->execute();
                    }
                }
            }

            $_SESSION['carrito'] = array(); // Vaciar el carrito
            $pedido_realizado = true; // Establecer el indicador de éxito
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error: " . $db->error;
    }
}

$db->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realizar Pedido</title>
    <script>
        function mostrarBanner() {
            var banner = document.getElementById('banner-exito');
            banner.style.display = 'block';
            setTimeout(function() {
                banner.style.display = 'none';
                window.location.href = 'index.php'; // Redirige a la página de inicio
            }, 3000); // Mostrar el banner por 3 segundos
        }
    </script>
    <style>
        #banner-exito {
            display: none;
            background-color: green;
            color: white;
            padding: 10px;
            text-align: center;
            position: fixed;
            top: 10px;
            width: 100%;
            z-index: 1000;
        }
    </style>
</head>
<body>
    <?php if ($pedido_realizado): ?>
        <div id="banner-exito">Pedido realizado con éxito.</div>
        <script>
            mostrarBanner();
        </script>
    <?php endif; ?>
    <!-- Contenido de la página -->
</body>
</html>



