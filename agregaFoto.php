<?php
require_once "conexion.php";
    $conexion=conexion();

    $idE=$_POST['d'];
    $ruta = 'fotos/';
    $ruta_default_Frente = $_POST['x'];
    $ruta_default_Perfil = $_POST['y'];
    $ruta_default_Ine = $_POST['z'];

    if(isset($_FILES['f']["name"])){
        if ($ruta_default_Frente != "default-img.png") {
            unlink($ruta.$ruta_default_Frente);
        }        
        $frente = $_FILES['f']["name"];
        move_uploaded_file($_FILES['f']["tmp_name"],$ruta.$frente);        
    }else{
        if($ruta_default_Frente == "" || $ruta_default_Frente == "default-img.png" ){
            $frente = 'default-img.png';
        }else{
            $frente = $ruta_default_Frente;
        }
    }

    if(isset($_FILES['p']["name"])){
        if ($ruta_default_Perfil != "default-img.png") {
            unlink($ruta.$ruta_default_Perfil);
        }
        $perfil = $_FILES['p']["name"];
        move_uploaded_file($_FILES['p']["tmp_name"],$ruta.$perfil);        
    }else{
        if($ruta_default_Perfil == "" || $ruta_default_Perfil == "default-img.png"){
            $perfil = 'default-img.png';
        }else{
            $perfil = $ruta_default_Perfil;
        }
    }

    if(isset($_FILES['i']["name"])){
        if ($ruta_default_Ine != "default-img.png") {
            unlink($ruta.$ruta_default_Ine);
        }
        $ine = $_FILES['i']["name"];
        move_uploaded_file($_FILES['i']["tmp_name"],$ruta.$ine);        
    }else{
        if($ruta_default_Ine == "" || $ruta_default_Ine == "default-img.png" ){
            $ine = 'default-img.png';
        }else{
            $ine = $ruta_default_Ine;
        }
    }



    
    $sqlUPDATE = 'UPDATE imagenes SET srcFrente="'.$frente.'",srcPerfil="'.$perfil.'",srcINE="'.$ine.'"  WHERE idE='.$idE;
    

    echo $result =  mysqli_query($conexion,$sqlUPDATE);
?>