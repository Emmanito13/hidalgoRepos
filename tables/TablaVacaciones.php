<?php
$idE = $_POST['idE'];
$nLista = $_POST['nLista'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$fIngreso = $_POST['fIngreso'];
$sueldo = $_POST['sueldo'];
$depa = $_POST['depa'];
$primaV = $sueldo * 0.25;
$sueldoT = $sueldo + $primaV;
?>
<table class="table">
    <thead>
        <tr align="center">
            <th align="center" scope="col">No. Dia</th>
            <th align="center" scope="col">Fecha</th>
            <th align="center" scope="col">Pago/Dia</th>
            <th align="center" scope="col">Estatus</th>
        </tr>
    </thead>
    <tbody>
        <?php
        require_once 'conexion.php';
        $conexion = conexion();
        $Consulta = "SELECT V.idE,V.noDia,V.fechaDia,V.estatus,V.fechaPago,V.year,T.Sueldo FROM vacaciones as V,trabajo as T where V.idE = $idE AND T.idE = $idE";
        $Lista = mysqli_query($conexion, $Consulta);
        while ($row = mysqli_fetch_array($Lista)) {
        ?>
            <tr>
                <th class="text-center" scope="row"><?php echo $row['noDia'] ?></th>
                <td align="center">
                    <input type="date" id="fechaV" name="fechaV" class="form-control input-sm" value="<?php echo $row['fechaDia'] ?>">
                    <input type="text" name="fecha" id="fecha" value="<?php echo $row['noDia'] ?>">
                    <input type="text" name="valor" id="valor">
                </td>

                <td align="center"><?php echo $row['Sueldo'] * 0.25; ?></td>
                <td align="center">
                    <?php
                    if ($row['estatus'] == 'pendiente') {
                    ?>
                        <input type='image' id='<?php echo "btn" . $row['noDia'] ?>' name='pendiente' src='pictures/pendiente.png' alt='Submit' width='20' height='20' onclick="verFecha(<?php echo $idE ?>, $('#fechaV').val() )">
                    <?php
                    } else {
                    ?>
                        <input type='image' src='pictures/pagado.png' alt='Submit' width='20' height='20'>
                    <?php
                    }
                    ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<div class="row justify-content-center">
    <div class="col-sm-4">
        <label class="fw-bold">Sueldo:<p class="fw-normal"><?php echo $sueldo; ?></p></label>
    </div>
    <div class="col-sm-4">
        <label class="fw-bold">Prima vacacional:<p class="fw-normal"><?php echo $primaV; ?></p></label>
    </div>
    <div class="col-sm-4">
        <label class="fw-bold">Sueldo total:<p class="fw-normal"><?php echo $sueldoT; ?></p></label>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-sm-4">
        <button type="button" alt="" 0 class="btn btn-info" style="background:rgb(50, 141, 168); color:#FFF; margin: 1rem;" id="btn-Recibo">Generar recibo</button>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        
    });

    const verFecha = (idE,fecha) =>{
            alert(idE+fecha);
    }
</script>