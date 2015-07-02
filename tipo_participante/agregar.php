<?php
require_once('../includes/db.php');

if (isset($_POST['nombre']) && !empty($_POST['nombre'])) {

    //insertar registro
    extract($_POST);
    $sql = "INSERT INTO TIPO_PARTICIPANTE (nombre)
            VALUES ('$nombre')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo Tipo";
		$mysql_query = "SELECT nombre FROM TIPO_PARTICIPANTE ORDER BY nombre LIMIT 1 ";
		$result = $conn->query($mysql_query);
		$tipos = array();
		while($p = $result->fetch_assoc()) $tipos[] = $t;
		$sql =  "INSERT INTO TIPO_PARTICIPANTE (nombre) VALUES ('$t')";


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
    <title>Agregar Tipo - Copa America 2015</title>
    <link rel="stylesheet" href="../css/style.css"/>
</head>
<body>
<h1>Agregar Tipo</h1>
<a href="../">Volver al Inicio</a> | <a href="index.php">Volver a Tipos</a><br/><br/>
<form action="" method="post">
    Nombre Tipo:
    <input type="text" name="nombre"/><br/><br/>
    <input type="submit" value="Guardar">
</form>

</body>
</html>