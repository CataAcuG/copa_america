<?php
require_once('../includes/db.php');

$sql = "SELECT PARTIDO.*, RONDA.nombre AS nom_ronda, P1.nombre AS equipo1, P2.nombre AS equipo2, ESTADIO.nombre AS nom_estadio
        FROM PARTIDO
        JOIN RONDA ON PARTIDO.id_ronda = RONDA.id_ronda
        JOIN EQUIPO AS E1 ON E1.id_equipo = PARTIDO.id_equipo
        JOIN EQUIPO AS E2 ON E2.id_equipo = PARTIDO.id_equipo1
        JOIN PAIS AS P1 ON P1.id_pais = E1.id_pais
        JOIN PAIS AS P2 ON P2.id_pais = E2.id_pais
        JOIN ESTADIO ON ESTADIO.id_estadio = PARTIDO.id_estadio";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head lang="es">
    <meta charset="iso-8859-1">
    <title>Partidos - Copa America 2015</title>
    <link rel="stylesheet" href="../css/style.css"/>
</head>
<body>
<h1>Partidos</h1>
<a href="../">Volver al Inicio</a> | <a href="agregar.php">Agregar Partido</a>
<br/><br/>
<table class="reference">
    <tr>
        <th>Ronda</th>
        <th>Equipo 1</th>
        <th>Equipo 2</th>
        <th>Goles Equipo 1</th>
        <th>Goles Equipo 2</th>
        <th>Estadio</th>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Acciones</th>
    </tr>
    <?php
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['nom_ronda'] . "</td>";
        echo "<td>" . $row['equipo1'] . "</td>";
        echo "<td>" . $row['equipo2'] . "</td>";
        echo "<td>" . $row['gol_local'] . "</td>";
        echo "<td>" . $row['gol_visita'] . "</td>";
        echo "<td>" . $row['nom_estadio'] . "</td>";
        echo "<td>" . date('d-m-Y', strtotime($row['fecha'])) . "</td>";
        echo "<td>" . date('H:i', strtotime($row['hora'])) . "</td>";
        echo '<td>';
        echo '<a href="editar.php?id_partido=' . $row['id_partido'] . '">Editar</a>';
        echo ' | ';
        echo '<a href="borrar.php?id_partido=' . $row['id_partido'] . '">Borrar</a>';
        echo '</td>';
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>