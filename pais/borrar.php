<?php
require_once('../includes/db.php');

// borrar registro
$id_borrar = $_GET['id_pais'];
$sql = "DELETE FROM PAIS WHERE id_pais = $id_borrar";

if ($conn->query($sql) === TRUE) {
    header("Location: ./");
} else {
    echo "Error borrando registro: " . $conn->error;
}