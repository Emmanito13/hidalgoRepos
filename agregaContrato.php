<?php
require_once "conexion.php";
$conexion=conexion();

$nombre = $_POST['nombre'];

$insert = "INSERT INTO contrato (nombre) VALUE ('$nombre')";

echo $result = mysqli_query($conexion,$insert);
?>