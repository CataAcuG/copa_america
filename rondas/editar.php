<?php
require_once('../includes/db.php');

$id_editar = $_GET['id_ronda'];

//busco las rondas
$sql = "SELECT * FROM RONDA";
$result = $conn->query($sql);
$rondas = array();
while($r = $result->fetch_assoc()) $rondas[] = $r;

if (!empty($_POST)) {

    //editar registro
    extract($_POST);

    $sql = "UPDATE RONDA
            SET nombre = '$nombre', cantidad_equipos = $cantidad_equipos
            WHERE id_ronda = $id_editar";

    if ($conn->query($sql) === TRUE) {
        echo "Ronda Modificada";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

//busco ronda a editar
$sql = "SELECT * FROM RONDA
        WHERE id_ronda = $id_editar LIMIT 1";
$result = $conn->query($sql);
$rondas = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html>
<head lang="es">
    <meta charset="iso-8859-1">
    <title>Editar Ronda - Copa America 2015</title>
    <link rel="stylesheet" href="../css/style.css"/>
</head>
<body>
<h1>Editar Ronda</h1>
<a href="../">Volver al Inicio</a> | <a href="index.php">Volver a Rondas</a><br/><br/>
<form action="" method="post">
    Nombre:
    <input type="text" name="nombre" value="<?php echo $rondas['nombre']; ?>"/><br/><br/>
    Cantidad de Equipos:
    <input type="text" name="cantidad_equipos" value="<?php echo $rondas['cantidad_equipos']; ?>"/><br/><br/>
    <input type="submit" value="Guardar">
</form>

</body>
</html>