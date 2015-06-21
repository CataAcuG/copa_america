<?php
require_once('../includes/db.php');
//busco los nombres
$sql = "SELECT PAIS.nombre FROM PAIS";
$result = $conn->query($sql);
$nombres = array();
while($n = $result->fetch_assoc()) $nombres[] = $n;

//busco las capitales
$sql = "SELECT PAIS.capital FROM PAIS";
$result = $conn->query($sql);
$capitales = array();
while($c = $result->fetch_assoc()) $capitales[] = $c;

if (!empty($_POST)) {

    //insertar registro
    extract($_POST);
    $sql = "INSERT INTO PAIS (nombre, capital)
            VALUES ('$nombre', '$capital')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo pais creado";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head lang="es">
    <meta charset="iso-8859-1">
    <title>Agregar Pais - Copa America 2015</title>
    <link rel="stylesheet" href="../css/style.css"/>
</head>
<body>
<h1>Agregar Pais</h1>
<a href="../">Volver al Inicio</a> | <a href="index.php">Volver a Paises</a><br/><br/>
<form action="" method="post">
    Nombre Pais:
    <input type="text" name="nombre"/><br/><br/>
    Capital Pais:
    <input type="text" name="capital"/><br/><br/>
    <input type="submit" value="Guardar">
</form>

</body>
</html>