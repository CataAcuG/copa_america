<?php
require_once('../includes/db.php');

//busco los paises
$sql = "SELECT PAIS.nombre, PAIS.id_pais FROM PAIS";
$result = $conn->query($sql);
$paises = array();
while($p = $result->fetch_assoc()) $paises[] = $p;

if (!empty($_POST)) {
    //insertar registro
    extract($_POST);
    $sql = "INSERT INTO EQUIPO(id_pais) VALUES ($id_pais)";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo Equipo Seleccionado";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head lang="es">
    <meta charset="iso-8859-1">
    <title>Agregar Equipo - Copa America 2015</title>
    <link rel="stylesheet" href="../css/style.css"/>
</head>
<body>
<h1>Agregar Equipo</h1>
<a href="../">Volver al Inicio</a> | <a href="index.php">Volver a Equipos</a><br/><br/>
<form action="" method="post">
    Equipo:
    <select name="id_pais">
        <option value="">Seleccione Equipo</option>
        <?php foreach($paises as $p) printf('<option value="%d">%s</option>', $p['id_pais'], $p['nombre']);?>
    </select><br/><br/>
    <input type="submit" value="Guardar">
</form>
</body>
</html>