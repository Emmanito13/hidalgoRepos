<?php 
include_once 'conexion.php';
$conexion = conexion();
$activo='activo';
//$sql = "SELECT DISTINCT Nlista FROM trabajo WHERE estatus = 'activo' AND Nlista BETWEEN 1 AND 7 ORDER BY Nlista ASC;";
$sql = "SELECT DISTINCT Nlista FROM trabajo WHERE estatus = 'activo' ORDER BY Nlista ASC;";
$result = mysqli_query($conexion,$sql);
$numeroDis;
$i=1;
//
$band=true;
do{
    $row = mysqli_fetch_array($result);
    if(isset($row)){
        if($row['Nlista'] == $i){        
            $i++;
        }else{
            $numeroDis = $i;
            $band = false;
        }
    }else{
        $numeroDis = $i;
        $band = false;
    }
}while($band);

echo $numeroDis;

?>