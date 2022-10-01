<table id="tabla1" class="table-responsive table-hover" style="font-size: 16px">
    <thead style="color: black;">

        <tr align="center">
            <th> No. lista</th>
            <th> Nombre</th>
            <th> Apellidos</th>
            <th> Empresa </th>
            <th> Departamento </th>
            <th> Puesto </th>
            <th> Dar de baja </th>           
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

        ?>
            <tr>
                <td align='center'> <?php echo $Nlista; ?></td>
                <td align='center'> <?php echo $nombre; ?></td>
                <td align='center'> <?php echo $apellidos; ?> </td>
                <td align='center'> <?php echo $empresa; ?> </td>
                <td align='center'> <?php echo $departamento; ?> </td>
                <td align='center'> <?php echo $puesto; ?> </td>                
                <td align='center'>
                    <input type="image" src="pictures/eliminar.png" width="33px" data-bs-toggle="modal" data-bs-target="#modalBaja" onclick="reporteBaja('<?php echo $idE; ?>','<?php echo $nombre; ?>','<?php echo $apellidos; ?>')">                    
                </td>                
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>


<!-- Modal baja --->
<div class="modal fade" id="modalBaja" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#8B0000; color:#FFF">
                <h5 class="modal-title" id="exampleModalLabel">Reporte de baja</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="post">
                    <input hidden type="text" name="id" id="id">
                    <label>Nombre:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control input-sm">
                    <label>Motivo:</label>
                    <input type="text" name="motivo" id="motivo" class="form-control input-sm">
                    <label>Fecha de baja:</label>
                    <input type="date" name="fechaB" id="fechaB" class="form-control input-sm">
                    <label>Observaciones:</label>
                    <input type="text" name="observa" id="observa" class="form-control input-sm">
                    <label>Monto de liquidación:</label>
                    <input type="text" name="liquida" id="liquida" class="form-control input-sm">
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-info" style="background:#8B0000; color:#FFF;" data-bs-dismiss="modal" id="preguntar">Dar de baja</button>
            </div>

        </div>
    </div>
</div>




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

        $('#preguntar').click(function() {
            if($('#fechaB').val() == ""){
                alertify.alert('Ingrese una fecha de baja');
            }else{
                preguntarSiNo($('#id').val(),
                $('#nombre').val(),
                $('#motivo').val(),
                $('#fechaB').val(),
                $('#observa').val(),
                $('#liquida').val());
            }            
        });
    });
</script>