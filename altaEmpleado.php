<?php
require_once 'conexion.php';
$conexion = conexion();

//DATOS OBLIGATORIOS
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$fNacimiento = $_POST['fNacimiento'];
$sexo = $_POST['sexo'];
$noEmpleado = $_POST['noEmpleado'];
$sueldo = $_POST['sueldo'];
$turno = $_POST['turno'];
$fIngreso = "'".$_POST['fIngreso']."'";;
$contrato = $_POST['contrato'];
$empresa = $_POST['empresa'];
$departamento = $_POST['departamento'];
$puesto = $_POST['puesto'];

//DATOS OPCIONALES
if($_POST['direccion'] == ''){
    $direccion = 'null';
}else{
    $direccion = "'".$_POST['direccion']."'";
}

if($_POST['curp'] == ''){
    $curp = 'null';
}else{
    $curp = "'".$_POST['curp']."'";
}

if($_POST['nTelefono'] == ''){
    $nTelefono = 'null';
}else{
    $nTelefono = "'".$_POST['nTelefono']."'";
}

if($_POST['correo'] == ''){
    $correo = 'null';
}else{
    $correo = "'".$_POST['correo']."'";
}

if($_POST['rfc'] == ''){
    $rfc = 'null';
}else{
    $rfc = "'".$_POST['rfc']."'";
}

if($_POST['fAltaImss'] == ''){
    $fAltaImss = 'null';
}else{
    $fAltaImss = "'".$_POST['fAltaImss']."'";
}

if($_POST['noListaImss'] == ''){
    $noListaImss = 'null';
}else{
    $noListaImss = $_POST['noListaImss'];
}

if($_POST['nImss'] == ''){
    $nImss = 'null';
}else{
    $nImss = "'".$_POST['nImss']."'";
}

if($_POST['sueldoImss'] == ''){
    $sueldoImss = 'null';
}else{
    $sueldoImss = $_POST['sueldoImss'];
}

if($_POST['jefe'] == '' || $_POST['jefe'] == 'Elige un jefe'){
    $jefe = 'null';
}else{
    $jefe = "'".$_POST['jefe']."'";
}

if($_POST['observaciones'] == ''){
    $observaciones = 'null';
}else{
    $observaciones = "'".$_POST['observaciones']."'";    
}


$insertEmpleado = "INSERT INTO empleado (Nombre,Apellidos,Fnacimiento,Sexo,Direccion,Telefono,C_U_R_P,CorreoE,RFC)
                VALUES('".$nombre."','".$apellidos."','".$fNacimiento."','".$sexo."',".$direccion.",".$nTelefono.",".$curp.",".$correo.",".$rfc.");";
                $result1 = mysqli_query($conexion,$insertEmpleado);
                $lastId = mysqli_insert_id($conexion);


                       // ,".$fAltaImss.",".$noListaImss.",".$nImss.",".$sueldoImss.",".$noEmpleado.",
                       // ".$sueldo.",".$turno.",'".$fIngreso."',".$contrato.",'".$empresa."','".$departamento."','".$puesto."',".$jefe.",".$observaciones."
                       

$insertTrabajo = "INSERT INTO trabajo (idE,Nlista,Fingreso,Sueldo,idTurno,idEmpresa,idDepartamento,idPuesto,idContrato,idJefe,Observaciones)
                VALUES($lastId,$noEmpleado,$fIngreso,$sueldo,$turno,$empresa,$departamento,$puesto,$contrato,$jefe,$observaciones);";
                //echo $insertTrabajo ;
                $result2 = mysqli_query($conexion,$insertTrabajo);                

$insertImss = "INSERT INTO imss (idE, idimss, Fimss, numeroimss, SueldoImss)
                VALUES($lastId,$noListaImss,$fAltaImss,$nImss,$sueldoImss);";
                $result3 = mysqli_query($conexion,$insertImss);

//echo $insertSQL;

if($result1 && $result2 && $result3){
    echo true;
}else{
    echo $result1.$result2.$result3;
}
//echo $result = mysqli_query($conexion,$insertSQL);
?>

