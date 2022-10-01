<?php
date_default_timezone_set('America/Mexico_City');
$idE = $_GET['idE'];
$nLista = $_GET['nLista'];
$nombre = $_GET['nombre'];
$apellidos = $_GET['apellidos'];
$fIngreso = $_GET['fIngreso'];
$sueldo = $_GET['sueldo'];
$depa = $_GET['depa'];
$primaV = $sueldo * 0.25;
$sueldoP = $sueldo + $primaV;

//setlocale(LC_MONETARY, 'es_MXN');

$fI = date_create($fIngreso);
$fA = date_create(date("d-m-Y"));
$diferencia = date_diff($fI, $fA);
$year = date('Y');

if ($diferencia->y >= 1 && $diferencia->y <= 6) {
    $diasV = 6;
} elseif ($diferencia->y >= 7 && $diferencia->y <= 11) {
    $diasV = 7;
} elseif ($diferencia->y >= 12) {
    $diasV = 8;
} else {
    $diasV = 0;
}
$sueldoT = ($sueldoP / $diasV) * $diasV;
?>
<input hidden type="text" name="idE" id="idE" value="<?php echo $idE; ?>">
<input hidden type="text" name="nLista" id="nLista" value="<?php echo $nLista; ?>">
<input hidden type="text" name="nombre" id="nombre" value="<?php echo $nombre; ?>">
<input hidden type="text" name="apellidos" id="apellidos" value="<?php echo $apellidos; ?>">
<input hidden type="text" name="fIngreso" id="fIngreso" value="<?php echo $fIngreso; ?>">
<input hidden type="text" name="sueldo" id="sueldo" value="<?php echo $sueldo; ?>">
<input hidden type="text" name="depa" id="depa" value="<?php echo $depa; ?>">


<!DOCTYPE html>
<html>

<head>
    <title>Vacaciones</title>
    <link rel="shortcut icon" href="pictures/logoAba.png" type="image/x-icon">
    <?php include "lib/lib.php" ?>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="css/style_vacaciones_empleado.css">
    <script src="scripts/funciones.js"></script>
    <meta charset="utf-8">
</head>

