<?php
require_once('../includes/db.php');

$sql = "SELECT PAIS.* FROM PAIS";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head lang="es">
    <meta charset="iso-8859-1">
    <title>Paises Participantes - Copa America 2015</title>
    <link rel="stylesheet" href="../css/style.css"/>
</head>
<body>
<h1>Partidos</h1>
<a href="../">Volver al Inicio</a> | <a href="agregar.php">Agregar Paises</a>
<br/><br/>
<table class="reference">
    <tr>
        <th>Nombre</th>
        <th>Capital</th>
		<th>Acciones</th>
    </tr>
    <?php
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['nombre'] . "</td>";
        echo "<td>" . $row['capital'] . "</td>";
        echo '<td>';
        echo '<a href="editar.php?id_pais=' . $row['id_pais'] . '">Editar</a>';
        echo ' | ';
        echo '<a href="borrar.php?id_pais=' . $row['id_pais'] . '">Borrar</a>';
        echo '</td>';
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>