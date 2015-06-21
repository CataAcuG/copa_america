<?php
require_once('../includes/db.php');

$sql = "SELECT CIUDAD.nombre AS nom_ciudad, ESTADIO.*
        FROM ESTADIO
        JOIN CIUDAD ON ESTADIO.id_ciudad = CIUDAD.id_ciudad";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head lang="es">
    <meta charset="iso-8859-1">
    <title>Estadios - Copa America 2015</title>
    <link rel="stylesheet" href="../css/style.css"/>
</head>
<body>
<h1>Estadios</h1>
<a href="../">Volver al Inicio</a> | <a href="agregar.php">Agregar Estadios</a>
<br/><br/>
<table class="reference">
    <tr>
        <th>Estadio</th>
        <th>Capacidad</th>
        <th>Ciudad</th>
        <th>Acciones</th>
    </tr>
    <?php
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['nombre'] . "</td>";
        echo "<td>" . $row['capacidad_espectador'] . "</td>";
        echo "<td>" . $row['nom_ciudad'] . "</td>";
		echo "<td>";
        echo '<a href="editar.php?id_estadio=' . $row['id_estadio'] . '">Editar</a>';
        echo ' | ';
        echo '<a href="borrar.php?id_estadio=' . $row['id_estadio'] . '">Borrar</a>';
        echo '</td>';
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>