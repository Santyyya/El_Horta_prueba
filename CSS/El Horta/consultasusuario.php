<?php
require 'conexion.php';

$sql= "SELECT * FROM usuarios";
$result = mysqli_query($db, $sql);

echo "<h1> Consultas Usuarios <h1> ";


echo "<table border='1'>";

echo "<tr>
        <th>Id Usuario</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Telefono</th>
        <th>Contraseña</th>
        <th>Correo</th>
      </tr>";

      while ($row = mysqli_fetch_assoc($result)) { 
        echo "<tr>";
        echo "<td>" . $row['idusuarios'] . "</td>";
        echo "<td>" . $row['nombre'] . "</td>";
        echo "<td>" . $row['apellidos'] . "</td>";
        echo "<td>" . $row['telefono'] . "</td>";
        echo "<td>" . $row['contraseña'] . "</td>";
        echo "<td>" . $row['correo'] . "</td>";
  
        echo "</tr>"; 
    }
    
    echo "</table>";
    

    





?>