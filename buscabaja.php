<!DOCTYPE html>
<html>

<head>
    <title>Dar de baja empleado</title>
    <link rel="shortcut icon" href="pictures/logoAba.png" type="image/x-icon"> 
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <script src="scripts/funciones.js"></script>
    <meta charset="utf-8">
    <?php include "lib/lib.php" ?>
    <link rel="stylesheet" href="css/style_busca_baja.css">
    <script src="scripts/funciones.js"></script>
</head>

<body>
    <div class="conteiner my-4">
        <div class="container-header" style="text-align:center; background: #FFF; color: #8B0000;">
            <h1>Archivo de Personal</h1>
        </div>
        <div class="container-fluid">
            <input type="image" src="pictures/atras.png" alt="Submit" title="Volver" width="30" height="30" onclick=" location ='formatosbaja.php'">
            <div class="container-fluid" id="tabla"></div>
        </div>
        
    </div>
</body>

</html>

<script type="text/javascript">
    $(document).ready(function() {

        $('#preguntar').click(function(){
            preguntarSiNo( $('#nombre').val(),$('#id').val());
        });

        $('#tabla').load('tables/TablaDarBaja.php');

    });
</script>