<?php
require_once('../includes/db.php');

$sql = "SELECT TIPO_PARTICIPANTE.* FROM TIPO_PARTICIPANTE";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head lang="es">
    <meta charset="iso-8859-1">
    <title>Tipos de Participantes - Copa America 2015</title>
    <link rel="stylesheet" href="../css/style.css"/>
</head>
<body bgcolor = "white" text = "blue">
<center>

<h1>Participantes</h1>

</center>

<a href="../">Volver al Inicio</a> | <a href="agregar.php">Agregar Tipo</a>
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
        echo '<a href="borrar.php?id_tipo=' . $row['id_tipo'] . '">Borrar</a>';
        echo '</td>';
        echo "</tr>";
    }
    ?>



</table>
<center>
<img src  = "paises.png">	

</center>
</body>
</html>