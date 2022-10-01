 <?php
 date_default_timezone_set('America/Mexico_City') ;
 
    include '../modals/modalEditar.php';
    include '../modals/modalFotos.php';
    include '../modals/modalDocumentos.php';    
    ?>
 <table id="tabla1" class="table-responsive table-hover" style="font-size: 16px">
     <thead style="color: black;">

         <tr align="center">
             <th align="center">No. lista</th>
             <th align="center">Nombre y Apellidos</th>
             <th align="center">Empresa</th>
             <th align="center">Departamento</th>
             <th align="center">Puesto</th>
             <th align="center">Detalles</th>
             <th align="center">Documentos presentados</th>
             <th align="center">Fotos</th>
             <th align="center">Vacaciones</th>
             <th align="center">Cumpleaños</th>
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
            //idE[0], Nombre[1], Apellidos[2], Fnacimiento[3], Sexo[4], Direccion[5], Telefono[6], C_U_R_P[7], CorreoE[8], RFC,Nlista[9], Sueldo,turno[10], Fingreso[11], contrato[12], empresa[13],
            //departamento[14], puesto[15], jefe[16], Observaciones[17], idimss[18], Fimss[19], numeroimss[20], SueldoImss[21], solicitudE[22], curp[23], comprobanteD[24], cANP[25], CR1[26], actaN[27],
            //credencialE[28], comprobanteE[29], NoAImss[30], CR2[31], idImg[32], srcFrente[33], srcPerfil[34], srcINE[35]
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

                $datosEditar = $idE . '||' . $Nlista . '||' . $nombre . '||' . $apellidos . '||' . $fechaN . '||' . $fechaI . '||' . $sueldo . '||' . $FIngresoImss . '||' . $sueldoImms . '||' .
                    $empresa . '||' . $departamento . '||' . $puesto . '||' . $jefe . '||' . $telefono . '||' . $numeroimss . '||' . $correo . '||' . $sexo . '||' .
                    $direccion . '||' . $observaciones . '||' . $curp . '||' . $rfc . '||' . $idImms . '||' . $turno . '||' . $contrato;

                $documentosEditar = $idE . '||' . $row['solicitudE'] . '||' . $row['curp'] . '||' . $row['comprobanteD'] . '||' . $row['cANP'] . '||' . $row['CR1'] . '||' .
                    $row['actaN'] . '||' . $row['credencialE'] . '||' . $row['comprobanteE'] . '||' . $row['NoAImss'] . '||' . $row['CR2'];

                $datosFotos = $idE . '||' . $row['srcFrente'] . '||' . $row['srcPerfil'] . '||' . $row['srcINE'];

                $datosVacaciones = $idE . '||' . $row['Fingreso'];

            ?>
             <tr>
                 <td align='center'> <?php echo $Nlista ?></td>
                 <td align="center"> <?php echo $nombre . ' ' . $apellidos ?> </td>
                 <td align="center"> <?php echo $empresa ?> </td>
                 <td align="center"> <?php echo $departamento ?> </td>
                 <td align="center"> <?php echo $puesto ?> </td>
                 <td align="center">
                     <input type="image" src="pictures/detalles.png" width="33px" data-bs-toggle="modal" data-bs-target="#modalEditar" onclick="agregaForm('<?php echo $datosEditar ?>')">
                 </td>

                 <td align="center">
                     <input type="image" src="pictures/documentos.png" width="33px" data-bs-toggle="modal" data-bs-target="#modalDocumentos" onclick="agregaFormDoc('<?php echo $documentosEditar ?>')">
                 </td>
                 <td align="center">
                     <input type="image" src="pictures/fotografo.png" width="33px" data-bs-toggle="modal" data-bs-target="#modalFotos" onclick="agregaFoto('<?php echo $datosFotos ?>')">
                 </td>
                 <?php
                    $fI = date_create($fechaI);
                    $Factual = date_create(date("d-m-Y"));                    
                    $diferencia = date_diff($fI, $Factual);
                    if ($diferencia->y >= 1) {
                        $hidden = '';
                    } else {
                        $hidden = 'hidden';
                    }
                    if ($fechaN == date("Y-m-d")){
                        $hidden2 = '';
                    }else{
                        $hidden2 = 'hidden';
                    }
                    ?>
                 <td align="center">
                     <input <?php echo $hidden; ?> type="image" type="submit" src="pictures/vacaciones.png" width="33px" onclick="agregaFormVacaciones(
                          '<?php echo $idE; ?>','<?php echo $fechaI; ?>','<?php echo $Nlista; ?>','<?php echo $nombre; ?>','<?php echo $apellidos; ?>','<?php echo $sueldo; ?>',
                          '<?php echo $departamento; ?>')">
                 </td>
                 <td align="center">
                     <input <?php echo $hidden2; ?> id="btnCumple" name="btnCumple" type="image" src="pictures/cumple.png" width="33px" onclick="cumpleaños('<?php echo $idE ?>','<?php echo $fechaN ?>')">                     
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