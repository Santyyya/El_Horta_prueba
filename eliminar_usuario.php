<?php
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    $sql = "DELETE FROM usuarios WHERE idusuarios = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('i', $id);
    if ($stmt->execute()) {
        echo "Usuario eliminado correctamente.";
    } else {
        echo "Error al eliminar el usuario.";
    }
    $stmt->close();
}

header('Location: consultasusuario.php');
exit();
?>





