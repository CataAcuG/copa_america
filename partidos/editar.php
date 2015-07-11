<?php
require_once('../includes/db.php');

$id_editar = $_GET['id_partido'];

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

    //editar registro
    extract($_POST);

    $sql = "UPDATE PARTIDO
            SET id_equipo = $id_equipo, id_equipo1 = $id_equipo1, id_ronda = $id_ronda, id_estadio = $id_estadio, gol_local = $gol_local, gol_visita = $gol_visita, fecha = '$fecha', hora = '$hora'
            WHERE id_partido = $id_editar";

    if ($conn->query($sql) === TRUE) {
        echo "Partido editado";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

//busco partido a editar
$sql = "SELECT * FROM PARTIDO
        WHERE id_partido = $id_editar LIMIT 1";
$result = $conn->query($sql);
$partido = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html>
<head lang="es">
    <meta charset="iso-8859-1">
    <title>Editar Partido - Copa America 2015</title>
    <link rel="stylesheet" href="../css/style.css"/>
</head>
<body>
<h1>Editar Partido</h1>
<a href="../">Volver al Inicio</a> | <a href="index.php">Volver a Partidos</a><br/><br/>
<form action="" method="post">
    Equipo 1:
    <select name="id_equipo">
        <option value="">Seleccione Equipo</option>
        <?php foreach($equipos as $e) printf('<option value="%d"%s>%s</option>', $e['id_equipo'], $partido['id_equipo'] == $e['id_equipo']? 'selected="selected"' : '', $e['nombre']);?>
    </select><br/><br/>
    Equipo 2:
    <select name="id_equipo1">
        <option value="">Seleccione Equipo</option>
        <?php foreach($equipos as $e) printf('<option value="%d"%s>%s</option>', $e['id_equipo'], $partido['id_equipo1'] == $e['id_equipo']? 'selected="selected"' : '', $e['nombre']);?>
    </select><br/><br/>
    Ronda:
    <select name="id_ronda">
        <option value="">Seleccione Ronda</option>
        <?php foreach($rondas as $r) printf('<option value="%d"%s>%s</option>', $r['id_ronda'], $partido['id_ronda'] == $r['id_ronda']? 'selected="selected"' : '', $r['nombre']);?>
    </select><br/><br/>
    Estadio:
    <select name="id_estadio">
        <option value="">Seleccione Estadio</option>
        <?php foreach($estadios as $e) printf('<option value="%d"%s>%s</option>', $e['id_estadio'], $partido['id_estadio'] == $e['id_estadio']? 'selected="selected"' : '', $e['nombre']);?>
    </select><br/><br/>
    Gol local:
    <input type="text" name="gol_local" value="<?php echo $partido['gol_local']; ?>"/><br/><br/>
    Gol visita:
    <input type="text" name="gol_visita" value="<?php echo $partido['gol_visita']; ?>"/><br/><br/>
    Fecha:
    <input type="text" name="fecha" value="<?php echo $partido['fecha']; ?>"/> formato: aaaa-mm-dd<br/><br/>
    Hora:
    <input type="text" name="hora" value="<?php echo date('H:i', strtotime($partido['hora'])); ?>"/> formato: hh:mm<br/><br/>
    <input type="submit" value="Guardar">
</form>

</body>
</html>