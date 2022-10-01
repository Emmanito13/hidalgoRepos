<?php
date_default_timezone_set('America/Mexico_City') ;
require_once 'conexion.php';
$conexion = conexion();

$idE = $_POST['idE'];
$Fingreso = date_create($_POST['Fingreso']);
$Factual = date_create(date("d-m-Y"));
$diferencia = date_diff($Fingreso,$Factual);
$year = date('Y');

if($diferencia->y >= 1 && $diferencia->y <= 6){
    $diasV = 6;
}elseif ($diferencia->y >= 7 && $diferencia->y <= 11) {    
    $diasV = 7;
}elseif ($diferencia->y >= 12) {
    $diasV = 8;
}else{
    $diasV = 0;
}

$select = "SELECT * FROM vacaciones WHERE idE = $idE";

$result = mysqli_query($conexion,$select);

if(!$row = mysqli_fetch_array($result)){
    for($i = 0;$i < $diasV;$i++){
        $insert = "INSERT INTO vacaciones (idE,noDia,fechaDia,estatus,fechaPago,year) VALUES ($idE,$i+1,null,'pendiente',null,'$year') ";
        $band = $result2 = mysqli_query($conexion,$insert);
    }
}else{
    $band = false;
}
//printf('El empleado tiene '.$diasV . ' de vacaciones y '.$diferencia->y . "años de antiguedad") ;
//$select = "SELECT * FROM vacaciones WHERE id = $idE";

echo $band;

?>