<?php
include_once 'conexion.php';
$conexion = conexion();

$idE = $_POST['idE'];
$Nlista = $_POST['Nlista'];
$band1=true;

$sqlSelect = "SELECT DISTINCT Nlista FROM trabajo WHERE estatus = 'activo' ORDER BY Nlista ASC;";
$result = mysqli_query($conexion,$sqlSelect);
$result2= mysqli_query($conexion,$sqlSelect);

while($row = mysqli_fetch_array($result)){
    if($row['Nlista'] == $Nlista ){
        $band1 = true;
    }
}

if(!$band1){
    $sqlUpdate = "UPDATE trabajo SET estatus = 'activo' WHERE idE = $idE";
}else{
    $band2=true;
    $numeroDis;
    $i=1;   

    do{
        $row2 = mysqli_fetch_array($result2);
        if(isset($row2)){
            if($row2['Nlista'] == $i){        
                $i++;
            }else{
                $numeroDis = $i;
                $band2 = false;
            }
        }else{
            $numeroDis = $i;
            $band2 = false;
        }
    }while($band2);

    $sqlUpdate = "UPDATE trabajo SET estatus = 'activo', Nlista = $numeroDis WHERE idE = $idE";

}

echo $r = mysqli_query($conexion,$sqlUpdate);
?>