<?php
require_once('../includes/db.php');
//Estadios
//busco las ciudades
$sql = "SELECT * FROM CIUDAD";
$result = $conn->query($sql);
$ciudades = array();
while($c = $result->fetch_assoc()) $ciudades[] = $c;

if (!empty($_POST)) {

    //insertar registro
    extract($_POST);
    $sql = "INSERT INTO ESTADIO (nombre, capacidad_espectador, id_ciudad)
            VALUES ('$nombre', '$capacidad_espectador', $id_ciudad)";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo estadio creado";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head lang="es">
    <meta charset="iso-8859-1">
    <title>Agregar Estadio - Copa America 2015</title>
    <link rel="stylesheet" href="../css/style.css"/>
</head>
<body>
<h1>Agregar estadio</h1>
<a href="../">Volver al Inicio</a> | <a href="index.php">Volver a Estadios</a><br/><br/>
<form action="" method="post">
    Ciudad:
    <select name="id_ciudad">
        <option value="">Seleccione Ciudad</option>
        <?php foreach($ciudades as $c) printf('<option value="%d">%s</option>', $c['id_ciudad'], $c['nombre']);?>
    </select><br/><br/>
    Nombre:
    <input type="text" name="nombre"/><br/><br/>
    Capacidad (Espectadores):
    <input type="text" name="capacidad_espectador"/><br/><br/>
    <input type="submit" value="Guardar">
</form>

</body>
</html>