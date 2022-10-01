<?php

require_once "conexion.php";
    $conexion=conexion();

    $idE=$_POST['idE'];
    $checkEmpleo=$_POST['checkEmpleo'];
    $checkCurp=$_POST['checkCurp'];
    $checkDomicilio=$_POST['checkDomicilio'];
    $checkANP=$_POST['checkANP'];
    $checkCarta1=$_POST['checkCarta1'];
    $checkActa=$_POST['checkActa'];
    $checkElector=$_POST['checkElector'];
    $checkEstudios=$_POST['checkEstudios'];
    $checkImss=$_POST['checkImss'];
    $checkCarta2=$_POST['checkCarta2'];

    $sqlUPDATE = "UPDATE documentos SET solicitudE=$checkEmpleo,curp=$checkCurp,comprobanteD=$checkDomicilio,cANP=$checkANP,CR1=$checkCarta1,actaN=$checkActa,credencialE=$checkElector,comprobanteE=$checkEstudios,NoAImss=$checkImss,CR2=$checkCarta2 WHERE idE = $idE";

    echo $result =  mysqli_query($conexion,$sqlUPDATE);
?>