<?php
require_once('../includes/db.php');

if (isset ($_POST['capital']) && !empty($_POST['capital']) && isset($_POST['nombre']) && !empty($_POST['nombre'])) {

    //insertar registro
    extract($_POST);
    $sql = "INSERT INTO PAIS (nombre, capital)
            VALUES ('$nombre', '$capital')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo pais creado";
		$mysql_query = "SELECT id_pais FROM PAIS ORDER BY id_pais LIMIT 1 ";
		$result = $conn->query($mysql_query);
		$paises = array();
		while($p = $result->fetch_assoc()) $paises[] = $p;
		$sql =  "INSERT INTO EQUIPO (id_pais) VALUES ('$p')";


    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
	echo "Debe llenar todos los campos";
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