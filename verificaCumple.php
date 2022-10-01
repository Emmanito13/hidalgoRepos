<?php
include_once 'conexion.php';
$conexion = conexion();
$idE = $_POST['idE'];
$fecha = $_POST['fecha'];
$year = date('Y');
$date = date("d-m-Y");

$sql = "SELECT * FROM birthday WHERE idE= $idE ;";

$result = mysqli_query($conexion,$sql);

if(mysqli_num_rows($result) > 0){
    $band = true;    
}
else{
    $sqlInsert = "INSERT INTO birthday (idE,year) VALUES ($idE,'$year') ";
    $result2 = mysqli_query($conexion,$sqlInsert);
    $band = false;
}

echo $band;
?>