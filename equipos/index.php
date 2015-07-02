<?php
require_once('../includes/db.php');

$sql = "SELECT EQUIPO.*, PAIS.nombre FROM EQUIPO JOIN PAIS ON EQUIPO.id_pais = PAIS.id_pais ORDER BY PAIS.nombre";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head lang="es">
    <meta charset="iso-8859-1">
    <title>Equipos - Copa America 2015</title>
    <link rel="stylesheet" href="../css/style.css"/>
</head>
<body bgcolor="white" text = "Blue"> 
<h1>Equipos</h1>
<a href="../">Volver al Inicio</a> | <a href="agregar.php">Agregar Equipo</a>
<br/><br/>
<table class="reference">
    <tr>
        <th>Equipos</th>
        <th>Acciones</th>
    </tr>
    <?php
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['nombre'] . "</td>";
        echo '<td>';
        echo '<a href="borrar.php?id_equipo=' . $row['id_equipo'] . '">Borrar</a>';
        echo '</td>';
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>