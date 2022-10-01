<?php

function conexion(){
    $server = 'localhost';
    $user = 'root';
    $db = 'rhhidalgo';
    $pass = '';
    $conexion = mysqli_connect($server,$user,$pass,$db);
    return $conexion;
}


if (conexion()) {
    
} else {
    echo 'NO CONECTADO';
}


// $Conexion = mysqli_connect('localhost', 'bdavid', '1234');

// mysql_select_db('personal', $Conexion);
// echo mysql_error($Conexion);
?>
