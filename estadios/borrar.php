<?php
require_once('../includes/db.php');

// borrar registro
$id_borrar = $_GET['id_estadio'];
$sql = "DELETE FROM ESTADIO WHERE id_estadio = $id_borrar";

if ($conn->query($sql) === TRUE) {
    header("Location: ./");
} else {
    echo "Error borrando registro: " . $conn->error;
}