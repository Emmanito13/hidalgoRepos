<?php
require_once 'conexion.php';
$conexion = conexion();
$idE= $_POST['idE'];
$noDia= $_POST['noDia'];
$fecha= $_POST['fecha'];
$estatus =  $_POST['estatus'];

if($estatus == 'pendiente'){
    $update = "UPDATE vacaciones SET fechaDia = '$fecha', estatus = 'pagado' WHERE idE = $idE AND noDia = $noDia";
}else{
    $update = "UPDATE vacaciones SET fechaDia = null, estatus = 'pendiente' WHERE idE = $idE AND noDia = $noDia";
}

echo $result = mysqli_query($conexion,$update);
?>