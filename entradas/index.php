<?php
require_once('../includes/db.php');

$sql = "SELECT ENTRADA.*, RONDA.nombre as nom_ronda FROM ENTRADA JOIN RONDA ON ENTRADA.id_ronda = RONDA.id_ronda";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head lang="es">
    <meta charset="iso-8859-1">
    <title>Entradas - Copa America 2015</title>
    <link rel="stylesheet" href="../css/style.css"/>
</head>
<body bgcolor="white" text = "Blue"> 
<h1>Entradas</h1>
<a href="../">Volver al Inicio</a> | <a href="agregar.php">Agregar Entrada</a>
<br/><br/>
<table class="reference">
    <tr>
        <th>Entrada</th>
        <th>Ronda</th>
        <th>Valor</th>
        <th>Acciones</th>
    </tr>
    <?php
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['nombre'] . "</td>";
        echo "<td>" . $row['valor'] . "</td>";
        echo "<td>" . $row['nom_ronda'] . "</td>";
        echo '<td>';
        echo '<a href="editar.php?id_entrada=' . $row['id_entrada'] . '">Editar</a>';
        echo ' | ';
        echo '<a href="borrar.php?id_entrada=' . $row['id_entrada'] . '">Borrar</a>';
        echo '</td>';
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>