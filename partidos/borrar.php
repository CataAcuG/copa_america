<?php
require_once('../includes/db.php');

// borrar registro
$id_borrar = $_GET['id_partido'];
$sql = "DELETE FROM PARTIDO WHERE id_partido = $id_borrar";

if ($conn->query($sql) === TRUE) {
    header("Location: ./");
} else {
    echo "Error borrando registro: " . $conn->error;
}