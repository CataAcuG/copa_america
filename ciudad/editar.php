<?php
require_once('../includes/db.php');

$id_editar = $_GET['id_ciudad'];

if (!empty($_POST)) {

    //editar registro
    extract($_POST);

    $sql = "UPDATE CIUDAD
            SET nombre = '$nombre'
            WHERE id_ciudad = $id_editar";

    if ($conn->query($sql) === TRUE) {
        echo "Ciudad editado";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
//busco ciudad a editar
$sql = "SELECT * FROM CIUDAD
        WHERE id_ciudad = $id_editar LIMIT 1";
$result = $conn->query($sql);
$ciudad = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html>
<head lang="es">
    <meta charset="iso-8859-1">
    <title>Editar Ciudad - Copa America 2015</title>
    <link rel="stylesheet" href="../css/style.css"/>
</head>
<body>
<h1>Editar Ciudad</h1>
<a href="../">Volver al Inicio</a> | <a href="index.php">Volver a Ciudades</a><br/><br/>
<form action="" method="post">
    Nombre:
    <input type="text" name="nombre" value="<?php echo $ciudad['nombre']; ?>"/><br/><br/>
    <input type="submit" value="Guardar">
</form>

</body>
</html>