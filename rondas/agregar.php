<?php
require_once('../includes/db.php');

if (isset ($_POST['nombre']) && !empty($_POST['nombre']) &&isset ($_POST['cantidad_equipos']) && !empty($_POST['cantidad_equipos'])) {

    //insertar registro
    extract($_POST);
    $sql = "INSERT INTO RONDA (nombre, cantidad_equipos)
            VALUES ('$nombre', $cantidad_equipos)";

    if ($conn->query($sql) === TRUE) {
        echo "Nueva Ronda creada";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}else{
	echo "Los campos con (*) son Obligatorios";
}
?>
<!DOCTYPE html>
<html>
<head lang="es">
    <meta charset="iso-8859-1">
    <title>Agregar Ronda - Copa America 2015</title>
    <link rel="stylesheet" href="../css/style.css"/>
</head>
<body>
<h1>Agregar Ronda</h1>
<a href="../">Volver al Inicio</a> | <a href="index.php">Volver a Rondas</a><br/><br/>
<form action="" method="post">
    Nombre (*):
    <input type="text" name="nombre"/><br/><br/>
    Cantidad de Equipos por Ronda (*):
    <input type="text" name="cantidad_equipos"/><br/><br/>
    <input type="submit" value="Guardar">
</form>

</body>
</html>