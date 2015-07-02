<?php
require_once('../includes/db.php');

// borrar registro
$id_borrar = $_GET['id_equipo'];
$sql = "DELETE FROM EQUIPO WHERE id_equipo = $id_borrar";

if ($conn->query($sql) === TRUE) {
    header("Location: ./");
} else {
    echo "Error borrando registro: " . $conn->error;
}