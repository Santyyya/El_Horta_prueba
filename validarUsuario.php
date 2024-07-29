<?php

require 'conexion.php';

$nombre=$_POST['nombre'];
$apellidos=$_POST['apellidos'];
$correo=$_POST['correo'];
$telefono=$_POST['telefono'];
$contraseña=$_POST['password'];

//echo $nombre;

$sql= "INSERT INTO usuarios (nombre, apellidos, telefono, contraseña, correo)
values ('$nombre','$apellidos', '$telefono', '$contraseña','$correo')";

$resultado = mysqli_query($db, $sql);
echo "<pre>";
var_dump($resultado);
echo "<pre>";

header("Location: login.php?success=Cuenta creada con éxito. Ahora puedes iniciar sesión.");
exit();
?>