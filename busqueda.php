<!DOCTYPE html>
<html>

<head>
    <title>Busqueda de personal</title>
    <link rel="shortcut icon" href="pictures/logoAba.png" type="image/x-icon">  
    <!-- <link rel="shortcut icon" href="../iconos/favicon.png"> -->
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <?php 
    include "lib/lib.php";
    //$buscar = $_POST['buscar'];
    ?>
    <link rel="stylesheet" href="css/style_busqueda.css">
    <script src="scripts/funciones.js"></script>
</head>
<body>
    <input type="hidden" name="nombre" id="nombre" value="<?php  echo "$buscar"  ?>">
    <div class="conteiner">
        <div class="container-header" style="text-align:center; background: #FFF; color: #8B0000;">
            <h1>Archivo de personal</h1>
        </div>
        <div class="container-fluid">

            <input type="image" src="pictures/atras.png" alt="Submit" title="Volver" width="30" height="30" onclick=" location ='indexMenu.php'">
            <div class="container-fluid" id="tabla"></div>
        </div>
    </div>
</body>

</html>



<script type="text/javascript">
    $(document).ready(function() {
        
        $('#tabla').load('tables/TablaBuscaEmpleado.php');

    });
</script>