<?php
    require_once "conexion.php";
    $conexion=conexion();

    $idE=$_POST['idE'];
    //$apellidos = $_POST['apellidos'];
    //$nombre=$_POST['nombre'];
    //$fechaN=$_POST['fechaN'];
    //$sexo=$_POST['sexo'];
    //$direccion=$_POST['direccion'];
    //$curp=$_POST['curp'];
    //$numeroT=$_POST['numeroT'];
    //$correo=$_POST['correo'];
    //$rfc=$_POST['rfc'];
    //$fechaAImss=$_POST['fechaAImss'];
    //$noLImss=$_POST['noLImss'];
    //$noImss=$_POST['noImss'];
    //$sueldoImss=$_POST['sueldoImss'];
    //$Nlista=$_POST['Nlista'];
    //$sueldo=$_POST['sueldo'];
    //$turno=$_POST['turno'];
    //$fechaIAbarrotera=$_POST['fechaIAbarrotera'];
    //$contrato=$_POST['contrato'];
    //$empresa=$_POST['empresa'];
    //$departamento=$_POST['departamento'];
    //$puesto=$_POST['puesto'];
    //$jefe=$_POST['jefe'];
    //$observaciones=$_POST['observaciones'];

    //-------------------

    
    if($_POST['nombre'] == ''){
        $nombre = 'null';
    }else{
        $nombre = "'".$_POST['nombre']."'";
    }
    
    if($_POST['apellidos'] == ''){
        $apellidos = 'null';
    }else{
        $apellidos = "'".$_POST['apellidos']."'";
    }

    if($_POST['fechaN'] == ''){
        $fechaN = 'null';
    }else{
        $fechaN = "'".$_POST['fechaN']."'";
    }

    if($_POST['sexo'] == ''){
        $sexo = 'null';
    }else{
        $sexo = "'".$_POST['sexo']."'";
    }

    if($_POST['Nlista'] == ''){
        $Nlista = 'null';
    }else{
        $Nlista = "'".$_POST['Nlista']."'";
    }
    
    if($_POST['sueldo'] == ''){
        $sueldo = 'null';
    }else{
        $sueldo = "'".$_POST['sueldo']."'";
    }

    if($_POST['turno'] == ''){
        $turno = 'null';
    }else{
        $turno = "'".$_POST['turno']."'";
    }

    if($_POST['fechaIAbarrotera'] == ''){
        $fechaIAbarrotera = 'null';
    }else{
        $fechaIAbarrotera = "'".$_POST['fechaIAbarrotera']."'";
    }

    if($_POST['contrato'] == ''){
        $contrato = 0;
    }else{
        $contrato = "'".$_POST['contrato']."'";
    }

    if($_POST['empresa'] == ''){
        $empresa = 'null';
    }else{
        $empresa = "'".$_POST['empresa']."'";
    }

    if($_POST['departamento'] == ''){
        $departamento = 'null';
    }else{
        $departamento = "'".$_POST['departamento']."'";
    }

    if($_POST['puesto'] == ''){
        $puesto = 'null';
    }else{
        $puesto = "'".$_POST['puesto']."'";
    }

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
    
    if($_POST['numeroT'] == ''){
        $numeroT = 'null';
    }else{
        $numeroT = "'".$_POST['numeroT']."'";
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
    
    if($_POST['fechaAImss'] == ''){
        $fechaAImss = 'null';
    }else{
        $fechaAImss = "'".$_POST['fechaAImss']."'";
    }
    
    if($_POST['noLImss'] == ''){
        $noLImss = 'null';
    }else{
        $noLImss = $_POST['noLImss'];
    }
    
    if($_POST['noImss'] == ''){
        $noImss = 'null';
    }else{
        $noImss = "'".$_POST['noImss']."'";
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

    //-----------------------
    //,Fimss=$fechaAImss,idimss=$noLImss,numeroimss=$noImss,SueldoImss=$sueldoImss,
    //Nlista=$Nlista,Sueldo=$sueldo,turno=$turno,Fingreso=$fechaIAbarrotera,contrato=$contrato,Empresa=$empresa,Departamento=$departamento,Puesto=$puesto,Jefe=$jefe,Observaciones=$observaciones
    
    $updateEmpleado="UPDATE empleado SET Nombre=$nombre,Apellidos=$apellidos,Fnacimiento=$fechaN,Sexo=$sexo,Direccion=$direccion,Telefono=$numeroT,C_U_R_P=$curp,CorreoE=$correo,RFC=$rfc WHERE idE = $idE";    
    $result1=mysqli_query($conexion,$updateEmpleado);

    $updateTrabajo = "UPDATE trabajo SET Nlista=$Nlista,Fingreso=$fechaIAbarrotera,Sueldo=$sueldo,idTurno=$turno,idEmpresa=$empresa,idDepartamento=$departamento,idPuesto=$puesto,idContrato=$contrato,idJefe=$jefe,Observaciones=$observaciones WHERE idE = $idE";    
    $result2=mysqli_query($conexion,$updateTrabajo);

    $updateImss = "UPDATE imss SET idimss=$noLImss,Fimss=$fechaAImss,numeroimss=$noImss,SueldoImss=$sueldoImss WHERE idE = $idE";    
    $result3=mysqli_query($conexion,$updateImss);

    if($result1 && $result2 && $result3){
        echo true;
    }else{
        echo $result1.$result2.$result3;
    }
     

?>