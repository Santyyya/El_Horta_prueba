<?php
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    // Eliminar los registros relacionados en factura
    $sql = "DELETE FROM factura WHERE pedidos_idpedidos = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('i', $id);
    if (!$stmt->execute()) {
        echo "Error al eliminar las facturas relacionadas.";
        $stmt->close();
        exit();
    }
    $stmt->close();

    // Ahora eliminar el pedido
    $sql = "DELETE FROM pedidos WHERE idpedidos = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('i', $id);
    if ($stmt->execute()) {
        echo "Pedido eliminado correctamente.";
    } else {
        echo "Error al eliminar el pedido.";
    }
    $stmt->close();
}

header('Location: consultasusuario.php');
exit();
?>
