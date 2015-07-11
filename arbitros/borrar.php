<?php
require_once('../includes/db.php');

// borrar registro
$id_borrar = $_GET['id_participante'];
$sql = "DELETE FROM PARTICIPANTE WHERE id_participante = $id_borrar";

if ($conn->query($sql) === TRUE) {
    header("Location: ./");
} else {
    echo "Error borrando registro: " . $conn->error;
}
?>