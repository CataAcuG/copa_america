<?php
require_once('../includes/db.php');

$id_editar = $_GET['id_participante'];

//busco los equipos
$sql = "SELECT EQUIPO.*, PAIS.nombre FROM EQUIPO
        JOIN PAIS ON EQUIPO.id_pais = PAIS.id_pais";
$result = $conn->query($sql);
$equipos = array();
while($e = $result->fetch_assoc()) $equipos[] = $e;

//busco los tipos
$sql = "SELECT * FROM TIPO_PARTICIPANTE";
$result = $conn->query($sql);
$tipos = array();
while($t = $result->fetch_assoc()) $tipos[] = $t;

if (!empty($_POST)) {

    //editar registro
    extract($_POST);

    $sql = "UPDATE PARTICIPANTE
            SET nombre_1 = '$nombre_1', nombre_2 = '$nombre_2', apellido_paterno = '$apellido_paterno', apellido_materno = '$apellido_materno', edad = $edad
            WHERE id_participante = $id_editar";

    if ($conn->query($sql) === TRUE) {
        echo "Arbitro editado";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

//busco participante a editar
$sql = "SELECT * FROM PARTICIPANTE
        WHERE id_participante = $id_editar LIMIT 1";
$result = $conn->query($sql);
$participante = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html>
<head lang="es">
    <meta charset="iso-8859-1">
    <title>Editar Arbitro - Copa America 2015</title>
    <link rel="stylesheet" href="../css/style.css"/>
</head>
<body>
<h1>Editar Arbitro</h1>
<a href="../">Volver al Inicio</a> | <a href="index.php">Volver a Arbitros</a><br/><br/>
<form action="" method="post">
    Primer Nombre:
    <input type="text" name="nombre_1" value="<?php echo $participante['nombre_1']; ?>"/><br/><br/>
    Segundo Nombre:
    <input type="text" name="nombre_2" value="<?php echo $participante['nombre_2']; ?>"/><br/><br/>
    Apellido Paterno:
    <input type="text" name="apellido_paterno" value="<?php echo $participante['apellido_paterno']; ?>"/><br/><br/>
    Apellido Materno:
    <input type="text" name="apellido_materno" value="<?php echo $participante['apellido_materno']; ?>"/><br/><br/>
    Edad:
    <input type="text" name="edad" value="<?php echo $participante['edad']; ?>"/><br/><br/>
    <input type="submit" value="Guardar">
</form>

</body>
</html>