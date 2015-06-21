<?php
require_once('../includes/db.php');

$sql = "SELECT CIUDAD.*, PAIS.id_pais
		FROM CIUDAD
        JOIN PAIS ON CIUDAD.id_pais = PAIS.id_pais";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head lang="es">
    <meta charset="iso-8859-1">
    <title>Ciudades - Copa America 2015</title>
    <link rel="stylesheet" href="../css/style.css"/>
</head>
<body>
<h1>Ciudades</h1>
<a href="../">Volver al Inicio</a> | <a href="agregar.php">Agregar Ciudad</a>
<br/><br/>
<table class="reference">
    <tr>
        <th>Nombre</th>
        <th>Acciones</th>
    </tr>
    <?php
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['nombre'] . "</td>";
        echo '<td>';
        echo '<a href="editar.php?id_ciudad=' . $row['id_ciudad'] . '">Editar</a>';
        echo ' | ';
        echo '<a href="borrar.php?id_ciudad=' . $row['id_ciudad'] . '">Borrar</a>';
        echo '</td>';
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>