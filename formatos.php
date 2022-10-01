<?php

include 'lib/lib.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Formatos y Listas impresas</title>
    <link rel="shortcut icon" href="pictures/logoAba.png" type="image/x-icon">  
    
</head>

<body BGCOLOR=#CCC>


    <p>&nbsp;</p>


    <div class="container my-4">

        <div class="fw-bold container-header py-5" style="text-align:center; color: #203C6C;">
            <h1 style="font-size: 50px;"><input type="image" src="pictures/formato.png" width="3.3%" height="auto" tabindex="-1"> Formatos</h1>
        </div>        
        <div class="row justify-content-center">
            <div class="col-sm-auto">
                <input type="image" src="pictures/atras.png" alt="Submit" title="Volver" width="30" height="30" onclick=" location ='indexMenu.php'">
            </div>
            <div class="col-sm-4">
                <div class="list-group">

                    <!-- <a href="infoEmple2.php" class="list-group-item list-group-item-action list-group-item-warning">Datos de un Empleado</a>
                    <a href="buscafecha.php" class="list-group-item list-group-item-action list-group-item-secondary">Lista de Asistencia</a>
                    <a href="listaprob.php" class="list-group-item list-group-item-action list-group-item-warning">Lista de Asistencia EXT</a>
                    <a href="verire.php" class="list-group-item list-group-item-action list-group-item-secondary">Lista para Reloj V.</a>
                    <a href="perfem.php" class="list-group-item list-group-item-action list-group-item-warning">Lista de personal Femenino</a>
                    <a href="permas.php" class="list-group-item list-group-item-action list-group-item-secondary">Lista de personal Masculino</a>
                    <a href="lifirma.php" class="list-group-item list-group-item-action list-group-item-warning">Lista para firmas</a>
                    <a href="limss.php" class="list-group-item list-group-item-action list-group-item-secondary">Lista IMSS</a>
                    <a href="Noimss.php" class="list-group-item list-group-item-action list-group-item-warning">Personal sin IMSS</a>
                    <a href="cumple.html" class="list-group-item list-group-item-action list-group-item-secondary">Lista de Cumpleaños</a>
                    <a href="fechaingresos.html" class="list-group-item list-group-item-action list-group-item-warning">Lista de Ingresos de Personal</a>
                    <a href="dep.html" class="list-group-item list-group-item-action list-group-item-secondary">Personal por Departamento</a>
                    <a href="baj.php" class="list-group-item list-group-item-action list-group-item-warning">Bajas por rango de fechas</a>
                    <a href="esa.php" class="list-group-item list-group-item-action list-group-item-secondary">lista de Ingreso y puestos</a>
                    <a href="encargad.php" class="list-group-item list-group-item-action list-group-item-warning">lista de personal a cargo</a>
                    <a href="nomina.php" class="list-group-item list-group-item-action list-group-item-secondary">Gestion de Nomina</a>
                    <a href="nominadep.html" class="list-group-item list-group-item-action list-group-item-warning">Impresion Nomina por departamentos</a>
                    <a href="week.php" class="list-group-item list-group-item-action list-group-item-secondary">Personal Fines de Semana</a>
                    <a href="vacaciones.html" class="list-group-item list-group-item-action list-group-item-warning">Vacaciones</a>
                    <a href="nomilu.php?opc=0" class="list-group-item list-group-item-action list-group-item-secondary">Nomina II</a>
                    <a href="fechanomina.php" class="list-group-item list-group-item-action list-group-item-warning">Historial de Nominas</a> -->

                    <a href="" class="list-group-item list-group-item-action list-group-item-warning">Datos de un Empleado</a>
                    <a href="" class="list-group-item list-group-item-action list-group-item-secondary">Lista de Asistencia</a>
                    <a href="" class="list-group-item list-group-item-action list-group-item-warning">Lista de Asistencia EXT</a>
                    <a href="" class="list-group-item list-group-item-action list-group-item-secondary">Lista para Reloj V.</a>
                    <a href="" class="list-group-item list-group-item-action list-group-item-warning">Lista de personal Femenino</a>
                    <a href="" class="list-group-item list-group-item-action list-group-item-secondary">Lista de personal Masculino</a>
                    <a href="" class="list-group-item list-group-item-action list-group-item-warning">Lista para firmas</a>
                    <a href="" class="list-group-item list-group-item-action list-group-item-secondary">Lista IMSS</a>
                    <a href="" class="list-group-item list-group-item-action list-group-item-warning">Personal sin IMSS</a>
                    <a href="" class="list-group-item list-group-item-action list-group-item-secondary">Lista de Cumpleaños</a>
                    <a href="" class="list-group-item list-group-item-action list-group-item-warning">Lista de Ingresos de Personal</a>
                    <a href="" class="list-group-item list-group-item-action list-group-item-secondary">Personal por Departamento</a>
                    <a href="" class="list-group-item list-group-item-action list-group-item-warning">Bajas por rango de fechas</a>
                    <a href="" class="list-group-item list-group-item-action list-group-item-secondary">Lista de Ingreso y puestos</a>
                    <a href="" class="list-group-item list-group-item-action list-group-item-warning">Lista de personal a cargo</a>
                    <a href="" class="list-group-item list-group-item-action list-group-item-secondary">Gestion de Nomina</a>
                    <a href="" class="list-group-item list-group-item-action list-group-item-warning">Impresion Nomina por departamentos</a>
                    <a href="" class="list-group-item list-group-item-action list-group-item-secondary">Personal Fines de Semana</a>
                    <a href="" class="list-group-item list-group-item-action list-group-item-warning">Vacaciones</a>
                    <a href="" class="list-group-item list-group-item-action list-group-item-secondary">Nomina II</a>
                    <a href="fechanomina.php" class="list-group-item list-group-item-action list-group-item-warning">Historial de Nominas</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>