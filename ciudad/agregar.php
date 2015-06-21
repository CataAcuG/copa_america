<?php
require_once('../includes/db.php');

if (!empty($_POST)) {

    //insertar registro
    extract($_POST);
    $sql = "INSERT INTO CIUDAD (nombre, id_pais)
            VALUES ('$nombre', 1)";

    if ($conn->query($sql) === TRUE) {
        echo "Nueva ciudad creado";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head lang="es">
    <meta charset="iso-8859-1">
    <title>Agregar Ciudad - Copa America 2015</title>
    <link rel="stylesheet" href="../css/style.css"/>
</head>
<body>
<h1>Agregar ciudad</h1>
<a href="../">Volver al Inicio</a> | <a href="index.php">Volver a Ciudades</a><br/><br/>
<form action="" method="post">
    Nombre<input type="text" name="nombre"/><br/><br/>
    <input type="submit" value="Guardar">
</form>

</body>
</html>