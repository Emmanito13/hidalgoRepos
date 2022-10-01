<?php
$idE = $_GET['idE'];
$fecha = $_GET['fecha'];
?>

<!DOCTYPE html>
<html>

<head>
    <title>Cumpleaños</title>
    <link rel="shortcut icon" href="pictures/logoAba.png" type="image/x-icon">  
    <?php include "lib/lib.php" ?>
    <?php
    include_once "conexion.php";
    $conexion = conexion();
    ?>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <script src="scripts/funciones.js"></script>
    <meta charset="utf-8">
</head>

<body>
    <?php
    $sql = "SELECT Nombre,Apellidos FROM empleado WHERE idE=$idE";
    $result = mysqli_query($conexion, $sql);
    $row = mysqli_fetch_array($result);
    ?>
    <div class="container my-4">
        <div class="container-header" style="text-align:center; background: #FFF; color: #8B0000;">
            <h1>Cumpleaños</h1>
        </div>
        <div class="row justify-content-between">
            <div class="col-sm-4">
                <input type="image" src="pictures/atras.png" title="Volver" width="30" height="30" onclick=" location ='archivo.php'">
            </div>
        </div>
        <div class="row justify-content-between" style="background-color: #FAF7EE">
            <div class="row justify-content-center">
                <div class="col-sm-4">
                    <h2 class="text-center">¡Felicidades!</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-4">
                    <h3 style="font-size: 24px;" class="text-center">Hoy es el cumpleaños de <b><?php echo $row['Nombre'] . " " . $row['Apellidos']  ?> </h3>
                </div>
            </div>
            <br>
            <br>
            <div class="row justify-content-center">
                <div class="col-sm-4">
                    <?php
                    $sql2 = "SELECT * FROM birthday WHERE idE = $idE";
                    $result2 = mysqli_query($conexion, $sql2);
                    $row2 = mysqli_fetch_array($result2);
                    if ($row2['estatus'] == 'pendiente') {
                    ?>
                        <div style="text-align: center;" class="form-check">
                            <input class="form-check-input" type="checkbox" value="" name="checkCumple" id="checkCumple">
                            <label class="form-check-label" for="flexCheckDefault">
                                Bono de cumpleaños equivalente $200.00 MXN
                            </label>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" name="checkCumple" id="checkCumple" checked disabled>
                            <label class="form-check-label" for="flexCheckDefault">
                                Bono de cumpleaños equivalente $200.00 MXN
                            </label>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-4">
                    <img src="pictures/cumple.gif" height="auto" width="400px">
                </div>
            </div>
            <div class="row justify-content-center text-center">
                <div class="col-sm-4">
                    <button type="button" class="btn btn-info" style="background:rgb(50, 141, 168); color:#FFF; margin: 1rem;" id="btn-Recibo" onclick="verificaCumple('<?php echo $idE ?>')">Generar recibo</button>
                </div>
            </div>
        </div>
    </div>
    </div>

</html>

<!-- <script type="text/javascript">
     $(document).ready(function(e) {
         var idE = $('#idE').val();
         var fecha = $('#fecha').val();
         if()

     });
     
 </script> -->