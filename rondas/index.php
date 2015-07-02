<?php
require_once('../includes/db.php');

$sql = "SELECT RONDA.* FROM RONDA";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head lang="es">
    <meta charset="iso-8859-1">
    <title>RONDAS - Copa America 2015</title>
    <link rel="stylesheet" href="../css/style.css"/>
</head>
<body bgcolor="white" text = "Blue"> 
<h1>Rondas</h1>
<a href="../">Volver al Inicio</a> | <a href="agregar.php">Agregar Ronda</a>
<br/><br/>
<table class="reference">
    <tr>
        <th>Ronda</th>
        <th>Cant. Equipos</th>
        <th>Acciones</th>
    </tr>
    <?php
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['nombre'] . "</td>";
        echo "<td>" . $row['cantidad_equipos'] . "</td>";
        echo '<td>';
        echo '<a href="editar.php?id_ronda=' . $row['id_ronda'] . '">Editar</a>';
        echo ' | ';
        echo '<a href="borrar.php?id_ronda=' . $row['id_ronda'] . '">Borrar</a>';
        echo '</td>';
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>