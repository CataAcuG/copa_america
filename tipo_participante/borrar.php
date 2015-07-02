<?php
require_once('../includes/db.php');

// borrar registro
$id_borrar = $_GET['id_tipo'];
$sql = "DELETE FROM TIPO_PARTICIPANTE WHERE id_tipo = $id_borrar";

if ($conn->query($sql) === TRUE) {
    header("Location: ./");
} else {
    echo "Error borrando registro: " . $conn->error;
}