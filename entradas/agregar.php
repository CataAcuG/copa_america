<?php
require_once('../includes/db.php');

//busco los equipos
$sql = "SELECT PARTIDO.* FROM PARTIDO";
$result = $conn->query($sql);
$partidos = array();
while($p = $result->fetch_assoc()) $partidos[] = $p;

if (!empty($_POST)) {

    //insertar registro
    extract($_POST);
    $sql = "INSERT INTO ENTRADA (nombre, valor, id_partido)
            VALUES ('$nombre', $valor, $id_partido)";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo Entrada creado";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head lang="es">
    <meta charset="iso-8859-1">
    <title>Agregar Entrada - Copa America 2015</title>
    <link rel="stylesheet" href="../css/style.css"/>
</head>
<body>
<h1>Agregar Entrada</h1>
<a href="../">Volver al Inicio</a> | <a href="index.php">Volver a Entradas</a><br/><br/>
<form action="" method="post">
    Seleccion de Partido:
    <select name="id_partido">
        <option value="">Seleccione Partido</option>
        <?php foreach($partidos as $p) printf('<option value="%d">%s</option>', $p['id_partido'], $p['fecha']);?>
    </select><br/><br/>
    Nombre Entrada:
    <input type="text" name="nombre"/><br/><br/>
    Valor Entrada:
    <input type="text" name="valor"/><br/><br/>
    <input type="submit" value="Guardar">
</form>

</body>
</html>