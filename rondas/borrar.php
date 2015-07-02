<?php
require_once('../includes/db.php');

// borrar registro
$id_borrar = $_GET['id_ronda'];
$sql = "DELETE FROM RONDA WHERE id_ronda = $id_borrar";

if ($conn->query($sql) === TRUE) {
    header("Location: ./");
} else {
    echo "Error borrando registro: " . $conn->error;
}