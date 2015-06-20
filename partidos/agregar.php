<?php
require_once('../includes/db.php');

//busco los equipos
$sql = "SELECT EQUIPO.*, PAIS.nombre FROM EQUIPO
        JOIN PAIS ON EQUIPO.id_pais = PAIS.id_pais";
$result = $conn->query($sql);
$equipos = array();
while($e = $result->fetch_assoc()) $equipos[] = $e;

//busco las rondas
$sql = "SELECT * FROM RONDA";
$result = $conn->query($sql);
$rondas = array();
while($r = $result->fetch_assoc()) $rondas[] = $r;

//busco estadios
$sql = "SELECT * FROM ESTADIO";
$result = $conn->query($sql);
$estadios = array();
while($e = $result->fetch_assoc()) $estadios[] = $e;

if (!empty($_POST)) {

    //insertar registro
    extract($_POST);
    $sql = "INSERT INTO PARTIDO (id_equipo, id_equipo1, id_ronda, id_estadio, gol_local, gol_visita, color_VestimentaLocal, color_VestimentaVisita, fecha, hora)
            VALUES ($id_equipo, $id_equipo1, $id_ronda, $id_estadio, $gol_local, $gol_visita, '$color_VestimentaLocal', '$color_VestimentaVisita', '$fecha', '$hora')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo partido creado";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head lang="es">
    <meta charset="iso-8859-1">
    <title>Agregar Partido - Copa America 2015</title>
    <link rel="stylesheet" href="../css/style.css"/>
</head>
<body>
<h1>Agregar Partido</h1>
<a href="../">Volver al Inicio</a> | <a href="index.php">Volver a Partidos</a><br/><br/>
<form action="" method="post">
    Equipo 1:
    <select name="id_equipo">
        <option value="">Seleccione Equipo</option>
        <?php foreach($equipos as $e) printf('<option value="%d">%s</option>', $e['id_equipo'], $e['nombre']);?>
    </select><br/><br/>
    Equipo 2:
    <select name="id_equipo1">
        <option value="">Seleccione Equipo</option>
        <?php foreach($equipos as $e) printf('<option value="%d">%s</option>', $e['id_equipo'], $e['nombre']);?>
    </select><br/><br/>
    Ronda:
    <select name="id_ronda">
        <option value="">Seleccione Ronda</option>
        <?php foreach($rondas as $r) printf('<option value="%d">%s</option>', $r['id_ronda'], $r['nombre']);?>
    </select><br/><br/>
    Estadio:
    <select name="id_estadio">
        <option value="">Seleccione Estadio</option>
        <?php foreach($estadios as $e) printf('<option value="%d">%s</option>', $e['id_estadio'], $e['nombre']);?>
    </select><br/><br/>
    Gol local:
    <input type="text" name="gol_local"/><br/><br/>
    Gol visita:
    <input type="text" name="gol_visita"/><br/><br/>
    Color Vestimenta local:
    <input type="text" name="color_VestimentaLocal"/><br/><br/>
    Color Vestimenta visita:
    <input type="text" name="color_VestimentaVisita"/><br/><br/>
    Fecha:
    <input type="text" name="fecha"/> formato: aaaa-mm-dd<br/><br/>
    Hora:
    <input type="text" name="hora"/> formato: hh:mm<br/><br/>
    <input type="submit" value="Guardar">
</form>

</body>
</html>