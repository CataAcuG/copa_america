<?php
require_once('../includes/db.php');

$id_editar = $_GET['id_estadio'];

//busco las ciudades
$sql = "SELECT * FROM CIUDAD";
$result = $conn->query($sql);
$ciudades = array();
while($c = $result->fetch_assoc()) $ciudades[] = $c;

if (!empty($_POST)) {

    //editar registro
    extract($_POST);

    $sql = "UPDATE ESTADIO
            SET id_ciudad = $id_ciudad, nombre = '$nombre', capacidad_espectador = $capacidad_espectador
            WHERE id_estadio = $id_editar";

    if ($conn->query($sql) === TRUE) {
        echo "Estadio editado";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

//busco estadio a editar (de un estadio)
$sql = "SELECT * FROM ESTADIO
        WHERE id_estadio = $id_editar LIMIT 1";
$result = $conn->query($sql);
$estadio = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html>
<head lang="es">
    <meta charset="iso-8859-1">
    <title>Editar Estadios - Copa America 2015</title>
    <link rel="stylesheet" href="../css/style.css"/>
</head>
<body>
<h1>Editar Estadio</h1>
<a href="../">Volver al Inicio</a> | <a href="index.php">Volver a Estadios</a><br/><br/>
<form action="" method="post">
    Ciudad:
    <select name="id_ciudad">
        <option value="">Seleccione Ciudad</option>
        <?php foreach($ciudades as $c) printf('<option value="%d"%s>%s</option>', $c['id_ciudad'], $estadio['id_ciudad'] == $c['id_ciudad']? 'selected="selected"' : '', $c['nombre']);?>
    </select><br/><br/>	
    Nombre:
    <input type="text" name="nombre" value="<?php echo $estadio['nombre']; ?>"/><br/><br/>
    Capacidad:
    <input type="text" name="capacidad_espectador" value="<?php echo $estadio['capacidad_espectador']; ?>"/><br/><br/>
    <input type="submit" value="Guardar">
</form>
</body>
</html>