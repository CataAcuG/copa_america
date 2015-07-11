<?php
require_once('../includes/db.php');

//busco los equipos
$sql = "SELECT EQUIPO.*, PAIS.nombre FROM PAIS
		JOIN EQUIPO ON PAIS.id_pais = EQUIPO.id_pais";
$result = $conn->query($sql);
$equipos = array();
while($e = $result->fetch_assoc()) $equipos[] = $e;

if (!empty($_POST)) {

    //insertar registro
    extract($_POST);
    $sql = "INSERT INTO PARTICIPANTE (id_equipo, id_tipo, nombre_1, nombre_2, apellido_paterno, apellido_materno, edad)
            VALUES ($id_equipo,2, '$nombre_1', '$nombre_2', '$apellido_paterno', '$apellido_materno', $edad)";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo Director Tecnico creado";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head lang="es">
    <meta charset="iso-8859-1">
    <title>Agregar Director Tecnico - Copa America 2015</title>
    <link rel="stylesheet" href="../css/style.css"/>
</head>
<body>
<h1>Agregar Director Tecnico</h1>
<a href="../">Volver al Inicio</a> | <a href="index.php">Volver a Participantes</a><br/><br/>
<form action="" method="post">
    Primer Nombre:
    <input type="text" name="nombre_1"/><br/><br/>
    Segundo Nombre:
    <input type="text" name="nombre_2"/><br/><br/>
    Apellido Paterno:
    <input type="text" name="apellido_paterno"/><br/><br/>
    Apellido Materno:
    <input type="text" name="apellido_materno"/><br/><br/>
    Edad:
    <input type="text" name="edad"/><br/><br/>
    Equipo:
    <select name="id_equipo">
        <option value="NULL">Seleccione Equipo</option>
        <?php foreach($equipos as $e) printf('<option value="%d">%s</option>', $e['id_equipo'], $e['nombre']);?>
    </select><br/><br/>
    <input type="submit" value="Guardar">
</form>
</body>
</html>