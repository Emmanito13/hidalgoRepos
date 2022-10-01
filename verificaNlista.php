<?php
include_once 'conexion.php';
$conexion = conexion();

$Nlista = $_POST['Nlista'];

$sql = "SELECT DISTINCT Nlista FROM trabajo WHERE estatus = 'activo'";
$result = mysqli_query($conexion,$sql);

while($row = mysqli_fetch_array($result)){
    if($row['Nlista'] == $Nlista){
        $band = "si";
    }    
}

echo $band;

?>