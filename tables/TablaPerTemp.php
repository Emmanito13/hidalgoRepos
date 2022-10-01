<table id="tabla1" class="table-responsive table-hover" style="font-size: 16px">
    <thead style="color: black;">

        <tr align="center">
            <th> Numero Lista </th>
            <th> Nombre y Apellidos </th>
            <th> Fecha de Ingreso </th>
            <th> Duracion de contrato </th>
            <th> Dias Transcurridos </th>
            <th> Dias pendientes </th>
            <th> Puesto </th>
            <th> Cambiar modo de Contrato </th>
            <th> Dar de Baja </th>
            <th> Detalles </th>
        </tr>
    </thead>
    <tbody>
        <?PHP
        require_once '../conexion.php';
        $conexion = conexion();
        $Consulta = "select * from empleado2 where Estatus='activo' and contrato>0 order by Nlista";
        $Lista = mysqli_query($conexion, $Consulta);
        function dias_transcurridos($fecha_i, $fecha_f)
        {
            $dias    = (strtotime($fecha_i) - strtotime($fecha_f)) / 86400;
            $dias     = abs($dias);
            $dias = floor($dias);
            return $dias;
        }
        while ($row = mysqli_fetch_row($Lista)) {
             $T = $row[37];
             $Temp = $row[1];
             $Temp2 = $row[2];
             $Temp3 = $row[3];
             $Temp4 = $row[12];
             $Temp5 = $row[6];
            $diast = dias_transcurridos($Temp5, date('j-m-Y'));

            if ($row[37] == 1) {
                $diasf = 90 - $diast;

                if ($diast > 80) {
?>
 <tr>
<td align='center'> <?php echo $Temp ?> </td>
<td> <?php echo $Temp2. ' ' . $Temp3 ?>   </td>
<td align='center'> <font color='red' > <?php echo $Temp5 ?>  </font> </td>
<td align='center'> <font color='red' > 90 Dias </font> </td>
<td align='center'> <font color='red' size=4.5 > <?php echo $diast ?>  </font> </td>
<td align='center'>  <font color='red' size=4.5 > <?php echo $diasf ?>   </font> </td>
<td align='center'> <?php echo $Temp4 ?>  </td>
<td align='center'> <a href=planta.php?va=$T> Renovar </a> </td>
<td align='center'> <a href=elimina.php?va=$T&ve=$Temp2&vi=$Temp3> Baja</a> </td>
<td> <a href=detalles.php?va=$T> Ver detalles...</a> </td>

</tr>
<?php
                } else {
?>
<tr>
<td align='center'> <?php echo $Temp ?>  </td>
<td> <?php echo $Temp2. ' ' .$Temp3 ?>  </td>
<td align='center'> <?php echo $Temp5 ?>  </td>
<td align='center'>  90 Dias</td>
<td align='center'> <?php echo $diast  ?>  </td>
<td align='center'> <?php echo $diasf ?>  </td>
<td align='center'> <?php echo $Temp4 ?>  </td>
<td align='center'>  <a href=planta.php?va=$T> Renovar </a> </td>
<td align='center'> <a href=elimina.php?va=$T&ve=$Temp2&vi=$Temp3> Baja </a> </td>
<td> <a href=detalles.php?va=$T> Ver detalles...</a> </td>

<?php
                }
            } else {

                $diasf = 180 - $diast;

                if ($diast > 170) {

?>                    

    <tr>
<td align='center'> <?php echo $Temp ?>  </td>
<td> <?php echo $Temp2. ' ' .$Temp3 ?>   </td>
<td align='center'> <font color='red' > <?php echo $Temp5 ?>  </font> </td>
<td align='center'> <font color='red' > 180 Dias </font> </td>
<td align='center'> <font color='red' size=4.5 > <?php echo $diast ?>  </font> </td>
<td align='center'>  <font color='red' size=4.5 > <?php echo $diasf  ?>   </font> </td>
<td align='center'> <?php echo $Temp4 ?>  </td>
<td align='center'> <a href=plantad.php?va=$T> Planta</a> </td>
<td align='center'> <a href=elimina.php?va=$T&ve=$Temp2&vi=$Temp3> Baja</a> </td>
<td> <a href=detalles.php?va=$T> Ver detalles...</a> </td>

</tr>
<?php
                } else {
?>                    
            <tr>
<td align='center'> <?php echo  $Temp ?>  </td>
<td> <?php echo $Temp2. ' ' .$Temp3 ?>  </td>
<td align='center'> <?php echo $Temp5 ?>  </td>
<td align='center'> 180 Dias </td>
<td align='center'> <?php echo $diast ?>  </td>
<td align='center'> <?php echo $diasf ?>  </td>
<td align='center'> <?php echo $Temp4 ?>  </td>
<td align='center'>  <a href=plantad.php?va=$T> Planta</a> </td>
<td align='center'> <a href=elimina.php?va=$T&ve=$Temp2&vi=$Temp3> Baja </a> </td>
<td> <a href=detalles.php?va=$T> Ver detalles...</a> </td>

<?php
                }
            }
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