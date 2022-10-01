<table id="tabla1" class="table-responsive table-hover" style="font-size: 16px">
    <thead style="color: black;">

        <tr align="center">
            <th> Numero Lista </th>
            <th> Nombre</th>
            <th> Apellidos </th>
            <th> Empresa </th>
            <th> Departamento </th>
            <th> Puesto </th>
            <th> Detalles </th>
        </tr>
    </thead>
    <tbody>
        <?php
        require_once 'conexion.php';
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
        ?>
            <tr>
                <td align='center'> <?php echo $Nlista ?></td>
                <td align="center"> <?php echo $nombre . ' ' . $apellidos ?> </td>
                <td align="center"> <?php echo $apellidos ?> </td>
                <td align="center"> <?php echo $empresa ?> </td>
                <td align="center"> <?php echo $departamento ?> </td>
                <td align="center"> <?php echo $puesto ?> </td>
                <td align='center'> <a href=imprimee.php?va=<?php echo $idE?>> <input type='image' src='pictures/imprimir.png' width='33px'></a> </td>
                </td>
            </tr>

        <?php
        }
        ?>


    </tbody>
</table>


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