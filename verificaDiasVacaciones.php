<?php
date_default_timezone_set('America/Mexico_City') ;
include_once 'conexion.php';
$conexion = conexion();
$idE = $_POST['idE'];
$year = date('Y');
$date = date("d-m-Y");

$sql = "SELECT E.idE,E.Nombre,E.Apellidos,T.Nlista,D.nombre as departamento,I.SueldoImss,T.Sueldo,V.fechaDia,V.estatus FROM 
empleado as E,trabajo AS T,departamento as D,imss as I,vacaciones as V WHERE 
E.idE = T.idE AND T.idDepartamento = D.idDepa AND E.idE = I.idE AND E.idE = V.idE AND V.estatus = 'pagado' AND V.year = '$year' AND E.idE = $idE 
ORDER BY V.fechaDia ASC;";

$result = mysqli_query($conexion,$sql);

if(mysqli_num_rows($result) > 0){
    $band = true;
    $sqlUPDATE = "UPDATE vacaciones SET fechaPago = CURDATE() WHERE idE = $idE AND year = '$year';";
    $result2 = mysqli_query($conexion,$sqlUPDATE);
}
else{
    $band = false;
}

echo $band;
?>