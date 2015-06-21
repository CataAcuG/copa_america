<?php
require_once('../includes/db.php');

$id_editar = $_GET['id_pais'];

//busco los nombres de los paises
$sql = " SELECT PAIS.nombre FROM PAIS";
$result = $conn->query($sql);
$nombres = array();
while($n = $result->fetch_assoc()) $nombres[] = $n;

//busco las capitales
$sql = "SELECT PAIS.capital FROM PAIS";
$result = $conn->query($sql);
$capitales = array();
while($c = $result->fetch_assoc()) $capitales[] = $c;

if (!empty($_POST)) {

    //editar registro
    extract($_POST);

    $sql = "UPDATE PAIS
            SET nombre = '$nombres', capital = '$capitales'
            WHERE id_pais = $id_editar";

    if ($conn->query($sql) === TRUE) {
        echo "Pais editado";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
//busco pais a editar
$sql = "SELECT PAIS.* FROM PAIS
        WHERE id_pais = $id_editar LIMIT 1";
$result = $conn->query($sql);
$pais = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html>
<head lang="es">
    <meta charset="iso-8859-1">
    <title>Editar Pais - Copa America 2015</title>
    <link rel="stylesheet" href="../css/style.css"/>
</head>
<body>
<h1>Editar Pais</h1>
<a href="../">Volver al Inicio</a> | <a href="index.php">Volver a Paises</a><br/><br/>
<form action="" method="post">
    Nombre:
    <input type="text" name="nombre" value="<?php echo $pais['nombre']; ?>"/><br/><br/>
    Capital:
    <input type="text" name="capital" value="<?php echo $pais['capital']; ?>"/><br/><br/>
	
</form>
</body>
</html>