<?php
require_once('../includes/db.php');

$id_editar = $_GET['id_entrada'];

//busco los equipos
$sql = "SELECT PARTIDO.* FROM PARTIDO";
$result = $conn->query($sql);
$partidos = array();
while($p = $result->fetch_assoc()) $partidos[] = $p;


if (!empty($_POST)) {

    //editar registro
    extract($_POST);

    $sql = "UPDATE ENTRADA SET nombre = '$nombre', valor = $valor, id_partido = $id_partido 
            WHERE id_entrada = $id_editar";

    if ($conn->query($sql) === TRUE) {
        echo "Entrada editado";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

//busco entrada editar
$sql = "SELECT * FROM ENTRADA
        WHERE id_entrada = $id_editar LIMIT 1";
$result = $conn->query($sql);
$entradas = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html>
<head lang="es">
    <meta charset="iso-8859-1">
    <title>Editar Entrada - Copa America 2015</title>
    <link rel="stylesheet" href="../css/style.css"/>
</head>
<body>
<h1>Editar Entrada</h1>
<a href="../">Volver al Inicio</a> | <a href="index.php">Volver a Entradas</a><br/><br/>
<form action="" method="post">
    Partido:
    <select name="id_partido">
        <option value="">Seleccione Fecha</option>
        <?php foreach($partidos as $p) printf('<option value="%d"%s>%s</option>', $p['id_partido'], $entradas['id_partido'] == $partidos['id_partido']? 'selected="selected"' : '', $p['fecha']);?>
    </select><br/><br/>
    Nombre:
    <input type="text" name="nombre" value="<?php echo $entradas['nombre']; ?>"/><br/><br/>
    Valor:
    <input type="text" name="valor" value="<?php echo $entradas['valor']; ?>"/><br/><br/>
    <input type="submit" value="Guardar">
</form>

</body>
</html>