<body>
    <div class="conteiner my-4" id="contenedor">
        <div class="container-header" style="text-align:center; background: #FFF; color: #8B0000;">
            <h1>Vacaciones</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-4">
                <input type="image" src="pictures/atras.png" title="Volver" width="30" height="30" onclick=" location ='archivo.php'">
                <!-- <div id="tabla"></div> -->
                <?php
                require_once 'conexion.php';
                $conexion = conexion();
                $Consulta = "SELECT V.idE,V.noDia,V.fechaDia,V.estatus,V.fechaPago,V.year,T.Sueldo FROM vacaciones as V,trabajo as T where V.idE = $idE AND T.idE = $idE";
                $Lista = mysqli_query($conexion, $Consulta);
                if ($diasV == 6) {
                ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center" scope="col">No. Dia</th>
                                <th class="text-center" scope="col">Fecha</th>
                                <th class="text-center" scope="col">Sueldo/Dia</th>
                                <th class="text-center" scope="col">Estatus</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                $row = mysqli_fetch_array($Lista);
                                $estatus = "'" . $row['estatus'] . "'";
                                ?>
                                <th class="text-center" scope="row"><?php echo $row['noDia'] ?></th>
                                <td><input type="date" id="fechaV1-6" name="fechaV1-6" class="form-control input-sm" value="<?php echo $row['fechaDia'] ?>"></td>
                                <td class="text-center"><?php echo "$" . " " . round(($row['Sueldo'] + ($row['Sueldo'] * 0.25)) / 6, 2);  ?></td>
                                <?php
                                if ($row['estatus'] == 'pendiente') {
                                ?>
                                    <td class="text-center"><input type='image' src='pictures/pendiente.png' alt='Submit' width='20' height='20' onclick="preguntarEstatus(<?php echo $idE ?>,<?php echo $row['noDia'] ?>,$('#fechaV1-6').val(),<?php echo $estatus ?>)"></td>
                                <?php
                                } else {
                                ?>
                                    <td class="text-center"><input type='image' src='pictures/pagado.png' alt='Submit' width='20' height='20' onclick="preguntarEstatus(<?php echo $idE ?>,<?php echo $row['noDia'] ?>,$('#fechaV1-6').val(),<?php echo $estatus ?>)"></td>
                                <?php
                                }
                                ?>
                            </tr>
                            <tr>
                                <?php
                                $row = mysqli_fetch_array($Lista);
                                $estatus = "'" . $row['estatus'] . "'";
                                ?>
                                <th class="text-center" scope="row"><?php echo $row['noDia'] ?></th>
                                <td><input type="date" id="fechaV2-6" name="fechaV2-6" class="form-control input-sm" value="<?php echo $row['fechaDia'] ?>"></td>
                                <td class="text-center"><?php echo "$" . " " . round(($row['Sueldo'] + ($row['Sueldo'] * 0.25)) / 6, 2);  ?></td>
                                <?php
                                if ($row['estatus'] == 'pendiente') {
                                ?>
                                    <td class="text-center"><input type='image' src='pictures/pendiente.png' alt='Submit' width='20' height='20' onclick="preguntarEstatus(<?php echo $idE ?>,<?php echo $row['noDia'] ?>,$('#fechaV2-6').val(),<?php echo $estatus ?>)"></td>
                                <?php
                                } else {
                                ?>
                                    <td class="text-center"><input type='image' src='pictures/pagado.png' alt='Submit' width='20' height='20' onclick="preguntarEstatus(<?php echo $idE ?>,<?php echo $row['noDia'] ?>,$('#fechaV2-6').val(),<?php echo $estatus ?>)"></td>
                                <?php
                                }
                                ?>
                            </tr>
                            <tr>
                                <?php
                                $row = mysqli_fetch_array($Lista);
                                $estatus = "'" . $row['estatus'] . "'";
                                ?>
                                <th class="text-center" scope="row"><?php echo $row['noDia'] ?></th>
                                <td><input type="date" id="fechaV3-6" name="fechaV3-6" class="form-control input-sm" value="<?php echo $row['fechaDia'] ?>"></td>
                                <td class="text-center"><?php echo "$" . " " . round(($row['Sueldo'] + ($row['Sueldo'] * 0.25)) / 6, 2);  ?></td>
                                <?php
                                if ($row['estatus'] == 'pendiente') {
                                ?>
                                    <td class="text-center"><input type='image' src='pictures/pendiente.png' alt='Submit' width='20' height='20' onclick="preguntarEstatus(<?php echo $idE ?>,<?php echo $row['noDia'] ?>,$('#fechaV3-6').val(),<?php echo $estatus ?>)"></td>
                                <?php
                                } else {
                                ?>
                                    <td class="text-center"><input type='image' src='pictures/pagado.png' alt='Submit' width='20' height='20' onclick="preguntarEstatus(<?php echo $idE ?>,<?php echo $row['noDia'] ?>,$('#fechaV3-6').val(),<?php echo $estatus ?>)"></td>
                                <?php
                                }
                                ?>
                            </tr>

                            <tr>
                                <?php
                                $row = mysqli_fetch_array($Lista);
                                $estatus = "'" . $row['estatus'] . "'";
                                ?>
                                <th class="text-center" scope="row"><?php echo $row['noDia'] ?></th>
                                <td><input type="date" id="fechaV4-6" name="fechaV4-6" class="form-control input-sm" value="<?php echo $row['fechaDia'] ?>"></td>
                                <td class="text-center"><?php echo "$" . " " . round(($row['Sueldo'] + ($row['Sueldo'] * 0.25)) / 6, 2);  ?></td>
                                <?php
                                if ($row['estatus'] == 'pendiente') {
                                ?>
                                    <td class="text-center"><input type='image' src='pictures/pendiente.png' alt='Submit' width='20' height='20' onclick="preguntarEstatus(<?php echo $idE ?>,<?php echo $row['noDia'] ?>,$('#fechaV4-6').val(),<?php echo $estatus ?>)"></td>
                                <?php
                                } else {
                                ?>
                                    <td class="text-center"><input type='image' src='pictures/pagado.png' alt='Submit' width='20' height='20' onclick="preguntarEstatus(<?php echo $idE ?>,<?php echo $row['noDia'] ?>,$('#fechaV4-6').val(),<?php echo $estatus ?>)"></td>
                                <?php
                                }
                                ?>
                            </tr>

                            <tr>
                                <?php
                                $row = mysqli_fetch_array($Lista);
                                $estatus = "'" . $row['estatus'] . "'";
                                ?>
                                <th class="text-center" scope="row"><?php echo $row['noDia'] ?></th>
                                <td><input type="date" id="fechaV5-6" name="fechaV5-6" class="form-control input-sm" value="<?php echo $row['fechaDia'] ?>"></td>
                                <td class="text-center"><?php echo "$" . " " . round(($row['Sueldo'] + ($row['Sueldo'] * 0.25)) / 6, 2);  ?></td>
                                <?php
                                if ($row['estatus'] == 'pendiente') {
                                ?>
                                    <td class="text-center"><input type='image' src='pictures/pendiente.png' alt='Submit' width='20' height='20' onclick="preguntarEstatus(<?php echo $idE ?>,<?php echo $row['noDia'] ?>,$('#fechaV5-6').val(),<?php echo $estatus ?>)"></td>
                                <?php
                                } else {
                                ?>
                                    <td class="text-center"><input type='image' src='pictures/pagado.png' alt='Submit' width='20' height='20' onclick="preguntarEstatus(<?php echo $idE ?>,<?php echo $row['noDia'] ?>,$('#fechaV5-6').val(),<?php echo $estatus ?>)"></td>
                                <?php
                                }
                                ?>
                            </tr>

                            <tr>
                                <?php
                                $row = mysqli_fetch_array($Lista);
                                $estatus = "'" . $row['estatus'] . "'";
                                ?>
                                <th class="text-center" scope="row"><?php echo $row['noDia'] ?></th>
                                <td><input type="date" id="fechaV6-6" name="fechaV6-6" class="form-control input-sm" value="<?php echo $row['fechaDia'] ?>"></td>
                                <td class="text-center"><?php echo "$" . " " . round(($row['Sueldo'] + ($row['Sueldo'] * 0.25)) / 6, 2);  ?></td>
                                <?php
                                if ($row['estatus'] == 'pendiente') {
                                ?>
                                    <td class="text-center"><input type='image' src='pictures/pendiente.png' alt='Submit' width='20' height='20' onclick="preguntarEstatus(<?php echo $idE ?>,<?php echo $row['noDia'] ?>,$('#fechaV6-6').val(),<?php echo $estatus ?>)"></td>
                                <?php
                                } else {
                                ?>
                                    <td class="text-center"><input type='image' src='pictures/pagado.png' alt='Submit' width='20' height='20' onclick="preguntarEstatus(<?php echo $idE ?>,<?php echo $row['noDia'] ?>,$('#fechaV6-6').val(),<?php echo $estatus ?>)"></td>
                                <?php
                                }
                                ?>
                            </tr>
                        </tbody>
                    </table>
                <?php
                } else if ($diasV == 7) {
                ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center" scope="col">No. Dia</th>
                                <th class="text-center" scope="col">Fecha</th>
                                <th class="text-center" scope="col">Sueldo/Dia</th>
                                <th class="text-center" scope="col">Estatus</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                $row = mysqli_fetch_array($Lista);
                                $estatus = "'" . $row['estatus'] . "'";
                                ?>
                                <th class="text-center" scope="row"><?php echo $row['noDia'] ?></th>
                                <td><input type="date" id="fechaV1-7" name="fechaV1-7" class="form-control input-sm" value="<?php echo $row['fechaDia'] ?>"></td>
                                <td class="text-center"><?php echo "$" . " " . round(($row['Sueldo'] + ($row['Sueldo'] * 0.25)) / 7, 2);  ?></td>
                                <?php
                                if ($row['estatus'] == 'pendiente') {
                                ?>
                                    <td class="text-center"><input type='image' src='pictures/pendiente.png' alt='Submit' width='20' height='20' onclick="preguntarEstatus(<?php echo $idE ?>,<?php echo $row['noDia'] ?>,$('#fechaV1-7').val(),<?php echo $estatus ?>)"></td>
                                <?php
                                } else {
                                ?>
                                    <td class="text-center"><input type='image' src='pictures/pagado.png' alt='Submit' width='20' height='20' onclick="preguntarEstatus(<?php echo $idE ?>,<?php echo $row['noDia'] ?>,$('#fechaV1-7').val(),<?php echo $estatus ?>)"></td>
                                <?php
                                }
                                ?>
                            </tr>
                            <tr>
                                <?php
                                $row = mysqli_fetch_array($Lista);
                                $estatus = "'" . $row['estatus'] . "'";
                                ?>
                                <th class="text-center" scope="row"><?php echo $row['noDia'] ?></th>
                                <td><input type="date" id="fechaV2-7" name="fechaV2-7" class="form-control input-sm" value="<?php echo $row['fechaDia'] ?>"></td>
                                <td class="text-center"><?php echo "$" . " " . round(($row['Sueldo'] + ($row['Sueldo'] * 0.25)) / 7, 2);  ?></td>
                                <?php
                                if ($row['estatus'] == 'pendiente') {
                                ?>
                                    <td class="text-center"><input type='image' src='pictures/pendiente.png' alt='Submit' width='20' height='20' onclick="preguntarEstatus(<?php echo $idE ?>,<?php echo $row['noDia'] ?>,$('#fechaV2-7').val(),<?php echo $estatus ?>)"></td>
                                <?php
                                } else {
                                ?>
                                    <td class="text-center"><input type='image' src='pictures/pagado.png' alt='Submit' width='20' height='20' onclick="preguntarEstatus(<?php echo $idE ?>,<?php echo $row['noDia'] ?>,$('#fechaV2-7').val(),<?php echo $estatus ?>)"></td>
                                <?php
                                }
                                ?>
                            </tr>
                            <tr>
                                <?php
                                $row = mysqli_fetch_array($Lista);
                                $estatus = "'" . $row['estatus'] . "'";
                                ?>
                                <th class="text-center" scope="row"><?php echo $row['noDia'] ?></th>
                                <td><input type="date" id="fechaV3-7" name="fechaV3-7" class="form-control input-sm" value="<?php echo $row['fechaDia'] ?>"></td>
                                <td class="text-center"><?php echo "$" . " " . round(($row['Sueldo'] + ($row['Sueldo'] * 0.25)) / 7, 2);  ?></td>
                                <?php
                                if ($row['estatus'] == 'pendiente') {
                                ?>
                                    <td class="text-center"><input type='image' src='pictures/pendiente.png' alt='Submit' width='20' height='20' onclick="preguntarEstatus(<?php echo $idE ?>,<?php echo $row['noDia'] ?>,$('#fechaV3-7').val(),<?php echo $estatus ?>)"></td>
                                <?php
                                } else {
                                ?>
                                    <td class="text-center"><input type='image' src='pictures/pagado.png' alt='Submit' width='20' height='20' onclick="preguntarEstatus(<?php echo $idE ?>,<?php echo $row['noDia'] ?>,$('#fechaV3-7').val(),<?php echo $estatus ?>)"></td>
                                <?php
                                }
                                ?>
                            </tr>

                            <tr>
                                <?php
                                $row = mysqli_fetch_array($Lista);
                                $estatus = "'" . $row['estatus'] . "'";
                                ?>
                                <th class="text-center" scope="row"><?php echo $row['noDia'] ?></th>
                                <td><input type="date" id="fechaV4-7" name="fechaV4-7" class="form-control input-sm" value="<?php echo $row['fechaDia'] ?>"></td>
                                <td class="text-center"><?php echo "$" . " " . round(($row['Sueldo'] + ($row['Sueldo'] * 0.25)) / 7, 2);  ?></td>
                                <?php
                                if ($row['estatus'] == 'pendiente') {
                                ?>
                                    <td class="text-center"><input type='image' src='pictures/pendiente.png' alt='Submit' width='20' height='20' onclick="preguntarEstatus(<?php echo $idE ?>,<?php echo $row['noDia'] ?>,$('#fechaV4-7').val(),<?php echo $estatus ?>)"></td>
                                <?php
                                } else {
                                ?>
                                    <td class="text-center"><input type='image' src='pictures/pagado.png' alt='Submit' width='20' height='20' onclick="preguntarEstatus(<?php echo $idE ?>,<?php echo $row['noDia'] ?>,$('#fechaV4-7').val(),<?php echo $estatus ?>)"></td>
                                <?php
                                }
                                ?>
                            </tr>

                            <tr>
                                <?php
                                $row = mysqli_fetch_array($Lista);
                                $estatus = "'" . $row['estatus'] . "'";
                                ?>
                                <th class="text-center" scope="row"><?php echo $row['noDia'] ?></th>
                                <td><input type="date" id="fechaV5-7" name="fechaV5-7" class="form-control input-sm" value="<?php echo $row['fechaDia'] ?>"></td>
                                <td class="text-center"><?php echo "$" . " " . round(($row['Sueldo'] + ($row['Sueldo'] * 0.25)) / 7, 2);  ?></td>
                                <?php
                                if ($row['estatus'] == 'pendiente') {
                                ?>
                                    <td class="text-center"><input type='image' src='pictures/pendiente.png' alt='Submit' width='20' height='20' onclick="preguntarEstatus(<?php echo $idE ?>,<?php echo $row['noDia'] ?>,$('#fechaV5-7').val(),<?php echo $estatus ?>)"></td>
                                <?php
                                } else {
                                ?>
                                    <td class="text-center"><input type='image' src='pictures/pagado.png' alt='Submit' width='20' height='20' onclick="preguntarEstatus(<?php echo $idE ?>,<?php echo $row['noDia'] ?>,$('#fechaV5-7').val(),<?php echo $estatus ?>)"></td>
                                <?php
                                }
                                ?>
                            </tr>

                            <tr>
                                <?php
                                $row = mysqli_fetch_array($Lista);
                                $estatus = "'" . $row['estatus'] . "'";
                                ?>
                                <th class="text-center" scope="row"><?php echo $row['noDia'] ?></th>
                                <td><input type="date" id="fechaV6-7" name="fechaV6-7" class="form-control input-sm" value="<?php echo $row['fechaDia'] ?>"></td>
                                <td class="text-center"><?php echo "$" . " " . round(($row['Sueldo'] + ($row['Sueldo'] * 0.25)) / 7, 2);  ?></td>
                                <?php
                                if ($row['estatus'] == 'pendiente') {
                                ?>
                                    <td class="text-center"><input type='image' src='pictures/pendiente.png' alt='Submit' width='20' height='20' onclick="preguntarEstatus(<?php echo $idE ?>,<?php echo $row['noDia'] ?>,$('#fechaV6-7').val(),<?php echo $estatus ?>)"></td>
                                <?php
                                } else {
                                ?>
                                    <td class="text-center"><input type='image' src='pictures/pagado.png' alt='Submit' width='20' height='20' onclick="preguntarEstatus(<?php echo $idE ?>,<?php echo $row['noDia'] ?>,$('#fechaV6-7').val(),<?php echo $estatus ?>)"></td>
                                <?php
                                }
                                ?>
                            </tr>

                            <tr>
                                <?php
                                $row = mysqli_fetch_array($Lista);
                                $estatus = "'" . $row['estatus'] . "'";
                                ?>
                                <th class="text-center" scope="row"><?php echo $row['noDia'] ?></th>
                                <td><input type="date" id="fechaV7-7" name="fechaV7-7" class="form-control input-sm" value="<?php echo $row['fechaDia'] ?>"></td>
                                <td class="text-center"><?php echo "$" . " " . round(($row['Sueldo'] + ($row['Sueldo'] * 0.25)) / 7, 2);  ?></td>
                                <?php
                                if ($row['estatus'] == 'pendiente') {
                                ?>
                                    <td class="text-center"><input type='image' src='pictures/pendiente.png' alt='Submit' width='20' height='20' onclick="preguntarEstatus(<?php echo $idE ?>,<?php echo $row['noDia'] ?>,$('#fechaV7-7').val(),<?php echo $estatus ?>)"></td>
                                <?php
                                } else {
                                ?>
                                    <td class="text-center"><input type='image' src='pictures/pagado.png' alt='Submit' width='20' height='20' onclick="preguntarEstatus(<?php echo $idE ?>,<?php echo $row['noDia'] ?>,$('#fechaV7-7').val(),<?php echo $estatus ?>)"></td>
                                <?php
                                }
                                ?>
                            </tr>
                        </tbody>
                    </table>
                <?php
                } else if ($diasV == 8) {
                ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center" scope="col">No. Dia</th>
                                <th class="text-center" scope="col">Fecha</th>
                                <th class="text-center" scope="col">Sueldo/Dia</th>
                                <th class="text-center" scope="col">Estatus</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                $row = mysqli_fetch_array($Lista);
                                $estatus = "'" . $row['estatus'] . "'";
                                ?>
                                <th class="text-center" scope="row"><?php echo $row['noDia'] ?></th>
                                <td><input type="date" id="fechaV1-8" name="fechaV1-8" class="form-control input-sm" value="<?php echo $row['fechaDia'] ?>"></td>
                                <td class="text-center"><?php echo "$" . " " . round(($row['Sueldo'] + ($row['Sueldo'] * 0.25)) / 8, 2);  ?></td>
                                <?php
                                if ($row['estatus'] == 'pendiente') {
                                ?>
                                    <td class="text-center"><input type='image' src='pictures/pendiente.png' alt='Submit' width='20' height='20' onclick="preguntarEstatus(<?php echo $idE ?>,<?php echo $row['noDia'] ?>,$('#fechaV1-8').val(),<?php echo $estatus ?>)"></td>
                                <?php
                                } else {
                                ?>
                                    <td class="text-center"><input type='image' src='pictures/pagado.png' alt='Submit' width='20' height='20' onclick="preguntarEstatus(<?php echo $idE ?>,<?php echo $row['noDia'] ?>,$('#fechaV1-8').val(),<?php echo $estatus ?>)"></td>
                                <?php
                                }
                                ?>
                            </tr>
                            <tr>
                                <?php
                                $row = mysqli_fetch_array($Lista);
                                $estatus = "'" . $row['estatus'] . "'";
                                ?>
                                <th class="text-center" scope="row"><?php echo $row['noDia'] ?></th>
                                <td><input type="date" id="fechaV2-8" name="fechaV2-8" class="form-control input-sm" value="<?php echo $row['fechaDia'] ?>"></td>
                                <td class="text-center"><?php echo "$" . " " . round(($row['Sueldo'] + ($row['Sueldo'] * 0.25)) / 8, 2);  ?></td>
                                <?php
                                if ($row['estatus'] == 'pendiente') {
                                ?>
                                    <td class="text-center"><input type='image' src='pictures/pendiente.png' alt='Submit' width='20' height='20' onclick="preguntarEstatus(<?php echo $idE ?>,<?php echo $row['noDia'] ?>,$('#fechaV2-8').val(),<?php echo $estatus ?>)"></td>
                                <?php
                                } else {
                                ?>
                                    <td class="text-center"><input type='image' src='pictures/pagado.png' alt='Submit' width='20' height='20' onclick="preguntarEstatus(<?php echo $idE ?>,<?php echo $row['noDia'] ?>,$('#fechaV2-8').val(),<?php echo $estatus ?>)"></td>
                                <?php
                                }
                                ?>
                            </tr>
                            <tr>
                                <?php
                                $row = mysqli_fetch_array($Lista);
                                $estatus = "'" . $row['estatus'] . "'";
                                ?>
                                <th class="text-center" scope="row"><?php echo $row['noDia'] ?></th>
                                <td><input type="date" id="fechaV3-8" name="fechaV3-8" class="form-control input-sm" value="<?php echo $row['fechaDia'] ?>"></td>
                                <td class="text-center"><?php echo "$" . " " . round(($row['Sueldo'] + ($row['Sueldo'] * 0.25)) / 8, 2);  ?></td>
                                <?php
                                if ($row['estatus'] == 'pendiente') {
                                ?>
                                    <td class="text-center"><input type='image' src='pictures/pendiente.png' alt='Submit' width='20' height='20' onclick="preguntarEstatus(<?php echo $idE ?>,<?php echo $row['noDia'] ?>,$('#fechaV3-8').val(),<?php echo $estatus ?>)"></td>
                                <?php
                                } else {
                                ?>
                                    <td class="text-center"><input type='image' src='pictures/pagado.png' alt='Submit' width='20' height='20' onclick="preguntarEstatus(<?php echo $idE ?>,<?php echo $row['noDia'] ?>,$('#fechaV3-8').val(),<?php echo $estatus ?>)"></td>
                                <?php
                                }
                                ?>
                            </tr>

                            <tr>
                                <?php
                                $row = mysqli_fetch_array($Lista);
                                $estatus = "'" . $row['estatus'] . "'";
                                ?>
                                <th class="text-center" scope="row"><?php echo $row['noDia'] ?></th>
                                <td><input type="date" id="fechaV4-8" name="fechaV4-8" class="form-control input-sm" value="<?php echo $row['fechaDia'] ?>"></td>
                                <td class="text-center"><?php echo "$" . " " . round(($row['Sueldo'] + ($row['Sueldo'] * 0.25)) / 8, 2);  ?></td>
                                <?php
                                if ($row['estatus'] == 'pendiente') {
                                ?>
                                    <td class="text-center"><input type='image' src='pictures/pendiente.png' alt='Submit' width='20' height='20' onclick="preguntarEstatus(<?php echo $idE ?>,<?php echo $row['noDia'] ?>,$('#fechaV4-8').val(),<?php echo $estatus ?>)"></td>
                                <?php
                                } else {
                                ?>
                                    <td class="text-center"><input type='image' src='pictures/pagado.png' alt='Submit' width='20' height='20' onclick="preguntarEstatus(<?php echo $idE ?>,<?php echo $row['noDia'] ?>,$('#fechaV4-8').val(),<?php echo $estatus ?>)"></td>
                                <?php
                                }
                                ?>
                            </tr>

                            <tr>
                                <?php
                                $row = mysqli_fetch_array($Lista);
                                $estatus = "'" . $row['estatus'] . "'";
                                ?>
                                <th class="text-center" scope="row"><?php echo $row['noDia'] ?></th>
                                <td><input type="date" id="fechaV5-8" name="fechaV5-8" class="form-control input-sm" value="<?php echo $row['fechaDia'] ?>"></td>
                                <td class="text-center"><?php echo "$" . " " . round(($row['Sueldo'] + ($row['Sueldo'] * 0.25)) / 8, 2);  ?></td>
                                <?php
                                if ($row['estatus'] == 'pendiente') {
                                ?>
                                    <td class="text-center"><input type='image' src='pictures/pendiente.png' alt='Submit' width='20' height='20' onclick="preguntarEstatus(<?php echo $idE ?>,<?php echo $row['noDia'] ?>,$('#fechaV5-8').val(),<?php echo $estatus ?>)"></td>
                                <?php
                                } else {
                                ?>
                                    <td class="text-center"><input type='image' src='pictures/pagado.png' alt='Submit' width='20' height='20' onclick="preguntarEstatus(<?php echo $idE ?>,<?php echo $row['noDia'] ?>,$('#fechaV5-8').val(),<?php echo $estatus ?>)"></td>
                                <?php
                                }
                                ?>
                            </tr>

                            <tr>
                                <?php
                                $row = mysqli_fetch_array($Lista);
                                $estatus = "'" . $row['estatus'] . "'";
                                ?>
                                <th class="text-center" scope="row"><?php echo $row['noDia'] ?></th>
                                <td><input type="date" id="fechaV6-8" name="fechaV6-8" class="form-control input-sm" value="<?php echo $row['fechaDia'] ?>"></td>
                                <td class="text-center"><?php echo "$" . " " . round(($row['Sueldo'] + ($row['Sueldo'] * 0.25)) / 8, 2);  ?></td>
                                <?php
                                if ($row['estatus'] == 'pendiente') {
                                ?>
                                    <td class="text-center"><input type='image' src='pictures/pendiente.png' alt='Submit' width='20' height='20' onclick="preguntarEstatus(<?php echo $idE ?>,<?php echo $row['noDia'] ?>,$('#fechaV6-8').val(),<?php echo $estatus ?>)"></td>
                                <?php
                                } else {
                                ?>
                                    <td class="text-center"><input type='image' src='pictures/pagado.png' alt='Submit' width='20' height='20' onclick="preguntarEstatus(<?php echo $idE ?>,<?php echo $row['noDia'] ?>,$('#fechaV6-8').val(),<?php echo $estatus ?>)"></td>
                                <?php
                                }
                                ?>
                            </tr>

                            <tr>
                                <?php
                                $row = mysqli_fetch_array($Lista);
                                $estatus = "'" . $row['estatus'] . "'";
                                ?>
                                <th class="text-center" scope="row"><?php echo $row['noDia'] ?></th>
                                <td><input type="date" id="fechaV7-8" name="fechaV7-8" class="form-control input-sm" value="<?php echo $row['fechaDia'] ?>"></td>
                                <td class="text-center"><?php echo "$" . " " . round(($row['Sueldo'] + ($row['Sueldo'] * 0.25)) / 8, 2);  ?></td>
                                <?php
                                if ($row['estatus'] == 'pendiente') {
                                ?>
                                    <td class="text-center"><input type='image' src='pictures/pendiente.png' alt='Submit' width='20' height='20' onclick="preguntarEstatus(<?php echo $idE ?>,<?php echo $row['noDia'] ?>,$('#fechaV7-8').val(),<?php echo $estatus ?>)"></td>
                                <?php
                                } else {
                                ?>
                                    <td class="text-center"><input type='image' src='pictures/pagado.png' alt='Submit' width='20' height='20' onclick="preguntarEstatus(<?php echo $idE ?>,<?php echo $row['noDia'] ?>,$('#fechaV7-8').val(),<?php echo $estatus ?>)"></td>
                                <?php
                                }
                                ?>
                            </tr>

                            <tr>
                                <?php
                                $row = mysqli_fetch_array($Lista);
                                $estatus = "'" . $row['estatus'] . "'";
                                ?>
                                <th class="text-center" scope="row"><?php echo $row['noDia'] ?></th>
                                <td><input type="date" id="fechaV8-8" name="fechaV8-8" class="form-control input-sm" value="<?php echo $row['fechaDia'] ?>"></td>
                                <td class="text-center"><?php echo "$" . " " . round(($row['Sueldo'] + ($row['Sueldo'] * 0.25)) / 8, 2);  ?></td>
                                <?php
                                if ($row['estatus'] == 'pendiente') {
                                ?>
                                    <td class="text-center"><input type='image' src='pictures/pendiente.png' alt='Submit' width='20' height='20' onclick="preguntarEstatus(<?php echo $idE ?>,<?php echo $row['noDia'] ?>,$('#fechaV8-8').val(),<?php echo $estatus ?>)"></td>
                                <?php
                                } else {
                                ?>
                                    <td class="text-center"><input type='image' src='pictures/pagado.png' alt='Submit' width='20' height='20' onclick="preguntarEstatus(<?php echo $idE ?>,<?php echo $row['noDia'] ?>,$('#fechaV8-8').val(),<?php echo $estatus ?>)"></td>
                                <?php
                                }
                                ?>
                            </tr>
                        </tbody>
                    </table>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-2">
                <label class="fw-bold">Sueldo:<p class="fw-normal"><?php echo $sueldo; ?></p></label>
            </div>
            <div class="col-sm-2">
                <label class="fw-bold">Prima vacacional:<p class="fw-normal"><?php echo $primaV; ?></p></label>
            </div>
            <div class="col-sm-2">
                <label class="fw-bold">Sueldo total:<p class="fw-normal"><?php echo $sueldoT; ?></p></label>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-sm-2">
                <button type="button" class="btn btn-info" style="background:rgb(50, 141, 168); color:#FFF; margin: 1rem;" id="btn-Recibo" onclick="verificaDiasVacaciones('<?php echo $idE; ?>','<?php echo $diasV; ?>')">Generar recibo</button>
            </div>
        </div>

        <div class="row justify-content-between">
            <h3 style="font-size: 24px;"><input type="image" src="pictures/vacaciones.png" alt="Submit" data-bs-toggle="modal" data-bs-target="#modalVacacionesAños" width="30px" height="auto" tabindex="-1">Vacaciones por año</h3>
        </div>
    </div>
</body>

<div class="modal fade" id="modalVacacionesAños" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background:rgb(50, 141, 168); color:#FFF">
                <h5 class="modal-title" id="exampleModalLabel">Lista de vacaciones por año</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <?php
                        $sqlSelectVT = "SELECT * FROM vacaciones WHERE idE = $idE ORDER BY year DESC, fechaDia ASC;";
                        $result2 = mysqli_query($conexion, $sqlSelectVT);
                        ?>
                        <tr>
                            <th class="text-center" scope="col">Fecha</th>
                            <th class="text-center" scope="col">Estatus</th>
                            <th class="text-center" scope="col">Fecha de pago</th>
                            <th class="text-center" scope="col">Año</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row2 = mysqli_fetch_array($result2)) {
                            if ($row2['estatus'] == 'pendiente') {
                                $echo = 'No se pago';
                            } else {
                                $echo = 'Pagado';
                            }
                        ?>
                            <tr>
                                <td class="text-center"><?php echo $row2['fechaDia']; ?></td>
                                <td class="text-center"><?php echo $echo; ?></td>
                                <td class="text-center"><?php echo $row2['fechaPago']; ?></td>
                                <td class="text-center"><?php echo $row2['year']; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</html>



<script type="text/javascript">
    $(document).ready(function() {
        var idE = $('#idE').val();
        var nLista = $('#nLista').val();
        var nombre = $('#nombre').val();
        var apellidos = $('#apellidos').val();
        var fIngreso = $('#fIngreso').val();
        //alert(fIngreso);
        var sueldo = $('#sueldo').val();
        var depa = $('#depa').val();
        //agregaFormVacaciones(idE,fIngreso,nLista,nombre,apellidos,sueldo,depa);
        // $('#btn-Recibo').click(function(){
        //     window.location = `reciboVacaciones.php?idE=${idE}`;
        // })
    });
</script>