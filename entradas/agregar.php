<?php
require_once('../includes/db.php');
//busco las rondas
$sql = "SELECT * FROM RONDA";
$result = $conn->query($sql);
$rondas = array();
while($r = $result->fetch_assoc()) $rondas[] = $r;

if (isset ($_POST['nombre']) && !empty($_POST['nombre']) && isset ($_POST['valor']) && !empty($_POST['valor']) && isset ($_POST['id_ronda']) && !empty($_POST['id_ronda'])) {

    //insertar registro
    extract($_POST);
    $sql = "INSERT INTO ENTRADA (id_ronda,nombre, valor) 
            VALUES ($id_ronda, '$nombre', $valor)";

    if ($conn->query($sql) === TRUE) {
        echo "Nueva entrada creado";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}else{
	echo "Debe ingresar todos los Campos obligatorios";
}
?>
<!DOCTYPE html>
<html>
<head lang="es">
    <meta charset="iso-8859-1">
    <title>Agregar Entradas - Copa America 2015</title>
    <link rel="stylesheet" href="../css/style.css"/>
</head>
<body>
<h1>Agregar Entradas</h1>
<a href="../">Volver al Inicio</a> | <a href="index.php">Volver a Entradas</a><br/><br/>
<form action="" method="post">
    Ronda (*):
    <select name="id_ronda">
        <option value="">Seleccione Ronda</option>
        <?php foreach($rondas as $r) printf('<option value="%d">%s</option>', $r['id_ronda'], $r['nombre']);?>
    </select><br/><br/>
    Nombre (*):
    <input type="text" name="nombre"/><br/><br/>
    Valor (*):
    <input type="text" name="valor"/><br/><br/>
    <input type="submit" value="Guardar">
	<p>(*) = Campos Obligatorios</p
</form>

</body>
</html>