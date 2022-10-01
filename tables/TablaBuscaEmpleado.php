<table id="tabla1" class="table-responsive table-hover" style="font-size: 16px">
    <thead style="color: black;">

        <tr align="center">
            <th>No. lista</th>
            <th>Nombre</th>
            <th>Fecha Nacimiento</th>
            <th>Sexo</th>
            <th>Fecha Ingreso</th>
            <th>Sueldo</th>
            <th>Ingreso IMSS</th>
            <th>Sueldo IMSS</th>
            <th>Empresa</th>
            <th>Departamento</th>
            <th>Puesto</th>
            <th>Detalles</th>
        </tr>
    </thead>
    <tbody>
        <?php
        require_once '../conexion.php';
        $conexion = conexion();

        $Consulta = "SELECT E.idE, E.Nombre, E.Apellidos, E.Fnacimiento, E.Sexo, E.Direccion,E.Telefono, E.C_U_R_P, E.CorreoE, E.RFC,	
                                T.Nlista, T.Sueldo, turno.horario AS turno,T.Fingreso, contrato.nombre as contrato,empresa.nombre AS empresa,
                                departamento.nombre AS departamento, puesto.nombre AS puesto, jefe.nombre AS jefe ,T.Observaciones,I.idimss, 
                                I.Fimss, I.numeroimss, I.SueldoImss, D.solicitudE, D.curp, D.comprobanteD, D.cANP, D.CR1, D.actaN, D.credencialE,
                                D.comprobanteE, D.NoAImss, D.CR2, S.idImg, S.srcFrente, S.srcPerfil, S.srcINE
                        FROM empleado as E,trabajo T, imss as I, documentos as D, imagenes as S,jefe,puesto,empresa,departamento,turno,contrato
                        WHERE E.idE = T.idE and E.idE = I.idE AND E.idE = D.idE AND E.idE = S.idE 
                                AND T.idTurno = turno.idTurno
                                AND T.idContrato = contrato.idContrato
                                AND T.idEmpresa = empresa.idEmpresa 
                                AND T.idDepartamento = departamento.idDepa
                                AND T.idPuesto = puesto.idPuesto
                                AND T.idJefe = Jefe.idJefe 
                                AND T.estatus = 'activo' 
                                ORDER BY T.Nlista;";

        $Lista = mysqli_query($conexion, $Consulta);

        while ($row = mysqli_fetch_array($Lista)) {
            $idE = $row['idE'];
            $Nlista = $row['Nlista'];
            $nombre = $row['Nombre'];
            $apellidos = $row['Apellidos'];
            $puesto = $row['puesto'];
            $empresa = $row['empresa'];
            $departamento = $row['departamento'];
            $fechaN = $row['Fnacimiento'];
            $fechaI = $row['Fingreso'];
            $sueldo = $row['Sueldo'];
            $FIngresoImss =  $row['Fimss'];
            $sueldoImms = $row['SueldoImss'];
            $jefe = $row['jefe'];
            $telefono = $row['Telefono'];
            $numeroimss = $row['numeroimss'];
            $correo = $row['CorreoE'];
            $sexo = $row['Sexo'];
            $direccion = $row['Direccion'];
            $curp = $row['C_U_R_P'];
            $observaciones = $row['Observaciones'];
            $rfc = $row['RFC'];
            $idImms = $row['idimss'];
            $contrato = $row['contrato'];
            $turno = $row['turno'];

            $datosEmpleado = $idE . '||' . $Nlista . '||' . $nombre . '||' . $apellidos . '||' . $fechaN . '||' . $fechaI . '||' . $sueldo . '||' . $FIngresoImss . '||' . $sueldoImms . '||' .
                $empresa . '||' . $departamento . '||' . $puesto . '||' . $jefe . '||' . $telefono . '||' . $numeroimss . '||' . $correo . '||' . $sexo . '||' .
                $direccion . '||' . $observaciones . '||' . $curp . '||' . $rfc . '||' . $idImms . '||' . $turno . '||' . $contrato;
        ?>
            <tr>
                <td align='center'> <?php echo $Nlista ?></td>
                <td align="center"> <?php echo $nombre . ' ' . $apellidos ?> </td>
                <td align="center"> <?php echo $fechaN ?> </td>
                <td align="center"> <?php echo $sexo ?> </td>
                <td align="center"> <?php echo $fechaI ?> </td>
                <td align="center"> <?php echo $sueldo ?> </td>
                <td align="center"> <?php echo $FIngresoImss ?> </td>
                <td align="center"> <?php echo $sueldoImms ?> </td>
                <td align="center"> <?php echo $empresa ?> </td>
                <td align="center"> <?php echo $departamento ?> </td>
                <td align="center"> <?php echo $puesto ?> </td>
                <td align="center">
                    <input type="image" src="pictures/detalles.png" width="33px" data-bs-toggle="modal" data-bs-target="#modalBuscar" onclick="agregaFormBus('<?php echo $datosEmpleado ?>')">
                </td>
            </tr>
        <?php
        }
        ?>

    </tbody>
</table>

<?php 
include '../modals/modalBuscar.php';
?>

<script type="text/javascript">
    $(document).ready(function(e) {
        $('#tabla1').DataTable({
            "language": {
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                "lengthMenu": "Mostrar _MENU_ registros",
                "search": "Buscar:",
                "info": "Mostrar página _PAGE_ de _PAGES_",
                "emptyTable": "No hay documentos",
                "zeroRecords": "No hay coincidencias",
                "infoFiltered": "(filtrados _MAX_ del total de registros)"
            }
        });
    });
</script>