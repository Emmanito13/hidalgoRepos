<!DOCTYPE html>
<html>

<head>
    <title>Archivo de personal</title> 
    <link rel="shortcut icon" href="pictures/logoAba.png" type="image/x-icon">  
    <?php include "lib/lib.php" ?>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="css/style_archivo.css">
    <script src="scripts/funciones.js"></script>
    <meta charset="utf-8">
</head>

<body>
    <div class="conteiner my-4">
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
        $('#tabla').load('tables/TablaGeneral.php');
    });
</script>