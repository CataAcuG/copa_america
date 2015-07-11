<?php
require_once('../includes/db.php');

$id_editar = $_GET['id_entrada'];

//busco las rondas
$sql = "SELECT * FROM RONDA";
$result = $conn->query($sql);
$rondas = array();
while($r = $result->fetch_assoc()) $rondas[] = $r;

if (!empty($_POST)) {

    //editar registro
    extract($_POST);

    $sql = "UPDATE ENTRADA SET id_ronda = $id_ronda, nombre = '$nombre', valor = $valor
            WHERE id_entrada = $id_editar";

    if ($conn->query($sql) === TRUE) {
        echo "Entrada editada";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
//busco entrada a editar
$sql = "SELECT * FROM ENTRADA
        WHERE id_entrada = $id_editar LIMIT 1";
$result = $conn->query($sql);
$entrada = $result->fetch_assoc();

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
    Ronda:
    <select name="id_ronda">
        <option value="">Seleccione Ronda</option>
        <?php foreach($rondas as $r) printf('<option value="%d"%s>%s</option>', $r['id_ronda'], $entrada['id_ronda'] == $r['id_ronda']? 'selected="selected"' : '', $r['nombre']);?>
    </select><br/><br/>
    Nombre:
    <input type="text" name="nombre" value="<?php echo $entrada['nombre']; ?>"/><br/><br/>
    Valor:
    <input type="text" name="valor" value="<?php echo $entrada['valor']; ?>"/><br/><br/>
    <input type="submit" value="Guardar">
</form>

</body>
</html>