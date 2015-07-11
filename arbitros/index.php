<?php
require_once('../includes/db.php');

$sql = "SELECT PARTICIPANTE.*, PAIS.nombre AS equipo, TIPO_PARTICIPANTE.nombre AS tipo
        FROM PARTICIPANTE
        LEFT JOIN EQUIPO ON EQUIPO.id_equipo = PARTICIPANTE.id_equipo
        LEFT JOIN PAIS ON PAIS.id_pais = EQUIPO.id_pais
        JOIN TIPO_PARTICIPANTE ON TIPO_PARTICIPANTE.id_tipo = PARTICIPANTE.id_tipo
		WHERE TIPO_PARTICIPANTE.id_tipo = 3
		ORDER BY PAIS.nombre, TIPO_PARTICIPANTE.id_tipo DESC, PARTICIPANTE.apellido_paterno";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head lang="es">
    <meta charset="iso-8859-1">
    <title>Arbitros - Copa America 2015</title>
    <link rel="stylesheet" href="../css/style.css"/>
</head>

<body bgcolor = "white" text = "blue"> 

<center>
	<h1>Arbitros</h1>
</center>
<a href="../">Volver al Inicio</a>| <a href="agregar_arbitro.php">Agregar Arbtiro</a>
<br/><br/>
<table class="reference">
    <tr>
        <th>Primer Nombre</th>
        <th>Segundo Nombre</th>
        <th>Apellido Paterno</th>
        <th>Apellido Materno</th>
        <th>Edad</th>
        <th>Acciones</th>
    </tr>
    <?php
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['nombre_1'] . "</td>";
        echo "<td>" . $row['nombre_2'] . "</td>";
        echo "<td>" . $row['apellido_paterno'] . "</td>";
        echo "<td>" . $row['apellido_materno'] . "</td>";
        echo "<td>" . $row['edad'] . "</td>";
        echo '<td>';
        echo '<a href="editar.php?id_participante=' . $row['id_participante'] . '">Editar</a>';
        echo ' | ';
        echo '<a href="borrar.php?id_participante=' . $row['id_participante'] . '">Borrar</a>';
        echo '</td>';
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>