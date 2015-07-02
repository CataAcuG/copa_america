<?php
require_once('../includes/db.php');

// borrar registro
$id_borrar = $_GET['id_ciudad'];
$sql = "DELETE FROM CIUDAD WHERE id_ciudad = $id_borrar";

if ($conn->query($sql) === TRUE) {
    header("Location: ./");
} else {
    echo "Error borrando registro: " . $conn->error;
}