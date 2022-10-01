<?php     
require 'conexion.php';
$conexion = conexion();

$id = utf8_decode($_POST['id']);
$motivo = utf8_decode($_POST['motivo']);
$fechaB = utf8_decode($_POST['fechaB']);
$observa = utf8_decode($_POST['observa']);
$liquida = utf8_decode($_POST['liquida']);

$ins ='insert into bajas (idE, Fecha, Motivo, Observaciones, Liquidacion ) values ("'.$id.'","'.$fechaB.'","'.$motivo.'","'.$observa.'","'.$liquida.'")';

$upd='UPDATE trabajo SET estatus="baja" where idE="'.$id.'"';

$resultIns = mysqli_query($conexion,$ins);

$resultUp = mysqli_query($conexion,$upd);

if($resultIns && $resultUp){
    echo true;
}
else{
    echo false;
}



?>