<?php
require_once "conexion.php";
$conexion=conexion();

$horario = $_POST['horario'];

$insert = "INSERT INTO turno (horario) VALUE ('$horario')";

echo $result = mysqli_query($conexion,$insert);
?>